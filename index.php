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

    define("DALBUM_INDEX_PAGE","1");

    require_once(DALBUM_ROOT . "/include/md5crypt.php");
    require_once(DALBUM_ROOT . "/include/functions.php");
    require_once(file_exists(DALBUM_ROOT."/config/config.php")?DALBUM_ROOT."/config/config.php":DALBUM_ROOT."/include/config.php");
    require_once(DALBUM_ROOT."/include/conffix.php");
    require_once(DALBUM_ROOT."/include/createhta.php");
    require_once(DALBUM_ROOT."/include/createini.php");
    require_once(DALBUM_ROOT."/include/album.php");
    require_once(DALBUM_ROOT."/include/timer.php");

    // Include custom functions
    if (file_exists(DALBUM_ROOT . "/config/custom.php"))
        include_once(DALBUM_ROOT . "/config/custom.php");
    elseif (file_exists(DALBUM_ROOT . "/include/custom.php"))
        include_once(DALBUM_ROOT . "/include/custom.php");

    if ($g_bGZip)
        ob_start("ob_gzhandler");

    // Start timer
    $timer=new CTimer();
    $timer->start();

    remove_bloody_magic_quotes();

    // Start session and get current user name
    $sUserName=StartSessionAndGetUserName('private; must-revalidate');

    if (function_exists('everypageCallback'))
        everypageCallback($sUserName);

    // Load tree from archive
    $albRoot=&CAlbum::CreateFromArchive();
    if (empty($albRoot))
    {
        $albRoot=createAlbum();
        $albRoot->m_sFolder='/';
        $albRoot->m_sTitle='Empty';
        $albRoot->m_bPrivate=false;
    }
    $albRoot->SetAccess($sUserName);

    global $g_sCharset;

    // Check if we are in administration mode
    $bAdminMode=isAdminMode($sUserName);

    // Count images and albums available to the logged-on user
    $nTotalAlbums=0;
    $nTotalImages=0;
    {
        $queue=array();
        $queue[]=&$albRoot;
        $queueptr=0;

        while ($queueptr<count($queue))
        {
            $a=&$queue[$queueptr++];
            if (empty($a) || $a->m_bPrivate)
                continue;

            $nTotalImages+=$a->m_nImages;
            if ($a->m_nImages)
                $nTotalAlbums++;

            for ($i=0;$i<count($a->m_arrContents);++$i)
                if (!$a->m_arrContents[$i]->IsImage())
                    $queue[]=&$a->m_arrContents[$i];
        }
        unset($queue);
        unset($queueptr);
    }

    // Determine which album to show
    $sAlbFolder="";
    if (isset($_GET['folder']))
        $sAlbFolder=$_GET['folder'];

    unset($album);
    if (!empty($sAlbFolder))
        $album=&$albRoot->FindAlbum($sAlbFolder);
    if (empty($album))
        $album=&$albRoot->FindDefaultAlbum($sUserName);

    if (empty($album))
    {
        if (empty($albRoot))
            $albRoot=createAlbum();

        $album=&$albRoot;
    }

    // If the album we are looking for is disabled, go to logon page
    if ($album->m_bPrivate)
    {
        dalbum_relocate(translateRef("login.php?url=" . encodeCurrentLocation()));
        return;
    }

    // Load album images and comments
    $album->LoadImages();
    $album->LoadDetails();
    $album->BeforeDisplay();

    // Top navigation bar
    $navBar=dalbumBeginToolbar("index");

    // Display logon button or user name
    if (empty($sUserName))
    {
        if ($g_bShowLoginButton)
            $navBar.= getButton('login',translateRef("login.php?url=" . encodeCurrentLocation()),$lang['loginBtn'],$lang['loginBtnTitle'],0);
    }
    else
    {
        $navBar.= "<span class=\"username\">{$lang['indexUsername']} $sUserName &nbsp;</span>";

        if ($g_bShowLoginButton && !$g_bHTTPAuth)
            $navBar.= getButton('logout',translateRef("logout.php"),$lang['logoutBtn'],$lang['logoutBtnTitle'],0);
    }

    // If we have admin rights - show Reindex button
    if ($bAdminMode)
    {
        $navBar.= getButton('reindex',translateRef('reindex.php'),$lang['reindexBtn'],$lang['reindexBtnTitle'],2);
    }

    // If we are root admin - show password management
    if ($bAdminMode==2)
    {
        if ($g_bShowUserManagerButton)
            $navBar.= getButton('usrmgr',translateRef('pass.php'),$lang['usrmgrBtn'],$lang['usrmgrBtnTitle'],2);
    }

    $btn1=js_escape(getButton('fullscreen','javascript:dalbum_fullScreen();',$lang['fullScreenBtn'], $lang['fullScreenBtnTitle'], 2));
    $btn2=js_escape(getButton('closewindow','javascript:window.close();',$lang['closeWindowBtn'], $lang['closeWindowBtnTitle'], 2));

    if ($g_bShowFullScreenButton)
    {
        $navBar.= <<<END
<script type="text/javascript">
//<!--
    dalbum_writeFullScreen('$btn1','$btn2');
//-->
</script>
END;
    }
    $navBar.=dalbumEndToolbar("index");

    // Generate tree javascript code
    $sTreeJS ="d=new dTree('d');\n";
    $sTreeJS.="d.config.useCookies=false;";
    $sTreeJS.="d.config.useLines=" . ($g_bShowTreeLines?'true':'false') . ";\n";
    $sTreeJS.="d.config.closeSameLevel=true;\n";
    $sTreeJS.="d.config.inOrder=true;";
    $sTreeJS.="d.icondir='" . DALBUM_BROWSERROOT . "images/';";

    $jumpTo= translateRef('index.php?folder=' . quoteurl($album->m_sFolder));
    $n=$albRoot->CreateTreeElemCode($sTreeJS,'index.php',-1,$jumpTo,0,$album->m_sFolder);

    if ($albRoot->m_bPrivate)
    {
        $sTreeJS.="d.add(0,-1,'" . $lang['noPublicImages'] . "\',\'" . translateRef('login.php') . "\',\'\',\'\',\'\');\n";
        $sTreeJS.="d.icon.root=\'info.gif\';\n";
    }
    $sTreeJS.="d.selectedNode=$n;\n";

    //$sTreeJS.="var a=d.toString(); a=a.replace(/</gi,'&lt;');a=a.replace(/>/gi,'&gt;');document.write(a);";
    $sTreeJS.="document.write(d);";
    if ($n!=-1)
        $sTreeJS.="d.openTo($n,true);";

    // Generate page footer
    $sFooter='<div style="float:left;">';
    $sFooter.=strtr($lang['statusLeft'],
                 array( '#TotalImages#' => $nTotalImages,
                        '#TotalAlbums#' => $nTotalAlbums) );
    $sFooter.='</div><div style="float:right;" >';
    $sFooter.=strtr( $lang['statusRight'],
                    array('#elapsed#' => round($timer->gettime(),3)));
    $sFooter.='</div>';

    // Prepare template arguments
    $_template=array();
    $_template['Title']=$albRoot->GetTitle();
    $_template['RootAlbumTitle']=$albRoot->GetTitle();
    $_template['NavigationBar']=$navBar;

    if (function_exists("customIndexPageHeader"))
    {
        $_template['CustomHeader']="";
        ob_start("CustomHeaderCallback");
        customIndexPageHeader($albRoot->GetTitle(), $navBar, $albRoot);
        ob_end_flush();
    }

    $_template['TreeJavascriptCode']=$sTreeJS;

    // Create album header and views
    GenerateAlbumHeaderAndThumbView($album,$bAdminMode,
                                    $_template['AlbumHeader'],
                                    $_template['ThumbView']);

    // minimum width of ThumbView
    $_template['ThumbViewWidth']=$g_nMinThumbViewWidth;

    $_template['PageFooter']=$sFooter;
    $_template['HeadJavascript']='function dalbum_onload() { dalbum_loadFailedImages(); }';
    $_template['EndPageJavascript']='dalbum_setHideFocus();';
    $_template['Head']="<META name=\"GENERATOR\" content=\"DAlbum $g_sVersion (c) 2003 DeltaX Inc. (www.dalbum.org)\">\n";


    // Include template
    if (file_exists(DALBUM_ROOT."/config/t_index.php"))
        require(DALBUM_ROOT."/config/t_index.php");
    else
        require(DALBUM_ROOT."/include/t_index.php");

    if ($g_bGZip)
        ob_end_flush();
    return;


function GenerateAlbumHeaderAndThumbView(&$a, $bAdminMode, &$sAlbHeader, &$sThumbView)
{
    global $lang;
    global $g_nPicturesPerPage,$g_nColumnsPerPage,$g_sThumbnailXSize;

    $im=array();

    for ($i=0;$i<count($a->m_arrContents);++$i)
        if ($a->m_arrContents[$i]->IsImage() || !$a->m_arrContents[$i]->m_bPrivate)
            $im[]=$a->m_arrContents[$i];
    $count=count($im);

    // Print album header
    $title=$a->GetTitle();
    if (empty($title))
        $title="&nbsp;";

    $sAlbHeader="";
    $sAlbHeader.="<span class=\"title\">$title</span>";

    if (!empty($a->m_sDate))
        $sAlbHeader.="<span class=\"date\">&nbsp; (" . quotehtml($a->m_sDate) . ")</span>";

    $sAlbHeader.="&nbsp;&nbsp;&nbsp;";
    $filename=quoteurl($a->m_sFolder);
    $sAlbHeader.="<span class=\"navigationBar\" id=\"albCommands\">";
    $sAlbHeader.=dalbumBeginToolbar("albCommands");

    if ($bAdminMode && !empty($a->m_sFolder))
    {
        $sAlbHeader.=getButton('editdef',translateRef("editini.php?album=$filename&amp;url=".encodeCurrentLocation()),$lang['editDefBtn'],$lang['editDefBtnTitle'],0);
    }
    $sAlbHeader.=dalbumEndToolbar("albCommands");
    $sAlbHeader.="</span>";

    // Which page to display
    $nPage=0;
    if (isset($_GET['page']))
        if (@$_GET['page']=='all')
            $nPage=-1;
        else
            $nPage=@$_GET['page']+0;

    // Check if "All" button is enabled, actually
    global $g_bShowAllImagesButton;
    if (!$g_bShowAllImagesButton && $nPage==-2)
        $nPage=0;

    // Print album comment
    $cmt=$a->GetHTMLComment();
    $bFirstPageIsText=0;
    if (!empty($cmt))
    {
        if (substr($a->m_sCommentHTML,0,1)=="!")
        {
            $bFirstPageIsText=1;
            $cmt=substr($a->m_sCommentHTML,1);
        }
        else
            $sAlbHeader.= "<table width=\"99%\" border=0 cellspacing=0 cellpadding=0><tr><td style=\"width:100%;\"><div class=\"comnt\">$cmt</div></td></tr></table>";
    }

    // Display pages and current page
    $href=translateRef("index.php?folder=".quoteurl($a->m_sFolder));
    $nPages=(int)(($count+$g_nPicturesPerPage-1)/$g_nPicturesPerPage);
    if ($bFirstPageIsText)
        $nPages++;

    if ($nPage>=$nPages)
        $nPage=max(0,$nPages-1);

    if ($nPage!=-1)
    {

        $begin=($nPage-$bFirstPageIsText)*$g_nPicturesPerPage;
        if ($begin>=$count)
            $begin=$count-1;
        $end=($nPage-$bFirstPageIsText)*$g_nPicturesPerPage+$g_nPicturesPerPage;
        if ($end>$count)
            $end=$count;
        $begin++;
    }
    else
    {
        $begin=1;
        $end=$count;
    }

    if ($count>0 && $nPage!=-1)
    {
        $sAlbHeader.= "<div class='navigationBar' id='pages'>";

        if ($bFirstPageIsText)
        {
            if ($nPage==0)
                $sAlbHeader.= "<span id='displayedinfo'>" . strtr($lang["page"],array("#begin#"=>1,"#end#"=>1,"#count#"=>$count+1)) . "</span>";
            else
                $sAlbHeader.= "<span id='displayedinfo'>" . strtr($lang["page"],array("#begin#"=>$begin+1,"#end#"=>$end+1,"#count#"=>$count+1)) . "</span>";

        }
        else
            $sAlbHeader.= "<span id='displayedinfo'>" . strtr($lang["page"],array("#begin#"=>$begin,"#end#"=>$end,"#count#"=>$count)) . "</span>";

        $sAlbHeader.=dalbumBeginToolbar("pages");

        if ($nPage>0)
        {
            $title=strtr($lang["prevPageBtnTitle"],array("#page#"=>$nPage));
            $sAlbHeader.= getButton('pageprev',"$href&amp;page=" . ($nPage-1),$lang["prevPageBtn"],$title,0);
        }

        for ($i=0;$i<$nPages;++$i)
        {
            // We display 1 ... 14 15 16 17 18 ... 29 when there are too many pages
            if ($nPages>10)
            {
                $mn=$nPage-4;
                $mx=$nPage+4;
                if ($i<=$mn)
                {
                    if ($i==1)
                        $sAlbHeader.="<span class='pagedots'>&nbsp;&hellip;&nbsp;</span>";
                    if ($i!=0)
                        continue;
                }
                if ($i>=$mx)
                {
                    if ($i==$nPages-2)
                        $sAlbHeader.="<span class='pagedots'>&nbsp;&hellip;&nbsp;</span>";
                    if ($i!=$nPages-1)
                        continue;
                }
            }
            $id="page$i";
            if ($i==$nPage)
                $id="curpage";

            $pagenum="&amp;page=$i";
            if ($i==0)
                $pagenum="";

            $text=$i+1;
            $sAlbHeader.= getButton($id,"$href" . $pagenum,$text,"",($i?0:1));
        }
        if ($nPage<$nPages-1 && $nPage!=-1)
        {
            $title=strtr($lang["nextPageBtnTitle"],array("#page#"=>$nPage+2));
            $sAlbHeader.= getButton('pagenext',"$href&amp;page=" . ($nPage+1),$lang["nextPageBtn"],$title,1);
        }

        if ($nPage!=-1 && $g_bShowAllImagesButton && ($count>$g_nPicturesPerPage || $bFirstPageIsText))
            $sAlbHeader.= getButton('pageall',"$href&amp;page=all",$lang["allPageBtn"],$lang["allPageBtnTitle"],1);
        $sAlbHeader.=dalbumEndToolbar("pages");
        $sAlbHeader.="</div>";
    }

    $sThumbView="";
    $nImages=0;
    $nTotal=$g_nPicturesPerPage;

    if ($nPage==-1)
        $nTotal=$count;

    if ($bFirstPageIsText)
    {
        if ($nPage<=0)
        {
            $sThumbView.="<tr><td colspan=\"$g_nColumnsPerPage\"><div class=\"extcmt\">$cmt</div></td></tr>\n";

            if ($nPage==0)
                $nTotal=0;
            $nImages=1;
        }
        else
            $nPage--;
    }

    for ($i=0;$i<$nTotal;$i+=$g_nColumnsPerPage)
    {
        if ($nPage==-1)
            $real=$i;
        else
            $real=$nPage*$g_nPicturesPerPage+$i;

        if ($real<0 || $real>=$count)
            break;

        $sThumbView.="<tr>\n";

        // print table row
        for ($j=0;$j<$g_nColumnsPerPage;++$j)
        {
            $perc=(int)99/$g_nColumnsPerPage;
            $sThumbView.="<td align=\"center\" width=\"$perc%\">\n";

            if ($real+$j>=0 &&  $real+$j<$count)
            {
                $sThumbView.=$im[$real+$j]->CreateThumbnailHTML("");
                $nImages++;
            }
            else
            {
                $sThumbView.="&nbsp;";
            }
            $sThumbView.="</td>\n";
        }
        $sThumbView.="</tr>";
    }
    if ($nImages==0)
        $sThumbView.='<tr><td style="text-align:center;width:100%;" class="note"><BR>' . $lang['noimages'] . '<BR></td><tr>';
}

function CustomHeaderCallback($buffer)
{
    global $_template;
    $_template['CustomHeader'].=$buffer;

}

?>