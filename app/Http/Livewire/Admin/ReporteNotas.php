<?php

namespace App\Http\Livewire\Admin;

use App\Curso;
use App\Materia;
use App\Nivel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ReporteNotas extends Component
{
	 use WithPagination;
    protected $listeners = ['desbloquear'];
  protected $paginationTheme = 'bootstrap';
  protected $queryString = [
        'page' => ['except' => 1],
    ];
		public $cursos       = [];
		public $nivels       = [];
		public $curso        = '';
		public $paralelo     = '';
		public $nombre       = '';
		public $apellido     = '';
		public $nivel        = '';
		public $taller       = '';
		public $materia      = '';
		public $instituto    = '';
		public $calificacion = '';
		public $unidad       = '';
		public $perPage      = 10;
		public $show         = true;

    public function render()
    {	
        $this->cursos = Curso::get();
        $this->nivels = Nivel::get();

    	  $talleres = DB::table('tallers')
            ->join('taller_user', 'tallers.id', '=', 'taller_user.taller_id')
            ->join('users', 'users.id', '=', 'taller_user.user_id')
            ->join('distribucionmacus', 'distribucionmacus.id', '=', 'users.distribucionmacu_id')
            ->join('cursos', 'cursos.id', '=', 'distribucionmacus.curso_id')
            ->join('nivels', 'users.nivel_id', '=', 'nivels.id')
            ->join('contenidos', 'contenidos.id', '=', 'tallers.contenido_id')
            ->join('materias', 'materias.id', '=', 'contenidos.materia_id')
            ->join('institutos', 'institutos.id', '=', 'materias.instituto_id')
            ->where('users.name', 'like', '%'.$this->nombre.'%')
            ->where('users.apellido', 'like', '%'.$this->apellido.'%')
            ->where('institutos.nombre', 'like', '%'.$this->instituto.'%')
            ->where('taller_user.status', 'calificado')
            ->where(function ($query) {
                    if ($this->curso !== '') {
                       $query->where('cursos.nombre', 'like', '%'.$this->curso.'%');    
                    }
                 })
            ->where(function ($query) {
                    if ($this->unidad !== '') {
                       $query->where('contenidos.nombre', 'like', '%'.$this->unidad.'%');    
                    }
                 })
           	->where(function ($query) {
                    if ($this->materia !== '') {
                       $query->where('materias.nombre', 'like', '%'.$this->materia.'%');    
                    }
                 })
           	->where(function ($query) {
                    if ($this->paralelo !== '') {
                       $query->where('nivels.nombre', 'like', '%'.$this->paralelo.'%');    
                    }
                 })
           	->where(function ($query) {
                    if ($this->taller !== '') {
                       $query->where('tallers.nombre', 'like', '%'.$this->taller.'%');    
                    }
                 })
           	->where(function ($query) {
                    if ($this->calificacion !== '') {
                       $query->where('taller_user.calificacion', 'like', '%'.$this->calificacion.'%');    
                    }
                 })
            ->select('tallers.*','taller_user.calificacion','cursos.nombre as nombre_curso', 'nivels.nombre as paralelo','materias.nombre as nombre_materia', 'contenidos.nombre as unidad','users.name as alumno', 'users.apellido as apelli',  'institutos.nombre as instituto')
            ->paginate($this->perPage);

            // dd($talleres);

        return view('livewire.admin.reporte-notas',['talleres' => $talleres]);
    }

        public function exportarExcel()
    {
      $this->show = false;

        $talleres = DB::table('tallers')
            ->join('taller_user', 'tallers.id', '=', 'taller_user.taller_id')
            ->join('users', 'users.id', '=', 'taller_user.user_id')
            ->join('distribucionmacus', 'distribucionmacus.id', '=', 'users.distribucionmacu_id')
            ->join('cursos', 'cursos.id', '=', 'distribucionmacus.curso_id')
            ->join('nivels', 'users.nivel_id', '=', 'nivels.id')
            ->join('contenidos', 'contenidos.id', '=', 'tallers.contenido_id')
            ->join('materias', 'materias.id', '=', 'contenidos.materia_id')
            ->join('institutos', 'institutos.id', '=', 'materias.instituto_id')
            ->where('users.name', 'like', '%'.$this->nombre.'%')
            ->where('users.apellido', 'like', '%'.$this->apellido.'%')
            ->where('institutos.nombre', 'like', '%'.$this->instituto.'%')
            ->where('taller_user.status', 'calificado')
            ->where(function ($query) {
                    if ($this->curso !== '') {
                       $query->where('cursos.nombre', 'like', '%'.$this->curso.'%');    
                    }
                 })
            ->where(function ($query) {
                    if ($this->unidad !== '') {
                       $query->where('contenidos.nombre', 'like', '%'.$this->unidad.'%');    
                    }
                 })
           	->where(function ($query) {
                    if ($this->materia !== '') {
                       $query->where('materias.nombre', 'like', '%'.$this->materia.'%');    
                    }
                 })
           	->where(function ($query) {
                    if ($this->paralelo !== '') {
                       $query->where('nivels.nombre', 'like', '%'.$this->paralelo.'%');    
                    }
                 })
           	->where(function ($query) {
                    if ($this->taller !== '') {
                       $query->where('tallers.nombre', 'like', '%'.$this->taller.'%');    
                    }
                 })
           	->where(function ($query) {
                    if ($this->calificacion !== '') {
                       $query->where('taller_user.calificacion', 'like', '%'.$this->calificacion.'%');    
                    }
                 })
            ->select('tallers.*','taller_user.calificacion','cursos.nombre as nombre_curso', 'nivels.nombre as paralelo','materias.nombre as nombre_materia', 'contenidos.nombre as unidad','users.name as alumno', 'users.apellido as apelli',  'institutos.nombre as instituto')
            ->get();


      $this->emit('notas',['notas' => $talleres]);
      // return (new ProductsExport(2018))->download('products.xlsx');
    }
         public function desbloquear()
    {
      $this->show = true;
    }
}
