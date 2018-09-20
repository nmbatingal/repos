<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\CategoryField;
use App\ResearchArticle;
use Illuminate\Http\Request;

class ResearchArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researches = ResearchArticle::where('log_id', Auth::user()->id )->get();
        return view('research.index', compact('researches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields = CategoryField::with('categoryDomains')->get();
        return view('research.create', compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $research = new ResearchArticle;
        $category_id = explode(',', $request->categoryDomain);

        /*** AUTHORS ARRAY SETUP ***/
        $data_authors = explode(',', $request->authors);
        $authors = array();
        foreach ($data_authors as $key => $value) {
            $authors[$key] = [
                'id'   => $key,
                'name' => $value,
            ];
        }

        $research->publication_title = $request->title;
        $research->authors = json_encode($authors);
        $research->research_content = $request->research_content;
        $research->keywords = $request->keywords;
        $research->category_field_id = $category_id[0];
        $research->category_domain_id = $category_id[1];
        $research->category_subdomain_id = $request->categorySubdomain;
        $research->project_duration_start = $request->project_duration_start.'-01';
        $research->project_duration_end = $request->project_duration_end.'-01';
        $research->funding_agency = $request->funding_agency;
        $research->project_cost = $request->project_cost;
        $research->access_type = $request->access_type;

        if ( $request->hasFile('research_file') ) {

            $filename = $request->research_file->getClientOriginalName();
            $filesize = $request->research_file->getClientSize();
            
            $research->filename = $filename;
            $research->filesize = $filesize;
        }

        $research->status = $request->status;
        $research->log_id = Auth::user()->id;

        if ( $research->save() ) {

            if ( $request->hasFile('research_file') ) {
                $request->research_file->storeAs('public/research_file/'.$research->id, $filename);
            }

            $research->category_field_id = $research->categoryField->category_field;
            $research->category_domain_id = $research->categoryDomain->category_domain;
            $research->category_subdomain_id = $research->categorySubdomain->category_subdomain;
            $research->research_content = strip_tags($request->research_content);
            $research->addToIndex();
        }

        return redirect()->route('research.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ResearchArticle  $researchArticle
     * @return \Illuminate\Http\Response
     */
    public function show(ResearchArticle $research)
    {
        // $research = ResearchArticle::findOrFail($id);
        // $research = $researchArticle;
        return view('research.show', compact('research'));

        // return $research;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ResearchArticle  $researchArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(ResearchArticle $researchArticle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResearchArticle  $researchArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResearchArticle $researchArticle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ResearchArticle  $researchArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResearchArticle $researchArticle)
    {
        //
    }
}
