<?php

namespace App\Http\Livewire\Admin;

use App\Curso;
use App\Nivel;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;

class ReporteAlumnos extends Component
{
		use WithPagination;
    protected $listeners = ['desbloquear'];
	protected $paginationTheme = 'bootstrap';
	protected $queryString = [
        'page' => ['except' => 1],
    ];
  public $curso           = '';
  public $cursos          = [];
  public $nivels          = [];
  public $nombre          = '';
  public $apellido        = '';
  public $alumno_nombre   = '';
  public $alumno_apellido = '';
  public $paralelo        = '';
  public $usuario         = '';
  public $materia         = '';
  public $instituto       = '';
  public $unidad          = '';
  public $perPage         = 10;
  public $show            = true;
    public function render()
    {
        $this->cursos = Curso::get();
        $this->nivels = Nivel::get();

    	    $alumnos = User::join('role_user', 'users.id', '=', 'role_user.user_id')
   				->join('institutos', 'users.instituto_id', '=', 'institutos.id')
                ->join('distribuciondos', 'users.id', '=', 'distribuciondos.user_id')
                ->leftJoin('distribuciondo_nivel', 'distribuciondos.id', '=', 'distribuciondo_nivel.distribuciondo_id')
                ->leftJoin('materias', 'distribuciondos.materia_id', '=', 'materias.id')
                ->leftJoin('assignment_materia', 'materias.id', '=', 'assignment_materia.materia_id')
                ->join('users as estudiantes', function ($join) {
                    $join->on('distribuciondo_nivel.nivel_id', '=', 'estudiantes.nivel_id')
                        ->on('assignment_materia.user_id', '=', 'estudiantes.id');
                })
                ->leftJoin('distribucionmacus', 'estudiantes.distribucionmacu_id', '=', 'distribucionmacus.id')
                ->leftJoin('cursos', 'distribucionmacus.curso_id', '=', 'cursos.id')
                ->where(function ($query) {
                    if ($this->instituto !== '') {
                       $query->where('institutos.nombre', 'like', '%'.$this->instituto.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->nombre !== '') {
                       $query->where('users.name', 'like', '%'.$this->nombre.'%');    
                    }
                 })
                 ->where(function ($query) {
                    if ($this->curso !== '') {
                       $query->where('cursos.nombre', 'like', '%'.$this->curso.'%');    
                    }
                 })       
               	->where(function ($query) {
                    if ($this->apellido !== '') {
                       $query->where('users.apellido', 'like', '%'.$this->apellido.'%');    
                    }
                 })
               	->where(function ($query) {
                    if ($this->materia !== '') {
                       $query->where('materias.nombre', 'like', '%'.$this->materia.'%');    
                    }
                 })
               	->where(function ($query) {
                    if ($this->alumno_nombre !== '') {
                       $query->where('estudiantes.name', 'like', '%'.$this->alumno_nombre.'%');    
                    }
                 })
               	->where(function ($query) {
                    if ($this->alumno_apellido !== '') {
                       $query->where('estudiantes.apellido', 'like', '%'.$this->alumno_apellido.'%');    
                    }
                 })
               	->where(function ($query) {
                    if ($this->paralelo !== '') {
                       $query->where('distribuciondo_nivel.nivel_nombre', 'like', '%'.$this->paralelo.'%');    
                    }
                 })
                ->select('users.name as docente_nombre','materias.nombre as materia','users.apellido as docente_apellido','estudiantes.name as estudiamte_nombre','cursos.nombre as curso','distribuciondo_nivel.nivel_nombre','estudiantes.apellido as estudiamte_apellido','institutos.nombre as instituto')  
                ->paginate($this->perPage);


        return view('livewire.admin.reporte-alumnos', [
        	'alumnos' => $alumnos
        ]);
    }
            public function exportarExcel()
    {
      $this->show = false;
      
		    $alumnos = User::join('role_user', 'users.id', '=', 'role_user.user_id')
   				->join('institutos', 'users.instituto_id', '=', 'institutos.id')
                ->join('distribuciondos', 'users.id', '=', 'distribuciondos.user_id')
                ->leftJoin('distribuciondo_nivel', 'distribuciondos.id', '=', 'distribuciondo_nivel.distribuciondo_id')
                ->leftJoin('materias', 'distribuciondos.materia_id', '=', 'materias.id')
                ->leftJoin('assignment_materia', 'materias.id', '=', 'assignment_materia.materia_id')
                ->join('users as estudiantes', function ($join) {
                    $join->on('distribuciondo_nivel.nivel_id', '=', 'estudiantes.nivel_id')
                    ->on('assignment_materia.user_id', '=', 'estudiantes.id');
                })
                ->leftJoin('distribucionmacus', 'estudiantes.distribucionmacu_id', '=', 'distribucionmacus.id')
                ->leftJoin('cursos', 'distribucionmacus.curso_id', '=', 'cursos.id')
                ->where(function ($query) {
                    if ($this->instituto !== '') {
                       $query->where('institutos.nombre', 'like', '%'.$this->instituto.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->nombre !== '') {
                       $query->where('users.name', 'like', '%'.$this->nombre.'%');    
                    }
                 })
                 ->where(function ($query) {
                    if ($this->curso !== '') {
                       $query->where('cursos.nombre', 'like', '%'.$this->curso.'%');    
                    }
                 })       
               	->where(function ($query) {
                    if ($this->apellido !== '') {
                       $query->where('users.apellido', 'like', '%'.$this->apellido.'%');    
                    }
                 })
               	->where(function ($query) {
                    if ($this->materia !== '') {
                       $query->where('materias.nombre', 'like', '%'.$this->materia.'%');    
                    }
                 })
               	->where(function ($query) {
                    if ($this->alumno_nombre !== '') {
                       $query->where('estudiantes.name', 'like', '%'.$this->alumno_nombre.'%');    
                    }
                 })
               	->where(function ($query) {
                    if ($this->alumno_apellido !== '') {
                       $query->where('estudiantes.apellido', 'like', '%'.$this->alumno_apellido.'%');    
                    }
                 })
               	->where(function ($query) {
                    if ($this->paralelo !== '') {
                       $query->where('estudiantes.apellido', 'like', '%'.$this->paralelo.'%');    
                    }
                 })
                ->select('users.name as docente_nombre','materias.nombre as materia','users.apellido as docente_apellido','estudiantes.name as estudiamte_nombre','cursos.nombre as curso','distribuciondo_nivel.nivel_nombre','estudiantes.apellido as estudiamte_apellido','institutos.nombre as instituto')   
                ->get();

    	$this->emit('alumnos',['alumnos' => $alumnos]);
    	// return (new ProductsExport(2018))->download('products.xlsx');
    }
    public function desbloquear()
    {
      $this->show = true;
    }
}
