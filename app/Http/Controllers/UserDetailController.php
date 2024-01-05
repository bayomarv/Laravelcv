<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;

class UserDetailController extends Controller
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
        $details = auth()->user()->details;

        return view('user_detail.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $details = auth()->user()->details;
        if (isset($details)) {
            return redirect()->route('user-detail.index')->with('error', 'You already have user details');
        } else {
            return view('user_detail.create');
        }

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
            'first_name'=>'required',
            'last_name'=>'required',
            'gender'=>'required',
            'age'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'summary' => 'required',
        ]);

        $detail = new UserDetail();

        $detail->user_id = auth()->id();
        $detail->first_name = $request->input('first_name');
        $detail->last_name = $request->input('last_name');
        $detail->gender = $request->input('gender');
        $detail->age = $request->input('age');
        $detail->email = $request->input('email');
        $detail->phone = $request->input('phone');
        $detail->address = $request->input('address');
        $detail->summary = $request->input('summary');
        $detail->save();

        return redirect()->route('experience.create')->with('success', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show(UserDetail $userDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDetail $userDetail)
    {
        return view('user_detail.edit', compact('userDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDetail $userDetail)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender'=>'required',
            'age'=>'required',
            'email' => 'required|email',
            'phone' => 'required',
            'summary' => 'required',
        ]);

        $userDetail->first_name = $request->input('first_name');
        $userDetail->last_name = $request->input('last_name');
        $userDetail->gender = $request->input('gender');
        $userDetail->age = $request->input('age');
        $userDetail->email = $request->input('email');
        $userDetail->phone = $request->input('phone');
        $userDetail->address = $request->input('address');
        $userDetail->summary = $request->input('summary');

        $userDetail->update();

        return redirect()->route('user-detail.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDetail $userDetail)
    {
        $userDetail->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
