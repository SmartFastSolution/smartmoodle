<?php

namespace App;
use App\Materia;
use App\Curso;
use Illuminate\Database\Eloquent\Model;

class Distribucionmacu extends Model
{


    protected $fillable = [
        
        'descripcion', 'estado',
    ];

 public function materias(){
         
        return $this->belongsToMany(Materia::class)->withTimestamps();
    }
    

    public function curso(){
          
        return $this->belongsTo('App\Curso');

    }

}
