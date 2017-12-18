<!DOCTYPE html>
<html>
<head>
<!--Estilos-->
  <style type="text/css">
   #informacion
    {
      margin-left: 2em;
      width: 400px;
      height: 400px;
      float:left;
 
    }
    #map
    {
      ;
      width: 1000px;
      height: 600px;
      float:left;
    }
    
  </style>
  <!-- Bootstrap css-->
  <!--<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
  <!--datatable-->
  <link rel="stylesheet"  href="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.css">
  
  <!-- Bootstrap js-->
  <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
  <!--jquery-->
 <!-- <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>-->
  <!-- Google Maps-->  
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqBKjIObP2dJsSZCMNOSgj_Jy2BGG18DA&callback=initMap">
  </script>
  <!--Inicio-->
   <script >    
    var map;
    var marcadores_nuevos = [];
    var marcadores_db;
    //var coord = $("#coords");
    //funcion para quitar masrcadores nuevos 
    function quitar_marcadores(lista)
    {
      for(i in lista)
      {
        lista[i].setMap(null);
      }

    }
    //inicio de google maps
    function initMap() 
    {
      var formulario = $("#formulario");
      var ubicacion = {lat: 17.060628, lng: -96.725366};
      map = new google.maps.Map(document.getElementById('map'), 
      {
        zoom: 15,
        center: ubicacion,
        mapTypeId:'roadmap'
      });
      //evento para poner el marcador dentro del mapa
      map.addListener("click", function(event)
      {
        var coordenadas = event.latLng.toString();
        coordenadas = coordenadas.replace("(","");
        coordenadas = coordenadas.replace(")","");
        var lista = coordenadas.split(",");
        //alert("la cordenada X es:" + lista[0]);
        //alert("la cordenada Y es:" + lista[1]);
        var direcion = new google.maps.LatLng(lista[0], lista[1]);
        var marcador = new google.maps.Marker
        ({
          //titulo:prompt("titulo del marcador"),
          position:direcion,
          map:map,
          animation:google.maps.Animation.DROP,
          draggable:false
        });
        formulario.find("input[name='cx']").val(lista[0]);
        formulario.find("input[name='cy']").val(lista[1]);
        formulario.find("input[name='titulo']").focus();


        marcadores_nuevos.push(marcador);
        google.maps.event.addListener(marcador,"click",function()
        {
          alert(marcador.titulo);
        });
        quitar_marcadores(marcadores_nuevos);
        marcador.setMap(map);      
      });      
      //funcion del boton para guardar.
      $("#btn_grabar").on("click", function()
      {        
        if($("#titulo").val()=="")
        {
          alert("Ingrese un titulo al marcador nuevo...!!!!");
          return false;
        }
        else
        {
          //se obtienen los datos del formulario y se asignana a las variables.
          var titulo = $("#titulo").val();
          var descripcion = $("#descripcion").val();
          var cx = $("#cx").val();
          var cy = $("#cy").val();
          var imagen = $("#imagen").val();
           $.ajax({
              type: 'POST',
              url: baseurl+"Inspector/cMapa/grabar_punto" ,
              data:{titulo:titulo, descripcion, cx:cx, cy:cy, imagen},
              success: function(data) 
              {
                alert("El Marcador se guardo correctamente");
                location.reload();
              }
            });             
        }//fin else
  
      });//fin de la funcion del boton de grabar
       
       $("#btn_buscar").on("click", function()
      {
      $('#examplexx').html(
    '   <tr>'+
          '<th style="width: 1%">#Punto</th>'+
          '<th style="width: 20%">Titulo</th>'+
          '<th>Buscar</th>'+
          '<th>Ver</th>'+
          '<th>Eliminar</th>'+
        '</tr>' 
      );
  // body...
      $.post(baseurl+"Inspector/cMapa/ver_punto",
      function(data)
      {
        var p = JSON.parse(data);
        $.each(p, function(i, item)
        {
          $('#examplexx').append(
            '<tr>'+
            '<td></td>'+      
              '<td>'+item.idpunto+'</td>'+
              '<td>'+item.titulo+'</td>'+

              '<td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalinfo" onClick="selinfo(\''+item.idpunto+'\',\''+item.titulo+'\',\''+item.descripcion+'\',\''+item.cx+'\',\''+item.cy+'\');">infromación</button></td>'+

              '<td><button type="button" class="btn btn-primary btn-sm" onClick="selpunto(\''+item.idpunto+'\',\''+item.cx+'\',\''+item.cy+'\');"> ver</button</td>'+
              '<td><button type="button" class="btn btn-warning btn-sm">Borrar</button></td>'+
            '<tr>'
          );     
        });//fin de tabla para mostrar datos
        

      });//fin de la función

});//fin del boton de buscar todo
      



//funcion para ver los marcadores+
// var marcadores_db = [];
  selpunto = function(idpunto, cx, cy) 
     { 

 //alert(idpunto);
 //alert(cx);
 //alert(cy);
      var posi = new google.maps.LatLng(cx, cy);
      var marca = new google.maps.Marker
        ({
          idpunto:idpunto,
          position:posi,
          animation: google.maps.Animation.DROP
        });
        google.maps.event.addListener(marca,"click", function(event)
        {
          alert(marca.idpunto);
        });

        marca.setMap(map);
       

     }
  //mostrar informacion del marcador
  selinfo = function(idpunto, titulo, descripcion, cx, cy)
  {
    $("#modal-idpunto").val(idpunto);
    $("#modal-titulo").val(titulo);
    $("#modal-descripcion").val(descripcion);
    $("#modal-cx").val(cx);
    $("#modal-cy").val(cy);
  };
                  

  }//fin de la fincion del mapa.

         
  </script>
  <title>Marcadores</title>
  </head>
  <body>

  <div id="informacion">
  <h2>Registro de puntos en Mapa</h2>
    



<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Agregar Nota</a>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Mostrar</button>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">......</button>
</p>
<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">
         <form id="formulario" method="POST" enctype="multipart/form-data">
      <table>
        <tr>
          <td>Titulo</td>
          <td>
          <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="emailHelp" placeholder="Titulo">
          </td>
        </tr>
        <tr>
          <td>Descripcón</td>
          <td>
           <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp" placeholder="descripcion" required="required">
              </td>
            </tr>
            <tr>
              <td>Coordenada X: </td>
              <td>
                <input type="text" class="form-control" id="cx" name="cx" aria-describedby="emailHelp" placeholder="coordenada X " disabled="disabled" required="required">
              </td>
            </tr>
            <tr>
              <td>Coordenada Y: </td>
              <td>
                <input type="text" class="form-control" id="cy" name="cy" aria-describedby="emailHelp" placeholder="coordenada Y " disabled="disabled" required="required">                
              </td>
            </tr>
            <tr>
              <td>Subir Foto: </td>
              <td>
               <label class="custom-file">
                  <input type="file" id="imagen" name="imagen" class="custom-file-input" required="required">
                  <span class="custom-file-control"></span>
                </label>                
              </td>

            </tr>
        

            <tr>
              <td>
                <button type="button" class="btn btn-success" id="btn_grabar">Guardar</button>
              </td>
              <td>
                <button type="reset" class="btn btn-danger">Limpiar</button>

              </td>
            </tr>
          </table>
        </form>
        <!--Fin de formulario-->    
      </div>
    </div>
  </div>
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample2">
      <div class="card card-body">
        <table id="examplexx" border="1">
    
          <tr>
            <td></td>
            <td>
              ID
            </td>
            <td>
              TITULO
            </td>
            <td>
              bucar
            </td>
            <td>
              Ver
            </td>
            <td>
              eliminar
            </td>
          </tr>

        </table>
                <button type="button" class="btn btn-success" id="btn_buscar">Buscar</button>
                <button type="button" class="btn btn-success" id="btn_ver">ver</button>

      </div>
    </div>
  </div>
</div>

<!--Inicia Formulario del Modal para mostrar la informacion de los marcadores-->
  <div class="modal fade" id="modalinfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-yellow">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Información de marcador</h4>
      </div>

      <div class="modal-body">
        <form class="form-horizontal">
          <!-- parametros ocultos -->
          <input type="hidden" id="idproductor">
          
      <div class="box-body">
            <div class="form-group">
                <label class="col-sm-3 control-label">N° de Marcador</label>
                <div class="col-sm-9"> 
                  <input type="number" disabled="disabled" name="modal-idpunto" class="form-control" id="modal-idpunto" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Titulo</label>
                <div class="col-sm-9"> 
                  <input type="text" name="modal-titulo" class="form-control" id="modal-titulo" value="" disabled="disabled" >
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Descrpcción</label>
                <div class="col-sm-9"> 
                  <input type="text" name="modal-descripcion" class="form-control" id="modal-descripcion" disabled="disabled">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Coordenada X</label>
                <div class="col-sm-9"> 
                  <input type="text" name="modal-cx" class="form-control" id="modal-cx" disabled="disabled">
                </div>
            </div>
             <div class="form-group">
                <label class="col-sm-3 control-label">Coordenada Y</label>
                <div class="col-sm-9"> 
                  <input type="text" name="modal-cy" class="form-control" id="modal-cy" disabled="disabled">
                </div>
            </div>

            </div>
      </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="mbtnCerrarModal" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
  </div>
</div>
  <div id="map"></div>





</body>
</html>
<script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.min.js"></script>


<script>
 $(document).ready(function() {
    var t = $('#examplexx').DataTable({
          $("#btn_buscar").on("click", function()
      {
      $('#examplexx').html(
    '   <tr>'+
          '<th style="width: 1%">#Punto</th>'+
          '<th style="width: 20%">Titulo</th>'+
          '<th>Buscar</th>'+
          '<th>Ver</th>'+
          '<th>Eliminar</th>'+
        '</tr>' 
      );
  // body...
      $.post(baseurl+"Inspector/cMapa/ver_punto",
      function(data)
      {
        var p = JSON.parse(data);
        $.each(p, function(i, item)
        {
          $('#examplexx').append(
            '<tr>'+
            '<td></td>'
              '<td>'+item.idpunto+'</td>'+
              '<td>'+item.titulo+'</td>'+

              '<td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalinfo" onClick="selinfo(\''+item.idpunto+'\',\''+item.titulo+'\',\''+item.descripcion+'\',\''+item.cx+'\',\''+item.cy+'\');">infromación</button></td>'+

              '<td><button type="button" class="btn btn-primary btn-sm" onClick="selpunto(\''+item.idpunto+'\',\''+item.cx+'\',\''+item.cy+'\');"> ver</button</td>'+
              '<td><button type="button" class="btn btn-warning btn-sm">Borrar</button></td>'+
            '<tr>'
          );     
        });//fin de tabla para mostrar datos
        

      });//fin de la función

});//fin del boton de buscar todo
  
  
   "pagingType": "full_numbers",
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
        
    "iDisplayLength": 20,
     "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]],
    //"scrollY": "700px",
  oLanguage: {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar MENU registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando  START a END de MAX registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de MAX registros)",
            "sInfoPostFix":    "",
            "sSearch":         "B  U  S  C  A  R:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
  
            }
   
   }
       });
 
     t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
 
 
  });
</script>
<script type="text/javascript">
var baseurl = "<?php echo base_url(); ?>";
</script>