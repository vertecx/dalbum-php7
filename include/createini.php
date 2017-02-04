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

function toIniString($str)
{
    $str=str_replace("\r","",$str);
    $str=str_replace("\n","\\n\\\n",$str);
    return $str;
}

function ini_addExtraParams(&$ini,$section,$arguments)
{
    if (empty($ini) || !is_array($ini) || !isset($ini[$section]))
            return;

    $ret="";
    $sec=&$ini[$section];

    reset($sec);
    while (list($key,$val)=each($sec))
    {
        $bAdd=true;
        foreach ($arguments as $a)
        {
            if (strcasecmp($a,$key)==0)
            {
                    $bAdd=false;
                    break;
            }
        }

        if ($bAdd)
            $ret.="$key=".toIniString($val)."\n";
    }
    return $ret;
}

function create_defaultIni(&$album, $bOverwrite=false)
{
    global $g_Demo;
    if ($g_Demo)
        return true;
    global $g_sAlbumdef;
    $filename=absfname($album->m_sFolder . $g_sAlbumdef);
    if (file_exists($filename) && !$bOverwrite)
        return true;

    $ini=&better_parse_ini_file($filename, true);
    $users="all";
    if (!empty($album->m_arrUsers))
    {
        $users=join(",",$album->m_arrUsers);
    }

    $def=($album->m_bDefault?"1":"0");
    $comm=toIniString($album->m_sComment);
    $commHTML=toIniString($album->m_sCommentHTML);


    $fields=array("Title","Date","Comment","CommentHTML","TitleImage","Default","Access");
    $fieldsCustom=$album->GetCustomFieldNames();

    $extra="";
    foreach ($fieldsCustom as $fld)
    {
        if (isset($album->m_arrCustomFields[$fld]))
        {
                $extra.="$fld=".toIniString($album->m_arrCustomFields[$fld])."\n";
        }
        $fields[]=$fld;
    }

    $extra.=ini_addExtraParams($ini,"Album",$fields);

        // Create default album .ini file
    $file = <<< END
[Album]
; Album title, date and comments.
Title={$album->m_sTitle}
Date={$album->m_sDate}
Comment=$comm
CommentHTML=$commHTML

; Title image specifies album image that will be shown as album thumbnail.
; First image is default if not specified
TitleImage={$album->m_sTitleImage}

; Default=1 - show this album when photoalbum is started
Default=$def

; Access control - comma-separated user list for or 'valid-user'
; Empty string or 'all' allows anonymous access
Access=$users

; Extra parameters
$extra

; --------------- Album files --------------------------
;

END;

    for ($i=0;$i<count($album->m_arrContents);++$i)
    {
        $img=&$album->m_arrContents[$i];
        if ($img==null || !$img->IsImage())
            continue;

        $bResize=($img->m_bResize?"1":"0");
        $comm=toIniString($img->m_sComment);
        $commHTML=toIniString($img->m_sCommentHTML);
        $file.=<<<END
[{$img->m_sBaseFilename}]
Title={$img->m_sTitle}
Comment=$comm
CommentHTML=$commHTML
Resize={$bResize}

END;
        $fieldsCustom=$img->GetCustomFieldNames();
        $fields=array("Title","Comment","CommentHTML","Resize");
        foreach ($fieldsCustom as $fld)
        {
            if (isset($img->m_arrCustomFields[$fld]))
            {
                    $file.="$fld=".toIniString($img->m_arrCustomFields[$fld])."\n";
            }
            $fields[]=$fld;
        }

        $file.=ini_addExtraParams($ini, "$img->m_sBaseFilename", $fields);
        $file.="\n\n";

    }
    // Write file
    return @save_file($filename,$file);
}
?>