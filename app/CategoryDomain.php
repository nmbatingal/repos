<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryDomain extends Model
{
    protected $table = "category_domains";
    public $timestamps = false;

    protected $fillable = [
        'category_domain',
        'category_field_id',
    ];

    public function researchArticle()
    {
        return $this->belongsTo('App\ResearchArticle', 'category_domain');
    }

    public function categoryField()
    {
        return $this->belongsTo('App\CategoryField', 'category_field_id');
    }
    
    public function categorySubdomains()
    {
        return $this->hasMany('App\CategorySubdomain', 'category_domain_id');
    }
}
