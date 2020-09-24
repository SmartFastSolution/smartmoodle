<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TallerAbreviaturaDatoRe extends Model
{
     public function tallerAbreviaRe(){

        return $this->belongsTo('App\TallerAbreviaturaRe');
    }
}
