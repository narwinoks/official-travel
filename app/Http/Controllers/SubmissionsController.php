<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class SubmissionsController extends Controller
{
    // 
    public function index(){
        // $
        $submission=Submission::where('status','=',null)->get();
        return view('features.submission.index');
    }
}
