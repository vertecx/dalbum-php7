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

// ==================================================================================
// ========================  Custom functions =======================================
// ==================================================================================
//
// Note: You need to have some knowledge of PHP to uncomment and modify the
// following customization functions.

/// ======= Custom function to convert image or album filename to image title ======
/// If not specified, image filename without extension is used
///
/*
function filename2title($filename)
{
    return basename(strval($filename));
}
//*/

// everypageCallback() is called on every DAlbum page. You can use it for logging
// or for some other purpose
//
// The example below will create a tab-separated file logging all visits
// to your pictures.
/*
function everypageCallback($sUserName="")
{
    // log displayed images into text file.
    if (defined('DALBUM_INDEX_PAGE') ||
        defined('DALBUM_SHOWIMG_PAGE'))
    {
        $statFolder='./'; // change this to your statistics folder

        if (!file_exists($statFolder . '.count.txt'))
            $cnt=@fopen($statFolder . ".count.txt","w");
        else
            $cnt=@fopen($statFolder . ".count.txt","r+");

        $n=0;
        if ($cnt)
        {
            flock( $cnt, LOCK_EX ); // exclusive lock
            $n=(int)fread($cnt,filesize($statFolder . ".count.txt"));
            $n++;

            rewind($cnt);
            fwrite($cnt,"$n");
            flock( $cnt, LOCK_UN ); // exclusive lock
            fclose($cnt);
        }

        $f="/";
        if (isset($_GET['folder']))
            $f=$_GET['folder'];
        else if (isset($_GET['file']))
            $f=$_GET['file'];

        // log  into statistics file in tab-separated format
        if (!file_exists($statFolder . '.iptrack.txt'))
            $cnt=@fopen($statFolder . ".iptrack.txt","w");
        else
            $cnt=@fopen($statFolder . ".iptrack.txt","a+");

        if ($cnt)
        {
            $s= ((int)$n) . "\t" .
                quotehtml(date("D M j G:i:s T Y")) . "\t" .
                quotehtml($sUserName) . "\t" .
                quotehtml($f) . "\t" .
                @$_SERVER['REMOTE_ADDR'] . "\t" .
                quotehtml(@gethostbyaddr(@$_SERVER['REMOTE_ADDR'])) . "\t".
                quotehtml(@$_SERVER['HTTP_REFERER']) . "\n";

            flock( $cnt, LOCK_EX ); // exclusive lock
            fwrite($cnt,$s);
            flock( $cnt, LOCK_UN ); // exclusive lock
            fclose($cnt);
        }
    }
}//*/

// Returns custom button code. You can completely change style of all DAlbum buttons
// here, hide buttons you don't need, add images to buttons, use <BUTTON> instead of <A> tag etc.
//
//  $id = button ID. Possible values: 'login','logout','next','prev','usrmgr','index',
//                  'fullscreen' etc.
//  $href=location for this button. Empty string for disabled button
//  $text=button text
//  $title=help for button
//  $nSpacer= 0=first button in the row, 1=usual button, 2=first button in button group
//  $target=target
//
// Return value: button code. Check getButton code in functions.php for details
//

/*
function customGetButton($id, $href, $text, $title, $nSpacer, $target)
{
    // This example will make login button red
    // (usually it is recommended to use stylesheet for a.buttonLink#login)
    // and enclode next button text in [ ]. Example: [Next].
    if ($id=='login')
        return "<a class='buttonLink' href='$href' id='$id' " .
               " title='$title' target='$target' " .
               " style='background-color:red'>" . $text . "</a>";

    if ($id=='next')
        $text="[$text]";

    // call getButton for default look & feel (note the last false parameter or there will
    // be infinite loop)
    return getButton($id,$href,$text,$title,$nSpacer,$target,false);

}//*/

// customURL converts a local picture path which is relative to albums root
// (i.e. /pictures directory) to a picture URL.
//
// You can override this function to, for example, serve images from another server
// or even distribute load between several web-servers.
//
// See secureURL in functions.php for implementation details.
/*
function customURL($picPath)
{
    return "http://mybroadband.com/mypics" . quoteurl($picPath);
}//*/

// customCreateAlbum
//
// Create album object (Can be useful if CAlbum is extended)
/*
function &customCreateAlbum()
{
    return new CAlbum;
}
*/

// customCreateImage
//
// Create image object (Can be useful if CImage is extended)
/*
function &customCreateImage()
{
    return new CImage;
}
*/


// customTitle function returns a piece of HTML to be inserted
// as image or album title (index page only)
//
//   $object = reference to CImage or CAlbum object
//   $titleDefault = default HTML string
//
// Example below will put all titles into brackets.
/*
function customTitle(&$object, $titleDefault)
{
    return "<span class='imageTitle'>[" . $object->GetTitle() . "]</span>";
}//*/

// custom EXIF header generator
//
// You can edit this function to display additional EXIF parameters,
// modify exif output format etc.
//
// This function returns piece of HTML with formatted EXIF data,
// which will be used in t_showimg.php as template('ExifDetails');
//
// Parameters:
//   $sFilename - image filename
//   $exif      - output of php function exif_read_data
//   $data      - array of already formatted Exif strings.
//                Ex. { "ISO:|100", "Exposure:|1/10s" .. }
//
// This example function puts all available information as is into a table

/*

function customExifDetails( $sFilename,
                            &$exif,
                            &$data )
{
    $out="<table><tr><th colspan=2>EXIF details</th></tr>";
    while (list($key, $val) = each($exif))
    {
        if (is_array($val) || strlen($val)>30)
            continue;
        $out.="<tr><td>" . quotehtml($key) . "</td><td>" . quotehtml($val) . "</td></tr>";
    }
    $out.="</table>";
    return $out;
}
//*/


//  This function is used to return how displayed image should fit the screen
//  in showimg.php. Check $g_sBrowserFitMethod for details.
//
//  $width - image width in pixels
//  $height - image height in pixels
//  $bResize - true if image is resized image. false - if original image is displayed.
//  $image   - CImage object
//
//  Returns : "noresize"/"fit"/"shrink" etc.

/*
function customGetBrowserFitMethod($width, $height, $bResize, &$image)
{
    if ($width>600)
        return "shrink";
    return "noresize"
}//*/

//
//  Override this function to provide your own user authentication mechanism
//  returns true if user is okay, false if access is denied.
//
/*
function customAuthentication($user,$password)
{
    return false;
}//*/


//
// Resize image. This function is called by DAlbum to create thumbnail or
// resized image when $g_sResizeMethod="custom"
//
// $src=original image filename
// $dest=target image filename
// $bResized= (true=create resized image; false=create thumbnail);
//
// Return value:
//    "" - completed successfully;
//    "error message" if failed
//
/*
function  customResizeImage($src,$dest,$bResized)
{
}*/

//  customGetImageBorders and customGetFolderBorders return image graphics to be
//  used to display around album thumbnails and image thumbnails on the index page.
//
//  Edit the code to insert your own graphics and set borders width/height
//  to match your stylesheet.
//
//  Returns : true = use data supplied in $fg array
//            false= use default settings
/*
function customGetImageBorders(&$image,&$fg,$nThmX,$nThmY)
{
    // images to use in format URL,width,height
    $fg['blank']=array('custimg/im_corner/i_blank.gif',19,16);
    $fg['nw']=array('custimg/im_corner/i_nw.gif',32,11);
    $fg['n']=array('custimg/im_corner/i_n.gif',25,11);
    $fg['ne']=array('custimg/im_corner/i_ne.gif',24,11);
    $fg['w']=array('custimg/im_corner/i_w.gif',5,16);
    $fg['e']=array('custimg/im_corner/i_e.gif',6,16);
    $fg['sw']=array('custimg/im_corner/i_sw.gif',30,12);
    $fg['s']=array('custimg/im_corner/i_s.gif',27,12);
    $fg['se']=array('custimg/im_corner/i_se.gif',14,12);

    // image borders (as defined in stylesheet for a.imglink .imagethumb)
    $fg['borderx']=2;
    $fg['bordery']=2;

    // resulting object size. This adds borders and 10 pix space to the image, but
    // you can add any value. Unused space will be filled with "blank"
    $fg['sizex']=$nThmX+$fg['borderx']*2+$fg['w'][1]+$fg['e'][1]+10;
    $fg['sizey']=$nThmY+$fg['bordery']*2+$fg['n'][2]+$fg['s'][2]+10;

    return true;
}

function customGetFolderBorders(&$album,&$fg,$nThmX,$nThmY)
{
    global $g_sThumbnailXSize,$g_sThumbnailYSize;

    // images to use in format URL,width,height
    $fg['blank']=array('custimg/bluef/bf_blank.gif',30,8);
    $fg['nw']=array('custimg/bluef/bf_nw.gif',69,25);
    $fg['n']=array('custimg/bluef/bf_n.gif',5,25);
    $fg['ne']=array('custimg/bluef/bf_ne.gif',18,25);
    $fg['w']=array('custimg/bluef/bf_w.gif',8,8);
    $fg['e']=array('custimg/bluef/bf_e.gif',12,8);
    $fg['sw']=array('custimg/bluef/bf_sw.gif',20,14);
    $fg['s']=array('custimg/bluef/bf_s.gif',6,14);
    $fg['se']=array('custimg/bluef/bf_se.gif',16,14);

    // border around image (defined in CSS as a.fldlink .folderthumb)
    $fg['borderx']=1;
    $fg['bordery']=1;

    // ensure that all folders have the same size
    $fg['sizex']=$g_sThumbnailXSize+35;
    $fg['sizey']=$g_sThumbnailYSize+35;
}//*/

// Converts path that is relative to $g_sAlbumRoot directory
//   to absolute path. Ex. /myfolder/pic1.jpg => /var/www/html/photo/pictures/myfolder/pic1.jpg
/*
function customAbsfname($filename)
{
        global $g_sAlbumsRoot;
        return $g_sAlbumsRoot . $filename;
}//*/

////////////// EMBEDDING /////////////////////////////

// Translate DAlbum page URL to another URL
//
// Example below does PHP Nuke support by translating
//  showimg.php?file=/var.jpg
//    to
//  modules.php?name=dalbum&jump=showimg.php&f=/var.jpg
/*
function customTranslateRef($ref)
{
    if (substr($ref,0,9)=="photo.php")
        return DALBUM_BROWSERROOT . $ref;
    return "modules.php?name=dl&amp;jump=" . strtr($ref,array("?"=>"&amp;","file="=>"f="));
}//*/

// Obtain current user name
/*
function customStartSessionAndGetUserName($cache,$bStartNewSession)
{
    global $sCurrentUser; // a global variable set by CMS system
    return $sCurrentUser;
}//*/

// Check if the current user ($user always contains value returned by StartSessionAndGetUserName)
// is admin. 0=normal user, 1=admin (can reindex), 2=superuser (can access user manager)
/*
function customIsAdminMode($user)
{
    global $admin;
    return is_admin($admin)?2:0;
}*/

////////////// DEPRECATED STUFF //////////////////////

// customIndexPageHeader creates a custom page header on index.php
//      $sTitle=root album title
//      $navBar=navigation bar HTML
//      $albRoot=reference to root album
//
// WARNING: This function is deprecated and may be unsupported in future versions.
//          Modify page template instead.
/*
function customIndexPageHeader($sTitle, $navBar, &$albRoot)
{
    print <<< END
    <div class="indexPageHeader">
    <table style="width:100%;" cellpadding="0" cellspacing="0">
    <tr>
        <td class="title">[$sTitle]</td>
        <td class="navigationBar" >[$navBar]</td>
    </tr>
    </table>
    </div>
END;
}//*/

// customImageExtra returns a piece of HTML to be inserted after image title
// on both index.php and showimg.php
//
//  $image = reference to CImage object
//
// WARNING: This function is deprecated and may be unsupported in future versions.
//          Use customTitle instead.
/*
function customImageExtra(&$image)
{
    if (defined('DALBUM_INDEX_PAGE'))
    {
        return "<A href='buy.php?file=" . urlencode($image->m_sBaseFilename) . "'>Buy it</A>
    }
    else if (defined('DALBUM_SHOWIMG_PAGE'))
    {
        return "<A href='buy.php?file=" . urlencode($image->m_sBaseFilename) .
                "'>Buy it (image page)</A>
    }
    return "";
}//*/


?>