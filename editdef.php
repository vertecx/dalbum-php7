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

    define("DALBUM_EDITDEF_PAGE","1");

    require_once(DALBUM_ROOT."/include/md5crypt.php");
    require_once(DALBUM_ROOT . "/include/functions.php");
    require_once(file_exists(DALBUM_ROOT."/config/config.php")?DALBUM_ROOT."/config/config.php":DALBUM_ROOT."/include/config.php");
    require_once(DALBUM_ROOT."/include/conffix.php");
    require_once(DALBUM_ROOT."/include/createhta.php");
    require_once(DALBUM_ROOT."/include/createini.php");
    require_once(DALBUM_ROOT."/include/album.php");

    // Include custom functions
    if (file_exists(DALBUM_ROOT . "/config/custom.php"))
        include_once(DALBUM_ROOT . "/config/custom.php");
    elseif (file_exists(DALBUM_ROOT . "/include/custom.php"))
        include_once(DALBUM_ROOT . "/include/custom.php");


    if ($g_bGZip)
        ob_start("ob_gzhandler");

    remove_bloody_magic_quotes();

    // Start session and get current user name
    $sUserName=StartSessionAndGetUserName('private; must-revalidate');
    if (function_exists('everypageCallback'))
        everypageCallback($sUserName);

    function CheckFilename($filelocation, &$albRoot)
    {
        global $g_sAlbumdef;
        if (basename($filelocation)!=$g_sAlbumdef ||
            strstr($filelocation,".."))
            die("Security violation");
        $alb=$albRoot->FindAlbum(dirname_ex($filelocation));
        if (empty($alb) || $alb->m_bPrivate)
            die("Security violation");
        return true;
    }

    if (isset($_POST['url']))
        $url=$_POST['url'];
    if (empty($url) && isset($_GET['url']))
        $url=@$_GET['url'];
    if (empty($url))
        $url=base64_encode(translateRef("index.php"));


    $c=parse_url(base64_decode($url));
    $sTarget=basename($c['path'] );
    if (!empty($c['query']))
        $sTarget.='?' . $c['query'];

    if (!isAdminMode($sUserName) || isset($_POST['cancel']))
    {
        dalbum_relocate($sTarget);
        return;
    }

    $albRoot=&CAlbum::CreateFromArchive();
    $albRoot->SetAccess($sUserName);


    if (isset($_POST['newcontent']))
    {
        $newcontent=$_POST['newcontent'];
        $filelocation = $_POST['filename'];
        CheckFilename($filelocation,$albRoot);

        if ($g_Demo || @save_file(absfname($filelocation),$newcontent))
        {
            RefreshAlbumAndSaveTree(dirname_ex($filelocation));
            dalbum_relocate($sTarget);
            return;
        }
        else
        {
            reportError(strtr($lang['editSaveError'],array('#filename#'=>quotehtml($newfname))));
            return;
        }
    }

    if (!isset($_GET['filename']))
        die("Invalid arguments!");

    $filelocation=$_GET['filename'];
    CheckFilename($filelocation,$albRoot);

    $content = "";
    $newfile = fopen(absfname($filelocation),"r");
    $warning="";
    if (!$newfile)
    {
        $warning= $lang['editNewFileMessage'];
    }
    else
    {
        $content = quotehtml(fread($newfile, filesize(absfname($filelocation))));
        fclose($newfile);
    }

    global $g_sCharset;

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
<head>
<title><?php print strtr($lang['editTitle'],array('#filename#'=>quotehtml($filelocation))); ?></title>
<meta http-equiv="pragma" content="nocache">
<meta HTTP-EQUIV="Pragma" CONTENT="no-cache">

<script src="<?php print DALBUM_BROWSERROOT . 'dalbum.js'; ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php print $g_sStylesheet; ?>" type="text/css">
<link rel="stylesheet" href="<?php print $g_sCustomStylesheet; ?>" type="text/css" >

<meta http-equiv="Content-Type" content="text/html; charset=<?php print $g_sCharset;?>">
</head>
<body onload="javascript: dalbum_firstFocus();" class=centered>
<form action="" method="POST">

<table border="0" class="dialog">
<tr>
    <th><?php print quotehtml($filelocation); ?></th>
<tr>
    <td>
        <textarea name="newcontent" cols=80 rows=25 wrap=off><?php print "$content"; ?></textarea>
        <input type='hidden' name='filename' value='<?php print quoteurl($filelocation); ?>'>
        <input type='hidden' name='url' value='<?php print quoteurl($url); ?>'>
    </td>
</tr>
<tr>
    <td style="text-align:right;">
        <input type="submit" name="save"   value="<?php print $lang['editSaveBtn']; ?>">&nbsp;
        <input type="submit" name="cancel" value="<?php print $lang['editCancelBtn']; ?>">
    </td>
</tr>
</table>
</form>
<div><a href='<?php print translateRef("index.php");?>' class='pageLink' ><?php print $lang['mainPage'];?></a></div>
</body>
</html>
<?php   if ($g_bGZip)   ob_end_flush(); ?>