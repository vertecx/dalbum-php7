<?php

/*
    This file is a part of DAlbum.  Copyright (c) 2003 Alexei Shamov, DeltaX Inc.

    Honestly I have borrowed some of this code from another, but don't remember who
    the author was...

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

function to64($v, $n) {
    static $ITOA64='./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $ret = "";
    while (($n - 1) >= 0)
    {
        $n--;
        $ret .= $ITOA64[$v & 0x3f];
        $v = $v >> 6;
    }
    return $ret;
}

function dalbum_hex2bin($data)
{
    $len = strlen($data);
    return pack("H" . $len, $data);
}

function md5crypt($pw, $salt, $magic="")
{
    if ($magic == "")
        $magic = '$apr1$';

    $salt = substr($salt, 0, 8);
    $ctx = $pw . $magic . $salt;
    $final = dalbum_hex2bin(md5($pw . $salt . $pw));

    for ($i=strlen($pw); $i>0; $i-=16)
    {
        if ($i > 16)
            $ctx .= substr($final,0,16);
        else
            $ctx .= substr($final,0,$i);
    }

    $i = strlen($pw);
    while ($i > 0)
    {
        if ($i & 1)
            $ctx .= chr(0);
        else
            $ctx .= $pw[0];
        $i = $i >> 1;
    }

    $final = dalbum_hex2bin(md5($ctx));

    for ($i=0;$i<1000;$i++)
    {
        $ctx1 = "";
        if ($i & 1) $ctx1 .= $pw;
        else $ctx1 .= $final;
        if ($i % 3) $ctx1 .= $salt;
        if ($i % 7) $ctx1 .= $pw;
        if ($i & 1) $ctx1 .= $final;
        else $ctx1 .= $pw;
        $final = dalbum_hex2bin(md5($ctx1));
     }

    $passwd = "";
    $passwd .= to64( ( (ord($final[0]) << 16) | (ord($final[6]) << 8) | (ord($final[12])) ), 4);
    $passwd .= to64( ( (ord($final[1]) << 16) | (ord($final[7]) << 8) | (ord($final[13])) ), 4);
    $passwd .= to64( ( (ord($final[2]) << 16) | (ord($final[8]) << 8) | (ord($final[14])) ), 4);
    $passwd .= to64( ( (ord($final[3]) << 16) | (ord($final[9]) << 8) | (ord($final[15])) ), 4);
    $passwd .= to64( ( (ord($final[4]) << 16) | (ord($final[10]) << 8) | (ord($final[5])) ), 4);
    $passwd .= to64( ord($final[11]), 2);
    return "$passwd";
}

?>