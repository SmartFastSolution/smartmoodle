const conta = new Vue({
        el: '#contabilidad',
        data:{
   		 	diarios:[],
   		 	diario:{
   		 		fecha:'',
            nom_cuenta:'',
        		gloza:'',
        		debe:'',
        		haber:''
   		 	},
        pasan:{ debe:'', haber:''},
        balances:[],
        balance:{
          cuenta:'',
          suma_debe:'',
          suma_haber:'',
          saldo_debe:'',
          saldo_haber:''
        },
        suman:{
          sum_debe:'',
          sum_haber:'',
          sal_debe:'',
          sal_haber:''
        }    
  },
   methods:{
    Agregar(){
    if (this.diario.fecha.trim() === '' ) {
    	 toastr.error("El campo fecha e obligatorio", "Smarmoddle", {
                "timeOut": "3000"
            });
    }else if(this.diario.nom_cuenta.trim() === ''){
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
         saveTasks(){
                let me =this;
                let url = '/sistema/tallerdiario' //Ruta que hemos creado para enviar una tarea y guardarla
                axios.post(url,{ //estas variables son las que enviaremos para que crear la tarea
                  'diarios': this.diarios
                }).then(function (response) {
                  toastr.success("Diario general guardado correctamente", "Smarmoddle", {
                    "timeOut": "3000"
                   });
                diarios:[];
                })
                .catch(function (error) {
                    console.log(error);
                });   
                
            }
  }

        
});