<div>
	<!--aqui esta la seccion del reporte de la unidad educativa-->
	<br>
	<br>
	<div class="btn-group float-right" role="group" aria-label="Basic example">
@if ($show)
	<button  class="btn btn-success float-right" wire:click.prevent="exportarExcel()"> <i class="fad fa-file-excel"></i>
		Generar Reporte</button>
@else
	<button class="btn btn-success" type="button" disabled>
  <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
  Exportando...
</button>
@endif
	</div>
	<br>
	<br>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Reporte De Materias</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body p-0">
			<div class="row mb-3 ml-1 mr-1 justify-content-between">
				<div class="col-lg-1 col-sm-12 mt-2">
					<select wire:model="perPage" class="custom-select " id="grid-state">
						<option>10</option>
						<option>25</option>
						<option>50</option>
						<option>100</option>
					</select>
					
				</div>
				<div class="col-lg-3 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="instituto" type="text" class="form-control" placeholder="Buscar Unidad Educativa...">
				</div>
				<div class="col-lg-2 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="materia" type="text" class="form-control" placeholder="Buscar Materia...">
				</div>
				<div class="col-lg-2 col-sm-12 mt-2">
					<select wire:model="curso" class="custom-select " id="grid-state">
						<option value="" selected="" disabled="">Selecciona un Curso</option>
						<option value="">TODOS LOS CURSOS</option>
						@foreach ($cursos as $curso)
						<option value="{{ $curso->nombre }}">{{ $curso->nombre }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-3 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="unidad" type="text" class="form-control" placeholder="Buscar Contenido...">
				</div>
				{{--         <div class="col-lg-2 col-sm-12 mt-2">
					<select wire:model="orderAsc" class="custom-select " id="grid-state">
						<option value="1">Ascendente</option>
						<option value="0">Descenente</option>
					</select>
				</div> --}}
				
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th style="vertical-align: middle;" scope="col">Unidad Educativa</th>
						<th style="vertical-align: middle;" scope="col">Materia</th>
						<th style="vertical-align: middle;" scope="col">Curso</th>
						<th style="vertical-align: middle;" scope="col">CONTENIDO DE LA MATERIA</th>
						<th style="vertical-align: middle;" scope="col">Taller Por Contenido</th>
					</tr>
				</thead>
				<tbody>
					@if ($talleres->isNotEmpty())
					@foreach ($talleres as $element)
					<tr>
						<td>{{$element->instituto}}</td>
						<td>{{$element->nombre_materia}}</td>
						<td>{{$element->nombre_curso}}</td>
						<td>{{$element->unidad}}</td>
						<td width="100" class="text-center">{{$taller = App\Taller::where('contenido_id', $element->unidad_id)->count()}}</td>
					</tr>
					@endforeach
					@else
					<tr>
						<td class="text-center" colspan="5"><p class="font-weight-bold">No se ha encontrado registros para el filtro realizado</p></td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
	
		<!-- /.card-body -->
	</div>
		<div class="row justify-content-center">
			{!! $talleres->links() !!}
		</div>
	{{-- <table id="myTable" class="table table-hover">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Unidad Educativa</th>
				<th scope="col">Materia</th>
				<th scope="col">Curso</th>
				<th scope="col">CONTENIDO DE LA MATERIA</th>
				<th scope="col">Taller Por Contenido</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><input type="text" class="form-control form-control-sm" wire:model="instituto"></td>
				<td><input type="text" class="form-control form-control-sm" wire:model="materia"></td>
				<td><input type="text" class="form-control form-control-sm" wire:model="curso"></td>
				<td><input type="text" class="form-control form-control-sm" wire:model="unidad"></td>
				<td width="100"></td>
			</tr>
			@if ($talleres->isNotEmpty())
			@foreach ($talleres as $element)
			<tr>
				<td>{{$element->instituto}}</td>
				<td>{{$element->nombre_materia}}</td>
				<td>{{$element->nombre_curso}}</td>
				<td>{{$element->unidad}}</td>
				<td width="100" class="text-center">{{$taller = App\Taller::where('contenido_id', $element->unidad_id)->count()}}</td>
			</tr>
			@endforeach
			@else
			<tr>
				<td class="text-center" colspan="5"><p class="font-weight-bold">No se ha encontrado registros para el filtro realizado</p></td>
			</tr>
			@endif
			
		</tbody>
	</table>
	<div class="row justify-content-center">
		{!! $talleres->links() !!}
	</div> --}}
</div>