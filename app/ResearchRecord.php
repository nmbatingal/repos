<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchRecord extends Model
{
    protected $table = 'research_records';

    protected $fillable = [
        'title', 
        'alternate_title',
        'abstract',
        'publication_type',
        'pages',
        'keywords',
        'created_by_id',
        'authors',
        'file_attachment',
    ];

    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by_id', 'id');
    }
}
