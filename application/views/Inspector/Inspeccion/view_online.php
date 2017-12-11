<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12  col-md-12 main">
        <form method="post" action="<?php echo base_url('inspector'); ?>">
          <button type="submit" class="btn btn-success">INICIO</button>
        </form>
          <h1 class="page-header">Metrocert Movil</h1>
				<div class="alert alert-success lead" role="alert"><strong>Conexión</strong> a metrocert.mx establecida!</div>
				<form method="post" action="">
				<button type="submit" class="btn btn-success">INSPECCIONES DESCARGADAS</button>
				</form>
				<br>
				<table class="table table-bordered table-striped table-hover table-condensed" >
				<thead>
				  <tr>
				    <th colspan="4">Inspecciónes asignadas</th>
				  </tr>
				</thead>
				<tbody>
				    <tr>
				    <?php
				    foreach ($row_Solicitudes_online as $solicitud_online) {
				    	if ($row_orden_inspeccion_online[$solicitud_online->idsolicitud]->autorizacion_fecha > 1) {
				      ?>
				    
				    	<td><?php echo $row_operador_online[$solicitud_online->idsolicitud]->operador; ?><br>
							<?php echo date("Y-m-d",$solicitud_online->fecha); ?></td>
				      <td><?php echo $solicitud_online->solicitud_tipo; ?></td>
				      <td>Inspección autorizada:<br><?php echo date("Y-m-d",$row_orden_inspeccion_online[$solicitud_online->idsolicitud]->autorizacion_fecha); ?></td>
				      </td>

				      <td>
				      <a href="<?php echo base_url('Inspector/Inspecciones/Descargar/').$solicitud_online->idsolicitud; ?>">Descargar</a>
				      </td>
				          
				    </tr>
				    <?php } } ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>