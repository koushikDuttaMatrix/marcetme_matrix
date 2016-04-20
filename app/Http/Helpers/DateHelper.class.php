<?php

namespace App\Helpers;

class DateHelper {


public static function getTimeDiffInWords($currentTime) {
        $negative = ($currentTime < 0)?true:false;
        $currentTime = abs($currentTime);

        $days = (int)($currentTime / (3600*24));
        $hours_left = $currentTime % (3600*24);
        $hours = (int)($hours_left / 3600);
        $minutes_left = $currentTime % 3600;
        $minutes = (int)($minutes_left / 60);
        $seconds_left = $minutes_left % 60;
        $string = ( ($days > 0)?$days." day".($days == 1?'':'s')." ": 
                    ($hours > 0?$hours." hr".($hours == 1?'':'s')." " :
                        ($minutes> 0?$minutes." min".($minutes == 1?'':'s')."": 
                            $seconds_left." second".($seconds_left == 1?'':'s')." ")));
        $string = ($negative?"-":"").$string;
        return $string;
    }


  }