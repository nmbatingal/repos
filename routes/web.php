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

Route::get('/', 'HomeController@index')->name('home');

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

Route::get('/search', function(Request $request) {

    /*$params = [
        'body' => [
            'query' => [
                'bool' => [
                    'must' => [
                        'multi_match' => [
                            'query' => $request->get('q'),
                            'fields' => ['publication_title^2', 'authors', 'research_content', 'keywords'],      
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
                "number_of_fragments" => 3,
                'fields' => [
                    'publication_title' => new \stdClass(),
                    'research_content' => new \stdClass(),
                    'authors' => new \stdClass(),
                    'keywords' => new \stdClass(),
                ]
            ]
        ]
    ];*/

    /*if($request->has('title'))
    {
        $params = [
            'body' => [
                'query' => [
                    'bool' => [
                        'should' => [
                            [ 'match' =>  [ 'publication_title' => $request->get('title') ]],
                        ],
                    ]
                ],
                'highlight' => [
                    'pre_tags' => ['<span class="font-weight-bold">'],
                    'post_tags' => ['</span>'],
                    "number_of_fragments" => 3,
                    'fields' => [
                        'publication_title' => new \stdClass(),
                        'research_content' => new \stdClass(),
                        'authors' => new \stdClass(),
                        'keywords' => new \stdClass(),
                    ]
                ]
            ]
        ];
    }*/

    $publication_title = $request->get('title');

    $category = explode(',', $request->get('domain'));
    $category_field  = $category[0];
    $category_domain =  $category[1] > 0 ? $category[1] : '';
    $category_subdomain = $request->get('subdomain');

    /*$params = [
        'body' => [
            'query' => [
                'bool' => [
                    'should' => [
                        [ 'match' =>  [ 'publication_title' => '' ] ],
                        [ 'bool' => [
                            'should' => [
                                [ 'match' =>  [ 'category_field.id' => $category_field ] ],
                            ]
                          ]
                        ],
                        // [ 'match_phrase' =>  [ 'category_field.id' => $category_field ] ],
                        // [ 'match_phrase' =>  [ 'category_domain.id' => '' ] ],
                        // [ 'match' =>  [ 'category_subdomain.id' => $category_subdomain ]],
                        // [ 'match' =>  [ 'keywords' => '' ]],
                    ],
                ]
            ],
            'highlight' => [
                'pre_tags' => ['<span class="font-weight-bold">'],
                'post_tags' => ['</span>'],
                "number_of_fragments" => 3,
                'fields' => [
                    'publication_title' => new \stdClass(),
                    //'category_field.id' => new \stdClass(),
                    //'category_domain.id' => new \stdClass(),
                    //'category_subdomain.id' => new \stdClass(),
                    'keywords' => new \stdClass(),
                ]
            ]
        ]
    ];*/

    /*$params = [
        'body' => [
            'query' => [
                'bool' => [
                    /*'filter' => [
                        'bool' => [
                            'should' => [
                                [ 'match' => [ 'publication_title' => 'dominant' ] ],
                            ],
                        ],
                    ],
                    'should' => [
                        [ 'term' =>  [ 'category_field.id' => 2 ] ],
                        [ 'term' =>  [ 'category_domain.id' =>  12 ] ],
                    ],
                ],


                /*'bool' => [
                    'should' => [
                        [ 'match' =>  [ 'publication_title' => '' ] ],
                        [ 'bool' => [
                            'should' => [
                                [ 'match' =>  [ 'category_field.id' => $category_field ] ],
                            ]
                          ]
                        ],
                        // [ 'match_phrase' =>  [ 'category_field.id' => $category_field ] ],
                        // [ 'match_phrase' =>  [ 'category_domain.id' => '' ] ],
                        // [ 'match' =>  [ 'category_subdomain.id' => $category_subdomain ]],
                        // [ 'match' =>  [ 'keywords' => '' ]],
                    ],
                ]
            ],
        ]
    ];*/

    $keywords = '"term" : { "keywords" : "population" }';
    $title = '""';

    $json = '{
        "query" : {
            "bool" : {
                "filter" : {
                    '.$keywords.',
                    '.$title.'
                }
            }
        },
        "highlight" : {
            "fields" : {
                "keywords" : {}
            }
        }
    }';

    /*$params = [
        'body' => $json,
    ];*/

    $params = [
        "body" => [
            "query" => [
                "bool" => [
                    "filter" => [
                        // "term" => [ "publication_title" => "Dominant Small" ],
                        // "term" => [ "keywords" => "{}" ],
                        "bool" => [
                            "should" => [
                                [ "match" =>  [ 'publication_title' => "" ] ],
                                // [ "match" => [ "category_field.category_field" => "Life Science" ] ],
                                // [ "match" => [ "category_domain.category_domain" => "Environmental Science" ] ],
                                // [ "match" => [ "category_subdomain.category_subdomain" => "Environmental Science (General)" ] ],
                                // [ "term" => [ "keywords" => "" ] ],
                            ],
                        ],
                    ],
                ],
            ],
            'highlight' => [
                "number_of_fragments" => 3,
                'fields' => [
                    'publication_title' => new \stdClass(),
                    'keywords' => new \stdClass(),
                ]
            ]
        ]
    ];


    $research = ResearchArticle::complexSearch($params);

    if ( $research->getHits()['hits'] != null )
    {
        /*$highlight = $research->getHits()['hits'][0]['highlight'];
        if ( array_key_exists('research_content', $highlight) )
        {
            $abstract = implode("... ", $highlight['research_content']);

            foreach ($research as $key => $value) {
                $research[$key]['research_content'] = $abstract;
            }

        }*/

        /*if ( array_key_exists('authors', $highlight) )
        {
            $authors = $highlight['authors'][0];

            foreach ($research as $key => $value) {
                $research[$key]['authors'] = $authors;
            }
        }*/
    }

    // return view('search', compact('research'));
    return dd($research);
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

/*Route::get('/array', function(){
    $data_authors = explode(',', "amante,gogo,lababa,adante");
    $authors = array();

    foreach ($data_authors as $key => $value) {
        $authors[$key] = [
            'id'   => null,
            'name' => $value,
        ];
    }

    return json_encode($authors);
});*/