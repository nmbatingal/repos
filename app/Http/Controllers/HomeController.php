<?php

namespace App\Http\Controllers;

use App\User;
use App\ResearchArticle;
use App\CategoryField;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $research = ResearchArticle::all();
        $fields = CategoryField::with('categoryDomains')->get();
        return view('home', compact('research', 'fields'));
    }
}
