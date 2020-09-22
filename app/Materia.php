<?php

namespace App;

use App\Curso;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'nombre','descripcion','estado'

    ];


    public function cursos(){
          
        return $this->belongsToMany('App\Curso')->withTimestamps();

    }
    
    public function contenidos(){
          
        return $this->hasMany('App\Contenido');

    }

    

}
