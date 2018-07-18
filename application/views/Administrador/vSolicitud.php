<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h3 class="page-header">Solicitudes de inspección</h3>
  <form method="post" class="form col-lg-2">
    <button class="form-control btn btn-primary" name="section_post" value="view" type="submit">VER TODO</button>
    </form>
    <form method="post" class="form col-lg-2">
    <button class="form-control btn btn-success" name="section_post" value="insert" type="submit">AGREGAR</button>
  </form>
  <h4 class="col-lg-12">Listado de solicitudes</h4>

  <table class="table table-bordered table-striped table-hover table-condensed">
<thead>
  <tr>
    <th colspan="2" valign="middle">Consultar formato digital</th>
    <th valign="middle">Datos de responsable</th>
    <th valign="middle">Firma</th>
    <th valign="middle">Revisión</th>
    <th colspan="3" valign="middle">Plan orgánico</th>
    <th colspan="2" valign="middle">Pagado<br><small>(!Necesario para orden de inspección)</small></th>
  </tr>
  </thead>
  <?php
  foreach ($row_solicitudes as $row_solicitud) {
  ?>
    <tr>
    <td colspan="1">
<form method="post">
<button class="form-control btn btn-primary glyphicon glyphicon-pencil" name="section_post" value="update" type="submit"></button>
<input type="hidden" name="idsolicitud" value="<?php echo $row_solicitud->idsolicitud; ?>">
<div><h2></h2></div>
</form>
   </td>
    <td colspan="1">
    <?php if (isset($row_operador[$row_solicitud->idsolicitud]->operador)) {
       echo $row_operador[$row_solicitud->idsolicitud]->operador; 
    } ?><br>
    <i><?php echo date("Y-m-d",$row_solicitud->fecha); ?></i><br>
    <?php echo $row_solicitud->solicitud_tipo; ?>
  </td>
    <td>
    <?php echo $row_solicitud->rc_nombre; ?><br>
    <?php echo $row_solicitud->rc_telefono; ?><br>
    <?php echo $row_solicitud->rc_email; ?></td>
    <td><?php if($row_solicitud->firma_fecha>0){echo date("Y-m-d",$row_solicitud->firma_fecha);}else{echo 'Sin datos';}echo '<br>'.$row_solicitud->firma_nombre; ?></td>
      <td><?php if($row_solicitud->revision_fecha>0){echo date("Y-m-d",$row_solicitud->revision_fecha);}else{echo 'Sin datos';} echo '<br>'.$row_solicitud->revision_nombre; ?></td>
      <td>
<form method="post">
<button class="form-control btn btn-primary glyphicon glyphicon-pencil" name="section_post" value="po_cultivo" type="submit"></button>
<input type="hidden" name="MM_insert" value="formaaa"> 
<input type="hidden" name="id" value="<?php echo $row_solicitud->idsolicitud; ?>">
</form>
      </td>
      <td colspan="2"><?php if($row_solicitud->po_firma_fecha>0){echo date("Y-m-d",$row_solicitud->po_firma_fecha);}else{echo 'PO no firmado';}
      if(strlen($row_solicitud->po_firma_nombre)>0){echo '<br>'.$row_solicitud->po_firma_nombre; }?><br>
      Dictamen: <?php echo $row_solicitud->po_dictamen_nombre; ?><br>
      <?php if($row_solicitud->po_dictamen_fecha>0){echo date("Y-m-d",$row_solicitud->po_dictamen_fecha);}else{echo 'PO sin dictamen';}echo '<br>'. utf8_decode($row_solicitud->po_dictamen_conformidad); ?>
      </td>
      <td>      
      <?php if(strlen($row_solicitud->pagado_fecha)>0){?>
      Registrado: <?php echo date("Y-m-d",$row_solicitud->pagado_fecha);?>
      <?php }else{?>
      <form method="post" action="">
      <button type="submit" class="btn btn-success">Pagado</button>
      <input type="hidden" name="idsolicitud" value="<?php echo $row_solicitud->idsolicitud; ?>">
      <input type="hidden" name="solicitud_pagado" value="true">
      </form>
      <?php }?>
      
      </td>
      
      <?php if($row_usuario->delete_solicitud){?>
      <td width="1">
      <form method="post" action="">
      <button type="submit" class="btn btn-danger">X</button>
      <input type="hidden" name="idsolicitud" value="<?php echo $row_solicitud->idsolicitud; ?>">
      <input type="hidden" name="delete_solicitud" value="true">
      </form>
      </td>
      <?php }?>
      
    </tr>
    <?php }?>
</table>
</div>