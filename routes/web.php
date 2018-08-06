<?php

use App\User;
use App\Research;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/researches', function() {
    Research::deleteIndex();
    return Research::createIndex();
    // return Research::reindex();
    // Research::rebuildMapping();
});

Route::get('/users', function() {
    // User::deleteIndex();
    // User::createIndex();
    return User::reindex();
});

Route::get('/search', function() {
    $abstract = "";
    $params = [
        'body' => [
            'query' => [
                'multi_match' => [
                    'query' => (string) request('q'),
                    'fields' => ['title^3', 'authors', 'abstract', 'keywords'],                
                    // 'fields' => ['_all'],                
                ],
            ],
            'highlight' => [
                'pre_tags' => ['<span class="font-weight-bold">'],
                'post_tags' => ['</span>'],
                'fields' => [
                    'abstract' => [
                        'type' => 'plain'
                    ]
                ]
            ]
        ]
    ];

    // $research = Research::searchByQuery($params);
    $research = Research::complexSearch($params);

    if ( $research->getHits()['hits'] != null )
    {
        $body = $research->getHits()['hits'][0]['highlight']['abstract'];
        $abstract = implode("... ", $body);
    }

    // $client = ClientBuilder::create()->build();

    // $collection = Research::hydrateElasticsearchResult($client->search($params));
    // $collection = $client->search($params);
    // return $client->search($params);
    // return $collection->getHits();
    // return $research->getHits()['hits'];
    // return $research->getHits()['hits'][0]['highlight']['abstract'];
    // return $research->getHits()['hits'];
    return view('search', compact('research', 'abstract'));

});

Route::get('/research/upload', function () {
    return view('research.upload');
});

Route::get('/search/{searchKey}', function ($searchKey) {
    return \App\User::search($searchKey)->get();;
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/research', 'ResearchController');