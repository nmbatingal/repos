<?php

use App\Articles;
use App\Research;
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
Route::get('/blank', function() {
    return view('blank');
});

Route::get('/researches', function() {
    // Research::createIndex($shards = null, $replicas = null);
    // Research::reindex();
    // Research::rebuildMapping();
    // Research::deleteIndex();
});

Route::get('/', function () {
    return view('blank');
});

Route::get('/search', function() {

    $query = [
                'multi_match' => [
                    'query' => (string) request('q'),
                    'fields' => ['title^3', 'authors', 'abstract', 'keywords'],                
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

    /*$client = ClientBuilder::create()->build();

    $params = [
        'index' => 'research',
        'type' => 'research_type',
        'body' => [
            'query' => [
                'multi_match' => [
                    'query' => (string) request('q'),
                    'fields' => ['title^5', 'abstract', 'keywords'],                
                ],
            ]
        ]
    ];*/

    // $response = $client->search($params);
    $research = Research::searchByQuery($query);
    // $research = ResearchRecord::hydrateElasticsearchResult( (array) $response );

    return view('home', compact('research'));

});

Route::get('/research/upload', function () {
    return view('research.upload');
});

Route::get('/search/{searchKey}', function ($searchKey) {
    return \App\User::search($searchKey)->get();;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/author', 'ResearchRecordController');
Route::resource('/research', 'ResearchController');