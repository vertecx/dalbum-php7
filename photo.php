<?php
/*
    This file is a part of DAlbum.  Copyright (c) 2003 Alexei Shamov, DeltaX Inc.

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
    if (!defined("DALBUM_ROOT"))
        define("DALBUM_ROOT",".");
    if (!defined("DALBUM_BROWSERROOT"))
        define("DALBUM_BROWSERROOT","");

    define("DALBUM_PHOTO_PAGE","1");

    require_once(DALBUM_ROOT."/include/md5crypt.php");
    require_once(DALBUM_ROOT."/include/functions.php");
    require_once(file_exists(DALBUM_ROOT."/config/config.php")?DALBUM_ROOT."/config/config.php":DALBUM_ROOT."/include/config.php");
    require_once(DALBUM_ROOT."/include/conffix.php");
    require_once(DALBUM_ROOT."/include/album.php");

    // Include custom functions
    if (file_exists(DALBUM_ROOT."/config/custom.php"))
        include_once(DALBUM_ROOT."/config/custom.php");
    elseif (file_exists(DALBUM_ROOT."/include/custom.php"))
        include_once(DALBUM_ROOT."/include/custom.php");

    $sUserName=StartSessionAndGetUserName('private_no_expire');
    if (function_exists('everypageCallback'))
        everypageCallback($sUserName);

    global $g_sResizedPrefix;
    global $g_sThumbnailPrefix;
    global $g_sThumbnailPath;
    global $g_sResizedPath;

    $sFile=@$_GET['file'];
    if (!$sFile)
        $sFile=@$_SERVER['ORIG_PATH_INFO'];
    if (!$sFile) 
        $sFile= @$_SERVER['PATH_INFO'];


    $image=&createImage();
    $image->Init($sFile);

    if ($sFile=="" || !$image->IsImageFilename())
    {
        hdr("404 Not found");
        return;
    }


    if (!$image->SkipAccessCheck() )
    {
        // Create tree
        $alb=&CAlbum::CreateFromArchive();
        $alb->SetAccess($sUserName);

        // find original file name
        $sFolder=dirname_ex($sFile);
        $sBase=basename($sFile);

        $lastSub=basename($sFolder);

        $bOriginalAccessCheck=false;

        global $g_bShowOriginalImageButton;


        if ($g_sThumbnailPath==$lastSub)
        {
            $sBase=substr($sBase,strlen($g_sThumbnailPrefix));
            $sFolder=dirname_ex($sFolder);
        }
        else if ($g_sResizedPath==$lastSub)
        {
            $sBase=substr($sBase,strlen($g_sResizedPrefix));
            $sFolder=dirname_ex($sFolder);
        }
        else if (!$g_bShowOriginalImageButton)
        {
            // There could be an attempt to download an original image while access to the original
            // images has been disabled.
            $bOriginalAccessCheck=true;
        }


        $s=$sFolder . '/'. $sBase;

        // Find album
        $album=&$alb->FindAlbum($sFolder);
        if (empty($album))
        {
            hdr("404 Not found");
            return;
        }

        if ($album->m_bPrivate)
        {
            dalbum_relocate("login.php?url=" . encodeCurrentLocation());
            return;
        }
        if ($bOriginalAccessCheck)
        {
            $album->LoadImages();
            $album->LoadDetails();

            global $g_sResizedXSize,$g_sResizedYSize;

            for ($i=0;$i<count($album->m_arrContents);++$i)
            {
                if ($album->m_arrContents[$i]->IsImage() &&
                    $album->m_arrContents[$i]->m_sBaseFilename==basename(strval($sFile)))
                {
                    $n=$i;
                    $image=&$album->m_arrContents[$i];
                    $image->CreateThumbnail(false,false);

                    $bResize=$image->m_bResize;

                    if ($image->m_bResize &&
                        ($image->m_nX>$g_sResizedXSize || $image->m_nY>$g_sResizedYSize) &&
                        file_exists(absfname($image->GetResizedFilename())))
                    {

                        // There is a resized image, original cannot be served
                        hdr("404 Not found");
                        return;
                    }
                }
            }
        }
    }


    $sFile=absfname($image->m_sFullFilename);
    if (!file_exists($sFile))
    {
        hdr("404 Not found");
        return;
    }

    $cache_time=@filemtime($sFile);
    $requested_time=0;
    if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
        $requested_time=@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']);

    header("Last-Modified: " . gmdate("D, d M Y H:i:s",$cache_time) . " GMT");

    // If server time zone is set incorrectly, it may prevent images from caching
    // Thus we say that the page is not modified if time difference is less that
    // one day and number of minutes and seconds is equal
    // Also image caching is broken in Google Chrome
    if( @abs($cache_time-$requested_time)<86400 &&  ($cache_time%3600)==($requested_time%3600))
    {
        if (!isset($_SERVER['HTTP_USER_AGENT']) || strstr($_SERVER['HTTP_USER_AGENT'],'AppleWebKit/')===FALSE)
        {
            hdr("304 Not Modified");
            return;
        }
    }

    $contentType=$image->GetImageMimeType();
    if (isset($_GET['download']))
        $contentType="application/octet-stream";

    $size=filesize($sFile);

    header("Content-type: $contentType");
    header('Content-Disposition: inline; filename="' . $image->m_sBaseFilename . '"');
    header("Content-length: " . $size);

    @set_time_limit(86400);   // set long timeout

    // readfile consumes too much memory :(
    $handle=fopen($sFile,"rb");
    while($handle && !feof($handle))
    {
        $buffer = fread($handle, 4096);
        if (strlen($buffer) == 0)
            break;
        print $buffer;
    }
    if ($handle)
        fclose($handle);
?>
