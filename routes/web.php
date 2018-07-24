<?php

use App\Articles;
use App\ResearchRecord;
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

	// Articles::deleteIndex();
	// Articles::createIndex();
    // Articles::reindex();
	// ResearchRecord::reindex();

    return view('welcome');
});

Route::get('/search', function() {

    //$articles = Articles::searchByQuery(['match' => ['title' => 'Sed']]);
    $query = [
                'multi_match' => [
                    'query' => (string) request('q'),
                    'fields' => ['title^3', 'abstract', 'keywords'],                
                ],
            ];

    $research = ResearchRecord::searchByQuery($query);
    // $research = ResearchRecord::hydrateElasticsearchResult($query);

    // $hits = array_pluck($research['hits']['hits'], '_source') ?: [];

    /*$sources = array_map(function ($source) {
            // The hydrate method will try to decode this
            // field but ES gives us an array already.
            $source['keywords'] = json_encode($source['keywords']);
            return $source;
        }, $hits);*/


    return $research;

    /*$hits = array_pluck($articles['hits']['hits'], '_source') ?: [];

    $sources = array_map(function ($source) {
    	$source['tags'] = json_encode($source['tags']);
    	return $source;
    }, $hits);

    return Articles::hydrate($sources);*/

    //return dd($research);
    //return ResearchRecord::hydrate($sources);


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