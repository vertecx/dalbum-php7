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
    $g_sVersion="1.44";

    if (!defined('DALBUM_ROOT'))
        die("Security problem");

    // Check if config.php is loaded
    if (!isset($g_sAlbumsRoot))
        die("include config.php first");

    // Loading NLS

    // Loading us-english first.
    @require_once(DALBUM_ROOT . "/include/lang/en-us.php");

    $lang=$newlang;
    $langFile=findBestLanguageFile();

    if ($langFile!="us-en.php")
    {
        if (preg_match('/^[a-z-]+.php$/i',$langFile) && @include_once(DALBUM_ROOT . "/include/lang/$langFile"))
            $lang=array_merge($lang,$newlang);  // replace values in US-english with localized strings
    }
    unset($newlang);

    // update version
    $lang['statusRight']=strtr($lang['statusRight'],array('#version#' => $g_sVersion,"DeltaX Inc."=>"","&copy; 2003"=>""));

    // style
    if (!isset($g_sStylesheet))
        $g_sStylesheet="main_normal.css";

    // minimum tree width
    if (!isset($g_nMinTreeWidth))
        $g_nMinTreeWidth=200;
    $g_nMinTreeWidth=(int)$g_nMinTreeWidth;

    // fix mogrify path
    if (!isset($g_sConvertPath) && ($g_sResizeMethod=='IM' || $g_sResizeMethod=='auto'))
    {
        print '<P>Error: This DAlbum version uses ImageMagick convert utility instead of mogrify.</P>';
        print '<P>Please insert the following lines into your config.php instead of mogrify command line:</P><PRE>';
        print '$g_sConvertPath="/usr/X11R6/bin/convert"; // or modify to your location' . "<BR>\n";
        print '// Change $g_sModgrifyPath to $g_sConvertPath and append #src# #target#' . "\n";
        print '$g_sThumbnailImArg="$g_sConvertPath -filter Lanczos -quality {$g_sThumbnailQuality} -resize {$g_sThumbnailXSize}x{$g_sThumbnailYSize} -size {$g_sThumbnailXSize}x{$g_sThumbnailYSize} -sharpen 2 +profile APP1 #src# #target#";' . "\n";
        print '$g_sResizedImArg  ="$g_sConvertPath -filter Lanczos -quality {$g_sResizedQuality} -resize {$g_sResizedXSize}x{$g_sResizedYSize} -sharpen 2 +profile APP1 #src# #target#";' . "\n";
        print '</PRE></P>';
    }

    // Check that temp directory is not empty
    if (empty($g_sTemp))
    {
        print('<P>Error: Your temp directory is empty. Please edit config.php and set $g_sTemp to absolute path.</P>');
    }

    // Check that .htpasswd exists and accessible
    if (!isset($g_sHtpasswd))
        $g_sHtpasswd=$g_sPrivateDir . "/.htpasswd";

    if (!empty($g_sHtpasswd) && !file_exists($g_sHtpasswd))
    {
        print("<P>Error: Your password file [" .  htmlentities($g_sPrivateDir . "/.htpasswd") . "] is not accessible by script or does not exist. <P>");
        print('<P>Most likely your setting for $g_sPrivateDir  is invalid. Please enter valid location in your config.php file.</P>');
    }

    // Check that .htpasswd exists and accessible
    if (!is_dir($g_sAlbumsRoot))
    {
        print("<P>Error: Your album root directory [" . htmlentities($g_sAlbumsRoot) . "] is not accessible by script or does not exist. <P>");
        print('<P>Most likely your setting for $g_sAlbumRoot in config.php is invalid. Please enter valid location in your config.php file.</P>');
    }

    // Some default values for showimg.php page
    if (!isset($g_bShowEXIFDetailsButton))
        $g_bShowEXIFDetailsButton=@extension_loaded('exif');

    if (!isset($g_bShowOriginalImageButton))
        $g_bShowOriginalImageButton=true;

    if (!isset($g_bShowTreeLines))
        $g_bShowTreeLines=false;

    if (!isset($g_bShowUpdateButton))
        $g_bShowUpdateButton=false;
    if (!isset($g_bGDVer2))
        $g_bGDVer2=true;
    if (!isset($g_bGZip))
        $g_bGZip=true;
    if (!isset($g_bForceDAlbumEXIFCode))
        $g_bForceDAlbumEXIFCode=false;
    if (!isset($g_bBrokenSessions))
        $g_bBrokenSessions=(fixed_phpversion()=="4.1.2");
    if (!isset($g_bStartNewSessionAlways))
        $g_bStartNewSessionAlways=false;
    if (!isset($g_nMinThumbViewWidth) || !$g_nMinThumbViewWidth)
        $g_nMinThumbViewWidth=($g_sThumbnailXSize+40) *$g_nColumnsPerPage;
    if (!isset($g_bFTPMkdir))
        $g_bFTPMkdir=false;
    if (!isset($g_bSetFocusNext))
        $g_bSetFocusNext=true;
    if (!isset($g_bShowLoginButton))
        $g_bShowLoginButton=true;
    if (!isset($g_bShowFullScreenButton))
        $g_bShowFullScreenButton=true;
    if (!isset($g_bShowUserManagerButton))
        $g_bShowUserManagerButton=true;
    if (!isset($g_bGDSetMemoryLimit))
        $g_bGDSetMemoryLimit=true;
    if (!isset($g_sCustomStylesheet))
        $g_sCustomStylesheet=DALBUM_BROWSERROOT . "custom.css";
    if (!isset($g_sAlbumdef))
        $g_sAlbumdef=".albumdef.ini";
    if (!isset($g_sAlbumhash))
        $g_sAlbumhash=".album_hash.dat";
    if (!isset($g_nFileAccessCheckLevel))
        $g_nFileAccessCheckLevel=2; // Control access to all
    if (!isset($g_bShowAllImagesButton))
        $g_bShowAllImagesButton=1;
    if (!isset($g_Demo))
        $g_Demo=false;

function getPreferredLanguages()
{
    if (!isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
        return array();
    $acc=$_SERVER['HTTP_ACCEPT_LANGUAGE'];
    $a=explode(",",$acc);

    $b=array();
    foreach ($a as $x)
    {
        $q=1;
        $z=explode(";",$x);
        if (empty($z))
            continue;
        for ($i=1;$i<count($z);++$i)
        {
            if (preg_match('/q=([0-9.]+)/',$z[$i],$q1) && !empty($q1))
            {
                $q=$q1[1];
            }
        }
        $b[$z[0]]=$q;
    }
    arsort($b);
    return array_keys($b);
}

function findBestLanguageFile()
{
    global $g_arrLangList;
    if (!isset($g_arrLangList))
    {
        $g_arrLangList=array("en"   => "en-us.php","en-us" => "en-us.php");
    }

    $lng=getPreferredLanguages();

    foreach ($lng as $la)
    {
        if (isset($g_arrLangList[$la]))
            return $g_arrLangList[$la];
    }
    reset($g_arrLangList);
    list($lang,$file)=each($g_arrLangList);
    if (!empty($file))
        return $file;
    return "en-us.php";
}

?>