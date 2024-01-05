<?php

namespace App\Http\Controllers;

use App\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
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
        $education = auth()->user()->education;

        return view('education.index', compact('education'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('education.create');
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
            'school_name' => 'required',
            'address' => 'required',
            'degree' => 'required',
            'start_date' => 'required',
        ]);

        $education = new Education();

        $education->user_id = auth()->id();
        $education->school_name = $request->input('school_name');
        $education->address = $request->input('address');
        $education->degree = $request->input('degree');
        $education->field_of_study = $request->input('field_of_study');
        $education->start_date = $request->input('start_date');
        $education->end_date = $request->input('end_date');
        $education->current_school= $request->input('current_school');
        $education->edu_desc = $request->input('edu_desc');
        $education->save();

        return redirect()->route('education.index')->with('success', 'Added Successfully');
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
    public function edit(Education $education)
    {
        return view('education.edit', compact('education'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'school_name' => 'required',
            'address' => 'required',
            'degree' => 'required',
            'field_of_study' => 'required',
            'start_date' => 'required',
        ]);

        $education->school_name = $request->input('school_name');
        $education->address = $request->input('address');
        $education->degree = $request->input('degree');
        $education->field_of_study = $request->input('field_of_study');
        $education->start_date = $request->input('start_date');
        $education->end_date = $request->input('end_date');
        $education->current_school= $request->input('current_school');
        $education->edu_desc = $request->input('edu_desc');

        $education->update();

        return redirect()->route('education.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {   
        $education->delete();

        return back()->with('success', 'Deleted Successfully');
    }
}
