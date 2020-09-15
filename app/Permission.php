<?php

namespace App;

use App\Modelos\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'namep','descripcionp','estado',
    ];


    public function roles(){
          
        return $this->belongsToMany(Role::class)->withTimestamps();

    }
}
