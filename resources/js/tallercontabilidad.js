const conta = new Vue({
        el: '#contabilidad',
        data:{
   		 	diarios:[],
   		 	diario:{
   		 		fecha:'',
        		nom_cuenta:'',
        		debe:'',
        		haber:''
   		 	},
        	
        	pasan:{ debe:'', haber:''},
        	view: false
    
  },
   methods:{
    Agregar(){
    if (this.diario.fecha.trim() === '' || this.diario.nom_cuenta.trim() === '' || this.diario.debe.trim() === '' || this.diario.haber.trim() === '') {
    	 toastr.error("No puedes dejar campos sin rellenar", "Smarmoddle", {
                "timeOut": "1000"
            });
    }
      var diario = {fecha:this.diario.fecha, nom_cuenta:this.diario.nom_cuenta, debe:this.diario.debe, debe:this.diario.debe, haber:this.diario.haber};
      this.diarios.push(diario);//añadimos el la variable persona al array
      //Limpiamos los campos
      this.diario.fecha =''
      this.diario.nom_cuenta =''
      this.diario.debe =''
      this.diario.haber =''
    },
    deleteDiario(index){
    	this.diarios.splice(index, 1);
    }
  }
});