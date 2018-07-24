<?php

namespace App\Http\Controllers;

use App\User;
use App\ResearchRecord As Record;
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
        $records = Record::paginate(10);
        return view('home', compact('records'));
    }


    public function search()
    {
        // $users = User::search('users')->get();
        // return view('search', compact('users'));
    }
}
