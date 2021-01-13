<?php

namespace App;

use App\Contenido;
use App\Distribuciondo;
use App\Distribucionmacu;
use App\Instituto;
use Illuminate\Database\Eloquent\Model;
use Neurony\Duplicate\Options\DuplicateOptions;
use Neurony\Duplicate\Traits\HasDuplicates;

class Materia extends Model
{
    use HasDuplicates;
    protected $fillable = [
        'nombre','slug','descripcion','estado'

    ];
     public function getDuplicateOptions(): DuplicateOptions
    {
        return DuplicateOptions::instance()
        ->excludeRelations('distribucionmacus', 'instituto', 'distribuciondos');
    }

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

    public function assignments(){

        return $this->belongsToMany(Assignment::class)->withPivot('materia_id')->withTimestamps();

    }
    

}
