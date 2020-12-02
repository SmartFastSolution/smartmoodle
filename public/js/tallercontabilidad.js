/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////BALANCE INICIAL HPRIZONTAL//////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
const b_hori = new Vue({
        el: '#b_horizontal',
        data:{
        id_taller: taller,
        tipo: 'horizontal',
   		 	//diarios:[],
        update:0,
        balance_inicial:{ //Nombre y fecha del balance inicial
          nombre:'',
          fecha:''
        },
        patrimonio:{ //Asignar Patrimonio
          nom_cuenta:'',
          saldo:'',
        },
        //diarios2:[],
        total_balance_inicial:{ //Totales de activo, pasivo y patrimonio
          t_activo:'',
          t_pasivo:'',
          t_patrimonio_pasivo:''
        },
        b_initotal:{
            t_a_corriente:'', //Total de activo corriente
            t_a_nocorriente:'', //Total de activo no corriente
            t_p_corriente:'', //Total de pasivo corriente
            t_p_no_corriente:'', //Total de pasivo no corriente
            t_patrimonio:'' //Total de patrimonio
        },
        a_corrientes:[], //Array de activos corrientes
        a_nocorrientes:[], //Array de activos no corrientes
        p_corrientes:[], //Array de pasivos corrientes
        p_nocorrientes:[], //Array de pasivos no corrientes
        patrimonios:[], //Array de patrimonios
        activo:{
          a_corriente:
            { //Agregar un nuevo activo corriente al array
                nom_cuenta:'',
                saldo:'',              
              },
          a_nocorriente:
            { //Agregar un nuevo activo no corriente al array
                nom_cuenta:'',
                saldo:'',
              },
        },
        pasivo:{
          p_corriente:
            { //Agregar un nuevo pasivo corriente al array
                nom_cuenta:'',
                saldo:'',
                total:''
              },
          p_nocorriente:
            { //Agregar un nuevo pasivo no corriente al array
                nom_cuenta:'',
                saldo:'',
                total:''
              }
        },
        // balances:[],
        // balance:{
        //   cuenta:'',
        //   suma_debe:'',
        //   suma_haber:'',
        //   saldo_debe:'',
        //   saldo_haber:''
        // },
        // suman:{
        //   sum_debe:'',
        //   sum_haber:'',
        //   sal_debe:'',
        //   sal_haber:''
        // }    
  },
  mounted: function(){
    this.cambioActivo();
    this.cambioActivoNo();
    this.cambioPasivo();
    this.cambioPasivoNo();
    this.cambioPatrimonio();
    this.TotalActivo();
    this.TotalPasivo();
    this.obtenerBalance();
  },
   methods:{
    Agregar(){
    if(this.diario.nom_cuenta.trim() === ''){
      toastr.error("El campo Nombre de cuenta es obligatorio", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else if(this.diario.debe.trim() === '' && this.diario.haber.trim() === ''){
      toastr.warning("Rellena el cambio de Debe o Haber, no puedes dejar ambos vacios", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else if(this.diario.debe.trim() != '' && this.diario.haber.trim() != ''){
      toastr.warning("No pueden estar ambos campos llenos a mismo tiempo", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else{
      var diario = {fecha:this.diario.fecha, nom_cuenta:this.diario.nom_cuenta, gloza:this.diario.gloza, debe:this.diario.debe, haber:this.diario.haber};
      this.diarios.push(diario);//añadimos el la variable persona al array
      //Limpiamos los campos
      toastr.success("Registro agregado correctamente", "Smarmoddle", {
                "timeOut": "3000"
            });
      this.diario.fecha =''
      this.diario.nom_cuenta =''
      this.diario.gloza =''
      this.diario.debe =''
      this.diario.haber =''
    }
    },
    deleteDiario(index){
    	this.diarios.splice(index, 1);
    },
       guardarDiario: function(){
        var _this = this;
        var url = '/sistema/admin/taller/diario';
            axios.post(url,{
              id: _this.id_taller,
            datos: _this.diarios
        }).then(response => {
            console.log(response.data); 
        }).catch(function(error){

        });
    },
    agregarBalance(){
    if (this.balance.cuenta.trim() === '' ) {
       toastr.error("El campo cuenta es obligatorio", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else if(this.balance.suma_debe.trim() === '' && this.balance.suma_haber.trim() === ''){
      toastr.warning("Rellena el cambio de Debe o Haber DE SUMAS, no puedes dejar ambos vacios", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else if(this.balance.saldo_debe.trim() === '' && this.balance.saldo_haber.trim() === ''){
      toastr.warning("Rellena el cambio de Debe o Haber de SALDOS, no puedes dejar ambos vacios", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else if(this.balance.saldo_debe.trim() != '' && this.balance.saldo_haber.trim() != ''){
      toastr.warning("No pueden estar ambos campos llenos a mismo tiempo", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else{
      var balance = {cuenta:this.balance.cuenta, suma_debe:this.balance.suma_debe, suma_haber:this.balance.suma_haber, saldo_debe:this.balance.saldo_debe, saldo_haber:this.balance.saldo_haber};
      this.balances.push(balance);//añadimos el la variable persona al array
      //Limpiamos los campos
      toastr.success("Registro agregado correctamente", "Smarmoddle", {
                "timeOut": "3000"
            });
      this.balance.cuenta =''
      this.balance.suma_debe =''
      this.balance.suma_haber =''
      this.balance.saldo_debe =''
      this.balance.saldo_haber =''
    }
    },
      deleteBalance(index){
      this.balances.splice(index, 1);
    },
//ELIMINAR ELEMENTOS DE UN ARRAY /////////
    deleteAcCooriente(index){
      this.a_corrientes.splice(index, 1);   //ELIMINAR UN ELEMENTO DEL ARRAY COMENZANDO DESDE SU INDEX
      this.cambioActivo();                  //LLAMAR FUNCION PARA ACTUALIZAR TOTALES
      this.TotalActivo();                   //LLAMAR FUNCION PARA ACTUALIZAR TOTALES
    },
     deletePaCooriente(index){
      this.p_corrientes.splice(index, 1);
      this.cambioPasivo();
      this.TotalPasivo();
    },
     deleteAcNoCooriente(index){
      this.a_nocorrientes.splice(index, 1);
      this.cambioActivoNo();
      this.TotalActivo();
    },
     deletePaNoCooriente(index){
      this.p_nocorrientes.splice(index, 1);
      this.cambioPasivoNo();
      this.TotalPasivo();
    },
     deletePatrimonio(index){
      this.patrimonios.splice(index, 1);
      this.cambioPatrimonio();
    },
    limpiar(){ //LIMPIAR TODOS LOS CAMPOS DE ACTIVOS PASIVOS Y PATRIMONIOS
      this.pasivo.p_corriente.nom_cuenta = '';
      this.pasivo.p_corriente.saldo = '';
      this.pasivo.p_nocorriente.nom_cuenta = '';
      this.pasivo.p_nocorriente.saldo = '';
      this.activo.a_corriente.nom_cuenta = '';
      this.activo.a_corriente.saldo = '';
      this.activo.a_nocorriente.nom_cuenta = '';
      this.activo.a_nocorriente.saldo = '';
      },
    //EDITAR ELEMENTOS DE UN ARRAY
    editAcorriente(index){ //OBTENEMOS EL INDICE DEL ARRAY SELECCIONADO
      this.update = index;                                                       //IGUALAMOS LA VARIABLE UPDATE CON EL INDICE DEL ARRAY
      this.activo.a_corriente.saldo = this.a_corrientes[index].saldo;           //IGUALAMOS LA VARIABLE DEL V-MODEL CON LOS DATOS DEL ARRAY CORRESPONDIENTE
      this.activo.a_corriente.nom_cuenta = this.a_corrientes[index].nom_cuenta; //IGUALAMOS LA VARIABLE DEL V-MODEL CON LOS DATOS DEL ARRAY CORRESPONDIENTE
      $('#a_corriente_e').modal('show');                                        //MOSTRAR EL MODAL CON JS
      //var activo = this.a_corrientes[index];
    },
    updateACorriente(){
      var i = this.update;                                                    //I SERA EL INDICE QUE SE ASIGNO EN EL METODO EDITAR
      this.a_corrientes[i].nom_cuenta = this.activo.a_corriente.nom_cuenta;   //BUSCAMOS EL ARRAY ESPECIFICO POR SU INDICE Y REMPLAZAMOS SU VALOR POR EL QUE TENEMOS ACTUALMENTE EN EL V-MODEL
      this.a_corrientes[i].saldo = this.activo.a_corriente.saldo;             //BUSCAMOS EL ARRAY ESPECIFICO POR SU INDICE Y REMPLAZAMOS SU VALOR POR EL QUE TENEMOS ACTUALMENTE EN EL V-MODEL
      $('#a_corriente_e').modal('hide');                                      //OCULTAR EL MODAL
      this.limpiar();
      this.cambioActivo();
  
    },
    editANocorriente(index){
      this.update = index;
      this.activo.a_nocorriente.saldo = this.a_nocorrientes[index].saldo;
      this.activo.a_nocorriente.nom_cuenta = this.a_nocorrientes[index].nom_cuenta;
      $('#a_nocorriente_e').modal('show');
      //var activo = this.a_nocorrientes[index];
    },
    updateANoCorriente(){
      var i = this.update;
      this.a_nocorrientes[i].nom_cuenta = this.activo.a_nocorriente.nom_cuenta;
      this.a_nocorrientes[i].saldo = this.activo.a_nocorriente.saldo;
      $('#a_nocorriente_e').modal('hide');
      this.limpiar();
      this.cambioActivoNo();
      this.TotalActivo();
    },
    editPcorriente(index){
      this.update = index ;
      this.pasivo.p_corriente.saldo = this.p_corrientes[index].saldo;
      this.pasivo.p_corriente.nom_cuenta = this.p_corrientes[index].nom_cuenta;
      $('#p_corriente_e').modal('show');
      //var activo = this.a_corrientes[index];
    },
    updatePCorriente(){
      var i = this.update;
      this.p_corrientes[i].nom_cuenta = this.pasivo.p_corriente.nom_cuenta;
      this.p_corrientes[i].saldo = this.pasivo.p_corriente.saldo;
      $('#p_corriente_e').modal('hide');
      this.limpiar();
      this.cambioPasivo();
      this.TotalPasivo();
    },
    editPNocorriente(index){
      this.update = index ;
      this.pasivo.p_nocorriente.saldo = this.p_nocorrientes[index].saldo;
      this.pasivo.p_nocorriente.nom_cuenta = this.p_nocorrientes[index].nom_cuenta;
      $('#p_nocorriente_e').modal('show');
      //var activo = this.a_corrientes[index];
    },
    updatePNoCorriente(){
      var i = this.update;
      this.p_nocorrientes[i].nom_cuenta = this.pasivo.p_nocorriente.nom_cuenta;
      this.p_nocorrientes[i].saldo = this.pasivo.p_nocorriente.saldo;
      $('#p_nocorriente_e').modal('hide');
      this.limpiar();
      this.cambioPasivoNo();
      this.TotalPasivo();
    },
    editPatrimonio(index){
      this.update = index ;
      this.patrimonio.saldo = this.patrimonios[index].saldo;
      this.patrimonio.nom_cuenta = this.patrimonios[index].nom_cuenta;
      $('#patrimonio_e').modal('show');
      //var activo = this.a_corrientes[index];
    },
    updatePatrimonio(){
      var i = this.update;
      this.patrimonios[i].nom_cuenta = this.patrimonio.nom_cuenta;
      this.patrimonios[i].saldo = this.patrimonio.saldo;
      $('#patrimonio_e').modal('hide');
      this.limpiar();
      this.cambioPatrimonio();
    },      
         // ejemplo(){
         //        let me =this;
         //        var formdata = new FormData();
         //        formdata.append('data', JSON.stringify(this.diarios))
                
         //        axios.post(url,formdata).then(function (response) {
         //              console.log(response.data);
         //        toastr.success("Diario general guardado correctamente", "Smarmoddle", {
         //            "timeOut": "3000"
         //           });
         //        diarios:[];
         //        })
         //        .catch(function (error) {
         //            console.log(error);
         //        });   
                
         //    },
            agregarActivoCorriente(){
               if(this.activo.a_corriente.nom_cuenta.trim() === '' || this.activo.a_corriente.saldo === ''){
                toastr.error("Estos campos son obligatorio", "Smarmoddle", {
                "timeOut": "3000"
                });
             }else{
                var a_corr = {nom_cuenta:this.activo.a_corriente.nom_cuenta, saldo:this.activo.a_corriente.saldo};
                this.a_corrientes.push(a_corr);                               //añadimos el la variable persona al array
                  toastr.success("Registro agregado correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                });
                //Limpiamos los campos
                this.activo.a_corriente.nom_cuenta = '';
                this.activo.a_corriente.saldo = '';
                //SUMAR TOTALES
                
                this.cambioActivo();  
              }
            },
             agregarActivoNoCorriente(){
                if(this.activo.a_nocorriente.nom_cuenta.trim() === '' || this.activo.a_nocorriente.saldo === ''){
                toastr.error("Estos campos son obligatorio", "Smarmoddle", {
                "timeOut": "3000"
                });
             }else{
                  var a_nocorr = {nom_cuenta:this.activo.a_nocorriente.nom_cuenta, saldo:this.activo.a_nocorriente.saldo};//CREANDO EL OBJETO QUE SE AGREGARA AL ARRAY
                this.a_nocorrientes.push(a_nocorr);//AGREGAR UNA NUEVA CUENTA AL ARRAY DE PASIVOS
                  //Limpiamos los campos
                  toastr.success("Registro agregado correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                });
                this.activo.a_nocorriente.nom_cuenta = '';
                this.activo.a_nocorriente.saldo = '';
                this.cambioActivoNo();          
              }
             },
               agregarPasivoCorriente(){
                if(this.pasivo.p_corriente.nom_cuenta.trim() === '' || this.pasivo.p_corriente.saldo === ''){
                toastr.error("Estos campos son obligatorio", "Smarmoddle", {
                "timeOut": "3000"
                });
              }else{
                var p_corr = {nom_cuenta:this.pasivo.p_corriente.nom_cuenta, saldo:this.pasivo.p_corriente.saldo};
                this.p_corrientes.push(p_corr);//añadimos el la variable persona al array
                  //Limpiamos los campos
                  toastr.success("Registro agregado correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                });
                this.pasivo.p_corriente.nom_cuenta = '';
                this.pasivo.p_corriente.saldo = '';
                this.cambioPasivo();          
              }
            },
             agregarPasivoNoCorriente(){
                if(this.pasivo.p_nocorriente.nom_cuenta.trim() === '' || this.pasivo.p_nocorriente.saldo === ''){
                toastr.error("Estos campos son obligatorio", "Smarmoddle", {
                "timeOut": "3000"
                });
             }else{
                  var p_nocorr = {nom_cuenta:this.pasivo.p_nocorriente.nom_cuenta, saldo:this.pasivo.p_nocorriente.saldo};
                this.p_nocorrientes.push(p_nocorr);//añadimos el la variable persona al array
                  //Limpiamos los campos
                toastr.success("Registro agregado correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                });
                this.pasivo.p_nocorriente.nom_cuenta = '';
                this.pasivo.p_nocorriente.saldo = '';
                this.cambioPasivoNo();
                }   
             }, 
             agregarPatrimonio(){
                if(this.patrimonio.nom_cuenta.trim() === '' || this.patrimonio.saldo === ''){
                toastr.error("Estos campos son obligatorio", "Smarmoddle", {
                "timeOut": "3000"
                });
             }else{
               var patri = {nom_cuenta:this.patrimonio.nom_cuenta, saldo:this.patrimonio.saldo};
                this.patrimonios.push(patri);//añadimos el la variable persona al array
                  //Limpiamos los campos
                toastr.success("Registro agregado correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                });
                this.patrimonio.nom_cuenta = '';
                this.patrimonio.saldo = '';
                this.cambioPatrimonio();
              }
             },
            //ACTUALIZAR SUMAS DE PASIVOS, ACTIVOS Y PATRIMONIO
             cambioActivo(){
              this.b_initotal.t_a_corriente = 0;
              var t_activo = this.a_corrientes;           //CARGAR EL ARRAY DE LOS ACTIVOS
              //console.log(t_activo)
              var total = 0;
              t_activo.forEach(function(obj){           //RECORRER ESE ARRAY
                total += Number(obj.saldo);           //SUMAR EL SALDO DE CADA CUENTA EN EL ARRAY UNA Y OTRA VEZ
              });
              //console.log(total);          
              this.b_initotal.t_a_corriente = total;          //IGUALAR LA VARIABLE QUE CONTIENE LA SUMA TOTAL CON LA SUMA REALIZADA
              this.TotalActivo();
             },
                cambioActivoNo(){
              this.b_initotal.t_a_nocorriente = 0;
              var t_noactivo = this.a_nocorrientes;
              //console.log(t_noactivo)
              var total = 0;
              t_noactivo.forEach(function(obj){
                total += Number(obj.saldo);
              });
              //console.log(total);  
              this.b_initotal.t_a_nocorriente = total;
            this.TotalActivo();

             },
                cambioPasivo(){
              this.b_initotal.t_p_corriente = 0;
              var t_pasivo = this.p_corrientes;
              //console.log(t_pasivo)
              var total = 0;
              t_pasivo.forEach(function(obj){
                total += Number(obj.saldo);
              });
              //console.log(total);
              this.b_initotal.t_p_corriente = total;
                this.TotalPasivo();
             },
                cambioPasivoNo(){
              this.b_initotal.t_p_no_corriente = 0;
              var t_nopasivo = this.p_nocorrientes;
              //console.log(t_nopasivo)
              var total = 0;
              t_nopasivo.forEach(function(obj){
                total += Number(obj.saldo);
              });
              //console.log(total);
              this.b_initotal.t_p_no_corriente = total;
                this.TotalPasivo();
             },
            cambioPatrimonio(){
              this.b_initotal.t_patrimonio = 0;
              var t_patrimo = this.patrimonios;
              //console.log(t_patrimo)
              var total = 0;
              t_patrimo.forEach(function(obj){
                total += Number(obj.saldo); 
              });
              //console.log(total);
              this.b_initotal.t_patrimonio = total;
             },

             //TOTAL GENERAL DE ACTIVO, PASIVO Y PATRIMONIO       
             TotalActivo(){
              var activo = this.b_initotal.t_a_corriente + this.b_initotal.t_a_nocorriente;
             //console.log(activo);
              this.total_balance_inicial.t_activo = activo;
             },
              TotalPasivo(){
              var pasivo = this.b_initotal.t_p_corriente + this.b_initotal.t_p_no_corriente;
              //onsole.log(pasivo);
              this.total_balance_inicial.t_pasivo = pasivo;
             },
               totalPasivoPatrimonio(){
                  $('#pasivo_patrimonio').modal('hide');
                toastr.success("Total Agregado Correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                   });
            },
            //GUARDAR BALANCE INICIAL
                guardarBalanceInicial: function(){
                if (this.balance_inicial.nombre.trim() === '') {
                  toastr.error("Campo Nombre es obligatorio", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if (this.balance_inicial.fecha.trim() === '') {
                  toastr.error("Campo Fecha es obligatorio", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if(this.a_corrientes.length == 0){
                  toastr.error("Debe haber al menos un Activo Corriente", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if(this.a_nocorrientes.length == 0){
                  toastr.error("Debe haber al menos un Activo No Corriente", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if(this.p_corrientes.length == 0){
                  toastr.error("Debe haber al menos un Pasivo Corriente", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if(this.p_nocorrientes.length == 0){
                  toastr.error("Debe haber al menos un Pasivo No Corriente", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if(this.patrimonios.length == 0){
                  toastr.error("Debe haber al menos un Patrimonio", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if(this.total_balance_inicial.t_patrimonio_pasivo.trim() === ''){
                  toastr.error("Debes calcular el Total del Pasivo + Patrimonio", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else{
                var _this = this;
                var url = '/sistema/admin/taller/balance_inicial';
                    axios.post(url,{
                    id: _this.id_taller,
                    nombre: _this.balance_inicial.nombre,
                    fecha: _this.balance_inicial.fecha,
                    tipo: _this.tipo,
                    a_corriente: _this.a_corrientes,
                    a_nocorriente: _this.a_nocorrientes,
                    p_corriente: _this.p_corrientes,
                    p_nocorriente: _this.p_nocorrientes,
                    patrimonio: _this.patrimonios,
                    t_patrimonio: _this.total_balance_inicial.t_patrimonio_pasivo
                }).then(response => {
                  if (response.data.success == true) {
                     toastr.success(response.data.message, "Smarmoddle", {
                    "timeOut": "3000"
                   });
                    _this.cambioActivo();
                    _this.cambioActivoNo();
                    _this.cambioPasivo();
                    _this.cambioPasivoNo();
                    _this.cambioPatrimonio();
                    diario.obtenerBalanceInicial();
                    $('#list-tab a:nth-child(3)').tab('show');
                    console.log(response.data); 
                  } else {
                      toastr.success(response.data.message, "Smarmoddle", {
                    "timeOut": "3000"
                   });
                    _this.cambioActivo();
                    _this.cambioActivoNo();
                    _this.cambioPasivo();
                    _this.cambioPasivoNo();
                    _this.cambioPatrimonio();
                    diario.obtenerBalanceInicial();
                  }                     
                }).catch(function(error){
                  toastr.error(error.response.data.message, "Smarmoddle", {
                    "timeOut": "3000"
                   });
                });
              }
            },
            obtenerBalance:function(){
              var _this = this;
                var url = '/sistema/admin/taller/obtenerbalance';
                    axios.post(url,{
                    id: _this.id_taller,
                    tipo: _this.tipo
                }).then(response => {
                  if (response.data.tipo == _this.tipo || response.data.datos == true ) {
                      toastr.success(response.data.message, "Smarmoddle", {
                    "timeOut": "3000"
                   });
                    _this.balance_inicial.nombre = response.data.nombre
                    _this.balance_inicial.fecha = response.data.fecha
                    _this.a_corrientes = response.data.a_corriente;
                    _this.a_nocorrientes = response.data.a_nocorriente;
                    _this.p_corrientes = response.data.p_corriente;
                    _this.p_nocorrientes = response.data.p_nocorriente;
                    _this.patrimonios = response.data.patrimonios;
                    _this.total_balance_inicial.t_patrimonio_pasivo = response.data.total_pasivo_patrimonio;
                    _this.cambioActivo();
                    _this.cambioActivoNo();
                    _this.cambioPasivo();
                    _this.cambioPasivoNo();
                    _this.cambioPatrimonio();
                    diario.obtenerBalanceInicial();
                    console.log(response.data);                 
                  } else {

                  }
                }).catch(function(error){
                
                });

            }
  }   
});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////BALANCE INICIAL VERTICAL///////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
const b_ver = new Vue({
        el: '#b_vertical',
     data:{
        id_taller: taller,
        tipo: 'vertical',
        //diarios:[],
        update:0,
        balance_inicial:{ //Nombre y fecha del balance inicial
          nombre:'',
          fecha:''
        },
        patrimonio:{ //Asignar Patrimonio
          nom_cuenta:'',
          saldo:'',
        },
        //diarios2:[],
        total_balance_inicial:{ //Totales de activo, pasivo y patrimonio
          t_activo:'',
          t_pasivo:'',
          t_patrimonio_pasivo:''
        },
        b_initotal:{
            t_a_corriente:'', //Total de activo corriente
            t_a_nocorriente:'', //Total de activo no corriente
            t_p_corriente:'', //Total de pasivo corriente
            t_p_no_corriente:'', //Total de pasivo no corriente
            t_patrimonio:'' //Total de patrimonio
        },
        a_corrientes:[], //Array de activos corrientes
        a_nocorrientes:[], //Array de activos no corrientes
        p_corrientes:[], //Array de pasivos corrientes
        p_nocorrientes:[], //Array de pasivos no corrientes
        patrimonios:[], //Array de patrimonios
        activo:{
          a_corriente:
            { //Agregar un nuevo activo corriente al array
                nom_cuenta:'',
                saldo:'',              
              },
          a_nocorriente:
            { //Agregar un nuevo activo no corriente al array
                nom_cuenta:'',
                saldo:'',
              },
        },
        pasivo:{
          p_corriente:
            { //Agregar un nuevo pasivo corriente al array
                nom_cuenta:'',
                saldo:'',
                total:''
              },
          p_nocorriente:
            { //Agregar un nuevo pasivo no corriente al array
                nom_cuenta:'',
                saldo:'',
                total:''
              }
        },
        // balances:[],
        // balance:{
        //   cuenta:'',
        //   suma_debe:'',
        //   suma_haber:'',
        //   saldo_debe:'',
        //   saldo_haber:''
        // },
        // suman:{
        //   sum_debe:'',
        //   sum_haber:'',
        //   sal_debe:'',
        //   sal_haber:''
        // }    
  },
  mounted: function(){
    this.cambioActivo();
    this.cambioActivoNo();
    this.cambioPasivo();
    this.cambioPasivoNo();
    this.cambioPatrimonio();
    this.TotalActivo();
    this.TotalPasivo();
    this.obtenerBalance();
  },
   methods:{
    Agregar(){
    if(this.diario.nom_cuenta.trim() === ''){
      toastr.error("El campo Nombre de cuenta es obligatorio", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else if(this.diario.debe.trim() === '' && this.diario.haber.trim() === ''){
      toastr.warning("Rellena el cambio de Debe o Haber, no puedes dejar ambos vacios", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else if(this.diario.debe.trim() != '' && this.diario.haber.trim() != ''){
      toastr.warning("No pueden estar ambos campos llenos a mismo tiempo", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else{
      var diario = {fecha:this.diario.fecha, nom_cuenta:this.diario.nom_cuenta, gloza:this.diario.gloza, debe:this.diario.debe, haber:this.diario.haber};
      this.diarios.push(diario);//añadimos el la variable persona al array
      //Limpiamos los campos
      toastr.success("Registro agregado correctamente", "Smarmoddle", {
                "timeOut": "3000"
            });
      this.diario.fecha =''
      this.diario.nom_cuenta =''
      this.diario.gloza =''
      this.diario.debe =''
      this.diario.haber =''
    }
    },
    deleteDiario(index){
      this.diarios.splice(index, 1);
    },
       guardarDiario: function(){
        var _this = this;
        var url = '/sistema/admin/taller/diario';
            axios.post(url,{
              id: _this.id_taller,
            datos: _this.diarios
        }).then(response => {
            console.log(response.data); 
        }).catch(function(error){

        });
    },
    agregarBalance(){
    if (this.balance.cuenta.trim() === '' ) {
       toastr.error("El campo cuenta es obligatorio", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else if(this.balance.suma_debe.trim() === '' && this.balance.suma_haber.trim() === ''){
      toastr.warning("Rellena el cambio de Debe o Haber DE SUMAS, no puedes dejar ambos vacios", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else if(this.balance.saldo_debe.trim() === '' && this.balance.saldo_haber.trim() === ''){
      toastr.warning("Rellena el cambio de Debe o Haber de SALDOS, no puedes dejar ambos vacios", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else if(this.balance.saldo_debe.trim() != '' && this.balance.saldo_haber.trim() != ''){
      toastr.warning("No pueden estar ambos campos llenos a mismo tiempo", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else{
      var balance = {cuenta:this.balance.cuenta, suma_debe:this.balance.suma_debe, suma_haber:this.balance.suma_haber, saldo_debe:this.balance.saldo_debe, saldo_haber:this.balance.saldo_haber};
      this.balances.push(balance);//añadimos el la variable persona al array
      //Limpiamos los campos
      toastr.success("Registro agregado correctamente", "Smarmoddle", {
                "timeOut": "3000"
            });
      this.balance.cuenta =''
      this.balance.suma_debe =''
      this.balance.suma_haber =''
      this.balance.saldo_debe =''
      this.balance.saldo_haber =''
    }
    },
      deleteBalance(index){
      this.balances.splice(index, 1);
    },
//ELIMINAR ELEMENTOS DE UN ARRAY /////////
    deleteAcCooriente(index){
      this.a_corrientes.splice(index, 1);   //ELIMINAR UN ELEMENTO DEL ARRAY COMENZANDO DESDE SU INDEX
      this.cambioActivo();                  //LLAMAR FUNCION PARA ACTUALIZAR TOTALES
      this.TotalActivo();                   //LLAMAR FUNCION PARA ACTUALIZAR TOTALES
    },
     deletePaCooriente(index){
      this.p_corrientes.splice(index, 1);
      this.cambioPasivo();
      this.TotalPasivo();
    },
     deleteAcNoCooriente(index){
      this.a_nocorrientes.splice(index, 1);
      this.cambioActivoNo();
      this.TotalActivo();
    },
     deletePaNoCooriente(index){
      this.p_nocorrientes.splice(index, 1);
      this.cambioPasivoNo();
      this.TotalPasivo();
    },
     deletePatrimonio(index){
      this.patrimonios.splice(index, 1);
      this.cambioPatrimonio();
    },
    limpiar(){ //LIMPIAR TODOS LOS CAMPOS DE ACTIVOS PASIVOS Y PATRIMONIOS
      this.pasivo.p_corriente.nom_cuenta = '';
      this.pasivo.p_corriente.saldo = '';
      this.pasivo.p_nocorriente.nom_cuenta = '';
      this.pasivo.p_nocorriente.saldo = '';
      this.activo.a_corriente.nom_cuenta = '';
      this.activo.a_corriente.saldo = '';
      this.activo.a_nocorriente.nom_cuenta = '';
      this.activo.a_nocorriente.saldo = '';
      },
    //EDITAR ELEMENTOS DE UN ARRAY
    editAcorriente(index){ //OBTENEMOS EL INDICE DEL ARRAY SELECCIONADO
      this.update = index;                                                       //IGUALAMOS LA VARIABLE UPDATE CON EL INDICE DEL ARRAY
      this.activo.a_corriente.saldo = this.a_corrientes[index].saldo;           //IGUALAMOS LA VARIABLE DEL V-MODEL CON LOS DATOS DEL ARRAY CORRESPONDIENTE
      this.activo.a_corriente.nom_cuenta = this.a_corrientes[index].nom_cuenta; //IGUALAMOS LA VARIABLE DEL V-MODEL CON LOS DATOS DEL ARRAY CORRESPONDIENTE
      $('#a_corriente_e2').modal('show');                                        //MOSTRAR EL MODAL CON JS
      //var activo = this.a_corrientes[index];
    },
    updateACorriente(){
      var i = this.update;                                                    //I SERA EL INDICE QUE SE ASIGNO EN EL METODO EDITAR
      this.a_corrientes[i].nom_cuenta = this.activo.a_corriente.nom_cuenta;   //BUSCAMOS EL ARRAY ESPECIFICO POR SU INDICE Y REMPLAZAMOS SU VALOR POR EL QUE TENEMOS ACTUALMENTE EN EL V-MODEL
      this.a_corrientes[i].saldo = this.activo.a_corriente.saldo;             //BUSCAMOS EL ARRAY ESPECIFICO POR SU INDICE Y REMPLAZAMOS SU VALOR POR EL QUE TENEMOS ACTUALMENTE EN EL V-MODEL
      $('#a_corriente_e2').modal('hide');                                      //OCULTAR EL MODAL
      this.limpiar();
      this.cambioActivo();
  
    },
    editANocorriente(index){
      this.update = index;
      this.activo.a_nocorriente.saldo = this.a_nocorrientes[index].saldo;
      this.activo.a_nocorriente.nom_cuenta = this.a_nocorrientes[index].nom_cuenta;
      $('#a_nocorriente_e2').modal('show');
      //var activo = this.a_nocorrientes[index];
    },
    updateANoCorriente(){
      var i = this.update;
      this.a_nocorrientes[i].nom_cuenta = this.activo.a_nocorriente.nom_cuenta;
      this.a_nocorrientes[i].saldo = this.activo.a_nocorriente.saldo;
      $('#a_nocorriente_e2').modal('hide');
      this.limpiar();
      this.cambioActivoNo();
      this.TotalActivo();
    },
    editPcorriente(index){
      this.update = index ;
      this.pasivo.p_corriente.saldo = this.p_corrientes[index].saldo;
      this.pasivo.p_corriente.nom_cuenta = this.p_corrientes[index].nom_cuenta;
      $('#p_corriente_e2').modal('show');
      //var activo = this.a_corrientes[index];
    },
    updatePCorriente(){
      var i = this.update;
      this.p_corrientes[i].nom_cuenta = this.pasivo.p_corriente.nom_cuenta;
      this.p_corrientes[i].saldo = this.pasivo.p_corriente.saldo;
      $('#p_corriente_e2').modal('hide');
      this.limpiar();
      this.cambioPasivo();
      this.TotalPasivo();
    },
    editPNocorriente(index){
      this.update = index ;
      this.pasivo.p_nocorriente.saldo = this.p_nocorrientes[index].saldo;
      this.pasivo.p_nocorriente.nom_cuenta = this.p_nocorrientes[index].nom_cuenta;
      $('#p_nocorriente_e2').modal('show');
      //var activo = this.a_corrientes[index];
    },
    updatePNoCorriente(){
      var i = this.update;
      this.p_nocorrientes[i].nom_cuenta = this.pasivo.p_nocorriente.nom_cuenta;
      this.p_nocorrientes[i].saldo = this.pasivo.p_nocorriente.saldo;
      $('#p_nocorriente_e2').modal('hide');
      this.limpiar();
      this.cambioPasivoNo();
      this.TotalPasivo();
    },
    editPatrimonio(index){
      this.update = index ;
      this.patrimonio.saldo = this.patrimonios[index].saldo;
      this.patrimonio.nom_cuenta = this.patrimonios[index].nom_cuenta;
      $('#patrimonio_e2').modal('show');
      //var activo = this.a_corrientes[index];
    },
    updatePatrimonio(){
      var i = this.update;
      this.patrimonios[i].nom_cuenta = this.patrimonio.nom_cuenta;
      this.patrimonios[i].saldo = this.patrimonio.saldo;
      $('#patrimonio_e2').modal('hide');
      this.limpiar();
      this.cambioPatrimonio();
    },      
         // ejemplo(){
         //        let me =this;
         //        var formdata = new FormData();
         //        formdata.append('data', JSON.stringify(this.diarios))
                
         //        axios.post(url,formdata).then(function (response) {
         //              console.log(response.data);
         //        toastr.success("Diario general guardado correctamente", "Smarmoddle", {
         //            "timeOut": "3000"
         //           });
         //        diarios:[];
         //        })
         //        .catch(function (error) {
         //            console.log(error);
         //        });   
                
         //    },
            agregarActivoCorriente(){
               if(this.activo.a_corriente.nom_cuenta.trim() === '' || this.activo.a_corriente.saldo === ''){
                toastr.error("Estos campos son obligatorio", "Smarmoddle", {
                "timeOut": "3000"
                });
             }else{
                var a_corr = {nom_cuenta:this.activo.a_corriente.nom_cuenta, saldo:this.activo.a_corriente.saldo};
                this.a_corrientes.push(a_corr);                               //añadimos el la variable persona al array
                  toastr.success("Registro agregado correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                });
                //Limpiamos los campos
                this.activo.a_corriente.nom_cuenta = '';
                this.activo.a_corriente.saldo = '';
                //SUMAR TOTALES
                
                this.cambioActivo();  
              }
            },
             agregarActivoNoCorriente(){
                if(this.activo.a_nocorriente.nom_cuenta.trim() === '' || this.activo.a_nocorriente.saldo === ''){
                toastr.error("Estos campos son obligatorio", "Smarmoddle", {
                "timeOut": "3000"
                });
             }else{
                  var a_nocorr = {nom_cuenta:this.activo.a_nocorriente.nom_cuenta, saldo:this.activo.a_nocorriente.saldo};//CREANDO EL OBJETO QUE SE AGREGARA AL ARRAY
                this.a_nocorrientes.push(a_nocorr);//AGREGAR UNA NUEVA CUENTA AL ARRAY DE PASIVOS
                  //Limpiamos los campos
                  toastr.success("Registro agregado correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                });
                this.activo.a_nocorriente.nom_cuenta = '';
                this.activo.a_nocorriente.saldo = '';
                this.cambioActivoNo();          
              }
             },
               agregarPasivoCorriente(){
                if(this.pasivo.p_corriente.nom_cuenta.trim() === '' || this.pasivo.p_corriente.saldo === ''){
                toastr.error("Estos campos son obligatorio", "Smarmoddle", {
                "timeOut": "3000"
                });
              }else{
                var p_corr = {nom_cuenta:this.pasivo.p_corriente.nom_cuenta, saldo:this.pasivo.p_corriente.saldo};
                this.p_corrientes.push(p_corr);//añadimos el la variable persona al array
                  //Limpiamos los campos
                  toastr.success("Registro agregado correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                });
                this.pasivo.p_corriente.nom_cuenta = '';
                this.pasivo.p_corriente.saldo = '';
                this.cambioPasivo();          
              }
            },
             agregarPasivoNoCorriente(){
                if(this.pasivo.p_nocorriente.nom_cuenta.trim() === '' || this.pasivo.p_nocorriente.saldo === ''){
                toastr.error("Estos campos son obligatorio", "Smarmoddle", {
                "timeOut": "3000"
                });
             }else{
                  var p_nocorr = {nom_cuenta:this.pasivo.p_nocorriente.nom_cuenta, saldo:this.pasivo.p_nocorriente.saldo};
                this.p_nocorrientes.push(p_nocorr);//añadimos el la variable persona al array
                  //Limpiamos los campos
                toastr.success("Registro agregado correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                });
                this.pasivo.p_nocorriente.nom_cuenta = '';
                this.pasivo.p_nocorriente.saldo = '';
                this.cambioPasivoNo();
                }   
             }, 
             agregarPatrimonio(){
                if(this.patrimonio.nom_cuenta.trim() === '' || this.patrimonio.saldo === ''){
                toastr.error("Estos campos son obligatorio", "Smarmoddle", {
                "timeOut": "3000"
                });
             }else{
               var patri = {nom_cuenta:this.patrimonio.nom_cuenta, saldo:this.patrimonio.saldo};
                this.patrimonios.push(patri);//añadimos el la variable persona al array
                  //Limpiamos los campos
                toastr.success("Registro agregado correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                });
                this.patrimonio.nom_cuenta = '';
                this.patrimonio.saldo = '';
                this.cambioPatrimonio();
              }
             },
            //ACTUALIZAR SUMAS DE PASIVOS, ACTIVOS Y PATRIMONIO
             cambioActivo(){
              this.b_initotal.t_a_corriente = 0;
              var t_activo = this.a_corrientes;           //CARGAR EL ARRAY DE LOS ACTIVOS
              //console.log(t_activo)
              var total = 0;
              t_activo.forEach(function(obj){           //RECORRER ESE ARRAY
                total += Number(obj.saldo);           //SUMAR EL SALDO DE CADA CUENTA EN EL ARRAY UNA Y OTRA VEZ
              });
              //console.log(total);          
              this.b_initotal.t_a_corriente = total;          //IGUALAR LA VARIABLE QUE CONTIENE LA SUMA TOTAL CON LA SUMA REALIZADA
              this.TotalActivo();
             },
                cambioActivoNo(){
              this.b_initotal.t_a_nocorriente = 0;
              var t_noactivo = this.a_nocorrientes;
              //console.log(t_noactivo)
              var total = 0;
              t_noactivo.forEach(function(obj){
                total += Number(obj.saldo);
              });
              //console.log(total);  
              this.b_initotal.t_a_nocorriente = total;
            this.TotalActivo();

             },
                cambioPasivo(){
              this.b_initotal.t_p_corriente = 0;
              var t_pasivo = this.p_corrientes;
              //console.log(t_pasivo)
              var total = 0;
              t_pasivo.forEach(function(obj){
                total += Number(obj.saldo);
              });
              //console.log(total);
              this.b_initotal.t_p_corriente = total;
                this.TotalPasivo();
             },
                cambioPasivoNo(){
              this.b_initotal.t_p_no_corriente = 0;
              var t_nopasivo = this.p_nocorrientes;
              //console.log(t_nopasivo)
              var total = 0;
              t_nopasivo.forEach(function(obj){
                total += Number(obj.saldo);
              });
              //console.log(total);
              this.b_initotal.t_p_no_corriente = total;
                this.TotalPasivo();
             },
            cambioPatrimonio(){
              this.b_initotal.t_patrimonio = 0;
              var t_patrimo = this.patrimonios;
              //console.log(t_patrimo)
              var total = 0;
              t_patrimo.forEach(function(obj){
                total += Number(obj.saldo); 
              });
              //console.log(total);
              this.b_initotal.t_patrimonio = total;
             },

             //TOTAL GENERAL DE ACTIVO, PASIVO Y PATRIMONIO       
             TotalActivo(){
              var activo = this.b_initotal.t_a_corriente + this.b_initotal.t_a_nocorriente;
             //console.log(activo);
              this.total_balance_inicial.t_activo = activo;
             },
              TotalPasivo(){
              var pasivo = this.b_initotal.t_p_corriente + this.b_initotal.t_p_no_corriente;
              //onsole.log(pasivo);
              this.total_balance_inicial.t_pasivo = pasivo;
             },
               totalPasivoPatrimonio(){
                  $('#pasivo_patrimonio').modal('hide');
                toastr.success("Total Agregado Correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                   });
            },
            //GUARDAR BALANCE INICIAL
                guardarBalanceInicial: function(){
                if (this.balance_inicial.nombre.trim() === '') {
                  toastr.error("Campo Nombre es obligatorio", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if (this.balance_inicial.fecha.trim() === '') {
                  toastr.error("Campo Fecha es obligatorio", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if(this.a_corrientes.length == 0){
                  toastr.error("Debe haber al menos un Activo Corriente", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if(this.a_nocorrientes.length == 0){
                  toastr.error("Debe haber al menos un Activo No Corriente", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if(this.p_corrientes.length == 0){
                  toastr.error("Debe haber al menos un Pasivo Corriente", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if(this.p_nocorrientes.length == 0){
                  toastr.error("Debe haber al menos un Pasivo No Corriente", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if(this.patrimonios.length == 0){
                  toastr.error("Debe haber al menos un Patrimonio", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else if(this.total_balance_inicial.t_patrimonio_pasivo.trim() === ''){
                  toastr.error("Debes calcular el Total del Pasivo + Patrimonio", "Smarmoddle", {
                    "timeOut": "3000"
                   }); 
                }else{
                var _this = this;
                var url = '/sistema/admin/taller/balance_inicial';
                    axios.post(url,{
                    id: _this.id_taller,
                    nombre: _this.balance_inicial.nombre,
                    fecha: _this.balance_inicial.fecha,
                    tipo: _this.tipo,
                    a_corriente: _this.a_corrientes,
                    a_nocorriente: _this.a_nocorrientes,
                    p_corriente: _this.p_corrientes,
                    p_nocorriente: _this.p_nocorrientes,
                    patrimonio: _this.patrimonios,
                    t_patrimonio: _this.total_balance_inicial.t_patrimonio_pasivo
                }).then(response => {
                  if (response.data.success == true) {
                     toastr.success(response.data.message, "Smarmoddle", {
                    "timeOut": "3000"
                   });
                    _this.cambioActivo();
                    _this.cambioActivoNo();
                    _this.cambioPasivo();
                    _this.cambioPasivoNo();
                    _this.cambioPatrimonio();
                    diario.obtenerBalanceInicial();
                    $('#list-tab a:nth-child(3)').tab('show');
                    console.log(response.data); 
                  } else {
                      toastr.success(response.data.message, "Smarmoddle", {
                    "timeOut": "3000"
                   });
                    _this.cambioActivo();
                    _this.cambioActivoNo();
                    _this.cambioPasivo();
                    _this.cambioPasivoNo();
                    _this.cambioPatrimonio();
                    diario.obtenerBalanceInicial();
                  }                     
                }).catch(function(error){
                  toastr.error(error.response.data.message, "Smarmoddle", {
                    "timeOut": "3000"
                   });
                });
              }
            },
            obtenerBalance:function(){
              var _this = this;
                var url = '/sistema/admin/taller/obtenerbalance';
                    axios.post(url,{
                    id: _this.id_taller,
                    tipo: _this.tipo
                }).then(response => {
                  if (response.data.tipo == _this.tipo || response.data.datos == true ) {
                      toastr.success(response.data.message, "Smarmoddle", {
                    "timeOut": "3000"
                   });
                    _this.balance_inicial.nombre = response.data.nombre
                    _this.balance_inicial.fecha = response.data.fecha
                    _this.a_corrientes = response.data.a_corriente;
                    _this.a_nocorrientes = response.data.a_nocorriente;
                    _this.p_corrientes = response.data.p_corriente;
                    _this.p_nocorrientes = response.data.p_nocorriente;
                    _this.patrimonios = response.data.patrimonios;
                    _this.total_balance_inicial.t_patrimonio_pasivo = response.data.total_pasivo_patrimonio;
                    _this.cambioActivo();
                    _this.cambioActivoNo();
                    _this.cambioPasivo();
                    _this.cambioPasivoNo();
                    _this.cambioPatrimonio();
                    //diario.obtenerBalanceInicial();
                    console.log(response.data);                 
                  } else {

                  }
                }).catch(function(error){
                
                });

            }
  }   
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////DIARIO GENERAL//////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const diario = new Vue({
 el: '#diario',
    data:{
      id_taller: taller,
      nombre:'',
      fechabalance:'',
      complete:false,
      balanceInicial:{
        debe:[],
        haber:[],
        totaldebe:0,
        totalhaber:0
       },
       registros:[
       ],
       porcentajes:{
        porcentaje:0,
        index_cuenta:'',
        tipo:'',
        cantidad:0
       },
       registerindex: 0,
       cuentaindex: 0,
        diarios:{
           debe:[],
          haber:[],
          comentario:''
        },
         edit:{
           debe:[],
          haber:[],
          comentario:''
        },
        diario:{
          debe:{
            fecha:'',
            nom_cuenta:'',
            saldo:'0.00',
          },
          haber:{
            fecha:'',
            nom_cuenta:'',
            saldo:'0.00'
          },
          comentario:''
        },
        pasan:{ 
          debe:0, 
          haber:0
        },
        dato:[]
    },
      mounted: function(){
    this.obtenerBalanceInicial();
    

 
  },
    methods:{
    obtenerBalanceInicial: function(){
      var _this = this;
      var url = '/sistema/admin/taller/b_inicial_diario';
        axios.post(url,{
          id: _this.id_taller,
        }).then(response => {
          if (response.data.datos == true) {
            _this.balanceInicial.debe = response.data.activos;
          _this.balanceInicial.haber = response.data.pasivos;
          _this.nombre = response.data.nombre;
          _this.fechabalance = response.data.fecha;
          $('#list-tab a:nth-child(3)').tab('show');
            console.log(response.data); 
            this.totalDebeBi();
            this.totalHaberBi();
            this.obtenerDiarioGeneral();
          }
                    
        }).catch(function(error){

        });

    },
    agregarHaber(){
                var haber = {fecha:this.diario.haber.fecha, nom_cuenta:this.diario.haber.nom_cuenta, saldo:this.diario.haber.saldo};
                this.diarios.haber.push(haber);//añadimos el la variable persona al array
                //Limpiamos los campos
                toastr.success("Activo agregado correctamente", "Smarmoddle", {
                "timeOut": "3000"
                });
                this.diario.haber.fecha =''
                this.diario.haber.nom_cuenta =''
                this.diario.haber.saldo =''
    },
     agregarDebe(){
      if (this.diarios.debe.length == 0) {
        if (this.diario.debe.fecha.trim() === '') {
          toastr.error("La fecha es obligatoria en la primera cuenta del registro", "Smarmoddle", {
                "timeOut": "3000"
            });
        }else{
         var debe = {fecha:this.diario.debe.fecha, nom_cuenta:this.diario.debe.nom_cuenta, saldo:this.diario.debe.saldo};
                this.diarios.debe.push(debe);//añadimos el la variable persona al array
                //Limpiamos los campos
                toastr.success("Activo agregado correctamente", "Smarmoddle", {
                "timeOut": "3000"
                });
                this.diario.debe.fecha =''
                this.diario.debe.nom_cuenta =''
                this.diario.debe.saldo =''
        }
      } else {
         var debe = {fecha:'', nom_cuenta:this.diario.debe.nom_cuenta, saldo:this.diario.debe.saldo};
                this.diarios.debe.push(debe);//añadimos el la variable persona al array
                //Limpiamos los campos
                toastr.success("Activo agregado correctamente", "Smarmoddle", {
                "timeOut": "3000"
                });
                this.diario.debe.fecha =''
                this.diario.debe.nom_cuenta =''
                this.diario.debe.saldo =''
      }
               
    },
    agregarComentario(){
      this.diarios.comentario = this.diario.comentario;
      this.diario.comentario = '';
    },
  deleteHaber(index){
      this.diarios.haber.splice(index, 1);
    },
  deleteDebe(index){
      this.diarios.debe.splice(index, 1);
    },
    guardarRegistro(){
      if (this.diarios.debe == 0) {
         toastr.error("No tienes transaccion para guardar", "Smarmoddle", {
                "timeOut": "3000"
            });
      }else  if (this.diarios.comentario.trim() === '') {
         toastr.error("Debes agregar un comentario", "Smarmoddle", {
                "timeOut": "3000"
            });
      }else{
           var registro = {debe:this.diarios.debe, haber:this.diarios.haber, comentario:this.diarios.comentario};
                this.registros.push(registro);//añadimos el la variable persona al array
                //Limpiamos los campos
                toastr.success("Registro agregado correctamente", "Smarmoddle", {
                "timeOut": "3000"
                });
                this.diarios.debe =[];
                this.diarios.haber =[];
                this.diarios.comentario = '';
                // console.log(this.registros);
                this.totalDebe();
           this.totalHaber();
                
      }
    },
    debeEditRegister(id){
      var register = this.registros;
      this.registerindex = id;
      this.edit.debe =[];
      this.edit.haber =[];
      this.edit.debe = register[id].debe;
      this.edit.haber = register[id].haber;
      this.edit.comentario = register[id].comentario;
      console.log(this.registros[id]);

    },
    deleteRegistro(id){
      this.registros.splice(id, 1);
      this.totalDebe();
      this.totalHaber();
    },
    updaterRegister(){
     var  id = this.registerindex;
     this.registros[id].debe = this.edit.debe;
     this.registros[id].haber = this.edit.haber;
     this.registros[id].comentario = this.edit.comentario;
     this.edit.debe =   [];
    this.edit.haber = [];
    this.edit.comentario = '';
    this.totalDebe();
           this.totalHaber();
    },
  //   habereditRegister(id, index){
  //     console.log(id);
  //   console.log(index);
  // },
  agregarEdit(){
     var haber = {fecha:this.diario.haber.fecha, nom_cuenta:this.diario.haber.nom_cuenta, saldo:this.diario.haber.saldo};
              this.edit.haber.push(haber);//añadimos el la variable persona al array
                //Limpiamos los campos
            toastr.success("Activo agregado correctamente", "Smarmoddle", {
                "timeOut": "3000"
            });
                this.diario.haber.fecha =''
                this.diario.haber.nom_cuenta =''
                this.diario.haber.saldo =''
   },
   agregarEditPasivo(){
         var debe = {fecha:'', nom_cuenta:this.diario.debe.nom_cuenta, saldo:this.diario.debe.saldo};
                this.edit.debe.push(debe);//añadimos el la variable persona al array
                //Limpiamos los campos
                toastr.success("Activo agregado correctamente", "Smarmoddle", {
                "timeOut": "3000"
                });
                this.diario.debe.fecha =''
                this.diario.debe.nom_cuenta =''
                this.diario.debe.saldo =''
             
   },
    haberEdit(index){
      var edit = this.edit;
      this.cuentaindex  = index;
      this.diario.haber.nom_cuenta  = edit.haber[index].nom_cuenta;
      this.diario.haber.saldo       = edit.haber[index].saldo;
      $('#haber_a').modal('show'); 
    },
    updateHaber(){
      var id                         = this.cuentaindex;
      this.edit.haber[id].nom_cuenta = this.diario.haber.nom_cuenta;
      this.edit.haber[id].saldo      = this.diario.haber.saldo;
      $('#haber_a').modal('hide'); 
        this.diario.haber.nom_cuenta = '';
        this.diario.haber.saldo = '';
    },
    habediarioEdit(index){
      this.cuentaindex  = index;
      this.diario.haber.nom_cuenta  = this.diarios.haber[index].nom_cuenta;
      this.diario.haber.saldo       = this.diarios.haber[index].saldo;
      $('#haber_d').modal('show'); 
    },
      updateHaber1(){
      var id = this.cuentaindex;
      this.diarios.haber[id].nom_cuenta  = this.diario.haber.nom_cuenta;
      this.diarios.haber[id].saldo       = this.diario.haber.saldo;
      $('#haber_d').modal('hide'); 
        this.diario.haber.nom_cuenta = '';
        this.diario.haber.saldo = '';
    },
    haberDelete(index){
      this.edit.haber.splice(index, 1);
    },
    comentarioEdit(){
     this.diario.comentario = this.edit.comentario;
     $('#comentario').modal('show'); 

    },
    comentarioUpdate(){
      this.edit.comentario = this.diario.comentario;
      $('#comentario').modal('hide'); 
      this.diario.comentario = '';
    },
    debeEdit(index){
      this.cuentaindex        = index;
      if (index == 0) {
      this.diario.debe.fecha  = this.edit.debe[index].fecha;  
      }
      this.diario.debe.nom_cuenta  = this.edit.debe[index].nom_cuenta;
      this.diario.debe.saldo       = this.edit.debe[index].saldo;
      $('#debe_a').modal('show'); 
    },
    updateDebe(){
      var id                         = this.cuentaindex;
       if (id == 0) {
      this.edit.debe[id].fecha = this.diario.debe.fecha; 
      }
      this.edit.debe[id].nom_cuenta = this.diario.debe.nom_cuenta;
      this.edit.debe[id].saldo      = this.diario.debe.saldo;
      $('#debe_a').modal('hide'); 
        this.diario.debe.nom_cuenta = '';
        this.diario.debe.saldo = '';
    },
     debediairoEdit(index){
      this.cuentaindex     = index;
      if (index == 0) {
      this.diario.debe.fecha  = this.diarios.debe[index].fecha;  
      }
      this.diario.debe.nom_cuenta  = this.diarios.debe[index].nom_cuenta;
      this.diario.debe.saldo       = this.diarios.debe[index].saldo;
      $('#debe_d').modal('show'); 
    },
    updateDebe1(){
      var id  = this.cuentaindex;
       if (id == 0) {
      this.diarios.debe[id].fecha = this.diario.debe.fecha; 
      }
      this.diarios.debe[id].nom_cuenta = this.diario.debe.nom_cuenta;
      this.diarios.debe[id].saldo      = this.diario.debe.saldo;
      $('#debe_d').modal('hide');
      if (id == 0) {
        this.diario.debe.fecha = '';
      } 
        this.diario.debe.nom_cuenta = '';
        this.diario.debe.saldo = '';
    },
    debeDelete(index){
      this.edit.debe.splice(index, 1);
    },
     totalDebeBi: function(){
            var balan = this.balanceInicial;
            var total = 0; 
            balan.debe.forEach(function(obj, index){
                total += Number(obj.saldo);
            });
            // console.log(total);        
            this.balanceInicial.totaldebe = total;
            

          },
    totalHaberBi: function(){
            var balan = this.balanceInicial;
            var total = 0; 
            balan.haber.forEach(function(obj, index){
                total += Number(obj.saldo);
            });
            // console.log(total);        
            this.balanceInicial.totalhaber = total;
            
          },
    totalDebe: function(){
            this.pasan.debe = 0;
            var regis = this.registros;
            var total = 0;        
            regis.forEach(function(obj, index){
              obj.debe.forEach(function(sal, id){
                total += Number(sal.saldo);
              })
            });
            // console.log(total);
            this.pasan.debe = this.balanceInicial.totaldebe + total;
          },
        totalHaber: function(){
            this.pasan.haber = 0;
            var regis = this.registros;
            var total = 0;
            
            regis.forEach(function(obj, index){
              obj.haber.forEach(function(sal, id){
                total += Number(sal.saldo);
              })
            });
            // console.log(total);  
            this.pasan.haber =  this.balanceInicial.totalhaber +  total;
          }, 
  guardarDiario: function(){
        var _this = this;
        var url = '/sistema/admin/taller/diario';
            axios.post(url,{
              id: _this.id_taller,
              registro: _this.registros
              // debe: _this.diarios.debe,
              // haber: _this.diarios.haber
        }).then(response => {
          if (response.data.success == false) {
                    toastr.error(response.data.message, "Smarmoddle", {
                    "timeOut": "3000"
                   });
          }else if(response.data.success == 'act'){
            toastr.success("Diario General Actualizado Correctamente", "Smarmoddle", {
                "timeOut": "3000"
                });
            this.obtenerDiarioGeneral();
          }else{
           toastr.success("Diairo General Creado Correctamente", "Smarmoddle", {
                "timeOut": "3000"
                });
          _this.complete = response.data.success
          _this.dato     = response.data;
          this.obtenerDiarioGeneral();
            //console.log( _this.dato); 
            }          
        }).catch(function(error){
        });  
      },

    obtenerDiarioGeneral: function(){
        var _this = this;
        var url = '/sistema/admin/taller/diariogeneral';
            axios.post(url,{
              id: _this.id_taller,
        }).then(response => {
          if (response.data.datos == true) {
          _this.registros = response.data.dgeneral;
          _this.complete = true;
           this.totalDebe();
           this.totalHaber();
            }          
        }).catch(function(error){

        }); 
    }

    }
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////BALANCE DE COMPROBACION /////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const balance_comp = new Vue({
  el: '#balance_comp',
  data:{
    id_taller: taller,
    balances:[], //array del balance de COMPROBACION
    balance:{ //variables a utilizar para el balance de COMPROBACION
      cuenta:'',
      suma_debe:'',
      suma_haber:'',
      saldo_debe:'',
      saldo_haber:'',
    },
    suman:{ //suma total del balance COMPROBACION
      sum_debe:0,
      sum_haber:0,
      sal_debe:0,
      sal_haber:0,
    },
    update: false,
    registro_id:0

  },
  mounted: function(){
    this.obtenerBalanceCom();
  },
  methods:{
    sumas(){
      let debe = Number(this.balance.suma_debe);
      let haber = Number(this.balance.suma_haber);
      if (debe > haber) {
        this.balance.saldo_debe = Number(debe - haber).toFixed(2);
        this.balance.saldo_haber = '';
      }else{
        this.balance.saldo_haber = Number(haber - debe).toFixed(2);
        this.balance.saldo_debe = '';

      }
    },
    mover(){
      this.update = false;
        this.balance.cuenta =''
     this.balance.suma_debe=''
     this.balance.suma_haber=''
    },
        log: function(evt) {
      window.console.log(evt);
    },
    totales: function(){
            this.suman.sum_debe  = 0;
            this.suman.sum_haber = 0;
            this.suman.sal_debe  = 0;
            this.suman.sal_haber = 0;
            let regis = this.balances;
            let total1 = 0;
            let total2 = 0;
            let total3 = 0;
            let total4 = 0;
            
            regis.forEach(function(obj, index){
                total1 += Number(obj.suma_debe );
            });

             regis.forEach(function(obj, index){
                total2 += Number(obj.suma_haber );
            }); 
             regis.forEach(function(obj, index){
                total3 += Number(obj.saldo_debe );
            }); 
             regis.forEach(function(obj, index){
                total4 += Number(obj.saldo_haber );
            });  
            this.suman.sum_debe =   total1.toFixed(2);
            this.suman.sum_haber =   total2.toFixed(2);
            this.suman.sal_debe =   total3.toFixed(2);
            this.suman.sal_haber =   total4.toFixed(2);

          }, 

    agregarRegistro(){

     if(this.balance.cuenta.trim() ===''){
      toastr.error("El campo Cuenta es obligatorio", "Smarmoddle", {
        "timeOut": "3000"
    });

     } else if(this.balance.suma_debe.trim() ==='' && this.balance.suma_haber.trim() ===''){
      toastr.error("No puedes dejar los campos de haber y debe vacios", "Smarmoddle", {
        "timeOut": "3000"
    });

     }else {
      this.sumas()

      var balance ={ cuenta:this.balance.cuenta, suma_debe:this.balance.suma_debe, suma_haber:this.balance.suma_haber, saldo_debe:this.balance.saldo_debe, saldo_haber:this.balance.saldo_haber}
      this.balances.push(balance);
      toastr.success("Registro agregado correctamente", "Smarmoddle", {
        "timeOut": "3000"
    });

     this.balance.cuenta =''
     this.balance.suma_debe=''
     this.balance.suma_haber=''
     this.totales();

     }                
      }, //fin metodo agregar registro   
      deleteBalance(index){
        this.balances.splice(index, 1);
        this.totales();
      },//fin metodo delete cuenta 
      

      editBalance(index){
       this.update = true;
       this.registro_id = index;
       this.balance.cuenta     = this.balances[index].cuenta;
       this.balance.suma_debe  = this.balances[index].suma_debe;
       this.balance.suma_haber = this.balances[index].suma_haber;
              
      },
    actualizarBalance(){
      if(this.balance.cuenta.trim() ===''){
      toastr.error("El campo Cuenta es obligatorio", "Smarmoddle", {
        "timeOut": "3000"
    });

     } else if(this.balance.suma_debe.trim() ==='' && this.balance.suma_haber.trim() ===''){
      toastr.error("No puedes dejar los campos de haber y debe vacios", "Smarmoddle", {
        "timeOut": "3000"
    });

     }else {
        this.sumas();
        let id = this.registro_id;
        this.balances[id].cuenta     = this.balance.cuenta;
        this.balances[id].suma_debe  = this.balance.suma_debe;
        this.balances[id].suma_haber = this.balance.suma_haber;
        this.balances[id].saldo_debe = this.balance.saldo_debe;
        this.balances[id].saldo_haber = this.balance.saldo_haber;

        this.balance.cuenta =''
        this.balance.suma_debe=''
        this.balance.suma_haber=''
        this.balance.saldo_haber=''
        this.balance.saldo_haber=''
        this.update = false;
        this.totales();

      }
    },
    guardarBalance: function() {
        if(this.balances.length == 0){
          toastr.error("Debe haber al menos un registro en el Balance", "Smarmoddle", {
            "timeOut": "3000"
        });

     }else{
        let _this = this;
        let url = '/sistema/admin/taller/balance-comprobacion';
            axios.post(url,{
              id: _this.id_taller,
              balances: _this.balances,
              sum_debe: _this.suman.sum_debe,
              sum_haber: _this.suman.sum_haber,
              sal_debe: _this.suman.sal_debe,
              sal_haber: _this.suman.sal_haber,

        }).then(response => {
          if (response.data.estado == 'guardado') {
              toastr.success("Balance creado correctamente", "Smarmoddle", {
            "timeOut": "3000"
            });
            }else if (response.data.estado == 'actualizado') {
              toastr.warning("Balance actualizado correctamente", "Smarmoddle", {
            "timeOut": "3000"
            });
            }        
        }).catch(function(error){

        }); 

     } 
     
     },
        obtenerBalanceCom: function() {
        let _this = this;
        let url = '/sistema/admin/taller/balance-obtener-comprobacion';
            axios.post(url,{
              id: _this.id_taller,
        }).then(response => {
          if (response.data.datos == true) {
              toastr.info("Balance de Comprobacion cargado correctamente", "Smarmoddle", {
            "timeOut": "3000"
            });
              this.balances = response.data.bcomprobacion;
              this.totales();
            }          
        }).catch(function(error){

        }); 
     } 
     
  }
  
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////BALANCE DE COMPROBACIO AJUSTADO /////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const balance_ajustado = new Vue({
  el: "#balance_ajustado",
  data:{
        id_taller: taller,
    balances_ajustados:[], //array del balance de COMPROBACION
    balance:{ //variables a utilizar para el balance de COMPROBACION
      cuenta:'',
      debe:'',
      haber:'',
    },
    suman:{ //suma total del balance COMPROBACION
      debe:0,
      haber:0,
    },
    update: false,
    registro_id:0
  },
   mounted: function(){
    this.obtenerBalanceAjus();
  },
  methods:{
     totales: function(){
            this.suman.debe  = 0;
            this.suman.haber = 0;
            let regis = this.balances_ajustados;
            let total1 = 0;
            let total2 = 0;
            
            regis.forEach(function(obj, index){
                total1 += Number(obj.debe );
            });

             regis.forEach(function(obj, index){
                total2 += Number(obj.haber );
            }); 
            this.suman.debe =   total1.toFixed(2);
            this.suman.haber =   total2.toFixed(2);

          }, 

    agregarRegistro(){
     if(this.balance.cuenta.trim() ===''){
      toastr.error("El campo Cuenta es obligatorio", "Smarmoddle", {
        "timeOut": "3000"
    });

     } else if(this.balance.debe.trim() !='' && this.balance.haber.trim() !=''){
      toastr.error("No puedes llenar ambos campos de debe y haber", "Smarmoddle", {
        "timeOut": "3000"
    });

     }else if(this.balance.debe.trim() ==='' && this.balance.haber.trim() ===''){
      toastr.error("No puedes dejar ambos campos de debe y haber en blanco", "Smarmoddle", {
        "timeOut": "3000"
    });

     }else {
      // this.sumas()

      var balance ={ cuenta:this.balance.cuenta, debe:this.balance.debe, haber:this.balance.haber}
      this.balances_ajustados.push(balance);
      toastr.success("Registro agregado correctamente", "Smarmoddle", {
        "timeOut": "3000"
    });

     this.balance.cuenta =''
     this.balance.debe=''
     this.balance.haber=''
     this.totales();

     }                
      }, //fin metodo agregar registro  
      deleteBalance(index){
        this.balances_ajustados.splice(index, 1);
        this.totales();
      },//fin metodo delete cuenta 
      

      editBalance(index){
       this.update = true;
       this.registro_id = index;
       this.balance.cuenta     = this.balances_ajustados[index].cuenta;
       this.balance.debe  = this.balances_ajustados[index].debe;
       this.balance.haber = this.balances_ajustados[index].haber;
              
      },
      actualizarBalance(){
          if(this.balance.cuenta.trim() ===''){
          toastr.error("El campo Cuenta es obligatorio", "Smarmoddle", {
            "timeOut": "3000"
        });

         } else if(this.balance.debe.trim() !='' && this.balance.haber.trim() !=''){
          toastr.error("No puedes llenar ambos campos de debe y haber", "Smarmoddle", {
        "timeOut": "3000"
        });

        }else if(this.balance.debe.trim() ==='' && this.balance.haber.trim() ===''){
          toastr.error("No puedes dejar ambos campos de debe y haber en blanco", "Smarmoddle", {
          "timeOut": "3000"
        });

        }else {
            // this.sumas();
            let id                             = this.registro_id;
            this.balances_ajustados[id].cuenta = this.balance.cuenta;
            this.balances_ajustados[id].debe   = this.balance.debe;
            this.balances_ajustados[id].haber  = this.balance.haber;
            
            this.balance.cuenta =''
            this.balance.debe   =''
            this.balance.haber  =''
            this.update         = false;
            this.totales();

      }
    },
     guardarBalance: function() {
        if(this.balances_ajustados.length == 0){
          toastr.error("Debe haber al menos un registro en el Balance", "Smarmoddle", {
            "timeOut": "3000"
        });

     }else{
        let _this = this;
        let url = '/sistema/admin/taller/balance-ajustado';
            axios.post(url,{
              id: _this.id_taller,
              balances: _this.balances_ajustados,
              total_debe: _this.suman.debe,
              total_haber: _this.suman.haber,

        }).then(response => {
          if (response.data.estado == 'guardado') {
              toastr.success("Balance creado correctamente", "Smarmoddle", {
            "timeOut": "3000"
            });
            }else if (response.data.estado == 'actualizado') {
              toastr.warning("Balance actualizado correctamente", "Smarmoddle", {
            "timeOut": "3000"
            });
            }        
        }).catch(function(error){

        }); 

     } 
     
     },
      obtenerBalanceAjus: function() {
        let _this = this;
        let url = '/sistema/admin/taller/balance-obtener-ajustado';
            axios.post(url,{
              id: _this.id_taller,
        }).then(response => {
          if (response.data.datos == true) {
              toastr.info("Balance de Comprobacion Ajustado cargado correctamente", "Smarmoddle", {
            "timeOut": "3000"
            });
              this.balances_ajustados = response.data.bcomprobacionAjustado;
              this.totales();
            }          
        }).catch(function(error){

        }); 
     } 

  }

  
});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////KARDEX ///////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

const kardex = new Vue({
  el: "#kardex",
  data:{
    exis:{
      cantidad:'',
      precio:'',
      total:''
    },
    totales:{
      cantidad:'',
      precio:'',
      subtotal:'',
      total:''
    },
    ejercicio:[],
    actuingreso:{
      estado:false,
      index:'',
    },
    modales:{
      modal_ingreso:[],
      existencia_ingreso: false,
      modal_devolucion_compra:[],
      modal_egreso:[],
      modal_devolucion_venta:[]
    },
    actuegreso:{
      estado:false,
      index:'',
    },
    egresos:[],
    existencias:[],
    transacciones:[

    ],
    update: false,
    inicial:{
      fecha:'',
      movimiento:'',
      cantidad:'',
      precio:'',
      total:''
    },
    movimientos:[],
    transaccion:{
      fecha:'',
      movimiento:'',
        ingreso:{
          cantidad:'',
          precio:'',
          total:''
        },
        egreso:{
          cantidad:'',
          precio:'',
          total:'',
          temp:''
        },
        existencia:{
          cantidad:'',
          precio:'',
          total:''
        },
        exis:{
          cantidad:'',
          precio:'',
        }

    }
  },
  methods:{
    modalIngreso:function () {
      if (this.transacciones.length >= 1) {
      //    let i =  this.transacciones.length - 1;
      //     console.log(this.transacciones[i]);
      // this.movimientos =  this.transacciones[i];
      const existencias = JSON.parse(JSON.stringify(this.existencias));
      const ventas = JSON.parse(JSON.stringify(this.existencias));
      // let existencias = this.existencias;

      this.modales.modal_ingreso = existencias;
      this.modales.modal_devolucion_venta = ventas;
      }
      $('#ingreso').modal('show');
    },
       modalInicial:function () {
      if (this.transacciones.length >= 1) {
         let i =  this.transacciones.length - 1;
      console.log(this.transacciones[i]);
      this.movimientos =  this.transacciones[i];
      }
      $('#saldo_inicial').modal('show');
    },
    modalEgreso:function () {
      if (this.transacciones.length >= 1) {
        const existencias = JSON.parse(JSON.stringify(this.existencias));
        const compras = JSON.parse(JSON.stringify(this.existencias));
      // let existencias = this.existencias;

      this.modales.modal_egreso = existencias;
      this.modales.modal_devolucion_compra = compras;

      //    let i =  this.transacciones.length - 1;
      // console.log(this.transacciones[i]);
      // this.movimientos =  this.transacciones[i];
      }
      $('#egreso').modal('show');
    },
    //   modalCompra:function () {
    //   if (this.transacciones.length >= 1) {
    //      let i =  this.transacciones.length - 1;
    //   console.log(this.transacciones[i]);
    //   this.movimientos =  this.transacciones[i];
    //   }
    //   $('#devolucion_compra').modal('show');
    // },
    //     modalVenta:function () {
    //   if (this.transacciones.length >= 1) {
    //      let i =  this.transacciones.length - 1;
    //   console.log(this.transacciones[i]);
    //   this.movimientos =  this.transacciones[i];
    //   }
    //   $('#devolucion_venta').modal('show');
    // },
    totalIng(id){
      let i = id;
      let exis = this.totales.total
      let cantidad = Number(this.modales.modal_ingreso[i].ingreso_cantidad);
      let precio = Number(this.modales.modal_ingreso[i].ingreso_precio);
      let total1 = this.modales.modal_ingreso[i].ingreso_total;

      
      let multiplicacion =  cantidad * precio;
      this.modales.modal_ingreso[i].existencia_cantidad = cantidad;
      this.modales.modal_ingreso[i].existencia_precio = precio;

      this.modales.modal_ingreso[i].ingreso_total = multiplicacion;
    if (!this.actuingreso.estado) {
      if (total1 > multiplicacion) {
        let dife = total1 - multiplicacion;
        let suma = exis - dife  
        this.totales.total = suma
      }else{
        let adi = multiplicacion - total1 ;
        let suma = adi + exis
        this.totales.total = suma
      }
    this.modales.modal_ingreso[i].existencia_total = this.totales.total;
        toastr.error("Datos Actualizado", "Smarmoddle", {
        "timeOut": "3000"
        });
    }else if(this.actuingreso.estado){
      let transacciones = this.transacciones;
      let index = this.actuingreso.index;
      // let num = transacciones[index][i].identificador;

      let identificador = transacciones.length - 1;

    if (index !== identificador) {
      if (total1 > multiplicacion) {
        let dife = total1 - multiplicacion;
       transacciones.forEach(function(transaccion, i){
              transaccion.forEach(function(total, id){
                let temp = total.existencia_total;
                if (temp != null && temp !=='' && total.tipo !== 'inicial' && i >= index) {
                  total.existencia_total = temp - dife;

                  // console.log(temp);
                } 
                
              })
            });
        let ultimodato = transacciones[identificador];
        let egreso = ultimodato.filter(x => x.tipo == 'ingreso' ||  x.tipo == 'egreso');
          console.log(egreso);

        if (egreso[0].tipo == 'egreso' ) {
          let last = transacciones[identificador];
          // console.log(ultimodato)

          let final = last.length - 1;
          this.totales.total = Number(transacciones[identificador][final].existencia_total);

          }else if( egreso[0].tipo == 'ingreso' ){

           this.totales.total = Number(egreso[0].existencia_total);
          }
     }else{
        let adi = multiplicacion - total1;
              transacciones.forEach(function(transaccion, i){
              transaccion.forEach(function(total, id){
                let temp = total.existencia_total;
                if (temp != null && temp !=='' && total.tipo !== 'inicial'  && i >= index) {
                  total.existencia_total = temp + adi;
                  // console.log(temp);
                } 
                
              })
            });
               let ultimodato = transacciones[identificador];
      let egreso = ultimodato.filter(x => x.tipo == 'ingreso' ||  x.tipo == 'egreso');
          console.log(egreso);
         if (egreso[0].tipo == 'egreso' ) {
          let last = transacciones[identificador];
             let final = last.length - 1;
            this.totales.total = Number(transacciones[identificador][final].existencia_total);

           

        }else if(egreso[0].tipo == 'ingreso' ){

           this.totales.total = Number(egreso[0].existencia_total);
          }
           // this.totales.total = Number(egreso[0].existencia_total);
      }
    }else{
        if (total1 > multiplicacion) {
        let dife = total1 - multiplicacion;
        let suma = exis - dife  
        this.totales.total = suma
      }else{
        let adi = multiplicacion - total1 ;
        let suma = adi + exis
        this.totales.total = suma
      }
       this.modales.modal_ingreso[i].existencia_total = this.totales.total;
        toastr.error("Datos Actualizado", "Smarmoddle", {
        "timeOut": "3000"
        });
    }
      }
    },

    bajarExis(estado){

    // if (estado == 'mostrar') {
    //   this.modales.existencia_ingreso = true;
    //   return
    // }
    //  if (estado == 'cerrar') {
    //   this.modales.existencia_ingreso = false;
    //   return
    // }
    
    //   if( this.exis.cantidad.trim() ==='' || this.exis.precio.trim() ==='' ){
    //   toastr.error("Todos lo campos son obligatorios", "Smarmoddle", {
    //     "timeOut": "3000"
    // });
     // }else{
    let id = this.transacciones.length + 1;
    var existencia ={identificador: id, tipo:'existencia', existencia_cantidad:this.exis.cantidad, existencia_precio:this.exis.precio,}
      this.modales.modal_ingreso.unshift(existencia);
      toastr.success("Agregado", "Smarmoddle", {
        "timeOut": "3000"
    });
      this.exis.cantidad = '';
      this.exis.precio = '';
      this.modales.existencia_ingreso = false;
     // }
    },

    agregarTran(){
   
    if(this.inicial.fecha.trim() ==='' || this.inicial.movimiento.trim() ==='' || this.inicial.cantidad.trim() ==='' || this.inicial.precio.trim() ==='' ){
      toastr.error("Todos lo campos son obligatorios", "Smarmoddle", {
        "timeOut": "3000"
    });
     }else {
      this.inicial.total = Number(this.inicial.cantidad) * Number(this.inicial.precio);

      let existencia = {tipo:'existencia', existencia_cantidad:this.inicial.cantidad, existencia_precio:this.inicial.precio}
      this.existencias.push(existencia);
      let registro = [];
      // this.sumas()
      var array = {tipo:'inicial', fecha: this.inicial.fecha, movimiento:this.inicial.movimiento, ingreso_cantidad:'', ingreso_precio:'', ingreso_total:'', existencia_cantidad:this.inicial.cantidad, existencia_precio: this.inicial.precio, existencia_total:this.inicial.total};
      registro.push(array)
      this.transacciones.push(registro) ;
    //   var balance ={ cuenta:this.balance.cuenta, debe:this.balance.debe, haber:this.balance.haber}
    //   this.balances_ajustados.push(balance);
      toastr.success("Transaccion agregada correctamente", "Smarmoddle", {
        "timeOut": "3000"
    });
      this.totales.cantidad      = this.inicial.cantidad;
      this.totales.precio        = this.inicial.precio;
      this.totales.total         = this.inicial.total;
      this.inicial.fecha      = '';
      this.inicial.movimiento = '';
      this.inicial.cantidad   = '';
      this.inicial.precio     = '';
      $('#saldo_inicial').modal('hide');
    }
  },
  agregarIngreso(){
   
    if(this.transaccion.fecha.trim() ==='' || this.transaccion.movimiento.trim() ==='' || this.transaccion.ingreso.cantidad.trim() ==='' || this.transaccion.ingreso.precio.trim() ==='' ){
      toastr.error("Todos los campos son obligatorios", "Smarmoddle", {
        "timeOut": "3000"
    });
     }else {
      let id = this.transacciones.length + 1;
      
      // let existencia = {id: id ,existencia_cantidad:this.transaccion.ingreso.cantidad, existencia_precio:this.transaccion.ingreso.precio}
      // this.existencias.push(existencia);
      // let registro = [];
      this.transaccion.ingreso.total = Number(this.transaccion.ingreso.cantidad) * Number(this.transaccion.ingreso.precio);
      let calculo = Number(this.transaccion.ingreso.total) +  Number(this.totales.total);
      let array = {identificador: id, tipo:'ingreso', fecha: this.transaccion.fecha, movimiento:this.transaccion.movimiento, ingreso_cantidad:this.transaccion.ingreso.cantidad, ingreso_precio:this.transaccion.ingreso.precio, ingreso_total:this.transaccion.ingreso.total, existencia_cantidad:this.transaccion.existencia.cantidad, existencia_precio: this.transaccion.existencia.precio, existencia_total:calculo};
      // this.transacciones.push(this.existencias);
      
      // this.ejercicio.push(array)
      this.modales.modal_ingreso.push(array)
      // this.transacciones.push(this.ejercicio);
      toastr.success("Transaccion agregada correctamente", "Smarmoddle", {
        "timeOut": "3000"
    });
      this.totales.total = calculo;
      this.transaccion.fecha            = '';
      this.transaccion.movimiento       = '';
      this.transaccion.ingreso.cantidad = '';
      this.transaccion.ingreso.precio   = '';
      this.transaccion.ingreso.cantidad = '';
      this.transaccion.ingreso.precio   = '';
      this.transaccion.exis.cantidad = this.transaccion.existencia.cantidad;
      this.transaccion.exis.precio = this.transaccion.existencia.precio;
      this.transaccion.existencia.cantidad          = '';
      this.transaccion.existencia.precio            = '';
      // this.transaccion.ingreso.total    = '';

    }
  },
  borrarIngreso(index, tipo){
    let id = index;

    if (tipo == 'venta') {
       if (this.modales.modal_devolucion_venta[id].tipo == 'ingreso_venta' ) {
      // let existencia = this.totales.total;
      // let newTotal =existencia - this.modales.modal_devolucion_venta[id].ingreso_total;
      // this.totales.total = newTotal;

      this.modales.modal_devolucion_venta.splice(index, 1);
    }else if(this.modales.modal_devolucion_venta[id].tipo == 'existencia' ){
      this.modales.modal_devolucion_venta.splice(index, 1);
    }
    }else{
       if (this.modales.modal_ingreso[id].tipo == 'ingreso' ) {
      let existencia = this.totales.total;
      let newTotal =existencia - this.modales.modal_ingreso[id].ingreso_total;
      this.totales.total = newTotal;

      this.modales.modal_ingreso.splice(index, 1);
    }else if(this.modales.modal_ingreso[id].tipo == 'existencia' ){
      this.modales.modal_ingreso.splice(index, 1);
    }

    }
   

  },

  agregarTransaccion(tipo){
     let egreso = this.modales.modal_ingreso.filter(x => x.tipo == 'ingreso_venta');
     if (tipo == 'ingreso') {
      let ingreso = this.modales.modal_ingreso.filter(x => x.tipo == 'ingreso');
      let id = this.transacciones.length + 1;
      let filtro_existencias = this.modales.modal_ingreso.filter(x => x.tipo == 'existencia');
      // let calculo = Number(this.transaccion.ingreso.total) +  Number(this.totales.total);
      let existencia = {identificador: id, tipo:'existencia', existencia_cantidad:ingreso[0].existencia_cantidad, existencia_precio:ingreso[0].existencia_precio}
      filtro_existencias.push(existencia);
      this.existencias = filtro_existencias;
      this.transacciones.push(this.modales.modal_ingreso);
      this.modales.modal_ingreso = [];
      // this.totales.total = calculo;
      
      this.transaccion.ingreso.total    = '';
      $('#ingreso').modal('hide');

     }else{
      let venta = this.modales.modal_devolucion_venta.filter(x => x.tipo == 'ingreso_venta');

       let id = this.transacciones.length + 1;
      let filtro_existencias = this.modales.modal_devolucion_venta.filter(x => x.tipo == 'existencia');
      let existencia = {identificador: id, tipo:'existencia', existencia_cantidad:venta[0].existencia_cantidad, existencia_precio:venta[0].existencia_precio}
          filtro_existencias.unshift(existencia);
      this.existencias = filtro_existencias;

       let ingresototal = this.modales.modal_devolucion_venta[0].existencia_total;
        let ultimo = this.modales.modal_ingreso.length - 1;
        // let ingresototal = this.modales.modal_ingreso[ultimo].existencia_total;
        let total = Number(ingresototal);
        this.transacciones.push(this.modales.modal_devolucion_venta);
        this.modales.modal_devolucion_venta = [];
        this.totales.total = total;
        this.transaccion.ingreso.cantidad = '';
        this.transaccion.ingreso.precio   = '';
        this.transaccion.ingreso.total    = '';
      $('#ingreso').modal('hide');

     }
  },
  editarTransaccion(index, id){
    // let id = index;
     if (this.transacciones[index][id].tipo == 'inicial') {
      // console.log('Esto es el inventario inicial')
      this.update = true;
      this.inicial.fecha = this.transacciones[index][id].fecha;
      this.inicial.movimiento = this.transacciones[index][id].movimiento;
      this.inicial.cantidad = this.transacciones[index][id].existencia_cantidad;
      this.inicial.precio = this.transacciones[index][id].existencia_precio;

      // let existencia = this.totales.total;
      // let newTotal =existencia - this.transacciones[id].ingreso_total;
      // this.totales.total = newTotal;

      // this.transacciones.splice(index, 1);
    }
    else if(this.transacciones[index][id].tipo == 'ingreso'){
      this.actuingreso.index = index;
      this.actuingreso.estado = true;
      const second = JSON.parse(JSON.stringify(this.transacciones[index]));
      this.ejercicio = second;
    }
      else if(this.transacciones[index][id].tipo == 'egreso'){
      this.actuegreso.index = index;
      this.actuegreso.estado = true
      const egre = JSON.parse(JSON.stringify(this.transacciones[index]));
      this.egresos = egre;
    }
    else if(this.transacciones[index][id].tipo == 'egreso_compra'){
      this.actuegreso.index = index;
      this.actuegreso.estado = true
      const comprea = JSON.parse(JSON.stringify(this.transacciones[index]));
      this.egresos = comprea;
    }
  },
  actualizarIngreso(){
    let index = this.actuingreso.index;
    this.transacciones[index] = this.ejercicio;
    this.ejercicio = [];
    this.actuingreso.estado = false;
    this.actuingreso.index = '';
  },

    agregarEgreso(tipo){

    if(this.transaccion.egreso.cantidad.trim() ==='' || this.transaccion.egreso.precio.trim() ==='' ){
      toastr.error("Todos lo campos son obligatorios", "Smarmoddle", {
        "timeOut": "3000"
    });
    }else {
      if (tipo == 'compra') {
          let id = this.transacciones.length + 1;
        this.transaccion.egreso.total = Number(this.transaccion.egreso.cantidad) * Number(this.transaccion.egreso.precio);
        let calculo = Number(this.totales.total) - Number(this.transaccion.egreso.total);
        let array = {identificacion: id, tipo:'egreso_compra', fecha:this.transaccion.fecha, movimiento:this.transaccion.movimiento, egreso_cantidad:this.transaccion.egreso.cantidad, egreso_precio:this.transaccion.egreso.precio, egreso_total:this.transaccion.egreso.total, existencia_cantidad:this.transaccion.existencia.cantidad, existencia_precio: this.transaccion.existencia.precio, existencia_total: calculo};
        this.modales.modal_devolucion_compra.push(array)
        // this.transacciones.push(registro) ;
        toastr.success("Transaccion agregada correctamente", "Smarmoddle", {
          "timeOut": "3000"
      });
        this.exis.cantidad                   = '';
        this.exis.precio                     = '';
        this.transaccion.fecha               = '';
        this.transaccion.movimiento          = '';
        this.transaccion.egreso.cantidad     = '';
        this.transaccion.egreso.precio       = '';
        this.transaccion.egreso.total        = '';
        this.transaccion.existencia.cantidad = '';
        this.transaccion.existencia.precio   = '';

        return
      }
      let egreso = this.modales.modal_egreso.filter(x => x.tipo == 'egreso');
      let id = this.transacciones.length + 1;
      if (egreso.length == 0) {
       
        //  let existencia = {id: id ,cantidad:this.transaccion.egreso.cantidad, precio:this.transaccion.egreso.precio}
        // this.existencias.push(existencia);
        // let registro = [];
        this.transaccion.egreso.total = Number(this.transaccion.egreso.cantidad) * Number(this.transaccion.egreso.precio);
        let calculo = Number(this.totales.total) - Number(this.transaccion.egreso.total);
        let array = {identificacion: id, tipo:'egreso', fecha:this.transaccion.fecha, movimiento:this.transaccion.movimiento, egreso_cantidad:this.transaccion.egreso.cantidad, egreso_precio:this.transaccion.egreso.precio, egreso_total:this.transaccion.egreso.total, existencia_cantidad:this.transaccion.existencia.cantidad, existencia_precio: this.transaccion.existencia.precio, existencia_total: calculo};
        this.modales.modal_egreso.unshift(array)
        // this.transacciones.push(registro) ;
        toastr.success("Transaccion agregada correctamente", "Smarmoddle", {
          "timeOut": "3000"
      });
        this.exis.cantidad                   = '';
        this.exis.precio                     = '';
        this.transaccion.fecha               = '';
        this.transaccion.movimiento          = '';
        this.transaccion.egreso.cantidad     = '';
        this.transaccion.egreso.precio       = '';
        this.transaccion.egreso.total        = '';
        this.transaccion.existencia.cantidad = '';
        this.transaccion.existencia.precio   = '';
      }else{
      let egresos = this.modales.modal_egreso.filter(x => x.tipo == 'egreso');

        let ultimo = egresos.length - 1;
        // let nuevo = egresos.length - 1;
        let total = Number(this.modales.modal_egreso[ultimo].existencia_total);
        this.transaccion.egreso.total = Number(this.transaccion.egreso.cantidad) * Number(this.transaccion.egreso.precio);
        let calculo =  total - Number(this.transaccion.egreso.total);
        let array = {identificacion: id, tipo:'egreso', fecha:this.transaccion.fecha, movimiento:this.transaccion.movimiento, egreso_cantidad:this.transaccion.egreso.cantidad, egreso_precio:this.transaccion.egreso.precio, egreso_total:this.transaccion.egreso.total, existencia_cantidad:this.transaccion.existencia.cantidad, existencia_precio: this.transaccion.existencia.precio, existencia_total: calculo};
        this.modales.modal_egreso.splice(ultimo + 1, 0, array);
         
         // this.modales.modal_egreso.push(array);
         this.modales.modal_egreso[ultimo].existencia_total = ''
        // this.transacciones.push(registro) ;
        toastr.success("Transaccion agregada correctamente", "Smarmoddle", {
          "timeOut": "3000"
          });
        this.exis.cantidad                   = '';
        this.exis.precio                     = '';
        this.transaccion.fecha               = '';
        this.transaccion.movimiento          = '';
        this.transaccion.egreso.cantidad     = '';
        this.transaccion.egreso.precio       = '';
        this.transaccion.egreso.total        = '';
        this.transaccion.existencia.cantidad = '';
        this.transaccion.existencia.precio   = '';
      }
    }

    },
    existenciaEgreso(tipo){

    let id = this.transacciones.length + 1;
    var existencia ={identificador: id, tipo:'existencia', existencia_cantidad:this.exis.cantidad, existencia_precio:this.exis.precio,}
    if (tipo == 'compra') {
      this.modales.modal_devolucion_compra.unshift(existencia);
    }else{
      this.modales.modal_egreso.push(existencia);
    }
      
      toastr.success("Agregado", "Smarmoddle", {
        "timeOut": "3000"
    });
      this.exis.cantidad = '';
      this.exis.precio = '';
      this.modales.existencia_ingreso = false;
     // }
      // if( this.exis.cantidad.trim() ==='' || this.exis.precio.trim() ==='' ){
      //   toastr.error("Todos lo campos son obligatorios", "Smarmoddle", {
      //     "timeOut": "3000"
      //   });
      //   }else{

      //   if (this.egresos.length == 0) {
      //      let id = this.transacciones.length + 1;
      //     let existencia = {identificador: id, tipo:'existencia', existencia_cantidad:this.exis.cantidad, existencia_precio:this.exis.precio, existencia_total:''}
      //     this.egresos.push(existencia);
      //     toastr.success("Agregado", "Smarmoddle", {
      //       "timeOut": "3000"
      //       });
      //     this.exis.cantidad               = '';
      //     this.exis.precio                 = '';
      //     this.transaccion.fecha           = '';
      //     this.transaccion.movimiento      = '';
      //     this.transaccion.egreso.cantidad = '';
      //     this.transaccion.egreso.precio   = '';
      //     this.transaccion.egreso.total    = '';
      //   }else{
      //     let id = this.transacciones.length + 1;
      //     let ultimo = this.egresos.length - 1;
      //     let total = this.egresos[ultimo].existencia_total;
      //     let existencia ={identificador: id, tipo:'existencia', existencia_cantidad:this.exis.cantidad, existencia_precio:this.exis.precio, existencia_total:total}
      //     this.egresos.push(existencia);
      //     this.egresos[ultimo].existencia_total = '';
      //     toastr.success("Agregado", "Smarmoddle", {
      //       "timeOut": "3000"
      //       });
      //     this.exis.cantidad               = '';
      //     this.exis.precio                 = '';
      //     this.transaccion.fecha           = '';
      //     this.transaccion.movimiento      = '';
      //     this.transaccion.egreso.cantidad = '';
      //     this.transaccion.egreso.precio   = '';
      //     this.transaccion.egreso.total    = '';
      //     }
      //  }
    },
    agregarEgresos(){

      let egresos = this.modales.modal_egreso.filter(x => x.tipo == 'egreso');
      let u= egresos.length - 1;
      let existencia_total = JSON.parse(JSON.stringify(egresos[u].existencia_total));
      let iden = this.transacciones.length + 1;


      let exis = this.modales.modal_egreso.filter(x => x.tipo == 'existencia');
      let conteo = this.modales.modal_egreso.filter(x => x.tipo == 'existencia');
     

      // let ultimo         = this.modales.modal_egreso.length - 1;
      // let total          = this.modales.modal_egreso[ultimo].existencia_total;
      this.totales.total = existencia_total;
    
   

      let existencias_egresos = this.modales.modal_egreso.filter(x => x.tipo == 'egreso' &&  x.existencia_cantidad > 0);
        existencias_egresos.forEach(function(existencia, id){
          let agregar = {identificador: iden, tipo:'existencia', existencia_cantidad:existencia.existencia_cantidad, existencia_precio:existencia.existencia_precio, existencia_total:''}
          exis.unshift(agregar);
            });
          // existencias.push(existencias);
       this.existencias = JSON.parse(JSON.stringify(exis));
         if (conteo.length >=1 ) {
        let e= exis.length - 1;
          exis[e].existencia_total = existencia_total
        egresos[u].existencia_total = '';
         console.log( exis[e].existencia_total)
      }

        

    
      this.transacciones.push(this.modales.modal_egreso);
      this.modales.modal_egreso = [];
      
      // this.totales.total = calculo;
      this.transaccion.fecha      = '';
      this.transaccion.movimiento = '';
      this.transaccion.egreso.cantidad = '';
      this.transaccion.egreso.precio   = '';
      this.transaccion.egreso.total    = '';
    },
    agregarDevolucionCompra(){
      
      let egresos = this.modales.modal_devolucion_compra.filter(x => x.tipo == 'egreso_compra');
      let u= egresos.length - 1;
      let existencia_total = JSON.parse(JSON.stringify(egresos[u].existencia_total));
      let iden = this.transacciones.length + 1;


      let exis = this.modales.modal_devolucion_compra.filter(x => x.tipo == 'existencia');
      let conteo = this.modales.modal_devolucion_compra.filter(x => x.tipo == 'existencia');
     

      // let ultimo         = this.modales.modal_egreso.length - 1;
      // let total          = this.modales.modal_egreso[ultimo].existencia_total;
      this.totales.total = existencia_total;
    
   

      let existencias_egresos = this.modales.modal_devolucion_compra.filter(x => x.tipo == 'egreso_compra' &&  x.existencia_cantidad > 0);
        existencias_egresos.forEach(function(existencia, id){
          let agregar = {identificador: iden, tipo:'existencia', existencia_cantidad:existencia.existencia_cantidad, existencia_precio:existencia.existencia_precio, existencia_total:''}
          exis.unshift(agregar);
            });
          // existencias.push(existencias);
       this.existencias = JSON.parse(JSON.stringify(exis));
         if (conteo.length >=1 ) {
        let e= exis.length - 1;
          exis[e].existencia_total = existencia_total
        egresos[u].existencia_total = '';
         console.log( exis[e].existencia_total)
      }

        

    
      this.transacciones.push(this.modales.modal_devolucion_compra);
      this.modales.modal_devolucion_compra = [];
      
      // this.totales.total = calculo;
      this.transaccion.fecha      = '';
      this.transaccion.movimiento = '';
      this.transaccion.egreso.cantidad = '';
      this.transaccion.egreso.precio   = '';
      this.transaccion.egreso.total    = '';
    }, 
     actualEgre(id){
      let i              = id;
      let egresos = this.modales.modal_egreso.filter(x => x.tipo == 'egreso');

      let ul = egresos.length - 1;

      let exis           =  Number(egresos[ul].existencia_total);
      // let exis           = this.totales.total
      let cantidad       = Number(this.modales.modal_egreso[i].egreso_cantidad);
      let precio         = Number(this.modales.modal_egreso[i].egreso_precio);
      let total1         = this.modales.modal_egreso[i].egreso_total;
      let multiplicacion =  cantidad * precio;

      // this.modales.modal_egreso[i].existencia_cantidad = cantidad;
      // this.modales.modal_egreso[i].existencia_precio = precio;

    this.modales.modal_egreso[i].egreso_total = multiplicacion;
      if (total1 > multiplicacion) {
        let dife = total1 - multiplicacion;
        let suma = exis - dife  
        this.totales.subtotal = suma
      }else{
        let adi = multiplicacion - total1 ;
        let suma = adi + exis
        this.totales.subtotal = suma
      }
    this.modales.modal_egreso[ul].existencia_total = this.totales.subtotal;
        toastr.error("Datos Actualizado", "Smarmoddle", {
        "timeOut": "3000"
        });
    

    },
    totaEgre(id){
      let i              = id;
      let exis           = this.totales.total
      let cantidad       = Number(this.egresos[i].egreso_cantidad);
      let precio         = Number(this.egresos[i].egreso_precio);
      let total1         = this.egresos[i].egreso_total;
      let multiplicacion =  cantidad * precio;

      // this.egresos[i].existencia_cantidad = cantidad;
      // this.egresos[i].existencia_precio = precio;

    this.egresos[i].egreso_total = multiplicacion;

    if (!this.actuegreso.estado) {

      if (total1 > multiplicacion) {
        let dife = total1 - multiplicacion;
        let suma = exis - dife  
        this.totales.total = suma
      }else{
        let adi = multiplicacion - total1 ;
        let suma = adi + exis
        this.totales.total = suma
      }
    this.egresos[i].existencia_total = this.totales.total;
        toastr.error("Datos Actualizado", "Smarmoddle", {
        "timeOut": "3000"
        });
    }else if(this.actuegreso.estado){
      let transacciones = this.transacciones;
      let index = this.actuegreso.index;
      // let num = transacciones[index][i].identificador;

      let identificador = transacciones.length - 1;

    if (index !== identificador) {

      if (total1 > multiplicacion) {
        let dife = total1 - multiplicacion;
       transacciones.forEach(function(transaccion, i){
              transaccion.forEach(function(total, id){
                let temp = total.existencia_total;
                if (temp != null && temp !=='' && total.tipo !== 'inicial' && i >= index) {
                  total.existencia_total = temp + dife;

                  // console.log(temp);
                } 
                
              })
            });
      let ultimodato = transacciones[identificador];
      let egreso = ultimodato.filter(x => x.tipo == 'ingreso' ||  x.tipo == 'egreso' || x.tipo == 'ingreso_venta');
          // console.log(egreso);
           if (egreso[0].tipo == 'egreso' ) {
            let last = transacciones[identificador];
             let final = last.length - 1;
            this.totales.total = Number(transacciones[identificador][final].existencia_total);

        }else if(egreso[0].tipo == 'ingreso' ){

           this.totales.total = Number(egreso[0].existencia_total);
          }
           // this.totales.total = Number(egreso[0].existencia_total);
     }else{
        let adi = multiplicacion - total1;
              transacciones.forEach(function(transaccion, i){
              transaccion.forEach(function(total, id){
                let temp = total.existencia_total;
                if (temp != null && temp !=='' && total.tipo !== 'inicial'  && i >= index) {
                  total.existencia_total = temp - adi;
                  // console.log(temp);
                } 
                
              })
            });
          let ultimodato = transacciones[identificador];
          let egreso = ultimodato.filter(x => x.tipo == 'ingreso' ||  x.tipo == 'egreso' || x.tipo == 'ingreso_venta');
          console.log(egreso);
           if (egreso[0].tipo == 'egreso' ) {

            let last = transacciones[identificador];
             let final = last.length - 1;
            this.totales.total = Number(transacciones[identificador][final].existencia_total);

        }else if(egreso[0].tipo == 'ingreso' ){

           this.totales.total = Number(egreso[0].existencia_total);

          }else if(egreso[0].tipo == 'ingreso_venta' ){

           let last = transacciones[identificador];
          let final = last.length - 1;
            this.totales.total = Number(transacciones[identificador][final].existencia_total);
          }
           // this.totales.total = Number(egreso[0].existencia_total);     
      }
    }else{
        if (total1 > multiplicacion) {
        let dife = total1 - multiplicacion;
        let suma = exis + dife  
        this.totales.total = suma
      }else{
        let adi = multiplicacion - total1 ;
        let suma = exis - adi
        this.totales.total = suma
      }
        let f = this.egresos.length - 1;

       this.egresos[i].existencia_total = '';
       this.egresos[f].existencia_total = this.totales.total;
        toastr.error("Datos Actualizado", "Smarmoddle", {
        "timeOut": "3000"
        });
    }
      }

    },
    ActualizarEgresos(){
    let index = this.actuegreso.index;
    this.transacciones[index] = this.egresos;
    this.egresos = [];
    this.actuegreso.estado = false;
    this.actuegreso.index = '';
    },
    borrarEgreso(index, tipo){
    let id = index;
    let ultimo = this.modales.modal_devolucion_compra.length - 1;

    if (tipo == 'egreso_compra') {

      if (this.modales.modal_devolucion_compra[id].tipo == 'existencia') {
        this.modales.modal_devolucion_compra.splice(index, 1);
      }else if (id == ultimo && this.modales.modal_devolucion_compra[id].tipo == 'egreso_compra') {
        let total =  this.modales.modal_devolucion_compra[id].existencia_total;
        this.modales.modal_devolucion_compra.splice(index, 1);
      }
        return
    }
      if ( this.modales.modal_egreso[id].tipo == 'existencia') {
        // let total =  this.modales.modal_egreso[id].existencia_total;
        // this.modales.modal_egreso[id - 1].existencia_total = total;
        this.modales.modal_egreso.splice(index, 1);

      }else if (id == ultimo && this.modales.modal_egreso[id].tipo == 'egreso') {
        let total =  this.modales.modal_egreso[id].existencia_total;
        this.modales.modal_egreso.splice(index, 1);

      }

    
 
      // if (this.modales.modal_egreso[id].tipo == 'egreso') {
      //   let existencia = this.totales.total;
      //   let newTotal =existencia + this.modales.modal_egreso[id].ingreso_total;
      //   this.totales.total = newTotal;
      //   this.modales.modal_egreso.splice(index, 1);

      // }else if(this.modales.modal_egreso[id].tipo == 'existencia'){
      //   this.modales.modal_egreso.splice(index, 1);
      // }
    },
    agregarDevolucion(){

    if(this.transaccion.fecha.trim() ==='' || this.transaccion.movimiento.trim() ==='' || this.transaccion.ingreso.cantidad.trim() ==='' || this.transaccion.ingreso.precio.trim() ===''){
      toastr.error("Todos los campos son obligatorios", "Smarmoddle", {
        "timeOut": "3000"
    });
     }else {
      let id = this.transacciones.length + 1;
      
      // let existencia = {id: id ,existencia_cantidad:this.transaccion.ingreso.cantidad, existencia_precio:this.transaccion.ingreso.precio}
      // this.existencias.push(existencia);
      // let registro = [];
      this.transaccion.ingreso.total = Number(this.transaccion.ingreso.cantidad) * Number(this.transaccion.ingreso.precio);
      let calculo = Number(this.transaccion.ingreso.total) +  Number(this.totales.total);
      let array = {identificador: id, tipo:'ingreso_venta', fecha: this.transaccion.fecha, movimiento:this.transaccion.movimiento, ingreso_cantidad:this.transaccion.ingreso.cantidad, ingreso_precio:this.transaccion.ingreso.precio, ingreso_total:this.transaccion.ingreso.total, existencia_cantidad:this.transaccion.existencia.cantidad, existencia_precio: this.transaccion.existencia.precio, existencia_total:calculo};
      // this.transacciones.push(this.existencias);
      
      // this.ejercicio.push(array);
      this.modales.modal_devolucion_venta.unshift(array);
      // this.transacciones.push(this.ejercicio);
      toastr.success("Transaccion agregada correctamente", "Smarmoddle", {
        "timeOut": "3000"
    });
      this.transaccion.exis.cantidad = this.transaccion.existencia.cantidad;
      this.transaccion.exis.precio = this.transaccion.existencia.precio;
      this.transaccion.fecha            = '';
      this.transaccion.movimiento       = '';
      this.transaccion.ingreso.cantidad = '';
      this.transaccion.ingreso.precio   = '';
      this.transaccion.ingreso.total    = '';
      this.transaccion.existencia.precio   = '';
      this.transaccion.existencia.cantidad    = '';

    }
    },

    existenciaVenta(){
    //   if( this.exis.cantidad.trim() ==='' || this.exis.precio.trim() ==='' ){
    //   toastr.error("Todos lo campos son obligatorios", "Smarmoddle", {
    //     "timeOut": "3000"
    // });
    //  }else{
    let id = this.transacciones.length + 1;
          let ultimo = this.modales.modal_devolucion_venta.length - 1;
          let total = this.modales.modal_devolucion_venta[ultimo].existencia_total;
          let existencia ={identificador: id, tipo:'existencia', existencia_cantidad:this.exis.cantidad, existencia_precio:this.exis.precio, existencia_total:total}
          this.modales.modal_devolucion_venta.push(existencia);
          this.modales.modal_devolucion_venta[ultimo].existencia_total = '';
          toastr.success("Agregado", "Smarmoddle", {
            "timeOut": "3000"
            });
          this.exis.cantidad                = '';
          this.exis.precio                  = '';
          this.transaccion.fecha            = '';
          this.transaccion.movimiento       = '';
          this.transaccion.ingreso.cantidad = '';
          this.transaccion.ingreso.precio   = '';
          this.transaccion.ingreso.total    = '';
     // }
    },
    borrarTransaccion(index, id){
      let ultimo = this.transacciones.length -1;
      let tipo = this.transacciones[index][id].tipo;

      if (index == ultimo) {
        if (tipo == 'ingreso') {
        let total = this.totales.total;
        let ingreso_total = Number(this.transacciones[index][id].ingreso_total);
        let resta = total - ingreso_total;
        this.totales.total = resta;
        this.transacciones.splice(index, 1);

        let ultimo = this.existencias.length - 1;
        this.existencias.splice(ultimo, 1);
        console.log(resta);

      }

      }

    }
}
});

const vm = new Vue({
  el: '#calApp',
  data: {
    currentNum: 0,
    decimalAdded: false,
    total: 0,
    prevOps: 0,
    display: '',
  },
  ready: function() {
    var target, ink, d, x, y;
    $(".containerBox .row .cBox").click(function(e) {
      target = $(this);
      //create .ink element if it doesn't exist
      if (target.find(".ink").length == 0)
        target.prepend("<span class='ink'></span>");

      ink = target.find(".ink");
      //incase of quick double clicks stop the previous animation
      ink.removeClass("animate");

      //set size of .ink
      if (!ink.height() && !ink.width()) {
        //use parent's width or height whichever is larger for the diameter to make a circle which can cover the entire element.
        d = Math.max(target.outerWidth(), target.outerHeight());
        ink.css({
          height: d,
          width: d
        });
      }

      //get click coordinates
      //logic = click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center;
      x = e.pageX - target.offset().left - ink.width() / 2;
      y = e.pageY - target.offset().top - ink.height() / 2;

      //set the position and add class .animate
      ink.css({
        top: y + 'px',
        left: x + 'px'
      }).addClass("animate");
    })
  },
  methods: {
    addDecimal: function() {
      if (this.decimalAdded == false) {
        if (this.prevOps != 0) {
          this.display = '0.';
        } else {
          this.display += '.';
        }
        this.decimalAdded = true;
      }
    },
    clear: function() {
      this.currentNum = 0;
      this.decimalAdded = false;
      this.total = 0;
      this.display = '';
      this.prevOps = 0;
    },
    del: function() {
      if (this.currentNum > 0) {
        if (this.decimalAdded == false) {
          this.currentNum = parseInt(this.currentNum.toString().slice(0, -1), 10);
        } else {
          this.currentNum = parseFloat(this.currentNum.toString().slice(0, -1));
        }

        if (isNaN(this.currentNum))
          this.currentNum = 0;
        this.display = this.currentNum;
      } else if (this.currentNum == 0) {
        this.display = '';
      }
    },
    enterNum: function(val) {
      if (this.currentNum == 0) {
        if (this.prevOps == 0)
          this.total = 0;

        if (this.decimalAdded == true) {
          this.currentNum = val / 10;
          this.display += val.toString();
        } else {
          this.currentNum = val;
          this.display = val.toString();
        }
      } else {
        if (this.decimalAdded == true) {
          if (this.currentNum.toString().indexOf('.') == -1) {
            this.currentNum = parseFloat(this.currentNum.toString() + '.' + val.toString());
          } else {
            this.currentNum += val.toString();
            this.currentNum = parseFloat(this.currentNum);
          }
        } else {
          this.currentNum *= 10;
          this.currentNum += val;
        }
        this.display += val.toString();
      }
    },
    enterOps: function(ops) {
      if (this.total == 0 && this.currentNum == 0) {
        return;
      }
      if (this.total == 0) {
        this.total += this.currentNum;
      }
      switch (this.prevOps) {
        case 1:
          this.total += this.currentNum;
          break;
        case 2:
          this.total -= this.currentNum;
          break;
        case 3:
          this.total *= this.currentNum;
          break;
        case 4:
          this.total /= this.currentNum;
          break;
        case 0:
          break;
      }

      if (this.decimalAdded == true) {
        this.decimalAdded = false;
      }
      this.currentNum = 0;
      this.prevOps = ops;
    },
    sum: function() {
      switch (this.prevOps) {
        case 1:
          this.total += this.currentNum;
          break;
        case 2:
          this.total -= this.currentNum;
          break;
        case 3:
          this.total *= this.currentNum;
          break;
        case 4:
          this.total /= this.currentNum;
          break;
        case 0:
          break;
      }
      this.display = this.total.toString();
      this.prevOps = 0;
      this.currentNum = 0;
    }
  }
})