<div id="cuerpo" class="col-lg-10" >
	  <h1 class="page-header">Inspección</h1>
  <form method="post" action="<?php echo base_url('inspector'); ?>">
      <button type="submit" class="btn btn-primary">Ver Todas</button>
  </form><br>
  <h3>Expediente y Dictamen</h3>
  <div class="panel panel-default">
    <div class="panel-body col-lg-12">
		<div class="panel panel-danger">
    	<div class="panel-heading">
        	<a name="seccion6"></a>
        	<h3 class="panel-title">EXPEDIENTE DETALLE - PERSONAL MTO AUTORIZADO</h3>
    	</div>
    	<div class="panel-body">
      <table class="table table-bordered">
      	<thead>
		<tr>
			<form action="<?php echo base_url('Inspector/Expediente'); ?>" method="post" enctype="multipart/form-data" >
			<th colspan="2" valign="top">Expediente detalle - Agregar archivo:<?php echo "<small'>".$mensajeUpload."</small>"; ?></small></th>
			<tr>
				<th valign="top">	
					<input type="hidden" name="upload_expediente_detalle" value="1" />
					<input type="hidden" name="actualizar" value="1" />
					<input class="form-control" name="nota" type="text" id="nota" placeholder="Escribe una nota" />
				</th>
				<th>
	  				<input class="form-control" type="file" name="DOC" id="DOC" style="padding: 0px" />
				</th>
				<th width="1">
					<input class="form-control btn btn-primary" type="submit" name="button" id="button" value="Cargar archivo" />
					<input type="hidden" name="idsolicitud" value="<?php echo $row_solicitud->idsolicitud; ?>" />
					<input type="hidden" name="section_post" value="subir_archivo" />
				</th>
	      	</tr>
	      	</form>
      	</tr>
      	</thead>
      	<tbody>
      		<tr>
      			<th>Archivo, clic para descarga</th>
      			<th>Cargado por</th>
      			<th>Nota</th>
      		</tr>
	    	<?php if($totalRows_expediente==0){ ?>
	      	<tr class="warning">
	      		<td colspan="3">No se encontraron registros</td>
	      	</tr>
	      	<?php } ?>
	      	<?php /*/*while($row_expediente = mysql_fetch_assoc($expediente)){*/ 
	      		foreach ($row_expedienteD as $expediente) {
	      	?>
	      	<tr>
	      		<td><a href="<?php echo base_url('Uploads/operador_expediente_detalle/'.$expediente->url); ?>" target="_blank"><?php echo $expediente->url; ?></a></td>
	      		<td><?php echo $expediente->nombre_carga; ?>, 
				<?php if($expediente->fecha_carga>0){echo date("d-m-Y",$expediente->fecha_carga);} ?></td>
	      		<td><?php echo $expediente->nota; ?></td>
      			<td><?php //opcion eliminar ?>
					<form action="<?php echo base_url('inspector/Expediente') ?>" method="post" enctype="multipart/form-data" >
						<input type="hidden" name="eliminar_expediente_detalle" value="1" />
						<input type="hidden" name="idexpediente_detalle" value="<?php echo $expediente->idexpediente_detalle  ?>" />
						<input type="hidden" name="archivo" value="<?php echo 'Uploads/operador_expediente_detalle/'.$expediente->url; ?>" />
						<input type="hidden" name="idsolicitud" value="<?php echo $row_solicitud->idsolicitud; ?>" />
						<input type="hidden" name="section_post" value="Eliminar" />
						<input class="btn btn-danger" type="submit" name="button" id="button" value="Eliminar" />
		          </form>
      			</td>
      
      		</tr>
      		<?php } ?>
      	</tbody>
	</table>
    </div>
	</div>  
		<table class="table table-bordered">
			<thead>
				<tr class="info">
					<th colspan="2">Expediente</th>
				</tr>
			</thead>
			<tbody>
				<tr class="active">
					<th>Maestro</th>
					<th>Detalle</th>
				</tr>
        		<tr>
        			<td>
				      <table class="table table-bordered">
				      <tr>
				      	<th>Archivo</th>
				      	<th>Nota</th>
				      </tr>
				      <?php /*while($row_expediente = mysql_fetch_assoc($expediente)){*/ 
				      	foreach ($row_expedienteM as $expediente) {
				      ?>
				      <tr>
				      	<td><a href="operador_expediente_maestro/<?php echo $expediente->fecha_carga.$expediente->url; ?>" target="_blank"><?php echo $expediente->url; ?></a></<br />
				      Cargado por: <?php echo $expediente->nombre_carga; ?>, <?php if($expediente->fecha_carga>0){echo date("d-m-Y",$expediente->fecha_carga);}?></td>
				      	<td><?php echo $expediente->nota;?></td>
				      </tr>
				      <?php } ?>
				      </table>
        			</td>
        			<td>
        
        <?php /*
        $query_expediente = "SELECT * FROM expediente_detalle where idsolicitud='".$row_solicitud['idsolicitud']."'";
$expediente = mysql_query($query_expediente, $emetro) or die(mysql_error());
//$row_expediente = mysql_fetch_assoc($expediente);	*/
			?>
				      <table class="table table-bordered">
				      <tr>
				      	<th>Archivo</th>
				      	<th>Nota</th>
				      </tr>
				      <?php 
				      	/* while($row_expediente = mysql_fetch_assoc($expediente)){ */ 
				      	foreach ($row_expedienteM as $expediente) {
				      	?>
				      <tr>
				      	<td><a href="../operador_expediente_detalle/<?php echo $expediente->fecha_carga.$expediente->url; ?>" target="_blank"><?php echo $expediente->url; ?></a><br />
				      	Cargado por: <?php echo $expediente->nombre_carga;?>, <?php if($expediente->fecha_carga>0){echo date("d-m-Y",$expediente->fecha_carga);} ?></td>
				      	<td><?php echo $expediente->nota; ?></td>
				      </tr>
				      <?php } ?>
				      </table>
      
        			</td>
        		</tr>
			</tbody>
		</table> 
      </div>
	</div>
</div>
  
  
  
  
  
  
  
  