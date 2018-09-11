<?php

namespace App\Http\Controllers;

use App\AccessType;
use Illuminate\Http\Request;

class AccessTypeController extends Controller
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
        $access_types = AccessType::orderBy('access_type')->get();
        return view('access.create', compact('access_types'));
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
            'access_type' => 'required|unique:access_types',
        ]);

        $access_type = new AccessType;
        $access_type->access_type = $request->access_type;
        $access_type->save();

        return redirect()->route('access.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccessType  $accessType
     * @return \Illuminate\Http\Response
     */
    public function show(AccessType $accessType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccessType  $accessType
     * @return \Illuminate\Http\Response
     */
    public function edit(AccessType $accessType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AccessType  $accessType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccessType $accessType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccessType  $accessType
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccessType $accessType)
    {
        //
    }
}
