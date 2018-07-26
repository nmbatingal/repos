<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\Researches;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $research = new Researches;
        $research->title = $request->title;
        $research->authors = $request->author;
        $research->abstract = nl2br($request->abstract);
        $research->pages = $request->pub_pages ?: Null;
        $research->created_by_id = Auth::user()->id;

        if ( $request->hasFile('pub_file') ) {

            $filename = $request->pub_file->getClientOriginalName();
            $filesize = $request->pub_file->getClientSize();
            
            $research->filename = $filename;
            $research->filesize = $filesize;

            $request->pub_file->storeAs('public/users/'. Auth::user()->id .'/research/'.$research->id, $filename);
        }

        if ( $research->save() ) {
            if ( $request->hasFile('pub_file') ) {
                $request->pub_file->storeAs('public/users/'. Auth::user()->id .'/research/'.$research->id, $filename);
            }
        }

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
