<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function city(){
        $citys=City::all();
        $data=[];
        foreach($citys as $city){
            $id=$city->id;
            $city_name=$city->city;
            $provinces= $city->provinces;
            $latitude=$city->latitude;
            $logitute =$city->logitute;
            $island=$city->island;
            $action = '<a href="JavaScript " class="btn btn-primary btn-sm mx-1">Show</a>';
            $action2 = '<a href="JavaScript " class="btn btn-danger btn-sm">Delete</a>';
            $overseas=isset($city->overseas)? 'Ya' : 'Tidak';
            $data[]=[
                'id'=>$id,
                'city'=>$city_name,
                'provinces'=>$provinces,
                'latitude' =>$latitude,
                'logitute'=>$logitute,
                'island'=>$island,
                'overseas'=>$overseas,
                'action' =>$action . $action2
            ];
        }

        $response['data']=$data;
        echo json_encode($response);
    }
}
