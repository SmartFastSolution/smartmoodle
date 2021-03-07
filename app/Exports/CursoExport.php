<?php

namespace App\Exports;

use App\Distribuciondo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class CursoExport implements FromView
{
  	use Exportable;
    protected $alumnos;
    
    public function __construct(array $alumnos)
    {
        $this->alumnos = $alumnos;
    }
    public function view(): View
    {
              return view('Reportes.documento.cursos',[
                  'alumnos' => $this->alumnos
              ]);
    }
}
