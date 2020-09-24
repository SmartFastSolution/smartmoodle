<?php

namespace App;

use App\Nivel;
use App\Distribucionmacu;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{

    protected $guarded= [];

    protected $fillable = [
        'nombre','paralelo','estado',

    ];

      

    public function nivel(){
          
        return $this->belongsTo('App\Nivel');

    }

    public function distribucionmacus(){
          
        return $this->hasMany('App\Distribucionmacu');

    }
  
   
}
