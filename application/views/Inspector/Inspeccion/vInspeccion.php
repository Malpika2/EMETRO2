<div id="cuerpo" class="col-lg-10" >
  <h1 class="page-header">Inspección</h1>
  <form method="post" action="<?php echo base_url('inspector'); ?>">
      <button type="submit" class="btn btn-primary">Ver Todas</button>
  </form><br>
  
  <div class="panel panel-default">
  <div class="panel-heading" align="center">
  <h4>ORDEN DE INSPECCIÓN ORGÁNICA</h4>
  </div>
  <div class="panel-body">
  
  

  <div class="col-lg-12 alert alert-info">
  
  <table class="table">
  <tr>
  <td>Inspector asignado</td>
  <td>Inicio de inspección</td>
  <td>Fin de inspección</td>
  <td rowspan="2">
  Código de operador: <strong><?php  echo htmlentities($row_operador->codigo_operador, ENT_COMPAT, 'UTF-8'); ?></strong>
  <br />
  Operador: <strong><?php   echo htmlentities($row_operador->operador, ENT_COMPAT, 'UTF-8'); ?></strong>
  </td>
  </tr>
  
  <tr>
  <td>
  
<table class="table">
<?php
foreach ($row_inspeccion as $inspeccion) {
?>
<tr>
<td><?php echo $row_inspector[$inspeccion->idinspeccion]->nombre.' '.$row_inspector[$inspeccion->idinspeccion]->apellido;?></td>
<td><?php  echo $inspeccion->inspeccion_tipo;?></td>
</tr>
<?php  }?>
</table>
  
  </td>
  <form id="inspeccion_fecha" class="form-horizontal" action="../admin/section/inspeccion/cerebro.php" method="post" target="destino">
  <input type="hidden" name="inspeccion_fecha" value="update" />
  <input type="hidden" name="idsolicitud" value="<?php  echo $row_solicitud->idsolicitud; ?>" />
  <td>
	<input disabled="disabled" onchange="document.getElementById('inspeccion_fecha').submit()" type="date" name="inspeccion_inicio" value="<?php  echo $row_orden_inspeccion->inspeccion_inicio;?>" />
  </td>
  <td>
  <input disabled="disabled" onchange="document.getElementById('inspeccion_fecha').submit()" type="date" name="inspeccion_fin" value="<?php   echo $row_orden_inspeccion->inspeccion_fin;?>" />
  </td>
  </form>
  
  </tr>
  
  </table>
  
  
  </div>
  
  <form class="form-horizontal" action="<?php // echo $editFormAction; ?>" method="post" name="form1" id="form_principal" target="destino">

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
			<?php  echo $row_operador->calle; ?>,
            <?php  echo $row_operador->numero_interior; ?>,
            <?php  echo $row_operador->numero_exterior; ?>
          </td>
          <td><?php  echo $row_operador->colonia; ?></td>
          <td><?php  echo $row_operador->municipio; ?></td>
        </tr>
        <tr>
          <th>Localidad</th>
          <th>C.P.</th>
          <th>Entidad federativa</th>
        </tr>
          <tr>
          <td><?php  echo $row_operador->localidad; ?></td>
          <td><?php  echo $row_operador->codigo_postal; ?></td>
          <td><?php  echo $row_operador->entidad_federativa; ?>, <?php  echo $row_operador->pais; ?></td>
        </tr>
        <tr>
          <th>Teléfono</th>
          <th>Fax</th>
          <th>Email</th>
        </tr>
        <tr>
          <td><?php  echo $row_operador->telefono; ?></td>
          <td><?php  echo $row_operador->fax; ?></td>
          <td><?php  echo $row_operador->email; ?></td>
       </tr>
       
       <tr class="warning">
        	<td colspan="3" align="center"><strong>Domicilio físico de la operación</strong></td>
        </tr>
        <tr>
          <th rowspan="2">
          
<label class="col-lg-2" for="calle">Calle</label>
<div class="col-lg-10"><?php  echo $row_solicitud->calle;?></div>

<div class="col-lg-4">Interior: <?php  echo $row_solicitud->numero_interior;?></div>
  
<div class="col-lg-4">Exterior: <?php  echo $row_solicitud->numero_exterior;?></div>          
          
          </th>
          <th>Colonia</th>
          <th>Delegación/Municipio</th>
        </tr>
        <tr>
          <td><?php  echo $row_solicitud->colonia;?></td>
          <td><?php  echo $row_solicitud->municipio;?></td>
        </tr>
        <tr>
          <th>Localidad</th>
          <th>C.P.</th>
          <th>Entidad federativa</th>
        </tr>
          <tr>
          <td><?php  echo $row_solicitud->localidad;?></td>
          <td><?php  echo $row_solicitud->codigo_postal;?></td>
          <td><?php  echo utf8_decode($row_solicitud->entidad_federativa);?></td>
        </tr>
        <tr>
          <th>Teléfono</th>
          <th>Fax</th>
          <th>Email</th>
        </tr>
        <tr>
          <td><?php  echo $row_solicitud->telefono;?></td>
          <td><?php  echo $row_solicitud->fax;?></td>
          <td><?php  echo $row_solicitud->email;?></td>
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
          <td><?php  echo htmlentities(utf8_encode($row_solicitud->rc_nombre)); ?></td>
          <td><?php  echo htmlentities(utf8_encode($row_solicitud->rc_telefono)); ?></td>
          <td><?php  echo htmlentities($row_solicitud->rc_email); ?></td>
       </tr>
    </table>
    </div>
	</div>
<input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="idsolicitud" value="<?php  echo $row_solicitud->idsolicitud; ?>" />
</form>

  <div class="panel panel-info">
    <div class="panel-heading">
    <a name="seccion2"></a>
      <h3 class="panel-title">II.- DATOS GENERALES - ALCANCE PRODUCTO Y PROCESO A CERTIFICAR</h3>
    </div>
    <div class="panel-body">
    

<table align="center" class="table table-bordered table-condensed">
<form action="<?php // echo $editFormAction; ?>#seccion2" method="post" name="form2" id="form2">
<tr valign="baseline"  >
<td><strong>Tipo de inspección</strong></td>
<td><strong>Categoría de certificación</strong></td>
</tr>
<input type="hidden" name="idsolicitud" value="<?php  echo $row_solicitud->idsolicitud; ?>" />
<input type="hidden" name="MM_insert" value="form2" />
<input type="hidden" name="section_post" value="update" />
</form>
<tr>
<td><?php  echo htmlentities($row_solicitud->solicitud_tipo); ?></td>
<td colspan="1">
    <table class="table table-bordered table-striped table-hover table-condensed";>
    <tr>
    <?php
      foreach ($row_nombre_categoria as $nombre_solicitud) {

    ?>
    	<?php if (null!==$nombre_solicitud) {
    	 echo "<td>".$nombre_solicitud->categoria_certificacion."</td>";
    	}
	}?>
    </tr>
    </table>
</td>
</tr>
</table>
<a name="productos"></a>
<table align="center" class="table table-bordered table-condensed">
<tr class="warning">
<td align="center" class="lead"><strong>Lista de productos:</strong></td>
</tr>
<tr>
<td>

  <table class="table table-bordered table-striped table-hover table-condensed">
  <thead>
    <tr valign="baseline">
      <th nowrap="nowrap" align="right">Producto:</th>
      <th nowrap="nowrap" align="right">Marca comercial:</th>
      <td width="1"><strong>Unidad&nbsp;de&nbsp;producción</strong></td>
      <th>Superficie (ha)</th>
      <th nowrap="nowrap" align="right">Cantidad:</th>
      <th nowrap="nowrap" align="right">Producción anual:</th>
    </tr>
    </thead>
    <tbody>
    

<?php
foreach ($row_producto as $producto) {

?>
<tr valign="baseline" >
  <td><?php  echo $producto->producto;?></td>
  <td><?php  echo $producto->marca_comercial;?></td>
  
  <td><?php if (isset($row_unidades[$producto->idunidad_produccion]['unidad_produccion'])) {
  		echo $row_unidades[$producto->idunidad_produccion]['unidad_produccion'];
  		} ?>
  		
  	</td>
  
  <td><?php  echo $producto->superficie;?></td>
  <td><?php  echo $producto->cantidad;?></td>
  <td><?php  echo $producto->produccion_anual;?></td>
</tr>


<?php  }?>
    
    </tbody>
  </table>
  

</td>
</tr>
</table>

<a name="procesos"></a>
<table align="center" class="table table-bordered table-condensed">
<tr class="warning">
<td align="center" class="lead"><strong>Procesos subcontratados:</strong><br />  
  Procesos del sistema de producción que son desarrollados externamente</td>
</tr>
<tr>
<td>

    <table class="table table-bordered table-condensed" >
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
<td><?php  echo $row_proceso[$procesos->idproceso]->proceso;?></td>
<td><?php  echo $procesos->operador;?></td>
<td><?php  echo $procesos->certificado;?></td>
<td><?php  echo $procesos->ubicacion;?>
</td>
</tr>
<?php  }//foreach procesos?>
    </tbody>
    </table>


</td>
</tr>
</table>
    
    </div>
  </div>
    
    
  <div class="panel panel-info">
    <div class="panel-heading">
    <a name="seccion3"></a>
      <h3 class="panel-title">III.- INDICACIONES ESPECIFICAS</h3>
    </div>
    <div class="panel-body">
    <table align="center" class="table table-bordered table-condensed">
    <tr class="success">
    <td colspan="3">Descripción de la sección</td>
    </tr>
    <tr class="warning">
    <td width="1">No</td>
    <td colspan="2">Actividad específica</td>
    </tr>
 
 
    
<?php 
$conti=0;
foreach ($row_inspeccion_indicacion as $indicacion) {
	$conti++;
?>

<tr>
<form action="<?php // echo $editFormAction; ?>#seccion3" method="post" name="form2" id="form2"> 
<td><?php  echo $conti;?></td>
<td><input disabled="disabled" class="form-control" placeholder="Escribe aquí tu indicación" type="text" name="indicacion" value="<?php  echo utf8_decode($indicacion->indicacion);?>" /></td>

</form>


</tr>
<?php  }?>

</table>
</div>
</div>

    
    <div class="panel panel-info">
    <div class="panel-heading">
    <a name="seccion4"></a>
      <h3 class="panel-title">IV.- VERIFICACIÓN DE APLICACIÓN DE ACCIONES CORRECTIVAS PREVIAS</h3>
    </div>
    <div class="panel-body">
    <table align="center" class="table table-bordered table-condensed">
    <tr class="warning">
    <td width="1">No</td>
    <td>No conformidad</td>
    <td><strong>Acción correctiva</strong></td>
    <td colspan="2">Origen</td>
    </tr>    
<?php
$conti=0;
foreach ($row_inspeccion_accion_correctiva_previa as $accionCorrectiva) {
	$conti++;
?>

<tr>
<form action="<?php // echo $editFormAction; ?>#seccion4" method="post" name="form2" id="form2"> 
<td><?php  echo $conti;?></td>
<td colspan="1">
<input disabled="disabled" class="form-control" placeholder="No conformidad" type="text" name="no_conformidad" value="<?php  echo utf8_decode($accionCorrectiva->no_conformidad);?>" />
</td>
<td>
<input disabled="disabled" class="form-control" placeholder="Acción correctiva" type="text" name="accion_correctiva_previa" value="<?php  echo utf8_decode($accionCorrectiva->accion_correctiva_previa);?>" />
</td>
<td>
<input disabled="disabled" class="form-control" placeholder="Origen" type="text" name="origen" value="<?php echo  utf8_decode($accionCorrectiva->origen);?>" />
</td>
</form>
    

</tr>
<?php  }?>

</table>
</div>
</div>

<a name="revision"></a>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">AUTORIZACIÓN POR METROCERT</h3>Para marcar esta orden de inspección como autorizada, presiona el botón <strong>Autorizar</strong>
    </div>
    <div class="panel-body">
    <table class="table lead">
<form id="form_autorizacion_orden" action="<?php echo base_url('Inspector/Inspecciones/autorizacion_orden'); ?>" method="post" >
<tr>
<td>
<input  disabled="disabled" placeholder="Nombre" class="form-control" type="text" name="autorizacion_nombre" value="<?php  echo $row_orden_inspeccion->autorizacion_nombre;?>" />
</td>
<td>
<input disabled="disabled" placeholder="Fecha" class="form-control" type="text" name="revision_fecha" value="<?php  if($row_orden_inspeccion->autorizacion_fecha>0){echo date("Y-m-d",$row_orden_inspeccion->autorizacion_fecha);}?>" />
</td>
<td>
<input type="hidden" name="idsolicitud" value="<?php  echo $row_solicitud->idsolicitud; ?>" />
<input type="hidden" name="section_post" value="update" />
<input type="hidden" name="autorizacion_orden" value="1" />
<input id="btn_Autorizar" class="form-control btn btn-success" type="submit" <?php   if(strlen($row_orden_inspeccion->autorizacion_nombre)>0){?> disabled="disabled" <?php  }?> value="Autorizar" />
</td>
</tr>
</form>
    </table>
    </div>
    </div>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">FIRMA DE SOLICITUD - INSPECTOR</h3>
    </div>
    <div class="panel-body">
    <table class="table lead">
    <?php if ($row_firma!==null){?>
    <tr>
      <td>
        <input <?php  if($row_firma!==null){ ?> disabled="disabled" <?php } ?> placeholder="Escriba el nombre de la persona que envía la solicitud" class="form-control" type="text" id="firma_nombre" name="firma_nombre" value="<?php  echo $_SESSION['MM_Username'];?>" />
      </td>
      <td>
        <input disabled="disabled" class="form-control" type="text" id="firma_fecha" name="firma_fecha" value="<?php  if($row_firma!==null){echo date("Y-m-d",$row_firma->fecha_firma);}?>" />
      </td>
    </tr>
    <tr>
      <td colspan="3"> 
          <img class="img-responsive" src="<?php echo base_url($row_firma->url_firma);?>.png" alt="imagen-firma">
      </td> 
    </tr>
    <?php } else {?>
    <tr>
      <td>
        <div class="alert alert-danger" role="alert">
            <small>Sin firmar</small>
        </div>
      </td>
    </tr>
    <?php }?>
</table>
    </div>
    </div>
      </div>
	</div>
</div>