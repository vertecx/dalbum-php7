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

    define("DALBUM_REINDEX_PAGE","1");

    require_once(DALBUM_ROOT."/include/md5crypt.php");
    require_once(DALBUM_ROOT."/include/functions.php");
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

    // Reindexing can be started in shell as php -f reindex.php <speed>
    if (isset($_SERVER['argc']) && $_SERVER['argc']==2)
        define('CMDLINE_MODE',1);
    else
        define('CMDLINE_MODE',0);

    // Number of seconds returning a complete page to the client browser
    // (i.e. if set to 10 - progress bar refreshes every 10 seconds)
    define('UIUPDATE_TIMEOUT',10);

    // Number of seconds for set_time_limit - maximum amount of time the script
    // may be executed before abort
    define('SCRIPT_EXEC_TIMEOUT',120);

    //////////////////////////////////////////////////////////////////
    // Class to create folder checksums                             //
    //                                                              //
    // Had to put this class declaration there to keep PHP5 happy   //
    //////////////////////////////////////////////////////////////////
    class CAlbumChecksumFile
    {
        var $m_sTotal;           // checksum of all files including _thm and _res directories
        var $m_arrImageSize; // map image=>checksum
        var $m_sFolder;
        var $m_arrSize;

        function __construct($_sFolder)
        {
            $this->m_sFolder=$_sFolder;
            $this->Reset();
        }

        // Load hash info from file
        function Load()
        {
            $this->Reset();

            global $g_sThumbnailPath;
            global $g_sAlbumhash;
            $hashName=absfname($this->m_sFolder . $g_sThumbnailPath . "/" . $g_sAlbumhash);

            // Load album hash file (if exists)
            if (file_exists($hashName))
            {
                $handle=@fopen($hashName,"rb");
                if ($handle)
                {
                    $s=fread($handle,@filesize($hashName));
                    fclose($handle);
                    $x=unserialize($s);
                    if (get_class($x)==get_class($this))
                    {
                        $this->m_sTotal=$x->m_sTotal;
                        $this->m_arrImageSize=$x->m_arrImageSize;
                        $this->m_sFolder=$x->m_sFolder;
                        $this->m_arrSize=$x->m_arrSize;
                    }

                    return true;
                }
            }
            return false;
        }

        function Reset()
        {
            $this->m_sTotal="";
            $this->m_arrImageSize=array();
            $this->m_arrSize=array(0,0,0);
        }

        // Save hash info to file
        function Save()
        {
            global $g_sThumbnailPath;
            global $g_sAlbumhash;

            // Only save if _thm directory exists
            if (@is_dir(absfname($this->m_sFolder . $g_sThumbnailPath)))
            {
                $hashName=absfname($this->m_sFolder . $g_sThumbnailPath . "/" . $g_sAlbumhash);
                $s=serialize($this);
                if (empty($this->m_sTotal))
                {
                    if (file_exists($hashName))
                        unlink($hashName);
                    return true;
                }
                else
                {
                    $handle=@fopen($hashName,"wb");
                    if ($handle)
                    {
                        fwrite($handle,$s);
                        fclose($handle);

                        global $g_newDirRights;
                        @chmod($hashName,$g_newDirRights);

                        return true;
                    }
                }
            }
            return false;
        }

        // Calculate hash info and image sizes
        function Calculate()
        {
            $this->Reset();

            clearstatcache();

            global $g_sThumbnailPath, $g_sResizedPath;

            $str=$this->ListDirectory($this->m_sFolder,$this->m_arrSize[0],true);

            $strThm=$this->ListDirectory($this->m_sFolder .  $g_sThumbnailPath . '/', $this->m_arrSize[1]);
            if (empty($strThm))
                $strThm="No files;";

            $strRes=$this->ListDirectory($this->m_sFolder .  $g_sResizedPath . '/' ,$this->m_arrSize[2]);
            if (empty($strRes))
                $strRes="No files;";

             //print "Calculate $this->m_sFolder: ";
             //print_r($this->m_arrSize);
             //print "<BR>";

            $this->m_sTotal=md5(md5($str) . md5($strThm) . md5($strRes) );
        }

        function HasImageChanged($sImageBasename)
        {
            if (!isset($this->m_arrImageSize[$sImageBasename]))
                return false;

            $f=absfname($this->m_sFolder . $sImageBasename);
            if (!is_file($f))
                return false;

            $s=@filesize($f);
            $x=$s . "|" . @filemtime($f) . "|";
            if ($this->m_arrImageSize[$sImageBasename]==$x)
                return false;
            return true;
        }

        function  AddSize()
        {
            global $STATE;
            $s=array();
            for ($i=0;$i<3;++$i)
            {
                $s[]=$STATE['reindexSizeTotal'][$i]+((double)$this->m_arrSize[$i]);
            }

            //print "Add {$this->m_sFolder}: " ;
            //print_r($this->m_arrSize);
            //print "<BR>";
            $STATE['reindexSizeTotal']=$s;
        }


        function ListDirectory($dir,&$size, $bUpdateImageHash=false)
        {
            global $g_sAlbumdef;
            $str="";
            $size=0;
            $absdir=absfname($dir);
            if (@is_dir($absdir) && ($handle = @opendir($absdir)))
            {
                while(false !== ($file = readdir($handle)))
                {
                    $f=$dir . $file;

                    $abs=absfname($f);
                    if (!is_file($abs))
                        continue;

                    $image=&createImage();
                    $image->Init($f);

                    if ($image->IsImageFilename())
                    {
                        // Ignore hidden files
                        if($file[0]=="." || $file[0]=="_")
                            continue;
                        $s=@filesize($abs);
                        $size+=$s;
                    }
                    else if (strcasecmp($file,$g_sAlbumdef)==0)
                        $s=@filesize($abs);
                    else
                        continue;

                    $str.=$file . "|" . $s . "|" . @filemtime($abs) . "|";

                    if ($bUpdateImageHash)
                        $this->m_arrImageSize[$file]=$s;
                }
                closedir($handle);
            }
        }
    };
    //////////////////////////////////////////////////////////////////


    // Reindexing speed
    $nSpeed=-1;

    if (CMDLINE_MODE)
    {
        $nSpeed=$_SERVER['argv'][1];
        error_reporting(E_ALL);
        set_error_handler("textErrorHandler");
        @set_time_limit(0);   // set long timeout
    }
    else
    {
        if (isset($_GET['speed']))
            $nSpeed=$_GET['speed'];

        @set_time_limit(SCRIPT_EXEC_TIMEOUT);   // set long timeout
    }

    remove_bloody_magic_quotes();

    $sUserName="";
    if (!CMDLINE_MODE)
        $sUserName=StartSessionAndGetUserName('nocache',true);
    else
    {
        $sUserName=$g_sAdminUsers[0];
        $STATE=array();
    }

    if (function_exists('everypageCallback'))
        everypageCallback($sUserName);


    clearstatcache();

    if (!CMDLINE_MODE)
    {
        // Check authentication
        if (isset($_GET['cancel']) || !isAdminMode($sUserName))
        {
            dalbum_relocate(translateRef('index.php'));
            return;
        }
    }

    // Start timeout
    $timer=new CTimer();
    $uid=md5($timer->currentTime() . session_id());

    // If process=1 is not specified in the URL - display menu
    if (!isset($_GET['process']) && !CMDLINE_MODE)
    {
        printHeader();
        printMenu();
        printFooter();
        return;
    }

    // Create tree
    if (CMDLINE_MODE)
        $titleHTML="==========================================\n" . html2txt($lang['reindexProgressTitle'])."\n==========================================\n\n";
    else
        $titleHTML="<body class=\"normal\"><H2>{$lang['reindexProgressTitle']}</H2>";

    $stateURL="";
    if (isset($_GET['state']))
        $stateURL="&state=" . $_GET['state'];

    // Directories are scanned only when speed is given in the url (i.e. beginning)
    if ($nSpeed>-1)
    {
        printHeader();
        print $titleHTML;
        flush();

        // Create temporary album structure file
        $albRoot=createAlbum();
        $albRoot->Create("",array(),($nSpeed>=2),true);
        $albRoot->SetAccess($sUserName);

        $STATE=array();
        $STATE['reindexAlbums']=serialize($albRoot);
        $STATE['reindexSizeTotal']=array(0,0,0);
        $STATE['reindexSizeLast']=array(0,0,0);
        $STATE['reindexErrors']=array();
        $STATE['reindexRetryPos']=0;
        $STATE['reindexPos']=0;
        $STATE['reindexTreeTime']=$timer->gettime();
        $STATE['reindexSpeed']=$nSpeed;
        $STATE['reindexStartTime']=$timer->startTime;
        $pos=0;

        //
        if (!isset($g_arrReindexSpeeds))
            $g_arrReindexSpeeds=array(0,1,2,3);
        if (!in_array($nSpeed,$g_arrReindexSpeeds))
        {
            print "Invalid reindexing speed!";
            return;
        }

    }
    else
    {
        // Load state
        if (!LoadState() ||
            !isset($STATE['reindexPos']) ||
            !isset($STATE['reindexAlbums']) ||
            !isset($STATE['reindexRetryPos']))
        {
            // Internal structures are damaged. Print menu instead
            printHeader();
            printMenu();
            printFooter();
            return;
        }

        $pos=$STATE['reindexPos'];
        if (isset($_GET['retry']))
            $pos=$STATE['reindexRetryPos'];

        printHeader();
        print $titleHTML;
        $albRoot=unserialize($STATE['reindexAlbums']);
        $albRoot->SetAccess($sUserName);
    }

    // Process speed
    $all=false;
    $cleanup=false;
    $fast=false;

    switch ($STATE['reindexSpeed'])
    {
    default:
    case    0:  $fast=true; break;
    case    1:  break;
    case    2:  $cleanup=true; break;
    case    3:  $all=$cleanup=true; break;
    }

    // Flatten all albums into one array
    $albums=array();
    $albums[]=&$albRoot;
    $albumPtr=0;
    $nTotalAlbums=0;
    $nTotalImages=0;

    while ($albumPtr<count($albums))
    {
        $a=&$albums[$albumPtr++];
        if ($a->m_bPrivate)
            continue;

        $nTotalImages+=$a->m_nImages;
        if ($a->m_nImages>0)
            $nTotalAlbums++;

        for ($i=0;$i<count($a->m_arrContents);++$i)
            if (!$a->m_arrContents[$i]->IsImage())
                $albums[]=&$a->m_arrContents[$i];
    }

    $count=$nTotalImages;

    global $g_Demo;

    if ($pos < $count && !isset($_GET['finish']))
    {
        if (!CMDLINE_MODE)
        {
            // Display progress
            print "<BR><BR><TABLE class='dialog'><TR><TD>";
            print "<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0><TR><TD style='border: 1px inset white;'>";
            $perc=round($pos*100/($count+1),0);
            print "<span style='background-color: black; color:black;'>";
            for ($i=0;$i<$perc;$i+=2)
                print "X";
            print   "</span>";
            print "<span style='background-color: white; color:white;'>";
            for (;$i<=100;$i+=2)
                print "X";
            print   "</span>";
            print "</TD></TR></TABLE></TD></TR>";
            print "<TR><TD align='center'>";
            print "$pos/$count = $perc%";
            print "</TD></TR></TABLE>";
            flush();
        }


        // There are images to process yet
        $nFirstAlbumImageNo=0;
        $nAlbumIndex=0;
        $bLoadImages=true;
        $nFirstImageInAlbum=-1;
        $checkSumLoad=null;

        for (;$pos<$count;++$pos)
        {
            if (!CMDLINE_MODE)
            {
                print "          ";
                flush();
            }

            // Find album containing image #pos
            while ( ($albums[$nAlbumIndex]->m_nImages<=0) ||
                    ($nFirstAlbumImageNo + $albums[$nAlbumIndex]->m_nImages)<=$pos)
            {
                $nFirstAlbumImageNo+=$albums[$nAlbumIndex]->m_nImages;

                // Unload images from the previous
                if (count($albums)>0 && $nAlbumIndex<count($albums))
                    $albums[$nAlbumIndex]->DeleteImagesFromContents();

                $nAlbumIndex++;
                $bLoadImages=true;
                $nFirstImageInAlbum=-1;

                if ($nAlbumIndex>=count($albums))
                {
                    restartReindexing();
                    return;
                }
            }

            $alb=&$albums[$nAlbumIndex];

            // If this is a new album - load Images
            if ($bLoadImages)
            {
                // For first image in album - load directory checksum
                $checkSumLoad=new CAlbumChecksumFile($alb->m_sFolder);
                $checkSumLoad->Load();

                // Load images
                $nOld=$alb->m_nImages;
                $alb->UpdateInfo($albRoot);
                if ($STATE['reindexSpeed']>=2)
                    $alb->CleanupThumbnails();

                // If number of images changes since the last time - restart reindexing again
                if ($nOld!=$alb->m_nImages)
                {
                    restartReindexing();
                    return;
                }

                // In fast mode verify that checksum matches .checksum file
                if ($fast || $g_Demo)
                {
                    $checkSumCalc=new CAlbumChecksumFile($alb->m_sFolder);
                    $checkSumCalc->Calculate();

                    if ($checkSumLoad==$checkSumCalc || $g_Demo)
                    {
                        reindexLog("$pos. Folder {$alb->m_sFolder} has not changed. Skipping.");

                        // Increment file sizes
                        $checkSumCalc->AddSize();

                        // Skip the entire album
                        $pos=$nFirstAlbumImageNo+$alb->m_nImages-1; // +1 will be added in for loop

                        // Check for timeout
                        if ($timer->gettime()>UIUPDATE_TIMEOUT && !CMDLINE_MODE)
                            break;

                        continue; // continue in for loop
                    }

                    // Check if folder has been renamed or moved in tree
                    if ($checkSumLoad->m_sFolder!=$checkSumCalc->m_sFolder)
                        $checkSumLoad->m_sFolder=$checkSumCalc->m_sFolder;

                }

                $bLoadImages=false;


                // Calculate index of the first image
                for ($nFirstImageInAlbum=0;$nFirstImageInAlbum<count($alb->m_arrContents);++$nFirstImageInAlbum)
                    if ($alb->m_arrContents[$nFirstImageInAlbum]->IsImage())
                        break;
            }

            $nImg=$nFirstImageInAlbum+($pos-$nFirstAlbumImageNo);
            if ($nImg<0 || $nImg>=count($alb->m_arrContents))
            {
                restartReindexing();
                return;
            }
            $img=&$alb->m_arrContents[$nImg];

            // If the number of images decreased since - reindex again
            if ($img===null)
            {
                restartReindexing();
                return;
            }

            // Create thumbnail for this image
            $redo=!!$all;
            if ($checkSumLoad->HasImageChanged($img->m_sBaseFilename))
            {
                // File size has changed since last time
                $redo=true;
            }

            reindexLog("$pos. Processing {$img->m_sFullFilename}");
            $error=$img->CreateThumbnail(true,$redo,$fast);
            // If createThumbnails failed - try to redo the image
            if (!empty($error) && !$redo)
                $error=$img->CreateThumbnail(true,1,$fast);

            // Log it
            $status=(empty($error)?"Success":"Error");
            reindexLog("$pos. Completed {$img->m_sFullFilename} : $status");

            if (!empty($error))
            {
                // Cannot redo the image. Mark it to be re-done the next time
                $checkSumLoad->m_arrImageSize[$img->m_sBaseFilename]="redo"; // to redo this image next time
                $checkSumLoad->m_sTotal="redo";
                $checkSumLoad->Save();

                $STATE['reindexRetryPos']=$pos;
                $STATE['reindexPos']=$pos+1;

                // Remember the error
                $STATE['reindexErrors'][$img->m_sFullFilename]=$error;

                $f=$img->m_sFullFilename;

                // Save current state
                SaveState();

                if (CMDLINE_MODE)
                {
                    print "----------- Error ------------\n";
                    print html2txt("{$lang['reindexError']} " . secureURL($f)  . quotehtml($f)) ."\n";
                    print $error . "\n";
                    continue;
                }

                //
                print "<P>{$lang['reindexError']} <A href='" . addslashes(secureURL($f)) . "'>".quotehtml($f)."</A></P>";
                print "<PRE>" . quotehtml($error) . "</PRE><BR><UL>";
                $hr=translateRef('reindex.php?process=1&amp;randomuid=$uid&amp;retry=1'.$stateURL);
                print "<LI><A class='pageLink' href='$hr'>{$lang['reindexRetry']}</A></LI>";
                                $hr=translateRef('reindex.php?process=1&amp;randomuid=$uid'.$stateURL);
                print "<LI><A class='pageLink' href='$hr'>{$lang['reindexIgnore']}</A></LI>";
                                $hr=translateRef('reindex.php');
                print "<LI><A class='pageLink' href='$hr'>{$lang['reindexAgain']}</A></LI>";
                print "<LI><A class='pageLink' href=\"" . translateRef('index.php') . "\" class='pageLink' >{$lang['mainPage']}</A></LI></UL>";

                printFooter();
                return;;
            }

            // Resizing was successful. Reset the error (if there was any)
            unset($STATE['reindexErrors'][$img->m_sFullFilename]);

            // Delete unused resized images
            if ($cleanup)
            {
                if (!$img->m_bResize)
                {
                    global $g_sResizedPath,$g_sResizedPrefix;
                    $fn=dirname_ex($img->m_sFullFilename) . "/" . $g_sResizedPath;
                    $fn.= "/" . $g_sResizedPrefix . basename($img->m_sBaseFilename);
                    $fn=absfname($fn);

                    if (@file_exists($fn))
                    {
                        reindexLog("$pos. Deleting unrefereced {$fn}");
                        @unlink($fn);
                    }
                }
            }

            // Update current image size in hash
            $checkSumLoad->m_sTotal="redo";
            $checkSumLoad->m_arrImageSize[$img->m_sBaseFilename]=@filesize(absfname($img->m_sFullFilename));

            // When the last image in the album is updated - modify checksum file
            if (count($alb->m_arrContents)==$nImg+1)
            {
                // recalculate sizes and stuff
                $checkSumLoad->Calculate();

                // go through errors
                $keys=array_keys($STATE['reindexErrors']);
                foreach ($keys as $k)
                {
                    $base=basename(strval($k));
                    // if this image is in this album - mark it to be reindexed next time
                    if (isset($checkSumLoad->m_arrImageSize[$base]))
                    {
                        $checkSumLoad->m_sTotal="redo";
                        $checkSumLoad->m_arrImageSize[$base]="redo";

                        reindexLog("Album $alb->m_sFolder has errors. Image $base marked for rebuild in the next build.");

                    }
                }


                // save checksum
                $checkSumLoad->Save();

                // Add size to total size
                $checkSumLoad->AddSize();

            }

            // Return every 10 seconds
            if ($timer->gettime()>UIUPDATE_TIMEOUT && !CMDLINE_MODE)
            {
                // save checksum
                $checkSumLoad->m_sTotal="redo";
                $checkSumLoad->Save();
                break;
            }
        }


        $STATE['reindexPos']=$pos+1;
        reindexLog(">Reindex paused at $pos.");

        if (!CMDLINE_MODE)
        {
            print "          ";
            flush();
        }

        SaveState();

        if (!CMDLINE_MODE)
        {
            if (!CMDLINE_MODE)
            {
                print "          ";
                flush();
            }

            $s="process=1&amp;randomuid=$uid";
            if ($pos > $count)
                $s.="&finish=1";
            writeJumpScript($s . $stateURL);
            printFooter();
            flush();
            return;
        }
    }
    $errors=&$STATE['reindexErrors'];

    $size1=size_as_str($STATE['reindexSizeTotal'][0]);
    $size2=size_as_str($STATE['reindexSizeTotal'][1]);
    $size3=size_as_str($STATE['reindexSizeTotal'][2]);

    // Display statistics
    $x=round($STATE['reindexTreeTime'],1);

    $timer->startTime=(float)$STATE['reindexStartTime'];
    $elapsed= round($timer->gettime(),1);
    $str=strtr($lang['reindexCompleted'],array('#elapsed#'=>$elapsed,'#treeelapsed#'=>$x));

    if (CMDLINE_MODE)
    {
        print html2txt($str) . "\n\n";
        print "======== {$lang['reindexStats']} ========== \n";
        print "{$lang['reindexStatsAlbums']}  $nTotalAlbums\n";
        print "{$lang['reindexStatsImages']}  $nTotalImages\n";
        print "{$lang['reindexStatsOrigSize']}  $size1\n";
        print "{$lang['reindexStatsThumbSize']}  $size2\n";
        print "{$lang['reindexStatsResizedSize']}  $size3\n";
        print "============================================\n\n";
    }
    else
    {
        print $str . "\n";
        print "<TABLE class=\"dialog\" cellspacing=0 cellpadding=2><TR><TH colspan=2>{$lang['reindexStats']}</TH></TR>\n";
        print "<TR><TD>{$lang['reindexStatsAlbums']}</TD><TD>$nTotalAlbums</TD></TR>\n";
        print "<TR><TD>{$lang['reindexStatsImages']}</TD><TD>$nTotalImages</TD></TR>\n";
        print "<TR><TD>{$lang['reindexStatsOrigSize']}</TD><TD>$size1</TD></TR>\n";
        print "<TR><TD>{$lang['reindexStatsThumbSize']}</TD><TD>$size2</TD></TR>\n";
        print "<TR><TD>{$lang['reindexStatsResizedSize']}</TD><TD>$size3</TD></TR>\n";
        print "</TABLE>";
    }
    /// Save tree updates
    global $g_sPrivateDir;
    if (!$g_Demo)
    {
        $file=$g_sPrivateDir . "/.album_index.dat";
        if (!@save_file($file,serialize($albRoot),"wb"))
        {
            $bError=true;
            print "<P>" . strtr($lang['reindexSaveError'],array('#filename#'=>$file)) . "</P>";
        }

        /// Save statistics
        $stat=array();
        $stat['Albums']=$nTotalAlbums;
        $stat['Images']=$nTotalImages;
        $stat['TotalSize']=$STATE['reindexSizeTotal'][0]+$STATE['reindexSizeTotal'][1]+$STATE['reindexSizeTotal'][2];

        $file=$g_sPrivateDir . "/.album_stats.dat";
        if (!@save_file($file,serialize($stat),"wb"))
        {
            $bError=true;
            print "<P>" . strtr($lang['reindexSaveError'],array('#filename#'=>$file)) . "</P>";
        }
    }






    $bError=false;

    if (count($errors))
    {
        if (CMDLINE_MODE)
        {
            print html2txt(strtr($lang['reindexStatusErrors'],array('#errors#'=>count($errors)))) . "\n";
        }
        else
        {
            print "<P>" . strtr($lang['reindexStatusErrors'],array('#errors#'=>count($errors))) . "</P>\n";
            ksort($errors);

            print "<table class=\"errorsTable\">\n";
            print "<tr><th>{$lang['reindexTHFilename']}</th><th>{$lang['reindexTHProblem']}</th></tr>\n";
            while ( list($f,$e)=each($errors))
            {
                print "<tr><td>".quotehtml($f)."</td><td>$e</td></tr>\n";
            }
            print "</table>";
        }
        $bError=true;
    }

    if ($bError)
    {
        if (!CMDLINE_MODE)
        {
            print "<UL>";
            print "<LI><A href='{$_SERVER['PHP_SELF']}' class='pageLink'>{$lang['reindexAgain']}</A></LI>";
            print "<LI><A href='" . translateRef("index.php") . "' class='pageLink' >{$lang['mainPage']}</A></LI></UL>";
        }
    }
    else
    {
        if (CMDLINE_MODE)
            print html2txt($lang['reindexStatusOK']);
        else
        {
            print "<P>" . $lang['reindexStatusOK'] . "</P>";
            print "<DIV><A href='" . translateRef("index.php") . "' class='pageLink' >{$lang['mainPage']}</A></DIV>";
        }
    }
    printFooter();
    flush();
    return;


function writeJumpScript($query)
{
    $url=basename(__FILE__);
    $url.="?".$query;
    $url=html2txt(translateRef($url));

    print <<< END
<script>
//<!--
setTimeout('window.location.replace("$url");',1000);
//-->
</script>
END;

}
function restartReindexing()
{
    global $uid;
    global $stateURL;
    if (CMDLINE_MODE)
    {
        reindexLog("!! New files found! Restarting reindexing process.");
        exit();
    }

    global $STATE;

    print "<P>New files found. Restarting...";
    writeJumpScript("speed=" . $STATE['reindexSpeed'] . "&amp;process=1&amp;randomuid=$uid{$stateURL}");
    printFooter();
    return;
}

function printHeader()
{
    global $g_sStylesheet, $g_sCharset,$g_sCustomStylesheet;
    global $lang;
    if (CMDLINE_MODE)
        return;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html>
<head>
<title><?php print $lang['reindexTitle'];?></title>
<script src="<?php print DALBUM_BROWSERROOT . 'dalbum.js'; ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php print $g_sStylesheet; ?>" type="text/css">
<link rel="stylesheet" href="<?php print $g_sCustomStylesheet; ?>" type="text/css" >
</head>
<?php
}

function KillState()
{
    if (CMDLINE_MODE)
        return;
    $state=$_GET['state'];
    if (!isset($state))
        return false;

    global $g_sPrivateDir;
    $state=$g_sPrivateDir."/".$state;

    if (file_exists($state))
        unlink($state);
}

function LoadState()
{
    if (CMDLINE_MODE)
        return;
    $state=$_GET['state'];
    if (!isset($state))
    {
        reindexLog("Fatal DAlbum Error: State file is not set in the URL");
        return false;
    }

    global $g_sPrivateDir;
    $state=$g_sPrivateDir."/".$state;

    if (!file_exists($state))
    {
        reindexLog("Fatal DAlbum Error: State file $state not found.");
        return false;
    }
    $handle=fopen($state,"rb");
    if (!$handle)
    {
        reindexLog("Fatal DAlbum Error: Unable to read state file $state");
        return false;
    }
    $f=fread($handle,filesize($state));
    fclose($handle);

    global $STATE;
    $STATE=unserialize($f);
    return true;
}

function SaveState()
{
    if (CMDLINE_MODE)
        return;
    $state=$_GET['state'];
    if (!isset($state))
    {
        reindexLog("Fatal DAlbum Error: State file is not set in URL");
        die("<BR><BR>Fatal DAlbum Error: State file is not set in URL<BR>");
        return false;
    }

    global $STATE;
    $f=serialize($STATE);

    global $g_sPrivateDir;
    $state=$g_sPrivateDir."/".$state;
    $handle=fopen($state,"wb");
    if (!$handle)
    {
        reindexLog("Fatal DAlbum Error: Unable to read state file $state");
        die("<BR><BR>Fatal DAlbum Error: Unable to read state file $state<BR>");
        return false;
    }

    fwrite($handle,$f);
    fflush($handle);
    fclose($handle);
    return true;
}

function printMenu()
{
    global $uid;
    global $lang;
    global $g_sPrivateDir;


    // Cleanup old state files
    $del=array();
    if ($handle = @opendir($g_sPrivateDir))
    {
        while(false !== ($file = readdir($handle)))
        {
            $f=$g_sPrivateDir."/". $file;
            if (!is_file($f))
                continue;

            if (substr($file,0,7)==".state_")
            {
                $ft=@filemtime($f);

                // Delete all status files older than 24hrs
                if (time()-$ft>86400)
                    $del[]=$f;
            }
        }
        closedir($handle);
    }
    global $g_arrReindexSpeeds;
    if (!isset($g_arrReindexSpeeds))
        $g_arrReindexSpeeds=array(0,1,2,3);

    // Definitely delete current status file (if any with matching name exists)
    $state=".state_$uid.reindex";
    $del[]=$g_sPrivateDir."/".$state;

    foreach ($del as $d)
        if (file_exists($d))
            @unlink($d);

?>
<body class="centered">
<form action="" method="GET">
<?php hiddenForms(translateRef(basename(__FILE__))); ?>
<table class="dialog" style="width:600px;">
<tr>
    <th colspan=2><?php print $lang['reindexDlgTitle'];?></th>
</tr>
<tr>
    <td colspan=2><?php print $lang['reindexDlgComment'];?></td>
</tr>
<tr>
    <td colspan=2><?php print $lang['reindexDlgSpeed'];?></td>
</tr>

<?php if (in_array(0,$g_arrReindexSpeeds)) { ?>
<tr>
    <td><input type="radio" id="speed0" name="speed" value="0" checked>
    </td><td>
        <label for="speed0"><?php print $lang['reindexSpeed0'];?></label>
    </td>
</tr>
<?php } ?>

<?php if (in_array(1,$g_arrReindexSpeeds)) { ?>
<tr>
    <td><input type="radio" id="speed1" name="speed" value="1" >
    </td><td>
        <label for="speed1"><?php print $lang['reindexSpeed1'];?></label>
    </td>
</tr>
<?php } ?>

<?php if (in_array(2,$g_arrReindexSpeeds)) { ?>
<tr>
    <td><input type="radio" id="speed2" name="speed" value="2" >
    </td><td>
        <label for="speed2"><?php print $lang['reindexSpeed2'];?></label>
    </td>
</tr>
<?php } ?>

<?php if (in_array(3,$g_arrReindexSpeeds)) { ?>
<tr>
    <td><input type="radio" id="speed3" name="speed" value="3" >
    </td><td>
        <label for="speed3"><?php print $lang['reindexSpeed3'];?></label>
    </td>
</tr>
<?php } ?>

<tr>
<td align=right colspan=2>
    <input type="hidden" name="randomuid" value="<?php print $uid; ?>">
    <input type="hidden" name="state" value="<?php print $state; ?>">
    <input type="hidden" name="process" value="1">
    <input type="submit" value="<?php print $lang['reindexStartBtn']; ?>">
    <input type="submit" name="cancel" value="<?php print $lang['reindexCancelBtn']; ?>">
</td>
</tr>
</table>
</form>
<div><a href='<?php print translateRef("index.php");?>' class='pageLink' ><?php print $lang['mainPage'];?></a></div>
<?php
}

function printFooter()
{
    if (!CMDLINE_MODE)
        print("</body></html>");
    else
        print("\n");
}

function reindexLog($log)
{
    global $pos;
    global $g_sPrivateDir;
    $handle=@fopen($g_sPrivateDir . "/.reindex_log.txt",(($pos==0)?"w":"a+"));

    if ($handle)
    {
        fwrite($handle,$log . "\n") ;
        @fclose($handle);
    }

    if (CMDLINE_MODE)
        print ">" . $log . "\n";

}


function textErrorHandler($errno, $errmsg, $filename, $linenum, $vars)
{
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
                2048=>  "Strict"
                );
    // set of errors for which a var trace will be saved
    $user_errors = array(E_USER_ERROR, E_USER_WARNING, E_USER_NOTICE);
    $err = "{$errortype[$errno]}: $errmsg in $filename ($linenum)\n\n";
    if ($errno!=2048)
        echo "$err";
}

?>
