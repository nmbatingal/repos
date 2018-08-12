<?php

namespace App;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;

class ResearchArticle extends Model
{
    use Uuids;
    use ElasticquentTrait;

    public $incrementing = false;
    protected $table = 'research_articles';

    protected $fillable = [
        'publication_title', 
        'authors', 
        'research_content',
        'keywords',
        'category_field',
        'category_domain',
        'category_subdomain',
        'project_duration_start',
        'project_duration_end',
        'funding_agency_id',
        'project_cost',
        'access_type_id',
        'filename',
        'filesize',
        'status',
        'log_id',
    ];

    protected $mappingProperties = [
        'publication_title' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'authors' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'research_content' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'keywords' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'category_field' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'category_domain' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'category_subdomain' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'project_duration_start' => [
          'type' => 'date',
        ],
        'project_duration_end' => [
          'type' => 'date',
        ],
        'funding_agency_id' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'project_cost' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'access_type_id' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'status' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'created_at' => [
          'type' => 'date',
        ],
        'updated_at' => [
          'type' => 'date',
        ],
    ];
    
    /**
     * Elasticsearch
     *
     * @var
     */
    public function getIndexName()
    {
        return $this->table;
    }

    /**
     * Elasticsearch
     *
     * @var
     */
    public function getTypeName()
    {
        return 'research';
    }

    /**
     * Model App\FundingAgency
     *
     * @var
     */
    public function fundingAgency()
    {
        return $this->hasOne('App\FundingAgency', 'funding_agency_id');
    }

    /**
     * Model App\AccessType
     *
     * @var
     */
    public function accessType()
    {
        return $this->hasOne('App\AccessType', 'access_type_id');
    }
}