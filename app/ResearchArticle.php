<?php

namespace App;

use Carbon\Carbon;
use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;

class ResearchArticle extends Model
{
    use Uuids;
    use ElasticquentTrait;

    public $incrementing = false;
    protected $table = 'research_articles';
    protected $casts = [
        'authors' => 'array',
        'access_type' => 'boolean',
        'status' => 'boolean',
    ];

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
        'project_location',
        'location_latitude',
        'location_longitude',
        'access_type',
        'filename',
        'filesize',
        'status',
        'log_id',
    ];

    protected $mappingProperties = [
        'publication_title' => [
          'type' => 'text',
        ],
        'authors' => [
          'type' => 'text',
        ],
        'research_content' => [
          'type' => 'text',
        ],
        'keywords' => [
          'type' => 'text',
        ],
        'category_field_id' => [
          'type' => 'text',
        ],
        'category_domain_id' => [
          'type' => 'text',
        ],
        'category_subdomain_id' => [
          'type' => 'text',
        ],
        'project_duration_start' => [
          'type' => 'date',
        ],
        'project_duration_end' => [
          'type' => 'date',
        ],
        'funding_agency' => [
          'type' => 'text',
        ],
        'project_cost' => [
          'type' => 'text',
        ],
        'project_location' => [
          'type' => 'text',
        ],
        'location_latitude' => [
          'type' => 'text',
        ],
        'location_longitude' => [
          'type' => 'text',
        ],
        'access_type' => [
          'type' => 'keyword',
        ],
        'status' => [
          'type' => 'keyword',
        ],
        'created_at' => [
          'type' => 'date',
          "format"=> "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis",
        ],
        'updated_at' => [
          'type' => 'date',
          "format"=> "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis",
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
        return $this->belongsTo('App\CategoryField', 'category_field_id', 'id');
    }

    /**
     * Model App\categoryDomain
     *
     * @var
     */
    public function categoryDomain()
    {
        return $this->belongsTo('App\CategoryDomain', 'category_domain_id', 'id');
    }

    /**
     * Model App\categoryDomain
     *
     * @var
     */
    public function categorySubdomain()
    {
        return $this->belongsTo('App\CategorySubdomain', 'category_subdomain_id', 'id');
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

    // Get research posted on
    public function getProjectDurationAttribute()
    {
        if ( $this->attributes['project_duration_start'] != null ) 
        {
            $start_date = date("F Y", strtotime( $this->attributes['project_duration_start'] ));
            $end_date   = date("F Y", strtotime( $this->attributes['project_duration_end'] ));

            $duration   = $start_date ." - ". $end_date;
            return $duration;
        } else {
            return "";
        }
    }

    // Get research posted on
    public function getPostedOnAttribute()
    {
        $date = date("F Y", strtotime( $this->attributes['created_at'] ));

        if ( $this->attributes['created_at'] != $this->attributes['updated_at'] ) 
        {
            $date = date("F Y", strtotime( $this->attributes['updated_at'] ));
        }

        return $date;
    }

    // Get research filesize to MB
    public function getFileSizeAttribute()
    {
        return $this->human_filesize($this->attributes['filesize']);
    }

    public static function human_filesize($size, $precision = 2) {
        
        for($i = 0; ($size / 1024) > 0.9; $i++, $size /= 1024) {}
        return round($size, $precision).['B','kB','MB','GB','TB','PB','EB','ZB','YB'][$i];
    }

    public function getKeyWordAttribute()
    {
        $keywords = explode(',', $this->attribute['keywords']);
        return $keywords;
    }
}