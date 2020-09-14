
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
                <select name="id_materia" class="custom-select" id="">
                  <option value="1">Matematicas</option>
                  <option value="2">Lenguaje</option>
                  <option value="3">Ingles</option>
                  <option value="4">Ciencias</option>
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
          <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
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
        <h5 class="modal-title" id="taller2Label">CLASIFICAR CON ORIGINALIDA</h5>
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
                <select name="id_materia" class="custom-select" id="">
                  <option value="1">Matematicas</option>
                  <option value="2">Lenguaje</option>
                  <option value="3">Ingles</option>
                  <option value="4">Ciencias</option>
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Imagen:</label>
                <input type="file" name="imagen" class="custom-file">
              </div>
              <div class="row justify-content-center">
          <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
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
                <select name="id_materia" class="custom-select" id="">
                  <option value="1">Matematicas</option>
                  <option value="2">Lenguaje</option>
                  <option value="3">Ingles</option>
                  <option value="4">Ciencias</option>
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
          <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
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
        <h5 class="modal-title" id="taller4Label">COMPLETAR LOS ENUNCIADOS</h5>
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
                <input type="hidden" value="3" name="id_plantilla">
                <input type="text" name="enunciado" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Materia:</label>
                <select name="id_materia" class="custom-select" id="">
                  <option value="1">Matematicas</option>
                  <option value="2">Lenguaje</option>
                  <option value="3">Ingles</option>
                  <option value="4">Ciencias</option>
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
          <input type="submit" value="Enviar Respuesta" class="btn p-2 mt-3 btn-danger">
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