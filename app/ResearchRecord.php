<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchRecord extends Model
{
    use Uuids;

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

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by_id', 'id');
    }
}
