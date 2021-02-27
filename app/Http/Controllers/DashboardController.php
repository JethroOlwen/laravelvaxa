<?php

namespace App\Http\Controllers;
use App\Job;
use Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = Job::where('client_id',Auth()->id())->get();
        return view ('dashboard.index',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'job_title' => 'required',
            'slug' => 'required|unique:jobs',
            'job_type' => 'required',
            'salary' => 'required|numeric',
            'job_description' => 'required|min:250'
        ]);

        $request->user()->jobs()->create($request->all());
        return redirect('dashboard')->with('message','New job post uploaded');
     
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
        return view('dashboard.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $job = Job::find($id);
        return view('dashboard.edit',compact('job'));
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
        //
        $request->validate([
            'job_title' => 'required',
            'slug' => 'required|unique:jobs',
            'job_type' => 'required',
            'salary' => 'required|numeric',
            'job_description' => 'required|min:250'
        ]);
        Job::find($id)->update($request->all());
        return redirect()->route('dashboard')->with('message','Job post updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find will retrieve object based on the primary key
        $job = Job::find($id);
        $job->delete();
        return redirect('/dashboard')->with('message','Job post deleted succesfully');

    }
}
