<?php

namespace App;

use Elasticquent\ElasticquentTrait;
use Illuminate\Database\Eloquent\Model;

class ResearchRecord extends Model
{
    use Uuids;
    use ElasticquentTrait;

    public $incrementing = false;
    protected $table = 'research_records';

    protected $fillable = [
        'title', 
        'alternate_title',
        'abstract',
        'publication_type',
        'publication_date',
        'pages',
        'keywords',
        'created_by_id',
        'authors',
        'filename',
        'filesize',
    ];

    protected $mappingProperties = [
        'title' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
        'abstract' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
        'keywords' => [
          'type' => 'text',
          "analyzer" => "standard",
        ],
    ];

    public function getIndexName()
    {
        return 'research';
    }

    public function getTypeName()
    {
        return 'research_type';
    }

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by_id', 'id');
    }
}
