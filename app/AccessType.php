<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessType extends Model
{
    protected $table = "access_types";
    public $timestamps = false;

    protected $fillable = [
        'access_type',
    ];

    public function researchArticle()
    {
        return $this->belongsTo('App\ResearchArticle', 'access_type_id');
    }
}
