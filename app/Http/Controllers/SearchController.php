<?php

namespace App\Http\Controllers;

use App\ResearchArticle;
use App\CategoryField;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $fields = CategoryField::with('categoryDomains')->get();

        $keywords = $request->has('keywords') ? $request->get('keywords') : "";
        $title    = $request->has('title') ? $request->get('title') : "";
        $domain   = $request->has('domain') ? $request->get('domain') : "";
        $subdomain   = $request->has('subdomain') ? $request->get('subdomain') : "";

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
                                    [ "match_phrase" => [ "category_field.category_field" => $domain ] ],
                                    [ "match_phrase" => [ "category_domain.category_domain" => $domain ] ],
                                    [ "match_phrase" => [ "category_subdomain.category_subdomain" => $subdomain ] ],
                                    [
                                        'multi_match' => [
                                            'query'  => $keywords,
                                            'fields' => ['publication_title^2', 'keywords'],      
                                        ]
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                'highlight' => [
                    "pre_tags"  => ['<mark>'],
                    "post_tags" => ['</mark>'],
                    'fields' => [
                        'publication_title' => [ 
                            "force_source" => true,
                        ],
                        'category_field.category_field' => new \stdClass(),
                        'category_domain.category_domain' => new \stdClass(),
                        'category_subdomain.category_subdomain' => new \stdClass(),
                        'keywords' => new \stdClass(),
                    ]
                ]
            ]
        ];

        $research = ResearchArticle::complexSearch($params);

        if ( $research->getHits()['hits'] != null )
        {
            $hits = $research->getHits()['hits'];

            foreach ($hits as $key => $hit) {

                $highlight = $hit['highlight'];

                if ( array_key_exists('publication_title', $highlight) )
                {
                    $show = $highlight['publication_title'];

                    foreach ($research as $key => $value) {
                        $research[$key]['publication_title'] = $highlight['publication_title'][0];
                    }
                }

            }
        }

        return view('search', compact('research', 'fields'));
        // return dd($research);
    }
}
