<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        // dd($users);
        // $user->get
        return view('features.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::where('name','<>','admin')->get();
        return view('features.users.create',compact('roles'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=$request->validate([
            'username'=>'required|unique:users',
            'password'=>'min:5'
        ]);
        $model= User::create([
            'username'=>$request->username,
            'password'=>Hash::make($request->password)
        ]);
        $model->attachRole($request->role);

        if($model){
            return to_route('user.index')->withSuccess("Create New User Successfully !!");
        }else{
            return to_route('user.index')->withDanger("Failed Create New user!!");
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
        $user=User::find($id);
        $roles=Role::where('name','<>','admin')->get();
        return view('features.users.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if ($request->username == $request->username_old) {
            $rules='required';
        }else{
            $rules='required\unique:users';
        }
        try {
            $user = User::findOrFail($id);

            $this->validate($request, [
                'username' =>$rules,
                'role_id' => ['required']
            ]);

            $user->update([
                'username' => $request->username,
            ]);

            $roles = $user->roles;

            foreach ($roles as $role) {
                $user->detachRole($role);
            }

            $role = Role::find($request->role_id);

            $user->attachRole($role);

            return to_route('user.index')->withSuccess("Update New User Successfully !!");
        } catch (ModelNotFoundException $e) {
            return to_route('user.index')->withDanger("Failed Update New user!!");
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
        $user=User::find($id);
        $user->delete();
        if($user){
            return to_route('user.index')->withSuccess("Delete User Successfully !!");
        }else{
            return to_route('user.index')->withDanger("Failed Delete  user!!");
        }

    }
}
