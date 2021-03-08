<?php

namespace App\Http\Livewire\Admin;

use App\Materia;
use App\Curso;
use App\Taller;
use Livewire\Component;
use Livewire\WithPagination;

class ReporteTalleres extends Component
{
    use WithPagination;
    protected $listeners = ['desbloquear'];
  protected $paginationTheme = 'bootstrap';
  protected $queryString = [
        'page' => ['except' => 1],
    ];
  public $cursos  = [];
    public $curso     = '';
    public $taller    = '';
    public $materia   = '';
    public $instituto = '';
    public $unidad    = '';
    public $perPage   = 10;
    public $show            = true;

    // public $orderAsc = true;
    // public $orderBy = 'institutos.nombre';

    public function render()
    {
        $this->cursos = Curso::get();
            $talleres = Materia::leftJoin('contenidos', 'materias.id', '=', 'contenidos.materia_id')
                ->join('institutos', 'institutos.id', '=', 'materias.instituto_id')
                ->leftJoin('distribucionmacu_materia', 'materias.id', '=', 'distribucionmacu_materia.materia_id')
                ->leftJoin('distribucionmacus', 'distribucionmacu_materia.distribucionmacu_id', '=', 'distribucionmacus.id')
                ->leftJoin('cursos', 'distribucionmacus.curso_id', '=', 'cursos.id')
                ->where('institutos.nombre', 'like', '%'.$this->instituto.'%')
                ->where('materias.nombre', 'like', '%'.$this->materia.'%')
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
                ->select('cursos.nombre as nombre_curso','materias.nombre as nombre_materia', 'contenidos.nombre as unidad', 'contenidos.id as unidad_id', 'institutos.nombre as instituto')
                // ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->paginate($this->perPage);
        return view('livewire.admin.reporte-talleres',
[
'talleres' => $talleres
]
    );
    }


    public function exportarExcel()
    {
      $this->show = false;

              $talleres = Materia::leftJoin('contenidos', 'materias.id', '=', 'contenidos.materia_id')
                ->join('institutos', 'institutos.id', '=', 'materias.instituto_id')
                ->leftJoin('distribucionmacu_materia', 'materias.id', '=', 'distribucionmacu_materia.materia_id')
                ->leftJoin('distribucionmacus', 'distribucionmacu_materia.distribucionmacu_id', '=', 'distribucionmacus.id')
                ->leftJoin('cursos', 'distribucionmacus.curso_id', '=', 'cursos.id')
                ->where('institutos.nombre', 'like', '%'.$this->instituto.'%')
                ->where('materias.nombre', 'like', '%'.$this->materia.'%')
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
                ->select('cursos.nombre as nombre_curso','materias.nombre as nombre_materia', 'contenidos.nombre as unidad', 'contenidos.id as unidad_id', 'institutos.nombre as instituto')
                ->get();


      $this->emit('talleres',['talleres' => $talleres]);
      // return (new ProductsExport(2018))->download('products.xlsx');
    }
         public function desbloquear()
    {
      $this->show = true;
    }
}
