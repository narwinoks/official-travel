<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\City;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function NewSubmission(Request $request){
        $records=Submission::where('status','=',null)->with('User')->get();
        // dd($records);
        $return=[];
        foreach ($records as $key => $record) {
            $action='<a href="'.route('submission.approve',$record->id).'" class="btn btn-primary btn-sm mx-1">Show</a>';
            $id = $record->id;
            $name = $record->User->username;
            $from = $record->FromCity->city;
            $to = $record->ToCity->city;
            $start_at=\DateTime::createFromFormat('Y-m-d', $record->start_at)->format('d-m-Y');
            $end_at=\DateTime::createFromFormat('Y-m-d', $record->end_at)->format('d-m-Y');
            $description = $record->description;

            $return[] = array(
                "id" => $key +1,
                "name" =>$name,
                "city" => $from .'  '.'To'.'  '. $to,
                'date'=> $start_at .' '. 'To ' . $end_at  .' '. '(' . GetDifferenceDate($record->start_at,$record->end_at) . ') ' ,
                "description" => $description,
                'action' =>$action
            );
         }

    //  echo json_encode($data_arr);
    //  exit;
        $output['draw'] = $request->draw; 
        $output['data']=$return;
        // $response['data']=$return;
        echo json_encode($output);
    }

    public function HistorySubmission(Request $request){
        $records=Submission::where('status','<>',null)->with('user')->get();
        $return=[];
            foreach ($records as $key => $record) {
                if ($record->status == 1) {
                    $status ='<span class="badge badge-success">Approve</span>';
                } else {
                $status='<span class="badge badge-danger">Reaject</span>';
            }
            
            $id = $record->id;
            $name = $record->User->username;
            $from = $record->FromCity->city;
            $to = $record->ToCity->city;
            $start_at=\DateTime::createFromFormat('Y-m-d', $record->start_at)->format('d-m-Y');
            $end_at=\DateTime::createFromFormat('Y-m-d', $record->end_at)->format('d-m-Y');
            $description = $record->description;
            $return[] = array(
                "id" => $key + 1,
                "name" =>$name,
                "city" => $from .'  '.'To'.'  '. $to,
                'date'=> $start_at .' '. 'To ' . $end_at  .' '. '(' . GetDifferenceDate($record->start_at,$record->end_at) . ') ' ,
                "description" => $description,
                "status"=>$status
            );
        }
        
        //  echo json_encode($data_arr);
        //  exit;
        $output['draw'] = $request->draw; 
        $output['data']=$return;
        // $response['data']=$return;
        echo json_encode($output);
        
    }
    public function MySubmission(Request $request){
        $records=Submission::where('user_id','=',Auth::user()->id)->with('user')->get();
        $return=[];
            foreach ($records as $key => $record) {
                if ($record->status == '1') {
                    $status ='<span class="badge badge-success">Approve</span>';
                } elseif ($record->status == '0'){
                $status='<span class="badge badge-danger">Reaject</span>';
            }else{
                $status='<span class="badge badge-warning">Panding</span>';
            }
            if ($record->status != '1') {
                $button ='  <a href="'.route('submission.edit',$record->id).'" class="btn btn-primary">Edit</a>';
            }else{
                $button ='';
            }
            $id = $record->id;
            $name = $record->User->username;
            $from = $record->FromCity->city;
            $to = $record->ToCity->city;
            $start_at=\DateTime::createFromFormat('Y-m-d', $record->start_at)->format('d-m-Y');
            $end_at=\DateTime::createFromFormat('Y-m-d', $record->end_at)->format('d-m-Y');
            $description = $record->description;
            $return[] = array(
                "id" => $key + 1,
                "name" =>$name,
                "city" => $from .'  '.'To'.'  '. $to,
                'date'=> $start_at .' '. 'To ' . $end_at  .' '. '(' . GetDifferenceDate($record->start_at,$record->end_at) . ') ' ,
                "description" => $description,
                "status"=>$status,
                'action'=>$button
            );
        }
        //  echo json_encode($data_arr);
        //  exit;
        $output['draw'] = $request->draw; 
        $output['data']=$return;
        // $response['data']=$return;
        echo json_encode($output);
        
    }
}
