<?php

namespace App\Http\Livewire\Admin;

use App\Modelos\Role;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class ReporteUsuarios extends Component
{
        use WithPagination;
    protected $listeners = ['desbloquear'];

    public $show            = true;
        
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'page' => ['except' => 1],
    ];
    public $curso     = '';
    public $roles     = [];
    public $nombre    = '';
    public $apellido  = '';
    public $estado    = '';
    public $usuario   = '';
    public $rol       = '';
    public $instituto = '';
    public $correo    = '';
    public $unidad    = '';
    public $perPage   = 10;
    public function render()
    {
        $this->roles = Role::get();
         $usuarios = User::join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->leftJoin('institutos', 'users.instituto_id', '=', 'institutos.id')
                ->where('users.name', 'like', '%'.$this->nombre.'%')
                ->where('users.apellido', 'like', '%'.$this->apellido.'%')
                ->where('users.email', 'like', '%'.$this->correo.'%')
                  ->where(function ($query) {
                    if ($this->instituto !== '') {
                       $query->where('institutos.nombre', 'like', '%'.$this->instituto.'%');    
                    }
                 })
                  ->where(function ($query) {
                    if ($this->curso !== '') {
                       $query->where('cursos.nombre', 'like', '%'.$this->curso.'%');    
                    }
                 })
                    ->where(function ($query) {
                    if ($this->correo !== '') {
                       $query->where('users.email', 'like', '%'.$this->correo.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->estado !== '') {
                       $query->where('users.estado', 'like', '%'.$this->estado.'%');    
                    }
                 })
                    ->where(function ($query) {
                    if ($this->rol !== '') {
                       $query->where('roles.name', 'like', '%'.$this->rol.'%');    
                    }
                 })
                ->select('users.name as user_nombre','roles.name as role_name','users.apellido as user_apellido','users.email','users.access_at','institutos.nombre as instituto', 'users.estado')
                ->paginate($this->perPage);

        return view('livewire.admin.reporte-usuarios',[
        'usuarios' =>   $usuarios 
        ]);
    }

             public function exportarExcel()
    {
      $this->show = false;

     $usuarios = User::join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->leftJoin('institutos', 'users.instituto_id', '=', 'institutos.id')
                 ->where('users.name', 'like', '%'.$this->nombre.'%')
                ->where('users.apellido', 'like', '%'.$this->apellido.'%')
                ->where('users.email', 'like', '%'.$this->correo.'%')
                  ->where(function ($query) {
                    if ($this->instituto !== '') {
                       $query->where('institutos.nombre', 'like', '%'.$this->instituto.'%');    
                    }
                 })
                  ->where(function ($query) {
                    if ($this->curso !== '') {
                       $query->where('cursos.nombre', 'like', '%'.$this->curso.'%');    
                    }
                 })
                    ->where(function ($query) {
                    if ($this->correo !== '') {
                       $query->where('users.email', 'like', '%'.$this->correo.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->estado !== '') {
                       $query->where('users.estado', 'like', '%'.$this->estado.'%');    
                    }
                 })
                    ->where(function ($query) {
                    if ($this->rol !== '') {
                       $query->where('roles.name', 'like', '%'.$this->rol.'%');    
                    }
                 })
                ->select('users.name as user_nombre','roles.name as role_name','users.apellido as user_apellido','users.email','users.access_at','institutos.nombre as instituto', 'users.estado')
                ->get();

        $this->emit('usuarios',['usuarios' => $usuarios]);
    }
         public function desbloquear()
    {
      $this->show = true;
    }
}
