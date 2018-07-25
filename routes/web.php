<?php

use App\Articles;
use App\ResearchRecord;
use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder;
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

Route::get('/articles', function() {
    Articles::deleteIndex();
});

Route::get('/research', function() {
    // ResearchRecord::deleteIndex();
    ResearchRecord::reindex();
});

Route::get('/', function () {
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

    // $result   = ResearchRecord::search('harum');
    // $research = ResearchRecord::hydrateElasticsearchResult( (array) $result );

    // $hits = array_pluck($research['hits']['hits'], '_source') ?: [];

    /*$sources = array_map(function ($source) {
            // The hydrate method will try to decode this
            // field but ES gives us an array already.
            $source['keywords'] = json_encode($source['keywords']);
            return $source;
        }, $hits);*/


    // return $result;

    /*$hits = array_pluck($articles['hits']['hits'], '_source') ?: [];

    $sources = array_map(function ($source) {
    	$source['tags'] = json_encode($source['tags']);
    	return $source;
    }, $hits);

    return Articles::hydrate($sources);*/

    //return dd($research);
    //return ResearchRecord::hydrate($sources);

    $client = ClientBuilder::create()->build();

    $params = [
        'index' => 'research',
        'type' => 'research_type',
        'body' => [
            'query' => [
                'multi_match' => [
                    'query' => (string) request('q'),
                    'fields' => ['title^3', 'abstract', 'keywords'],                
                ],
            ]
        ]
    ];


    $response = $client->search($params);
    $research = ResearchRecord::hydrateElasticsearchResult( (array) $response );
    return dd($research);


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