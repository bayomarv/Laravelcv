<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = auth()->user()->experiences;

        return view('experience.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required',
            'employer' => 'required',
            'start_date' => 'required',
        ]);

        $experience = new Experience();

        $experience->user_id = auth()->id();
        $experience->job_title = $request->input('job_title');
        $experience->employer = $request->input('employer');
        $experience->address = $request->input('address');
        $experience->start_date = $request->input('start_date');
        $experience->end_date = $request->input('end_date');
        $experience->current_job = $request->input('current_job');
        $experience->job_desc = $request->input('job_desc');
        $experience->save();

        return redirect()->route('experience.index')->with('success', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  Experience $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Experience $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        return view('experience.edit', compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Experience $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'job_title' => 'required',
            'employer' => 'required',
            'start_date' => 'required',       
        ]);

        $experience->job_title = $request->input('job_title');
        $experience->employer = $request->input('employer');
        $experience->address = $request->input('address');
        $experience->start_date = $request->input('start_date');
        $experience->end_date = $request->input('end_date');
        $experience->current_job = $request->input('current_job');
        $experience->job_desc = $request->input('job_desc');

        $experience->update();

        return redirect()->route('experience.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Experience $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return back()->with('success', 'Deleted Successfully');
    }
}
