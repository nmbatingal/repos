<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\Research;
use Illuminate\Http\Request;

class ResearchController extends Controller
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
        $researches = Research::where('log_id', Auth::user()->id )->get();
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
        $research = new Research;
        $research->title = $request->title;
        $research->authors = $request->authors;
        $research->project_duration = $request->project_duration;
        $research->funding_agency = $request->funding_agency;
        $research->project_cost = $request->project_cost;
        $research->research_content = $request->research_content;
        $research->keywords = $request->keywords;
        $research->log_id = Auth::user()->id;
        $research->status = $request->has('status') ? true : false;

        if ( $request->hasFile('research_file') ) {

            $filename = $request->research_file->getClientOriginalName();
            $filesize = $request->research_file->getClientSize();
            
            $research->filename = $filename;
            $research->filesize = $filesize;
        }

        if ( $research->save() ) {

            if ( $request->hasFile('research_file') ) {
                $request->research_file->storeAs('public/users/'. Auth::user()->id .'/research/'.$research->id, $filename);
            }

            $research->research_content = strip_tags($request->research_content);
            $research->addToIndex();
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $research = Research::findOrFail($id);
        return view('research.show', compact('research'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $research = Research::findOrFail($id);

        if ( $request->ajax() ) {
            if ( $research->delete( $request->all() ) )
            {
                $research->removeFromIndex();
            }

            return response(['msg' => 'Product deleted', 'status' => 'success']);
        }

        return response(['msg' => 'Failed deleting the product', 'status' => 'failed']);
    }
}
