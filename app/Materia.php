<?php

namespace App;

use App\Distribucionmacu;
use App\Contenido;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'nombre','descripcion','estado'

    ];
      
    public function contenidos(){
          
        return $this->hasMany('App\Contenido');
    }


    public function distribucionmacus(){
          
        return $this->belongsToMany(Distribucionmacu::class)->withTimestamps();

    }


    

}
