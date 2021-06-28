<?php

namespace App\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class DiarioGeneral extends Model
{
    protected $fillable = [
        'user_id',
        'taller_id',
        'enunciado',
        'nombre',
        'total_debe',
        'total_haber',
        'completado',
        'datos',
    ];
    public function taller()
    {
        return $this->belongsTo('App\Taller');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function bInical()
    {
        return $this->belongsTo('App\Contabilidad\BalanceInicial');
    }
    public function dgRegistro()
    {
        return $this->hasMany('App\Contabilidad\DGRegistro');
    }
}
