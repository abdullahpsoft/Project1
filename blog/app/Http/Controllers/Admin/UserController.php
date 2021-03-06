<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
        //
    }


    public function create()
    {

        return view('admin.users.create');

    }
    public function show(Request $request)
    {

    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name  = $request->input('name');
        $user->email  = $request->input('email');
        $user->password  = $request->input('password');

        $user->save();
        //
        return view('admin.users.index')->with('users', User::all());
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('superadmin.users.index');
        }

        return view('admin.users.edit')->with(['user'=> User::find($id),'roles' => Role::all()]);
        //
    }

    public function assign($id)
    {

        return view('admin.users.assign')->with(['roleuser'=> RoleUser::all(),'user'=> User::find($id),'roles' => Role::all(),'users' => User::all()]);

        //
    }
    public function assignupdate(Request $request, $id)
    {
        $roleuser = RoleUser::where('user_id','=',$id)->first();
        $roleuser->assign_to_id = $request->input('assign_to_id');
        $roleuser->save();
        return redirect()->route('admin.users.index');
        //
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
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.index');
        }
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
