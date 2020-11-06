<?php

namespace App;
use App\Curso;
use App\Distribucionmacu;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $fillable = [
        'nombre',
        'estado',
    ];

    public function cursos(){
          
        return $this->hasMany('App\Curso');

    }
    public function distribucionmacus(){
        
        return $this->hasMany('App\Distribucionmacu');

    }

    public function distrimas(){
        
        return $this->hasMany('App\Distrima');

    }

}
