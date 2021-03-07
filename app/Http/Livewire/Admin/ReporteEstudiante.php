<?php

namespace App\Http\Livewire\Admin;

use App\Curso;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class ReporteEstudiante extends Component
{
	use WithPagination;
	protected $paginationTheme = 'bootstrap';
	protected $queryString = [
        'page' => ['except' => 1],
    ];
	// public $talleres  = [];
    public $curso     = '';
    public $cursos  = [];

    public $nombre    = '';
    public $apellido = '';
    public $estado   = '';
    public $usuario   = '';
    public $materia   = '';
    public $instituto = '';
    public $correo = '';
    public $unidad    = '';
    public $perPage   = 10;
    public function render()
    {
        $this->cursos = Curso::get();
        
    	 $estudiantes = User::join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('institutos', 'users.instituto_id', '=', 'institutos.id')
                 ->leftJoin('assignments', 'users.id', '=', 'assignments.user_id')
                 ->leftJoin('assignment_materia', 'assignments.id', '=', 'assignment_materia.assignment_id')
                 ->leftJoin('distribucionmacus', 'users.distribucionmacu_id', '=', 'distribucionmacus.id')
                ->leftJoin('cursos', 'distribucionmacus.curso_id', '=', 'cursos.id')
                ->leftJoin('nivels', 'users.nivel_id', '=', 'nivels.id')
                ->leftJoin('materias', 'assignment_materia.materia_id', '=', 'materias.id')
                ->where('users.name', 'like', '%'.$this->nombre.'%')
                ->where('users.apellido', 'like', '%'.$this->apellido.'%')
                ->where('institutos.nombre', 'like', '%'.$this->instituto.'%')
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
                    if ($this->materia !== '') {
                       $query->where('materias.nombre', 'like', '%'.$this->materia.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->estado !== '') {
                       $query->where('users.estado', 'like', '%'.$this->estado.'%');    
                    }
                 })
                ->where('role_user.role_id', 2)
                ->select('users.name as user_nombre','users.apellido as user_apellido', 'users.email','users.access_at','cursos.nombre as nombre_curso' ,'materias.nombre as nombre_materia', 'nivels.nombre as paralelo', 'institutos.nombre as instituto', 'users.estado')
                ->paginate($this->perPage);

        return view('livewire.admin.reporte-estudiante',[
        	'estudiantes' => $estudiantes
        ]);
    }
         public function exportarExcel()
    {
     $estudiantes = User::join('role_user', 'users.id', '=', 'role_user.user_id')
                ->join('institutos', 'users.instituto_id', '=', 'institutos.id')
                 ->leftJoin('assignments', 'users.id', '=', 'assignments.user_id')
                 ->leftJoin('assignment_materia', 'assignments.id', '=', 'assignment_materia.assignment_id')
                 ->leftJoin('distribucionmacus', 'users.distribucionmacu_id', '=', 'distribucionmacus.id')
                ->leftJoin('cursos', 'distribucionmacus.curso_id', '=', 'cursos.id')
                ->leftJoin('nivels', 'users.nivel_id', '=', 'nivels.id')
                ->leftJoin('materias', 'assignment_materia.materia_id', '=', 'materias.id')
                ->where('users.name', 'like', '%'.$this->nombre.'%')
                ->where('users.apellido', 'like', '%'.$this->apellido.'%')
                ->where('institutos.nombre', 'like', '%'.$this->instituto.'%')
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
                    if ($this->materia !== '') {
                       $query->where('materias.nombre', 'like', '%'.$this->materia.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->estado !== '') {
                       $query->where('users.estado', 'like', '%'.$this->estado.'%');    
                    }
                 })
                ->where('role_user.role_id', 2)
                ->select('users.name as user_nombre','users.apellido as user_apellido', 'users.email','users.access_at','cursos.nombre as nombre_curso' ,'materias.nombre as nombre_materia', 'nivels.nombre as paralelo', 'institutos.nombre as instituto', 'users.estado')
                ->get();

    	$this->emit('estudiantes',['estudiantes' => $estudiantes]);
    	// return (new ProductsExport(2018))->download('products.xlsx');
    }
}
