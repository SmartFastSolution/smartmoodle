<?php

namespace App;

use App\Instituto;
use App\Distribucionmacu;
use App\Contenido;
use App\Distribuciondo;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = [
        'nombre','slug','descripcion','estado'

    ];


    // public function tallers(){
          
    //     return $this->hasMany('App\Taller');
    // }


    public function contenidos(){
          
        return $this->hasMany('App\Contenido');
    }


    public function distribucionmacus(){

        return $this->belongsToMany(Distribucionmacu::class)->withPivot('materia_id')->withTimestamps();

    }


    public function instituto(){
          
        return $this->belongsTo('App\Instituto');

    }

    
    public function distribuciondos(){

        return $this->belongsToMany(Distribuciondo::class)->withPivot('materia_id')->withTimestamps();

    }
    

}
