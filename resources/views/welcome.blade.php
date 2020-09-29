@extends('layouts.nav')


@section('title', 'Dashboard | SmartMoodle')

@section('encabezado')

<h1>Dashboard</h1>
@stop















@section('content')
<div id="app">
    <drag-component :datos="{{ $datos = App\Materia::get() }}" inline-template>
        <div class="row">
            <div class="col-3">
                <h3>Draggable 1</h3>
                <draggable class="list-group" :list="datos" group="people" @change="log">
                    <div class="list-group-item" v-for="(element, index) in datos" :key="element.name">
                        @{{ index + 1}} - @{{ element.nombre }}
                    </div>
                </draggable>
            </div>

            <div class="col-3">
                <h3>Draggable 2</h3>
                <draggable class="list-group" :list="list2" group="people" @change="log">
                    <div class="list-group-item" v-for="(element, index) in list2" :key="element.name">
                        @{{ index }} - @{{ element.nombre }}
                    </div>
                </draggable>
            </div>
        </div>






    </drag-component>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Multiple</label>
        <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
            <option>Alabama</option>
            <option>Alaska</option>
            <option>California</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>
        </select>
    </div>
    <!-- /.form-group -->
    <div class="form-group">
        <label>Disabled Result</label>
        <select class="form-control select2" style="width: 100%;">
            <option selected="selected">Alabama</option>
            <option>Alaska</option>
            <option disabled="disabled">California (disabled)</option>
            <option>Delaware</option>
            <option>Tennessee</option>
            <option>Texas</option>
            <option>Washington</option>
        </select>
    </div>
    <!-- /.form-group -->
</div>



<div class="text-center">

    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalYT">YouTube Modal</button>
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalVM">Vimeo Modal</button>
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalGM">Google Maps
        Modal</button>

</div>

<!--Modal: Name-->
<div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Body-->
            <div class="modal-body mb-0 p-0">

                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/A3PDXmYoF5U"
                        allowfullscreen></iframe>
                </div>

            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <span class="mr-4">Spread the word!</span>
                <a type="button" class="btn-floating btn-sm btn-fb"><i class="fab fa-facebook-f"></i></a>
                <!--Twitter-->
                <a type="button" class="btn-floating btn-sm btn-tw"><i class="fab fa-twitter"></i></a>
                <!--Google +-->
                <a type="button" class="btn-floating btn-sm btn-gplus"><i class="fab fa-google-plus-g"></i></a>
                <!--Linkedin-->
                <a type="button" class="btn-floating btn-sm btn-ins"><i class="fab fa-linkedin-in"></i></a>

                <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4"
                    data-dismiss="modal">Close</button>

            </div>

        </div>
        <!--/.Content-->

    </div>
</div>
<!--Modal: Name-->

<!--Modal: Name-->
<div class="modal fade" id="modalVM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Body-->
            <div class="modal-body mb-0 p-0">

                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/115098447"
                        allowfullscreen></iframe>
                </div>

            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <span class="mr-4">Spread the word!</span>
                <a type="button" class="btn-floating btn-sm btn-fb"><i class="fab fa-facebook-f"></i></a>
                <!--Twitter-->
                <a type="button" class="btn-floating btn-sm btn-tw"><i class="fab fa-twitter"></i></a>
                <!--Google +-->
                <a type="button" class="btn-floating btn-sm btn-gplus"><i class="fab fa-google-plus-g"></i></a>
                <!--Linkedin-->
                <a type="button" class="btn-floating btn-sm btn-ins"><i class="fab fa-linkedin-in"></i></a>

                <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4"
                    data-dismiss="modal">Close</button>

            </div>

        </div>
        <!--/.Content-->

    </div>
</div>
<!--Modal: Name-->

<!--Modal: Name-->
<div class="modal fade" id="modalGM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

        <!--Content-->
        <div class="modal-content">

            <!--Body-->
            <div class="modal-body mb-0 p-0">

                <!--Google map-->
                <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 500px">
                    <iframe src="https://maps.google.com/maps?q=chicago&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

                <!--Google Maps-->

            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">

                <button type="button" class="btn btn-primary btn-md">Save location <i
                        class="fas fa-map-marker-alt ml-1"></i></button>
                <button type="button" class="btn btn-outline-primary btn-md" data-dismiss="modal">Close <i
                        class="fas fa-times ml-1"></i></button>

            </div>

        </div>
        <!--/.Content-->

    </div>
</div>
<!--Modal: Name-->



@stop
@section('css')
@stop
@section('js')

<script type="text/javascript">
$(function() {
    //Initialize Select2 Elements
    $('.select2').select2()
})
</script>
@stop