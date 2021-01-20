{{-- @extends('layouts.estapp') --}}

@extends('layouts.nav')
@section('title', 'Documentación| SmartMoodle')
@section('content')

<section class="content">
    <div class="container">
        <h1 class="font-weight-light">Visualización de Documento|Docente</h1>
        <h3 class="font-weight-light">{{$contenido->nombre}}</h3>

        <p class="text-center">
        <div id="pdf" >
            @isset ($contenido->documentodoc->url)

            <object width="100%" height="650" type="application/pdf"
                data="{{$contenido->documentodoc->url}}#zoom=85&scrollbar=0&toolbar=0&navpanes=0" id="pdf_content"
                style="pointer-events: none;">
                @endisset
        </div>
        </p>

    </div>
</section>






@stop
@section('css')
@stop
@section('js')
<script type="text/javascript">
$(document).ready(function(){
    //disable full page

    $("body").on("contextmenu", function(e){
         return false;
    });
})

</script>

@stop