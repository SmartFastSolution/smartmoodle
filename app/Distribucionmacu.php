<?php

namespace App;
use App\Materia;
use App\Curso;
use App\Nivel;
use App\Distrima;
use Illuminate\Database\Eloquent\Model;

class Distribucionmacu extends Model
{


    protected $fillable = [
        
       'estado',
    ];

 public function materias(){
         
        return $this->belongsToMany(Materia::class)->withPivot('distribucionmacu_id', 'materia_id')->withTimestamps();
    }
    

    public function curso(){
          
        return $this->belongsTo('App\Curso');

    }
    
    public function instituto(){
          
        return $this->belongsTo('App\Instituto');

    }
    public function users()
    {
        return $this->hasManyThrough('App\User', 'App\Distrima');
    }

    public function nivel(){
        
        return $this->belongsTo('App\Nivel');

    }
  
    public function distrimas(){
          
        return $this->hasMany('App\Distrima');

    }
  

}