<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class TallerCompletarEnunciado extends Model
{
    public function Tallers(){

        return $this->belongsToMany('App\Taller');
    }
}
