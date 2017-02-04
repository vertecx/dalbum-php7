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

    define("DALBUM_EDITINI_PASS","1");

    require_once(DALBUM_ROOT.'/include/md5crypt.php');
    require_once(DALBUM_ROOT. "/include/functions.php");
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

    // Start session and get current user name
    $sUserName=StartSessionAndGetUserName('nocache');
    if (function_exists('everypageCallback'))
        everypageCallback($sUserName);

    remove_bloody_magic_quotes();

    if (isset($_POST['cancelexit']) || isAdminMode($sUserName)!=2)
    {
        dalbum_relocate(translateRef('index.php'));
        return;
    }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>

<script src="<?php print DALBUM_BROWSERROOT . 'dalbum.js'; ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php print $g_sStylesheet; ?>" type="text/css">
<link rel="stylesheet" href="<?php print $g_sCustomStylesheet; ?>" type="text/css" >

<meta http-equiv="Content-Type" content="text/html; charset=<?php print $g_sCharset;?>">
<title><?php print $lang['passTitle'];?></title>
</head>
<body onload="javascript: dalbum_firstFocus();" class="centered">

<?php

    $file = $g_sHtpasswd;
    $f=safe_read_file($file);
    for ($i=0;$i<count($f);++$i)
        $f[$i]=trim($f[$i]);
    $f=array_filter($f, create_function('$a','return !empty($a);'));

    if (empty($f))
        $f=array();

    $f=array_values($f);
    sort($f);

    $bUpdate=false;
    $bMainScreen=true;

    if (isset($_POST['cancel']))
        ;
    else if (isset($_POST['action']) && ($_POST['action']=='add' || $_POST['action']=='change'))
    {
        $bAdd=true;
        $n=-1;
        if (empty($_POST['user']))
        {
            Error("Username cannot be empty.");
            $bAdd=false;
        }
        else
        {
            for ($i=0;$i<count($f);++$i)
            {
                $arr=split(":",$f[$i]);
                if ($arr[0]==$_POST['user'])
                {
                    if ($_POST['action']=='change')
                    {
                        $n=$i;
                    }
                    else
                    {
                        Error(strtr($lang['passUserExists'],array('#user#'=>$arr[0])));
                        $bAdd=false;
                    }
                    break;
                }
            }

            // Verify that passwords match
            if (@$_POST['pass']!=@$_POST['passc'])
            {
                Error($lang['passNotMatch']);
                $bAdd=false;
            }
        }

        if ($bAdd)
        {
            srand((double)microtime()*1000000);
            $salt="";
            for ($i=0;$i<8;$i++)
                $salt.=chr(rand(48,126));
            $salt=substr(base64_encode($salt),0,8);
            //
            $md5=md5crypt($_POST['pass'],$salt);
            $str="{$_POST['user']}:\$apr1\$$salt\$$md5\n";

            if ($n==-1)
                $f[]=$str;
            else
                $f[$n]=$str;
            $bUpdate=true;
        }

    }
    else if (isset($_POST['add']))
    {
        AddUser();
        $bMainScreen=false;
    }
    else if (isset($_POST['change']))
    {
        if (empty($_POST['user']))
        {
            Error($lang['passNoUserSelected']);
        }
        else
        {
            ChangePass($_POST['user']);
            $bMainScreen=false;
        }
    }
    else if (isset($_POST['delete']) && isset($_POST['user']))
    {
        for ($i=0;$i<count($f);++$i)
        {
            $arr=split(":",$f[$i]);
            if ($arr[0]==$_POST['user'])
            {
                if ($sUserName==$arr[0])
                {
                    Error($lang['passNoAdminDelete']);
                }
                else
                {
                    unset($f[$i]);
                    $f=array_values($f);
                    $bUpdate=true;
                }
                break;
            }
        }
    }
    global $g_Demo;
    if ($bUpdate && !$g_Demo)
    {
        $cont="";
        foreach ($f as $a)
            $cont.=trim($a)."\n";

        if (!@save_file($file,$cont,"w"))
            Error($lang['passWriteError']);
    }

    if ($bMainScreen)
        MainScreen($f);


/////////////////////////////////////////////////////////
function Error($error)
{
    global $lang;
    print("<P class='error'>" . strtr($lang['passError'],array('#error#'=>$error)) . "</P>");
}
function MainScreen($f)
{
    global $lang;
?>
<form action="" method="POST">
<table class="dialog">
<tr><th><?php print $lang['passTitle']; ?></th></tr>
<tr><td>
<select size="10" name="user" style="width:450px;">
<?php

  foreach ($f as $a)
  {
    $arr=split(":",$a);
    if (isset($_POST['user']) && $_POST['user']==$arr[0])
        $selected="selected";
    else
        $selected="";
    print "<option $selected>" . $arr[0] . "</option>\n";
  }
?>
</select></td></tr>
<tr><td style="text-align:center;" >
<input type="submit" value="<?php print $lang['passAddBtn']; ?>" name="add">
<input type="submit" value="<?php print $lang['passDeleteBtn']; ?>" name="delete">
<input type="submit" value="<?php print $lang['passChangePwdBtn']; ?>" name="change">
<input type="submit" name="cancelexit" value="<?php print $lang['passCloseBtn']; ?>">
</td></tr>
</table>
</form>

<?php
}

/////////////////////////////////////////////////////////
function AddUser()
{
    global $lang;
?>
<form action="" method="POST">
<table border="0" cellspacing="2" cellpadding="5" class="dialog">
<tr>
    <th colspan="2"><?php print $lang['passAddUserDlgTitle']; ?></th>
<tr>
    <td id=username><?php print $lang['username']; ?></td>
    <td><input type="text" size="10" name="user"></td>
</tr>
<tr>
    <td><?php print $lang['password']; ?></td>
    <td><input type="password" size="10" name="pass">
</td></tr>
<tr>
    <td><?php print $lang['passConfirmPassword']; ?></td>
    <td><input type="password" size="10" name="passc">
</td></tr>
<tr>
    <td colspan="2" align="right">
        <input type="submit" name="add" value="<?php print $lang['passAddBtn']; ?>">
        <input type="submit" name="cancel" value="<?php print $lang['passCancelBtn']; ?>">
        <input type="hidden" name="action" value="add">
    </td>
</tr>
</table>
</form>
<?php
}
/////////////////////////////////////////////////////////
function ChangePass($user)
{
    global $lang;
?>
<form action="" method="POST">
<table border="0" cellspacing="2" cellpadding="5" class="dialog">
<tr>
    <th colspan=2><?php print $lang['passChangePwdDlgTitle']; ?></th>
<tr>
    <td id=username><?php print $lang['username']; ?></td>
    <td><?php print $user;?></td>
</tr>
<tr>
    <td><?php print $lang['password']; ?></td>
    <td><input type="password" size="10" name="pass">
</td></tr>
<tr>
    <td><?php print $lang['passConfirmPassword']; ?></td>
    <td><input type="password" size="10" name="passc">
</td></tr>
<tr>
    <td colspan="2" style="text-align:right">
        <input type="submit" name="change" value="<?php print $lang['passChangePwdBtn']; ?>">
        <input type="submit" name="cancel" value="<?php print $lang['passCancelBtn']; ?>">
        <input type="hidden" name="action" value="change">
        <input type="hidden" name="user" value="<?php print $user;?>">
    </td>
</tr>
</table>
</form>
<?php
}
?>
<div><a href='<?php print translateRef("index.php");?>' class='pageLink' ><?php print $lang['mainPage'];?></a></div>
</body>
</html>