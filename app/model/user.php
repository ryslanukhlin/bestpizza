<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class user extends Authenticatable
{
    protected $table = "user";

    protected $fillable = [
        'name' , 'email' , 'password'
    ];

    public function getName()
    {
        return $this->name;
    }
}
