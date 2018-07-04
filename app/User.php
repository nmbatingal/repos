<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    // use Searchable;
    use Uuids;

    protected $connection = "user_connection";
    protected $table      = "users";
    public $incrementing  = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'firstname', 
        'middlename',
        'lastname',
        'email',
        'mobile',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'password', 'remember_token',
    ];

    public function searchableAs()
    {
        return 'users_index';
    }
}
