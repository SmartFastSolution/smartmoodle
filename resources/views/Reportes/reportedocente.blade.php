@extends('layouts.nav')
@section('title', 'Administracion - Inicio')
@section('content')


<section class="content-fluid">
    <div class="container-fluid">
        <h1 class="font-weight-bold text-center text-danger display-4"> Reportes Generales</h1>

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                    aria-controls="nav-home" aria-selected="true">Reporte Unidad Educatva/Materia</a>
                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false">Reporte Docente</a>
                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                    aria-controls="nav-contact" aria-selected="false">Reporte Estudiantes</a>
                <a class="nav-link" id="nav-users-tab" data-toggle="tab" href="#nav-users" role="tab"
                    aria-controls="nav-users" aria-selected="false">Reporte Usuarios</a>
                <a class="nav-link" id="nav-vigencia-tab" data-toggle="tab" href="#nav-vigencia" role="tab"
                    aria-controls="nav-vigencia" aria-selected="false">Docente/Estudiante</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            @livewire('admin.reporte-talleres')
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            @livewire('admin.reporte-docentes')
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            @livewire('admin.reporte-estudiante')

            </div>
            <div class="tab-pane fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
            @livewire('admin.reporte-usuarios')
            </div>
            <div class="tab-pane fade" id="nav-vigencia" role="tabpanel" aria-labelledby="nav-vigencia-tab">
            @livewire('admin.reporte-alumnos')
            
            </div>
            <!-- hasta aqui los tab -->
        </div>
    </div>
</section>
@stop
@section('css')

@stop
@section('js')
<script type="text/javascript">

    const reportes = new Vue({
      el: "#demo",
      data:{

      },
      methods:{
        reporteTalleres: function (talleres) {

           // console.log(talleres)
        let _this = this;
        let url = '/sistema/distribucion-list-excel';
            axios.post(url,{
            datos: talleres
        },{responseType: 'arraybuffer'}).then(response => {

            let fileURL = window.URL.createObjectURL(new Blob([response.data]));
            let fileLink = document.createElement('a');
            fileLink.href = fileURL;
            fileLink.setAttribute('download', Date.now()+'-talleres.xlsx');
           document.body.appendChild(fileLink);
           fileLink.click();
            // console.log(response.data); 

        }).catch(function(error){

        });
        },

    reporteDocentes: function (docentes) {
           // console.log(talleres)
        let _this = this;
        let url = '/sistema/docentes-list-excel';
            axios.post(url,{
            datos: docentes
        },{responseType: 'arraybuffer'}).then(response => {

            let fileURL = window.URL.createObjectURL(new Blob([response.data]));
            let fileLink = document.createElement('a');
            fileLink.href = fileURL;
            fileLink.setAttribute('download', Date.now()+'-docentes.xlsx');
           document.body.appendChild(fileLink);
           fileLink.click();
            // console.log(response.data); 

        }).catch(function(error){

        });
        },
        reporteEstudiantes: function (estudiantes) {
           // console.log(talleres)
        let _this = this;
        let url = '/sistema/asignaciones-list-excel';
            axios.post(url,{
            datos: estudiantes
        },{responseType: 'arraybuffer'}).then(response => {

            let fileURL = window.URL.createObjectURL(new Blob([response.data]));
            let fileLink = document.createElement('a');
            fileLink.href = fileURL;
            fileLink.setAttribute('download', Date.now()+'-estudiantes.xlsx');
           document.body.appendChild(fileLink);
           fileLink.click();
            // console.log(response.data); 

        }).catch(function(error){

        });
        },
        reporteAlumnos: function (alumnos) {
           // console.log(talleres)
        let _this = this;
        let url = '/sistema/cursos-list-excel';
            axios.post(url,{
            datos: alumnos
        },{responseType: 'arraybuffer'}).then(response => {

            let fileURL = window.URL.createObjectURL(new Blob([response.data]));
            let fileLink = document.createElement('a');
            fileLink.href = fileURL;
            fileLink.setAttribute('download', Date.now()+'-alumnos.xlsx');
           document.body.appendChild(fileLink);
           fileLink.click();
            // console.log(response.data); 

        }).catch(function(error){

        });
        },
         reportesUsuarios: function (usuarios) {
           // console.log(talleres)
        let _this = this;
        let url = '/sistema/users-list-excel';
            axios.post(url,{
            datos: usuarios
        },{responseType: 'arraybuffer'}).then(response => {

            let fileURL = window.URL.createObjectURL(new Blob([response.data]));
            let fileLink = document.createElement('a');
            fileLink.href = fileURL;
            fileLink.setAttribute('download', Date.now()+'-usuarios.xlsx');
           document.body.appendChild(fileLink);
           fileLink.click();
            // console.log(response.data); 

        }).catch(function(error){

        });
        },
      }
    });
    Livewire.on('talleres', function (data) {
       reportes.reporteTalleres(data.talleres)
    });

     Livewire.on('docentes', function (data) {
       reportes.reporteDocentes(data.docentes)
    });

    Livewire.on('estudiantes', function (data) {
       reportes.reporteEstudiantes(data.estudiantes)
    });

    Livewire.on('alumnos', function (data) {
       reportes.reporteAlumnos(data.alumnos)
    });
    Livewire.on('usuarios', function (data) {
       reportes.reportesUsuarios(data.usuarios)
    });


</script>
@stop