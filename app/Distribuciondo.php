<?php

namespace App;
use App\User;
use App\Materia;
use Illuminate\Database\Eloquent\Model;

class Distribuciondo extends Model
{
    protected $fillable = [
        
        'estado',
     ];

     public function user(){
          
        return $this->belongsTo('App\User');

    }
     public function instituto(){
          
        return $this->belongsTo('App\Instituto');

    }

     public function materias(){
         
        return $this->belongsToMany(Materia::class)->withPivot('distribuciondo_id')->withTimestamps();
    }
    




}



