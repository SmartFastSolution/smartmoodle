<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'nombre','descripcion','estado'

    ];

    public function tallers(){
          
        return $this->hasMany('App\Taller');

    }

}
