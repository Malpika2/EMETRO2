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
        if($("#descripcion").val()=="")
        {
          alert("Ingrese la descripción del punto nuevo");
          return false;
        }
        if($("#referencias").val()=="")
        {
          alert("Ingrese alguna referencia para el punto nuevo");
          return false;
        }
        if($("#cx").val()=="")
        {
          alert("falta marcar un punto dentro del mapa");
          return false;
        }
        if($("#cy").val()=="")
        {
          alert("falta marcar un punto dentro del mapa");
          return false;
        }
        else
        {
          //se obtienen los datos del formulario y se asignana a las variables.
          var titulo = $("#titulo").val();
          var descripcion = $("#descripcion").val();
          var cx = $("#cx").val();
          var cy = $("#cy").val();
          var idsolicitud = $("#idsolicitud").val();
          var referencias = $("#referencias").val();
          var file_name = $("#file_name").val();
           $.ajax({
              type: 'POST',
              url: baseurl+"Inspector/cMapa/grabar_punto" ,
              data:
              {
                titulo:titulo, 
                descripcion:descripcion, 
                cx:cx, 
                cy:cy, 
                idsolicitud:idsolicitud,
                referencias:referencias,
                file_name:file_name
              },
              success: function(data) 
              {
                alert("El Marcador se guardo correctamente");
                location.reload();
              }
            });             
        }//fin else
  
      });//fin de la funcion del boton de grabar
       
  


  selpunto = function(idpunto, cx, cy, descripcion) 
     { 
       var infowindow = new google.maps.InfoWindow
        ({
          content:descripcion,
          maxWidth: 200
        });
 
        var posi = new google.maps.LatLng(cx, cy);
     
        var marca = new google.maps.Marker
          ({
            idpunto:idpunto,
            position:posi,
            animation: google.maps.Animation.DROP
          });

        google.maps.event.addListener(marca,"click", function(event)
        {

          infowindow.open(map, marca);
        });

        marca.setMap(map);
       

     }
  //mostrar informacion del marcador
  selinfo = function(idpunto, titulo, descripcion, referencias, fecharegistro)
  {

    $("#modal-idpunto").val(idpunto);
    $("#modal-titulo").val(titulo);
    $("#modal-descripcion").val(descripcion);
    $("#modal-referencias").val(referencias);
    $("#modal-fecha").val(fecharegistro);
  };

 


  }//fin de la fincion del mapa.

         
  </script>
  <title></title>
  </head>
  <body>

  <div id="informacion">
  <h2>Mapa</h2>
    


<!--Menu-->
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Agregar Nota</a>

  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Mostrar</button>

   <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample2">Fotos  </button>  
</p>

<div class="row">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card card-body">

      <form id="formulario" method="POST" enctype="multipart/form-data">
      <table>
        <tr>
          <td></td>
          <td>
          <input type="hidden" class="form-control" id="idsolicitud" name="idsolicitud" value="<?php echo $solicitud;?>" aria-describedby="emailHelp" placeholder="Titulo" >
          </td>
        </tr>

        <tr>
          <td>
        <label for="formGroupExampleInput">Titulo</label>  
        </td>
          <td>
          <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="emailHelp" placeholder="Titulo">
          </td>
        </tr>
        <tr>
          <td> <label for="formGroupExampleInput">Descripción</label>  </td>
          <td>
           <textarea class="form-control" rows="2" id="descripcion" name="descripcion" required="required" placeholder="Descripción"></textarea>
              </td>
            </tr>
            <tr>
          <td> <label for="formGroupExampleInput">Referencias</label>  </td>
          <td>          
           <textarea class="form-control" rows="2" id="referencias" name="referencias" required="required" placeholder="Referencias" value=""></textarea>
              </td>
            </tr>
            <tr>
              <td> <label for="formGroupExampleInput">Fotos</label> </td>
              <td>
                <input class="form-control" type="file" name="file_name[]" id="file_name" required="required" multiple>
              </td>
            </tr>
        
            <tr>
              <td>
                <input type="hidden" class="form-control" id="cx" name="cx">
                <input type="hidden" class="form-control" id="cy" name="cy"> <br/>
              </td>
            </tr>
        

            <tr>
              <td>
                <button type="button" class="btn btn-info" id="btn_grabar">Guardar</button>
              </td>
              <td>
                <button type="reset" class="btn btn-info">Limpiar</button>

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
      <table class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Informacion</th>
                <th>Borrar</th>                
            </tr> 
            <?php foreach($row_puntos as $punto){ ?>

            <tr>
              <td><?php echo $punto->titulo; ?></td>

              <td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalinfo" onClick= "<?php echo "selinfo('$punto->idpunto','$punto->titulo','$punto->descripcion','$punto->referencias','$punto->fecharegistro')";?>">infromación</button></td>

              <td><button type="button" class="btn btn-primary btn-sm" onClick="<?php echo "selpunto('$punto->idpunto','$punto->cx','$punto->cy','$punto->descripcion')";?>"> ver</button</td>

              <td><button type="button" class="btn btn-warning btn-sm">Borrar</button></td>

            </tr>
        <?php  } ?>
        </thead>
      </table>
     

      </div>
    </div>
  </div>

    <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample3">
      <div class="card card-body">
        <div class="form-group">
         
<form enctype="multipart/form-data" action="<?php echo base_url();?>Inspector/cMapa/guardar_fotos" method="post" id="fotos">
            <div class="form-group">
              <input type="text" class="form-control" id="idsolicitud" name="idsolicitud" value="<?php echo $solicitud;?>" aria-describedby="emailHelp" placeholder="Titulo" >
                <label for="exampleFormControlSelect1">Titulo</label>

                      <select class="form-control" id="idpunto" name="idpunto">
                        <?php foreach ($row_puntos as $punto) {?>
                      <option > <?php echo $punto->idpunto;  }?></option><br/>
                      </select>
              
            </div>
            <div class="form-group">

                <label>Fotos</label>
                <input type="file" class="form-control" name="userFiles[]" multiple/>
            </div>
            <div class="form-group">
                <input class="form-control" type="submit" name="fileSubmit" value="UPLOAD" id="reset1"/>
            </div>
        </form>


        

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
                <label class="col-sm-3 control-label">Referencias</label>
                <div class="col-sm-9"> 
                  <input type="text" name="modal-referencias" class="form-control" id="modal-referencias" disabled="disabled">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Fecha de registro</label>
                <div class="col-sm-9"> 
                  <input type="text" name="modal-fecha" class="form-control" id="modal-fecha" disabled="disabled">
                </div>
            </div>
             <div class="form-group">
        
            <div class="col-sm-9"> 
                  <?php foreach($row_fotos as $foto) {?>
            <img src="<?php echo base_url('fotos/'. $foto->file_name); ?>" width="20" height="20">
                  <?php } ?>
                </div>
            </div>
            <!--Sliders-->
      

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
  <div>

  
      
 
  </div>
</body>
</html>
<script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/datatables/dataTables.bootstrap.min.js"></script>



<script type="text/javascript">
var baseurl = "<?php echo base_url(); ?>";
</script>