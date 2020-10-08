<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class TallerDefinirEnunciado extends Model
{
    public function Taller(){

        return $this->belongsTo('App\Taller');
    }
    public function TallerDefinirEnunOp(){

        return $this->hasMany('App\Admin\TallerDefinirEnunOp');
    }
}
