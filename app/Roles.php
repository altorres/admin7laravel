<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //es
    protected $fillable = [
        'name', 'slug', 'descripcion','full-access'
    ];

    public function users(){

        return $this->belongsToMany('App\User')->withTimestamps();

    }

    public function permisos(){

        return $this->belongsToMany('App\Permiso')->withTimestamps();

    }

}
