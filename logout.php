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

    define("DALBUM_LOGOUT_PAGE","1");

    require_once(DALBUM_ROOT."/include/md5crypt.php");
    require_once(DALBUM_ROOT . "/include/functions.php");
    require_once(file_exists(DALBUM_ROOT."/config/config.php")?DALBUM_ROOT."/config/config.php":DALBUM_ROOT."/include/config.php");
    require_once(DALBUM_ROOT."/include/conffix.php");
    require_once(DALBUM_ROOT."/include/album.php");

    // Include custom functions
    if (file_exists(DALBUM_ROOT . "/config/custom.php"))
        include_once(DALBUM_ROOT . "/config/custom.php");
    elseif (file_exists(DALBUM_ROOT . "/include/custom.php"))
        include_once(DALBUM_ROOT . "/include/custom.php");

    // Start session and get current user name
    $sUserName=StartSessionAndGetUserName('nocache');
    if (function_exists('everypageCallback'))
        everypageCallback($sUserName);

    if ($g_bBrokenSessions)
        fixBrokenSessions();

    $_SESSION['DAlbum_UID']="";
    unset($_SESSION['DAlbum_UID']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
<head>
<meta http-equiv="pragma" content="nocache">
<meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=<?php print $g_sCharset;?>">

<script src="<?php print DALBUM_BROWSERROOT . 'dalbum.js'; ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php print $g_sStylesheet; ?>" type="text/css">
<link rel="stylesheet" href="<?php print $g_sCustomStylesheet; ?>" type="text/css" >

</head>
<body class="centered">
<a href='<?php print translateRef("index.php");?>' class='pageLink' ><?php print $lang['mainPage'];?></a>
<script type="text/javascript">
//<!--
setTimeout('window.location.replace("<?php print html2txt(translateRef("index.php")); ?>");',500);
//-->
</script>
</body>
</html>
