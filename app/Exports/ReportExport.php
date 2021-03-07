<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\Exportable;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView 
{
	  	use Exportable;
    protected $usuarios;
    
    public function __construct(array $usuarios)
    {
        $this->usuarios = $usuarios;
    }
   

   public function view(): View
   {
             return view('Reportes.documento.usuarios',[
                 'usuarios' => $this->usuarios
             ]);
   }


}
