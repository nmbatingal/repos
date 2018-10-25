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

Auth::routes();

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

Route::get('/search', 'SearchController@search')->name('search');

/*
 *
 *
    // Create folder for elasticsearch snapshot data
    // Configure elasticsearch.yml
    // add path.repo: ["/rdic/elasticsearch-6.4.0/backups"]
    // restart elasticsearch.bat

    PUT /_snapshot/research_backup
    {
        "type": "fs",
        "settings": {
            "location": "research_backup",
            "compress": true
        }
    }

    // Create snapshot (backup) for elasticsearch data
    PUT /_snapshot/research_backup/snapshot_1?wait_for_completion=true

    // Get snapshot_* information
    GET /_snapshot/research_backup/snapshot_1

    // Get all snapshots saved
    GET /_snapshot/research_backup/_all
    
    // Restore snapshot
    POST /_snapshot/research_backup/snapshot_1/_restore
 *
 */

Route::get('/search2', function(Request $request) {

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

    $keywords = $request->has('keywords') ? $request->get('keywords') : "";
    $title    = $request->has('title') ? $request->get('title') : "";

    $params = [
        "body" => [
            "from" => 0, 
            "size" => 10,
            "query" => [
                "bool" => [
                    "filter" => [
                        "bool" => [
                            "should" => [
                                [ "match" =>  [ 'publication_title' => $title ] ],
                                // [ "match" => [ "category_field.category_field" => "Life Science" ] ],
                                // [ "match" => [ "category_domain.category_domain" => "Environmental Science" ] ],
                                // [ "match" => [ "category_subdomain.category_subdomain" => "Environmental Science (General)" ] ],
                                [ "term" => [ "keywords" => $keywords ] ],
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

    return view('search', compact('research'));
    // return dd($research);
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/research', 'ResearchArticleController');
Route::resource('/browse', 'BrowseResearchController');

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
});

Route::post('/category/subdomain/subdomainlist', 'CategorySubdomainController@showSubdomain')->name('subdomain.list');
Route::post('/category/subdomain/import', 'CategorySubdomainController@import')->name('subdomain.import');

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

Route::get('/mail', function() {

    $data = array('name'=>"Sam Jose", "body" => "Test mail");
    
    Mail::send('emails.mail', $data, function($message) {
        $message->to('batingalnarz11@gmail.com', 'Artisans Web')
                ->subject('Login Verification Key');
        $message->from('rdic.dostcaraga@gmail.com','Caraga RDIC');
    });

});

// Route::get('user/activation/{token}', 'Auth\RegisterController@activateUser')->name('user.activate');
Route::get('user/activation/{token}', 'Auth\LoginController@activateUser')->name('user.activate');

// Geocoder Tutorial
Route::get('/api/v1/hotels/{id?}', 'HotelController@index');
Route::post('/api/v1/hotels', 'HotelController@store');
Route::post('/api/v1/hotels/{id}', 'HotelController@update');
Route::delete('/api/v1/hotels/{id}', 'HotelController@destroy');

Route::get('/api/v1/coordinates/{name}', function($name) {
    try {
        $geocode = Geocoder::geocode("$name, Tanzania")->get();

        return dd($geocode);
        /*$arrResult = [
            "latitude" => $geocode->first()->getLatitude(),
            "longitude" => $geocode->first()->getLongitude(),
            "bounds" => array(
                "south" => $geocode->first()->getBounds()->getSouth(),
                "west" => $geocode->first()->getBounds()->getWest(),
                "north" => $geocode->first()->getBounds()->getNorth(),
                "east" => $geocode->first()->getBounds()->getEast()
            ),
            "streetNumber" => $geocode->first()->getStreetNumber(),
            "streetName" => $geocode->first()->getStreetName(),
            "zipcode" => $geocode->first()->getPostalCode(),
            "city" => $geocode->first()->getLocality(),
            "cityDistrict" => $geocode->first()->getSubLocality(),
            "county" => "",
            "countyCode" => "",
            "region" => "",
            "regionCode" => "",
            "country" => $geocode->first()->getCountry(),
            "countryCode" => $geocode->first()->getCountryCode(),
            "timezone" => $geocode->first()->getTimezone()
        ];*/
        // return Response::json($arrResult);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
});