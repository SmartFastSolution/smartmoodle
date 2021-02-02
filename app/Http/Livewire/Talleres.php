<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Taller;
use App\Materia;
use App\Contenido;
use Illuminate\Support\Facades\DB;

class Talleres extends Component
{
	  use WithPagination;
	   protected $paginationTheme = 'bootstrap';

	public $materia_id, $status, $date, $select_id, $buscador;

    public $perPage    = 10;
    public $search     = '';
    public $orderBy    = 'id';
    public $orderAsc   = true;
    public $curso_id   = '';

	function mount($id)
	{
		$this->materia_id = $id;
		 // $materia = Materia::select('nombre')->where('id', $id)->first();
		// $this->contenidos = $contenido;
	}
    public function render()
    {
		 $contenidos = Contenido::where('materia_id', $this->materia_id)->get();

		 $activados = DB::table('distribucionmacu_taller')
    		->join('contenidos', 'distribucionmacu_taller.contenido_id', '=', 'contenidos.id')
            ->join('tallers', 'distribucionmacu_taller.taller_id', '=', 'tallers.id')
            ->where(function ($query) {
		               $query->where('tallers.enunciado', 'like', '%'.$this->buscador.'%')
		                   	->orWhere('contenidos.nombre', 'like', '%'.$this->buscador.'%');
		         })
            ->where('contenidos.materia_id', $this->materia_id)
            ->select('distribucionmacu_taller.*', 'tallers.enunciado as enunciado_taller', 'tallers.nombre as nombre_taller', 'contenidos.nombre as nombre_unidad')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate(5);


        return view('livewire.talleres',[
        	'contenidos' => $contenidos,
        	'activados' => $activados
        ]);
    }

    function active($id)
    {
		$this->select_id = $id;
		// $taller          = Taller::find($id);
    }
    function activar()
    {
    	$taller = Taller::find($this->select_id);
        $taller->distribucionmacus()->attach(1,['estado'=> 1 , 'plantilla_id'=> $taller->plantilla_id , 'contenido_id'=> $taller->contenido_id, 'fecha_entrega' => $this->date]);
       	$this->dispatchBrowserEvent('activado', ['mensaje' => 'Taller activado correctamente']);

        $this->select_id = '';
    	
    }
}
