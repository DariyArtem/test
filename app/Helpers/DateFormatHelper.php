<?php


namespace App\Helpers;


use Illuminate\Support\Carbon;

class DateFormatHelper
{

    static public function index($date)
    {
        $newDate = explode(" ", $date);

        $array = explode("-", $newDate[0]);

        $day = $array[2];

        $year = $array[0];

        switch ($array[1]){

            case "01":
                return $day." Jan, ".$year;
            case "02":
                return $day." Feb, ".$year;
            case "03":
                return $day." Mar, ".$year;
            case "04":
                return $day." Apr, ".$year;
            case "05":
                return $day." May, ".$year;
            case "06":
                return $day." Jun, ".$year;
            case "07":
                return $day." Jul, ".$year;
            case "08":
                return $day." Aug, ".$year;
            case "09":
                return $day." Sep, ".$year;
            case "10":
                return $day." Oct, ".$year;
            case "11":
                return $day." Nov, ".$year;
            case "12":
                return $day." Dec, ".$year;

        }


    }

}
