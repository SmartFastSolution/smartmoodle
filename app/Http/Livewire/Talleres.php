<?php

namespace App\Http\Livewire;

use App\Contenido;
use App\Distribuciondo;
use App\Distribucionmacu;
use App\Materia;
use App\Taller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Talleres extends Component
{
	  use WithPagination;
	   protected $paginationTheme = 'bootstrap';

	public $materia_id, $status, $date, $select_id, $buscador, $paralelo_id = '';

    public $perPage    = 10;
    public $search     = '';
    public $orderBy    = 'id';
    public $orderAsc   = true;
    public $curso_id   = '';
    public $curso;
    public $paralelos = [];

	function mount($id)
	{
        $user_id = Auth::id();
		$this->materia_id = $id;
          $curso = Distribucionmacu::join('distribucionmacu_materia', 'distribucionmacu_materia.distribucionmacu_id', '=', 'distribucionmacus.id')
         ->where('distribucionmacu_materia.materia_id', $this->materia_id)
         ->select('distribucionmacus.*')
         ->first();
         $this->curso = $curso;

        
		 // $materia = Materia::select('nombre')->where('id', $id)->first();
		// $this->contenidos = $contenido;
	}
    public function render()
    {
		 $contenidos = Contenido::where('materia_id', $this->materia_id)->get();


		 $activados = DB::table('distribucionmacu_taller')
    		->join('contenidos', 'distribucionmacu_taller.contenido_id', '=', 'contenidos.id')
            ->join('tallers', 'distribucionmacu_taller.taller_id', '=', 'tallers.id')
            ->join('nivels', 'distribucionmacu_taller.nivel_id', '=', 'nivels.id')
            ->where(function ($query) {
		               $query->where('tallers.enunciado', 'like', '%'.$this->buscador.'%')
		                   	->orWhere('contenidos.nombre', 'like', '%'.$this->buscador.'%');
		         })
            ->where('contenidos.materia_id', $this->materia_id)
            ->select('distribucionmacu_taller.*', 'tallers.enunciado as enunciado_taller', 'tallers.nombre as nombre_taller','nivels.nombre as paralelo', 'contenidos.nombre as nombre_unidad')
            ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
            ->paginate(5);


        return view('livewire.talleres',[
        	'contenidos' => $contenidos,
        	'activados' => $activados,
            // 'paralelos' => $paralelos
        ]);
    }

    function active($id)
    {
        $user_id = Auth::id();

		$this->select_id = $id;
        $activados = DB::table('distribucionmacu_taller')
        ->where('taller_id', $id)
        ->select('nivel_id')
        ->get();

        $ids =[];
        foreach ($activados as $id) {
            $ids[] = $id->nivel_id;
        }
         $distribuciondo = Distribuciondo::where('user_id', $user_id)->where('materia_id', $this->materia_id)->first();

         $this->paralelos = $distribuciondo->paralelos->whereNotIn('id', $ids);



    }
    function activar()
    {
        $c_id = $this->curso->id;

           $this->validate([
            'date'   => 'required',
            'paralelo_id' => 'required',
        ]);
        // $consulta = DB::table('distribucionmacu_taller')
        // ->where('taller_id', $this->select_id)
        // ->where('distribucionmacu_id', $c_id)
        // ->where('paralelo_id', $this->paralelo_id)
        // ->count();

        // if ($consulta >= 1 ) {
        // $this->dispatchBrowserEvent('activado', ['mensaje' => 'Este taller ya se encuentra activado para este paralelo']);
            
        // }else{

    	$taller = Taller::find($this->select_id);
        $taller->distribucionmacus()->attach($c_id,['estado'=> 1 , 'plantilla_id'=> $taller->plantilla_id , 'contenido_id'=> $taller->contenido_id, 'nivel_id' => $this->paralelo_id, 'fecha_entrega' => $this->date]);
       	$this->dispatchBrowserEvent('activado', ['mensaje' => 'Taller activado correctamente']);
        $this->select_id = '';
    	// }
    }
}
