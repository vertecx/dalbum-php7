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

    define("DALBUM_SHOWIMG_PAGE","1");

    require_once(DALBUM_ROOT . "/include/functions.php");
    require_once(DALBUM_ROOT . "/include/md5crypt.php");
    require_once(file_exists(DALBUM_ROOT."/config/config.php")?DALBUM_ROOT."/config/config.php":DALBUM_ROOT."/include/config.php");
    require_once(DALBUM_ROOT."/include/conffix.php");
    require_once(DALBUM_ROOT."/include/createhta.php");
    require_once(DALBUM_ROOT."/include/createini.php");
    require_once(DALBUM_ROOT."/include/album.php");
    require_once(DALBUM_ROOT."/include/timer.php");

    // Include custom functions
    if (file_exists(DALBUM_ROOT . "/config/custom.php"))
        include_once(DALBUM_ROOT . "/config/custom.php");
    elseif (file_exists(DALBUM_ROOT . "/include/custom.php"))
        include_once(DALBUM_ROOT . "/include/custom.php");

    if ($g_bGZip)
        ob_start("ob_gzhandler");

    $timer=new CTimer();

    $sUserName=StartSessionAndGetUserName('private; must-revalidate');
    if (function_exists('everypageCallback'))
        everypageCallback($sUserName);

    $sFile=@$_GET['file'];
    $bShowDetails=false;
    if (isset($_GET['details']))
        $bShowDetails=(@$_GET['details']?1:0);

    $nRotation=0;
    if (isset($_GET['rotate']))
        $nRotation=@$_GET['rotate'];

    $bUpdate=0;
    if (isset($_GET['update']))
        $bUpdate=$_GET['update'];

    if ($sFile=="")
    {
        dalbum_relocate(translateRef("index.php"));
        return;
    }

    // Create tree
    $albRoot=&CAlbum::CreateFromArchive();
    $albRoot->SetAccess($sUserName);

    // Check if we are in administration mode
    $bAdminMode=isAdminMode($sUserName);

    // Find album of question
    $sAlbFolder=dirname_ex($sFile) . "/";
    if (empty($sAlbFolder))
    {
        dalbum_relocate(translateRef("index.php"));
        return;
    }

    $album=&$albRoot->FindAlbum($sAlbFolder);
    if (empty($album))
    {
        dalbum_relocate(translateRef("index.php"));
        return;
    }
    if ($album->m_bPrivate)
    {
        dalbum_relocate(translateRef("login.php?url=" . encodeCurrentLocation()));
        return;
    }

    $album->LoadImages();
    $album->LoadDetails();

    // Initialize links (first image, last image, previous image, next image)
    $prev="";
    $next="";
    $first="";
    $last="";
    $nextTitle="";
    $nextPrefetch="";
    $href="showimg.php";

    $n=-1;
    for ($i=0;$i<count($album->m_arrContents);++$i)
    {
        if ($album->m_arrContents[$i]->IsImage())
        {
            if (empty($first))
                $first="$href?file=".quoteurl($album->m_arrContents[$i]->m_sFullFilename);
            if ($bShowDetails)
                $first.="&amp;details=1";
            if ($album->m_arrContents[$i]->m_sBaseFilename==basename(strval($sFile)))
            {
                $n=$i;
                break;
            }
        }
    }

    if ($n==-1)
    {
        // Image not found
        dalbum_relocate(translateRef("index.php?folder=" . quoteurl($album->m_sFolder)));
        return;
    }

    // Load image details
    $image=&$album->m_arrContents[$n];
    $image->BeforeDisplay();
    $bResize=$image->m_bResize;

    $sUpdateError="";
    if ($bUpdate)
    {
        $sUpdateError=$image->CreateThumbnail(true,true);
    }
    else
        $image->CreateThumbnail(false,false);

    if ($image->m_bResize && ($image->m_nX>$g_sResizedXSize || $image->m_nY>$g_sResizedYSize))
    {
        if ($image->m_nResX<=0 || $image->m_nResY<=0)
        {
            $sPic="images/notavail.gif";
            $imgsizeX=$imgsizeY=120;
        }
        else
        {
            $sPic=secureURL($image->GetResizedFilename());
            $imgsizeY=$image->m_nResY;
            $imgsizeX=$image->m_nResX;
        }
    }
    else
    {
        $image->m_bResize=false;
        if ($image->m_nX<=0 || $image->m_nY<=0)
        {
            $sPic="images/notavail.gif";
            $imgsizeX=$imgsizeY=120;
        }
        else
        {
            $sPic=secureURL($image->m_sFullFilename);
            $imgsizeY=$image->m_nY;
            $imgsizeX=$image->m_nX;
        }
    }

    // Controls
    for ($i=$n-1;$i>=0;--$i)
        if ($album->m_arrContents[$i]->IsImage())
        {
            $prev="$href?file=".quoteurl($album->m_arrContents[$i]->m_sFullFilename);
            if ($bShowDetails)
                $prev.="&amp;details=1";
            break;
        }

    for ($i=$n+1;$i<count($album->m_arrContents);++$i)
        if ($album->m_arrContents[$i]->IsImage())
        {
            $next="$href?file=".quoteurl($album->m_arrContents[$i]->m_sFullFilename);
            if ($bShowDetails)
                $next.="&amp;details=1";
            $nextTitle=$album->m_arrContents[$i]->GetTitle();

            $np=$album->m_arrContents[$i]->GetResizedFilename();
            if (file_exists(absfname($np)))
                $nextPrefetch=secureURL($np);
            else
                $nextPrefetch=secureURL($album->m_arrContents[$i]->m_sFullFilename);

            break;
        }

    //
    $last="$href?file=".quoteurl($album->m_arrContents[count($album->m_arrContents)-1]->m_sFullFilename);
    if ($bShowDetails)
        $last.="&amp;details=1";

    if (!empty($next))  $next=translateRef($next);
    if (!empty($last))  $last=translateRef($last);
    if (!empty($prev))  $prev=translateRef($prev);
    if (!empty($first)) $first=translateRef($first);


    // image title and album title
    $albTitle=html2txt($album->GetTitle());
    if (strlen($albTitle)>40)
        $albTitle=substr($albTitle,0,36)."...";
    $imTitle=html2txt($image->GetTitle());
    if (strlen($imTitle)>50)
        $imTitle=substr($imTitle,0,46)."...";

    // Index reference
    $index="index.php?folder=" .quoteurl($album->m_sFolder) ;
    $pn=(int)($n/$g_nPicturesPerPage);
    if (substr($album->m_sCommentHTML,0,1)=="!")
        $pn++;
    if ($pn>0)
        $index=$index . "&amp;page=" . $pn ;
    $index=translateRef($index);

    // Focus ctrl
    $focusCtrl=(empty($next)?'index':'next');

    // Links
    $links="";
    //if (!empty($nextPrefetch))
    //    $links.="<Link rel=prefetch href=\"$nextPrefetch\" >";

    // Chrome didn't  play well with prefetch, displaying cut pictures. This has apparently been fixed
    // if (!isset($_SERVER['HTTP_USER_AGENT']) || strstr($_SERVER['HTTP_USER_AGENT'],'AppleWebKit/')===FALSE)
    {
        if (!empty($next))
            $links.="<LINK rel=\"next\" href=\"$next\">";
        if (!empty($prev))
            $links.="<LINK rel=\"prev\" href=\"$prev\">";
        if (!empty($first))
            $links.="<LINK rel=\"first\" href=\"$first\">";
        if (!empty($last))
            $links.="<LINK rel=\"last\" href=\"$last\">";
        if (!empty($index))
            $links.="<LINK rel=\"up\" href=\"$index\">";
    }
    $links.="<LINK rel=\"top\" href=\"" . translateRef("index.php") . "\">";

    // Navigation bar
    $navBar=dalbumBeginToolbar("showimg");

    // [Previous] button
    $navBar.=getButton('prev',$prev, $lang['showPrevBtn'], $lang['showPrevBtnTitle'],0);

    // [Next] button
    $navBar.=getButton('next',$next, $lang['showNextBtn'], $lang['showNextBtnTitle'], 1);

    // [Index] button
    $navBar.=getButton('index',$index, $lang['showIndexBtn'], $lang['showIndexBtnTitle'], 2);

    // [Original image] button
    global $g_bShowOriginalImageButton;
    if ($g_bShowOriginalImageButton)
    {
        $size="{$image->m_nX}x{$image->m_nY}px, " . filesize_as_str(absfname($image->m_sFullFilename)) ;

        if ($g_bShowOriginalImageButton==2)
        {
            $bOld=$g_bDirectAccess;
            $g_bDirectAccess=false;

            $sFullLink=secureURL($image->m_sFullFilename);

            if (!strstr($sFullLink,"?"))
                $sFullLink.="?download=1";
            else
                $sFullLink.="&download=1";

            $g_bDirectAccess=$bOld;
        }
        else
            $sFullLink=secureURL($image->m_sFullFilename);



        if ($image->m_bResize)
            $navBar.=getButton('original',$sFullLink,
                    strtr($lang[($g_bShowOriginalImageButton==2)?'showHiResDownloadBtn':'showHiResBtn'],array('#size#'=>$size)),
                    strtr($lang[($g_bShowOriginalImageButton==2)?'showHiResDownloadBtnTitle':'showHiResBtnTitle'],array('#size#'=>$size)),
                    2,($g_bShowOriginalImageButton==2)?"":"big");
        else
            $navBar.=getButton('showimage',$sFullLink,$lang['showImageBtn'], $lang['showImageBtnTitle'],2,"big");
    }

    // EXIF Image details button
    global $g_bShowEXIFDetailsButton;
    if ($g_bShowEXIFDetailsButton)
    {
        $details=translateRef("$href?file=".quoteurl($image->m_sFullFilename));
        if (!$bShowDetails)
            $details.="&amp;details=1";
        $detailsText=$lang[$bShowDetails?"showHideDetailsBtn":"showShowDetailsBtn"];
        $detailsTitle=$lang[$bShowDetails?"showHideDetailsBtnTitle":"showShowDetailsBtnTitle"];
        $navBar.=getButton('details',$details,$detailsText,$detailsTitle,2);
    }

    // Update button
    $sUpdateButton="";
    global $g_bShowUpdateButton;
    if ($g_bShowUpdateButton && $bAdminMode)
    {
        $url=translateRef("$href?file=".quoteurl($image->m_sFullFilename));
        if ($bShowDetails)
            $url.="&amp;details=1";
        $url.= "&amp;update=1";
        $sUpdateButton=getButton('update',$url,$lang["showUpdateBtn"],$lang["showUpdateBtnTitle"],2);
    }

    // Rotation button
    $rotate="$href?file=".quoteurl($sFile);
    if ($bShowDetails)
        $rotate.="&amp;details=1";
    if ($nRotation!=3)
        $rotate.="&amp;rotate=" . ($nRotation+1);
    $rotate=translateRef($rotate);

    // Fullscreen
    $navBar.='<script type="text/javascript">' . "\n/" . "/<!--\n";
    if (!empty($sUpdateButton))
        $navBar.="document.write('" . js_escape($sUpdateButton) . "');\n";

    if (isset($g_bShowRotateButton) && $g_bShowRotateButton)
    {
        $rotate=js_escape(getButton('rotate',$rotate,$lang['showRotateBtn'],$lang['showRotateBtnTitle'],2));
        $navBar.="dalbum_writeRotateButton('$rotate');\n";
    }

    $btn1=js_escape(getButton('fullscreen','javascript:dalbum_fullScreen();',$lang['fullScreenBtn'], $lang['fullScreenBtnTitle'], 2));
    $btn2=js_escape(getButton('closewindow','javascript:window.close();',$lang['closeWindowBtn'], $lang['closeWindowBtnTitle'], 2));

    if ($g_bShowFullScreenButton)
        $navBar.="dalbum_writeFullScreen('$btn1','$btn2');\n";
    $navBar.="//-->\n</script>";
    $navBar.=dalbumEndToolbar("showimg");

    // Image title
    $sImageTitle="";
    $sImageTitle.= "<A href='$index' title='{$lang['showIndexBtnTitle']}'> " . quotehtml($albTitle) . "</A> &gt; " . quotehtml($imTitle);
    if (function_exists('customImageExtra'))
        $sImageTitle.=customImageExtra($image);

    // Image comment
    $sImageComment=$image->GetHTMLComment();
    if (!empty($sImageComment))
        $sImageComment="<table width=\"99%\" border=0 cellspacing=0 cellpadding=0><tr><td style=\"width:100%;\"><div class=\"comnt\">$sImageComment</div></td></tr></table>";

    // Exif details
    $sExifDetails="";

    if ($bShowDetails && $g_bShowEXIFDetailsButton)
    {

        // Read EXIF
        if ($g_bForceDAlbumEXIFCode || !extension_loaded('exif'))
        {
            require_once(DALBUM_ROOT . "/include/exif.php");
            $exif=@exif_php_read_data(absfname($image->m_sFullFilename));
        }
        else
        {
            $exif=@exif_read_data(absfname($image->m_sFullFilename));
        }

        if ($exif===false)
            $exif=array();

        $data=array();

        $data[]="{$lang['showExifFilename']}|{$image->m_sBaseFilename}";
        if (!isset($exif['FileSize']))
            $exif['FileSize']=@filesize(absfname($image->m_sFullFilename));

        $data[]="{$lang['showExifFilesize']}|{$exif['FileSize']} " . $lang['bytes'];
        if ($image->m_nX>0 && $image->m_nY>0)
            $data[]="{$lang['showExifResolution']}|{$image->m_nX}x{$image->m_nY} " . $lang['pixels'];


        // date
        $date="";

        if (isset($exif['DateTimeOriginal']))
            $date=$exif['DateTimeOriginal'];
        if (empty($date) && isset($exif['DateTime']))
            $date=$exif['DateTime'];

        if (!empty($date))
        {
            $date=explode(':',str_replace(' ',':',$date));
            $date="{$date[0]}-{$date[1]}-{$date[2]} {$date[3]}:{$date[4]}:{$date[5]}";
            $date=strftime($lang['showExifDateFormat'],strtotime($date));
            $data[]="{$lang['showExifDate']}|$date";
        }
        $make="";
        $model="";
        if (isset($exif['Make']))
        {
            $make=$exif['Make'];
            if (strstr($make," "))
            {
                $make=explode(" ",$make);
                $make=$make[0];
            }
        }
        if (isset($exif['Model']))
            $model=$exif['Model'];

        // Sometimes model contains make too
        if (!empty($model) &&  !empty($make) && stristr($model,$make)===false)
            $model=$make . " " . $model;

        if (!empty($model))
            $data[]="{$lang['showExifCamera']}|$model";

        // ISO speed
        $iso="";

        if (isset($exif['ISOSpeedRatings']))
            $iso=$exif['ISOSpeedRatings'];
        else if (isset($exif['MakerNote']) && isset($exif['ModeArray']))
        {
            // Add ISO for PowerShot cameras
            switch (@$exif['ModeArray'][16])
            {
                case 15: $iso="auto";break;
                case 16: $iso="50";break;
                case 17: $iso="100";break;
                case 18: $iso="200";break;
                case 19: $iso="400";break;
            }
        }

        if (!empty($iso))
            $data[]="{$lang['showExifISO']}|$iso";

        // Exposure
        if (isset($exif['ExposureTime']))
        {
            list($d1,$d2)=explode('/',$exif['ExposureTime']);
            if ($d1>0 && $d2>0)
                $e=$d1/$d2;
            else
                $e=$exif['ExposureTime'];
            if ($e<1 && $e>0)
                $e="1/" . round(1/$e,0) . " s";
            else
                $e=round($e,1) ." s";

            $data[]="{$lang['showExifExposure']}|$e";
        }
        if (isset($exif['COMPUTED']['ApertureFNumber']))
            $data[]="{$lang['showExifAperture']}|{$exif['COMPUTED']['ApertureFNumber']}";
        if (isset($exif['FocalLength']))
        {
            list($d1,$d2)=explode('/',$exif['FocalLength']);
            if ($d1>0 && $d2>0)
            {
                $e=round($d1/$d2,1);
                $data[]="{$lang['showExifFocalLength']}|$e mm";
            }
        }
        if (isset($exif['Flash']))
        {
            $e=$lang[($exif['Flash']&1)?'showExifFlashYes':'showExifFlashNo'];
            $data[]="{$lang['showExifFlash']}|$e";
        }
        if (!empty($data))
        {
            $sExifDetails.="<table>";
            $sExifDetails.="<tr><th colspan=2>{$lang['showExifDialogTitle']}</th></tr>";
            foreach ($data as $d)
            {
                list($name,$value)=explode('|',$d);
                $sExifDetails.=("<tr><td class='imgParamName'>$name</td><td class='imgParamValue'>$value</td></tr>");
            }
            $sExifDetails.= "</table>";
        }

        if (function_exists("customExifDetails"))
        {
            $sExifDetails=customExifDetails(    absfname($image->m_sFullFilename),
                                                $exif,
                                                $data );
        }
    }


    // Prepare template arguments
    $_template=array();
    $_template['Title']=quotehtml($albTitle). " &gt; " . quotehtml($imTitle);
    $links.="\n<META name=\"GENERATOR\" content=\"DAlbum $g_sVersion (c) 2003 DeltaX Inc. (www.dalbum.org)\">\n";
    $_template['Head']=$links;
    $_template['HeadJavascript']="function dalbum_onload() { }";
    $_template['ImageTitle']=$sImageTitle;
    $_template['ImageComment']=$sImageComment;
    $_template['NavigationBar']=$navBar;
    if (!empty($sExifDetails))
        $_template['ExifDetails']=$sExifDetails;

    if (!empty($next))
    {
        $_template['ImageHref']=$next;
        $_template['ImageAlt']=strtr($lang['showImageTitleImage'],array('#image#'=> $nextTitle));
    }
    else
    {
        $_template['ImageHref']=$index;
        $_template['ImageAlt']=$lang['showImageTitleIndex'];
    }
    $_template['ImageSrc']=$sPic;
    $_template['ImageSizeX']=$imgsizeX;
    $_template['ImageSizeY']=$imgsizeY;
    $_template['ImageWidthHeight']="width=\"$imgsizeX\" height=\"$imgsizeY\"";

    // MSIE on Macintosh features a weird problem with panorama distorsions.
    $bMSIEMac=false;
    if (stristr($_SERVER['HTTP_USER_AGENT'],"MSIE") &&
        stristr($_SERVER['HTTP_USER_AGENT'],"Mac"))
    {
        $_template['ImageWidthHeight']="height=\"$imgsizeY\"";
        $bMSIEMac=true;
    }

    // Generate page footer
    $s='<div style="float:right;" >';
    $s.=strtr( $lang['statusRight'],
                    array('#elapsed#' => round($timer->gettime(),3)));
    $s.='</div>';
    $_template['PageFooter']=$s;

    // End page JS - Rotate image (if supported)
    $s="dalbum_setHideFocus();\n";
    if ($g_bSetFocusNext)
        $s.="dalbum_setCustomFocus('$focusCtrl');\n";

//    if (!isset($_SERVER['HTTP_USER_AGENT']) || strstr($_SERVER['HTTP_USER_AGENT'],'AppleWebKit/')===FALSE)
        $s.="dalbum_prefetch('$nextPrefetch');\n";

    if (isset($g_bShowRotateButton) && $g_bShowRotateButton)
        $s.="dalbum_addRotateStyle('Image', " . (int)$nRotation . ");\n";

    if (!empty($sUpdateError))
    {
        $s.="alert('" . addslashes($sUpdateError) . "');\n";
    }
    else if ($bUpdate)
    {
        $url=translateRef("$href?file=".quoteurl($image->m_sFullFilename));
        if ($bShowDetails)
            $url.="&amp;details=1";
        $s.="window.location.href='" . $url . "';\n";
        $s.="window.reload(true);\n";
    }
    $_template['EndPageJavascript']=$s;

    // In-browser image resizing
    $method="noresize";
    if (function_exists("customGetBrowserImageResizeMethod"))
        $method=customGetBrowserFitMethod($image->m_nX,$image->m_nY,$bResize,$image);
    else
    {
        global $g_sBrowserFitMethod;
        if (!$bResize ||
            !isset($g_sBrowserFitMethod) ||
            empty($g_sBrowserFitMethod))
            $method="noresize";
                // Horisontal panoramic images are not resized
        elseif ($image->m_nX>800 && $image->m_nY>0 && $image->m_nX/$image->m_nY>2.5)
        {
            if ($bMSIEMac)
                $method="noresize";
            else if ($g_sBrowserFitMethod=='fit')
                $method="height_fit";
            else if ($g_sBrowserFitMethod=='shrink_only')
                $method="height_shrink";
            else if ($g_sBrowserFitMethod=='expand_only')
                $method="height_expand";
        }
        else
            $method=$g_sBrowserFitMethod;

    }

    $_template['BrowserFitMethod']=$method;

    if (file_exists(DALBUM_ROOT . "/config/t_showimg.php"))
        require(DALBUM_ROOT . "/config/t_showimg.php");
    else
        require(DALBUM_ROOT . "/include/t_showimg.php");

    if ($g_bGZip)
        ob_end_flush();
?>
