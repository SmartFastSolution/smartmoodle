<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // public function __construct()
    // {
    //     $this->middleware('estudiante');
    //     $this->middleware('docente');
    // }

    public function index (){

        $alumnos = DB::table('users')
        ->join('role_user', 'role_user.user_id', '=', 'users.id')
        ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->where('users.estado', 'on')
        ->where('descripcion', 'estudiante')
        ->count();

        $docente = DB::table('users')
        ->join('role_user', 'role_user.user_id', '=', 'users.id')
        ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->where('users.estado', 'on')
        ->where('descripcion', 'docente')
        ->count();
        
    return view('welcome',compact('alumnos','docente'));
       
    }
     
 
    

}