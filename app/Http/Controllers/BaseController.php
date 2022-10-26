<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
 public function CalculateDistance($FromLongitude, $ToLongitude,$Fromlatitude,$Tolatitude){

    if (($Fromlatitude == $Tolatitude) && ($FromLongitude == $ToLongitude)) {
        return 0;
      }
      else {
        $theta = $FromLongitude - $ToLongitude;
        $dist = sin(deg2rad($Fromlatitude)) * sin(deg2rad($Tolatitude)) +  cos(deg2rad($Fromlatitude)) * cos(deg2rad($Tolatitude)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = 'K';
    
        // if ($unit == "K") {
          return ($miles * 1.609344);
        // } else if ($unit == "N") {
        //   return ($miles * 0.8684);
        // } else {
        //   return $miles;
        // }
      }
 }
 function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'kilometers') {
    if (($latitude1 == $latitude2) && ($longitude1 == $longitude2)){
        return 0;
    }
    $theta = $longitude1 - $longitude2; 
    $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
    $distance = acos($distance); 
    $distance = rad2deg($distance); 
    $distance = $distance * 60 * 1.1515; 
    switch($unit) { 
      case 'miles': 
        break; 
      case 'kilometers' : 
        $distance = $distance * 1.609344; 
    } 
    return (round($distance,2)); 
  }

}
