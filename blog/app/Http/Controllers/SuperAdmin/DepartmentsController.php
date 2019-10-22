<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.department.index')->with('departments', Department::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('superadmin.department.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = new Department();
        $department->name  = $request->input('name');
        $department->maxemployees  = $request->input('maxemployees');
        $department->save();
        //
        return view('superadmin.department.index')->with('departments', Department::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('superadmin.department.edit')->with(['department'=> Department::find($id)]);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //$department= Department::where('id', '=', $id)->first();

        //$department->update($request->all());
      //  return redirect()->route('superadmin.users.index');
        $department = Department::find($id);
        $department->name       = Input::get('name');
        $department->maxemployees      = Input::get('maxemployees');
        $department->save();

        // redirect
        return redirect()->route('superadmin.department.index');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
