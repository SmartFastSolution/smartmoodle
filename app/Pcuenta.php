<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcuenta extends Model
{
    protected $fillable = [
        'tpcuenta','cuenta','estado',
    ];
}
