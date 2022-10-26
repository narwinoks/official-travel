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

if (!function_exists('konversi_uang')) {
	function konversi_uang($a,$b)
	{
		if (isset($a)) {
            if ($b=='rp') {
                if ($a == '') {
                    $a = 0;
                }
                $p 			= strlen($a);
                $hasil 		= number_format($a, 2);
                return "Rp. " . $hasil;
            }
            $separator = ",";
            $currency = "$";
            $decimal = substr($a, -2);
            $amount = substr($a, 0, -2) . $separator . $decimal;
            return  $currency .$amount;
		}
	}
}
if (!function_exists('tgltoview')) {
	function tgltoview($data)
	{
		if ($data == "" || $data == "0000-00-00") {
			return "-";
		} else {
			$hasil = Date('d-m-Y', strtotime($data));
			return $hasil;
		}
	}
}
if (!function_exists('distance')) {
	function distance($data1,$data2)
	{
        if ($data1 && $data2) {
            # code...
            $datetime1 = new DateTime($data1);
            $datetime2 = new DateTime($data2);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
    
            return $days;
        }
	}
}



?>