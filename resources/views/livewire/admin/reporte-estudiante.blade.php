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
			<h3 class="card-title">Reporte De Estudiantes</h3>
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
				<div class="col-lg-3 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="nombre" type="text" class="form-control" placeholder="Buscar Nombre...">
				</div>
				<div class="col-lg-3 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="apellido" type="text" class="form-control" placeholder="Buscar Apellido...">
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
				<div class="col-lg-2 col-sm-12 mt-2">
					<select wire:model="estado" class="custom-select " id="grid-state">
						<option selected="" value="" >ESTADO</option>
						<option>on</option>
						<option>off</option>
					</select>
				</div>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th style="vertical-align: middle;" scope="col">Unidad Educativa</th>
						<th style="vertical-align: middle;" scope="col">Nombre Estudiante</th>
						<th style="vertical-align: middle;" scope="col">Apellido Estudiante</th>
						<th style="vertical-align: middle;" scope="col">Correo</th>
						<th style="vertical-align: middle;" scope="col">Estado</th>
						<th style="vertical-align: middle;" scope="col">Curso</th>
						<th style="vertical-align: middle;" scope="col">Materia</th>
						<th style="vertical-align: middle;" scope="col">Ultimo Acceso</th>
					</tr>
				</thead>
				<tbody>
					@if ($estudiantes->isNotEmpty())
					@foreach ($estudiantes as $element)
					<tr>
						<td>{{$element->instituto}}</td>
						<td>{{$element->user_nombre}} </td>
						<td>{{ $element->user_apellido }}</td>
						<td>{{ $element->email }}</td>
						<td class="text-center">
							<span class="badge @if($element->estado == 'on') badge-success @else badge-danger @endif">
								{{ $element->estado }}
							</span>
						</td>
						<td>{{$element->nombre_curso}}</td>
						<td width="200">{{$element->nombre_materia}}</td>
						<td>
							@isset ($element->access_at)
							{{Carbon\Carbon::parse($element->access_at)->diffForHumans()}}
							@else
							Sin Ingreso
							@endisset
						</td>
					</tr>
					@endforeach
					@else
					<tr>
						<td class="text-center" colspan="8"><p class="font-weight-bold">No se ha encontrado registros para el filtro realizado</p></td>
					</tr>
					@endif
				</tbody>
			</table>
		</div>
		
		<!-- /.card-body -->
	</div>
	<div class="row justify-content-center">
		{!! $estudiantes->links() !!}
	</div>
</div>