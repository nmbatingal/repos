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
        'category_field_id',
        'category_domain_id',
        'category_subdomain_id',
        'project_duration_start',
        'project_duration_end',
        'funding_agency',
        'project_cost',
        'access_type',
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
        'category_field_id' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'category_domain_id' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'category_subdomain_id' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'project_duration_start' => [
          'type' => 'date',
        ],
        'project_duration_end' => [
          'type' => 'date',
        ],
        'funding_agency' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'project_cost' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'access_type' => [
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
     * Model App\CategoryField
     *
     * @var
     */
    public function categoryField()
    {
        return $this->belongsTo('App\CategoryField', 'category_field_id');
    }

    /**
     * Model App\categoryDomain
     *
     * @var
     */
    public function categoryDomain()
    {
        return $this->belongsTo('App\CategoryDomain', 'category_domain_id');
    }

    /**
     * Model App\categoryDomain
     *
     * @var
     */
    public function categorySubdomain()
    {
        return $this->belongsTo('App\CategorySubdomain', 'category_subdomain_id');
    }

    /**
     * Model App\FundingAgency
     *
     * @var
     */
    public function fundingAgency()
    {
        return $this->hasOne('App\FundingAgency', 'funding_agency', 'funding_agency');
    }

    /**
     * Model App\AccessType
     *
     * @var
     */
    public function accessType()
    {
        return $this->hasOne('App\AccessType', 'access_type', 'access_type');
    }
}