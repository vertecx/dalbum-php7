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
if (!defined('DALBUM_ROOT'))
    die("Security problem");

class CBaseObject
{
    var $m_sTitle;
    var $m_sComment, $m_sCommentHTML;
    var $m_arrCustomFields;

    // Compare two objects
    function cmpAlb($a, $b)
    {
        if ($a->IsImage())
        {
            if ($b->IsImage())
                return strcasecmp($a->m_sBaseFilename, $b->m_sBaseFilename);
            return 1;
        }
        if ($b->IsImage())
            return -1;

        return strcasecmp(basename(substr($a->m_sFolder,0,-1)), basename(substr($b->m_sFolder,0,-1)));
    }

    // Parse details from ini file. $bAllDetails is ignored and is always true
    function ParseDetails(&$ini_array,$bAllDetails)
    {
        die("Abstract function!");
    }

    // Get value of a custom field or empty string if now value found
    function GetCustomField($var)
    {
        if (isset($this->m_arrCustomFields[$var]))
            return $this->m_arrCustomFields[$var];
        return "";
    }

    // Useful function to format border graphics around folders and images
    function FormatBorderGraphics(&$fg, $imgCode, $nThmX, $nThmY)
    {
        global $g_sThumbnailXSize, $g_sThumbnailYSize;

        $onerror=' onError="javascript: dalbum_imageError(this);" ';

        // Hide onerror from validators.
        if (!stristr($_SERVER['HTTP_USER_AGENT'],"MSIE") &&
            !stristr($_SERVER['HTTP_USER_AGENT'],"Mozilla") &&
            !stristr($_SERVER['HTTP_USER_AGENT'],"Opera"))
            $onerror="";

        $std=' class="nothing" alt="" ' . $onerror;

        $root=DALBUM_BROWSERROOT;

        if ($nThmX==0 || $nThmY==0)
        {
            $nThmX=$fg['blank'][1];
            $nThmY=$fg['blank'][2];
            $imgCode="<IMG src=\"$root{$fg['blank'][0]}\" HEIGHT=\"{$fg['blank'][2]}\" Width=\"{$fg['blank'][1]}\"  $std >";
        }
        else
        {
            $nThmX+=$fg['borderx']*2;
            $nThmY+=$fg['bordery']*2;
        }

        $bordx=$fg['w'][1]+$fg['e'][1];
        $bordy=$fg['n'][2]+$fg['s'][2];

        $x=$fg['sizex'];
        $y=$fg['sizey'];

        if (($x-$bordx-$nThmX)&1)
            $x++;
        if (($y-$bordy-$nThmY)&1)
            $y++;

        $middlex=$x-$bordx;
        $middley=$y-$bordy;
        $extrax=($x-$bordx-$nThmX)/2;
        $extray=($y-$bordy-$nThmY)/2;

        $topRowY=$fg['nw'][2];
        $btmRowY=$fg['sw'][2];

        $lastX1=$x-$fg['nw'][1]-$fg['ne'][1];
        $lastX2=$x-$fg['sw'][1]-$fg['se'][1];

        $totalX=$fg['w'][1] + $middlex + $fg['e'][1];

        $ret = <<< END
<span class="fldimgrow" style="height:{$topRowY}px;width:$totalX!important;">
<img width={$fg['nw'][1]}   height=$topRowY src="$root{$fg['nw'][0]}" $std>
<img WIDTH=$lastX1          height=$topRowY src="$root{$fg['n'][0]}"  $std>
<img width={$fg['ne'][1]}   height=$topRowY src="$root{$fg['ne'][0]}" $std>
</span>
<span class="fldimgrow" style="height:{$extray}px;width:$totalX!important;">
<img width={$fg['w'][1]}    HEIGHT=$extray src="$root{$fg['w'][0]}" $std >
<img width=$middlex         HEIGHT=$extray src="$root{$fg['blank'][0]}" $std >
<img width={$fg['e'][1]}    HEIGHT=$extray src="$root{$fg['e'][0]}" $std >
</span>
<span class="fldimgrow" style="height:{$nThmY}px;width:$totalX!important;">
<img width={$fg['w'][1]}   HEIGHT=$nThmY src="$root{$fg['w'][0]}" $std>
<img width=$extrax         HEIGHT=$nThmY src="$root{$fg['blank'][0]}" $std>
$imgCode
<img width=$extrax         HEIGHT=$nThmY src="$root{$fg['blank'][0]}" $std>
<img width={$fg['e'][1]}   HEIGHT=$nThmY src="$root{$fg['e'][0]}" $std>
</span>
<span class="fldimgrow" style="height:{$extray}px;width:$totalX!important;">
<img width={$fg['w'][1]}    HEIGHT=$extray src="$root{$fg['w'][0]}" $std >
<img width=$middlex         HEIGHT=$extray src="$root{$fg['blank'][0]}" $std >
<img width={$fg['e'][1]}    HEIGHT=$extray src="$root{$fg['e'][0]}" $std >
</span>
<span class="fldimgrow" style="height:$root{$fg['sw'][2]}px;width:$totalX!important;">
<img width={$fg['sw'][1]}   height={$fg['sw'][2]} src="$root{$fg['sw'][0]}" $std>
<img WIDTH=$lastX2          height={$fg['s'][2]} src="$root{$fg['s'][0]}" $std>
<img width={$fg['se'][1]}   height={$fg['sw'][2]} src="$root{$fg['se'][0]}" $std>
</span>
END;
        // remove all whitespace between tags.
        return preg_replace('/>(\s+)</','><',$ret);
    }


    // Overridables
    function IsImage() {}
    function GetTitle() {}
    function CreateThumbnailHTML($extralink="") {}

    // Initialize object
    function Reset()
    {
        $this->m_sTitle="";
        $this->m_sComment="";
        $this->m_sCommentHTML="";
        $this->m_arrCustomFields=array();
    }

    // Get HTML image comment
    function GetHTMLComment()
    {
        $ret="";
        if (!empty($this->m_sComment))
        {
            // Convert text to html
            $ret=str_replace("\n",'',nl2br(quotehtml($this->m_sComment)));
        }
        if (!empty($this->m_sCommentHTML))
        {
            $ret=$this->m_sCommentHTML;
        }
        return $ret;
    }

    // Get array of custom field names (ex. array("Width","Height"))
    function &GetCustomFieldNames()
    {
        $a=array();
        return $a;
    }
}


class CImage extends CBaseObject
{
    var $m_sBaseFilename;
    var $m_sFullFilename;
    var $m_nX,$m_nY;        // original resolution
    var $m_nResX,$m_nResY;  // resized image resolution
    var $m_nThmX,$m_nThmY;  // resized image resolution
    var $m_bResize;         // resize image (true by default)
    var $m_refAlbum;        // reference to album that contains this image

    function CImage()
    {
        $this->Reset();
    }

    function Reset()
    {
        parent::Reset();
        $m_refAlbum=null;
        $this->m_bResize=true;
        $this->m_nX=$this->m_nY=-1;     // original resolution
        $this->m_nResX=$this->m_nResY=-1;   // resized image resolution
        $this->m_nThmX=$this->m_nThmY=-1;   // resized image resolution
        $this->m_sTitle=$this->m_sCommentHTML=$this->m_sComment="";
    }


    function IsImage() { return true; }

    function Init($sFullFilename)
    {
        $this->m_sBaseFilename=basename(strval($sFullFilename));
        $this->m_sFullFilename=$sFullFilename;
    }

    // returns true if the $this->m_sBaseFilename file is image
    function IsImageFilename()
    {
        return preg_match('/.*\.(jpg|jpeg|gif|png)$/i',$this->m_sBaseFilename);
    }

    // returns true if file can be returned without access check.
    function SkipAccessCheck()
    {
        return false;
    }

    // returns image mime type for $this->m_sBaseFilename
    function GetImageMimeType()
    {
        if (preg_match('/.*\.gif$/i',$this->m_sBaseFilename))
            return "image/gif";
        elseif (preg_match('/.*\.png$/i',$this->m_sBaseFilename))
            return "image/png";
        else
            return "image/jpeg";
    }

    // Check existence or create image thumbnail and resized image
    function CreateThumbnail($bResizeIfNotExist=true, $bAlways=false, $bCheckExistenceOnly=false)
    {
        $this->m_nX=$this->m_nY=-1;     // original resolution
        $this->m_nResX=$this->m_nResY=-1;   // resized image resolution
        $this->m_nThmX=$this->m_nThmY=-1;   // resized image resolution

        $sFile=absfname($this->m_sFullFilename);

        // Get main file size
        $im = @getimagesize($sFile); /* Attempt to open */

        if (empty($im))
            return "Unable to get image size of original image [{$this->m_sFullFilename}]";

        $this->m_nX=$im[0];
        $this->m_nY=$im[1];

        // If image is smaller than requested resized image, leave it as is
        global $g_sResizedXSize,$g_sResizedYSize;
        if ($g_sResizedXSize>=$this->m_nX &&
            $g_sResizedYSize>=$this->m_nY)
            $this->m_bResize=false;

        $resFilename=absfname($this->GetResizedFilename());

        unset($im);
        if (@file_exists($resFilename))
            if ($bCheckExistenceOnly)
                $im=array(1,1);
            else
                $im = @getimagesize($resFilename); /* Attempt to open */

        if (empty($im) || $bAlways)
        {
            if ($bResizeIfNotExist)
            {
                if ($this->m_bResize)
                {
                    $error=resizeImage($sFile, $resFilename, true);
                    if (!empty($error))
                        return $error;
                }

                // Get size again
                $im = @getimagesize($resFilename); /* Attempt to open */
            }
            if (empty($im))
                return "Unable to get image size of resized image [$resFilename]";
        }
        $this->m_nResX=$im[0];
        $this->m_nResY=$im[1];

        return $this->UpdateThumbnailSize($bResizeIfNotExist,$bAlways,$bCheckExistenceOnly);
    }

    // Just update thumbnail size, do not touch resized image
    function UpdateThumbnailSize( $bResizeIfNotExist=true, $bAlways=false, $bCheckExistenceOnly=false )
    {
        $thmFilename=absfname($this->GetThumbnailFilename());
        $sFile=absfname($this->m_sFullFilename);
        // Thumbnail
        if (@file_exists($thmFilename))
            if ($bCheckExistenceOnly)
                $im=array(1,1);
            else
                $im = @getimagesize($thmFilename); /* Attempt to open */

        if (empty($im) || $bAlways)
        {
            if ($bResizeIfNotExist)
            {
                $error=resizeImage($sFile, $thmFilename, false);
                if (!empty($error))
                    return $error;
                $im = @getimagesize($thmFilename); /* Attempt to open */
            }
            if (empty($im))
                return "Unable to get image size of thumbnail image [$thmFilename]";
        }
        $this->m_nThmX=$im[0];
        $this->m_nThmY=$im[1];

        return "";
    }

    // Get thumbnail/resized image filename
    function GetThumbnailFilename()
    {
        global $g_sThumbnailPath, $g_sThumbnailPrefix, $g_sResizeMethod;

        $dir=dirname_ex($this->m_sFullFilename) . "/" . $g_sThumbnailPath;

        // GD library cannot create GIFs, so create PNG instead
        $extraext="";
        if ($g_sResizeMethod=="GD" && strcasecmp(getext($this->m_sBaseFilename),"gif")==0)
             $extraext.=".png";

        return $dir . "/" . $g_sThumbnailPrefix . basename(strval($this->m_sBaseFilename)) . $extraext;
    }

    // Get filename of the resized image
    function GetResizedFilename()
    {
        global $g_sResizedPath, $g_sResizedPrefix, $g_sResizeMethod;

        if (!$this->m_bResize)
            return $this->m_sFullFilename;

        // GD library cannot create GIFs, so create PNG instead
        $extraext="";
        if ($g_sResizeMethod=="GD" && strcasecmp(getext($this->m_sBaseFilename),"gif")==0)
             $extraext.=".png";

        $dir=dirname_ex($this->m_sFullFilename) . "/" . $g_sResizedPath;
        return $dir . "/" . $g_sResizedPrefix . basename(strval($this->m_sBaseFilename)) . $extraext;
    }


    // Get image title as HTML
    function GetTitle()
    {
        $title=quotehtml($this->m_sTitle);
        if (empty($title))
            $title=filename2title_default($this->m_sFullFilename);
        return $title;
    }

    // Create thumbnail HTML element with link
    function CreateThumbnailHTML($extralink="")
    {
        global $g_sThumbnailPath, $g_sThumbnailPrefix;
        global $g_sThumbnailXSize, $g_sThumbnailYSize;

        if ($this->m_nThmX<=0 || $this->m_nThmY<=0)
            $this->UpdateThumbnailSize(false);

        $sFile=$this->m_sFullFilename;
        $sFileEnc=quoteurl($sFile);
        $sThmFile=secureurl($this->GetThumbnailFilename());

        $widthHeight="";
        if ($this->m_nThmY>0 && $this->m_nThmX>0)
        {
            $widthHeight="height=\"{$this->m_nThmY}px\" width=\"{$this->m_nThmX}px\"";
        }

        $title="<span class=\"imageTitle\">" . $this->GetTitle() . "</span>";
        if (function_exists("customTitle"))
            $title=customTitle($this,$title);

        // customImageExtra is deprecated
        if (function_exists("customImageExtra"))
            $title.=customImageExtra($this);

        $imgCode= '<img src="' . $sThmFile . '" ' . $widthHeight . ' style="float:none;" alt="" class="imagethumb">';

        $href="showimg.php?file=$sFileEnc";

        $href=translateRef($href);

        $ret = "<a href=\"$href\" class=\"imglink\" $extralink onclick=\"javascript: dalbum_followLink(this);\">";

        // Perhaps we need to draw graphics borders images
        $fg=array();
        if (function_exists('customGetImageBorders') && customGetImageBorders($this,$fg,$this->m_nThmX,$this->m_nThmY))
            $ret.=$this->FormatBorderGraphics($fg, $imgCode, $this->m_nThmX, $this->m_nThmY);
        else
            $ret.= "$imgCode";
        $ret.= $title;
        $ret.= "</a>";
        return $ret;
    }

    // Parse object details from ini_array. $bAllDetails is ignored and is always true
    function ParseDetails(&$ini_array,$bAllDetails)
    {
        // GIFs are not resized by default
        $this->m_bResize=!preg_match('/.*\.(gif|png)$/i',$this->m_sBaseFilename);

        if (!isset($ini_array[$this->m_sBaseFilename]))
            return;

        $f=&$ini_array[$this->m_sBaseFilename];

        if (isset($f['Comment']))
            $this->m_sComment=@$f['Comment'];
        if (isset($f['CommentHTML']))
            $this->m_sCommentHTML=@$f['CommentHTML'];
        if (isset($f['Title']))
            $this->m_sTitle=@$f['Title'];

        // Parse custom fields
        $fields=$this->GetCustomFieldNames();
        foreach ($fields as $fld)
        {
            if (isset($f[$fld]))
                $this->m_arrCustomFields[$fld]=$f[$fld];
        }
        if (isset($f['Resize']))
            $this->m_bResize=(@$f['Resize']?true:false);
    }

    // This function is called by showimg.php when image is resolved, but
    // no other page code has been executed. Override to show/hide toolbard buttons etc.
    function BeforeDisplay()
    {
    }
}




class CAlbum extends CBaseObject
{
    var $m_sFolder;
    var $m_sDate;
    var $m_bDefault;
    var $m_bDynamic;
    var $m_arrUsers;

    var $m_sTitleImage;

    var $m_bPrivate;
    var $m_nImages;

    var $m_arrContents;


    function __sleep()
    {
        $this->DeleteImagesFromContents();
        return array('m_nImages','m_bDefault','m_sFolder','m_arrContents','m_arrUsers','m_sTitle','m_sTitleImage','m_arrCustomFields','m_bDynamic');
    }
    function __wakeup()
    {
        $this->m_sComment="";
        $this->m_sCommentHTML="";

    }

    function CAlbum()
    {
        $this->Reset();
    }

    function IsImage()
    {
        return false;
    }

    //
    function Reset()
    {
        parent::Reset();
        $this->m_bPrivate=false;
        $this->m_sFolder='';
        $this->m_sTitleImage='';
        $this->m_sDate='';
        $this->m_arrContents=array();
        $this->m_arrUsers=null;
        $this->m_bDefault=false;
        $this->m_nImages=0;
        $this->m_bDynamic=false;
    }

    // Load serialized album tree
    function &CreateFromArchive()
    {
        global $g_sPrivateDir;
        $alb=&createAlbum();
        $alb->m_sTitle="Empty";

        $filename=$g_sPrivateDir . "/.album_index.dat";

        if (@file_exists($filename))
        {
            $handle = @fopen ($filename, "rb");
            if ($handle)
            {
                @clearstatcache();
                $size=filesize ($filename);
                $alb=unserialize(fread ($handle, $size));
                fclose ($handle);
            }
        }
        return $alb;
    }

    // Remove unused thumbnails/resized images from the album
    function CleanupThumbnails()
    {
        global $g_sThumbnailPath, $g_sThumbnailPrefix;
        global $g_sResizedPath, $g_sResizedPrefix;

        // enumerate all files
        for ($nFolder=0;$nFolder<2;++$nFolder)
        {
            $folder=$this->m_sFolder . ($nFolder?$g_sThumbnailPath:$g_sResizedPath);
            $prefix=($nFolder?$g_sThumbnailPrefix:$g_sResizedPrefix);

            // Create array of allowed files
            $allowed=array();
            for ($i=0;$i<count($this->m_arrContents);++$i)
            {
                if ($this->m_arrContents[$i]->IsImage())
                {
                    $allowed[]=($prefix.$this->m_arrContents[$i]->m_sBaseFilename);
                }
            }

            // Open directory
            if(is_dir(absfname($folder)) && ($handle = @opendir(absfname($folder))))
            {
                $delete=array();
                // Loop through all files
                while(false !== ($file = readdir($handle)))
                {
                    // Ignore hidden files
                    if($file{0}=="." || $file{0}=="_")
                        continue;

                    if (!in_array($file,$allowed))
                    {
                        // Put dirs in $dirs[] and files in $files[]
                        $s=$folder . "/" . $file;
                        @unlink(absfname($s));
                    }
                }
                closedir($handle);
            }
        }
    }

    // Scan the directory and create underlying albums
    //
    //  $bReserved has no effect, and left for historical reasons only.
    //
    //  All real clean up, .htaccess creation etc. is now done in
    //  updateInfo method
    function Create($sPath, $parentUsers,$bReserved, $bDeleteImages=false)
    {
        // $sp = $sPath with / at the end
        $sp=trim($sPath);
        if (substr($sp,-1)!='/')
            $sp.='/';

        global $g_sDefaultAccess;

        // Try to get .albumdef.ini
        $this->m_sFolder=$sp;
        $this->m_arrUsers=explode(",",$g_sDefaultAccess);
        //if (in_array('all',$this->m_arrUsers))
          //  $this->m_arrUsers=array();

        // Rename older version
        global $g_sAlbumdef;
        if (@file_exists(absfname($sp."_albumDef.ini")))
            rename(absfname($sp."_albumDef.ini"),absfname($sp.$g_sAlbumdef));

        $ini_array = better_parse_ini_file(absfname($sp.$g_sAlbumdef),TRUE);

        if (!empty($ini_array))
        {
            if (isset($ini_array['Album']['Ignore']))
                return false;
        }

        // Load album details from INI.
        $this->LoadDetails($ini_array);

        if($handle = opendir(absfname($sPath)))
        {
            // Loop through all files
            while(false !== ($file = readdir($handle)))
            {
                // Ignore hidden files
                if($file{0}=="." || $file{0}=="_")
                    continue;

                // Put dirs in $dirs[] and files in $files[]
                $s=$sp . $file;

                if(@is_dir(absfname($s)))
                {
                    $alb=&createAlbum();
                    if ($alb->Create($s,$this->m_arrUsers,$bReserved,$bDeleteImages))
                        $this->m_arrContents[]=&$alb;
                }
                else
                    $this->AddImage($file);
            }
            closedir($handle);
        }

        // Delete images
        if ($bDeleteImages)
            $this->DeleteImagesFromContents();

        // Sort files
        $this->Sort();


        return true;
    }


    function UpdateInfo(&$albRoot)
    {
        // $sp = $sPath with / at the end
        $sp=$this->m_sFolder;


        global $g_sAlbumdef;

        // Load albumdef.ini
        $ini_array = better_parse_ini_file(absfname($sp.$g_sAlbumdef),TRUE);
        if (!empty($ini_array))
        {
            if (isset($ini_array['Album']['Ignore']))
                return false;
        }

        // Load image list
        $this->LoadImages();

        // Sort files
        $this->Sort();

        // Load album details from INI.
        $this->LoadDetails($ini_array);

        // Create default ini file
        if (!create_defaultIni($this))
        {
            // Write failed, perhaps permissions are wrong. Try to reset them.
            global $g_newDirRights;

            $dir=substr(absfname($this->m_sFolder),0,-1);
            if (!is_dir($dir) || !is_writable($dir))
            {
                if (dalbum_mkdir($dir,$g_newDirRights,true))
                    create_defaultIni($this);
            }
        }

        // Find out about users of the parent album. First of all, find that parent album
        $parentUsers=array();
        if ($albRoot->m_sFolder!=$this->m_sFolder)
        {
            $albParent=$albRoot->FindAlbum(dirname_ex(substr($this->m_sFolder,0,-1)));
            if ($albParent)
                $parentUsers=$albParent->m_arrUsers;
        }

        // Create or delete .htaccess file
        sort($this->m_arrUsers);
        sort($parentUsers);

        global $g_bDirectAccess,$g_nFileAccessCheckLevel;

        if ((join(",",$parentUsers)==join(",",$this->m_arrUsers) ||
            $g_bDirectAccess==false && $g_nFileAccessCheckLevel==0))
            delete_htaccess(absfname($this->m_sFolder));
        else
            create_htaccess(absfname($this->m_sFolder),$this->m_arrUsers);

        if ($g_bDirectAccess==false)
        {
            global $g_sThumbnailPath,$g_nFileAccessCheckLevel;
            $thmAccessDir=absfname($this->m_sFolder).$g_sThumbnailPath."/";

            if ($g_nFileAccessCheckLevel==1)
            {
                create_htaccess($thmAccessDir,array("all"));
            }
            else
                delete_htaccess($thmAccessDir);
        }

        return true;
    }


    // Sort contents. Warning: Albums must ALWAYS precede Images
    function Sort()
    {
        if (!empty($this->m_arrContents))
            usort($this->m_arrContents,array(get_class($this),"cmpAlb"));
    }

    function DeleteImagesFromContents()
    {
        // Delete all images from contents
        $b=array();
        for ($i=0;$i<count($this->m_arrContents);$i++)
        {
            if (!$this->m_arrContents[$i]->IsImage())
                $b[]=&$this->m_arrContents[$i];
        }
        $this->m_arrContents=&$b;
    }

    function AddImage($file)
    {
        // Put dirs in $dirs[] and files in $files[]
        $s=$this->m_sFolder . $file;

        if (!@file_exists(absfname($s)) || !@is_file(absfname($s)))
            return;

        $image=&createImage();
        $image->Init($s);
        if (!$image->IsImageFilename())
            return;

        if (!strcasecmp(getfname($file),'.folder') || !strcasecmp(getfname($file),'_folder'))
        {
            $this->m_sFolderImage=$file;
        }

        // Ignore hidden files
        if ($file{0}=="." || $file{0}=="_" )
            return;

        // Put dirs in $dirs[] and files in $files[]
        $s=$this->m_sFolder . $file;

        $image->m_refAlbum=&$this;
        $image->m_sBaseFilename=$file;
        $image->m_sFullFilename=$s;
        $this->m_arrContents[]=&$image;
        $this->m_nImages++;
    }


    // Scan album directory and add all found images
    function LoadImages()
    {
        do
        {
            $bRename=false;
            $this->DeleteImagesFromContents();

            $this->m_nImages=0;
            // Open directory

            $sFullDir=absfname($this->m_sFolder);
            if(@is_dir($sFullDir) && ($handle = @opendir($sFullDir)))
            {
                // Loop through all files
                while(false !== ($file = readdir($handle)))
                {
                    $this->AddImage($file);
                }
                closedir($handle);
            }
        }while ($bRename);


    }

    // Load details from .albumdef.ini
    // $bAllDetails is ignored and is always true
    function LoadDetails($ini_array=null,$bAllDetails=true)
    {
        $sp=$this->m_sFolder;
        if (empty($sp))
            return false;

        global $g_sAlbumdef;

        if (empty($ini_array))
            $ini_array = better_parse_ini_file(absfname($sp.$g_sAlbumdef),TRUE);

        // Try to get albumdef.ini
        if (!empty($ini_array))
        {
            $this->ParseDetails($ini_array,$bAllDetails);
        }
        // Process files (for details)
        for ($i=0;$i<count($this->m_arrContents);++$i)
        {
            $obj=&$this->m_arrContents[$i];
            if (!$obj->IsImage())
                continue;
            $obj->ParseDetails($ini_array,$bAllDetails);
        }

        // Sort files and albums
        $this->Sort();

        return true;
    }

    // Parse object details from ini_array. $bAllDetails is ignored and is always true
    function ParseDetails(&$ini_array,$bAllDetails)
    {
        $f=&$ini_array['Album'];
        if (isset($f['TitleImage']))
            $this->m_sTitleImage=$f['TitleImage'];

        if (isset($f['Default']))
            $this->m_bDefault=($f['Default']?1:0);

        if (isset($f['Access']))
        {
            $this->m_arrUsers=array();
            $s=trim($f['Access']);
            if (!empty($s))
            {
                $users=explode(",",$s);
                foreach ($users as $u)
                {
                    $u=trim($u);
                    if (!empty($u))
                        $this->m_arrUsers[]=$u;
                }
            }
            sort($this->m_arrUsers);
        }

        if (isset($f['Title']))
            $this->m_sTitle=$f['Title'];
        if (isset($f['Comment']))
            $this->m_sComment=@$ini_array['Album']['Comment'];
        if (isset($f['CommentHTML']))
            $this->m_sCommentHTML=@$f['CommentHTML'];
        if (isset($f['Date']))
            $this->m_sDate=$f['Date'];
        if (isset($f['Dynamic']))
        {
            $this->m_bDynamic=!!$f['Dynamic'];
        }

        // Parse custom fields
        $fields=$this->GetCustomFieldNames();
        foreach ($fields as $fld)
        {
            if (isset($f[$fld]))
                $this->m_arrCustomFields[$fld]=$f[$fld];
        }
    }

    // Override this function to customize tree output (change node icons, texts etc.)
    function GetTreeNodeCode($myID,$nParentID,$sText,$sRef)
    {
        if ($this->m_bDynamic)
            return "d.add($myID,$nParentID,'$sText','$sRef','','','','',false,true);\n";
        else
            return "d.add($myID,$nParentID,'$sText','$sRef','','','');\n";
    }

    // Create code for the tree on index page
    function CreateTreeElemCode(&$sTreeJS, $sPageURL,$nParentID,$sFocus,$nLevel, $sCurrentFolder="")
    {
        static $id=0;

        if ($this->m_bPrivate )
            return -1;

        $s=$this->GetTitle();
        $ref=translateRef("$sPageURL?folder=" . quoteurl($this->m_sFolder));

        $myID=$id++;

        $nRet=-1;
        if ($ref==$sFocus)
            $nRet=$myID;

        $sTreeJS.= $this->GetTreeNodeCode($myID,$nParentID,$s,$ref);

        // Proceed with chilren
        $folder="";
        if (isset($sCurrentFolder))
            $folder=$sCurrentFolder;

        if (!$this->m_bDynamic || (strlen($folder) && substr($folder,0,strlen($this->m_sFolder))==$this->m_sFolder))
        {

            $bFound=false;

            for ($i=0;$i<count($this->m_arrContents);++$i)
            {
                $obj=&$this->m_arrContents[$i];
                if ($obj->IsImage())
                    break;

                $z = $obj->CreateTreeElemCode($sTreeJS,$sPageURL,$myID,$sFocus,$nLevel+1,$sCurrentFolder);
                if ($z!=-1)
                    $nRet=$z;
            }
        }
        return $nRet;
    }

    // Get album title
    function GetTitle()
    {
        $t=$this->m_sTitle;
        if (empty($t))
        {
            $f=$this->m_sFolder;
            while (substr($f,-1)=='/')
                $f=substr($f,0,-1);
            $t=filename2title_default($f);
        }
        return quotehtml($t);
    }

    // Create thumbnail link for thumbview
    function CreateThumbnailHTML($extralink="")
    {
        global $g_sThumbnailXSize, $g_sThumbnailYSize;

        // Find file from the album
        $nThmX=0;
        $nThmY=0;
        $nThumbnailFile=0;
        $sImg="";
        $image=null;
        $firstimage=null;

        $this->LoadImages();
        for ($i=0;$i<count($this->m_arrContents);++$i)
            if ($this->m_arrContents[$i]->IsImage())
            {
                if ($firstimage===null)
                    $firstimage=&$this->m_arrContents[$i];
                if (empty($this->m_sTitleImage))
                    break;
                if ($this->m_arrContents[$i]->m_sBaseFilename==$this->m_sTitleImage)
                {
                    $image=&$this->m_arrContents[$i];
                    break;
                }
            }

        $onerror=' onError="javascript: dalbum_imageError(this);" ';

        // Hide onerror from validators.
        if (!stristr($_SERVER['HTTP_USER_AGENT'],"MSIE") &&
            !stristr($_SERVER['HTTP_USER_AGENT'],"Mozilla") &&
            !stristr($_SERVER['HTTP_USER_AGENT'],"Opera"))
            $onerror="";

        $std2=' class="folderthumb" ' . $onerror;
        if ($image===null && !empty($this->m_sFolderImage))
        {

            $im=@getimagesize(absfname($this->m_sFolder . $this->m_sFolderImage));
            if (!empty($im))
            {
                $nThmX=$im[0];
                $nThmY=$im[1];
                if ($nThmX>$g_sThumbnailXSize ||
                    $nThmY>$g_sThumbnailYSize)
                {
                    $nThmX=0;
                    $nThmY=0;
                }
                else
                {
                    $sThmFile=secureURL($this->m_sFolder . $this->m_sFolderImage);

                    $sImg="<IMG src=\"$sThmFile\" HEIGHT=\"$nThmY\" Width=\"$nThmX\"  $std2 alt=\"" . $this->GetTitle() . "\">";
                }
            }
        }
        if ($image===null && ($nThmX==0 || $nThmY==0))
            $image=$firstimage;

        $fname="";
        $alt="";
        if (!empty($image))
        {
            $image->UpdateThumbnailSize(false,false);
            $sThmFile=secureURL($image->GetThumbnailFilename());
            $nThmY=$image->m_nThmY;
            $nThmX=$image->m_nThmX;
            if ($nThmX>0 && $nThmY>0)
            {
                $sImg="<IMG src=\"$sThmFile\" HEIGHT=\"$nThmY\" Width=\"$nThmX\"  $std2 alt=\"" . $this->GetTitle() . "\">";
            }
            else
                $nThmX=$nThmY=0;
        }

        if (!function_exists('customGetFolderBorders') ||
            !customGetFolderBorders($this,$fg,$nThmX,$nThmY))
        {
            $fg=array();
            $fg['sizex']=$g_sThumbnailXSize+35;
            $fg['sizey']=$g_sThumbnailYSize+35;
            $fg['borderx']=1;
            $fg['bordery']=1;
            $fg['blank']=array('images/folder/pixels.gif',10,10);
            $fg['nw']=array('images/folder/lefttop.gif',68,18);
            $fg['n']=array('images/folder/tophl.gif',1,18);
            $fg['ne']=array('images/folder/righttop.gif',8,18);
            $fg['w']=array('images/folder/leftvl.gif',3,1);
            $fg['e']=array('images/folder/rightvl.gif',3,1);
            $fg['sw']=array('images/folder/leftbtm.gif',68,7);
            $fg['s']=array('images/folder/bottomhl.gif',1,7);
            $fg['se']=array('images/folder/rightbtm.gif',8,7);
        }


        $title='<span class="imageTitle">' . $this->GetTitle() .'</span>';
        if (function_exists("customTitle"))
            $title=customTitle($this,$title);

        $href=translateRef("index.php?folder=".quoteurl($this->m_sFolder));

        $code=$this->FormatBorderGraphics($fg,$sImg,$nThmX,$nThmY);

        $ret = <<< END
<a href="$href" class="fldlink" $extralink onclick="javascript: dalbum_followLink(this);">
    {$code}$title</a>
END;
        // remove all whitespace between tags.
        return $ret;
    }

    // Access control for the user
    function SetAccess($sUser,$bSetPrivate=false)
    {
        if (substr($sUser,0,1)=='-')
        {
            $bRet=true;
            foreach ($this->m_arrUsers as $u)
            {
                $u=trim($u);
                if ($u==trim($sUser))
                {
                    $bRet=false;
                    break;
                }
            }

            // Recursively process sub-albums
            $br1=true;
            $a=array();
            for ($i=0;$i<count($this->m_arrContents);++$i)
            {
                if ($bRet)
                    $this->m_arrContents[$i]->SetAccess($sUser);
                if (!$this->m_arrContents[$i]->m_bPrivate)
                {
                    $br1=false;
                    $a[]=&$this->m_arrContents[$i];
                }
            }
            $this->m_arrContents=&$a;
            $this->m_bPrivate=($bRet && $br1);
            return;
        }


        $this->m_bPrivate=true;
        if (!$bSetPrivate)
        {
            if (empty($this->m_arrUsers) || in_array('all',$this->m_arrUsers))
                $this->m_bPrivate=false;
            else if (!empty($sUser))
            {
                foreach ($this->m_arrUsers as $u)
                {
                    $u=trim($u);
                    if ($u==trim($sUser) || $u=='valid-user' || $u=='all')
                    {
                        $this->m_bPrivate=false;
                        break;
                    }
                }
            }
        }

        // Recursively process sub-albums
        for ($i=0;$i<count($this->m_arrContents);++$i)
            if (!$this->m_arrContents[$i]->IsImage())
                $this->m_arrContents[$i]->SetAccess($sUser,$this->m_bPrivate);
    }

    // Find default album for the current user
    function &FindDefaultAlbum($sUserName="")
    {
        $ret=null;
        if (!$this->m_bPrivate)
        {
            for ($i=0;$i<count($this->m_arrContents);++$i)
            {
                if (!$this->m_arrContents[$i]->IsImage())
                {
                    $x=&$this->m_arrContents[$i]->FindDefaultAlbum($sUserName);
                    if ($x != null)
                        $ret=$x;
                }
            }

            if (substr($sUserName,0,1)=='-')
            {
                foreach ($this->m_arrUsers as $u)
                {
                    $u=trim($u);
                    if ($u==trim($sUserName))
                        $ret=$this;
                }
            }

            if ($this->m_bDefault)
                $ret=$this;
        }

        return $ret;
    }

    // Find album given album folder
    function &FindAlbum($sFolder)
    {
        $sFolder=trim($sFolder);
        if (substr($sFolder,-1)!='/')
            $sFolder.='/';

        $nCount=count($this->m_arrContents);
        if ($this->m_sFolder==$sFolder)
            return $this;

        for ($i=0;$i<$nCount;++$i)
        {
            if (!$this->m_arrContents[$i]->IsImage())
            {
                $x=&$this->m_arrContents[$i]->FindAlbum($sFolder);
                if ($x != null)
                    return $x;
            }
        }
        $vnull=null;
        return $vnull;
    }

    // This function is called by index.php when album has been resolved but
    // before any other processing begin. Change number of rows/columns in thumbview here.
    function BeforeDisplay()
    {
    }
}

// Load album tree, update information about a particular album
// from .albumdef.ini
function RefreshAlbumAndSaveTree($sFolder)
{
    $albRoot=CAlbum::CreateFromArchive();
    $alb=&$albRoot->FindAlbum($sFolder);
    if (!empty($alb))
    {
        // Need to get users of parent folder
        $users=array();
        $arr="";
        if (preg_match('~^(.*/)(.*)/$~',$sFolder,$arr))
        {
            $albParent=&$albRoot->FindAlbum($arr[1]);
            if (!empty($albParent))
                $users=$albParent->m_arrUsers;
        }
        sort($users);

        // Update folder (this fill create needed htaccess files)
        $alb->Reset();
        $alb->Create($sFolder, $users,false,true);

        // Save the tree
        global $g_sPrivateDir;
        $file=$g_sPrivateDir . "/.album_index.dat";
        if (!@save_file($file,serialize($albRoot),"wb"))
        {
            return false;
        }
    }
    return true;
}
?>
