@extends('layouts.nav')

@section('titulo', 'SmartMoodle')



@section('content')
<div id="app">
      <drag-component :datos="{{ $datos = App\Materia::get() }}" inline-template>
          <div class="row">
          <div class="col-3">
            <h3>Draggable 1</h3>
            <draggable class="list-group" :list="datos" group="people" @change="log">
              <div
                class="list-group-item"
                v-for="(element, index) in datos"
                :key="element.name"
              >
              @{{ index + 1}} -  @{{ element.nombre }} 
              </div>
            </draggable>
          </div>

          <div class="col-3">
            <h3>Draggable 2</h3>
            <draggable class="list-group" :list="list2" group="people" @change="log">
              <div
                class="list-group-item"
                v-for="(element, index) in list2"
                :key="element.name"
              >
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
@stop
@section('js')

<script type="text/javascript">
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
})
</script>

@endsection

