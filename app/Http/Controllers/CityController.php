<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities=City::all();
        return view('features.city.index',compact('cities'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.city.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'city' => 'required|unique:cities|max:255',
            'longitude' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'latitude'=>['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'province'=>['required'],
            'island'=>['required']
        ],[
            'longitude.regex' => 'Latitude value appears to be incorrect format.',
            'longitude.regex' => 'Longitude value appears to be incorrect format.'
        ]);

        $model= City::create($request->all());
        if($model){
            return to_route('city.index')->withSuccess("Create New City Successfully !!");
        }else{
            return to_route('city.index')->withDanger("Failed Create New City!!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city= City::find($id);
        // dd($city);
        return view('features.city.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=([
            'longitude' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'latitude'=>['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'province'=>'required',
            'island'=>'required'
        ]);
        $city =City::find($id);
        if ($city->city == $request->cityOld) {
            $rules['city'] =   'required|max:255';
        }else{
            $rules['city'] = 'required|unique:cities|max:255';
        }
        $validate=$request->validate($rules);
        $model=$city->update($request->all());
        if($model){
            return to_route('city.index')->withSuccess("Update City Successfully !!");
        }else{
            return to_route('city.index')->withDanger("Failed Create New City!!");
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();
        if($city){
            return to_route('city.index')->withSuccess("Delete City Successfully !!");
        }else{
            return to_route('city.index')->withDanger("Failed Create New City!!");
        }
    }
}
