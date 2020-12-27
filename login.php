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

    define("DALBUM_LOGIN_PAGE","1");

    require_once(DALBUM_ROOT.'/include/md5crypt.php');
    require_once(DALBUM_ROOT."/include/functions.php");
    require_once(file_exists(DALBUM_ROOT."/config/config.php")?DALBUM_ROOT."/config/config.php":DALBUM_ROOT."/include/config.php");
    require_once(DALBUM_ROOT."/include/conffix.php");
    require_once(DALBUM_ROOT."/include/createhta.php");
    require_once(DALBUM_ROOT."/include/createini.php");
    require_once(DALBUM_ROOT."/include/album.php");

    // Include custom functions
    if (file_exists(DALBUM_ROOT."/config/custom.php"))
        include_once(DALBUM_ROOT."/config/custom.php");
    elseif (file_exists(DALBUM_ROOT."/include/custom.php"))
        include_once(DALBUM_ROOT."/include/custom.php");

    if (function_exists('everypageCallback'))
        everypageCallback("");


    if (isset($_POST['cancel']))
    {
        dalbum_relocate(translateRef('index.php'));
        return;
    }

    global $g_bHTTPAuth;

    // Load main album
    $sTitle="";
    $albRoot=&CAlbum::CreateFromArchive();
    if (!empty($albRoot))
        $sTitle=$albRoot->GetTitle();

    if (empty($sTitle))
        $sTitle="DAlbum";

    //
    $sRefURL="";
    if (isset($_GET['url']))
        $sRefURL=$_GET['url'];
    if (isset($_POST['f_URL']))
        $sRefURL=$_POST['f_URL'];
    if (empty($sRefURL))
        $sTarget=dirname_ex($_SERVER['PHP_SELF'])."/index.php";
    else
        $sTarget=base64_decode($sRefURL);


    if ($g_bHTTPAuth)
    {
        if (isset($_SERVER['REMOTE_USER']))
        {
            dalbum_relocate($sTarget);
        }
        elseif (!isset($_SERVER['PHP_AUTH_USER']) || !authenticate($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW']))
        {
            global $g_sAuthName;
            header("WWW-Authenticate: Basic realm=\"$g_sAuthName\"");
            header('HTTP/1.0 401 Unauthorized');
            LogonFailure($sRefURL);
        }
        else
        {
            setcookie('DAlbum_Auth',"1");
            dalbum_relocate($sTarget);
        }
        return;
    }

    // Start session
    StartSessionAndGetUserName('nocache',true);

    // We are called from form
    if (!empty($_POST['f_user']))
    {
        // authenticate using form variables
        $status = authenticate($_POST['f_user'], $_POST['f_pass']);

        // if user/pass combination is correct
        if ($status == 1)
        {
            // start session
            $_SESSION['DAlbum_UID'] = $_POST['f_user'];
            $c=parse_url($sTarget);
            $sTarget=basename($c['path'] );
            if (!empty($c['query']))
                $sTarget.='?' . $c['query'];
            fixBrokenSessions();
            dalbum_relocate($sTarget);
        }
        else
        {
            LogonFailure($sRefURL,  $sTitle);
        }
        return;
    }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
<head>
<title><?php print strtr($lang['loginTitle'],array("#title#"=>$sTitle)); ?></title>
<meta http-equiv="pragma" content="nocache">
<meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=<?php print $g_sCharset;?>">
<script src="<?php print DALBUM_BROWSERROOT . 'dalbum.js'; ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php print $g_sStylesheet; ?>" type="text/css">
<link rel="stylesheet" href="<?php print $g_sCustomStylesheet; ?>" type="text/css" >
</head>
<body onload="javascript: dalbum_firstFocus();" class="centered">

<form action="" method="POST">
<table class="dialog">
<tr>
    <th colspan="2"><?php print strtr($lang['loginTitle'],array("#title#"=>$sTitle)); ?>

<script type="text/javascript">
//<!--
        cookiestring = "DAlbumTestCookie=1;"
        document.cookie = cookiestring;
        if (document.cookie)
        {
            cookiestring = "DAlbumTestCookie=1;EXPIRES=Wednesday, 04-Apr-01 03:09:32 GMT;"
            document.cookie = cookiestring;
        }
        else
        {
            document.write('<?php print js_escape("</th></tr><tr><td colspan=2 class='error' style='width:400px;'>" . $lang['loginNoCookiesWarning'] . "</td></tr><tr><th style='display:none;'>"); ?>');
        }
//-->
</script>
</th>
</tr>
<tr>
    <td id="username"><?php print $lang['username']; ?></td>
    <td><input type="text" size="10" name="f_user" ></td>
</tr>
<tr>
    <td><?php print $lang['password']; ?></td>
    <td><input type="password" size="10" name="f_pass" >
<?php
    if (isset($_GET['url']))
    {
        print "<input type='hidden' name='f_URL' value='" . htmlentities($sRefURL) . "'>\n";
    }?>
</td></tr>
<tr>
    <td colspan="2" align="right">
        <input type="submit" name="submit" value="<?php print $lang['loginLoginBtn']; ?>">
        <input type="submit" name="cancel" value="<?php print $lang['loginCancelBtn']; ?>">
</td> </tr>
</table>
</form>
<div><a href='<?php print translateRef("index.php");?>' class='pageLink' ><?php print $lang['mainPage'];?></a></div>

</body>
</html>

<?php

// Logon failure function
function LogonFailure($sRefURL)
{
    global $lang,$g_sStylesheet;

    $sRelogonURL='login.php';
    if (!empty($sRefURL))
        $sRelogonURL.="?url=" . $sRefURL;
    $sRelogonURL=translateRef($sRelogonURL);
    global $g_sCharset;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
<head>
<title><?php print $lang['loginAuthError']; ?></title>
<meta http-equiv="pragma" content="nocache">
<meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=<?php print $g_sCharset;?>">
<link rel="stylesheet" href="<?php print $g_sStylesheet; ?>" type="text/css">
<link rel="stylesheet" href="<?php print DALBUM_BROWSERROOT . 'custom.css'; ?>" type="text/css" >
</head>
<body class="centered">
<table class="dialog" >
<tr>
<th><?php print $lang['loginAuthError']; ?></th>
</tr>
<tr>
<td>
<p><?php print $lang['loginBadUserName']; ?></p>
<ul>
<li><a HREF='<?php print $sRelogonURL; ?>'><?php print $lang['loginAgain'];?></a></li>
<li><a href='<?php print translateRef("index.php");?>'><?php print $lang['mainPage'];?></a></li>
</ul>
</td>
</tr>
</table>
</body>
</html>
<?php

}


?>
