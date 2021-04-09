@extends('layouts.nav')
@section('title', 'Paralelo '.$paralelo->nombre.' | SmartMoodle')
@section('css')
<style type="text/css">
:root {
/* Not my favorite that line-height has to be united, but needed */
--lh: 1.4rem;
}
.truncate-overflow {
--max-lines: 60;
position: relative;
max-height: calc(var(--lh) * var(--max-lines));
overflow: hidden;
padding-right: 1rem; /* space for ellipsis */
}
.truncate-overflow::before {
position: absolute;
/*content: "...";*/
/* tempting... but shows when lines == content */
/* top: calc(var(--lh) * (var(--max-lines) - 1)); */

/*
inset-block-end: 0;
inset-inline-end: 0;
*/
bottom: 0;
right: 0;
}
.truncate-overflow::after {
content: "";
position: absolute;
/*
inset-inline-end: 0;
*/
right: 0;
/* missing bottom on purpose*/
width: 1rem;
height: 1rem;
background: white;
}
</style>
@endsection
@section('content')
<section class="content">
    <div class="container">
        <h1 class="font-weight-light" style="color:red;"> @isset ( auth()->user()->instituto->nombre)
        {{ auth()->user()->instituto->nombre}}
        @endisset</h1>
        <h2 class="font-weight-light">
        @foreach(auth()->user()->roles as $role)
        {{$role->name}} | {{ auth()->user()->name, }}
        {{ auth()->user()->apellido, }}
        @endforeach</h2>
        <h2 class="font-weight-bold"> PARALELO {{ $paralelo->nombre }}</h2>
        <h3 class="font-weight-light"> {{ $materia->nombre }}</h3>
    </div>
</section>
@livewire('talleres-pendientes', [$paralelo->id, $materia->id])
@livewire('talleres-calificados', [$paralelo->id, $materia->id])


@stop
@section('css')
@stop
@section('js')
<script type="text/javascript">
const calificados = new Vue({
     methods:{
        reporteCalificaciones: function (calificaciones) {

           // console.log(talleres)
        let _this = this;
        let url = '/sistema/calificaciones-list-excel';
            axios.post(url,{
            calificaciones: calificaciones.calificados,
            titulos: calificaciones.header
        },{responseType: 'arraybuffer'}).then(response => {

            let fileURL = window.URL.createObjectURL(new Blob([response.data]));
            let fileLink = document.createElement('a');
            fileLink.href = fileURL;
            fileLink.setAttribute('download', Date.now()+'-calificaciones.xlsx');
           document.body.appendChild(fileLink);
           fileLink.click();
           Livewire.emit('desbloquear');
           
        }).catch(function(error){

        });
        }
    }

})



    Livewire.on('calificaciones', function (data) {
        setTimeout(function(){ 
       calificados.reporteCalificaciones(data)
       }, 3000);
    });

</script>
{{-- <script>
$(function() {
$(document).ready(function() {
var table1 = $('.myTable').DataTable({
"fixedHeader": true,
"orderCellsTop": false,
"info": true,
"autoWidth": true,
"paging": true,
"searching": true,
"ordering": true,
"responsive": true,
"scrollX": true,
"language": {
"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
}
});
$('#myTable thead tr').clone(true).appendTo('#myTable thead');
$('#myTable thead tr:eq(1) th').each(function(i) {
var title = $(this).text(); //es el nombre de la columna
$(this).html('<input type="text" placeholder="Buscar..." class="form-control" />');
$('input', this).on('keyup change', function() {
if (table1.column(i).search() !== this.value) {
table1
.column(i)
.search(this.value)
.draw();
}
});
});
var table = $('#myTable2').DataTable({
"fixedHeader": true,
"orderCellsTop": false,
"info": true,
"autoWidth": true,
"paging": true,
"searching": true,
"ordering": true,
"responsive": true,
"scrollX": true,
"language": {
"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
}
});
$('#myTable2 thead tr').clone(true).appendTo('#myTable2 thead');
$('#myTable2 thead tr:eq(1) th').each(function(i) {
var title = $(this).text(); //es el nombre de la columna
$(this).html('<input type="text" placeholder="Buscar..." class="form-control" />');
$('input', this).on('keyup change', function() {
if (table.column(i).search() !== this.value) {
table
.column(i)
.search(this.value)
.draw();
}
});
});
});
});
</script> --}}
@stop