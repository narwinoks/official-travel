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
            $provinces= $city->province;
            $latitude=$city->latitude;
            $logitute =$city->longitude;
            $island=$city->island;
            $url=route('city.edit',$id);
            $action = '<a  href="'.$url.'" data-original-title="Edit" class="btn btn-primary btn-sm mx-1">Edit</a>';
            $action2 = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$city->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteData">Delete</a>';
           if ($city ->overseas ==1) {
               $overseas ='YA';
            }else{
               $overseas ='Tidak';

           }
            $data[]=[
                'id'=>$id,
                'city'=>$city_name,
                'provinces'=>$provinces,
                'latitude' =>$latitude,
                'longitute'=>$logitute,
                'island'=>$island,
                'overseas'=>$overseas,
                'action' =>$action . $action2
            ];
        }

        $response['data']=$data;
        echo json_encode($response);
    }
}
