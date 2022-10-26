<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionsController extends Controller
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
    
    public function Approve(){
        return view('features.submission.Approve');

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
            return to_route('submission.index')->withSuccess("Create New City Successfully !!");
        }else{
            return to_route('submission.index')->withDanger("Failed Create New City!!");
        }
    }
}
