<div>
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
			<h3 class="card-title">Reporte De Calificaciones</h3>
		</div>
		<!-- /.card-header -->
		<div class="card-body p-0">
			<div class="row mb-3 ml-1 mr-1 justify-content-center">
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
					<select wire:model="curso" class="custom-select " id="grid-state">
						<option value="" selected="" disabled="">Selecciona un Curso</option>
						<option value="">TODOS LOS CURSOS</option>
						@foreach ($cursos as $curso)
						<option value="{{ $curso->nombre }}">{{ $curso->nombre }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-2 col-sm-12 mt-2">
					<select wire:model="paralelo" class="custom-select " id="grid-state">
						<option value="" selected="" disabled="">Selecciona un paralelo</option>
						<option value="">TODOS LOS PARALELO</option>
						@foreach ($nivels as $nivel)
						<option value="{{ $nivel->nombre }}">{{ $nivel->nombre }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-2 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="materia" type="text" class="form-control" placeholder="Buscar Materia...">
				</div>
				<div class="col-lg-2 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="nombre" type="text" class="form-control" placeholder="Buscar Nombre...">
				</div>
				<div class="col-lg-2 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="apellido" type="text" class="form-control" placeholder="Buscar Apellido...">
				</div>
				<div class="col-lg-2 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="unidad" type="text" class="form-control" placeholder="Buscar Unidad...">
				</div>
				<div class="col-lg-2 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="taller" type="text" class="form-control" placeholder="Buscar Taller...">
				</div>
				<div class="col-lg-2 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="calificacion" type="text" class="form-control" placeholder="Buscar Calificacion...">
				</div>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th  style="vertical-align: middle;" scope="col">Unidad Educativa</th>
						<th  style="vertical-align: middle;" scope="col">Curso</th>
						<th class="text-center"  style="vertical-align: middle;" scope="col">Paralelo</th>
						<th  style="vertical-align: middle;" scope="col">Nombre</th>
						<th  style="vertical-align: middle;" scope="col">Apellido</th>
						<th  style="vertical-align: middle;" scope="col">Materia</th>
						<th  style="vertical-align: middle;" scope="col">Contenido</th>
						<th  style="vertical-align: middle;" scope="col">Taller</th>
						<th class="text-center" style="vertical-align: middle;" scope="col">Calificacion</th>
					</tr>
				</thead>
				<tbody>
					@if ($talleres->isNotEmpty())
					@foreach ($talleres as $element)
					<tr>
						<td>{{$element->instituto}}</td>
						<td>{{$element->nombre_curso}}</td>
						<td class="text-center"><span class="badge badge-danger">{{$element->paralelo}}</span> </td>
						<td>{{$element->alumno}}</td>
						<td>{{$element->apelli}}</td>
						<td>{{$element->nombre_materia}}</td>
						<td>{{$element->unidad}}</td>
						<td>{{$element->nombre}}</td>
						<td class="text-center">{{$element->calificacion}}</td>
					</tr>
					@endforeach
					@else
					<tr>
						<td class="text-center" colspan="9"><p class="font-weight-bold">No se ha encontrado registros para el filtro realizado</p></td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
		
	</div>
	<div class="row justify-content-center">
		{!! $talleres->links() !!}
	</div>
</div>