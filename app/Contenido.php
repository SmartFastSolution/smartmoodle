<?php

namespace App;
use App\Materia;
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
