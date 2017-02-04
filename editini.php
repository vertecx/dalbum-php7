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

    define("DALBUM_EDITINI_PAGE","1");

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

    $sUserName=StartSessionAndGetUserName('private; must-revalidate');
    if (function_exists('everypageCallback'))
        everypageCallback($sUserName);

    $url="";
    if (isset($_POST['url']))
        $url=$_POST['url'];
    if (empty($url) && isset($_GET['url']))
        $url=@$_GET['url'];
    if (empty($url))
        $url=base64_encode(translateRef("index.php"));

    $sTarget=base64_decode($url);

    if (!isAdminMode($sUserName) || isset($_POST['cancel']))
    {
        dalbum_relocate($sTarget);
        exit();
    }

    if (isset($_GET['album']))
        $albFolder=$_GET['album'];
    else if (isset($_POST['album']))
        $albFolder=$_POST['album'];
    else
        die("Invalid arguments!");


    // Load album
    $albRoot=&CAlbum::CreateFromArchive();
    $albRoot->SetAccess($sUserName);

    $alb=&$albRoot->FindAlbum($albFolder);
    if (empty($alb) || $alb->m_bPrivate)
        die("Security violation");

    $alb->LoadImages();
    $alb->LoadDetails();

    global $g_Demo;
    //
    if (isset($_POST['save']))
    {
        if ($g_Demo)
        {
            dalbum_relocate( $sTarget);
            return;
        }
        // Create
        $alb->m_sTitle=trim($_POST['album_title']);
        if ($_POST['album_commhtml'])
        {
            $alb->m_sCommentHTML="";
            if ($_POST['album_commhtml']==2)
                $alb->m_sCommentHTML.="!";
            $alb->m_sCommentHTML.=trim($_POST['album_comm']);
            $alb->m_sComment="";
        }
        else
        {
            $alb->m_sComment=trim($_POST['album_comm']);
            $alb->m_sCommentHTML="";
        }

        $alb->m_sDate=trim($_POST['album_date']);

        // Users
        $alb->m_arrUsers=array();
        $arr=split(",",$_POST['album_users']);
        foreach ($arr as $a)
        {
            $a=trim($a);
            if (strlen($a))
                $alb->m_arrUsers[]=$a;
        }

        // Prevent lock-out
        if (count($alb->m_arrUsers) &&
            !in_array('valid-user',$alb->m_arrUsers) &&
            !in_array('all',$alb->m_arrUsers))
        {
            if (!in_array($sUserName,$alb->m_arrUsers))
                $alb->m_arrUsers[]=$sUserName;
        }


        $alb->m_bDefault=false;
        if (isset($_POST['album_default']) && (bool)$_POST['album_default'])
            $alb->m_bDefault=true;
        $alb->m_sTitleImage=$_POST['album_titleimage'];

        // Custom fields
        $fields=&$alb->GetCustomFieldNames();
        foreach ($fields as $fld)
        {
            $val="";
            if (isset($_POST["album_cust_$fld"]))
                $val=$_POST["album_cust_$fld"];
            if (empty($val))
                unset($alb->m_arrCustomFields[$fld]);
            else
                $alb->m_arrCustomFields[$fld]=$val;
        }

        // go through all images
        for ($i=0;$i<count($alb->m_arrContents);++$i)
        {
            if (!$alb->m_arrContents[$i]->IsImage())
                continue;
            $img=&$alb->m_arrContents[$i];

            $file=$img->m_sBaseFilename;
            $name="arr".md5($img->m_sBaseFilename);

            if (!isset($_POST["{$name}_title"]))
                continue;

            $img->m_sTitle=trim($_POST["{$name}_title"]);
            if ($_POST["{$name}_commhtml"])
            {
                $img->m_sCommentHTML=trim($_POST["{$name}_comm"]);
                $img->m_sComment="";
            }
            else
            {
                $img->m_sComment=trim($_POST["{$name}_comm"]);
                $img->m_sCommentHTML="";
            }

            if (!!$img->m_bResize!=!!(bool)@$_POST["{$name}_resize"])
            {
                if ($img->m_bResize)
                    @unlink(absfname($img->GetResizedFilename()));
                $img->m_bResize=(bool)@$_POST["{$name}_resize"];
            }

            $newfname=basename(trim($_POST["{$name}_fname"]));
            if (trim($newfname)!=trim($file))
            {
                if (strlen(trim($newfname))==0)
                {
                    @unlink(absfname($img->GetThumbnailFilename()));
                    @unlink(absfname($img->GetResizedFilename()));
                    @unlink(absfname($img->m_sFullFilename));
                    $alb->m_arrContents[$i]=null;
                    $img=null;
                }
                else
                {
                    // verify that we don't have path in the new filename and file extension is picture
                    $a=&createImage();
                    $a->Init($alb->m_sFolder . $newfname);
                    if ($a->IsImageFilename())
                    {
                        $a->m_sBaseFilename=$newfname;
                        $a->m_sFullFilename=$alb->m_sFolder .$a->m_sBaseFilename;
                        @rename(absfname($img->m_sFullFilename),absfname($a->m_sFullFilename));
                        @rename(absfname($img->GetThumbnailFilename()),absfname($a->GetThumbnailFilename()));
                        @rename(absfname($img->GetResizedFilename()),absfname($a->GetResizedFilename()));
                        $img->m_sFullFilename=$a->m_sFullFilename;
                        $img->m_sBaseFilename=$a->m_sBaseFilename;
                    }
                    else
                    {
                        reportError(strtr($lang['editRenameError'],array('#filename#'=>$newfname)));
                        return;
                    }
                }
            }

            if ($img)
            {
                $fields=&$img->GetCustomFieldNames();
                foreach ($fields as $fld)
                {
                    $val="";
                    if (isset($_POST["{$name}_cust_$fld"]))
                        $val=$_POST["{$name}_cust_$fld"];
                    if (empty($val))
                        unset($img->m_arrCustomFields[$fld]);
                    else
                        $img->m_arrCustomFields[$fld]=$val;
                }
            }

        }

        if (!create_defaultIni($alb,true))
        {
            global $g_sAlbumdef;
            $f=quotehtml($albFolder . $g_sAlbumdef);
            reportError(strtr($lang['editSaveError'],array('#filename#'=>$f)));
            return;
        }


        RefreshAlbumAndSaveTree($alb->m_sFolder);

        //
        dalbum_relocate($sTarget);
        return;
    }

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
<head>
<title><?php global $g_sAlbumdef; print strtr($lang['editTitle'],array('#filename#'=>quotehtml($albFolder . $g_sAlbumdef))); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php print $g_sCharset;?>">
<script src="<?php print DALBUM_BROWSERROOT . 'dalbum.js'; ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php print $g_sStylesheet; ?>" type="text/css">
<link rel="stylesheet" href="<?php print DALBUM_BROWSERROOT . 'custom.css'; ?>" type="text/css" >
</head>

<body class="centered">
<div><a name="top"></a></div>
<form action="" method="POST">
<table border="0" class="dialog" >
<tr>
    <th colspan=2>
    <?php print $lang['editDlgTitle']; ?>
    <input type='hidden' name='album' value='<?php print quotehtml($alb->m_sFolder); ?>'>
    <input type='hidden' name='url' value='<?php print quotehtml($url); ?>'>
    </th>
</tr>
<tr>
    <td><?php print $lang['editFileLocation'];?></td>
    <td>
<?php
    global $g_sAlbumdef;
    $fname=$alb->m_sFolder . $g_sAlbumdef;
    print " ";
    print quotehtml($fname);
    $url=translateRef("editdef.php?filename=" . quoteurl($fname) . "&amp;url=" . urlencode($url));

    print "&nbsp;&nbsp;&nbsp;<a href='".quotehtml($url)."' class=\"buttonLink\" title='{$lang['editEditAsTextBtnTitle']}'>";
    print $lang['editEditAsTextBtn'] . "</a>";

?>
    </td>
</tr>
<tr>
    <td></td><td>
        <?php print $lang['editReindexNote']; ?>
    </td>
</tr>

<tr>
    <td><label for="album_title"><?php print $lang['editAlbumTitle']; ?></label></td>
    <td><input size=60 type=text id="album_title" name="album_title" value="<?php print quotehtml($alb->m_sTitle);?>"></td>
</tr>
<tr>
    <td><label for="album_date"><?php print $lang['editAlbumDate']; ?></label></td>
    <td><input size=60 type=text name="album_date" id="album_date" value="<?php print quotehtml($alb->m_sDate);?>"></td>
</tr>
<tr>
    <td><label for="album_comm"><?php print $lang['editAlbumComment']; ?></label>
<?php
    if (!empty($alb->m_sCommentHTML))
    {
        if (substr($alb->m_sCommentHTML,0,1)=="!")
        {
            $comment=quotehtml(substr($alb->m_sCommentHTML,1));
            $nHTML=2;
        }
        else
        {
            $comment=quotehtml($alb->m_sCommentHTML);
            $nHTML=1;
        }
    }
    else
    {
        $comment=quotehtml($alb->m_sComment);
        $nHTML=0;
    }

?>
    <br>
    <input type=radio id="album_commhtml0" name="album_commhtml" value=2 <?php print ($nHTML==2)?" checked":""; ?>>
        <label for="album_commhtml0"><?php print $lang['editHTMLSep']; ?></label><br>
    <input type=radio id="album_commhtml1" name="album_commhtml" value=1 <?php print ($nHTML==1)?" checked":""; ?>>
        <label for="album_commhtml1"><?php print $lang['editHTML']; ?></label><br>
    <input type=radio id="album_commhtml2" name="album_commhtml" value=0 <?php print ($nHTML==0)?" checked":""; ?>>
        <label for="album_commhtml2"><?php print $lang['editText']; ?></label>
    </td>
    <td>
        <textarea id="album_comm" name="album_comm" cols=60 rows=6 wrap="on"><?php print $comment; ?></textarea>
    </td>
</tr>
<tr>
    <td><label for="album_titleimage"><?php print $lang['editAlbumTitleImage']; ?></label></td>
    <td><select name="album_titleimage" id="album_titleimage">
    <option></option>
<?php
    for ($i=0;$i<count($alb->m_arrContents);++$i)
    {
        if (!$alb->m_arrContents[$i]->IsImage())
            continue;
        $selected="";
        if ($alb->m_sTitleImage==$alb->m_arrContents[$i]->m_sBaseFilename)
            $selected=" selected";
        print "<option $selected>" . quotehtml($alb->m_arrContents[$i]->m_sBaseFilename) . "</option>";
    }?>
    </select></td>
</tr>
<tr>
    <td></td>
    <td>
        <input type=checkbox id="album_default" name="album_default" value=1 <?php print $alb->m_bDefault?" checked":""; ?>>
            <label for="album_default"><?php print $lang['editAlbumDefault']; ?></label>
    </td>
</tr>
<tr>
    <td><label for="album_users"><?php print $lang['editAlbumUsers']; ?></label></td>
    <td>
        <input size=60 type=text id="album_users" name="album_users" value="<?php print quotehtml(join(", ",$alb->m_arrUsers));?>">
    </td>
</tr>
<tr>
    <td></td><td>
        <?php print $lang['editAlbumUsersNote']; ?>
        </td>
</tr>
<?php
    // Custom fields
    $fields=&$alb->GetCustomFieldNames();

    foreach ($fields as $fld)
    {
        $val="";
        if (isset($alb->m_arrCustomFields[$fld]))
            $val=$alb->m_arrCustomFields[$fld];
        $val=quotehtml($val);
        print <<< END
<tr>
    <td>
        <label for="album_cust_$fld"><i>$fld</i></label>
    </td>
    <td>
        <input size=60 type=text value="$val" name="album_cust_$fld" id="album_cust_$fld">
    </td>
</tr>
END;
    }
?>

<tr>
    <td colspan=2 style="text-align:right;">
        <input type="submit" name="save"   value="<?php print $lang['editSaveBtn']; ?>">&nbsp;
        <input type="submit" name="cancel" value="<?php print $lang['editCancelBtn']; ?>">
    </td>

</tr>


<!--==============================================-->
<tr>
    <td colspan=2>
    <hr style="width:100%;">
    <script type="text/javascript">
        //<!--
            dalbum_firstFocus();
            dalbum_setHideFocus();
        //-->
    </script>
    </td>
</tr>
<!--==============================================-->
<?php
    for ($i=0;$i<count($alb->m_arrContents);++$i)
    {
        if (!$alb->m_arrContents[$i]->IsImage())
            continue;
        $img=&$alb->m_arrContents[$i];

        $file=$img->m_sBaseFilename;

        if (!empty($img->m_sCommentHTML))
        {
            $comment=quotehtml($img->m_sCommentHTML);
            $sHTML=" checked";
            $sText="";
        }
        else
        {
            $comment=quotehtml($img->m_sComment);
            $sHTML="";
            $sText=" checked";
        }
        $name="arr".md5($img->m_sBaseFilename);
        $filename=quotehtml($img->m_sBaseFilename);
        $thm=$img->CreateThumbnailHTML("target='popup' title='" . strtr($lang['editThumbLink'],array('#filename#'=>$filename)) ."'");
        $title=quotehtml($img->m_sTitle);
        $sResize=$img->m_bResize?" checked":"";

        $w=$g_sThumbnailXSize+40;
        $fields=&$img->GetCustomFieldNames();
        $rowspan=4+count($fields);
        print <<< END
<tr><td colspan=2>
<table style="font-size:100%;padding:0;margin:0;" cellpadding=2 cellspacing=2 class="dialog">
<tr>
<td rowspan="$rowspan" class=thumbview width="$w">$thm</td>
    <td><label for="{$name}_fname">{$lang['editImgFilename']}</label></td>
    <td colspan=2><input size=60 type=text value="$filename" name="{$name}_fname" id="{$name}_fname"></td>
</tr>
<tr>
    <td><label for="{$name}_title">{$lang['editImgTitle']}</label></td>
    <td colspan=2><input size=60 type=text value="$title" name="{$name}_title" id="{$name}_title"></td>
</tr>
<tr>
    <td><label for="{$name}_comm">{$lang['editImgComment']}</label>
    <br>
    <input type=radio id="{$name}_commhtml1" name="{$name}_commhtml" value=1 $sHTML><label for="{$name}_commhtml1">{$lang['editHTML']}</label><br>
    <input type=radio id="{$name}_commhtml2" name="{$name}_commhtml" value=0 $sText><label for="{$name}_commhtml2">{$lang['editText']}</label>
    </td>
    <td colspan=2>
        <textarea id="{$name}_comm" name="{$name}_comm" cols=45 rows=4 wrap=on>$comment</textarea>
    </td>
</tr>

END;

    foreach ($fields as $fld)
    {
        $val="";
        if (isset($img->m_arrCustomFields[$fld]))
            $val=$img->m_arrCustomFields[$fld];
        $val=quotehtml($val);

        print <<< END
<tr>
    <td>
        <label for="{$name}_cust_$fld"><i>$fld</i></label>
    </td>
    <td colspan=2>
        <input size=60 type=text value="$val" name="{$name}_cust_$fld" id="{$name}_cust_$fld">
    </td>
</tr>
END;
    }

    print <<< END

<tr>
    <td></td>
    <td>
        <input type=checkbox name="{$name}_resize" value=1 $sResize id="{$name}_resize">
        <label for="{$name}_resize">{$lang['editImgResize']}</label>
    </td>
    <td align=right>
        <a href="#top">{$lang['editTop']}</a>
    </td>
</tr>
</table></td></tr>

END;
}



?>

</table>
</form>
<div><a href='<?php print translateRef("index.php");?>' class='pageLink' ><?php print $lang['mainPage'];?></a></div>

</body>
</html>
<?php if ($g_bGZip) ob_end_flush(); ?>