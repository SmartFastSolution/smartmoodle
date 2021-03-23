<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Materia;
use App\Nivel;

class TalleresCalificados extends Component
{
	use WithPagination;
			protected $listeners = ['desbloquear'];
			protected $paginationTheme = 'bootstrap';
			protected $queryString = [
			        'page' => ['except' => 1],
			    ];
			public $nivel, $materia_id;
			public $show      = true;
			public $curso     = '';
			public $curso_nombre     = '';
			public $paralelo  = '';
			public $materia, $para;
			public $nombre    = '';
			public $apellido  = '';
			public $unidad    = '';
			public $taller    = '';
			public $enunciado = '';
			public $calificacion = '';
			public $perPage   = 10;

public function mount($nivel, $id)
	{
		$this->para = Nivel::find($nivel);
        $this->materia = Materia::with('instituto')->find($id);
        // $this->curso_nombre = Materia::with('distribucionmacus')->find($id); 
		$this->nivel      = $nivel;
		$this->materia_id = $id;
	}
    public function render()
    {
    	// dd($this->curso_nombre->distribucionmacus[0]->curso_id);
    	   	 $calificados = DB::table('tallers')
            ->join('taller_user', 'tallers.id', '=', 'taller_user.taller_id')
            ->join('users', 'users.id', '=', 'taller_user.user_id')
            ->join('distribucionmacus', 'distribucionmacus.id', '=', 'users.distribucionmacu_id')
            ->join('cursos', 'cursos.id', '=', 'distribucionmacus.curso_id')
            ->join('nivels', 'users.nivel_id', '=', 'nivels.id')
            ->join('contenidos', 'contenidos.id', '=', 'tallers.contenido_id')
            ->join('materias', 'materias.id', '=', 'contenidos.materia_id')
            ->where('contenidos.materia_id', $this->materia_id)
            ->where('users.nivel_id', $this->nivel)
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
                    if ($this->nombre !== '') {
                       $query->where('users.name', 'like', '%'.$this->nombre.'%');    
                    }
                 })       
                ->where(function ($query) {
                    if ($this->apellido !== '') {
                       $query->where('users.apellido', 'like', '%'.$this->apellido.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->taller !== '') {
                       $query->where('tallers.nombre', 'like', '%'.$this->taller.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->enunciado !== '') {
                       $query->where('tallers.enunciado', 'like', '%'.$this->enunciado.'%');    
                    }
                 })
                 ->where(function ($query) {
                    if ($this->calificacion !== '') {
                       $query->where('taller_user.calificacion', 'like', '%'.$this->calificacion);    
                    }
                 })
            ->select('tallers.*','taller_user.*','cursos.nombre as cur_nombre', 'nivels.nombre as nivel_nombre','materias.nombre as mate_nombre', 'contenidos.nombre as conte_name','users.name as alumno', 'users.apellido as apelli')
            ->paginate($this->perPage);
            
        return view('livewire.talleres-calificados', compact('calificados'));
    }
     public function exportarExcel(){
      $this->show = false;

     		   	 $calificados = DB::table('tallers')
            ->join('taller_user', 'tallers.id', '=', 'taller_user.taller_id')
            ->join('users', 'users.id', '=', 'taller_user.user_id')
            ->join('distribucionmacus', 'distribucionmacus.id', '=', 'users.distribucionmacu_id')
            ->join('cursos', 'cursos.id', '=', 'distribucionmacus.curso_id')
            ->join('nivels', 'users.nivel_id', '=', 'nivels.id')
            ->join('contenidos', 'contenidos.id', '=', 'tallers.contenido_id')
            ->join('materias', 'materias.id', '=', 'contenidos.materia_id')
            ->where('contenidos.materia_id', $this->materia_id)
            ->where('users.nivel_id', $this->nivel)
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
                    if ($this->nombre !== '') {
                       $query->where('users.name', 'like', '%'.$this->nombre.'%');    
                    }
                 })       
                ->where(function ($query) {
                    if ($this->apellido !== '') {
                       $query->where('users.apellido', 'like', '%'.$this->apellido.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->taller !== '') {
                       $query->where('tallers.nombre', 'like', '%'.$this->taller.'%');    
                    }
                 })
                ->where(function ($query) {
                    if ($this->enunciado !== '') {
                       $query->where('tallers.enunciado', 'like', '%'.$this->enunciado.'%');    
                    }
                 })
                   ->where(function ($query) {
                    if ($this->calificacion !== '') {
                       $query->where('taller_user.calificacion', 'like', '%'.$this->calificacion);    
                    }
                 })
            ->select('tallers.*','taller_user.*','cursos.nombre as cur_nombre', 'nivels.nombre as nivel_nombre','materias.nombre as mate_nombre', 'contenidos.nombre as conte_name','users.name as alumno', 'users.apellido as apelli')
            ->get();

            $header = array(
            	'instituto' => $this->materia->instituto->nombre,
            	'materia' => $this->materia->nombre,
            	'paralelo' => $this->para->nombre
            );

      $this->emit('calificaciones',['calificados' => $calificados, 'header' => $header]);


     }
       public function desbloquear()
    {
      $this->show = true;
    }
}
