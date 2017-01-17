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
           url: 'ciudades',
           data: data,
           success: function(data){

//               var $ciudad_selector = $('#products_filtro_ciudadId');
//               var $ciudad_selector = $('#');
               var $ciudad_selector = $('#'+idCiudadName);
               
               $ciudad_selector.html('<option value="">Selecciona...</option>');
               
               for(var i= 0, total = data.length; i< total; i++){
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
           url: 'razas',
           data: data,
           success: function(data){

//               var $raza_selector = $('#products_filtro_cilindrajeIdFilter');
               var $raza_selector = $('#'+idRazaName);
               
               $raza_selector.html('<option value="">Selecciona...</option>');
               
               for(var i= 0, total = data.length; i< total; i++){
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