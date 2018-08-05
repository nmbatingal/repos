<?php

use App\Research;
use App\User;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/blank', function() {
    return view('blank');
});

Route::get('/researches', function() {
    Research::deleteIndex();
    Research::createIndex();
    return Research::reindex();
    // Research::rebuildMapping();
});

Route::get('/users', function() {
    return User::createIndex();
});

Route::get('/search', function() {

    $query = [
                'multi_match' => [
                    'query' => (string) request('q'),
                    'fields' => ['title^3', 'authors', 'abstract', 'keywords'],                
                ],
            ];

    $research = Research::searchByQuery($query);

    return view('search', compact('research'));

});

Route::get('/research/upload', function () {
    return view('research.upload');
});

Route::get('/search/{searchKey}', function ($searchKey) {
    return \App\User::search($searchKey)->get();;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/research', 'ResearchController');