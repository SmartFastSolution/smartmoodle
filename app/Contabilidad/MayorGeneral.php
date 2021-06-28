<?php

namespace App\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class MayorGeneral extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'registros', 'taller_id', 'user_id'];
    public function taller()
    {
        return $this->belongsTo('App\Taller');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function mgRegistro()
    {
        return $this->hasMany('App\Contabilidad\MGRegistro');
    }
}
