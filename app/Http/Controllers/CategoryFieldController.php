<?php

namespace App\Http\Controllers;

use App\CategoryField;
use App\CategorySubdomain;
use Illuminate\Http\Request;

class CategoryFieldController extends Controller
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
        return view('admin.categoryField.create', compact('catFields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catField = new CategoryField;
        $catField->category_field = $request->category_field;
        $catField->save();

        return redirect()->route('field.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoryField  $categoryField
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryField $categoryField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoryField  $categoryField
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryField $categoryField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoryField  $categoryField
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryField $categoryField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoryField  $categoryField
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryField $categoryField)
    {
        //
    }

    /*** JS ***/
    public function showField(Request $request)
    {
        $fields  = CategoryField::with('categoryDomains')->get();
        $data    = view('admin.categoryField.fieldlist', compact('fields'))->render();

        if($request->ajax())
        {
            return response()->json(['options' => $data]);
        } 
    }
}
