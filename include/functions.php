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

// escape filename - use escapeshellarg in *nix, and double quotes in win
function escape($sFile)
{
    if (stristr(getenv('OS'),'windows')===FALSE)
        return escapeshellarg($sFile);

    $sFile=trim($sFile);
    if (substr($sFile,' '))
        $sFile="\"$sFile\"";

    return $sFile;
}

function cleanupImageMagick($base)
{
    @silentUnlink($base . ".tmp");
    @silentUnlink($base . ".mgk");
    @silentUnlink($base . ".~mgk");
    @silentUnlink($base . ".mgk~");
}

function isGoodFilename($filename)
{
    return preg_match('/^[-0-9a-zA-Z\/\.:_\x5c ]+$/',$filename);
}

function silentUnlink($filename)
{
    if (file_exists($filename))
        return unlink($filename);
    return true;
}

// Resize a file with imagemagick
function callImageMagick($sFile, $cmdline, $target, $nLevel=0)
{
    global $g_sTemp;

    if ($nLevel>1)
        return "Internal error for file [$sFile]. Please check that your path to temp directory ($g_sTemp) does not contain quotes and special characters.";
    if (!isGoodFilename($sFile) || $target==$sFile)
    {
        // Filename is not good enough to be stuffed into command line. Copy it to temp.
        $good=$g_sTemp . '/dalbum_src' . md5(getfname($sFile)) . "." . getext($sFile);

        if (!@copy($sFile, $good))
        {
            @unlink($good);
            return "Unable to copy file [$sFile] to [$good].";
        }

        $ret=callImageMagick($good, $cmdline, $target, $nLevel+1);
        @silentUnlink($good);
        return $ret;
    }

    //
    // delete temp stuff
    $base=$g_sTemp . '/dalbum_' . md5(getfname($target));
    @silentUnlink($base . "." . getext($target)) ;
    cleanupImageMagick($base);

    $tmp=$base . "." . getext($target);


    $cmd=" " . strtr($cmdline,array('#src#'     => escape($sFile),
                                    '#target#'  => escape($tmp))) . " 2>&1";


    // execute imagemagick
    $out=array();
    $ret=null;
    @exec($cmd,$out,$ret);
    if ($ret!=0 || $ret===null)
    {
        $ims=@getimagesize($tmp);
        if (empty($ims))
        {
            @silentUnlink($tmp);
            cleanupImageMagick($base);
            return "Unable to execute [$cmd] : ret=[$ret].\nOutput:\n" . @join("\n",$out) . "\n------------END OF OUTPUT------------\n";
        }
    }

    if (@file_exists($target) && !@unlink($target))
    {
        @silentUnlink($tmp);
        cleanupImageMagick($base);
        return "Unable to delete [$target].";
    }

    if (!@rename($tmp,$target) && !(@copy($tmp,$target) && @unlink($tmp)))
    {
        @silentUnlink($tmp);
        cleanupImageMagick($base);
        return "Unable to rename [$tmp] to [$target].";
    }
    cleanupImageMagick($base);

    global $g_newDirRights;
    $old_umask = umask(0);

    $ret="";
    if (!@chmod($target,$g_newDirRights))
        $ret= "Unable to chmod [$tmp].";

    umask($old_umask);

    return $ret;
}


// resize with GD
function resizeGD($src_file, $dest_file, $maxX, $maxY, $quality=80)
{
    // find the image size & type
    $testgd = get_extension_funcs("gd"); // Grab function list
    if (!$testgd)
    {
        return "GD library is not installed";
    }

    $imginfo = @getimagesize($src_file);
    switch($imginfo[2])
    {
        case 1: $type = IMG_GIF; break;
        case 2: $type = IMG_JPG; break;
        case 3: $type = IMG_PNG; break;
        case 4: $type = IMG_WBMP; break;
        default: return "$src_file: Unknown image format"; break;
    }

    // height/width
    $srcX = $imginfo[0];
    $srcY = $imginfo[1];

    if ($srcX<=$maxX &&
        $srcY<=$maxY )
    {
        if (strcasecmp(getext($src_file),getext($dest_file))==0)
        {
            if (!copy($src_file,$dest_file))
                return "Unable to copy $src_file to $dest_file\n";
            return "";
        }

        // Different extensions
        $destX = $srcX;
        $destY = $srcY;
        $ratio = 1;
    }
    else
    {
        $ratio=min(($maxX/$srcX),($maxY/$srcY));
        $destX = (int)($srcX*$ratio+0.5);
        $destY = (int)($srcY*$ratio+0.5);
    }

    $srcImage=null;

    // Set memory limit to 3*unpacked image size + 8M
    global $g_bGDSetMemoryLimit;
    if ($g_bGDSetMemoryLimit)
    {
        $mem=(int)((3*$srcX*$srcY*4)/1000/1000+8);
        @ini_set("memory_limit", "{$mem}M");
    }

    switch($type)
    {
        case IMG_GIF:
            if(function_exists('imagecreatefromgif'))
                $srcImage = imagecreatefromgif($src_file);
            break;
        case IMG_JPG:
            if(function_exists('imagecreatefromjpeg'))
                $srcImage = imagecreatefromjpeg($src_file);
            break;
        case IMG_PNG:
            if(function_exists('imagecreatefrompng'))
                $srcImage = imagecreatefrompng($src_file);
            break;
        case IMG_WBMP:
            if(function_exists('imagecreatefromwbmp'))
                $srcImage = imagecreatefromwbmp($src_file);
            break;
    }

    if(empty($srcImage))
    {
        return "$src_file: Image format is not supported by your version of GD library";
    }

    // resize
    global $g_bGDVer2;
    $bSuccess=true;
    $destImage=null;
    if ($g_bGDVer2)
        $destImage = imagecreatetruecolor($destX, $destY);
    if (!$destImage)
        $bSuccess=false;
    if ($bSuccess && $g_bGDVer2)
        $bSuccess=imagecopyresampled($destImage, $srcImage, 0, 0, 0, 0, $destX, $destY, $srcX, $srcY);
    if (!$bSuccess)
    {
        if ($destImage)
            $bSuccess=imagecopyresized($destImage, $srcImage, 0, 0, 0, 0, $destX, $destY, $srcX, $srcY);
        if (!$bSuccess)
        {
            $destImage = imagecreate($destX, $destY);
            if ($destImage)
                $bSuccess= imagecopyresized($destImage, $srcImage, 0, 0, 0, 0, $destX, $destY, $srcX, $srcY);
        }
    }
    if (!$bSuccess)
        return "An GD library error occured resizing image.";

    // create and save final picture
    switch(strtolower(getext($dest_file)))
    {
        case 'gif': $bSuccess=imagegif($destImage, $dest_file); break;
        case 'jpg':
        case 'jpeg':$bSuccess=imagejpeg($destImage, $dest_file,$quality); break;
        case 'png': $bSuccess=imagepng($destImage, $dest_file); break;
        case 'bmp': $bSuccess=imagewbmp($destImage, $dest_file); break;
    }

    if (!$bSuccess)
        return "Unable to write image file $dest_file";

    // free the memory
    @imagedestroy($srcImage);
    @imagedestroy($destImage);

    //
    global $g_newDirRights;
    @chmod($dest_file,$g_newDirRights);

    return "";
}

function checkDirectory($dir)
{
    if (!@is_dir($dir))
        return false;

    $dh=@opendir($dir);
    if (!$dh)
        return false;
    @closedir($dh);
    return true;
}

// resize image
function resizeImage($src,$dest,$bResized)
{
    global $g_sThumbnailImArg, $g_sResizedImArg, $g_sConvertPath, $g_sResizeMethod;

    // Create temporary folders
    $dir=dirname_ex($dest);

    //
    if (!checkDirectory($dir))
    {
        global $g_newDirRights;
        dalbum_mkdir($dir,$g_newDirRights);

        if (!checkDirectory($dir))
            return "Directory [$dir] does not exists and cannot be created. You may receive this error if PHP is in safe mode. In this case please disable safe mode or create this folder manually.";
    }

    global $g_sTemp;
    if (@file_exists($dest) && !@unlink($dest))
        return "Unable to delete [$dest] before resizing.";

    $method=$g_sResizeMethod;
    if (strcasecmp($g_sResizeMethod,"auto")==0)
    {
        if (file_exists($g_sConvertPath))
            $method="IM";
        else
            $method="GD";
    }
    $ret="";

    global $g_sThumbnailXSize;
    global $g_sThumbnailYSize;
    global $g_sThumbnailQuality;
    global $g_sResizedXSize;
    global $g_sResizedYSize;
    global $g_sResizedQuality;

    switch ($method)
    {
        case 'IM':
            $imCmd=($bResized?$g_sResizedImArg:$g_sThumbnailImArg);
            if (!$bResized)
            {
                // Try not resize thumbnails if we don't have to
                $ims=@getimagesize($src);
                if (!empty($ims))
                {
                    if ($ims[0]<=$g_sThumbnailXSize &&
                        $ims[1]<=$g_sThumbnailYSize &&
                        getext($src)==getext($dest))
                    {
                        if (@copy($src,$dest))
                            return "";
                    }
                }
            }

            $ret=callImageMagick($src,$imCmd,$dest);
            break;
        case 'custom':
            return customResizeImage($src,$dest,$bResized);
        case 'GD':

            // resize with GD
            $ret=resizeGD($src,$dest,   $bResized?$g_sResizedXSize:$g_sThumbnailXSize,
                                        $bResized?$g_sResizedYSize:$g_sThumbnailYSize,
                                        $bResized?$g_sResizedQuality:$g_sThumbnailQuality);
            break;
        case '':
            break; // no resize
        default:
            $ret="Unknown resize method: $method. Check your config.php";
    }
    clearstatcache();
    return $ret;

}


// create absolute filename given document root relative
function absfname($name)
{
    if (function_exists('customAbsfname'))
        return customAbsfname($name);

    global $g_sAlbumsRoot;
    return $g_sAlbumsRoot . $name;
}

// quote HTML special chars
function quotehtml($text)
{
    return htmlspecialchars($text,ENT_QUOTES);
}

// same as urlencode, but leave / characters as is (urlencode replaces them with %2F)
function quoteurl($text)
{
    $parts=explode('/',$text);
    for ($i=0;$i<count($parts);$i++)
        $parts[$i]=rawurlencode($parts[$i]);

    return join('/',$parts);
}

// Create picture url depending on auth method
function secureurl($url,$bCallCustom=true)
{
    if ($bCallCustom && function_exists('customURL'))
        return customURL($url);

    global $g_bHTTPAuth, $g_bDirectAccess, $g_sAlbumsRootBrowser, $g_nFileAccessCheckLevel;

    $bDirect=false;
    if (substr(basename(strval($url)),0,1)!='.')
    {
        // If we have HTTP authentication or session ID is set
        if ($g_bDirectAccess)
        {
            if ($g_bHTTPAuth || !isset($_SESSION['DAlbum_UID']))
                $bDirect=true;
        }
        else // ! g_bDirectAccess
        {
            if ($g_nFileAccessCheckLevel==0 ||
                ($g_nFileAccessCheckLevel==1 && is_picture_in_thumbnail_dir($url)))
                $bDirect=true;
        }
    }

    if ($bDirect)
        return quoteurl(translateRef($g_sAlbumsRootBrowser . $url));
    if (isset($_SERVER['ORIG_PATH_INFO']) || isset($_SERVER['PATH_INFO']))
        return translateRef('photo.php' . quoteurl($url));
    return translateRef('photo.php?file=' . quoteurl($url));
}

// replace <BR> with /n for text mode
function br2nl($text)
{
    return preg_replace("/<br[\s\/]*>/i", "\n",$text,-1);
}

// convert html to text
function html2txt($html)
{
    $ret = strtr($html, array_flip(get_html_translation_table(HTML_ENTITIES)));
    $ret = preg_replace_callback("/&#([0-9]+);/m", function($m) { return chr($m[1]); }, $ret);
    $ret = strip_tags(br2nl($ret));

    return $ret;
}

// format size as 23KB or 22.4MB
function size_as_str($x)
{
    global $lang;
    $x=(double)$x;
    if ($x<1024)
        return $x . ' ' . $lang['bytes'];
    else if ($x/1024<1024)
        return round($x/1024,1) . $lang['KB'];

    return round($x/1024/1024,1) . $lang['MB'];
}

// Get filesize as 23KB or 22.4MB
function filesize_as_str($file)
{
    return size_as_str(@filesize($file));
}

// Add HTTP header as Status: for CGI mode and as HTTP/1.1 for Apache module
// Probably a PHP bug
function hdr($text)
{
    if (strstr(php_sapi_name(),"cgi"))
        header("Status: $text");
    else
        header("HTTP/1.1 $text");
}

function dalbum_relocate($location)
{
    if (function_exists("customRelocate"))
        customRelocate($location);
    return header("Location: $location");
}

// Return true if picture is a thumbnail in the thumbnail dir
function is_picture_in_thumbnail_dir($sFile)
{
    // find original file name
    $sFolder=dirname_ex($sFile);
    $sBase=basename($sFile);
    $lastSub=basename($sFolder);

    global $g_sThumbnailPath;
    if ($g_sThumbnailPath==$lastSub)
        return true;
    return false;
}


function & strip_slashes(&$str)
{
    if(is_array($str))
    {
        while(list($key, $val) = each($str))
        {
            $str[$key] = strip_slashes($val);
        }
    }
    else
    {
        $str = stripslashes($str);
    }
    return $str;
}


function remove_bloody_magic_quotes()
{
    if(get_magic_quotes_gpc())
    {
        strip_slashes($_GET);
        strip_slashes($_POST);
        strip_slashes($_COOKIE);
    }
}

function dirname_ex($name)
{
    $dir=dirname($name);
    if ($dir=='/' || $dir=='\\')
        return "";
    return strtr($dir,'\\','/');
}

// Enhanced INI file parsing
function &better_parse_ini_file($filename, $process_sections = false)
{
    $ini_array = array();
    $sec_name = "";
    if (!file_exists($filename))
        return $ini_array;

    $lines = @safe_read_file($filename);
    if (empty($lines))
        return $ini_array;
    for ($i=0;$i<count($lines);++$i)
    {
        $line = trim($lines[$i]);
        if($line == "" || $line[0]==';')
            continue;

        if($line[0] == "[" && $line[strlen($line) - 1] == "]")
        {
            $sec_name = substr($line, 1, strlen($line) - 2);
        }
        else
        {
            $pos = strpos($line, "=");
            $property = substr($line, 0, $pos);
            $value = substr($line, $pos + 1);

            while (substr($value,-1)=='\\')
            {
                $value=substr($value,0,-1);
                if ($i>=count($lines)-1)
                    break;

                $value.=rtrim($lines[++$i]);
            }
            $value=trim(str_replace('\n',"\n",$value));

            if($process_sections)
                $ini_array[$sec_name][$property] = $value;
            else
                $ini_array[$property] = $value;
        }
    }
    return $ini_array;
}

// Start HTTP session and get current username
function StartSessionAndGetUserName($cache='private_no_expire',$bCreateNewSession=false, $bCallCustom=true)
{
    if ($bCallCustom && function_exists("customStartSessionAndGetUserName"))
        return customStartSessionAndGetUserName($cache,$bCreateNewSession);

    // Determine user name
    global $g_bHTTPAuth;

    global $g_bStartNewSessionAlways;
    if ($g_bStartNewSessionAlways)
        $bCreateNewSession=true;

    $sUserName="";

    if ($g_bHTTPAuth)
    {
        if (isset($_SERVER['REMOTE_USER']))
            return $_SERVER['REMOTE_USER'];

        if (isset($_SERVER['PHP_AUTH_USER']) && authenticate($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW']))
            $sUserName=$_SERVER['PHP_AUTH_USER'];
        else if (isset($_COOKIE['DAlbum_Auth']) && $_COOKIE['DAlbum_Auth']=="1")
        {
            global $g_sAuthName;
            header("WWW-Authenticate: Basic realm=\"$g_sAuthName\"");
            header('HTTP/1.0 401 Unauthorized');
            LogonFailure("");
            exit();
        }
    }
    $pwd=array();
    if (!$g_bHTTPAuth)
    {
        // Check if we have login/password in the url
        if (isset($_GET['login']))
        {
            $pwd=explode(':',$_GET['login']);
            if (count($pwd)>=1)
            {
                $bCreateNewSession=true;
            }
        }
        if (!$bCreateNewSession && !isset($_COOKIE[session_name()]))
            return "";
    }

    // Cache control
    if ($cache=='session')
    {
        session_cache_limiter('none');
        $expires = ( function_exists('session_cache_expire') ? session_cache_expire() : 60 ) * 60;
        $gm_expires = gmdate('D, d M Y H:i:s', time() + $expires);
        header("Cache-control: private, max-age=$expires, pre-check=$expires");  // HTTP 1.1
        header("Expires: $gm_expires GMT");   // HTTP 1.0
    }
    else
    {
        session_cache_limiter($cache);

        if (strstr($cache,"must-revalidate"))
        {
            $gm_expires = gmdate('D, d M Y H:i:s', mktime(0, 0, 0, 3, 0, 2000));
            header("Cache-control: private, max-age=0, pre-check=0");  // HTTP 1.1
            header("Expires: $gm_expires GMT");   // HTTP 1.0
        }
    }

    if (!$g_bHTTPAuth)
    {
        global $g_sTemp;
        session_save_path($g_sTemp);
        @ini_set("session.cookie_path",dirname_ex($_SERVER['PHP_SELF']));
        @ini_set("session.use_only_cookies",1);
        @ini_set("session.use_trans_sid",0);
        session_start();
        setcookie(session_name(),session_id());

        if (count($pwd)==2 && authenticate($pwd[0],$pwd[1]))
            $_SESSION['DAlbum_UID']=$pwd[0];

        if (count($pwd)==1 && $pwd[0][0]=='-')
            $_SESSION['DAlbum_UID']=$pwd[0];

        if (isset($_SESSION['DAlbum_UID']))
            $sUserName=$_SESSION['DAlbum_UID'];

    }
    return $sUserName;
}

// Save value to file $filename
function save_file_fast($filename, $value,$mode="w")
{
    clearstatcache();

    $handle=fopen($filename, $mode);
    if (!$handle)
        return false;

    flock($handle, LOCK_EX);
    fwrite($handle, $value);
    flock($handle, LOCK_UN);
    fclose($handle);

    return true;
}


function save_file($filename, $value,$mode="w")
{
    clearstatcache();

    for ($i=0;;++$i)
    {
        $tmp="$filename.00$i";
        if (!file_exists($tmp))
        {
            $handle=fopen($tmp, $mode);
            if (!$handle)
                return false;

            flock($handle, LOCK_EX);
            fwrite($handle, $value);
            flock($handle, LOCK_UN);
            fclose($handle);

            // Create backup of the current version of the file
            if (file_exists($filename))
            {
                @silentUnlink("$filename.bak");
                if (!@rename($filename, "$filename.bak"))
                    return false;
            }
            clearstatcache();
            @silentUnlink($filename);

            if (!@rename($tmp, $filename))
            {
                @unlink($tmp);
                return false;
            }
            return true;

        }
    }
}

// get filename extension (without dot)
function getext($filename)
{
    $filename=basename(strval($filename));
    while (substr($filename,0,1)=='.')
        $filename=substr($filename,1);
    while (substr($filename,-1)=='.')
        $filename=substr($filename,0,-1);
    $ext=strrchr($filename,'.');
    if (substr($ext,0,1)=='.')
        $ext=substr($ext,1);
    return $ext;
}

// get filename without path and extension
function getfname($filename)
{
    $ext=getext($filename);
    if (empty($ext))
        return basename(strval($filename));
    return basename(strval($filename),"." . $ext);
}


function filename2title_default($filename)
{
    if (function_exists("filename2title"))
        return filename2title($filename);

    return getfname($filename);
}

function encodeCurrentLocation()
{
    $c=parse_url($_SERVER['PHP_SELF']);
    $sTarget=basename($c['path'] );

    if (isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING']))
        $sTarget.='?' . $_SERVER['QUERY_STRING'];
    return base64_encode($sTarget);
}

function template($tempname)
{
    global $_template;
    if (isset($_template[$tempname]) && !empty($_template[$tempname]))
    {
        print $_template[$tempname];
        return true;
    }
    return false;
}

function getButton($id, $href, $text, $title, $nSpacer, $target="_self", $bCallCustom=true)
{
    if ($bCallCustom && function_exists('customGetButton'))
        return customGetButton($id, $href, $text, $title, $nSpacer, $target);

    // Begin toolbar/end toolbar stuff
    if (substr($id,0,1)=='#')
        return "";

    $class='buttonLink';
    if ($id=='curpage')
    {
        $class='curPageLink';
    }
    else if (preg_match('/^page[0-9]+$/',$id))
    {
        $class='otherPageLink';
    }


    $x="";

    if ($nSpacer==1)
        $space='&nbsp;';
    if ($nSpacer==2)
        $space='&nbsp;&nbsp;&nbsp;';

    if (!empty($space))
        $x.="<span id='space_$id' class='buttonspace'>$space</span>";

    if (!empty($href))
        $x.="<a class='$class' href='$href' id='$id' title='$title' target='$target'>" . $text . "</a>";
    else
        $x.="<span class='disabledButtonLink' id='$id' >" . $text . "</span>";
    return $x;
}

function dalbumBeginToolbar($name)
{
        return getButton("#$name#begin#","","","",0);
}

function dalbumEndToolbar($name)
{
        return getButton("#$name#end#","","","",0);
}


// user defined error handling function
function userErrorHandler ($errno, $errmsg, $filename, $linenum, $vars)
{
    // timestamp for the error entry
    $dt = date("Y-m-d H:i:s (T)");

    // define an assoc array of error string
    // in reality the only entries we should
    // consider are 2,8,256,512 and 1024
    $errortype = array (
                1   =>  "Error",
                2   =>  "Warning",
                4   =>  "Parsing Error",
                8   =>  "Notice",
                16  =>  "Core Error",
                32  =>  "Core Warning",
                64  =>  "Compile Error",
                128 =>  "Compile Warning",
                256 =>  "User Error",
                512 =>  "User Warning",
                1024=>  "User Notice",
                2048=>  "Strict Notice",
                );

    // set of errors for which a var trace will be saved
    $user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);
    $err = @"<PRE><FONT color=blue><B>{$errortype[$errno]}:</B>$errmsg in $filename ($linenum)</FONT></PRE>";
    echo "$err";
}

function reportError($error)
{
    global $g_sCharset,$lang,$g_sStylesheet,$g_sCustomStylesheet;

    $error=quotehtml($error);

    print <<< END
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>$error</title>
<meta http-equiv="Content-Type" content="text/html; charset={$g_sCharset}">
<link rel="stylesheet" href="$g_sStylesheet" type="text/css" media="screen">
<link rel="stylesheet" href="$g_sCustomStylesheet" type="text/css" >
</head>
<body class="centered">
<table class="dialog">
<tr><th class="error">$error</th></tr>
</tr>
<td>
<ul>
<li><a  href="javascript: window.back();">{$lang['errorReturn']}</a></li>
<li><a href="index.php">{$lang['mainPage']}</a></li>
</ul>
</td></tr></table>
</body>
</html>
END;
}

// make sure that the script has permission to read this file!
// authenticate username/password against /etc/passwd
// returns:  0 if password is incorrect
//           1 if username and password are correct
function authenticate($user, $pass, $bCallCustom=true)
{
    if ($bCallCustom && function_exists('customAuthentication'))
        return customAuthentication($user, $pass);

    global $g_sPrivateDir,$g_sHtpasswd;
    // make sure that the script has permission to read this file!
    $data = safe_read_file($g_sHtpasswd);

    if (empty($data))
        $data=array();
    // iterate through file
    foreach ($data as $line)
    {
        $arr = explode(":", trim($line));

        // if username matches
        // test password
        if ($arr[0] == $user)
        {
            $comp=explode("$",$arr[1]);
            $md5=md5crypt($pass,$comp[2],'$' . $comp[1] . '$');
            if ($md5==$comp[3])
                return 1;
            return 0;
        }

    }
    return 0;
}

function &createAlbum()
{
    $tmp=null;
    if (function_exists("customCreateAlbum"))
        $tmp=customCreateAlbum();
    else
        $tmp=new CAlbum;
    return $tmp;
}


function &createImage()
{
    $tmp=null;
    if (function_exists("customCreateImage"))
        $tmp=customCreateImage();
    else
        $tmp=new CImage;
    return $tmp;
}

function fixBrokenSessions()
{
    global $g_bBrokenSessions;
    if (isset($g_bBrokenSessions) && $g_bBrokenSessions)
    {
        session_register("_SESSION");
        global $_SESSION;
        $GLOBALS["_SESSION"]=&$_SESSION;
    }
}

// return always 3 digits aka 4.1.2
function fixed_phpversion()
{
    $curver = explode(".", phpversion());
    $v=(int)$curver[0] . "." . (int)$curver[1] . "." . (int)$curver[2];
    return $v;
}

// The following function can handle text files whose line endings
// are whatever <LF> (*nix), <CR><LF> (M$) or <CR>
function &safe_read_file($filename)
{
    $fp = fopen($filename, "rb");
    if (!$fp || (filesize($filename)<1))
    {
        $lines=array();
        return $lines;
    }

    $buffer = fread($fp, filesize($filename));
    fclose($fp);
    $lines = preg_split("/\r?\n|\r/", $buffer);
    return $lines;
}

// Convert </P> to <\/P> to help w3c page validation
function js_escape($text)
{
    return strtr(addslashes($text),array("</"=>"<\\/"));
}

// Translate refence to another page.
function translateRef($ref)
{
    if (function_exists('customTranslateRef'))
            return customTranslateRef($ref);
    return $ref;
}

// Determine if this user is admin (as previously returned from
// StartSessionAndGetUserName).
// Returns 0 - not admin, 1=admin, 2= super user
function isAdminMode($sUserName,$bCallCustom=true)
{
    if ($bCallCustom && function_exists('customIsAdminMode'))
        return customIsAdminMode($sUserName);

    if (!empty($sUserName))
    {
        global $g_sAdminUsers;
        if ($sUserName==$g_sAdminUsers[0])
            return 2;
        if (in_array($sUserName,$g_sAdminUsers))
            return 1;
    }
    return 0;
}

// Convert extra URL parameters into hidden args
function hiddenForms($x)
{
    $x=strstr($x,"?");
    if (!$x)
        return "";
    $x=substr($x,1);
    $v=explode('&amp;',$x);
    foreach ($v as $f)
    {
        $a=explode("=",$f);
        if (count($a)==2)
            print "<input type=\"hidden\" name=\"$a[0]\" value=\"$a[1]\">\n";
    }
}

// Create a directory with mkdir or FTP
function dalbum_mkdir($dir, $dirRights,$bChmodOnly=false)
{
    global $g_bFTPMkdir;
    global $g_sFTPHost, $g_sFTPPort, $g_sFTPUser, $g_sFTPPass, $g_sFTPRootdir, $g_bFTPPasv;

    if (is_dir($dir))
        $bChmodOnly=true;

    if (!isset($g_bFTPMkdir) || !$g_bFTPMkdir)
    {
        $old_umask = umask(0);
        if ($bChmodOnly)
            $b= chmod($dir, $dirRights);
        else
            $b= mkdir($dir, $dirRights);

        umask($old_umask);
        return $b;
    }

    // Connect
    $conn=ftp_connect($g_sFTPHost,$g_sFTPPort);
    if (!$conn)
        return false;

    if (!empty($g_sFTPUser))
    {
        $login=ftp_login($conn,$g_sFTPUser,$g_sFTPPass);
        if (!$login)
        {
                ftp_close($conn);
                return false;
        }
    }

    if ($g_bFTPPasv)
        ftp_pasv($conn,true);

    $ftproot=$g_sFTPRootdir;


    // Normalize $dir (.pictures/xxx/ => /home/john/public_html/photo/pictures/xxx)
    if (substr($dir,-1)=="/")
        $dir=substr($dir,0,-1);
    $dir=realpath(dirname(strval($dir))) . "/" . basename(strval($dir));


    $bRet=false;
    $chmDir="";
    if ($ftproot=="--auto--")
    {
        // Try to create folder as /home/john/public_html/photo/pictures/xxx,
        // then as /john/public_html/photo/pictures/xxx, etc. and finally as
        // pictures/xxx
        $ftproot="";

        $dirs=explode("/",$dir);
        if ($dirs[0]=='')
            $dirs=array_slice($dirs,1);

        for ($i=0;$i<count($dirs)-1;++$i)
        {
            $d="/" . join("/",array_slice($dirs,$i));

            $r="";
            if ($bChmodOnly)
            {
                $r=@dalbum_chmod_dirftp($conn,$d,$dirRights);
            }
            else
            {
                $r=@ftp_mkdir($conn,$d);
            }

            if (!empty($r))
            {
                $chmDir=$d;
                $bRet=true;
                break;
            }
        }
    }
    else
    {
        // FTP root given - use it
        $f=$ftproot;
        if (substr($f,-1)!='/')
            $f.='/';

        // ensure that $dir is subfolder of $ftproot.
        if (substr($dir,0,strlen($f))!=$f)
        {
            trigger_error("Directory $dir cannot be created through FTP",E_USER_WARNING);
            return false;
        }

        // get relative dir from FTP root
        $drel="/" . substr($dir,strlen($f));
        $r="";
        if ($bChmodOnly)
            $r=dalbum_chmod_dirftp($conn,$drel,$dirRights);
        else
            $r=ftp_mkdir($conn,$drel);

        if (!empty($r))
        {
            $chmDir=$drel;
            $bRet=true;
        }
    }

    if ($bRet && !$bChmodOnly)
    {
        dalbum_chmod_dirftp($conn,$chmDir,$dirRights);
    }
    ftp_quit($conn);
    return $bRet;

}

function dalbum_chmod_dirftp(&$conn, &$chmDir, $dirRights)
{
    // CHMOD the directory
    $dparent=dirname(strval($chmDir));
    if (empty($dparent) || ftp_chdir($conn,$dparent))
    {
        // one of these should work
        $rights="0" . decoct($dirRights);
        if (@ftp_site($conn, "CHMOD $rights $chmDir") ||
            @ftp_site($conn, "SITE CHMOD $rights $chmDir") ||
            @ftp_site($conn, "CHMOD $rights \"$chmDir\"") ||
            @ftp_site($conn, "SITE CHMOD $rights \"$chmDir\""))
        {
            return $chmDir;
        }
    }
    return false;
}

function insert_transparent_gif($wid)
{
    // Insert transparent gif of minimal tree width for MSIE & Opera. Firefox sometimes
    // has problems with it
    if (stristr($_SERVER['HTTP_USER_AGENT'],"MSIE") ||
        stristr($_SERVER['HTTP_USER_AGENT'],"Opera"))
    {
        print '<div class="fldimgrow"><img src="';
        print DALBUM_BROWSERROOT . 'images/transpix.gif';
        print '" width="' . $wid . 'px" height="1px" alt="" class="nothing"></div>';
    }
}

?>
