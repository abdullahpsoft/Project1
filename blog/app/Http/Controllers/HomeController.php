<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home')->with('tasks', Task::all());
    }
    public function update(Request $request, $id)
    {
        $roleuser = Task::where('id','=',$id)->first();
        $roleuser->status = $request->input('status');
        $roleuser->save();

        return redirect()->route('home.index');
        //
    }
}
