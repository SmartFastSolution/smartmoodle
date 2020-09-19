
<div class="modal fade" id="taller1" tabindex="-1" role="dialog" aria-labelledby="taller1Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taller1Label">TALLER COMPLETE EL ENUNCIADO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center">
             <form action="{{ route('admin.taller1') }}" method="POST">
                @csrf
              <div class="form-group">
                <input type="hidden" value="1" name="id_plantilla">
                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                  @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">leyenda(Usar cuando no hay imagen):</label>
                <textarea class="form-control" name="leyenda" id="message-text"></textarea>
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen(Opcional):</label>
                <input type="file" name="imagen" class="custom-file">
              </div>
              <div class="row justify-content-center">
          <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
        </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
         
      </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="taller2" tabindex="-1" role="dialog" aria-labelledby="taller2Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taller2Label">CLASIFICAR CON ORIGINALIDAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center">
             <form action="{{ route('admin.taller2') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                <input type="hidden" value="2" name="id_plantilla">

                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                  @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen:</label>
                <input type="file" name="imagen" class="custom-file">
              </div>
              <div class="row justify-content-center">
          <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
        </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
         
      </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="taller3" tabindex="-1" role="dialog" aria-labelledby="taller3Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taller3Label">COMPLETAR LOS ENUNCIADOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center">
          <div class="col-12">
             <form action="{{ route('admin.taller3') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                <input type="hidden" value="3" name="id_plantilla">
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                 @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Enunciado 1:</label>
                <input type="text" name="enunciado1" class="form-control" id="recipient-name">
              </div>
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Enunciado 2:</label>
                <input type="text" name="enunciado2" class="form-control" id="recipient-name">
              </div>
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Enunciado 3:</label>
                <input type="text" name="enunciado3" class="form-control" id="recipient-name">
              </div>
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Enunciado 4:</label>
                <input type="text" name="enunciado4" class="form-control" id="recipient-name">
              </div>
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Enunciado 5:</label>
                <input type="text" name="enunciado5" class="form-control" id="recipient-name">
              </div>
              <div class="row justify-content-center">
          <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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
  <div class="modal-dialog" role="document">
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
                <input type="hidden" value="4" name="id_plantilla">
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                 @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen:</label>
                <input type="file" name="img1" class="custom-file">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen:</label>
                <input type="file" name="img2" class="custom-file">
              </div>
              <div class="row justify-content-center">
          <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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

  <div class="modal fade bd-example-modal-lg" id="taller5" tabindex="-1" role="dialog" aria-labelledby="taller5Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
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
                <input type="hidden" value="5" name="id_plantilla">
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                  @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
               <div class="form-group row mb-3 p-3">
                <label for="message-text" class="col-4 col-form-label">CONCEPTO 1:</label>
                <div class="col-8">
                  <input type="text" name="concepto1" class="form-control mb-2" id="alternativac_1a">
                </div>
                <label for="message-text" class="col-form-label">Alternativa 1:</label>
                <input type="text" name="alternativac_1a" class="form-control" id="alternativac_1a">
                <label for="message-text" class="col-form-label">Alternativa 2:</label>
                <input type="text" name="alternativac_1b" class="form-control" id="alternativac_1b">
              </div>
               <div class="form-group row mb-3 p-3">
                <label for="message-text" class="col-4 col-form-label">CONCEPTO 2:</label>
                 <div class="col-8">
                <input type="text" name="concepto2" class="form-control mb-2" id="alternativac_1a">
              </div>
                <label for="message-text" class="col-form-label">Alternativa 1:</label> 
                <input type="text" name="alternativac_2a" class="form-control mb-2" id="alternativac_2a">
                <label for="message-text" class="col-form-label">Alternativa 2:</label> 
                <input type="text" name="alternativac_2b" class="form-control" id="alternativac_2b">
              </div>
               <div class="form-group row mb-3 p-3">
                <label for="message-text" class="col-4 col-form-label">CONCEPTO 3:</label>
                 <div class="col-8">
                <input type="text" name="concepto3" class="form-control mb-2" id="alternativac_1a">
              </div>
                <label for="message-text" class="col-form-label">Alternativa 1:</label> 
                <input type="text" name="alternativac_3a" class="form-control mb-2" id="alternativac_3a">
                <label for="message-text" class="col-form-label">Alternativa 2:</label> 
                <input type="text" name="alternativac_3b" class="form-control" id="alternativac_3b">
              </div>
               <div class="form-group row mb-3 p-3">
                <label for="message-text" class=" col-4 col-form-label">CONCEPTO 4:</label>
                <div class="col-8">
                <input type="text" name="concepto4" class="form-control mb-2" id="alternativac_1a">
                </div>
              <label for="message-text" class="col-form-label">Alternativa 1:</label> 
                <input type="text" name="alternativac_4a" class="form-control mb-2" id="alternativac_4a">
                <label for="message-text" class="col-form-label">Alternativa 2:</label> 
                <input type="text" name="alternativac_4b" class="form-control" id="alternativac_4b">
              </div>
               <div class="form-group row mb-3 p-3">
                <label for="message-text" class="col-4 col-form-label">CONCEPTO 5:</label>
                 <div class="col-8">
                <input type="text" name="concepto5" class="form-control mb-2" id="alternativac_1a">
                  </div>
              <label for="message-text" class="col-form-label">Alternativa 1:</label> 
                <input type="text" name="alternativac_5a" class="form-control mb-2" id="alternativac_5a">
                <label for="message-text" class="col-form-label">Alternativa 2:</label> 
                <input type="text" name="alternativac_5b" class="form-control" id="alternativac_5b">
              </div>
               <div class="form-group row mb-3 p-3">
                <label for="message-text" class="col-4 col-form-label">CONCEPTO 6:</label>
                 <div class="col-8">
                <input type="text" name="concepto6" class="form-control mb-2" id="alternativac_1a">
              </div>
                <label for="message-text" class="col-form-label">Alternativa 1:</label> 
                <input type="text" name="alternativac_6a" class="form-control mb-2" id="alternativac_6a">
                <label for="message-text" class="col-form-label">Alternativa 2:</label> 
                <input type="text" name="alternativac_6b" class="form-control" id="alternativac_6b">
              </div>
              <div class="row justify-content-center">
          <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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
  <div class="modal-dialog" role="document">
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
                <input type="hidden" value="6" name="id_plantilla">
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                  @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 1:</label>
                <input type="file" name="img1" class="custom-file">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 2: </label>
                <input type="file" name="img2" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 3: </label>
                <input type="file" name="img3" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 4: </label>
                <input type="file" name="img4" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 5: </label>
                <input type="file" name="img5" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 6: </label>
                <input type="file" name="img6" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 7: </label>
                <input type="file" name="img7" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 8: </label>
                <input type="file" name="img8" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 9: </label>
                <input type="file" name="img9" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen : </label>
                <input type="file" name="img10" class="custom-file">
              </div>
              <div class="row justify-content-center">
          <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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
  <div class="modal-dialog" role="document">
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
                <input type="hidden" value="7" name="id_plantilla">
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                 @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
                <div class="row justify-content-center">
          <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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
  <div class="modal-dialog" role="document">
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
                <input type="hidden" value="8" name="id_plantilla">
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                 @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen : </label>
                <input type="file" name="img" class="custom-file">
              </div>
                <div class="row justify-content-center">
                  <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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
  <div class="modal-dialog" role="document">
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
                <input type="hidden" value="9" name="id_plantilla">
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
                 <div class="form-group bg-light p-2">
                  <div class="form-inline">
                     <label for="concepto6" class="col-form-label">Concepto 1 :  </label>
                  <input type="text" name="concepto1" class="form-control" id="recipient-name">
                  </div>
                  <label for="concepto6" class="col-form-label">Alternativas:</label>
                  <input type="text" data-role="tagsinput" name="alternativas1" class="form-control" id="recipient-name">
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                     <label for="concepto6" class="col-form-label">Concepto 2 :  </label>
                  <input type="text" name="concepto2" class="form-control" id="recipient-name">
                  </div>
                  <label for="concepto6" class="col-form-label">Alternativas:</label>
                  <input type="text" data-role="tagsinput"  name="alternativas2" class="form-control" id="recipient-name">
                </div>

                     <div class="form-group bg-light p-2">
                  <div class="form-inline">
                     <label for="concepto6" class="col-form-label">Concepto 3 :  </label>
                  <input type="text" name="concepto3" class="form-control" id="recipient-name">
                  </div>
                  <label for="concepto6" class="col-form-label">Alternativas:</label>
                  <input type="text" data-role="tagsinput"  name="alternativas3" class="form-control" id="recipient-name">
                </div>

                     <div class="form-group bg-light p-2">
                  <div class="form-inline">
                     <label for="concepto6" class="col-form-label">Concepto 4 :  </label>
                  <input type="text" name="concepto4" class="form-control" id="recipient-name">
                  </div>
                  <label for="concepto6" class="col-form-label">Alternativas:</label>
                  <input type="text" data-role="tagsinput"  name="alternativas4" class="form-control" id="recipient-name">
                </div>

                     <div class="form-group bg-light p-2">
                  <div class="form-inline">
                     <label for="concepto6" class="col-form-label">Concepto 5 :  </label>
                  <input type="text" name="concepto5" class="form-control" id="recipient-name">
                  </div>
                  <label for="concepto6" class="col-form-label">Alternativas:</label>
                  <input type="text" data-role="tagsinput"  name="alternativas5" class="form-control" id="recipient-name">
                </div>

                     <div class="form-group bg-light p-2">
                  <div class="form-inline">
                     <label for="concepto6" class="col-form-label">Concepto 6 :  </label>
                  <input type="text" name="concepto6" class="form-control" id="recipient-name">
                  </div>
                  <label for="concepto6" class="col-form-label">Alternativas:</label>
                  <input type="text" data-role="tagsinput"  name="alternativas6" class="form-control" id="recipient-name">
                </div>

                <div class="row justify-content-center">
                  <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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
  <div class="modal-dialog" role="document">
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
                <input type="hidden" value="10" name="id_plantilla">
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado1" class="col-form-label pr-2">Enunciado 1 :  </label>
                    <input type="text" name="enunciado1" class="form-control" id="enunciado1">
                  </div>
                  <div class="form-inline">
                    <label for="img1" class="col-form-label">Imagen 1:</label>
                  </div>
                  <input type="file" name="img1" class="custom-file" id="img1">
                    <label for="concepto6" class="col-form-label">Definicion 1:</label>
                    <input type="text" name="definicion1" class="form-control" id="definicion1">
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado2" class="col-form-label pr-2">Enunciado 2 :  </label>
                    <input type="text" name="enunciado2" class="form-control" id="enunciado2">
                  </div>
                  <div class="form-inline">
                    <label for="img2" class="col-form-label">Imagen 2:</label>
                  </div>
                  <input type="file" name="img2" class="custom-file" id="img2">
                    <label for="concepto6" class="col-form-label">Definicion 2:</label>
                    <input type="text" name="definicion2" class="form-control" id="definicion2">
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado3" class="col-form-label pr-2">Enunciado 3 :  </label>
                    <input type="text" name="enunciado3" class="form-control" id="enunciado3">
                  </div>
                  <div class="form-inline">
                    <label for="img3" class="col-form-label">Imagen 3:</label>
                  </div>
                  <input type="file" name="img3" class="custom-file" id="img3">
                    <label for="concepto6" class="col-form-label">Definicion 3:</label>
                    <input type="text" name="definicion3" class="form-control" id="definicion1">
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado4" class="col-form-label pr-2">Enunciado 4 :  </label>
                    <input type="text" name="enunciado4" class="form-control" id="enunciado4">
                  </div>
                  <div class="form-inline">
                    <label for="img4" class="col-form-label">Imagen 4:</label>
                  </div>
                  <input type="file" name="img4" class="custom-file" id="img4">
                    <label for="concepto6" class="col-form-label">Definicion 4:</label>
                    <input type="text" name="definicion4" class="form-control" id="definicion4">
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado5" class="col-form-label pr-2">Enunciado 5 :  </label>
                    <input type="text" name="enunciado5" class="form-control" id="enunciado5">
                  </div>
                  <div class="form-inline">
                    <label for="img5" class="col-form-label">Imagen 5:</label>
                  </div>
                  <input type="file" name="img5" class="custom-file" id="img5">
                    <label for="concepto6" class="col-form-label">Definicion 5:</label>
                    <input type="text" name="definicion5" class="form-control" id="definicion5">
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado6" class="col-form-label pr-2">Enunciado 6 :  </label>
                    <input type="text" name="enunciado6" class="form-control" id="enunciado6">
                  </div>
                  <div class="form-inline">
                    <label for="img6" class="col-form-label">Imagen 6:</label>
                  </div>
                  <input type="file" name="img6" class="custom-file" id="img6">
                    <label for="concepto6" class="col-form-label">Definicion 6:</label>
                    <input type="text" name="definicion6" class="form-control" id="definicion6">
                </div>

                <div class="row justify-content-center">
                  <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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
  <div class="modal-dialog" role="document">
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
                <input type="hidden" value="11" name="id_plantilla">
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado1" class="col-form-label pr-2">Enunciado 1 :  </label>
                    <input type="text" name="enunciado1" class="form-control" id="enunciado1">
                  </div>
                  <div class="form-inline">
                    <label for="img1" class="col-form-label">Imagen 1:</label>
                  </div>
                  <input type="file" name="img1" class="custom-file" id="img1">
                    
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado2" class="col-form-label pr-2">Enunciado 2 :  </label>
                    <input type="text" name="enunciado2" class="form-control" id="enunciado2">
                  </div>
                  <div class="form-inline">
                    <label for="img2" class="col-form-label">Imagen 2:</label>
                  </div>
                  <input type="file" name="img2" class="custom-file" id="img2">
                    
                </div>

                <div class="form-group bg-light p-2">
                    <label for="concepto6" class="col-form-label">Definicion 1:</label>
                    <input type="text" name="definicion1" class="form-control" id="definicion1">
                </div>

                <div class="form-group bg-light p-2">
                    <label for="concepto6" class="col-form-label">Definicion 2:</label>
                    <input type="text" name="definicion2" class="form-control" id="definicion4">
                </div>

                <div class="form-group bg-light p-2">
                    <label for="concepto6" class="col-form-label">Definicion 3:</label>
                    <input type="text" name="definicion3" class="form-control" id="definicion5">
                </div>

                <div class="form-group bg-light p-2">
                    <label for="concepto6" class="col-form-label">Definicion 4:</label>
                    <input type="text" name="definicion4" class="form-control" id="definicion6">
                </div>

                <div class="row justify-content-center">
                  <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taller12Label">TALLER COMPLETE EL ENUNCIADO</h5>
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
                <input type="hidden" value="12" name="id_plantilla">
                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                  @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Descripcion 1:</label>
                <textarea class="form-control" name="descripcion1" id="message-text"></textarea>
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">Descripcion 2:</label>
                <textarea class="form-control" name="descripcion2" id="message-text"></textarea>
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">Descripcion 3:</label>
                <textarea class="form-control" name="descripcion3" id="message-text"></textarea>
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">Descripcion 4:</label>
                <textarea class="form-control" name="descripcion4" id="message-text"></textarea>
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">Descripcion 5:</label>
                <textarea class="form-control" name="descripcion5" id="message-text"></textarea>
              </div>

           
              <div class="row justify-content-center">
                <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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
  <div class="modal-dialog" role="document">
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
                <input type="hidden" value="13" name="id_plantilla">
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                 @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Concepto 1:</label>
                <input type="text" name="concepto1" class="form-control">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Concepto 2:</label>
                <input type="text" name="concepto2" class="form-control">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Concepto 3:</label>
                <input type="text" name="concepto3" class="form-control">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Concepto 4:</label>
                <input type="text" name="concepto4" class="form-control">
              </div>

                <div class="row justify-content-center">
                  <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taller14Label">IDENTIFICAR PERSONAS</h5>
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
                <input type="hidden" value="14" name="id_plantilla">
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                 @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Descripcion :</label>
                <input type="text" name="descripcion" class="form-control">
              </div>
                <div class="row justify-content-center">
                  <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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
  <div class="modal-dialog" role="document">
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
                <input type="hidden" value="15" name="id_plantilla">
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="materia_id" class="custom-select" id="">
                 @foreach ($materias = App\Materia::get() as $materia)
                  <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Girador :</label>
                <input type="text" name="girador" class="form-control">
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">Girado :</label>
                <input type="text" name="girado" class="form-control">
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">Cantidad :</label>
                <input type="text" name="cantidad" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Lugar :</label>
                <input type="text" name="lugar" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha :</label>
                <input type="text" name="fecha" class="form-control">
              </div>

                <div class="row justify-content-center">
                  <input type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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




