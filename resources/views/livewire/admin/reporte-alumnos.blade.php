<div>
	<!--aqui esta la seccion del reporte de la unidad educativa-->
	<br>
	<div class="btn-group float-right" role="group" aria-label="Basic example">
		<a class="btn btn-success float-right" href="" wire:click.prevent="exportarExcel()"> <i class="fad fa-file-excel"></i>
		Generar Reporte</a>
	</div>
	<br>
	<br>
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Alumnos Asignados A Un Docentes</h3>
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
					<select wire:model="paralelo" class="custom-select " id="grid-state">
						<option value="" selected="" disabled="">Selecciona un paralelo</option>
						<option value="">TODOS LOS PARALELO</option>
						@foreach ($nivels as $nivel)
						<option value="{{ $nivel->nombre }}">{{ $nivel->nombre }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-lg-3 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="nombre" type="text" class="form-control" placeholder="Buscar Nombre Docente...">
				</div>
					<div class="col-lg-3 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="apellido" type="text" class="form-control" placeholder="Buscar Apellido Docente...">
				</div>
					<div class="col-lg-3 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="alumno_nombre" type="text" class="form-control" placeholder="Buscar Nombre Estudiante...">
				</div>
					<div class="col-lg-3 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="alumno_apellido" type="text" class="form-control" placeholder="Buscar Apellido Estudiante...">
				</div>

			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th style="vertical-align: middle;" scope="col">Unidad Educativa</th>
						<th style="vertical-align: middle;"  scope="col">Nombre Docente</th>
						<th style="vertical-align: middle;"  scope="col">Apellido Docente</th>
						<th width="200" style="vertical-align: middle;"  scope="col">Materia</th>
						<th style="vertical-align: middle;"  scope="col">Curso</th>
						<th style="vertical-align: middle;"  scope="col">Nombre Estudiante</th>
						<th style="vertical-align: middle;"  scope="col">Apellido Estudiante</th>
						<th width="75" style="vertical-align: middle;"  scope="col">Paralelo</th>
					</tr>
				</thead>
				<tbody>
					@if ($alumnos->isNotEmpty())
					@foreach ($alumnos as $element)
					<tr>
						<td>{{$element->instituto}}</td>
						<td>{{$element->docente_nombre}} </td>
						<td>{{ $element->docente_apellido }}</td>
						<td >{{$element->materia}}</td>
						<td>{{ $element->curso }}</td>
						<td>{{$element->estudiamte_nombre}} </td>
						<td>{{ $element->estudiamte_apellido }}</td>
						<td class="text-center"><span class="badge badge-danger">{{ $element->nivel_nombre }}</span></td>
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
		{!! $alumnos->links() !!}
	</div>
</div>