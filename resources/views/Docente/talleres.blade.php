{{-- @extends('layouts.docapp') --}}

@extends('layouts.nav')
@section('title', 'Unidades | SmartMoodle')
@section('css')
<style type="text/css">
    :root {
  /* Not my favorite that line-height has to be united, but needed */
  --lh: 1.4rem;
}
.truncate-overflow {
  --max-lines: 3;
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
        <h1 class="font-weight-light" style="color:red;">  @isset ( auth()->user()->instituto->nombre)
            {{ auth()->user()->instituto->nombre}}
                
            @endisset</h1>
        <h2 class="font-weight-light" style="color:blue;"> {{ auth()->user()->name, }} {{ auth()->user()->apellido, }}
<<<<<<< HEAD
            <h3 class="  font-weight-bold text-success">{{ $materia->nombre }}</h3>
            <h2 class="font-weight-bold text-dark">Administrador de Talleres</h2>
=======
           
>>>>>>> 618ceb09e19e1b3a3abfe1045b2cd3624380bfa2
        </h2>

        <a class="btn btn-info btn" href="{{ route('contenido.resueltos',['id'=>$id]) }}"><i
                class="fas fa-book-open"></i>
            Talleres Resueltos</i></a>
         <h3 class="  font-weight-bold text-success">{{ $materia->nombre }}</h3>
            <h2 class="font-weight-bold text-dark">Administrador de Talleres</h2>
        <br>
        <br>
        @livewire('talleres',[$id])

</section>
@stop
@section('css')
@livewireStyles
@stop
@section('js')
@livewireScripts
<script type="text/javascript">
    window.addEventListener('activado', event => {
     $('#'+event.detail.modal).modal('hide');
      toastr.success(event.detail.mensaje, "Smarmoddle", {
        "timeOut": "3000"
    });
})
 
// let talleres = @json($tallers);
// let talleress = @json($talleres);
// let materia = @json($id);
// console.log(talleress)
// const taller = new Vue({
//     el: "#myTabContent",
//     data: {
//         materia_id: materia,
//         tallers: talleres,
//         talleres: talleress,
//         taller_id: '',
//         fecha_entrega: '',
//         estado: '',
//         ruta: '/sistema/taller/'
//     },
//     mounted: function() {


//     },
//     methods: {
//         Cambiar(index, id) {
//             let taller_id = id;
//             // console.log(index)
//             let estado = this.talleres[index].talleres[id].estado;
//             let fecha = this.talleres[index].talleres[id].fecha_entrega;
//             this.taller_id = this.talleres[index].talleres[id].id;
//             this.estado = estado;
//             this.fecha_entrega = fecha
//             $('#fecha').modal('show');
//         },
//         Enviar: function() {
//             // let taller = id;
//             var set = this;
//             var url = '/sistema/admin/registro';
//             axios.post(url, {
//                 materia: set.materia_id,
//                 taller_id: set.taller_id,
//                 estado: set.estado,
//                 fecha: set.fecha_entrega
//             }).then(response => {
//                 toastr.success(response.data.message, "Smarmoddle", {
//                     "timeOut": "3000"
//                 });
//                 set.talleres = [];
//                 set.talleres = response.data.talleres;
//                 $('#fecha').modal('hide')
//                 // location.reload();
//             }).catch(function(error) {});
//         }
//     }
// });
</script>
@stop