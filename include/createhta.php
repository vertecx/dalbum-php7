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

function delete_htaccess($folder)
{
    if (file_exists($folder . ".htaccess"))
        return @unlink($folder . ".htaccess");
    return true;
}

function create_htaccess($folder, $users)
{
    global $g_Demo;
    if ($g_Demo)
        return true;

    global $g_bDirectAccess,$g_sPrivateDir, $g_sSiteRootDir, $g_sAuthName, $g_sHtpasswd, $g_nFileAccessCheckLevel;

    $htaccess=$folder . ".htaccess";
    if (empty($users) ||
        in_array("all",$users))
    {
        // In thumbnail directories
        if ($g_bDirectAccess==false &&
            $g_nFileAccessCheckLevel==1 &&
            is_dir(substr($folder,0,-1)) &&
            is_picture_in_thumbnail_dir($folder . "_test.jpg"))
        {
            $file = <<< END
Satisfy Any
allow from all

<Files ~ "^\.">
Satisfy All
order allow,deny
allow from all
deny from all
</Files>
END;
            return save_file_fast($htaccess,$file);
        }
        // public access - delete htaccess
        delete_htaccess($folder);
        return true;
    }


    // If private dir is relative path - just put "no access" .htaccess
    if (substr($g_sPrivateDir,0,1)=='.')
    {
        $file = <<< END
Satisfy All
<Limit GET POST>
order allow,deny
deny from all
</Limit>
END;
    }
    else
    {
        // private dir is absolute - create full-blown access control
        if (array_search('valid-user',$users)!==false)
            $ulist='valid-user';
        else
        {
            $ulist="user";
            foreach ($users as $u)
            {
                $u=trim($u);
                if (substr($u,0,1)!='-')
                    $ulist.=" ".$u;
            }
        }

    // Modify .htaccess file below
    $file = <<< END
AuthName "$g_sAuthName"
AuthType Basic
AuthUserFile {$g_sSiteRootDir}{$g_sHtpasswd}
Satisfy All

<Limit GET POST>
require $ulist
</Limit>
END;
    }

    global $g_sAlbumdef;
    // Common portion of the file
    $file.= <<< END

<Limit PUT DELETE>
order deny,allow
deny from all
</Limit>
<Files $g_sAlbumdef>
 order allow,deny
 deny from all
</Files>
END;

    // Write file
    return @save_file_fast($folder . ".htaccess",$file);
}
?>