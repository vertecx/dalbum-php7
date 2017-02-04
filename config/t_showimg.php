<?php /*----------------------------------------------------------------

  This is template of the DAlbum showimg page. Feel free to modify it
  to suit your website.


  The following variables are set:

    $albRoot    : root album (class CAlbum)
    $album      : current album (class CAlbum)
    $image      : current image (class CImage)
    $sUserName  : current user name
    $bAdminMode : true if current user is admin
    $next       : encoded url of the next image page (or empty for last page)
    $prev       : encoded url of the previous image page (or empty for first page)
    $first      : encoded url of the first image in album
    $last       : encoded url of the last image in album

  It is not recommented rely on other variables as they may change in
  the future versions.

  --------------------------------------------------------------------*/
  if (!defined('DALBUM_ROOT'))     die("Security problem");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php print $g_sCharset;?>">
<meta http-equiv="imagetoolbar" content="no">

<script src="<?php print DALBUM_BROWSERROOT . 'dalbum.js'; ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php print $g_sStylesheet; ?>" type="text/css">
<link rel="stylesheet" href="<?php print $g_sCustomStylesheet; ?>" type="text/css" >

<title><?php template('Title'); ?></title>
<?php template('Head'); ?>
<script type='text/javascript'>
//<!--
<?php template('HeadJavascript'); ?>
//-->
</script>
</head>

<!-- Begin page -->
<body class="nomargins" onload="javascript: dalbum_onload();" id="showimgBody">
<table class="pagetable" cellspacing="0" cellpadding="0" id="showimgPagetable">

<!-- Row 1: header -->
<tr><td style="vertical-align:top;">
<div class="imgHeader">
<div class="navigationBar">
<?php template('NavigationBar'); ?>
</div>

<div class='title'>
<?php template('ImageTitle'); ?>
</div>
<?php template('ImageComment'); ?>
</div>
</td>
</tr>

<!-- Row 2: image -->
<tr>
<td class="showImgPane" id="imageRow" >
<center>
<table border="0" cellpadding="2" cellspacing="2" >
<tr id="imageWrap">
<?php if (isset($_template['ExifDetails'])) { ?>
        <td style='vertical-align: top'>
        <div class='imgDetails'>
<?php   template('ExifDetails'); ?>
        </div>
        </td>
<?php } /* ExifDetails */ ?>

<td id="showimgImageCell">
    <a href="<?php template('ImageHref');?>">
    <img id="Image"
         src="<?php template('ImageSrc');?>"
         title="<?php template('ImageAlt');?>"
         <?php template('ImageWidthHeight'); ?>
         alt=""></a>
</td>
</tr>
</table>
</center>
</td></tr>

<!-- Row 3: copyright -->
<tr><td style="vertical-align:bottom;" class="tdCopyright">

<div class="copyright" id="imageFooter">
    <?php template('PageFooter'); ?>
</div>

</td></tr></table>

<script type="text/javascript">
//<!--
    <?php template('EndPageJavascript'); ?>

    // This code eliminates vertical scrollbar which is otherwise
    // unnecesarlily displayed with panoramic images. It also handles
    // "Fit to window" resize in DOM-supporting browsers.
    dalbum_showimg_resize('showimgPagetable','Image','imageRow','imageWrap',
                            <?php template('ImageSizeX');?>,
                            <?php template('ImageSizeY');?>,
                            '<?php template("BrowserFitMethod");?>');
//-->
</script>

</body>
</html>