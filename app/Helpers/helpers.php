<?php 

if (!function_exists('GetDifferenceDate')) {
    function GetDifferenceDate($date1,$date2)
    {
        $date = new DateTime($date1);
        $date3 = new DateTime($date2);
        $interval = $date->diff($date3);
        return $interval->days .' ' .'Hari';
    }
}


?>