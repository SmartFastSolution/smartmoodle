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
    balances:[],
    balance:{
      cuenta:'',
      suma_debe:'',
      suma_haber:'',
      saldo_debe:'',
      saldo_haber:'',
    },
    suman:{
      sum_debe:'',
      sum_haber:'',
      sal_debe:'',
      sal_haber:'',
    }

  },
  methods:{
    agregarBalance(){
      if (this.balances.debe == 0) {
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
                this.totalDebe(id);
           this.totalHaber();
                
      }    
  }
  }
});

