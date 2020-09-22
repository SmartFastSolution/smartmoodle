<?php

namespace App;

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

    

}
