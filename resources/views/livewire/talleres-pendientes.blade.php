<div class="container">
	<div class="card gedf-card">
		<div class="card-header">
			<div class="d-flex justify-content-between align-items-center">
				<div class="d-flex justify-content-between align-items-center">
					<div class="ml-2">
						<div class="h5 m-0">Talleres por calificar</div>
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
						<th width="50">Vista Taller</th>
					</tr>
				</thead>
				<tbody>
					@forelse($users as $taller)
					<tr>
						<td>{{$taller->cur_nombre}}</td>
						<td>{{$taller->alumno}}</td>
						<td>{{$taller->apelli }}</td>
						<td>{{$taller->conte_name}}</td>
						<td>{{$taller->nombre}}</td>
						<td>
							<div class="truncate-overflow">
								{!!$taller->enunciado!!}
							</div>
						</td>
						<td class="table-button " width="50">
							<a class="btn btn-info"
								href="{{route('taller.docente',['plant'=>$taller->plantilla_id,'id'=>$taller->taller_id, 'user'=>$taller->user_id])}}"><i
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
		{!! $users->links() !!}
	</div>
</div>