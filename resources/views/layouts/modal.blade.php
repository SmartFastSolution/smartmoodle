<div class="modal fade" id="taller1" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-warning">
            <div class="modal-header">
                <h5 class="modal-title" id="taller1Label">TALLER COMPLETE EL ENUNCIADO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller1') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input required="" type="hidden" value="1" name="id_plantilla">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                                <div class="form-row">
                                  <div class="form-group col-6">
                                    <label for="recipient-name" class="col-form-label">Materia:</label>
                                    <select name="materia_id" class="custom-select" >
                                      @foreach ($materias = App\Materia::get() as $materia)
                                      <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                   <div class="form-group col-6">
                                    <label for="" class="col-form-label">Imagen(Opcional):</label>
                                        <input type="file" class="inputfile inputfile-1" name="imagen" id="file-1">
                                        <label for="file-1"><i class="fas fa-upload"></i> <span>Elegir Archivo&hellip;</span></label>
                                   
                                  </div>
                    </div>
                      <div class="form-group">
                        <label for="" class="col-form-label">Leyenda(Usar cuando no hay imagen):</label>
                        <textarea  class="form-control" name="leyenda" ></textarea>
                      </div>
                    <div class="row justify-content-center">
                        <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                      </div>
                    </form>
                  </div>
                </div>
                            </div>
           <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="taller2" tabindex="-1" role="dialog" aria-labelledby="taller2Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller2Label">CLASIFICAR CON ORIGINALIDAD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller2') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="2" name="id_plantilla">

                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Imagen:</label>
                                    <input type="file" class="inputfile inputfile-1" id="ta2-1" name="imagen">
                                    <label for="ta2-1"><i class="fas fa-upload"></i> <span>Elegir Archivo&hellip;</span></label>
                               
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="taller3" tabindex="-1" role="dialog" aria-labelledby="taller3Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller3Label">COMPLETAR LOS ENUNCIADOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12" >
                        <form action="{{ route('admin.taller3') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="3" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                    <div class="enun">
                        <div class="form-row">
                            <div class="form-group col-11" >
                                <label for="recipient-name" class="col-form-label">Enunciado 1:</label>
                                <input required="" type="text" name="enun[]" class="form-control">
                            </div>
                            <div class="form-group col-1" >
                                <label for="recipient-name" class="col-form-label">Borrar:</label><br>
                                <a href="#" class="btn btn-danger remove_enun"><span class="glyphicon glyphicon-remove">X</span></a>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <a href="#" class="addEnun btn btn-outline-danger">Agregar Columna</a>
                        </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="taller4" tabindex="-1" role="dialog" aria-labelledby="taller4Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller4Label">ESCRIBIR DIFERENCIAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller4') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="4" name="id_plantilla">
                                <textarea required="" required="" type="text" name="enunciado"
                                    class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row justify-content-center">
                                <div class="form-group col-md-5">
                                    <label for="" class="col-form-label ">Imagen 1:</label>
                                    
                                       <input type="file" class="inputfile inputfile-1" name="img1" id="ta4-1">
                                        <label for="ta4-1"><i class="fas fa-upload"></i> <span>Elegir Archivo&hellip;</span></label>
                                  
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="" class="col-form-label ">Imagen 2:</label>
                                    
                                       <input type="file" class="inputfile inputfile-1" name="img2" id="ta4-2">
                                        <label for="ta4-2"><i class="fas fa-upload"></i> <span>Elegir Archivo&hellip;</span></label>
                                    
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- FORMULARIO PARA PLANTILLA 5 -->

<div class="modal fade bd-example-modal-lg" id="taller5" tabindex="-1" role="dialog" aria-labelledby="taller5Label"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller5Label">SEÑALAR ALTERNATIVA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller5') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="5" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                              <div class="taller5">
                                  <div class="form-group row mb-3 p-3">
                                      <label for="" class="col-4 col-form-label">CONCEPTO 1:</label>
                                      <div class="col-8">
                                        <div class="form-row">
                                          <div class="col-10">
        
                                          <input required="" type="text" name="concepto[]" class="form-control mb-2">

                                          </div>
                                          <div class="col-2">  
                                  <a href="#" class="btn btn-danger remove_con"><span class="glyphicon glyphicon-remove">X</span></a>

                                          </div>
                                        </div>
                                      </div>
                                      <label for="" class="col-form-label">Alternativa 1:</label>
                                        <textarea required="" required="" name="alternativa1[]" class="form-control"rows="5"></textarea>
                                      <label for="" class="col-form-label">Alternativa 2:</label>
                                       <textarea required="" required="" name="alternativa2[]" class="form-control" rows="5"></textarea>
                                  </div>
                                </div>

                                  <div class="row">
                                    <a href="#" class="addCon btn btn-outline-danger">Agregar Fila</a>
                                </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- FORMULARIO PARA PLANTILLA 6 -->

<div class="modal fade" id="taller6" tabindex="-1" role="dialog" aria-labelledby="taller6Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller6Label">IDENTIFICAR IMAGENES</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller6') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="6" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                                 <div class="form-group">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fila A</th>
                                            <th scope="col">Fila B</th>
                                        </tr>
                                    </thead>

                                    <tbody class="img_id">
                                        <tr>
                                            <td scope="row">
                                                <div class="custom-file">
                                                  <input type="file" class="custom-file-input" name="col_a[]"
                                                       >
                                                    <label class="custom-file-label" for="customFile">Seleciona un
                                                        archivo</label>
                                                </div>
                                            </td>
                                            <td scope="row">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="col_b[]"
                                                       >
                                                    <label class="custom-file-label" for="customFile">Seleciona un
                                                        archivo</label>
                                                </div>
                                            </td>
                                            <td><a href="#" class="btn btn-danger re"><span
                                                        class="glyphicon glyphicon-remove">X</span></a></td>
                                        </tr>
                                    </tbody>

                                </table>
                                <div class="row">
                                    <a href="#" class="addImg btn btn-outline-danger">Agregar Fila</a>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- FORMULARIO PARA PLANTILLA 7 -->

<div class="modal fade" id="taller7" tabindex="-1" role="dialog" aria-labelledby="taller7Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller7Label">ESCRIBIR EN EL GUSANILLO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller7') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="7" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 8 -->

<div class="modal fade" id="taller8" tabindex="-1" role="dialog" aria-labelledby="taller8Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller8Label">ESCRIBIR EN CIRCULOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller8') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="8" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Imagen Central: </label>                          
                                 <input type="file" class="inputfile inputfile-1" name="img" id="ta8-1">
                                <label for="ta8-1"><i class="fas fa-upload"></i> <span>Elegir Archivo&hellip;</span></label>                           
                            </div>
                               <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Cantidad de circulos:</label>
                                <select name="cantidad" class="custom-select">               
                                    <option value="3">3</option>           
                                    <option value="4">4</option>           
                                    <option value="5">5</option>           
                                    <option value="6">6</option>           
                                </select>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- FORMULARIO PARA PLANTILLA 9 -->

<div class="modal fade" id="taller9" tabindex="-1" role="dialog" aria-labelledby="taller9Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller9Label">SUBRAYAR LA ALTERNATIVA CORRECTA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller9') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="9" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                          <div class="enc_9">
                            <div class="form-row bg-light p-2 mb-2">
                              <div class="form-group col-12">
                                  <div class="row">
                                    <div class="col-2">
                                      <label for="concepto6" class="col-form-label">Concepto 1 : </label>
                                    </div>
                                    <div class="col-9">
                                      <textarea name="concep[]" class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="col-1">
                                      <a href="#" class="btn btn-danger re_tall9"><span class="glyphicon glyphicon-remove">X</span></a>
                                    </div>
                                  </div>
                              </div>
                              <div class="form-group col-12">
                                <label for="concepto6" class="col-form-label">Alternativas:</label>
                                <input required="" type="text" data-role="tagsinput" name="alter[]"
                                    class="form-control">
                              </div>
                            </div>
                          </div>
                           <div class="row">
                                  <a href="#" class="addTaller9 btn btn-outline-danger">Agregar Fila</a>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 10 -->

<div class="modal fade" id="taller10" tabindex="-1" role="dialog" aria-labelledby="taller10Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller10Label">RELACIONAR LOS ENUNCIADOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller10') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="10" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                          <div class="tall_10">
                            <div class="form-group bg-light p-2">
                                <div class="form-inline">
                                    <label for="enunciado1" class="col-form-label pr-2">Enunciado 1 </label>
                                    <input required="" type="text" name="enunciados[]" class="form-control m-2">
                                    <a href="#" class="btn btn-danger re_tall10">
                                      <span class="glyphicon glyphicon-remove">X</span></a> </div>
                                <div class="form-inline">
                                    <label for="img1" class="col-form-label">Imagen 1:</label>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img[]">
                                    <label class="custom-file-label" for="customFile">Seleciona un archivo</label>
                                </div>
                                <label for="concepto6" class="col-form-label">Definicion 1:</label>
                                <textarea required="" name="definicion[]" class="form-control" rows="5"></textarea>
                            </div>
                          </div>
                            <div class="row">
                                  <a href="#" class="addTaller10 btn btn-outline-danger">Agregar Fila</a>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>



<!-- FORMULARIO PARA PLANTILLA 11 -->

<div class="modal fade" id="taller11" tabindex="-1" role="dialog" aria-labelledby="taller10Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller10Label">RELACIONAR LOS ENUNCIADOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller10') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="11" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group bg-light p-2">
                                <div class="form-inline">
                                    <label for="enunciado1" class="col-form-label pr-2">Enunciado 1 : </label>
                                    <input required="" type="text" name="enunciado1" class="form-control">
                                </div>
                                <div class="form-inline">
                                    <label for="img1" class="col-form-label">Imagen 1:</label>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img1" lang="es">
                                    <label class="custom-file-label" for="customFile">Seleciona un archivo</label>
                                </div>

                            </div>

                            <div class="form-group bg-light p-2">
                                <div class="form-inline">
                                    <label for="enunciado2" class="col-form-label pr-2">Enunciado 2 : </label>
                                    <input required="" type="text" name="enunciado2" class="form-control">
                                </div>
                                <div class="form-inline">
                                    <label for="img2" class="col-form-label">Imagen 2:</label>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="img2" lang="es">
                                    <label class="custom-file-label" for="customFile">Seleciona un archivo</label>
                                </div>
                            </div>
                          <div class="tall_11">
                            <div class="form-group bg-light p-2">
                                <label for="concepto6" class="col-form-label m-2">Definicion  1  <a href="#" class="btn btn-danger re_tall11">
                                      <span class="glyphicon glyphicon-remove">X</span></a> </label>
                                <textarea required="" name="definicion[]" class="form-control" rows="5"></textarea>
                            </div>
                          </div>
                          <div class="row">
                                  <a href="#" class="addTaller11 btn btn-outline-danger">Agregar Fila</a>
                            </div>

                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 12 -->
<div class="modal fade" id="taller12" tabindex="-1" role="dialog" aria-labelledby="taller12Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller12Label">TALLER VERDADERO & FALSO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller12') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input required="" type="hidden" value="12" name="id_plantilla">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="tall_12">
                            <div class="form-group">
                                <label for="" class="col-form-label">Descripcion 1 <a href="#" class="btn btn-danger re_tall12"><span class="glyphicon glyphicon-remove">X</span></a></label>
                                <textarea required="" class="form-control" name="descripcion[]"></textarea>
                            </div>
                        </div>
        
                           <div class="row">
                                  <a href="#" class="addTaller12 btn btn-outline-danger">Agregar Fila</a>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 13 -->
<div class="modal fade" id="taller13" tabindex="-1" role="dialog" aria-labelledby="taller13Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller13Label">DEFINIR ENUNCIADOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller13') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="13" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                           <div class="tall_13">
                            <div class="form-group">
                                <label for="" class="col-form-label">Concepto 1 <a href="#" class="btn btn-danger re_tall13"><span class="glyphicon glyphicon-remove">X</span></a></label>
                                <input required="" type="text" name="concepto[]" class="form-control">
                            </div>
                          </div>
                          <div class="row">
                                  <a href="#" class="addTaller13 btn btn-outline-danger">Agregar Fila</a>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- FORMULARIO PARA PLANTILLA 14 -->
<div class="modal fade" id="taller14" tabindex="-1" role="dialog" aria-labelledby="taller14Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller14Label">IDENTIFICAR PERSONAS QUE INTERVIENEN EN CHEQUE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller14') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="14" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Descripcion :</label>
                                <textarea required="" name="descripcion" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="row justify-content-center">

                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- FORMULARIO PARA PLANTILLA 15 -->
<div class="modal fade" id="taller15" tabindex="-1" role="dialog" aria-labelledby="taller15Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller15Label">LLENAR CHEQUE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller15') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="15" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Girador :</label>
                                    <input required="" type="text" name="girador" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Girado :</label>
                                    <input required="" type="text" name="girado" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Cantidad :</label>
                                    <input required="" type="text" name="cantidad" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Lugar :</label>
                                    <input required="" type="text" name="lugar" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Fecha :</label>
                                    <input required="" type="date" name="fecha" class="form-control">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>



<!-- FORMULARIO PARA PLANTILLA 16 -->
<div class="modal fade" id="taller16" tabindex="-1" role="dialog" aria-labelledby="taller16Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="taller16Label">ENDOSAR CHEQUE</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller16') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="16" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Endoso a :</label>
                                <input required="" type="text" name="endoso" class="form-control">
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 17 -->
<div class="modal fade" id="taller17" tabindex="-1" role="dialog" aria-labelledby="taller17Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller17Label">CONVERTIR CHEQUE</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller17') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="17" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Nombre :</label>
                                    <input required="" type="text" name="nombre" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Cantidad :</label>
                                    <input required="" type="text" name="cantidad" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Numero:</label>
                                    <input required="" type="text" name="numero" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Lugar :</label>
                                    <input required="" type="text" name="lugar" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Fecha :</label>
                                    <input required="" type="date" name="fecha" class="form-control">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 18 -->
<div class="modal fade" id="taller18" tabindex="-1" role="dialog" aria-labelledby="taller18Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller18Label">LETRA DE CAMBIO</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller18') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="18" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Acreedor :</label>
                                    <input required="" type="text" name="acreedor" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Deudor:</label>
                                    <input required="" type="text" name="deudor" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Valor :</label>
                                    <input required="" type="text" name="valor" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Tasa de interes :</label>
                                    <input required="" type="text" name="tasa_de_interes" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Fecha de vencimiento :</label>
                                    <input required="" type="date" name="fecha_de_vencimiento" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Lugar :</label>
                                    <input required="" type="text" name="lugar" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Fecha de emision :</label>
                                    <input required="" type="date" name="fecha_de_emision" class="form-control">
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 19 -->
<div class="modal fade" id="taller19" tabindex="-1" role="dialog" aria-labelledby="taller19Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller19Label">CERTIFICADO DE DEPOSITO</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller19') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="19" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Beneficiario :</label>
                                <input required="" type="text" name="beneficiario" class="form-control">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Valor :</label>
                                    <input required="" type="text" name="valor" class="form-control">
                                </div>

                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Interes Anual:</label>
                                    <input required="" type="text" name="interes_anual" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Lugar :</label>
                                    <input required="" type="text" name="lugar" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Fecha de emision :</label>
                                    <input required="" type="date" name="fecha_de_emision" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Plazo de vencimiento :</label>
                                    <input required="" type="text" name="plazo_de_vencimiento" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Fecha de vencimiento :</label>
                                    <input required="" type="date" name="fecha_de_vencimiento" class="form-control">
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<!-- FORMULARIO PARA PLANTILLA 20 -->
<div class="modal fade" id="taller20" tabindex="-1" role="dialog" aria-labelledby="taller20Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller20Label">COMPLETAR PAGARÉ</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller20') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="20" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Beneficiario :</label>
                                    <input required="" type="text" name="beneficiario" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Deudor :</label>
                                    <input required="" type="text" name="deudor" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Garante:</label>
                                    <input required="" type="text" name="garante" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Valor :</label>
                                    <input required="" type="text" name="valor" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Plazo de Pago :</label>
                                    <input required="" type="text" name="plazo_pago" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Tasa de interes :</label>
                                    <input required="" type="text" name="tasa_interes" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Lugar :</label>
                                    <input required="" type="text" name="lugar" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Fecha de emision :</label>
                                    <input required="" type="date" name="fecha_emision" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Fecha de vencimiento :</label>
                                    <input required="" type="date" name="fecha_de_vencimiento" class="form-control">
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 21 -->
<div class="modal fade" id="taller21" tabindex="-1" role="dialog" aria-labelledby="taller21Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller21Label">COMPLETAR VALE DE CAJA</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller21') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="21" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Deudor :</label>
                                    <input required="" type="text" name="deudor" class="form-control">
                                </div>
                                <div class="form-group col-8">
                                    <label for="" class="col-form-label">Detalle:</label>
                                    <input required="" type="text" name="detalle" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Valor :</label>
                                    <input required="" type="text" name="valor" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Lugar :</label>
                                    <input required="" type="text" name="lugar" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Fecha :</label>
                                    <input required="" type="date" name="fecha" class="form-control">
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>




<!-- FORMULARIO PARA PLANTILLA 22 -->
<div class="modal fade" id="taller22" tabindex="-1" role="dialog" aria-labelledby="taller22Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller22Label">NOTA DE PEDIDO</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller22') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="22" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Pedido :</label>
                                    <input required="" type="text" name="pedido" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Cantidad :</label>
                                    <input required="" type="text" name="cantidad" class="form-control">
                                </div>
                                 <div class="form-group col-4">
                                    <label for="" class="col-form-label">Precio Unitario :</label>
                                    <input required="" type="text" name="precio_unit" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-form-label">Detalle :</label>
                                <input required="" type="text" name="detalle" class="form-control">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Codigo :</label>
                                    <input required="" type="text" name="codigo" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Lugar :</label>
                                    <input required="" type="text" name="lugar" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Fecha :</label>
                                    <input required="" type="date" name="fecha" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-8">
                                    <label for="" class="col-form-label">Firma de Bodeguero :</label>
                                    <input required="" type="text" name="firma" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Plazo de entrega :</label>
                                    <input required="" type="text" name="plazo_entrega" class="form-control">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 23 -->
<div class="modal fade" id="taller23" tabindex="-1" role="dialog" aria-labelledby="taller23Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller23Label">RECIBO</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller23') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="23" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Acreedor :</label>
                                    <input required="" type="text" name="acreedor" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Deudor :</label>
                                    <input required="" type="text" name="deudor" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-9">
                                    <label for="" class="col-form-label">Descripcion :</label>
                                    <input required="" type="text" name="descripcion" class="form-control">
                                </div>
                                <div class="form-group col-3">
                                    <label for="" class="col-form-label">Valor :</label>
                                    <input required="" type="text" name="valor" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Direccion :</label>
                                    <input required="" type="text" name="direccion" class="form-control">
                                </div>

                                <div class="form-group col-3">
                                    <label for="" class="col-form-label">Lugar :</label>
                                    <input required="" type="text" name="lugar" class="form-control">
                                </div>
                                <div class="form-group col-3">
                                    <label for="" class="col-form-label">Fecha :</label>
                                    <input required="" type="date" name="fecha" class="form-control">
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 24 -->
<div class="modal fade" id="taller24" tabindex="-1" role="dialog" aria-labelledby="taller24Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller24Label">Orden de Pago</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller24') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="24" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Beneficiario :</label>
                                    <input required="" type="text" name="beneficiario" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Comprobante :</label>
                                    <input required="" type="text" name="comprobante" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Cantidad :</label>
                                    <input required="" type="text" name="cantidad" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">fecha de la Orden:</label>
                                    <input required="" type="text" name="lugar" class="form-control">
                                </div>
                                <div class="form-group col-4">
                                    <label for="" class="col-form-label">Fecha del comprobante de pago:</label>
                                    <input required="" type="date" name="fecha" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Firmas :</label>
                                <input required="" type="text" name="firmas" class="form-control">
                            </div>


                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>




<!-- FORMULARIO PARA PLANTILLA 25 -->
<div class="modal fade " id="taller25" tabindex="-1" role="dialog" aria-labelledby="taller25Label" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller25Label">FACTURA</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller25') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="25" name="id_plantilla">
                                <textarea required="" required="" name="enunciado" class="form-control" id=""
                                    rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="" class="col-form-label">Cliente :</label>
                                    <input required="" type="cliente" name="cliente" class="form-control">
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="" class="col-form-label">IVA :</label>
                                    <input required="" type="text" name="iva" class="form-control">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="" class="col-form-label">Descuento :</label>
                                    <input required="" type="numeric" name="descuento" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="" class="col-form-label">RUC :</label>
                                    <input required="" type="text" name="ruc" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="" class="col-form-label">Guia de Remision :</label>
                                    <input required="" type="text" name="remision" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="" class="col-form-label">Fecha de emision :</label>
                                    <input required="" type="date" name="fecha_emision" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Codigo Auxiliar</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Precio Unitario</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fac">
                                        <tr>
                                            <th scope="row" id="num"></th>
                                            <td><input type="text" class="form-control" name="cod[]"></td>
                                            <td><input type="text" class="form-control" name="cod_aux[]"></td>
                                            <td><input type="text" class="form-control" name="cant[]"></td>
                                            <td><input type="text" class="form-control" name="desc[]"></td>
                                            <td><input type="text" class="form-control" name="precio[]"></td>
                                            <td><a href="#" class="btn btn-danger remove"><span
                                                        class="glyphicon glyphicon-remove">X</span></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <a href="#" class="addFac btn btn-outline-danger">Agregar Columna</a>
                                </div
>                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 26 -->
<div class="modal fade" id="taller26" tabindex="-1" role="dialog" aria-labelledby="taller26Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller26Label">NOTA DE VENTA</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller26') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="26" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Nombre :</label>

                                <input required="" type="text" name="nombre" class="form-control">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">RUC :</label>
                                    <input required="" type="text" name="ruc" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Fecha :</label>
                                    <input required="" type="date" name="fecha" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Precio Unitario</th>
                                        </tr>
                                    </thead>
                                    <tbody class="nota_v">
                                        <tr>
                                            <th scope="row" id="num1"></th>
                                            <td><input type="text" class="form-control" name="cant[]"></td>
                                            <td><input type="text" class="form-control" name="desc[]"></td>
                                            <td><input type="text" class="form-control" name="precio[]"></td>
                                            <td><a href="#" class="btn btn-danger rem"><span
                                                        class="glyphicon glyphicon-remove">X</span></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="row">
                                    <a href="#" class="addNot btn btn-outline-danger">Agregar Columna</a>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 27 -->
<div class="modal fade" id="taller27" tabindex="-1" role="dialog" aria-labelledby="taller27Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller27Label">SIGNIFICADO DE ABREVIATURAS</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller27') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="27" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fila A</th>
                                            <th scope="col">Fila B</th>
                                        </tr>
                                    </thead>

                                    <tbody class="prin">
                                        <tr>
                                            <td scope="row">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="col_a[]"
                                                        >
                                                    <label class="custom-file-label" for="customFile">Seleciona un
                                                        archivo</label>
                                                </div>
                                            </td>
                                            <td scope="row">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="col_b[]"
                                                      >
                                                    <label class="custom-file-label" for="customFile">Seleciona un
                                                        archivo</label>
                                                </div>
                                            </td>
                                            <td><a href="#" class="btn btn-danger remover"><span
                                                        class="glyphicon glyphicon-remove">X</span></a></td>
                                        </tr>
                                    </tbody>

                                </table>
                                <div class="row">
                                    <a href="#" class="addRow btn btn-outline-danger">Agregar Columna</a>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- FORMULARIO PARA PLANTILLA 28 -->
<div class="modal fade" id="taller30" tabindex="-1" role="dialog" aria-labelledby="taller28Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller28Label">RELACIONAR</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller28') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="28" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5">

</textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Nombre :</label>
                                <input required="" type="text" name="nombre" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">RUC :</label>
                                <input required="" type="text" name="ruc" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="" class="col-form-label">Fecha :</label>
                                <input required="" type="text" name="fecha" class="form-control">
                            </div>
                            <div class="form-group">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fila A</th>
                                            <th scope="col">Fila B</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        <tr>
                                            <th scope="row"><input type="file" name="col_a[]" class="custom-file"></th>
                                            <th scope="row"><input type="file" name="col_b[]" class="custom-file"></th>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="addRow btn btn-outline-danger">Agregar Columna</a>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- FORMULARIO PARA PLANTILLA 31 -->
<div class="modal fade" id="taller31" tabindex="-1" role="dialog" aria-labelledby="taller31Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller31Label">COLLAGE</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller34') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="31" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 33 -->
<div class="modal fade" id="taller33" tabindex="-1" role="dialog" aria-labelledby="taller33Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller33Label">ESCRIBIR PREGUNTAS</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller33') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="33" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Pregunta 1 :</label>
                                    <input required="" type="text" name="pregunta1" class="form-control">
                                </div>
                                <div class="form-group col-6">
                                    <label for="" class="col-form-label">Pregunta 2 :</label>
                                    <input required="" type="text" name="pregunta2" class="form-control">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 34 -->
<div class="modal fade" id="taller34" tabindex="-1" role="dialog" aria-labelledby="taller34Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" id="ejercicios">
            <div class="modal-header">
                <h2 class="modal-title" id="taller34Label">TIPOS DE SALDOS</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <div class="row justify-content-center">
                    <div class="col-12">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="34" name="id_plantilla">
                                <textarea required v-model="taller.enunciado" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select v-model="taller.materia_id" class="custom-select">
                                    <option value="" selected disabled>ELIJA UNA MATERIA</option>
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-row">
                                    <table class="table table-bordered table-sm">
                                      <thead class="thead-dark">
                                        <tr align="center">                        
                                          <th scope="col">NOMBRE DE CUENTAS</th>
                                          <th width="125" scope="col">DEBE</th>
                                          <th  width="125" scope="col">HABER</th>
                                          <th width="25" colspan="2" v-if="registros.length > 0 || ejercicios.debe.length > 0">ACCION</th>
                                        </tr>
                                      </thead>
                                          <tbody v-for="(registro, id) in registros" @change="totalDebe()">
                                            <tr v-for="(diar, index) in registro.debe">
                                                <td align="rigth">@{{ diar.nom_cuenta}}</td>
                                                <td align="center" width="125">@{{ diar.saldo }}</td>
                                                <td align="center" width="125"></td>
                                                <td v-if="index == 0" align="center" width="25"><a @click="debeEditRegister(id)" class="btn btn-warning btn-sm"><i class="fas fas fa-edit"></i></a></td>
                                                <td v-if="index == 0" align="center" width="25"><a @click="deleteRegistro(id)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                            <tr v-for="(diar, index) in registro.haber">
                                                <td style="padding-left:50px">@{{ diar.nom_cuenta}}</td>
                                                <td align="center" width="125"></td>
                                                <td align="center" width="125">@{{ diar.saldo }}</td>
                                            </tr>
                                          </tbody>
                                        <tbody>
                                            <tr v-for="(diar, index) in ejercicios.debe" class="table-info">
                                                <td >@{{ diar.nom_cuenta}}</td>
                                                <td align="center" width="125">@{{ diar.saldo }}</td>
                                                <td align="center" width="125"></td>
                                                <td align="center" width="25">
                                                    <a @click="debediairoEdit(index)" class="btn btn-warning btn-sm"><i class="fas fas fa-edit"></i></a>
                                                </td>
                                                <td align="center" width="25">
                                                    <a @click="deleteDebe(index)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr v-for="(diar, index) in ejercicios.haber" class="table-info">
                                                <td style="padding-left:50px">@{{ diar.nom_cuenta}}</td>
                                                <td align="center" width="125"></td>
                                                <td align="center" width="125">@{{ diar.saldo }}</td>
                                                <td>
                                                    <a @click="habediarioEdit(index)" class="btn btn-warning btn-sm"><i class="fas fas fa-edit"></i></a>
                                                </td>
                                                <td align="center" width="25"><a @click="deleteHaber(index)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr v-for="(diar, index) in edit.debe" class="table-danger">
                                                <td >@{{ diar.nom_cuenta}}</td>
                                                <td align="center" width="125">@{{ diar.saldo }}</td>
                                                <td align="center" width="125"></td>
                                                <td align="center" width="25">
                                                    <a @click="debeEdit(index)" class="btn btn-warning btn-sm"><i class="fas fas fa-edit"></i></a>
                                                </td>
                                                <td align="center" width="25">
                                                    <a @click="debeDelete(index)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            <tr v-for="(diar, index) in edit.haber" class="table-danger">
                                                <td style="padding-left:50px">@{{ diar.nom_cuenta}}</td>
                                                <td align="center" width="125"></td>
                                                <td align="center" width="125">@{{ diar.saldo }}</td>
                                                <td>
                                                    <a @click="haberEdit(index)" class="btn btn-warning btn-sm"><i class="fas fas fa-edit"></i></a>
                                                </td>
                                                <td align="center" width="25"><a @click="haberDelete(index)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        </tbody>                        
                                </table>

         
                            </div>
                            <div v-if="edit.debe.length >= 1" class="form-row justify-content-center">
                                <div class="form-inline col-6">
                                    <input required="" v-model="ejercicio.debe.nom_cuenta"  type="text" placeholder="Actualizar Cuenta " class="form-control-sm mr-1">
                                    <input required="" v-model="ejercicio.debe.saldo" type="text" placeholder="Actualizar saldo" class="form-control-sm">
                                    <a class="btn ml-2 btn-outline-info btn-sm text-center mt-1" href="#" @click.prevent="updateDebe">Actualizar Debe</a>
                                </div>
                                <div class="form-inline col-6">
                                    <input required="" type="text" v-model="ejercicio.haber.nom_cuenta" class="form-control-sm mr-1" placeholder="Actualizar Cuenta ">
                                    <input required="" type="text" v-model="ejercicio.haber.saldo" class="form-control-sm" placeholder="Actualizar saldo">
                                    <a class="btn ml-2 btn-outline-info btn-sm mt-1" href="#" @click.prevent="updateHaber()"> Actualizar Haber</a>
                            </div>
                            <div class="text-center">
                                 <a class="btn ml-2 btn-outline-primary btn-sm mt-1" href="#" @click.prevent="updaterRegister()"> Actualizar Registro</a>
                            </div>
                            </div>

                            <div v-else class="form-row justify-content-center">
                                <div class="form-inline col-6">
                                    <input required="" v-model="ejercicio.debe.nom_cuenta"  type="text" placeholder="Agregar Cuenta " class="form-control-sm mr-1">
                                    <input required="" v-model="ejercicio.debe.saldo" type="text" placeholder="Agregar saldo" class="form-control-sm">
                                    <a class="btn ml-2 btn-outline-info btn-sm text-center mt-1" href="#" @click.prevent="agregarDebe">Agregar Debe</a>
                                </div>
                                <div class="form-inline col-6">
                                    <input required="" type="text" v-model="ejercicio.haber.nom_cuenta" class="form-control-sm mr-1" placeholder="Agregar Cuenta ">
                                    <input required="" type="text" v-model="ejercicio.haber.saldo" class="form-control-sm" placeholder="Agregar saldo">
                                    <a class="btn ml-2 btn-outline-info btn-sm mt-1" href="#" @click.prevent="agregarHaber()"> Agregar Haber</a>
                            </div>
                             <div class="mt-2">
                                 <a class="btn ml-2 btn-outline-success btn-sm mt-1" href="#" @click.prevent="guardarRegistro()"> Agregar Registro</a>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer row justify-content-center">
                 <div class="row">
                    <a class="btn p-2 mt-3 btn-danger" @click.prevent="guardarTaller34()">Crear Taller </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 36 -->
<div class="modal fade" id="taller36" tabindex="-1" role="dialog" aria-labelledby="taller36Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller36Label">ANALIZAR  ENUNCIADOS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller36') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="36" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                           <div class="tall_36">
                            <div class="form-group">
                                <label for="" class="col-form-label">Enunciado 1 <a href="#" class="btn btn-danger re_tall36"><span class="glyphicon glyphicon-remove">X</span></a></label>
                                <textarea required="" class="form-control" name="enun[]"></textarea>
                            </div>
                          </div>
                          <div class="row">
                                  <a href="#" class="addTaller36 btn btn-outline-danger">Agregar Fila</a>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- FORMULARIO PARA PLANTILLA 37 -->
<div class="modal fade" id="taller37" tabindex="-1" role="dialog" aria-labelledby="taller37Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller37Label">TALLERES DE CONTABILIDAD</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller37') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="37" name="id_plantilla">
                                <input type="text"  name="enunciado" value="Crear Enunciados de Contabilidad" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::where('slug', '=', 'contabilidad')->get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="tall_37">
                            <div class="form-group">
                                <label for="" class="col-form-label">Enunciado 1 <a href="#" class="btn btn-danger re_tall37"><span class="glyphicon glyphicon-remove">X</span></a></label>
                                <textarea required="" class="form-control" name="enun[]"></textarea>
                            </div>
                        </div>
                        <div class="row">
                                  <a href="#" class="addTaller37 btn btn-outline-danger">Agregar Fila</a>
                        </div>

                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 38 -->
<div class="modal fade" id="taller38" tabindex="-1" role="dialog" aria-labelledby="taller38Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller38Label">ANALIZAR LECTURA</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller38') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="38" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Lectura:</label>
                                 <textarea class="form-control ckeditor" name="lectura" required=""></textarea>
                            </div>
                        <div class="tall_38">
                            <div class="form-group">
                                <label for="" class="col-form-label">Enunciado 1 <a href="#" class="btn btn-danger re_tall38"><span class="glyphicon glyphicon-remove">X</span></a></label>
                                <textarea required="" class="form-control" name="enun[]"></textarea>
                            </div>
                        </div>
                        <div class="row">
                                  <a href="#" class="addTaller38 btn btn-outline-danger">Agregar Fila</a>
                        </div>

                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="taller39" tabindex="-1" role="dialog" aria-labelledby="taller39Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="taller39Label">ARMAR LA PALABRA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller39') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="39" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                              <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Palabra:</label>
                                <input required="" type="text" class="form-control" name="palabra" placeholder="Escriba la palabra en mayusculas">
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 40 -->
<div class="modal fade" id="taller40" tabindex="-1" role="dialog" aria-labelledby="taller40Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller40Label">IDENTIFICAR TRANSACCIONES</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller40') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="40" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="tall_40">
                            <div class="form-group">
                                <label for="" class="col-form-label">Enunciado 1 <a href="#" class="btn btn-danger re_tall40"><span class="glyphicon glyphicon-remove">X</span></a></label>
                                <textarea required="" class="form-control" name="enun[]"></textarea>
                            </div>
                        </div>
                        <div class="row">
                                  <a href="#" class="addTaller40 btn btn-outline-danger">Agregar Fila</a>
                        </div>

                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 42 -->
<div class="modal fade" id="taller42" tabindex="-1" role="dialog" aria-labelledby="taller42Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="taller42Label">ORDENAR IDEAS</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller42') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="42" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="tall_42">
                            <div class="form-group">
                                <label for="" class="col-form-label">Enunciado 1 <a href="#" class="btn btn-danger re_tall42"><span class="glyphicon glyphicon-remove">X</span></a></label>
                                <input required="" class="form-control" name="enun[]" type="text">
                                {{-- <textarea required="" class="form-control" name="enun[]"></textarea> --}}
                            </div>
                        </div>
                        <div class="row">
                                  <a href="#" class="addTaller42 btn btn-outline-danger">Agregar Fila</a>
                        </div>

                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- FORMULARIO PARA PLANTILLA 43 -->

<div class="modal fade" id="taller43" tabindex="-1" role="dialog" aria-labelledby="taller43Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title row justify-content-center" id="taller43Label">COMPLETAR MAPA CONCEPTUAL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller43') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="43" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Concepto:</label>
                                <input type="text" name="concepto" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Cantidad de clasificacion:</label>
                                <select name="cantidad" class="custom-select">               
                                    <option value="3">3</option>           
                                    <option value="4">4</option>           
                                    <option value="5">5</option>           
                                    <option value="6">6</option>           
                                </select>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- FORMULARIO PARA PLANTILLA 44 -->

<div class="modal fade" id="taller44" tabindex="-1" role="dialog" aria-labelledby="taller44Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title row justify-content-center" id="taller44Label">ESCRIBIR CUENTAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller44') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="44" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Tipo de cuenta:</label>
                                <select name="cuenta" class="custom-select">               
                                    <option value="activo">ACTIVO</option>           
                                    <option value="pasivo">PASIVO</option>           
                                    <option value="patrimonio">PATRIMONIO</option>           
                                </select>
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- FORMULARIO PARA PLANTILLA 45 -->

<div class="modal fade" id="taller45" tabindex="-1" role="dialog" aria-labelledby="taller45Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title row justify-content-center" id="taller45Label">ESCRIBIR CUENTAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('admin.taller45') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                                <input required="" type="hidden" value="45" name="id_plantilla">
                                <textarea required="" name="enunciado" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Materia:</label>
                                <select name="materia_id" class="custom-select">
                                    @foreach ($materias = App\Materia::get() as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Palabras( Separadas por ","):</label>
                                <input required="" type="text" data-role="tagsinput" name="palabras" class="form-control">
                            </div>
                            <div class="row justify-content-center">
                                <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


