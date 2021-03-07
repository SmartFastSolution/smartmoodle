<?php

namespace App\Http\Livewire\Admin;

use App\Curso;
use App\Materia;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class ReporteDocentes extends Component
{
   	use WithPagination;
	protected $paginationTheme = 'bootstrap';
	protected $queryString = [
        'page' => ['except' => 1],
    ];
    public $curso       = '';
    public $cursos  = [];

    public $nombre      = '';
    public $apellido    = '';
    public $estado      = '';
    public $usuario     = '';
    public $materia     = '';
    public $instituto   = '';
    public $unidad      = '';
    public $perPage     = 10;
    public function render()
    {
        $this->cursos = Curso::get();
        
     $docentes = User::join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('institutos', 'users.instituto_id', '=', 'institutos.id')
                ->leftJoin('distribuciondos', 'users.id', '=', 'distribuciondos.user_id')
                ->leftJoin('distribucionmacu_materia', 'distribuciondos.materia_id', '=', 'distribucionmacu_materia.materia_id')
                ->leftJoin('distribucionmacus', 'distribucionmacu_materia.distribucionmacu_id', '=', 'distribucionmacus.id')
                ->leftJoin('cursos', 'distribucionmacus.curso_id', '=', 'cursos.id')
                ->leftJoin('materias', 'distribucionmacu_materia.materia_id', '=', 'materias.id')
                ->where('users.name', 'like', '%'.$this->nombre.'%')
                ->where('users.apellido', 'like', '%'.$this->apellido.'%')
                ->where('institutos.nombre', 'like', '%'.$this->instituto.'%')
                ->where(function ($query) {
                    if ($this->curso !== '') {
                       $query->where('cursos.nombre', 'like', '%'.$this->curso.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->materia !== '') {
                       $query->where('materias.nombre', 'like', '%'.$this->materia.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->estado !== '') {
                       $query->where('users.estado', 'like', '%'.$this->estado.'%');    
                    }
                 })
                ->where('role_user.role_id', 3)
                ->select('distribuciondos.*','users.name as user_nombre','users.apellido as user_apellido','users.estado','users.access_at','cursos.nombre as nombre_curso' ,'materias.nombre as nombre_materia', 'institutos.nombre as instituto')  
                ->paginate($this->perPage);
        return view('livewire.admin.reporte-docentes',[
        	'docentes' => $docentes
        ]);
    }

        public function exportarExcel()
    {
        $docentes = User::join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('institutos', 'users.instituto_id', '=', 'institutos.id')
                ->leftJoin('distribuciondos', 'users.id', '=', 'distribuciondos.user_id')
                ->leftJoin('distribucionmacu_materia', 'distribuciondos.materia_id', '=', 'distribucionmacu_materia.materia_id')
                ->leftJoin('distribucionmacus', 'distribucionmacu_materia.distribucionmacu_id', '=', 'distribucionmacus.id')
                ->leftJoin('cursos', 'distribucionmacus.curso_id', '=', 'cursos.id')
                ->leftJoin('materias', 'distribucionmacu_materia.materia_id', '=', 'materias.id')
                ->where('users.name', 'like', '%'.$this->nombre.'%')
                ->where('institutos.nombre', 'like', '%'.$this->instituto.'%')
                ->where('users.apellido', 'like', '%'.$this->apellido.'%')
                ->where(function ($query) {
                    if ($this->curso !== '') {
                       $query->where('cursos.nombre', 'like', '%'.$this->curso.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->materia !== '') {
                       $query->where('materias.nombre', 'like', '%'.$this->materia.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->estado !== '') {
                       $query->where('users.estado', 'like', '%'.$this->estado.'%');    
                    }
                 })
                ->where('role_user.role_id', 3)
                ->select('distribuciondos.*','users.name as user_nombre','users.apellido as user_apellido','users.estado','users.access_at','cursos.nombre as nombre_curso' ,'materias.nombre as nombre_materia', 'institutos.nombre as instituto')  
                ->get();
    	       $this->emit('docentes',['docentes' => $docentes]);
    }
}
