<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TallerUtilizarAbreRe extends Model
{
      public function Tallers(){

        return $this->belongsToMany('App\Taller');
    }
    
     public function Users(){

        return $this->belongsToMany('App\User');
    }
}