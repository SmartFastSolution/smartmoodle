<?php

namespace App\Exports;

use App\Distribucionmacu;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;

class DistribucionExport implements FromView 
{
    use Exportable;
    protected $talleres;
    
    public function __construct(array $talleres)
    {
        $this->talleres = $talleres;
    }
   public function view(): View
   {
             return view('Reportes.documento.distribucionmacu',[
                 'talleres' => $this->talleres
             ]);
   }
   
}
