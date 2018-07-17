<?php

use App\Articles;
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

	// Articles::deleteIndex();
	// Articles::createIndex();
	Articles::reindex();

    return view('welcome');
});

Route::get('/search', function() {

    $articles = Articles::searchByQuery(['match' => ['title' => 'Sed']]);

    // return $articles->chunk(2);

});

Route::get('/author/upload', function () {
    return view('author.upload');
});

Route::get('/search/{searchKey}', function ($searchKey) {
    return \App\User::search($searchKey)->get();;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/author', 'ResearchRecordController');


// Route::get('/search', 'HomeController@search')->name('search');