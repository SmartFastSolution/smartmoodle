<?php

namespace App;
use App\Nivel;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nombre','paralelo','estado'

    ];

    public function nivel(){
          
        return $this->belongsTo('App\Nivel');

    }

    public function roles(){
          
        return $this->belongsToMany('App\Materia')->withTimestamps();

    }

}
