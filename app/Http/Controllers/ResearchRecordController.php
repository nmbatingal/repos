<?php

namespace App\Http\Controllers;

use Auth;
use Storage;
use App\ResearchRecord as Record;
use Illuminate\Http\Request;

class ResearchRecordController extends Controller
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
        $record = new Record;
        $record->title = $request->title;
        $record->alternate_title = $request->alttitle;
        $record->abstract = nl2br($request->abstract);
        $record->keywords = nl2br($request->keywords);
        $record->authors = nl2br($request->author);
        $record->publication_type = nl2br($request->pub_type);
        $record->publication_date = nl2br($request->pub_date);
        $record->pages = $request->pub_pages;
        $record->created_by_id = auth()->user()->id;

        if ( $request->hasFile('pub_file') ) {

            $filename = $request->pub_file->getClientOriginalName();
            $filesize = $request->pub_file->getClientSize();
            
            $record->filename = $filename;
            $record->filesize = $filesize;
        }

        if ( $record->save() ) {
            $request->pub_file->storeAs('public/users/'.$record->created_by_id.'/research/'.$record->id, $filename);
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
