<?php

namespace App\Http\Controllers;

use App\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
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
        $certificates = auth()->user()->certificates;

        return view('certificate.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificate.create');
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
            'certificate' => 'required',
            'issuer' => 'required',
            'date' => 'required',
        ]);

        $certificate = new Certificate();

        $certificate->user_id = auth()->id();
        $certificate->certificate = $request->input('certificate');
        $certificate->issuer = $request->input('issuer');
        $certificate->date = $request->input('date');
        $certificate->address = $request->input('address');
        $certificate->save();

        return redirect()->route('certificate.index')->with('success', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        return view('certificate.edit', compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'certificate' => 'required',
            'issuer' => 'required',
            'date' => 'required',
        ]);

        $certificate->certificate = $request->input('certificate');
        $certificate->issuer = $request->input('issuer');
        $certificate->date = $request->input('date');
        $certificate->address = $request->input('address');

        $certificate->update();

        return redirect()->route('certificate.index')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return back()->with('success', 'Deleted Successfully');
    }
}
