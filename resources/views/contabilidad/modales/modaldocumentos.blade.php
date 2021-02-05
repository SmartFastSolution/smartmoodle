<!-- CHEQUE -->

<div class="modal fade" id="m_cheque" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="m_chequeLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-xl ">
    <div class="modal-content bg-light">
      <div class="modal-header">
        <h5 class="modal-title" id="m_chequeLabel">CHEQUE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click.prevent="resetCheque()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 class="text-center font-weight-bold">LLENAR UN CHEQUE</h3>
          <div class="form-group row">
        <label for="inputEmail3" class="col-sm-1 col-form-label">MODULO</label>
        <div class="col-sm-4">
        <input type="text" class="form-control mb-2" placeholder="Modulo al que pertenece el cheque" v-model="modulo">
          
        </div>
      </div>
        <div class=" border p-2" style="box-shadow: 5px 5px 15px 0px  #27B8F4">
        <div class="row ">
          <div class="col-6 mb-2">
            <input type="text" v-model="cheque.tipo_cheque" class="form-control mt-2" >

            <input type="text" v-model="cheque.banco" class="form-control mt-2" >
          </div>  
          <div class="col-2 align-self-center">
            <p>16457 <br>
              152
            </p>
          </div>  
        </div>
        <div class="row">
          <div class="col-2">
            <label class="text-capitalize"  for="">PAGUESE A LA ORDEN DE:</label>
            
          </div>
          <div class="col-8">
            <input type="text" v-model="cheque.girador" class="form-control" >
          </div>
          <div class="col-2">
            <label for="">
              CHEQUE <input type="number" v-model="cheque.n_cheque" size="1" class="form-control form-control-sm text-right" name="">
            </label><br>
            <div class="row">
              <div class="col-2"><label for="">
              US
            </label></div>
              <div class="col-8"><input type="number" name="cantidad" v-model="cheque.cantidad" class="form-control text-right" size="2" ></div>
            </div>
            
          </div>

        </div>
        <div class="row mb-2">
          <div class="col-2">
            <label for="">LA SUMA DE</label>
          </div>
          <div class="col-8">
            <input type="text" v-model="cheque.cantidad_letra" class="form-control" > 
          </div>
          <div class="col-2">
            DOLARES
          </div>
        </div>
        <div class="row">
          <div class="col-6 align-self-start pb-5">
            <div class="row">
              <div class="col-6"><input name="lugar" v-model="cheque.ciudad" class="form-control" type="text" ></div>
              <div class="col-6"><input name="fecha" v-model="cheque.fecha" class="form-control" type="date" ></div>
            </div>
              <div class="row">
              <div class="col-6"> <label for="">CIUDAD</label> </div>
              <div class="col-6 text-center"> <label for="">FECHA</label> </div>
            </div>
          </div>
          <div class="col-6 col align-self-end text-center">
            <input name="firma" v-model="cheque.firma" class="form-control" type="text" >
            <label class="" for="">FIRMA</label>
          </div>
        </div>
      </div>
      </div>
      <div class="modal-footer text-center">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        <button v-if="!cheque.update" type="button" class="btn btn-primary" @click.prevent="guardarCheque()">Guardar Cheque</button>
         <button v-if="cheque.update" type="button" class="btn btn-info" @click.prevent="updateCheque()">Actualizar Cheque</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="m_factura" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="m_facturaLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="m_facturaLabel">FACTURA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Guardar Cheque</button>
      </div>
    </div>
  </div>
</div>