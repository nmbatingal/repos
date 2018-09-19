<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySubdomain extends Model
{
    protected $table = "category_subdomains";
    public $timestamps = false;

    protected $fillable = [
        'category_subdomain',
        'category_domain_id',
    ];

    public function researchArticle()
    {
        return $this->belongsTo('App\ResearchArticle', 'category_subdomain');
    }

    public function categoryDomain()
    {
        return $this->belongsTo('App\CategoryDomain', 'category_domain_id');
    }

    // relates to ResearchArticle
    public function researcharticles()
    {
        return $this->hasMany('App\ResearchArticle', 'category_subdomain_id');
    }

    public function scopeOfCategory($query)
    {
        return $query->with('categoryDomain.categoryField');
    }
}
