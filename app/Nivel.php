<?php

namespace App;
use App\Curso;
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

}
