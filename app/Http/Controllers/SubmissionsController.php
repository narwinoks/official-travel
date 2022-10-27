<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubmissionsController extends BaseController
{
    // 

    public function index(){
        
        return view('features.submission.index');
    }
    public function HistorySubmission(){
        // $
        return view('features.submission.NewSubmissions');
    }
    
    public function AllSubmissions(){
        return view('features.submission.HistorySubmissions');

    }

    public function create(){
        $city=City::select('id','city')->get();
        return view('features.submission.create',compact('city'));
    }
    
    public function Approve($id){
        $submission=Submission::where('id',$id)->first();
        $distance=$this->getDistanceBetweenPointsNew($submission->from_latitude,$submission->from_longitude,$submission->to_latitude,$submission->to_longtitude);
        switch ($distance) {
            case  ($distance <= 60):
                $data=[
                    'satuan'=>'rp',
                    'nominal'=>'',
                    'status'=>'perjalanan dekat'
                ];
                break;
            case ($submission->FromCity->overseas == 1 || $submission->ToCity->overseas == 1):
                $data=[
                    'satuan'=>'us',
                    'nominal'=>'50',
                    'status'=>'perjalan keluar negri'
                ];
                 break;
            case  ($distance >=61 &&  Str::lower($submission->FromCity->province) == Str::lower ($submission->ToCity->province)):
                $data=[
                    'satuan'=>'rp',
                    'nominal'=>'200000',
                    'status'=>'perjalan keluar kota dalam province'
                ];
                break;
            case ($distance >=61 &&  Str::lower($submission->FromCity->province) !=Str::lower ($submission->ToCity->province) && Str::lower($submission->FromCity->island) == Str::lower($submission->ToCity->island) ):
                $data=[
                    'satuan'=>'rp',
                    'nominal'=>'250000',
                    'status'=>'perjalan keluar kota luar province dalam pulau'

                ];
                break;
            case ($distance >=61 &&  Str::lower($submission->FromCity->province) !=Str::lower ($submission->ToCity->province) && Str::lower($submission->FromCity->island) != Str::lower($submission->ToCity->island) ):
                $data=[
                    'satuan'=>'rp',
                    'nominal'=>'3000000',
                    'status'=>'perjalan keluar kota luar province dan pulau'
                ];
                break;
            default:
                return "gak masuk";
                break;
        }
        return view('features.submission.Approve',compact('submission','distance','data'));

    }



    public function Store(Request $request){
        $validated = $request->validate([
            'from_city_id' => 'required'
        ]);
        $FromCity=City::find($request->from_city_id);
        $ToCity=City::find($request->to_city_id);
        $model=Submission::create([
            'user_id'=>$request->user()->id,
            'from_city_id'=>$request->from_city_id,
            'to_city_id'=>$request->to_city_id,
            'from_longitude'=>$FromCity->longitude,
            'to_longtitude'=>$ToCity->longitude,
            'from_latitude'=>$FromCity->latitude,
            'to_latitude'=>$ToCity->latitude,
            'start_at'=>$request->from_date,
            'end_at'=>$request->end_date,
            'Description'=>$request->description
        ]);

        if($model){
            return to_route('submission.index')->withSuccess("Create New Submission Successfully !!");
        }else{
            return to_route('submission.index')->withDanger("Failed Create New Submission!!");
        }
    }

    public function ApproveStore(Request $request){
        $submission = Submission::find($request->id);
        $submission->update($request->all());
        // return $submission->status;
        if ($submission->status == 1 ) {
          session()->flash('success','Approve Submission Successfully Approved !!');
        }else{
            session()->flash('danger','Reaject Submission Successfully Reaject !!');
        }

    }

    public function edit($id){
        $city=City::select('id','city')->get();
        $submission=Submission::find($id);
        return view('features.submission.edit',compact('city','submission'));
    }

    public function  update(Request $request){
        $validated = $request->validate([
            'from_city_id' => 'required'
        ]);
        $FromCity=City::find($request->from_city_id);
        $ToCity=City::find($request->to_city_id);
        $model=Submission::find($request->id);
        $model->update([
            'user_id'=>$request->user()->id,
            'from_city_id'=>$request->from_city_id,
            'to_city_id'=>$request->to_city_id,
            'from_longitude'=>$FromCity->longitude,
            'to_longtitude'=>$ToCity->longitude,
            'from_latitude'=>$FromCity->latitude,
            'to_latitude'=>$ToCity->latitude,
            'start_at'=>$request->from_date,
            'end_at'=>$request->end_date,
            'Description'=>$request->description
        ]);

        if($model){
            return to_route('submission.index')->withSuccess("Update New Submission Successfully !!");
        }else{
            return to_route('submission.index')->withDanger("Failed update New Submission!!");
        }
    }
}
