<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NotasExport implements FromView
{
    use Exportable;
    protected $notas;
    
    public function __construct(array $notas)
    {
        $this->notas = $notas;
    }
   

   public function view(): View
   {
             return view('Reportes.documento.notas',[
                 'talleres' => $this->notas
             ]);
   }

}
