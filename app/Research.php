<?php

namespace App;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    use Uuids;
    use ElasticquentTrait;

    public $incrementing = false;
    protected $table = 'researches';

    protected $fillable = [
        'title',                
        'authors',
        'project_duration',         // nullable         
        'funding_agency',           // nullable
        'project_cost',             // nullable                  
        'abstract',                  
        'filename',                 // nullable
        'filesize',                 // nullable
        'keywords',
        'log_id',                   // nullable
        'status',                   // nullable  
    ];

    protected $mappingProperties = [
        'title' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'project_duration' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'funding_agency' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'project_cost' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'abstract' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'keywords' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'status' => [
          'type' => 'boolean',
        ],
        'updated_at' => [
          'type' => 'date',
          'format' => "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis",
        ],
    ];

    public function getIndexName()
    {
        return $this->table;
    }

    public function getTypeName()
    {
        return 'research';
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by_id', 'id');
    }
}