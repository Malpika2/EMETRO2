
<div class="col-md-10 col-sm-10">
    <div class="row">
      <div class="col-sm-12  col-md-12 main">
          <h1 class="page-header">Inspecciones</h1>
        <br>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover table-condensed table-responsive">
<thead>
  <tr>
    <th colspan="4">Orden de inspección</th>
    <th>Autorización</th>
    <th colspan="2">Fecha&nbsp;de&nbsp;inspección</th>
    <th>Reporte&nbsp;inspección</th>
    <th>Personal de campo</th>
    <th>Dictamen&nbsp;propuesto</th>
  </tr>
  </thead>
  <?php // do { 
  
// $query_orden_inspeccion = sprintf("SELECT * FROM orden_inspeccion WHERE idsolicitud = %s", GetSQLValueString($row_solicitud['idsolicitud'], "int"));
// $orden_inspeccion = mysql_query($query_orden_inspeccion, $emetro) or die(mysql_error());
// $row_orden_inspeccion = mysql_fetch_assoc($orden_inspeccion);
  
// $query_operador = "SELECT * FROM operador where idoperador='".$row_solicitud['idoperador']."'";
// $operador = mysql_query($query_operador, $emetro) or die(mysql_error());
// $row_operador = mysql_fetch_assoc($operador);
  foreach ($row_solicitud as $solicitud):

  ?>
      
    <tr>
    
    
      <td><?php  echo $solicitud->operador; ?><br>
      <?php  echo date("Y-m-d",$solicitud->fecha); ?>
      </td>
      <td>
      
      <form method="post">
<button class="form-control btn btn-primary" name="section_post" value="update_solicitud" type="submit">Solicitud</button>
<input type="hidden" name="idsolicitud" value="<?php echo $solicitud->idsolicitud; ?>">
</form>
      <?php  echo $solicitud->solicitud_tipo; ?>
      
      
      </td>
      
    
      
      
      <td>
      <form method="post">
      <button class="form-control btn btn-primary" name="section_post" value="update" type="submit">Orden</button>
      <input type="hidden" name="idsolicitud" value="<?php  echo $solicitud->idsolicitud; ?>">
      </form>
      </td>
        <td>
      <form method="post" action="<?php echo base_url('Inspector/cMapa') ?>">
      <button class="form-control btn btn-primary" name="section_post" value="update" type="submit">Mapa</button>
      <input type="hidden" name="idsolicitud" value="<?php  echo $solicitud->idsolicitud; ?>">
      </form>
      </td>
      
      <td>
      <form method="post">
      <button class="form-control btn btn-primary" name="section_post" value="update_dictamen" type="submit">Expediente</button>
      <input type="hidden" name="idsolicitud" value="<?php  echo $solicitud->idsolicitud; ?>">
      </form>
      </td>
      
      <td><?php // if($row_orden_inspeccion['autorizacion_fecha']>0){echo date("Y-m-d",$row_orden_inspeccion['autorizacion_fecha']).'<br>'.$row_orden_inspeccion['autorizacion_nombre'];}else{echo 'Por autorizar';}?></td>
      <td><?php  //echo $row_orden_inspeccion['inspeccion_inicio'];?></td>
      <td><?php  //echo $row_orden_inspeccion['inspeccion_fin'];?></td>
      <td>
      <form method="post">
<button class="form-control btn btn-primary" name="section_post" value="ri_cultivo" type="submit">Ver reporte</button>
<input type="hidden" name="MM_insert" value="formaaa"> 
<input type="hidden" name="id" value="<?php echo $solicitud->idsolicitud; ?>">
</form>
      </td>
      <td>
        <table class="table table-responsive table-bordered table-striped table-hover table-condensed" >
          <thead>
          <tr>
            <th>Inspector</th>
            <th>Firma</th>
            <th>Pago</th>
            <th>Reporte</th>
          </tr>
          </thead>
          
<?php // //
// $query_inspeccion = "SELECT * FROM inspeccion where idsolicitud='".$row_solicitud['idsolicitud']."'";
// $inspeccion = mysql_query($query_inspeccion, $emetro) or die(mysql_error());
// //$row_inspeccion = mysql_fetch_assoc($inspeccion);
// while($row_inspeccion = mysql_fetch_assoc($inspeccion)){
// $query_inspector = "SELECT * FROM inspector where idinspector='".$row_inspeccion['idinspector']."'";
// $inspector = mysql_query($query_inspector, $emetro) or die(mysql_error());
// $row_inspector = mysql_fetch_assoc($inspector);
?>
      <tr>
        <td><?php // // echo $row_inspector['nombre'].' '.$row_inspector['apellido'].'<br>'.$row_inspeccion['inspeccion_tipo'];?></td>
        <td><?php // // if($row_inspeccion['firma_fecha']>0){echo date('Y-m-d',$row_inspeccion['firma_fecha']);}else{echo 'No&nbsp;firmado';}?></td>
        <td><?php // if($row_inspeccion['pagado_fecha']>0){echo date('Y-m-d',$row_inspeccion['pagado_fecha']);}else{echo 'No&nbsp;firmado';}?></td>
        <td></td>
      </tr>
<?php // } ?>


        </table>
      </td>
      
      <td>
      <?php // if($row_solicitud['ri_predictamen_fecha']>0){?>
<?php // echo date('Y-m-d',$row_solicitud['ri_predictamen_fecha']);?><br>
<?php // echo $row_solicitud['ri_predictamen_nombre'];?><br>
<?php // echo $row_solicitud['ri_predictamen'];?>
<?php // }else{echo 'No&nbsp;revisado';}?></td>      
    </tr>
    <?php // } while ($row_solicitud = mysql_fetch_assoc($solicitud)); ?>
              <?php endforeach ?>

</table>
</div>


      </div>
    </div>
</div>
