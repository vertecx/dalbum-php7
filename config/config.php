<?php

/*  DAlbum -> config.php.  (c) Copyright 2003 by DeltaX Inc.

    This is DAlbum configuration file. Change your options here.

    Permission is hereby granted, free of charge, to any person obtaining a
    copy of this software and associated documentation files (the "Software"),
    to deal in the Software without restriction, including without limitation
    the rights to use, copy, modify, merge, publish, distribute, sublicense,
    and/or sell copies of the Software, and to permit persons to whom the
    Software is furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included
    in all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
    OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    ITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
    FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
    DEALINGS IN THE SOFTWARE.
*/

// ==================================================================================
// ======================= MAIN SETTINGS ============================================
// ==================================================================================

// Absolute path to directory where pictures are located (no trailing slash)
//
// Example:
//   $g_sAlbumsRoot="/var/www/html/photo/Photos";
//   $g_sAlbumsRoot=dirname(strtr($_SERVER['PATH_TRANSLATED'],array('\\\\'=>'/'))) . "/pictures";
//
// On win32 use slash instead of backslash. Ex. e:/myfile/pictures
//
// Note: If you change this setting, you may also need to change $g_sAlbumsRootBrowser below
$g_sAlbumsRoot=DALBUM_ROOT . "/pictures";

// Direct access to photoalbum images
//
// true             if photoalbum images reside under web-root and can be accessed
//                  directly from the Web.
//
//                  In this case DAlbum will put links to publicly accessible images
//                  directly as http://www.mysite/<path>/mypic.jpg.
//
// false            if pictures are not directly accessible from the web.
//                  in this case all picture links will always look as
//                  http://www.mysite/../photo.php?file=<file>
//
//                  See $g_nFileAccessCheckLevel below for finer speed/security adjustment.
$g_bDirectAccess=false;

// File access level (Apache only)
//
// This is a setting that allows significantly improve performance of the album
// when $g_bDirectAccess=false.
//
// 0 - very fast, low security. Do not check access to any files at all.
//     All pictures will be served as http://www.mysite/<path>/mypic.jpg.
//     DAlbum password control security of folders only.
//
// 1 - slower, reasonable security (recommended).
//     Thumbnails will be served as http://www.mysite/<path>/mypic.jpg, everything else
//     through photo.php. As one folder page can easily contain tens of thumbnail, this
//     reduces server load dramatically.
//
// 2 - slowest, best security (default)
//     All pictures including thumbnails are served through photo.php
$g_nFileAccessCheckLevel=2;

// Path to the pictures ($g_sAlbumsRoot) relative to document root.
// This settings is only used if $g_bDirectAccess=true
//
// Example: if $g_sAlbumRoot="/home/john/public_html/pics", which is visible from outside as
//          "www.mysite.com/~john/pics", the path should be set to "/~john/pics";
//
$g_sAlbumsRootBrowser=DALBUM_BROWSERROOT. "pictures";


// Absolute path to directory where password file and album index are located (no trailing slash).
// Actually it would be better to have this directory outside of your web-root
//
// Example:
//  $g_sPrivateDir="/var/www/html/photo/private";
//  $g_sPrivateDir=dirname(strtr($_SERVER['PATH_TRANSLATED'],array('\\\\'=>'/'))) . "/.private";
//
$g_sPrivateDir=DALBUM_ROOT . "/.private";

// Album definition file name that resides in the main album directory
// and contains information about album title, images titles etc.
$g_sAlbumdef=".albumdef.ini";

// Album hash file resides in the thumbnails directory (_thm) and caches
// information about file sizes for faster reindexing
$g_sAlbumhash=".album_hash.dat";

// Absolute path to temp folder which will be used for session files and
// as temporary space during image resizing
//
// When you have multiple photoalbums installed on one site, ensure that temp directory
// is unique for every installed photoalbum
//
// Example: $g_sTemp="/tmp";
$g_sTemp=ini_get("session.save_path");

// Charset for outgoing pages
$g_sCharset="ISO-8859-1";

// User inteface languages your album supports
//
// DAlbum user interface language automatically changes depending on user browser settings
// (HTTP Access-language header).
//
// $g_arrLangList is a map of language identifiers (see Tools/General/Languages in IE for the
// list of possibilites) to PHP files in include/lang folder.
//
// For example to support english-US, english and russian the configuration should look like
//
// $g_arrLangList= array(
//      "en"    => "en-us.php",
//      "en-us" => "en-us.php",
//      "ru"    => "ru.php"
// );
//
// In this configuration, if client browser reports in HTTP Access-language header that
// it prefers 'Russian' or 'English' - the corresponding language is used.
//
// If client's preferred languages are not listed in $g_arrLangList or HTTP Access-language header
// is not available, first entry in $g_arrLangList is used (english in the case above).
//
// To configure DAbum UI in single language only, just make your language file the first
// and only choice.
//
// Please note, that $g_sCharset is another limitation here. For example, it is not possible
// to have
// charset set to ISO8859-1 and have russian language allowed - russian characters will not
// be displayed properly. At the same time both English and Russian are okay with "windows-1251".

// Uncomment languages you need to support, and move default language to the top
$g_arrLangList= array(
    "en"        => "en-us.php",
    "en-us"     => "en-us.php",
    //"cs"      => "cs.php",    // Czech.      Requires $g_sCharset="ISO-8859-2"
    //"de"      => "de.php",    // German.       Requires $g_sCharset="ISO-8859-1"
    //"fr"      => "fr.php",    // French.
    //"nb"      => "nb.php",    // Norwegian (Norsk Bokmal). Requires $g_sCharset="iso-8859-1"
    //"nl"      => "nl.php",    // Dutch.        Requires $g_sCharset="iso-8859-1"
    //"pt-br"   => "pt-br.php", // Brazilian-Portuguese.  Requires $g_sCharset="iso-8859-1";
    //"pl"      => "pl.php",    // Polish.       Requires $g_sCharset="iso-8859-2";
    //"ru"      => "ru.php",    // Russian.      Requires $g_sCharset="windows-1251"
    //"se"      => "se.php",    // Swedish.      Requires $g_sCharset="iso-8859-1";
    //"sk"      => "sk.php",    // Slovak.      Requires $g_sCharset="iso-8859-1";
    //"es"      => "sp.php",    // Spanish.      Requires $g_sCharset="iso-8859-1";
    //"zh-cn"   => "zh-cn.php", // Chinese BIG5. Requires $g_sCharset="GB2312"
    //"zh"      => "zh.php",    // Chinese BIG5. Requires $g_sCharset="big5"
    //"zh-hk"   => "zh.php",    // Chinese BIG5. Requires $g_sCharset="big5"
    //"zh-mo"   => "zh.php",    // Chinese BIG5. Requires $g_sCharset="big5"
    //"zh-tw"   => "zh.php",    // Chinese BIG5. Requires $g_sCharset="big5"
    //"el"      => "el-gr.php", // Greek.      Requires $g_sCharset="ISO-8859-7"
    //"gr"      => "el-gr.php", // Greek.      Requires $g_sCharset="ISO-8859-7"
    //"et"      => "et.php",    // Estonian.   Requires $g_sCharset="ISO-8859-4"
    //"lt"      => "lt.php",    // Lithuanian. Requires $g_sCharset="ISO-8859-13"
    //"hu"      => "hu.php",    // Hungarian.  Requires $g_sCharset="ISO-8859-2"
    ""        => ""
);

// Stylesheet to use (check DAlbum main directory *.css files for the possibilites)
$g_sStylesheet=DALBUM_BROWSERROOT . "main_normal.css";

// Additional stylesheet to be included into all DAlbum pages after $g_sStylesheet
$g_sCustomStylesheet=DALBUM_BROWSERROOT . "custom.css";

// ==================================================================================
// ======================== Access control ==========================================
// ==================================================================================

// Security mode.
//
// true = if PHP is running as Apache module. In this case login/logoff pages are not used and
//        all user authentication is Apache based. In this case $g_sPrivateDir must be specified
//        as absolute path (i.e. /var/www/html/photo/.private), not as relative path
//        ( ex. ./.private ). On virtual hosts you may also need set g_sSiteRoot variable.
//
// false= session-based security. Works with most configurations but requires client cookies
// to be enabled.
$g_bHTTPAuth=false;

// Admin users (add other users that are allowed to reindex album and edit definition files)
// First administrator in the list is treated as root administrator and will be allowed
// to start user manager.
//
// Example:
//   $g_sAdminUsers=array("admin","admin2");
$g_sAdminUsers=array("admin");

// Default access for new albums
// "all"=all users, "valid-user"=authenticated users, or comma-separated user list "user1,user2"
$g_sDefaultAccess="all";


// ==================================================================================
// =============== CREATION OF .htaccess files ======================================
//            (These settings are very important if $g_bHTTPAuth==true)
// ==================================================================================

//
// Site root directory from the Apache perspective (no trailing slash).
//
// If you own the server, this value is an empty string.
//
// With virtual hosting it may look like "/home/virtual/site111".
// Check you existing Apache .htaccess files or error logs for the correct path.
//
$g_sSiteRootDir="";

// Authentication realm to be put into .htaccess files
$g_sAuthName="Photo Album";


// ==================================================================================
// =============== Thumbnails and resized images generation =========================
// ==================================================================================

// Thumbnail settings
$g_sThumbnailPath="_thm";   // Subfolder name with thumbnails
$g_sThumbnailPrefix="thm_"; // prefix for created thumbnails
$g_sThumbnailXSize=128;     // thumbnail size
$g_sThumbnailYSize=128;
$g_sThumbnailQuality=80;    // JPEG quality (0..100=max quality). 65-90 is reasonable

// Resized images
$g_sResizedPrefix="res_";
$g_sResizedPath="_res";
$g_sResizedXSize=50000;     // resized image size. Set to 50000x50000 to disable resizing
$g_sResizedYSize=600;
$g_sResizedQuality=80;      // JPEG quality (0..100=max quality). 65-90 is reasonable

// Resizing method:
//   "GD"          = Use GD. Version 2.0+ is recommended
//   "IM"          = ImageMagick. You may need to change ImageMagic convert utility location below.
//   "auto"        = If ImageMagick binary exists - use it.
//                   If it does not exist - use GD library instead
//   "custom"      = call customResizeImage function (defined in custom.php)
//   ""            = no resizing tools at all. You need to manually create and upload thumbnails
//                   and resized images to appropriate folders.
$g_sResizeMethod="auto";

// GD2 functions. Used only if $g_ResizeMethod="GD" or "Auto"
//
// $g_bGDVer2=true;   -  use GD2 functions.
// $g_bGDVer2=false;  -  use GD  functions. Quality suffers dramatically, set only if
//                       reindexing halts in the middle
// $g_bGDVer2=(fixed_phpversion()>"4.3"); - use GD2 in PHP 4.3+ and GD in earlier versions
$g_bGDVer2=(fixed_phpversion()>"4.3");

// Automatically set memory limit to handle GD image resizing
// (resizing of 3MPixel image requires at least 30MB of RAM, and default limit is 8MB)
//
// This option is used when GD library is used.
$g_bGDSetMemoryLimit=true;

// ImageMagick convert location and command lines (if $g_sResizeMethod="IM")
$g_sConvertPath="/usr/X11R6/bin/convert";
$g_sThumbnailImArg="$g_sConvertPath -filter Lanczos -quality {$g_sThumbnailQuality} "
                    . "-resize {$g_sThumbnailXSize}x{$g_sThumbnailYSize} "
                    . "-sharpen 2 +profile APP1 #src# #target#";

$g_sResizedImArg  ="$g_sConvertPath -filter Lanczos -quality {$g_sResizedQuality} "
                    . "-resize {$g_sResizedXSize}x{$g_sResizedYSize} "
                    . "-sharpen 2 +profile APP1 #src# #target#";

// Rights to assign to created thumbnail directories and images
$g_newDirRights=0755;

// In Safe mode PHP may be unable to write to directories it creates with mkdir()
// as the created directories are owned by Apache in that case.
//
// DAlbum can create directories using FTP in that case. Set
//    $g_bFTPMkdir=true;
// and fill the rest of FTP parameters.
//
// Set $g_sFTPRootdir to the FTP root directory or "--auto--" to autodetect.
//
// For example when $g_sFTPRootdir="/home/user/public_html", FTP "CHDIR /" command
// would in fact chdir to /home/user/public_html directory.
// -----------------------------------------------------------------------------
// Note: if FTP is used, set $g_newDirRights=0777 above or the created folder will
// be read only
$g_bFTPMkdir=false;
$g_sFTPHost="localhost";
$g_sFTPPort=21;
$g_bFTPPasv=false; // Passive mode
$g_sFTPUser="my_user";
$g_sFTPPass="my_password";
$g_sFTPRootdir="--auto--";




// ==================================================================================
// ========================  Index page settings ====================================
// ==================================================================================
$g_nMinTreeWidth=200;   // minimum tree width in pixels
$g_nPicturesPerPage=12; // Number of images per page
$g_nColumnsPerPage=4;   // Number of image colums per page
$g_nMinThumbViewWidth=0;// minimum thumbnail view width in pixels. 0=default
$g_bShowAllImagesButton=1; // show button "All"

// true = show lines in folder tree (does not look too good if text wraps to another line)
$g_bShowTreeLines=false;

// Buttons to display
$g_bShowLoginButton=true;
$g_bShowFullScreenButton=true;
$g_bShowUserManagerButton=true;


// ==================================================================================
// =============== Show image page ==================================================
// ==================================================================================

// Set focus to Next or Index buttons to proceed to the next page with Enter
$g_bSetFocusNext=true;

// Whether to show 'Rotate' button on the toolbar to allow  users to rotate images.
// This functionality is IE5.5+ only.
$g_bShowRotateButton=false;

// Allow EXIF details. By default is true.
$g_bShowEXIFDetailsButton=true;

// 'true' = force DAlbum to use its built-in JPEG EXIF info parsing code.
// 'false'= (default) DAlbum EXIF parser is only used if PHP exif module is not installed.
//
// It is also recommended to use DAlbum parser in PHP 4.1 where PHP exif extension is
// considered unstable.
$g_bForceDAlbumEXIFCode=false;

// Show 'Original image' button. 0=do not show, 1=show, 2=download
$g_bShowOriginalImageButton=true;

// Show 'Update' button to regenerate image thumbnail and resized image
//
// Please note that the old version of the image is very likely to remain in
// browser's cache and won't be reloaded unless you press Ctrl+F5 or clear browser cache
$g_bShowUpdateButton=false;

// Image resizing. DAlbum can be configured to fit displayed images
// to screen in user browser. This feature requires IE5-6 or Mozilla 1.0 or Opera7.
//
// Possible options:
//    noresize - display image as is
//    fit    - enlarge or shrink image to fit the screen
//    shrink - reduce image to fit; if image is smaller than available space it is not resized
//    enlarge - enlarge image to fit; if image is larger than available space it is not resized
//    height_fit, height_shrink, height_enlarge - enlarge or shrink image to fit the screen height
//
// You can decide what is best for every image individuallly by overriding
// customGetBrowserFitMethod in custom.php. Default implementation returns
// 'noresize' for non-resizeable images, and 'height_fit' for horisontal panorama
$g_sBrowserFitMethod="noresize";

// Allowed reindexing speeds
$g_arrReindexSpeeds=array(0,1,2,3);


// ============================================================================
//                           Advanced settings
// ============================================================================

// PHP 4.1.2 for Win32 and possible other versions have broken session support -
// it is not possible to logon and reindex - session variables are just not set.
// See http://bugs.php.net/bug.php?id=16043 for details.
//
// Set it to $g_bBrokenSessions='true' if you experience such behaviour.
$g_bBrokenSessions=false;

// Start a new session always. When set to false (default), new session is started
// only when user logs in. When set to true - session is started when a user first
// connects any DAlbum page.
$g_bStartNewSessionAlways=false;

// Compress pages with GZip
$g_bGZip=true;

// Remove E_STRICT
error_reporting(error_reporting() & ~2048);
////////////////////////////
// Debug mode!
//
// Uncomment these two lines to print ALL warning messages, errors, notices
// etc.
//error_reporting(E_ALL);
//set_error_handler("userErrorHandler");

?>