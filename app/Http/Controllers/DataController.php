<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\City;
use App\Models\Submission;
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

    public function NewSubmission(Request $request){
        $page = ($request->start + 10) / 8;
        $totalRecord=Submission::where('status','=',null)->select('count(*) as allcount')->count();
        $records=Submission:: get(['*'],'page',$page);
        // dd($records);
        $return=[];
        foreach ($records as $key => $record) {
            $action='<a href="JavaScript " class="btn btn-primary btn-sm mx-1">Show</a>';
            $id = $record->id;
            $name = $record->User->name;
            $from = $record->FromCity->city;
            $to = $record->ToCity->city;
            $start_at=\DateTime::createFromFormat('Y-m-d', $record->start_at)->format('d-m-Y');
            $end_at=\DateTime::createFromFormat('Y-m-d', $record->end_at)->format('d-m-Y');
            $description = $record->description;

            $return[] = array(
                "id" => $id,
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
        $output['recordsTotal'] = $totalRecord;
        $output['recordsFiltered'] = $totalRecord;
        $output['data']=$return;
        // $response['data']=$return;
        echo json_encode($output);
    }

    public function HistorySubmission(Request $request){
        $records=Submission::all();
        // dd($records);
        $return=[];
        foreach ($records as $key => $record) {
            $action='<a href="JavaScript " class="btn btn-primary btn-sm mx-1">Show</a>';
            $id = $record->id;
            $name = $record->User->name;
            $from = $record->FromCity->city;
            $to = $record->ToCity->city;
            $start_at=\DateTime::createFromFormat('Y-m-d', $record->start_at)->format('d-m-Y');
            $end_at=\DateTime::createFromFormat('Y-m-d', $record->end_at)->format('d-m-Y');
            $description = $record->description;
            if ($record->status == 1) {
                # code...
                $status ='<span class="badge badge-primary">Approve</span>';
            }else{
                $status ='<span class="badge badge-danger">Reaject</span>';
            }

            $return[] = array(
                "id" => $id,
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

    public function Submission(){
        $branch = Submission::orderBy('id', 'desc')->get();

        return datatables()->of($branch)
            ->addIndexColumn()
            ->toJson();

    }
}
