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

    protected $casts = [
        'status' => 'boolean',
    ];

    protected $fillable = [
        'title',                
        'authors',
        'project_duration',         // nullable         
        'funding_agency',           // nullable
        'project_cost',             // nullable                  
        'research_content',                  
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
        'authors' => [
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
        'research_content' => [
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
        'created_at' => [
          'type' => 'date',
          'format' => "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis",
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

    // Get research posted on
    public function getPostedOnAttribute()
    {
        if ( $this->attributes['created_at'] != $this->attributes['updated_at'] ) 
        {
            return $this->attributes['updated_at'];
        }

        return $this->attributes['created_at'];
    }

    // Beautify posted on date M d, Y
    public function getDatePostedOnAttribute()
    {
        return date("F d, Y", strtotime( $this->posted_on ));
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
}