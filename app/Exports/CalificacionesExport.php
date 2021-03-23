<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class CalificacionesExport implements FromView
{
    use Exportable;
    protected $calificaciones;
    protected $titulos;
    
    public function __construct(array $calificaciones, array $titulos)
    {
		$this->calificaciones = $calificaciones;
		$this->titulos        = $titulos;
    }
   

   public function view(): View
   {
             return view('Reportes.documento.calificaciones',[
					'calificaciones' => $this->calificaciones,
					'titulos'        => $this->titulos
             ]);
   }

}
