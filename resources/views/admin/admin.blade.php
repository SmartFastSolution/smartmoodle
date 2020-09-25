@extends('adminlte::page')

@section('title', 'Creador de plantillas')
@section('plugins.Sweetalert2', true)
@section('css')
    <link rel="stylesheet" href="{{asset('css/bootstrap-tagsinput.css')}}">
@endsection
@section('content')


	<h1 class="text-center  mt-5 text-danger"> Administrador de Talleres</h1>
     
  <div id="tallerlist"> 
     	<div class="container" >
     		<div class="row justify-content-center">
     			<div class="col-6">
               <div class="card text-center">
                 <div class="card-header bg-primary">
                     <h1>Elija la plantilla a utilizar</h1>                  
                 </div>
                 <div class="card-body">
                   <h5 class="card-title">Seleccione:</h5>
                  <select class="custom-select" v-model="numbreTaller" name="taller" id="">
                     <option disabled value="">SELECCIONE UN TALLER</option>
                     @foreach ($talleres = App\Plantilla::get() as $taller)
                         <option value="#taller{{ $taller->id }}">{{ $taller->nombre }}</option>
                     @endforeach
                  </select>
                 </div>
                 <div class="card-footer text-muted">
                   <button type="button" class="btn btn-outline-primary" data-toggle="modal" :data-target="numbreTaller">
                      Cargar Plantilla
                   </button>
                 </div>
               </div>
     				
     			</div>
            <div class="col-6">
               <form action="{{ route('admin.plantilla') }}" method="POST">
                   @csrf
               <div class="card text-center">
                 <div class="card-header bg-danger">
                   <h1>Crear plantilla</h1>
                 </div>
                 <div class="card-body">
                   <h3 class="card-title">Completa el formulario para registrar una nueva plantilla</h3>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Nombre del taller</label>
                      <input class="form-control" name="nombre" ></input>
                    </div>
                     <div class="form-group">
                      <label for="message-text" class="col-form-label">Descripcion</label>
                      <textarea class="form-control" name="descripcion" ></textarea>
                    </div>       
                 </div>
                 <div class="card-footer text-muted">
                   <input type="submit" value="Crear Plantilla" class="btn btn-outline-danger">
                 </div>
               </div> 
               </form>
            </div>
     		</div>

     	</div>

@include('layouts.modal')

@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript">
   var i = 1;
   var last=$('.fac tr').length;
   var objetivo = document.getElementById('num');


    if (last == 1) {
      objetivo.innerHTML = 1;
    }
    $('.addRow').on('click', function(evt) {
      evt.preventDefault();
      addRow();
    });
     $('.addFac').on('click', function(evt) {
      evt.preventDefault();

      addFac();
    });


    function addRow(){
      
      var tr='<tr>'+
          '<th scope="row"><input type="file" name="col_a[]" class="custom-file" ></th>'+
          '<th scope="row"><input type="file" name="col_b[]" class="custom-file" ></th> '+ 
        '</tr>';
      $('.prin').append(tr);
      toastr.success("Columna agregada correctamente", "Smarmoddle",{
         "timeOut": "1000"
      });
    }
     function addFac(){
      
      
      var tr='<tr>'+
           '<th scope="row" id="num">'+(++i)+'</th>'+
              '<td><input type="text" class="form-control" name="cod_aux[]"></td>'+
              '<td><input type="text" class="form-control" name="cant[]"></td>'+
              '<td><input type="text" class="form-control" name="desc[]"></td>'+
              '<td><input type="text" class="form-control" name="precio[]"></td>'+
              '<td><a href="#" class="btn btn-danger remove"><span class="glyphicon glyphicon-remove">X</span></a></td>'
        '</tr>';
      $('.fac').append(tr);
      toastr.success("Columna agregada correctamente", "Smarmoddle",{
         "timeOut": "1000"
      });
    }

    $('.remove').live('click', function(){
      var last=$('.fac tr').length;
      if (last == 1) {
        i = 1;
        toastr.error("Esta columna no se puede eliminar", "Smarmoddle",{
         "timeOut": "1000"
      });
      }else{
      $(this).parent().parent().remove();
}
    });



  </script>
    <script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
@endsection
</div> 
@endsection