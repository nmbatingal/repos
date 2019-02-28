<?php

namespace App\Http\Controllers;

use App\ResearchArticle;
use App\CategoryField;

use App\CategoryDomain;
use App\CategorySubdomain;

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
        $authors = $request->has('author') ? $request->get('author') : "";

        $domainIds = [];
        $subDomainIds = [];

        if($request->has('domain')) {
            
            $domainName = $request->get('domain');
            $domainIds = CategoryDomain::
                where('category_domain', 'like', '%'.$domainName.'%')->pluck('id');

        } else if($request->has('subdomain')) {

            $subDomainName = $request->get('subdomain');
            $subDomainIds = CategorySubdomain::
                where('category_subdomain', 'like', '%'.$subDomainName.'%')->pluck('id'); 
        }

        // 'categoryField.categoryDomains.categorySubdomains'

        $research = ResearchArticle::
            where([
                ['keywords', 'like', "%".$keywords."%"],
                ['publication_title', 'like', "%".$title."%"],
                ['authors', 'like', "%".$authors."%"],
            ])
            ->when($domainIds, function($query, $domainIds){
                return $query->whereIn('category_domain_id', $domainIds);
            })
            ->when($subDomainIds, function($query, $subDomainIds){
                return $query->whereIn('category_subdomain_id', $subDomainIds);
            })
            ->get();
        

        // Uncomment to test filtered Research Articles output in JSON.
        /*
        return response()->json([
            'articles' => $researchArticles,
            'article count' => count($researchArticles),
            'domainIds' => $domainIds,
            'subDomainIds' => $subDomainIds,
        ]);
        */

        foreach ($research as $record) {
            $record->authors = json_decode($record->authors);
        }

        return view('search', compact('research', 'fields'));
        // return json_encode( json_decode( $research[0]->authors ) );
        
        /*
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
        */

        // return view('search', compact('research', 'fields'));
        // return dd($research);
    }

    public function investments()
    {
        $researches = ResearchArticle::all();

        foreach ($researches as $record) {
            $record->authors = json_decode($record->authors);
        }
        
        return view('rd-table', compact('researches'));
    }
}
