<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $fillable = [
        'name', 'slug', 'descripcion'
    ];

    public function roles(){

        return $this->belongsToMany('App\Roles')->withTimestamps();

    }
}
