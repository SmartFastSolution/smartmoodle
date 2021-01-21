{{-- @extends('layouts.docapp') --}}

@extends('layouts.nav')
@section('title', 'Unidades | SmartMoodle')

@section('content')

<section class="content">
    <div class="container">
        <h1 class="font-weight-light">Visualización de Documento|No Descargable</h1>
        <h3 class="font-weight-light">{{$contenido->nombre}}</h3>
         <p class="text-center"> 
            <div id="pdf">
                <object width="100%" height="650" type="application/pdf" data="{{$contenido->archivo->url}}#zoom=85&scrollbar=0&toolbar=0&navpanes=0" id="pdf_content" style="pointer-events: none;">
                    <p>Insert your error message here, if the PDF cannot be displayed.</p>
                </object>
            </div> 
        </p>
    </div>
</section>

@stop
@section('css')
@stop
@section('js')
@stop