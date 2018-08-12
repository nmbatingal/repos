<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
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
        $this->middleware('auth');
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
        return view('research.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$research = new ResearchArticle;

        $research->publication_title = $request->publication_title;
        $research->authors = $request->authors;
        $research->research_content = $request->research_content;
        $research->keywords = $request->keywords;

        $research->category_field
        $research->category_domain
        $research->category_subdomain

        $research->project_duration_start = $request->project_duration_start;
        $research->project_duration_end = $request->project_duration_end;

        $research->funding_agency_id = $request->funding_agency;

        $research->project_cost = $request->project_cost;
        $research->access_type_id

        if ( $request->hasFile('research_file') ) {

            $filename = $request->research_file->getClientOriginalName();
            $filesize = $request->research_file->getClientSize();
            
            $research->filename = $filename;
            $research->filesize = $filesize;
        }

        $research->status;
        $research->log_id = Auth::user()->id;

        if ( $research->save() ) {

            if ( $request->hasFile('research_file') ) {
                $request->research_file->storeAs('public/users/'. Auth::user()->id .'/research/'.$research->id, $filename);
            }

            $research->research_content = strip_tags($request->research_content);
            $research->addToIndex();
        }

        return redirect()->route('research.index');*/
        return dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ResearchArticle  $researchArticle
     * @return \Illuminate\Http\Response
     */
    public function show(ResearchArticle $researchArticle)
    {
        //
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
