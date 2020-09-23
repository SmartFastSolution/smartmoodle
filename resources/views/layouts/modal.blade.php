
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
                <input required="" type="hidden" value="1" name="id_plantilla">
                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <input required="" type="file" name="imagen" class="custom-file">
              </div>
              <div class="row justify-content-center">
          <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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
                <input required="" type="hidden" value="2" name="id_plantilla">

                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <input required="" type="file" name="imagen" class="custom-file">
              </div>
              <div class="row justify-content-center">
          <input required="" type="submit" value="Crear Taller" class="btn p-2 mt-3 btn-danger">
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
                <input required="" type="hidden" value="3" name="id_plantilla">
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <input required="" type="text" name="enunciado1" class="form-control" id="recipient-name">
              </div>
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Enunciado 2:</label>
                <input required="" type="text" name="enunciado2" class="form-control" id="recipient-name">
              </div>
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Enunciado 3:</label>
                <input required="" type="text" name="enunciado3" class="form-control" id="recipient-name">
              </div>
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Enunciado 4:</label>
                <input required="" type="text" name="enunciado4" class="form-control" id="recipient-name">
              </div>
               <div class="form-group">
                <label for="recipient-name" class="col-form-label">Enunciado 5:</label>
                <input required="" type="text" name="enunciado5" class="form-control" id="recipient-name">
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
                <input required="" type="hidden" value="4" name="id_plantilla">
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <input required="" type="file" name="img1" class="custom-file">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen:</label>
                <input required="" type="file" name="img2" class="custom-file">
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
                <input required="" type="hidden" value="5" name="id_plantilla">
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                  <input required="" type="text" name="concepto1" class="form-control mb-2" id="alternativac_1a">
                </div>
                <label for="message-text" class="col-form-label">Alternativa 1:</label>
                <input required="" type="text" name="alternativac_1a" class="form-control" id="alternativac_1a">
                <label for="message-text" class="col-form-label">Alternativa 2:</label>
                <input required="" type="text" name="alternativac_1b" class="form-control" id="alternativac_1b">
              </div>
               <div class="form-group row mb-3 p-3">
                <label for="message-text" class="col-4 col-form-label">CONCEPTO 2:</label>
                 <div class="col-8">
                <input required="" type="text" name="concepto2" class="form-control mb-2" id="alternativac_1a">
              </div>
                <label for="message-text" class="col-form-label">Alternativa 1:</label> 
                <input required="" type="text" name="alternativac_2a" class="form-control mb-2" id="alternativac_2a">
                <label for="message-text" class="col-form-label">Alternativa 2:</label> 
                <input required="" type="text" name="alternativac_2b" class="form-control" id="alternativac_2b">
              </div>
               <div class="form-group row mb-3 p-3">
                <label for="message-text" class="col-4 col-form-label">CONCEPTO 3:</label>
                 <div class="col-8">
                <input required="" type="text" name="concepto3" class="form-control mb-2" id="alternativac_1a">
              </div>
                <label for="message-text" class="col-form-label">Alternativa 1:</label> 
                <input required="" type="text" name="alternativac_3a" class="form-control mb-2" id="alternativac_3a">
                <label for="message-text" class="col-form-label">Alternativa 2:</label> 
                <input required="" type="text" name="alternativac_3b" class="form-control" id="alternativac_3b">
              </div>
               <div class="form-group row mb-3 p-3">
                <label for="message-text" class=" col-4 col-form-label">CONCEPTO 4:</label>
                <div class="col-8">
                <input required="" type="text" name="concepto4" class="form-control mb-2" id="alternativac_1a">
                </div>
              <label for="message-text" class="col-form-label">Alternativa 1:</label> 
                <input required="" type="text" name="alternativac_4a" class="form-control mb-2" id="alternativac_4a">
                <label for="message-text" class="col-form-label">Alternativa 2:</label> 
                <input required="" type="text" name="alternativac_4b" class="form-control" id="alternativac_4b">
              </div>
               <div class="form-group row mb-3 p-3">
                <label for="message-text" class="col-4 col-form-label">CONCEPTO 5:</label>
                 <div class="col-8">
                <input required="" type="text" name="concepto5" class="form-control mb-2" id="alternativac_1a">
                  </div>
              <label for="message-text" class="col-form-label">Alternativa 1:</label> 
                <input required="" type="text" name="alternativac_5a" class="form-control mb-2" id="alternativac_5a">
                <label for="message-text" class="col-form-label">Alternativa 2:</label> 
                <input required="" type="text" name="alternativac_5b" class="form-control" id="alternativac_5b">
              </div>
               <div class="form-group row mb-3 p-3">
                <label for="message-text" class="col-4 col-form-label">CONCEPTO 6:</label>
                 <div class="col-8">
                <input required="" type="text" name="concepto6" class="form-control mb-2" id="alternativac_1a">
              </div>
                <label for="message-text" class="col-form-label">Alternativa 1:</label> 
                <input required="" type="text" name="alternativac_6a" class="form-control mb-2" id="alternativac_6a">
                <label for="message-text" class="col-form-label">Alternativa 2:</label> 
                <input required="" type="text" name="alternativac_6b" class="form-control" id="alternativac_6b">
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
                <input required="" type="hidden" value="6" name="id_plantilla">
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <input required="" type="file" name="img1" class="custom-file">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 2: </label>
                <input required="" type="file" name="img2" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 3: </label>
                <input required="" type="file" name="img3" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 4: </label>
                <input required="" type="file" name="img4" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 5: </label>
                <input required="" type="file" name="img5" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 6: </label>
                <input required="" type="file" name="img6" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 7: </label>
                <input required="" type="file" name="img7" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 8: </label>
                <input required="" type="file" name="img8" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen 9: </label>
                <input required="" type="file" name="img9" class="custom-file">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen : </label>
                <input required="" type="file" name="img10" class="custom-file">
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
                <input required="" type="hidden" value="7" name="id_plantilla">
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <input required="" type="hidden" value="8" name="id_plantilla">
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <input required="" type="file" name="img" class="custom-file">
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
                <input required="" type="hidden" value="9" name="id_plantilla">
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                  <input required="" type="text" name="concepto1" class="form-control" id="recipient-name">
                  </div>
                  <label for="concepto6" class="col-form-label">Alternativas:</label>
                  <input required="" type="text" data-role="tagsinput required=""" name="alternativas1" class="form-control" id="recipient-name">
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                     <label for="concepto6" class="col-form-label">Concepto 2 :  </label>
                  <input required="" type="text" name="concepto2" class="form-control" id="recipient-name">
                  </div>
                  <label for="concepto6" class="col-form-label">Alternativas:</label>
                  <input required="" type="text" data-role="tagsinput required="""  name="alternativas2" class="form-control" id="recipient-name">
                </div>

                     <div class="form-group bg-light p-2">
                  <div class="form-inline">
                     <label for="concepto6" class="col-form-label">Concepto 3 :  </label>
                  <input required="" type="text" name="concepto3" class="form-control" id="recipient-name">
                  </div>
                  <label for="concepto6" class="col-form-label">Alternativas:</label>
                  <input required="" type="text" data-role="tagsinput required="""  name="alternativas3" class="form-control" id="recipient-name">
                </div>

                     <div class="form-group bg-light p-2">
                  <div class="form-inline">
                     <label for="concepto6" class="col-form-label">Concepto 4 :  </label>
                  <input required="" type="text" name="concepto4" class="form-control" id="recipient-name">
                  </div>
                  <label for="concepto6" class="col-form-label">Alternativas:</label>
                  <input required="" type="text" data-role="tagsinput required="""  name="alternativas4" class="form-control" id="recipient-name">
                </div>

                     <div class="form-group bg-light p-2">
                  <div class="form-inline">
                     <label for="concepto6" class="col-form-label">Concepto 5 :  </label>
                  <input required="" type="text" name="concepto5" class="form-control" id="recipient-name">
                  </div>
                  <label for="concepto6" class="col-form-label">Alternativas:</label>
                  <input required="" type="text" data-role="tagsinput required="""  name="alternativas5" class="form-control" id="recipient-name">
                </div>

                     <div class="form-group bg-light p-2">
                  <div class="form-inline">
                     <label for="concepto6" class="col-form-label">Concepto 6 :  </label>
                  <input required="" type="text" name="concepto6" class="form-control" id="recipient-name">
                  </div>
                  <label for="concepto6" class="col-form-label">Alternativas:</label>
                  <input required="" type="text" data-role="tagsinput required="""  name="alternativas6" class="form-control" id="recipient-name">
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
                <input required="" type="hidden" value="10" name="id_plantilla">
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                    <input required="" type="text" name="enunciado1" class="form-control" id="enunciado1">
                  </div>
                  <div class="form-inline">
                    <label for="img1" class="col-form-label">Imagen 1:</label>
                  </div>
                  <input required="" type="file" name="img1" class="custom-file" id="img1">
                    <label for="concepto6" class="col-form-label">Definicion 1:</label>
                    <input required="" type="text" name="definicion1" class="form-control" id="definicion1">
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado2" class="col-form-label pr-2">Enunciado 2 :  </label>
                    <input required="" type="text" name="enunciado2" class="form-control" id="enunciado2">
                  </div>
                  <div class="form-inline">
                    <label for="img2" class="col-form-label">Imagen 2:</label>
                  </div>
                  <input required="" type="file" name="img2" class="custom-file" id="img2">
                    <label for="concepto6" class="col-form-label">Definicion 2:</label>
                    <input required="" type="text" name="definicion2" class="form-control" id="definicion2">
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado3" class="col-form-label pr-2">Enunciado 3 :  </label>
                    <input required="" type="text" name="enunciado3" class="form-control" id="enunciado3">
                  </div>
                  <div class="form-inline">
                    <label for="img3" class="col-form-label">Imagen 3:</label>
                  </div>
                  <input required="" type="file" name="img3" class="custom-file" id="img3">
                    <label for="concepto6" class="col-form-label">Definicion 3:</label>
                    <input required="" type="text" name="definicion3" class="form-control" id="definicion1">
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado4" class="col-form-label pr-2">Enunciado 4 :  </label>
                    <input required="" type="text" name="enunciado4" class="form-control" id="enunciado4">
                  </div>
                  <div class="form-inline">
                    <label for="img4" class="col-form-label">Imagen 4:</label>
                  </div>
                  <input required="" type="file" name="img4" class="custom-file" id="img4">
                    <label for="concepto6" class="col-form-label">Definicion 4:</label>
                    <input required="" type="text" name="definicion4" class="form-control" id="definicion4">
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado5" class="col-form-label pr-2">Enunciado 5 :  </label>
                    <input required="" type="text" name="enunciado5" class="form-control" id="enunciado5">
                  </div>
                  <div class="form-inline">
                    <label for="img5" class="col-form-label">Imagen 5:</label>
                  </div>
                  <input required="" type="file" name="img5" class="custom-file" id="img5">
                    <label for="concepto6" class="col-form-label">Definicion 5:</label>
                    <input required="" type="text" name="definicion5" class="form-control" id="definicion5">
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado6" class="col-form-label pr-2">Enunciado 6 :  </label>
                    <input required="" type="text" name="enunciado6" class="form-control" id="enunciado6">
                  </div>
                  <div class="form-inline">
                    <label for="img6" class="col-form-label">Imagen 6:</label>
                  </div>
                  <input required="" type="file" name="img6" class="custom-file" id="img6">
                    <label for="concepto6" class="col-form-label">Definicion 6:</label>
                    <input required="" type="text" name="definicion6" class="form-control" id="definicion6">
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
                <input required="" type="hidden" value="11" name="id_plantilla">
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                    <input required="" type="text" name="enunciado1" class="form-control" id="enunciado1">
                  </div>
                  <div class="form-inline">
                    <label for="img1" class="col-form-label">Imagen 1:</label>
                  </div>
                  <input required="" type="file" name="img1" class="custom-file" id="img1">
                    
                </div>

                <div class="form-group bg-light p-2">
                  <div class="form-inline">
                    <label for="enunciado2" class="col-form-label pr-2">Enunciado 2 :  </label>
                    <input required="" type="text" name="enunciado2" class="form-control" id="enunciado2">
                  </div>
                  <div class="form-inline">
                    <label for="img2" class="col-form-label">Imagen 2:</label>
                  </div>
                  <input required="" type="file" name="img2" class="custom-file" id="img2">
                    
                </div>

                <div class="form-group bg-light p-2">
                    <label for="concepto6" class="col-form-label">Definicion 1:</label>
                    <input required="" type="text" name="definicion1" class="form-control" id="definicion1">
                </div>

                <div class="form-group bg-light p-2">
                    <label for="concepto6" class="col-form-label">Definicion 2:</label>
                    <input required="" type="text" name="definicion2" class="form-control" id="definicion4">
                </div>

                <div class="form-group bg-light p-2">
                    <label for="concepto6" class="col-form-label">Definicion 3:</label>
                    <input required="" type="text" name="definicion3" class="form-control" id="definicion5">
                </div>

                <div class="form-group bg-light p-2">
                    <label for="concepto6" class="col-form-label">Definicion 4:</label>
                    <input required="" type="text" name="definicion4" class="form-control" id="definicion6">
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
                <input required="" type="hidden" value="12" name="id_plantilla">
                <label for="recipient-name" class="col-form-label">Enunciado:</label>
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <input required="" type="hidden" value="13" name="id_plantilla">
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <input required="" type="text" name="concepto1" class="form-control">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Concepto 2:</label>
                <input required="" type="text" name="concepto2" class="form-control">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Concepto 3:</label>
                <input required="" type="text" name="concepto3" class="form-control">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Concepto 4:</label>
                <input required="" type="text" name="concepto4" class="form-control">
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
                <input required="" type="hidden" value="14" name="id_plantilla">
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <input required="" type="text" name="descripcion" class="form-control">
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
                <input required="" type="hidden" value="15" name="id_plantilla">
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <input required="" type="text" name="girador" class="form-control">
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">Girado :</label>
                <input required="" type="text" name="girado" class="form-control">
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">Cantidad :</label>
                <input required="" type="text" name="cantidad" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Lugar :</label>
                <input required="" type="text" name="lugar" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha :</label>
                <input required="" type="text" name="fecha" class="form-control">
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
  <div class="modal-dialog" role="document">
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
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <label for="message-text" class="col-form-label">Endoso a :</label>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h7 class="modal-title" id="taller17Label">CONVERTIR CHEQUE</h7>
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
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <label for="message-text" class="col-form-label">Nombre :</label>
                <input required="" type="text" name="nombre" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Cantidad :</label>
                <input required="" type="text" name="cantidad" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Numero:</label>
                <input required="" type="text" name="numero" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Lugar :</label>
                <input required="" type="text" name="lugar" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha :</label>
                <input required="" type="text" name="fecha" class="form-control">
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
  <div class="modal-dialog" role="document">
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
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <label for="message-text" class="col-form-label">Valor :</label>
                <input required="" type="text" name="valor" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Acreedor :</label>
                <input required="" type="text" name="acreedor" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Deudor:</label>
                <input required="" type="text" name="deudor" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Tasa de interes :</label>
                <input required="" type="text" name="tasa_de_interes" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha de vencimiento :</label>
                <input required="" type="date" name="fecha_de_vencimiento" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Lugar :</label>
                <input required="" type="text" name="lugar" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha de emision :</label>
                <input required="" type="date" name="fecha_de_emision" class="form-control">
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="taller19Label">CERTIFICADO DE RETIRO</h2>
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
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <label for="message-text" class="col-form-label">Valor :</label>
                <input required="" type="text" name="valor" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Beneficiario :</label>
                <input required="" type="text" name="beneficiario" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Interes Anual:</label>
                <input required="" type="text" name="interes_anual" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Lugar :</label>
                <input required="" type="text" name="lugar" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha de emision :</label>
                <input required="" type="date" name="fecha_de_emision" class="form-control">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Plazo de vencimiento :</label>
                <input required="" type="text" name="plazo_de_vencimiento" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha de vencimiento :</label>
                <input required="" type="date" name="fecha_de_vencimiento" class="form-control">
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
  <div class="modal-dialog" role="document">
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
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <label for="message-text" class="col-form-label">Beneficiario :</label>
                <input required="" type="text" name="beneficiario" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Deudor :</label>
                <input required="" type="text" name="deudor" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Garante:</label>
                <input required="" type="text" name="garante" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Valor :</label>
                <input required="" type="text" name="valor" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Plazo de Pago :</label>
                <input required="" type="text" name="plazo_pago" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Tasa de interes :</label>
                <input required="" type="text" name="tasa_interes" class="form-control">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Lugar :</label>
                <input required="" type="text" name="lugar" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha de emision :</label>
                <input required="" type="date" name="fecha_emision" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha de vencimiento :</label>
                <input required="" type="date" name="fecha_de_vencimiento" class="form-control">
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
  <div class="modal-dialog" role="document">
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
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <label for="message-text" class="col-form-label">Pedido :</label>
                <input required="" type="text" name="pedido" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Cantidad :</label>
                <input required="" type="text" name="cantidad" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Codigo :</label>
                <input required="" type="text" name="codigo" class="form-control">
              </div>

              <div class="form-group">
                <label for="message-text" class="col-form-label">Detalle :</label>
                <input required="" type="text" name="detalle" class="form-control">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Lugar :</label>
                <input required="" type="text" name="lugar" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha :</label>
                <input required="" type="date" name="fecha" class="form-control">
              </div> 
              <div class="form-group">
                <label for="message-text" class="col-form-label">Firma de Bodeguero :</label>
                <input required="" type="text" name="firma" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Plazo de entrega :</label>
                <input required="" type="text" name="plazo_entrega" class="form-control">
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
  <div class="modal-dialog" role="document">
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
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <label for="message-text" class="col-form-label">Valor :</label>
                <input required="" type="text" name="valor" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Acreedor :</label>
                <input required="" type="text" name="acreedor" class="form-control">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Deudor :</label>
                <input required="" type="text" name="deudor" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Descripcion :</label>
                <input required="" type="text" name="descripcion" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Direccion :</label>
                <input required="" type="text" name="direccion" class="form-control">
              </div>

               <div class="form-group">
                <label for="message-text" class="col-form-label">Lugar :</label>
                <input required="" type="text" name="lugar" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha :</label>
                <input required="" type="date" name="fecha" class="form-control">
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
  <div class="modal-dialog" role="document">
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
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <label for="message-text" class="col-form-label">Beneficiario :</label>
                <input required="" type="text" name="beneficiario" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Comprobante :</label>
                <input required="" type="text" name="comprobante" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Cantidad :</label>
                <input required="" type="text" name="cantidad" class="form-control">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Firmas :</label>
                <input required="" type="text" name="firmas" class="form-control">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Lugar :</label>
                <input required="" type="text" name="lugar" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha :</label>
                <input required="" type="date" name="fecha" class="form-control">
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
<div class="modal fade" id="taller25" tabindex="-1" role="dialog" aria-labelledby="taller25Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
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
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <label for="message-text" class="col-form-label">Cliente :</label>
                <input required="" type="text" name="cliente" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">RUC :</label>
                <input required="" type="text" name="ruc" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Descuento :</label>
                <input required="" type="text" name="descuento" class="form-control">
              </div>
               <div class="form-group">
                <label for="message-text" class="col-form-label">Guia de Remision :</label>
                <input required="" type="text" name="remision" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha de emision :</label>
                <input required="" type="date" name="fecha_emision" class="form-control">
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
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td><input type="text" class="form-control" name="cant[]"></td>
                      <td><input type="text" class="form-control" name="desc[]"></td>
                      <td><input type="text" class="form-control" name="precio[]"></td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td><input type="text" class="form-control" name="cant[]"></td>
                      <td><input type="text" class="form-control" name="desc[]"></td>
                      <td><input type="text" class="form-control" name="precio[]"></td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td><input type="text" class="form-control" name="cant[]"></td>
                      <td><input type="text" class="form-control" name="desc[]"></td>
                      <td><input type="text" class="form-control" name="precio[]"></td>
                    </tr>
                      <tr>
                      <th scope="row">4</th>
                      <td><input type="text" class="form-control" name="cant[]"></td>
                      <td><input type="text" class="form-control" name="desc[]"></td>
                      <td><input type="text" class="form-control" name="precio[]"></td>
                    </tr>
                      <tr>
                      <th scope="row">5</th>
                      <td><input type="text" class="form-control" name="cant[]"></td>
                      <td><input type="text" class="form-control" name="desc[]"></td>
                      <td><input type="text" class="form-control" name="precio[]"></td>
                    </tr>
                  </tbody>
                </table>
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

 <!-- FORMULARIO PARA PLANTILLA 26 -->
<div class="modal fade" id="taller26" tabindex="-1" role="dialog" aria-labelledby="taller26Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="taller26Label">ORDEN DE VENTA</h2>
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
                <input required="" type="text" name="enunciado" class="form-control" id="recipient-name">
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
                <label for="message-text" class="col-form-label">Nombre :</label>
                <input required="" type="text" name="nombre" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">RUC :</label>
                <input required="" type="text" name="ruc" class="form-control">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Fecha :</label>
                <input required="" type="text" name="fecha" class="form-control">
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
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td><input type="text" class="form-control" name="cant[]"></td>
                      <td><input type="text" class="form-control" name="desc[]"></td>
                      <td><input type="text" class="form-control" name="precio[]"></td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td><input type="text" class="form-control" name="cant[]"></td>
                      <td><input type="text" class="form-control" name="desc[]"></td>
                      <td><input type="text" class="form-control" name="precio[]"></td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td><input type="text" class="form-control" name="cant[]"></td>
                      <td><input type="text" class="form-control" name="desc[]"></td>
                      <td><input type="text" class="form-control" name="precio[]"></td>
                    </tr>
                  </tbody>
                </table>
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
