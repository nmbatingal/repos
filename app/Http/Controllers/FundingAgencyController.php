<?php

namespace App\Http\Controllers;

use App\FundingAgency;
use Illuminate\Http\Request;

class FundingAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funding.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'funding_agency' => 'required|unique:funding_agencies',
        ]);

        $agency = new FundingAgency;
        $agency->funding_agency = $request->funding_agency;
        $agency->save();

        return redirect()->route('funding.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FundingAgency  $fundingAgency
     * @return \Illuminate\Http\Response
     */
    public function show(FundingAgency $fundingAgency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FundingAgency  $fundingAgency
     * @return \Illuminate\Http\Response
     */
    public function edit(FundingAgency $fundingAgency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FundingAgency  $fundingAgency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundingAgency $fundingAgency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FundingAgency  $fundingAgency
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundingAgency $fundingAgency)
    {
        //
    }
}
