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
        ],
        'project_duration' => [
          'type' => 'text',
        ],
        'funding_agency' => [
          'type' => 'text',
        ],
        'project_cost' => [
          'type' => 'text',
        ],
        'abstract' => [
          'type' => 'text',
        ],
        'keywords' => [
          'type' => 'text',
        ],
        'status' => [
          'type' => 'boolean',
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