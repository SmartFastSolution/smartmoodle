<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TallerAbreviaturaRe extends Model
{
        public function Tallers(){

        return $this->belongsToMany('App\Taller');
    }
    
     public function Users(){

        return $this->belongsToMany('App\User');
    }
    public function tallerAbreviaDatosRe(){

        return $this->hasMany('App\TallerAbreviaturaDatoRe');
    }
}
