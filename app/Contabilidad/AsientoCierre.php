<?php

namespace App\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class AsientoCierre extends Model
{
    protected $fillable = [
        'user_id',
        'taller_id',
        'nombre',
        'total_debe',
        'total_haber',
        'registros',
    ];
    public function taller()
    {
        return $this->belongsTo('App\Taller');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function acRegistro()
    {
        return $this->hasMany('App\Contabilidad\ACRegistro');
    }
}
