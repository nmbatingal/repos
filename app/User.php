<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Uuids;

    protected $table         = "users";
    public    $incrementing  = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'name', 
        'firstname', 
        'middlename',
        'lastname',
        'email',
        'mobile',
        'password',
        'isactive',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'password', 'remember_token', 'isactive',
    ];

    public function searchableAs()
    {
        return 'users_index';
    }
}
