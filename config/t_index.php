<?php /*----------------------------------------------------------------

  This is template of the DAlbum index page. Feel free to modify it
  to suit your website.

  The following variables are set:

    $albRoot    : root album (class CAlbum)
    $album      : current album (class CAlbum)
    $sUserName  : current user name
    $bAdminMode : true if current user is admin

  It is not recommented rely on other variables as they may change in
  the future versions.

  --------------------------------------------------------------------*/
    if (!defined('DALBUM_ROOT'))     die("Security problem");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
<head>
<title><?php template('Title'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php print $g_sCharset;?>">
<meta http-equiv="imagetoolbar" content="no">
<script src="<?php print DALBUM_BROWSERROOT . 'dtree.js';  ?>" type="text/javascript"></script>
<script src="<?php print DALBUM_BROWSERROOT . 'dalbum.js'; ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php print $g_sStylesheet; ?>" type="text/css">
<link rel="stylesheet" href="<?php print $g_sCustomStylesheet; ?>" type="text/css" >
<?php template('Head'); ?>
<script type='text/javascript'>
//<!--
<?php template('HeadJavascript'); ?>
//-->
</script>
</head>

<body class="nomargins" onload="javascript: dalbum_onload();" id="indexBody">

<table class="pagetable" cellspacing=0 cellpadding=0 id="indexPagetable">

<tr><td colspan=2 id="tdHeader">

<!--======================= FIRST ROW - page header =======================-->
<?php if (!template('CustomHeader')) {  ?>
<div class="indexPageHeader">
    <table style="width:100%;" cellpadding="0" cellspacing="0">
    <tr>
        <td class="title">
            <?php template('RootAlbumTitle'); ?>
        </td>
        <td class="navigationBar" >
            <?php template('NavigationBar'); ?>
        </td>
    </tr>
    </table>
</div>
<?php } ?>

</td></tr>

<tr>
<td class="insetPane" id="folderPane">

<!-======================= SECOND ROW - UI =======================-->

<!-- Begin pane - tree control -->

<div class="folderTree" id="folderTree" >
<script type="text/javascript">
//<!--
    <?php template('TreeJavascriptCode'); ?>
//-->
</script>
<noscript>
<div>
<P class="note">
<?php print $lang['noscript']; ?>
</P></div>
</noscript>
</div>

<!-- End Left pane - tree control -->
<?php   insert_transparent_gif($g_nMinTreeWidth); ?>
</TD>

<!-- Begin right pane - Album header control & ThumbView -->
<td  class="insetPane" id="thumbViewPane">

<!-- Begin AlbumHeader  -->
<div class="albHeader">
<?php template('AlbumHeader'); ?>
</div>
<!-- End AlbumHeader  -->

<!-- Begin thumbView -->
<div class="thumbView">

<table cellpadding=0 cellspacing=2px border=0 width="98%" >
<?php template('ThumbView'); ?>
</table>

<?php   insert_transparent_gif($_template['ThumbViewWidth']); ?>

</div>
<!-- End thumbView -->

<!-- End right pane table  -->

</td></tr>
<!-- End right pane - Album header control & ThumbView -->

<tr><td colspan="2" id="tdCopyright">

<!--======================= THIRD ROW - COPYRIGHT =======================-->
<div class="copyright" style="vertical-align:bottom;" id="indexFooter">
    <?php template('PageFooter'); ?>
</div>

</td></tr>
</table>
<script type='text/javascript'>
//<!--
    <?php template('EndPageJavascript'); ?>
//-->
</script>
</body>
</html>