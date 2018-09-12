<?php

use App\User;
use App\ResearchArticle;
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

Route::get('/admin', function () {
    return view('admin.home');
});

/*Route::get('/researches', function() {
    return ResearchArticle::deleteIndex();
    // return ResearchArticle::createIndex();
    // return ResearchArticle::reindex();
});*/

/*Route::get('/users', function() {
    // User::deleteIndex();
    // return User::createIndex();
    return User::reindex();
});*/

Route::get('/search', function() {

    $params = [
        'body' => [
            'query' => [
                'bool' => [
                    'must' => [
                        'multi_match' => [
                            'query' => (string) request('q'),
                            'fields' => ['title^2', 'authors', 'research_content', 'keywords'],      
                        ],
                    ],
                    'should' => [
                        'match' => [
                            'keywords' => [
                                'query' => (string) request('q'),
                            ]
                        ]
                    ]
                ]
            ],
            'highlight' => [
                'pre_tags' => ['<span class="font-weight-bold">'],
                'post_tags' => ['</span>'],
                'fields' => [
                    'research_content' => [
                        'type' => 'plain'
                    ],
                    'authors' => [
                        'type' => 'plain'
                    ]
                ]
            ]
        ]
    ];

    $research = Research::complexSearch($params);

    if ( $research->getHits()['hits'] != null )
    {
        $highlight = $research->getHits()['hits'][0]['highlight'];
        if ( array_key_exists('research_content', $highlight) )
        {
            $abstract = implode("... ", $highlight['research_content']);

            foreach ($research as $key => $value) {
                $research[$key]['research_content'] = $abstract;
            }

        }

        if ( array_key_exists('authors', $highlight) )
        {
            $authors = $highlight['authors'][0];

            foreach ($research as $key => $value) {
                $research[$key]['authors'] = $authors;
            }
        }
    }

    return view('search', compact('research'));
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/research', 'ResearchArticleController');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{

    Route::resource('/funding', 'FundingAgencyController');
    Route::resource('/access', 'AccessTypeController');

    /*** CATEGORY FIELD ***/
    Route::get('/category/field/fieldlist', 'CategoryFieldController@showField')->name('field.list');
    Route::resource('/category/field', 'CategoryFieldController');

    /*** CATEGORY DOMAIN ***/
    Route::get('/category/domain/domainlist', 'CategoryDomainController@showDomain')->name('domain.list');
    Route::resource('/category/domain', 'CategoryDomainController');

    /*** CATEGORY SUBDOMAIN ***/
    Route::resource('/category/subdomain', 'CategorySubdomainController');
    Route::post('/category/subdomain/subdomainlist', 'CategorySubdomainController@showSubdomain')->name('subdomain.list');
    Route::post('/category/subdomain/import', 'CategorySubdomainController@import')->name('subdomain.import');

});
