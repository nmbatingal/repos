<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FundingAgency extends Model
{

    protected $table = "funding_agencies";
    public $timestamps = false;

    protected $fillable = [
        'funding_agency',
    ];

    public function researchArticle()
    {
        return $this->belongsTo('App\ResearchArticle', 'access_type_id');
    }
}
