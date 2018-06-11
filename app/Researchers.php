<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Researchers extends Model
{
    protected $table = 'researchers';

    protected $fillable = [
        'research_id', 'author_id',
    ];

    public function authors()
    {
    	return $this->belongsToMany('App\User');
    }
}
