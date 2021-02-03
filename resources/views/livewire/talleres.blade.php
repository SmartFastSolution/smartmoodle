<div>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		@foreach ($contenidos as $c => $contenido)
		<li class="nav-item">
			<a class="nav-link @if ($c== 0) active @endif " id="contenido{{ $contenido->id }}-tab" data-toggle="tab"
				href="#contenido{{ $contenido->id }}" role="tab" aria-controls="contenido{{ $contenido->id }}"
			aria-selected="true">{{ $contenido->nombre }}</a>
		</li>
		@endforeach
	</ul>
	
	
	<div class="tab-content" id="myTabContent">
		@foreach ($contenidos as $c => $contenido)
		<div class="tab-pane fade show @if ($c== 0) active @endif " id="contenido{{ $contenido->id }}"
			role="tabpanel" aria-labelledby="contenido{{ $contenido->id }}-tab">
			<div class="row justify-content-center">
				<div class="col-12">
					<!-- Inicio de Talleres -->
					<div class="card card-gray-dark mt-2">
						<div class="card-header">
							<h3 class="card-title">Talleres</h3>
						</div>
						<div class="card-body">
							<table class="table table-hover">
								<thead>
									<tr class="text-center">
										{{-- <th scope="col" width="100">Unidad</th> --}}
										<th scope="col" width="100"> Taller </th>
										<th scope="col">Enunciado </th>
										{{-- <th scope="col">Estado</th> --}}
										{{-- <th scope="col">Fecha Entrega</th> --}}
										<th scope="col" colspan="2">Opciones</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($talleres= App\Taller::where('contenido_id', $contenido->id)->where('estado', 0)->paginate(3) as $taller)
									<tr>
										{{-- <td>{{$taller->contenido->nombre}}</td> --}}
										<td>{{$taller['nombre']}}</td>
										<td >   <div class="truncate-overflow">
                            {!!$taller['enunciado']!!}
                                
                            </div></td>
										{{-- <td>
											@if ($taller['estado'] == 1)
											<span class="badge-success badge">activo</span>
											@else
											<span class="badge-danger badge">desactivado</span>
											@endif
											<div class="onoffswitch">
												<input type="checkbox" name="onoffswitch"
												class="onoffswitch-checkbox"
												id="myonoffswitch.{{ $taller->id }}" tabindex="0" @if($taller['estado'] ==1) checked @endif>
												<label class="onoffswitch-label"
													for="myonoffswitch.{{ $taller->id }}">
													<span class="onoffswitch-inner"></span>
													<span class="onoffswitch-switch"></span>
												</label>
											</div>
										</td> --}}
										{{-- <td>{{$taller->fecha_entrega}}</td> --}}
										<td class="table-button ">
											<a class="btn btn-info"
												href="{{route('taller',['plant'=>$taller->plantilla_id,'id'=>$taller->id])}}"><i
												class="fas fa-eye"></i>
											</a>
										</td>
										<td>
											<a data-toggle="modal" data-target="#fecha" class="btn btn-warning" href="#" wire:click.prevent="active({{ $taller->id }})">
											<i class="fas fa-edit"></i></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<div class="row justify-content-center mt-4">
								{{  $talleres->links() }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		<div class="modal fade" wire:ignore.self id="fecha" tabindex="-1" aria-labelledby="fechaLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="fechaLabel">Opciones</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						@if ($errors->any())
					     <div class="alert alert-danger alert-has-icon">
		                      <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
		                      <div class="alert-body">
		                        <div class="alert-title">Alerta, tienes los siguientes errores</div>
		                        @foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
		                      </div>
		                    </div>
					@endif
						<div class="form-row justify-content-center">
					{{-- 		<div class="form-group col-4">
								<label for="" class="col-form-label">Estado :</label>
								<div class="onoffswitch" v-if="">
									<input type="checkbox" v-model="estado" name="onoffswitch"
									class="onoffswitch-checkbox" id="myonoffswitch" tabindex="0">
									<label class="onoffswitch-label" for="myonoffswitch">
										<span class="onoffswitch-inner"></span>
										<span class="onoffswitch-switch"></span>
									</label>
								</div>
							</div> --}}
							<div class="form-group col-12">
								<label for="" class="col-form-label">Fecha de entrega:</label>
								<input type="date" class="form-control" wire:model="date">
							</div>
							<div class="form-group col-12">
								<label for="" class="col-form-label">Paralelos:</label>
								<select  wire:model="paralelo_id" class="form-control"  >
									<option value="" selected="" disabled="">SELECCIONA UN PARALELO</option>
									@foreach ($paralelos as $paralelo)
										<option value="{{ $paralelo->id }}">PARALELO {{ $paralelo->nombre }}</option>
									@endforeach
								</select>
							</div>
							<div class="col-4">
							<a href="#" class="btn btn-danger text-center btn-block" wire:click.prevent="activar()">ACTIVAR</a>
								
							</div>
						</div>
					</div>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
	</div>
<br>
<br>
<br>
<h2 class="text-center font-weight-bold text-danger">TALLERES ACTIVADOS</h2>
<div class="row mt-5 justify-content-center mb-5">
	<div class="col-12">
		<table class="table table-bordered">
			<thead class="table-dark">
				<tr class="text-center">
					<th scope="col" width="100">Unidad</th>
					<th scope="col" width="100"> Taller </th>
					<th scope="col">Enunciado </th>
					<th scope="col">Paralelo </th>
					<th scope="col">Estado</th>
					<th  scope="col">Fecha Entrega</th>
					<th scope="col" colspan="2">Opciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($activados as $activo)
				<tr>
					<td>{{ $activo->nombre_unidad }}</td>
					<td>{{ $activo->nombre_taller }}</td>
					<td>{{ $activo->enunciado_taller }}</td>
					<td class="text-center">{{ $activo->paralelo }}</td>
					<td class="text-center">
						@if ($activo->estado == 1)
							<span class="badge-success badge">activo</span>
						@else
							<span class="badge-danger badge">desactivado</span>
						@endif
					</td>
					<td class="text-center">{{ $activo->fecha_entrega }}</td>
					<td class="text-center">
						<a data-toggle="modal" data-target="#fecha" class="btn btn-warning" href="#" wire:click.prevent="active({{ $activo->id }})">
							<i class="fas fa-edit"></i>
						</a>
					</td>
						<td class="table-button text-center">
						<a class="btn btn-info"
							href="{{route('taller',['plant'=>$activo->plantilla_id,'id'=>$activo->taller_id])}}"><i
							class="fas fa-eye"></i>
						</a>
					</td>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
</div>