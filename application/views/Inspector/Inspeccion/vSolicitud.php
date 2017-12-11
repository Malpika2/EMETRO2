<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12  col-md-12 main">
        <form method="post" action="<?php echo base_url('inspector'); ?>">
          <button type="submit" class="btn btn-success">INICIO</button>
        </form>
          <h1 class="page-header">Metrocert Movil</h1>
  <iframe width="1" height="1" name="destino" frameborder="0"></iframe>

<?php /*
<div class="col-lg-12" id="indicaciones">
<p class="lead">
Escribe en los campos sombreados en Rojo la información que se te pide
</p>
</div>
*/ ?>
<div id="cuerpo" class="col-lg-10" >
  <h3>Orden de inspección</h3>
  <div class="panel panel-default">
  <div class="panel-heading" align="center">
  <h4>SOLICITUD DE INSPECCIÓN Y CERTIFICACIÓN ORGÁNICA</h4>
  </div>
  <div class="panel-body">
  
  <form class="form-horizontal" action="<?php //echo //$editFormAction; ?>" method="post" name="form1" id="form_principal" target="destino">

  <div class="col-lg-6 alert alert-warning">
  Fecha: <strong><?php echo htmlentities(date('d-m-Y',$row_solicitud->fecha), ENT_COMPAT, 'UTF-8'); ?><br />
  <input name="solicitud_tipo" type="text" value="<?php echo htmlentities($row_solicitud->solicitud_tipo, ENT_COMPAT, 'UTF-8'); ?>" readonly="readonly" />
  </strong>
  </div>
  <div class="col-lg-6 alert alert-warning">
  Código de operador: <strong><?php  echo htmlentities($row_operador->codigo_operador, ENT_COMPAT, 'UTF-8'); ?></strong>
  <br />
  Operador: <strong><?php  echo htmlentities($row_operador->operador, ENT_COMPAT, 'UTF-8'); ?></strong>
  </div>
  
  <div class="col-lg-12 alert alert-success">
  C: Mauricio Soberanes Hernández<br />
  Director de METROCERT
  Solicito de manera formal la inspección y certificación orgánica para la actividad cuyos datos a continuación se indican:
  </div>

  <div class="row" id="reparator">&nbsp;</div>

<input type="hidden" name="section_post" value="update" />


  <div class="panel panel-info">
    <div class="panel-heading">
    <a name="seccion1"></a>
      <h3 class="panel-title">I.- DATOS GENERALES DE OPERADOR</h3>
    </div>
    <div class="panel-body">
      <table align="center" class="table table-bordered table-condensed">
        <tr>
          <th width="40%">Nombre del propietario o razón social</th>
          <th>RFC</th>
          <th>CURP</th>
        </tr>
        <tr>
          <td><?php  echo $row_operador->operador; ?></td>
          <td><?php  echo $row_operador->rfc; ?></td>
          <td><?php  echo $row_operador->curp; ?></td>
        </tr>
        <tr class="warning">
          <td colspan="3" align="center"><strong>Domicilio fiscal</strong></td>
        </tr>
        <tr>
          <th>Calle</th>
          <th>Colonia</th>
          <th>Delegación/Municipio</th>
        </tr>
        <tr>
          <td>
            <?php echo $row_operador->calle; ?>,
            <?php echo $row_operador->numero_interior; ?>,
            <?php echo $row_operador->numero_exterior; ?>
          </td>
          <td><?php echo $row_operador->colonia; ?></td>
          <td><?php echo $row_operador->municipio; ?></td>
        </tr>
        <tr>
          <th>Localidad</th>
          <th>C.P.</th>
          <th>Entidad federativa</th>
        </tr>
          <tr>
          <td><?php echo $row_operador->localidad; ?></td>
          <td><?php echo $row_operador->codigo_postal; ?></td>
          <td><?php echo $row_operador->entidad_federativa; ?>, <?php echo $row_operador->pais; ?></td>
        </tr>
        <tr>
          <th>Teléfono</th>
          <th>Fax</th>
          <th>Email</th>
        </tr>
        <tr>
          <td><?php echo $row_operador->telefono; ?></td>
          <td><?php echo $row_operador->fax; ?></td>
          <td><?php echo $row_operador->email; ?></td>
       </tr>
       
       <tr class="warning">
          <td colspan="3" align="center"><strong>Domicilio físico de la operación</strong></td>
        </tr>
        <tr>
          <th rowspan="2">
          
<label class="col-lg-2" for="calle">Calle</label>
<div class="col-lg-10">
<input disabled="disabled" onchange="document.getElementById('form_principal').submit()" type="text" class="form-control" name="calle" value="<?php  echo $row_solicitud->calle;?>"/>
</div>

<label class="col-lg-3" for="numero_interior">Interior</label>
<div class="col-lg-3">
<input disabled="disabled"  onchange="document.getElementById('form_principal').submit()" type="text" class="form-control" name="numero_interior" value="<?php  echo $row_solicitud->numero_interior;?>" />
</div>
  
<label class="col-lg-3" for="numero_exterior">Exterior</label>
<div class="col-lg-3">
<input disabled="disabled"  onchange="document.getElementById('form_principal').submit()" type="text" class="form-control" name="numero_exterior" value="<?php  echo $row_solicitud->numero_exterior;?>"/>
</div>
          
          
          </th>
          <th>Colonia</th>
          <th>Delegación/Municipio</th>
        </tr>
        <tr>
          <td><input disabled="disabled"  onchange="document.getElementById('form_principal').submit()" type="text" class="form-control" name="colonia" value="<?php echo $row_solicitud->colonia;?>" size="32" /></td>
          <td><input disabled="disabled"  onchange="document.getElementById('form_principal').submit()" type="text" class="form-control" name="municipio" value="<?php echo $row_solicitud->municipio;?>" size="32" /></td>
        </tr>
        <tr>
          <th>Localidad</th>
          <th>C.P.</th>
          <th>Entidad federativa</th>
        </tr>
          <tr>
          <td><input  disabled="disabled" onchange="document.getElementById('form_principal').submit()" type="text" class="form-control" name="localidad" value="<?php  echo $row_solicitud->localidad;?>" size="32" /></td>
          <td><input disabled="disabled"  onchange="document.getElementById('form_principal').submit()" type="text" class="form-control" name="codigo_postal" value="<?php  echo $row_solicitud->codigo_postal;?>" size="32" /></td>
          <td>
            <select disabled="disabled" onchange="document.getElementById('form_principal').submit()" name="entidad_federativa" class="form-control" id="entidad_federativa">
            <option value="">Seleccionar un estado</option>
             <?php 
            foreach ($row_estado as $estado) {?>
            <option value="<?php echo $estado->estado;?>" <?php if(utf8_decode($row_solicitud->entidad_federativa) == $estado->estado){echo "selected";} ?>><?php echo $estado->estado; ?></option>
             <?php }
            ?>
          </select></td>
        </tr>
        <tr>
          <th>Teléfono</th>
          <th>Fax</th>
          <th>Email</th>
        </tr>
        <tr>
          <td><input disabled="disabled"  onchange="document.getElementById('form_principal').submit()" type="text" class="form-control" name="telefono" value="<?php echo $row_solicitud->telefono;?>" size="32" /></td>
          <td><input disabled="disabled"  onchange="document.getElementById('form_principal').submit()" type="text" class="form-control" name="fax" value="<?php echo $row_solicitud->fax;?>" size="32" /></td>
          <td><input  disabled="disabled" onchange="document.getElementById('form_principal').submit()" type="email" class="form-control" name="email" value="<?php  echo $row_solicitud->email;?>" size="32" /></td>
       </tr>
        <tr class="warning">
          <td colspan="3" align="center"><strong>Responsable de seguimiento</strong></td>
        </tr>
        <tr>
          <th>Nombre</th>
          <th>Teléfono</th>
          <th>Email</th>
        </tr>
        <tr>
          <td><input  disabled="disabled" onchange="document.getElementById('form_principal').submit()" class="form-control" type="text" name="rc_nombre" value="<?php echo htmlentities($row_solicitud->rc_nombre, ENT_COMPAT, 'UTF-8'); ?>" size="32" /></td>
          <td><input  disabled="disabled" onchange="document.getElementById('form_principal').submit()" class="form-control" type="text" name="rc_telefono" value="<?php  echo htmlentities($row_solicitud->rc_telefono, ENT_COMPAT, 'UTF-8'); ?>" size="32" /></td>
          <td><input disabled="disabled"  onchange="document.getElementById('form_principal').submit()" class="form-control" type="text" name="rc_email" value="<?php echo htmlentities($row_solicitud->rc_email, ENT_COMPAT, 'UTF-8'); ?>" size="32" /></td>
       </tr>
    </table>
    </div>
  </div>
<input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="idsolicitud" value="<?php // echo $row_solicitud['idsolicitud']; ?>" />
</form>
  <div class="panel panel-info">
    <div class="panel-heading">
    <a name="seccion2"></a>
      <h3 class="panel-title">II.- DATOS GENERALES - ALCANCE PRODUCTO Y PROCESO A CERTIFICAR</h3>
    </div>
    <div class="panel-body">
    

<table align="center" class="table table-bordered table-condensed">

<tr>
<td>Categoría de certificación</td>
<td colspan="1">
    <table class="table table-bordered table-striped table-hover table-condensed">
      <?php
      foreach ($row_nombre_categoria as $nombre_solicitud) {
        if(null!==$nombre_solicitud){
       ?>
        <tr>
          <td>
            <input type="text" value="<?php echo $nombre_solicitud->categoria_certificacion;?>" disabled="disabled" class="form-control" />
         </td>
        </tr> 
      <?php }
        }
      ?>
    </table>
</td>
<td></td>
</tr>
</table>
<a name="productos"></a>
<table align="center" class="table table-bordered table-condensed">
<tr class="warning">
<td align="center" class="lead"><strong>Lista de productos:</strong></td>
</tr>
<tr>
<td>

  <table  class="table table-bordered table-striped table-hover table-condensed">
  <thead>
    <tr valign="baseline">
      <th nowrap="nowrap" align="right">Producto:</th>
      <th nowrap="nowrap" align="right">Marca comercial:</th>
      <td width="1">Unidad de producción</td>
      <th>Superficie</th>
      <th nowrap="nowrap" align="right">Cantidad:</th>
      <th nowrap="nowrap" align="right">Producción anual:</th>
      <td></td>
    </tr>
    </thead>
    <tbody>
    
<?php
//while($row_producto = mysql_fetch_assoc($producto_s)){

//$query = "SELECT * FROM unidad_produccion where idoperador='".$row_solicitud['idoperador']."'";
//$ejecutarups = mysql_query($query, $emetro) or die(mysql_error());
//$row_unidadades = mysql_fetch_assoc($ejecutarups);
foreach ($row_producto as $producto) {
?>
<tr valign="baseline" >
  <form action="#productos" method="post" name="form_producto_update" id="form_producto_update">
  <td><input disabled="disabled" class="form-control" type="text" name="producto" value="<?php echo $producto->producto;?>" /></td>
  <td><input disabled="disabled" class="form-control" type="text" name="marca_comercial" value="<?php  echo $producto->marca_comercial;?>" /></td>
  
  <td>
<?php
  foreach ($row_unidades as $unidades) {
    if ($row_producto->idunidad_produccion===$row_unidades->idunidad_produccion){
       echo $row_unidades['unidad_produccion'];
    }
  }
?>
  </td>
  <td><input disabled="disabled" class="form-control" type="text" name="superficie" value="<?php  echo $producto->superficie;?>"/></td>
  <td><input disabled="disabled" class="form-control" type="text" name="cantidad" value="<?php echo $producto->cantidad;?>"/></td>
  <td><input disabled="disabled" class="form-control" type="text" name="produccion_anual" value="<?php echo $producto->produccion_anual;?>" /></td>
  </form>
</tr>
<?php }?>
    </tbody>
  </table>
  

</td>
</tr>
</table>

<a name="procesos"></a>
<table align="center" class="table table-bordered table-condensed">
<tr class="warning">
<td align="center" class="lead"><strong>Procesos subcontratados:</strong><br />Indique los procesos de su sistema de producción que son desarrollados externamente</td>
</tr>
<tr>
<td>

    <table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
    <tr>
    <th>Proceso</th>
    <th>Operador que lo desarrolla</th>
    <th>¿Operador certificado?</th>
    <th>Ubicación del operador</th>
    </tr>
    </thead>
    <tbody>



<?php 
foreach ($row_procesos as $procesos) {
?>
<tr>
<form action="#procesos" method="post" name="form23up" id="form23up">
<td><select  disabled="disabled" name="idproceso" class="form-control">
<?php 
  foreach ($row_proceso as $proceso) {
?>
<option <?php if($procesos->idproceso==$proceso->idproceso){?> selected="selected" <?php } ?> value="<?php echo $proceso->idproceso;?>"><?php echo $proceso->proceso;?></option>
<?php }//end proceso ?>
</select></td>
<td><input disabled="disabled" class="form-control" type="text" name="operador" value="<?php  echo $procesos->operador;?>" /></td>
<td><table align="center">
  <tr>
    <td>
      <?php echo $procesos->certificado;?>
    </td>
  </tr>
</table>
</td>
<td><input  disabled="disabled" class="form-control" type="text" name="ubicacion" value="<?php echo $procesos->ubicacion;?>" /></td>
</form>
</tr>
<?php  } //end foreach_Procesos?>
    </tbody>
    </table>


</td>
</tr>
</table>
    
    </div>
  </div>
    

  
    <div class="panel panel-info">
    <div class="panel-heading">
        <a name="seccion4"></a>
        <h3 class="panel-title">III.- INFORMACIÓN SOBRE EL CAMBIO DE CERTIFICADORA</h3>
    </div>
    <div class="panel-body">
    <form class="form-horizontal" action="../admin/section/solicitud/cerebro.php" method="post" name="form_seccion4" id="form_seccion4" target="destino">
<input type="hidden" name="seccion4_update" value="update" />
  <input type="hidden" name="idsolicitud" value="<?php echo $row_solicitud->idsolicitud; ?>" />
    <table align="center" class="table table-bordered table-condensed lead">
    <tr>
      <td>1</td>
      <td>¿Con quién estuvo certificado o ha solicitado anteriormente su certificación?:</td>
      <td><input  disabled="disabled"class="form-control"  onchange="document.getElementById('form_seccion4').submit()" type="text" name="certificadora_anterior" value="<?php  echo htmlentities($row_solicitud->certificadora_anterior, ENT_COMPAT, 'UTF-8'); ?>" /></td>
    </tr>
    <tr valign="baseline">
      <td>2</td>
      <td>¿Cuál fue la fecha de vigencia del último certificado orgánico emitído por esa certificadora?:</td>
      <td><input  disabled="disabled" class="form-control"   onchange="document.getElementById('form_seccion4').submit()"type="date" name="vigencia_certificado" value="<?php  echo htmlentities($row_solicitud->vigencia_certificado, ENT_COMPAT, 'UTF-8'); ?>"  /></td>
    </tr>
    <tr valign="baseline">
      <td>3</td>
      <td>¿Cuál es la razón del cambio de certificadora?:</td>
      <td>
      <textarea disabled="disabled" class="form-control"  onchange="document.getElementById('form_seccion4').submit()" name="razon_cambio"><?php  echo htmlentities(utf8_decode($row_solicitud->razon_cambio)); ?></textarea>
      </td>
    </tr>
    <tr valign="baseline">
      <td>4</td>
      <td>¿Tiene usted <strong>no conformidades abiertas</strong> con su anterior certificadora?:</td>
      <td>
      <textarea disabled="disabled" class="form-control"  onchange="document.getElementById('form_seccion4').submit()" name="no_conformidades"><?php  echo htmlentities($row_solicitud->no_conformidades, ENT_COMPAT, 'UTF-8'); ?>
      </textarea>
      </td>
    </tr>
    </table>
    </form>
    </div>
    </div>


<a name="firma"></a>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">FIRMAR SOLICITUD - OPERADOR</h3>
    </div>
    <div class="panel-body">
    <table class="table lead">
<form action="#firma" method="post" >
<tr>
<td>
<input <?php  if(strlen($row_solicitud->firma_nombre)>0){?> disabled="disabled" <?php  }?>placeholder="Escriba el nombre de la persona que envía la solicitud" class="form-control" type="text" name="firma_nombre" value="<?php  echo $row_solicitud->firma_nombre;?>" />
</td>
<td>
<input disabled="disabled" class="form-control" type="text" name="firma_fecha" value="<?php  if($row_solicitud->firma_fecha>0){echo date("Y-m-d",$row_solicitud->firma_fecha);}?>" />
</td>
<td>
<input type="hidden" name="idsolicitud" value="<?php  echo $row_solicitud->idsolicitud; ?>" />
<input type="hidden" name="section_post" value="update" />
<input type="hidden" name="firmar_solicitud" value="1" />
<input class="form-control btn btn-success" type="submit" <?php  if(strlen($row_solicitud->firma_nombre)>0){?> disabled="disabled" <?php  }?> value="Firmar" />
</td>
</tr>
</form>
    </table>
    </div>
    </div>
    
<a name="revision"></a>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">REVISIÓN POR METROCERT</h3>Para marcar esta solicitud como revisada presiona el botón <strong>Guardar</strong>
    </div>
    <div class="panel-body">
    <table class="table lead">
<form action="#revision" method="post" >
<tr>
<td>
<input  disabled="disabled" placeholder="Nombre" class="form-control" type="text" name="revision_nombre" value="<?php  echo $row_solicitud->revision_nombre;?>" />
</td>
<td>
<input disabled="disabled" class="form-control" type="text" name="revision_fecha" value="<?php if($row_solicitud->revision_fecha>0){echo date("Y-m-d",$row_solicitud->revision_fecha);}?>" />
</td>
<td>
<input type="hidden" name="idsolicitud" value="<?php  echo $row_solicitud->idsolicitud; ?>" />
<input type="hidden" name="section_post" value="update" />
<input type="hidden" name="revision_solicitud" value="1" />
<input class="form-control btn btn-success" type="submit" <?php if(strlen($row_solicitud->revision_nombre)>0){?> disabled="disabled" <?php  }?> value="Guardar" />
</td>
</tr>
</form>
    </table>
    </div>
    </div>
</div>
</div>
</div>
