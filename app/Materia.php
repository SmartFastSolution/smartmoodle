<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'nombre','descripcion','estado'

    ];

    public function contenidos(){
          
        return $this->hasMany('App\Contenido');

    }



    public function roles(){
          
        return $this->belongsToMany('App\Curso')->withTimestamps();

    }

}
