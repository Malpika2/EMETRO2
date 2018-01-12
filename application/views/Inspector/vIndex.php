
<div class="col-md-10 col-sm-10">
    <div class="row">
      <div class="col-sm-12  col-md-12 main">
          <h1 class="page-header">Inspección</h1>
        <br>
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover table-condensed table-responsive">
<thead>
  <tr>
    <th colspan="5">Orden de inspección</th>
    <th>Autorización</th>
    <th colspan="2">Fecha&nbsp;de&nbsp;inspección</th>
    <th>Reporte&nbsp;inspección</th>
    <th>Personal de campo</th>
    <th>Dictamen&nbsp;propuesto</th>
  </tr>
  </thead>
  <?php
  foreach ($row_solicitud as $solicitud):
  ?>
      
    <tr>
    
    
      <td><?php  echo $solicitud->operador; ?><br>
      <?php  echo date("Y-m-d",$solicitud->fecha); ?>
      </td>
      <td>
      
      <form method="post" action="<?php echo base_url('Inspector/solicitud') ?>">
<button class="form-control btn btn-primary" name="section_post" value="update_solicitud" type="submit">Solicitud</button>
<input type="hidden" name="idsolicitud" value="<?php echo $solicitud->idsolicitud; ?>">
</form>
      <?php  echo $solicitud->solicitud_tipo; ?>
      
      
      </td>
      
    
      
      
      <td>
      <form method="post" action=" <?php echo base_url('Inspector/Inspecciones'); ?>">
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
      <form method="post" action="<?php echo base_url('Inspector/Expediente'); ?>">
      <button class="form-control btn btn-primary" name="section_post" value="update_dictamen" type="submit">Expediente</button>
      <input type="hidden" name="idsolicitud" value="<?php  echo $solicitud->idsolicitud; ?>">
      </form>
      </td>
      
      <td>
        <?php if ($row_orden_inspeccion[$solicitud->idsolicitud]['autorizacion_fecha']>0) {
          echo date("Y-m-d",$row_orden_inspeccion[$solicitud->idsolicitud]['autorizacion_fecha']).'<br>'.$row_orden_inspeccion[$solicitud->idsolicitud]['autorizacion_nombre'];
        }else{
          echo 'Por Autorizar';
        } ?>
      </td>
      <td><?php  echo $row_orden_inspeccion[$solicitud->idsolicitud]['inspeccion_inicio'];?></td>
      <td><?php  echo $row_orden_inspeccion[$solicitud->idsolicitud]['inspeccion_fin'];?></td>
      <td>
      <form method="post" action="<?php echo base_url('Inspector/R_ins') ?>">
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
          
<?php
foreach ($row_inspeccion[$solicitud->idsolicitud] as $inspeccion) {
?>
      <tr>
        <td><?php  echo $inspeccion->nombre.' '.$inspeccion->apellido.'<br>'.$inspeccion->inspeccion_tipo;?></td>
        <td><?php  if($inspeccion->firma_fecha>0){echo date('Y-m-d',$inspeccion->firma_fecha);}else{echo 'No&nbsp;firmado';}?></td>
        <td><?php  if($inspeccion->pagado_fecha>0){echo date('Y-m-d',$inspeccion->pagado_fecha);}else{echo 'No&nbsp;firmado';}?></td>
        <td></td>
      </tr>
<?php  } ?>


        </table>
      </td>
      
      <td>
      <?php  if($solicitud->ri_predictamen_fecha>0){?>
<?php  echo date('Y-m-d',$solicitud->ri_predictamen_fecha);?><br>
<?php  echo $solicitud->ri_predictamen_nombre;?><br>
<?php  echo $solicitud->ri_predictamen;?>
<?php  }else{echo 'No&nbsp;revisado';}?></td>      
    </tr>
              <?php endforeach ?>

</table>
</div>


      </div>
    </div>
</div>
