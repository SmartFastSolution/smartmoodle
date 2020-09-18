<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    protected $fillable = [
        'nombre','descripcion','estado','documentod'

    ];

    public function materia(){
          
        return $this->belongsTo('App\Materia');

    }
}
