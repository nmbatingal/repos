<?php

namespace App\Http\Controllers;

use File;
use Excel;
use Session;
use App\CategoryField;
use App\CategoryDomain;
use App\CategorySubdomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorySubdomainController extends Controller
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
        $catSubdomains = CategorySubdomain::with('categoryDomain')->get();

        return view('categorySubdomain.create', compact('catFields', 'catDomains', 'catSubdomains'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $catSubdomain = new CategorySubdomain;
        $catSubdomain->category_domain_id = $request->category_domain;
        $catSubdomain->category_subdomain = $request->category_subdomain;
        $catSubdomain->save();

        return redirect()->route('subdomain.create');
    }

    public function import(Request $request){
        //validate the xls file
        $this->validate($request, [
            'file'      => 'required'
        ]);
     
        if($request->hasFile('file')) {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
     
                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {})->get();

                if(!empty($data) && $data->count()) {
     
                    foreach ($data as $key => $value) {

                        $field = CategoryField::firstOrCreate(['category_field' => $value->category_field]);
                        $domain = CategoryDomain::firstOrCreate([
                                    'category_domain' => $value->category_domain,
                                    'category_field_id' => $field->id,
                                ]);
                        $subdomain = CategorySubdomain::firstOrCreate([
                                    'category_subdomain' => $value->category_subdomain,
                                    'category_domain_id' => $domain->id,
                                ]);
                    }
                }
     
                return back();
     
            } else {
                Session::flash('error', 'File is a '.$extension.' file! Please upload a valid xls/csv file!');
                return back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategorySubdomain  $categorySubdomain
     * @return \Illuminate\Http\Response
     */
    public function show(CategorySubdomain $categorySubdomain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategorySubdomain  $categorySubdomain
     * @return \Illuminate\Http\Response
     */
    public function edit(CategorySubdomain $categorySubdomain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategorySubdomain  $categorySubdomain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategorySubdomain $categorySubdomain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategorySubdomain  $categorySubdomain
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorySubdomain $categorySubdomain)
    {
        //
    }
}
