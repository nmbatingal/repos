<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryField extends Model
{
    protected $table = "category_fields";
    public $timestamps = false;

    protected $fillable = [
        'category_field',
    ];

    public function researchArticle()
    {
        return $this->belongsTo('App\ResearchArticle', 'category_field');
    }

    public function categoryDomains()
    {
        return $this->hasMany('App\CategoryDomain', 'category_field_id');
    }
}
