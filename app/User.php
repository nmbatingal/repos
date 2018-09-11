<?php

namespace App;

use Elasticquent\ElasticquentTrait;
use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Uuids;
    use ElasticquentTrait;

    protected $table         = "users";
    public    $incrementing  = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'firstname', 
        'middlename',
        'lastname',
        'email',
        'mobile',
        'password',
        'isactive',
    ];

    protected $mappingProperties = [
        'username' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'firstname' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'middlename' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'lastname' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'email' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'mobile' => [
          'type' => 'text',
          'analyzer' => 'standard',
        ],
        'isactive' => [
          'type' => 'boolean',
        ],
        'created_at' => [
          'type' => 'date',
          'format' => "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis",
        ],
        'updated_at' => [
          'type' => 'date',
          'format' => "yyyy-MM-dd HH:mm:ss||yyyy-MM-dd||epoch_millis",
        ],
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'password', 'remember_token', 'isactive',
    ];

    public function getIndexName()
    {
        return $this->table;
    }

    public function getTypeName()
    {
        return 'users';
    }
}
