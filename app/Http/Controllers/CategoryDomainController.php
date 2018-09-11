<?php

namespace App\Http\Controllers;

use App\CategoryField;
use App\CategoryDomain;
use Illuminate\Http\Request;

class CategoryDomainController extends Controller
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
        $catFields = CategoryField::all();
        $catDomains = CategoryDomain::all();
        return view('categoryDomain.create', compact('catFields', 'catDomains'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catDomain = new CategoryDomain;
        $catDomain->category_field_id = $request->category_field;
        $catDomain->category_domain = $request->category_domain;
        $catDomain->save();

        return redirect()->route('domain.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryDomain  $categoryDomain
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryDomain $categoryDomain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryDomain  $categoryDomain
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryDomain $categoryDomain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryDomain  $categoryDomain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryDomain $categoryDomain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryDomain  $categoryDomain
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDomain $categoryDomain)
    {
        //
    }
}
