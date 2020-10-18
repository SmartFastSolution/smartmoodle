
$(function(document, window, index ) {
   $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    var i = 1;

    var objetivo = document.getElementById('num');
    objetivo.innerHTML = 1;

    var objetivo1 = document.getElementById('num1');
    objetivo1.innerHTML = 1;
    $('.addEnun').on('click', function(evt) {
        evt.preventDefault();
        addEnun()();
    });
      $('.addImg').on('click', function(evt) {
        evt.preventDefault();
        addImg();
    });
     $('.addCon').on('click', function(evt) {
        evt.preventDefault();
        addCon()();
    });
     $('.addTaller9').on('click', function(evt) {
        evt.preventDefault();
        addTaller9()();
    });
       $('.addTaller10').on('click', function(evt) {
        evt.preventDefault();
        addTaller10()();
    });
          $('.addTaller11').on('click', function(evt) {
        evt.preventDefault();
        addTaller11()();
    });
        $('.addTaller12').on('click', function(evt) {
        evt.preventDefault();
        addTaller12()();
    });
     $('.addTaller13').on('click', function(evt) {
        evt.preventDefault();
        addTaller13()();
    });
     $('.addTaller36').on('click', function(evt) {
        evt.preventDefault();
        addTaller36()();
    });
      $('.addTaller37').on('click', function(evt) {
        evt.preventDefault();
        addTaller37()();
    });
    $('.addRow').on('click', function(evt) {
        evt.preventDefault();
        addRow();
    });
    $('.addFac').on('click', function(evt) {
        evt.preventDefault();

        addFac();
    });
    $('.addNot').on('click', function(evt) {
        evt.preventDefault();
        addNot();
    });
     function addTaller9() {
        var tall9 = $('.enc_9 .form-row').length;
        console.log(tall9)
        var a = 1;
        var e = 1;
        var ta = '<div class="form-row bg-light p-2 mb-2">'+
                              '<div class="form-group col-12">'+
                                  '<div class="row">'+
                                    '<div class="col-2">'+
                                      '<label for="concepto6" class="col-form-label">Concepto '+(tall9 + 1)+' : </label>'+
                                    '</div>'+
                                    '<div class="col-9">'+
                                      '<textarea name="concep[]" class="form-control" rows="3"></textarea>'+
                                   ' </div>'+
                                    '<div class="col-1">'+
                                      '<a href="#" class="btn btn-danger re_tall9"><span class="glyphicon glyphicon-remove">X</span></a>'+
                                    '</div>'+
                                  '</div>'+
                              '</div>'+
                              '<div class="form-group col-12">'+
                                '<label for="concepto6" class="col-form-label">Alternativas:</label>'+
                                '<input required="" type="text" data-role="tagsinput" name="alter[]"'+
                                    'class="form-control">'+
                              '</div>'+
                            '</div>';
        $.getScript( "../../js/bootstrap-tagsinput.js", function() {});
        if (tall9 == 10) {
        function alert2(){
            toastr.error("Limite de enunciados creados", "Smarmoddle", {
                "timeOut": "1000"
            });
        }
        } else {
        $('.enc_9').append(ta);

      
      
        function alert2(){
        toastr.success("Enunciado agregado correctamente", "Smarmoddle", {
            "timeOut": "1000"
        });
        }

        //console.log(enun)
           
        }
       return alert2;
    }
     $('.re_tall9').live('click', function() {
        num = $('.enc_9 .form-row').toArray();
        console.log(num);
        if ($('.enc_9 .form-row').length == 2) 
        {
            $.each(num, function( index, value ) {
            $(value).remove();
            });
            addTaller9();
        }else if($('.enc_9 .form-row').length == 1){
             toastr.error("Este enunciado no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        }else {
            $(this).parent().parent().parent().parent().remove();
        }
    });

function addTaller10() {
        var tall10 = $('.tall_10 .form-group').length;
        console.log(tall10)
        var a = 1;
        var e = 1;
        var t10 = 
                '<div class="form-group bg-light p-2">'+
                    '<div class="form-inline">'+
                        '<label for="enunciado1" class="col-form-label pr-2">Enunciado '+(tall10 + 1)+' </label>'+
                            '<input required="" type="text" name="enunciados[]" class="form-control m-2">'+
                                    '<a href="#" class="btn btn-danger re_tall10">'+
                                      '<span class="glyphicon glyphicon-remove">X</span></a> </div>'+
                            '<div class="form-inline">'+
                                    '<label for="img1" class="col-form-label">Imagen :</label>'+
                            '</div>'+
                            '<div class="custom-file">'+
                                '<input type="file" class="custom-file-input" name="img[]">'+
                                '<label class="custom-file-label" for="customFile">Seleciona un archivo</label>'+
                            '</div>'+
                                '<label for="concepto6" class="col-form-label">Definicion 1:</label>'+
                            '<textarea required="" name="definicion[]" class="form-control" rows="5"></textarea>'+
                '</div>';

           
        if (tall10 == 10) {
        function alert10(){
            toastr.error("Limite de enunciados creados", "Smarmoddle", {
                "timeOut": "1000"
            });
        }
        } else {
        $('.tall_10').append(t10);
         $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        function alert10(){
        toastr.success("Enunciado agregado correctamente", "Smarmoddle", {
            "timeOut": "1000"
        });
        }

        //console.log(enun)
           
        }
       return alert10;
    }
     $('.re_tall10').live('click', function() {
        num = $('.tall_10 .form-group').toArray();
        //console.log(num);
        if ($('.tall_10 .form-group').length == 2) 
        {
            $.each(num, function( index, value ) {
            $(value).remove();
            });
            addTaller10();
        }else if($('.tall_10 .form-group').length == 1){
             toastr.error("Este enunciado no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        }else {
            $(this).parent().parent().remove();
        }
    });
function addTaller11() {
        var tall11 = $('.tall_11 .form-group').length;
        console.log(tall11)
        var a = 1;
        var e = 1;
        var t11 = 
             '<div class="form-group bg-light p-2">'+
                '<label for="concepto6" class="col-form-label m-2">Definicion  '+(tall11 + 1)+'  <a href="#" class="btn btn-danger re_tall11">'+
                '<span class="glyphicon glyphicon-remove">X</span></a> </label>'+
                '<textarea required="" name="definicion[]" class="form-control" rows="5"></textarea>'+
            '</div>';
        if (tall11 == 11) {
        function alert11(){
            toastr.error("Limite de enunciados creados", "Smarmoddle", {
                "timeOut": "1100"
            });
        }
        } else {
        $('.tall_11').append(t11);
        function alert11(){
        toastr.success("Enunciado agregado correctamente", "Smarmoddle", {
            "timeOut": "1100"
        });
        }

        //console.log(enun)
           
        }
       return alert11;
    }
     $('.re_tall11').live('click', function() {
        num = $('.tall_11 .form-group').toArray();
        //console.log(num);
       if($('.tall_11 .form-group').length == 2){
             toastr.error("Este enunciado no se puede eliminar", "Smarmoddle", {
                "timeOut": "1100"
            });
        }else {
            $(this).parent().parent().remove();
        }
    });

     function addTaller12() {
        var tall12 = $('.tall_12 .form-group').length;
        console.log(tall12)
        var a = 1;
        var e = 1;
        var t12 = 
        '<div class="form-group">'+
            '<label for="" class="col-form-label">Descripcion '+(tall12 + 1)+' <a href="#" class="btn btn-danger re_tall12"><span class="glyphicon glyphicon-remove">X</span></a></label>'+
            '<textarea required="" class="form-control" name="descripcion[]"></textarea>'+
        '</div>';
        $.getScript( "../../js/bootstrap-tagsinput.js", function() {});
        if (tall12 == 10) {
        function alert12(){
            toastr.error("Limite de enunciados creados", "Smarmoddle", {
                "timeOut": "1000"
            });
        }
        } else {
        $('.tall_12').append(t12);
        function alert12(){
        toastr.success("Enunciado agregado correctamente", "Smarmoddle", {
            "timeOut": "1000"
        });
        }

        //console.log(enun)
           
        }
       return alert12;
    }
     $('.re_tall12').live('click', function() {
        num = $('.tall_12 .form-group').toArray();
        //console.log(num);
        if ($('.tall_12 .form-group').length == 2) 
        {
            $.each(num, function( index, value ) {
            $(value).remove();
            });
            addTaller12();
        }else if($('.tall_12 .form-group').length == 1){
             toastr.error("Este enunciado no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        }else {
            $(this).parent().parent().remove();
        }
    });

      function addTaller13() {
        var tall13 = $('.tall_13 .form-group').length;
        console.log(tall13)
        var a = 1;
        var e = 1;
        var t13 = 
        '<div class="form-group">'+
            '<label for="" class="col-form-label">Concepto '+(tall13 + 1)+' <a href="#" class="btn btn-danger re_tall13"><span class="glyphicon glyphicon-remove">X</span></a></label>'+
            '<input required="" type="text" name="concepto[]" class="form-control">'+
        '</div>';
        if (tall13 == 10) {
        function alert13(){
            toastr.error("Limite de enunciados creados", "Smarmoddle", {
                "timeOut": "1000"
            });
        }
        } else {
        $('.tall_13').append(t13);
        function alert13(){
        toastr.success("Enunciado agregado correctamente", "Smarmoddle", {
            "timeOut": "1000"
        });
        }

        //console.log(enun)
           
        }
       return alert13;
    }
     $('.re_tall13').live('click', function() {
        num = $('.tall_13 .form-group').toArray();
        //console.log(num);
        if ($('.tall_13 .form-group').length == 2) 
        {
            $.each(num, function( index, value ) {
            $(value).remove();
            });
            addTaller13();
        }else if($('.tall_13 .form-group').length == 1){
             toastr.error("Este enunciado no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        }else {
            $(this).parent().parent().remove();
        }
    });

    function addTaller36() {
        var tall36 = $('.tall_36 .form-group').length;
        console.log(tall36)
        var a = 1;
        var e = 1;
        var t36 = 
        '<div class="form-group">'+
            '<label for="" class="col-form-label">Enunciado '+(tall36 + 1)+' <a href="#" class="btn btn-danger re_tall36"><span class="glyphicon glyphicon-remove">X</span></a></label>'+
            '<textarea required="" class="form-control" name="enun[]"></textarea>'+
        '</div>';
        $.getScript( "../../js/bootstrap-tagsinput.js", function() {});
        if (tall36 == 10) {
        function alert36(){
            toastr.error("Limite de enunciados creados", "Smarmoddle", {
                "timeOut": "1000"
            });
        }
        } else {
        $('.tall_36').append(t36);
        function alert36(){
        toastr.success("Enunciado agregado correctamente", "Smarmoddle", {
            "timeOut": "1000"
        });
        }

        //console.log(enun)
           
        }
       return alert36;
    }
     $('.re_tall36').live('click', function() {
        num = $('.tall_36 .form-group').toArray();
        //console.log(num);
        if ($('.tall_36 .form-group').length == 2) 
        {
            $.each(num, function( index, value ) {
            $(value).remove();
            });
            addTaller36();
        }else if($('.tall_36 .form-group').length == 1){
             toastr.error("Este enunciado no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        }else {
            $(this).parent().parent().remove();
        }
    });



    function addTaller37() {
        var tall37 = $('.tall_37 .form-group').length;
        console.log(tall37)
        var a = 1;
        var e = 1;
        var t37 = 
        '<div class="form-group">'+
            '<label for="" class="col-form-label">Enunciado '+(tall37 + 1)+' <a href="#" class="btn btn-danger re_tall37"><span class="glyphicon glyphicon-remove">X</span></a></label>'+
            '<textarea required="" class="form-control" name="enun[]"></textarea>'+
        '</div>';
        $.getScript( "../../js/bootstrap-tagsinput.js", function() {});
        if (tall37 == 10) {
        function alert37(){
            toastr.error("Limite de enunciados creados", "Smarmoddle", {
                "timeOut": "1000"
            });
        }
        } else {
        $('.tall_37').append(t37);
        function alert37(){
        toastr.success("Enunciado agregado correctamente", "Smarmoddle", {
            "timeOut": "1000"
        });
        }

        //console.log(enun)
           
        }
       return alert37;
    }
     $('.re_tall37').live('click', function() {
        num = $('.tall_37 .form-group').toArray();
        //console.log(num);
        if ($('.tall_37 .form-group').length == 2) 
        {
            $.each(num, function( index, value ) {
            $(value).remove();
            });
            addTaller37();
        }else if($('.tall_37 .form-group').length == 1){
             toastr.error("Este enunciado no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        }else {
            $(this).parent().parent().remove();
        }
    });



     function addEnun() {
        var enun = $('.enun .form-row').length;
        var a = 1;
        var e = 1;
        var div = '<div class="form-row">'+
                '<div class="form-group col-11" >'+
                '<label for="recipient-name" class="col-form-label">Enunciado '+(enun +1)+':</label>'+
                '<input required="" type="text" name="enun[]" class="form-control">'+
                '</div>'+
                '<div class="form-group col-1" >'+
                '<label for="recipient-name" class="col-form-label">Borrar:</label><br>'+
                '<a href="#" class="btn btn-danger remove_enun"><span class="glyphicon glyphicon-remove">X</span></a>'+
                ' </div>'+
                '</div>'
        if (enun == 10) {
        function alert(){
            toastr.error("Limite de enunciados creados", "Smarmoddle", {
                "timeOut": "1000"
            });
        }
        } else {
        $('.enun').append(div);
       
        function alert(){
        toastr.success("Enunciado agregado correctamente", "Smarmoddle", {
            "timeOut": "1000"
        });
        }

        //console.log(enun)
           
        }
       return alert;
    }
     $('.remove_enun').live('click', function() {
        num = $('.enun .form-row').toArray();
        //console.log(num);
        if ($('.enun .form-row').length == 2) 
        {
            $.each(num, function( index, value ) {
            $(value).remove();
            });
            addEnun();
        }else if($('.enun .form-row').length == 1){
             toastr.error("Este enunciado no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        }else {
            $(this).parent().parent().remove();
        }
    });

    function addCon() {
        var con = $('.taller5 .form-group ').length;
        var a = 1;
        var e = 1;
        var div = 
             '<div class="form-group row mb-3 p-3">'+
                '<label for="" class="col-4 col-form-label">CONCEPTO '+(con + 1)+':</label>'+
                 '<div class="col-8">'+
                '<div class="form-row">'+
                '<div class="col-10">'+   
                '<input required="" type="text" name="concepto[]" class="form-control mb-2">'+
                '</div>'+
               ' <div class="col-2">  '+
                '<a href="#" class="btn btn-danger remove_con"><span class="glyphicon glyphicon-remove">X</span></a>'+
                '</div>'+
                ' </div>'+
                '</div>'+
                '<label for="" class="col-form-label">Alternativa 1:</label>'+
                '<textarea required="" required="" name="alternativa1[]" class="form-control"rows="5"></textarea>'+
                 '<label for="" class="col-form-label">Alternativa 2:</label>'+
                ' <textarea required="" required="" name="alternativa2[]" class="form-control" rows="5"></textarea>'+
            '</div>'

        if (con == 10) {
        function alert1(){
            toastr.error("Limite de enunciados creados", "Smarmoddle", {
                "timeOut": "1000"
            });
        }
        } else {
        $('.taller5').append(div);
        function alert1(){
        toastr.success("Enunciado agregado correctamente", "Smarmoddle", {
            "timeOut": "1000"
        });
        }

        console.log(con)
           
        }
       return alert1;
    }
        $('.remove_con').live('click', function() {
        num = $('.taller5 .form-group').toArray();
        console.log(num);
        if ($('.taller5 .form-group').length == 2) 
        {
            $.each(num, function( index, value ) {
            $(value).remove();
            });
            addCon();
        }else if($('.taller5 .form-group').length == 1){
             toastr.error("Este enunciado no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        }else {
            $(this).parent().parent().parent().parent().remove();
        }
    });

   
    function addImg() {

        var imgs = $('.img_id tr').length;

        var img = '<tr>' +
            '<td scope="row">' +
            '<div class="custom-file">' +
            '<input type="file" class="custom-file-input" name="col_a[]" >' +
            '<label class="custom-file-label" for="customFile">Seleciona un archivo</label>' +
            '</div>' +
            '</td>' +
            '<td scope="row">' +
            '<div class="custom-file">' +
            '<input type="file" class="custom-file-input" name="col_b[]">' +
            '<label class="custom-file-label" for="customFile">Seleciona un archivo</label>' +
            '</div>' +
            '</td>' +
            '<td><a href="#" class="btn btn-danger re"><span class="glyphicon glyphicon-remove">X</span></a></td>'
        '</tr>';

        if (imgs == 5) {
            toastr.error("Limite de columnas creadas", "Smarmoddle", {
                "timeOut": "1000"
            });


        } else {
        $('.img_id').append(img);
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
            toastr.success("Columna agregada correctamente", "Smarmoddle", {
                "timeOut": "1000"
            });
        }
    }
       


    $('.re').live('click', function() {

        if ($('.img_id tr').length == 1) {
            toastr.error("Esta columna no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        } else {
            $(this).parent().parent().remove();

        }
    });

    function addRow() {
        var prin = $('.prin tr').length;

        var tr = '<tr>' +
            '<td scope="row">' +
            '<div class="custom-file">' +
            '<input type="file" class="custom-file-input" name="col_a[]" lang="es">' +
            '<label class="custom-file-label" for="customFile">Seleciona un archivo</label>' +
            '</div>' +
            '</td>' +
            '<td scope="row">' +
            '<div class="custom-file">' +
            '<input type="file" class="custom-file-input" name="col_b[]" lang="es">' +
            '<label class="custom-file-label" for="customFile">Seleciona un archivo</label>' +
            '</div>' +
            '</td>' +
            '<td><a href="#" class="btn btn-danger remover"><span class="glyphicon glyphicon-remove">X</span></a></td>'
        '</tr>';
        $('.prin').append(tr);
           $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        toastr.success("Columna agregada correctamente", "Smarmoddle", {
            "timeOut": "1000"
        });

    }
    $('.remover').live('click', function() {

        if ($('.prin tr').length == 1) {
            toastr.error("Esta columna no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        } else {
            $(this).parent().parent().remove();

        }
    });

    function addFac() {

        var max = $('.fac tr').length;
        var tr = '<tr>' +
            '<th scope="row" id="num">' + (++i) + '</th>' +
            ' <td><input type="text" class="form-control" name="cod[]"></td>' +
            '<td><input type="text" class="form-control" name="cod_aux[]"></td>' +
            '<td><input type="text" class="form-control" name="cant[]"></td>' +
            '<td><input type="text" class="form-control" name="desc[]"></td>' +
            '<td><input type="text" class="form-control" name="precio[]"></td>' +
            '<td><a href="#" class="btn btn-danger remove"><span class="glyphicon glyphicon-remove">X</span></a></td>' +
            '</tr>';
        if (max == 10) {
            toastr.error("Limite de columnas creadas", "Smarmoddle", {
                "timeOut": "1000"
            });


        } else {
            $('.fac').append(tr);
         

            toastr.success("Columna agregada correctamente", "Smarmoddle", {
                "timeOut": "1000"
            });
            console.log(max)
        }
    }

    $('.remove').live('click', function() {
        var last = $('.fac tr').length;
        if (last == 1) {
            i = 1;
            toastr.error("Esta columna no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        } else {
            $(this).parent().parent().remove();
            i = last;
        }
    });

    function addNot() {
        var nota_v = $('.nota_v tr').length;

        var tr = '<tr>' +
            '<th scope="row" id="num1">' + (++i) + '</th>' +
            '<td><input type="text" class="form-control" name="cant[]"></td>' +
            '<td><input type="text" class="form-control" name="desc[]"></td>' +
            '<td><input type="text" class="form-control" name="precio[]"></td>' +
            '<td><a href="#" class="btn btn-danger rem"><span class="glyphicon glyphicon-remove">X</span></a></td>'
        '</tr>';
        $('.nota_v').append(tr);
        toastr.success("Columna agregada correctamente", "Smarmoddle", {
            "timeOut": "1000"
        });

    }
    $('.rem').live('click', function() {
        var not = $('.nota_v tr').length;
        if (not == 1) {
            i = 1;
            toastr.error("Esta columna no se puede eliminar", "Smarmoddle", {
                "timeOut": "1000"
            });
        } else {
            $(this).parent().parent().remove();
            i = not;
        }
    });


}( document, window, 0 ));


    const ejercicio = new Vue({
        el: '#ejercicios',
        data:{
    registerindex:'',
    cuentaindex:'',
    taller:{
        plantilla_id: 34,
        enunciado:'',
        materia_id:'',
    },
    registros:[],
       ejercicios:{
           debe:[],
          haber:[],
      },
       edit:{
           debe:[],
          haber:[]
        },
       ejercicio:{
          debe:{
            nom_cuenta:'',
            saldo:'',
          },
          haber:{
            fecha:'',
            nom_cuenta:'',
            saldo:''
          },
        },
    },
        methods:{
            agregarDebe(){
                var debe = {nom_cuenta:this.ejercicio.debe.nom_cuenta, saldo:this.ejercicio.debe.saldo};
                this.ejercicios.debe.push(debe);//añadimos el la variable persona al array
                //Limpiamos los campos
                toastr.success("Activo agregado correctamente", "Smarmoddle", {
                "timeOut": "3000"
                });
                this.ejercicio.debe.nom_cuenta ='';
                this.ejercicio.debe.saldo      ='';
                },
            agregarHaber(){
                var haber = {nom_cuenta:this.ejercicio.haber.nom_cuenta, saldo:this.ejercicio.haber.saldo};
                this.ejercicios.haber.push(haber);//añadimos el la variable persona al array
                //Limpiamos los campos
                toastr.success("Activo agregado correctamente", "Smarmoddle", {
                "timeOut": "3000"
                });
                this.ejercicio.haber.nom_cuenta ='';
                this.ejercicio.haber.saldo      ='';
            },
             deleteDebe(index){
                this.ejercicios.debe.splice(index, 1);
            },
            deleteHaber(index){
                this.ejercicios.haber.splice(index, 1);
            },
            guardarRegistro(){
              if (this.ejercicios.debe == 0) {
                 toastr.error("No tienes transaccion para guardar", "Smarmoddle", {
                        "timeOut": "3000"
                    });
              }else{
            var registro = {debe:this.ejercicios.debe, haber:this.ejercicios.haber};
                this.registros.push(registro);//añadimos el la variable persona al array
                //Limpiamos los campos
                toastr.success("Registro agregado correctamente", "Smarmoddle", {
                "timeOut": "3000"
                });
                this.ejercicios.debe            =[];
                this.ejercicios.haber           =[]; 
                this.ejercicio.haber.nom_cuenta = '';
                this.ejercicio.haber.saldo      = '';         
          }
        },
        debeEditRegister(id){
              var register          = this.registros;
              this.registerindex    = id;
              this.edit.debe        =[];
              this.edit.haber       =[];
              this.ejercicios.debe  =[];
              this.ejercicios.haber =[];
              this.edit.debe        = register[id].debe;
              this.edit.haber       = register[id].haber;
            },
        updaterRegister(){
             var  id                  = this.registerindex;
             this.registros[id].debe  = this.edit.debe;
             this.registros[id].haber = this.edit.haber;
             this.edit.debe           =   [];
             this.edit.haber          = [];
            },
         deleteRegistro(id){
              this.registros.splice(id, 1);
            },
            haberEdit(index){
              var edit                        = this.edit;
              this.cuentaindex                = index;
              this.ejercicio.haber.nom_cuenta = edit.haber[index].nom_cuenta;
              this.ejercicio.haber.saldo      = edit.haber[index].saldo;
            },
            updateHaber(){
            if (this.ejercicio.haber.nom_cuenta.trim() === '' || this.ejercicio.haber.saldo.trim() === '') {
                toastr.error("No tienes datos para actualizar", "Smarmoddle", {
                        "timeOut": "3000"
                    });
                }else{
                    var id                          = this.cuentaindex;
            this.edit.haber[id].nom_cuenta  = this.ejercicio.haber.nom_cuenta;
            this.edit.haber[id].saldo       = this.ejercicio.haber.saldo;
            this.ejercicio.haber.nom_cuenta = '';
            this.ejercicio.haber.saldo      = '';
                }        
            },
            haberDelete(index){
              this.edit.haber.splice(index, 1);
            },
            debeEdit(index){
              this.cuentaindex               = index;
              this.ejercicio.debe.nom_cuenta = this.edit.debe[index].nom_cuenta;
              this.ejercicio.debe.saldo      = this.edit.debe[index].saldo;
            },
            updateDebe(){
            if (this.ejercicio.debe.nom_cuenta.trim() === '' || this.ejercicio.debe.saldo.trim() === '') {
                toastr.error("No tienes datos para actualizar", "Smarmoddle", {
                        "timeOut": "3000"
                    });
                }else{
                    var id                         = this.cuentaindex;
                    this.edit.debe[id].nom_cuenta  = this.ejercicio.debe.nom_cuenta;
                    this.edit.debe[id].saldo       = this.ejercicio.debe.saldo;
                    this.ejercicio.debe.nom_cuenta = '';
                    this.ejercicio.debe.saldo      = '';
                } 
            },
             debeDelete(index){
              this.edit.debe.splice(index, 1);
            },
            guardarTaller34: function() {
                var _this = this;
                var url = '/sistema/admin/taller34';
                if (_this.registros.length == 0 ) {
                     toastr.error("No tienes registros para guardar el taller", "Smarmoddle", {
                        "timeOut": "3000"
                    });
                } else if (_this.taller.enunciado.trim() === '' || _this.taller.materia_id.trim() === ''){
                    toastr.error("No puedes dejar campos en blanco", "Smarmoddle", {
                        "timeOut": "3000"
                    });
                }else {
                axios.post(url,{
                registro: _this.registros,
                materia: _this.taller.materia_id,
                enunciado: _this.taller.enunciado,
                plantilla: _this.taller.plantilla_id,
                }).then(response => {
                   toastr.success("Taller Creado Correctamente", "Smarmoddle", {
                        "timeOut": "3000"
                    });
                   _this.registros =[];
                    _this.ejercicio.debe.nom_cuenta = '';
                    _this.ejercicio.debe.saldo      = '';  
                     $('#taller34').modal('hide');  
                }).catch(function(error){

                }); 


                } 
            }

        }

    });