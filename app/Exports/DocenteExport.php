<?php

namespace App\Exports;

use App\Distribuciondo;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\FromView;

class DocenteExport implements FromView
{
    use Exportable;
    protected $docentes;
    
    public function __construct(array $docentes)
    {
        $this->docentes = $docentes;
    }
    public function view(): View
   {
             return view('Reportes.documento.docente',[
                 'docentes' => $this->docentes
             ]);
   }
}
