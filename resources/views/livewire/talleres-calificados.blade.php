<div class="container">
	<!--aqui esta la seccion del reporte de la unidad educativa-->
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
	<div class="card gedf-card">
		<div class="card-header">
			<div class="d-flex justify-content-between align-items-center">
				<div class="d-flex justify-content-between align-items-center">
					<div class="ml-2">
						<div class="h5 m-0">Talleres Calificados</div>
						<div class="h7 text-muted"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
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
					<input wire:model.debounce.300ms="curso" type="text" class="form-control" placeholder="Buscar Curso...">
				</div>
				
				<div class="col-lg-3 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="nombre" type="text" class="form-control" placeholder="Buscar Nombre Estudiante...">
				</div>
				<div class="col-lg-3 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="apellido" type="text" class="form-control" placeholder="Buscar Apellido Estudiante...">
				</div>
				<div class="col-lg-2 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="unidad" type="text" class="form-control" placeholder="Unidad...">
				</div>
				<div class="col-lg-3 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="taller" type="text" class="form-control" placeholder="Buscar Taller...">
				</div>
				<div class="col-lg-5 col-sm-12 mt-2">
					<input wire:model.debounce.300ms="enunciado" type="text" class="form-control" placeholder="Buscar Enunciado...">
				</div>
				<div class="col-lg-3 col-sm-12 mt-2">
					<select wire:model="calificacion" class="custom-select " id="grid-state">
						<option value="" selected="">CALIFICACIONES</option>
						<option>1 </option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
					</select>
				</div>
			</div>
			<table  class="table table-hover">
				<thead>
					<tr>
						<th width="150">Curso</th>
						<th width="175">Nombre Alumno</th>
						<th width="175">Apellido Alumno</th>
						<th width="100">Unidad</th>
						<th width="75"> Taller </th>
						<th>Enunciado </th>
						<th>Calificacion </th>
						<th width="50">Vista Taller</th>
					</tr>
				</thead>
				<tbody>
					@forelse($calificados as $taller1)
					<tr>
						<td>{{$taller1->cur_nombre}}</td>
						<td>{{$taller1->alumno}}</td>
						<td>{{$taller1->apelli }}</td>
						<td>{{$taller1->conte_name}}</td>
						<td>{{$taller1->nombre}}</td>
						<td>
							<div class="truncate-overflow">
								{!!$taller1->enunciado!!}
							</div>
						</td>
                        <td class="text-center">{{$taller1->calificacion}}</td>
						<td class="table-button " width="50">
							<a class="btn btn-info"
								href="{{route('taller.docente',['plant'=>$taller1->plantilla_id,'id'=>$taller1->taller_id, 'user'=>$taller1->user_id])}}"><i
							class="fas fa-eye"></i></a>
						</td>
					</tr>
					@empty
					<tr>
						<td class="text-center" colspan="8"><p class="font-weight-bold">No se ha encontrado registros para el filtro realizado</p></td>
					</tr>
					@endforelse
				</tbody>
			</table>
			
			
		</div>
	</div>
		<div class="row justify-content-center">
		{!! $calificados->links() !!}
	</div>
</div>