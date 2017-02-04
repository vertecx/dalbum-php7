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

class CTimer
{
    var $startTime, $endTime, $timeDifference, $bFinished;

    function CTimer() { $this->start();}
    function start() { $this->startTime = $this->currentTime(); $this->bFinished=false;}
    function finish() { $this->endTime = $this->currentTime(); $this->bFinished=true;}
    function getTime()
    {
        if (!$this->bFinished)
            $this->endTime = $this->currentTime();
        $this->timeDifference = $this->endTime - $this->startTime;
        return round($this->timeDifference, 5);
    }
    function currentTime()
    {
        list($usec, $sec) = explode(' ',microtime());
        return ((float)$usec + (float)$sec); }
    }
?>