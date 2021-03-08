<?php

namespace App\Exports;

use App\Assignment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class AssigmentExport implements FromView
{
    use Exportable;
    protected $estudiantes;
    
    public function __construct(array $estudiantes)
    {
        $this->estudiantes = $estudiantes;
    }
    public function view(): View
    {
              return view('Reportes.documento.assignment',[
                  'estudiantes' => $this->estudiantes
              ]);
    }
}
