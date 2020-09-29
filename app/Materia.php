<?php

namespace App;

use App\Distribucionmacu;
use App\Contenido;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'nombre','slug','descripcion','estado'

    ];


    public function tallers(){
          
        return $this->hasMany('App\Taller');
    }


    public function contenidos(){
          
        return $this->hasMany('App\Contenido');
    }


    public function distribucionmacus(){

        return $this->belongsToMany(Distribucionmacu::class)->withTimestamps();

    }


    

}
