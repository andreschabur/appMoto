/*Estos dos siguientes metodos se utilizan en la pagina de crear usuario_producto FrontendBundle/registroUsuarioProducto
 * se encargan de llenar las ciudades segun el departamento seleccionado y las razas segun el tipo de mascota seleccionado*/
$(function(){
    
    //***********Pais --llenar departamentos
    /*$("#mimoto_frontendbundle_usuarioproductotype_pais").change(function(){
        var data = {
        pais_id: $(this).val()
        };

        $.ajax({
            type: 'post',
            url: '/app.php/departamentos',
            data: data,
            success: function(data) {
                var $province_selector = $('#mimoto_frontendbundle_usuarioproductotype_departamento');
                $province_selector.html('<option>Departamento</option>');
                for (var i=0, total = data.length; i < total; i++) {
                    $province_selector.append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                }
                $('#mimoto_frontendbundle_usuarioproductotype_ciudad').html("<option>Ciudad</option>");
            }
        });
    });*/

    //**************Departamento --llenar ciudades
/*{#    $("#mimoto_frontendbundle_usuarioproductotype_departamento").change(function(){#}*/
    $("#usuario_producto_departamento").change(function(){
        var data = {
        departamento_id: $(this).val()
        };
        
        //url: 'app_dev.php/producto/ciudades',
          //url: '/app.php/ciudades',
        $.ajax({
            type: 'post',
            url: 'ciudades',
            data: data,
            success: function(data) {
                var $city_selector = $('#usuario_producto_ciudad');
                $city_selector.html('<option>Ciudad</option>');
                for (var i=0, total = data.length; i < total; i++) {
                    $city_selector.append('<option value="' + data[i].id + '">' + data[i].descripcion + '</option>');
                }
            }
        });
    });
    //**************Departamento --llenar ciudades

    $("#usuario_producto_productsCollection_0_manufacturersId").change(function(){
        var data = {
        mascota_id: $(this).val()
        };
        
        //url: 'app_dev.php/producto/ciudades',
          //url: '/app.php/ciudades',
        $.ajax({
            type: 'post',
            url: 'razas',
            data: data,
            success: function(data) {
                var $raza_selector = $('#usuario_producto_productsCollection_0_cilindrajeId');
                $raza_selector.html('<option>Raza</option>');
                for (var i=0, total = data.length; i < total; i++) {
                    $raza_selector.append('<option value="' + data[i].id + '">' + data[i].descripcion + '</option>');
                }
            }
        });
    });
});

/*
<script>
    function departamentoSeleccionado(){
{#        console.log('Se ha seleccionado un departamento '+document.getElementById('products_filtro_departamentoId').value);#}
         var data = {departamento_id: document.getElementById('usuario_producto_departamento').value};
        $.ajax({
           type: 'post',
           url: '{ { path("ciudades") }}',
           data: data,
           success: function(data){
{#               console.log('ciudades encontradas '+data);#}
               var $ciudad_selector = $('#usuario_producto_ciudad');
               
               $ciudad_selector.html('<option>Selecciona...</option>');
               
               for(var i= 0, total = data.length; i< total; i++){
                   $ciudad_selector.append('<option value="' + data[i].id + '">' + data[i].descripcion + '</option>');
               }
           }
        });
    }*/
   /* function mascotaSeleccionada(){
{#        console.log('Se ha seleccionado un departamento '+document.getElementById('products_filtro_departamentoId').value);#}
         var data = {mascota_id: document.getElementById('usuario_producto_productsCollection_0_manufacturersId').value};
        $.ajax({
           type: 'post',
           url: '{ { path("razas") }}',
           data: data,
           success: function(data){
{#               console.log('ciudades encontradas '+data);#}
               var $raza_selector = $('#usuario_producto_productsCollection_0_cilindrajeId');
               
               $raza_selector.html('<option>Selecciona...</option>');
               
               for(var i= 0, total = data.length; i< total; i++){
                   $raza_selector.append('<option value="' + data[i].id + '">' + data[i].descripcion + '</option>');
               }
           }
        });
    }
</script>*/


/* Estos dos siguientes metodos se utilizan en la pagina princial  PortadaBundle/inicio.html.twig--producto_buscar*/
    function departamentoSeleccionado(idDepartamentoName, idCiudadName){

        var data = {
//             departamento_id: document.getElementById('products_filtro_departamentoId').value
             departamento_id: document.getElementById(idDepartamentoName).value
         };
        $.ajax({
           type: 'post',
           url: 'producto/ciudades',
           data: data,
           success: function(data){

//               var $ciudad_selector = $('#products_filtro_ciudadId');
//               var $ciudad_selector = $('#');
               var $ciudad_selector = $('#'+idCiudadName);
//               console.log(idCiudadName);
               
               $ciudad_selector.html('<option value="">Selecciona...</option>');
               
               for(var i= 0, total = data.length; i< total; i++){
//                    console.log(data[i].descripcion);
                   $ciudad_selector.append('<option value="' + data[i].id + '">' + data[i].descripcion + '</option>');
               }
           }
        });
    }
    function mascotaSeleccionada(idTipoMascotaName, idRazaName){

        var data = {
//             mascota_id: document.getElementById('products_filtro_manufacturersIdFilter').value
             mascota_id: document.getElementById(idTipoMascotaName).value
        };
        $.ajax({
           type: 'post',
           url: 'producto/razas',
           data: data,
           success: function(data){

//               var $raza_selector = $('#products_filtro_cilindrajeIdFilter');
               var $raza_selector = $('#'+idRazaName);
               console.log(idRazaName);
               $raza_selector.html('<option value="">Selecciona...</option>');
               
               for(var i= 0, total = data.length; i< total; i++){
                    console.log(data[i].descripcion);
                   $raza_selector.append('<option value="' + data[i].id + '">' + data[i].descripcion + '</option>');
               }
           }
        });
    }

/*<script>
    function departamentoSeleccionado(){
{#        console.log('Se ha seleccionado un departamento '+document.getElementById('products_filtro_departamentoId').value);#}
         var data = {departamento_id: document.getElementById('products_filtro_departamentoId').value};
        $.ajax({
           type: 'post',
           url: '{ { path("ciudades") }}',
           data: data,
           success: function(data){
{#               console.log('ciudades encontradas '+data);#}
               var $ciudad_selector = $('#products_filtro_ciudadId');
               
               $ciudad_selector.html('<option value="">Selecciona...</option>');
               
               for(var i= 0, total = data.length; i< total; i++){
                   $ciudad_selector.append('<option value="' + data[i].id + '">' + data[i].descripcion + '</option>');
               }
           }
        });
    }
    function mascotaSeleccionada(){
{#        console.log('Se ha seleccionado un departamento '+document.getElementById('products_filtro_departamentoId').value);#}
         var data = {mascota_id: document.getElementById('products_filtro_manufacturersIdFilter').value};
        $.ajax({
           type: 'post',
           url: '{ { path("razas") }}',
           data: data,
           success: function(data){
{#               console.log('ciudades encontradas '+data);#}
               var $raza_selector = $('#products_filtro_cilindrajeIdFilter');
               
               $raza_selector.html('<option value="">Selecciona...</option>');
               
               for(var i= 0, total = data.length; i< total; i++){
                   $raza_selector.append('<option value="' + data[i].id + '">' + data[i].descripcion + '</option>');
               }
           }
        });
    }
{#    $("#products_filtro_cilindrajeIdFilter").change(function(){console.log('cambio de cilindraje id filter');});#}
    $("#products_filtro_departamentoId").change(function() {
        console.log('cambio de departamento por jquery');

        var data = {departamento_id: $(this).val()};
        $.ajax({
           type: 'post',
           url: '{ { path("ciudades") }}',
           data: data,
           success: function(data){
               var $ciudad_selector = $('#products_filtro_ciudadId');
               
               $ciudad_selector.html('<option>Selecciona...</option>');
               
               for(var i= 0, total = data.length; i< total; i++){
                   $ciudad_selector.append('<option value="' + data[i].id + '">' + data[i].descripcion + '</option>');
               }
           }
        });
    });
    
</script>*/


/*ESTO SE UTILIZA EN LA PAGINA DE RENOVAR PortadaBundle/Default/renovarAnuncio.html.twig*/
function renovar(){    
          var numeroAnuncio = document.getElementById('numAnuncio');
          var tipoMascota = document.getElementById('tipoMascota');
          var raza = document.getElementById('razaMascota');
          var captcha_code = document.getElementById('captcha_code');
        var data = {          
            numeroAnuncio : numeroAnuncio.value,
            tipoMascota : tipoMascota.value,
            raza : raza.value,
            captcha_code : captcha_code.value,
        };
        if(validarCamposVacios(data)){
            $.ajax({
              type: 'post',
              url: 'renovar',
              data: data,
              success: function(respuesta) {
                  dibujarError(respuesta.mensaje);
                  if(respuesta.codigo != '03'){
                      //***Si ingreso bien el captcha pero ocurrio otro error (o ya actualizo bien) entonces vuelva a ingresar el captcha ketsup
                      refrescarCaptcha();
                  }
              }
            });
        }else{
            alert('Ha ocurrido un error validando los campos!');
//            dibujarError('Ha ocurrido un error validando los campos!');
        }
      }
      
      function validarCamposVacios(data){
          for (indice in data) {
              if(data[indice] == '' || data[indice] == null){
//                  alert('El dato '+indice+' esta vacío.');
                  dibujarError('Existen datos que estan vacíos.');
                  return false;
              }
              if(indice == 'captcha_code'){
                  if(!data[indice].match(/^\d{5}$/)) {
//                    alert('Please enter the CAPTCHA digits in the box provided');
//                    alert('Por favor digite el CAPTCHA correctamente');
                    dibujarError('Por favor digite el CAPTCHA correctamente');
//                    form.captcha.focus();
                    return false;
              }
          }
      }
          return true;
  }
      
      
/*Esto se utiliza en la ventana de modificarAnuncio y renovarAnuncio para mostar unos divs y ocultarlos*/
 function mostrarDialog(idDialog,titulo) {

    //***Para que no aparezca undefined en el campo de titulo del div (Dialog)
    if(titulo == null){
        titulo = '';
    }
    if(document.getElementById(idDialog+'Titulo') != null){                
        document.getElementById(idDialog+'Titulo').value = titulo;        
    }
    
    var div = document.getElementById(idDialog);

    div.style.display = '';

}

function cerrarDialog(idDialog) {

    var div = document.getElementById(idDialog);

    div.style.display='none';

}
/**
 * 2017-01-19
 * La funcion se crea para incluir el texto de error en el renovar anuncio,
 * recordar que esto se esta haciendo sin formulario symfony, y con javascript
 * @param {type} idDiv
 * @param {type} texto
 * @returns {undefined}
 */
function adicionarTextoDiv(idDiv, texto){
    texto = '<b><font color = \'blue\' size=\'15\'>'+texto+'</font></b>';
    var div = document.getElementById(idDiv);
//    div.innerHTML = div.innerHTML + texto;    
    div.innerHTML = texto;    
}


function dibujarError(texto){
    var idDiv = 'errorMsjDiv';
    var divTemp = document.getElementById(idDiv);
    if(divTemp != null){
          mostrarDialog(idDiv);
          adicionarTextoDiv(idDiv, texto);
      }else{
          alert(texto);
      }
}
/**
 * 2017-01-18
 * funcion para refrescar el ketsup
 * @returns {undefined}
 */
function refrescarCaptcha(){    
  document.getElementById('captcha').src = '/captcha.php?' + Math.random();
  document.getElementById('captcha_code').value = '';
  return false;
}

/**
 * 2017-01-18
 * Funcion para inactivar un anuncio 
 * @returns {undefined}
 */
function notificar(){
    
          var numeroAnuncio = document.getElementById('numAnuncio');
          var email = document.getElementById('email'); 
          var captcha_code = document.getElementById('captcha_code');
        var data = {          
            numeroAnuncio : numeroAnuncio.value,
            email : email.value,
            captcha_code : captcha_code.value
        };
        if(validarCamposVacios(data)){
            $.ajax({
              type: 'post',
              url: 'notificar',
              data: data,
              success: function(respuesta) {
                  dibujarError(respuesta.mensaje);
                  if(respuesta.codigo != '03'){
                      //***Si ingreso bien el captcha pero ocurrio otro error (o ya actualizo bien) entonces vuelva a ingresar el captcha ketsup
                      refrescarCaptcha();
                  }
              }
            });
        }else{
            alert('Ha ocurrido un error validando los campos!');
//            dibujarError('Ha ocurrido un error validando los campos!');
        }
      
}