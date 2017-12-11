<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12  col-md-12 main">
        <form method="post" action="<?php echo base_url('inspector'); ?>">
          <button type="submit" class="btn btn-success">INICIO</button>
        </form>
          <h1 class="page-header">Metrocert Movil</h1>
          	<h3 class="col-lg-12">Captura tu reporte de inspección</h3>

 


<iframe width="1" height="1" src="secciones/inicio.php" name="destino"  frameborder="0"></iframe>
   
      <!--derecha col-lg-8-->
      <table class="table table-condensed table-bordered table-hover">
       
<?php // // while ($row_inspeccion_reporte_pregunta = mysql_fetch_assoc($inspeccion_reporte_pregunta)) { 
		////////////////////
//consultas en la parte de abajo

//mysql_select_db($database_emetro, $emetro);


// $query_resp = "SELECT * FROM inspeccion_reporte_respuesta WHERE idsolicitud='".$_POST['id']."'&& idinspeccion_reporte_pregunta='".$row_inspeccion_reporte_pregunta['idinspeccion_reporte_pregunta']."'";
// $resp = mysql_query($query_resp, $emetro) or die(mysql_error());
// $row_resp = mysql_fetch_assoc($resp); 
// $totalRows_resp = mysql_num_rows($resp);


////////////


foreach ($row_inspeccion_reporte_pregunta as $inspeccion_reporte_pregunta){

 ?>

<?php if($inspeccion_reporte_pregunta->tipo==1){ ?> 

<tr class="success">
<td colspan="2" align="center">
<h4><?php  echo $inspeccion_reporte_pregunta->texto1;?></h4>
</td>	 
</tr>

<?php } else if($inspeccion_reporte_pregunta->tipo==2){  ?> 

<tr >
<td colspan="1"><?php  echo utf8_decode($inspeccion_reporte_pregunta->texto1);?></td>	 
<form target="destino"  action="section/inspeccion/guardar_pregunta2.php" name="<?php  echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta;?>" method="post" id="<?php echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta;?>">
<td rowspan="2" class="warning">
<select   onchange="this.form.submit()" class="form-control" name="respuesta">
<option  value="" >Selecciona</option>
<option value="CUMPLE" <?php  if (!(strcmp("CUMPLE", htmlentities($row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>CUMPLE</option>
<option value="NO CUMPLE" <?php  if (!(strcmp("NO CUMPLE", htmlentities($row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO CUMPLE</option>
<option value="NO APLICA" <?php if (!(strcmp("NO APLICA", htmlentities($row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO APLICA</option>
</select>
</td>
<tr>
<td colspan="1" class="warning"> 
	<?php // echo json_encode($row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]);
		//echo "</br>___";
		// echo $row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]["respuesta"];
	 ?>
<input class="form-control" type="text" name="observacion" value="<?php  echo $row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['observacion']; ?>" placeholder="Observacion" onchange="this.form.submit()" />
<input type="hidden" name="idsolicitud" value="<?php  echo $idSolicitud?>" />
<input type="hidden" name="idinspeccion_reporte_pregunta" value="<?php echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta; ?>" />
<input type="hidden" name="MM_insert" value="form1" />
</td>  
</form>
</tr>
     

<?php } else if($inspeccion_reporte_pregunta->tipo==3){  ?> 

<tr class="info">
<td colspan="1"><?php  echo utf8_decode($inspeccion_reporte_pregunta->texto1);?></td>	 
<form target="destino" action="section/inspeccion/guardar_pregunta2.php" name="<?php echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta;?>" method="post" id="<?php echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta;?>"> 
<td  rowspan="2"class="warning">
<select  onchange="this.form.submit()" class="form-control" name="respuesta">
<option value="" >Selecciona</option>
<option value="CUMPLE" <?php  if (!(strcmp("CUMPLE", htmlentities($row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>CUMPLE</option>
<option value="NO CUMPLE" <?php  if (!(strcmp("NO CUMPLE", htmlentities($row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO CUMPLE</option>
<option value="NO APLICA" <?php  if (!(strcmp("NO APLICA", htmlentities($row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO APLICA</option>
</select>
</td>
<tr class="info">
<td colspan="1"> 

<? 
 if(strlen($inspeccion_reporte_pregunta->direccion_formulario)>0){ ?>
 	   <table align="center" class="table table-bordered table-condensed">
    <tr class="warning">
    <td width="1">No</td>
    <td>No conformidad</td>
    <td>Acción correctiva propuesta</td>
    <td>Origen</td>
    <td>Situación encontrada</td>
    </tr>
    
<?php 

$conti=0; 
// while($row_inspeccion_accion_correctiva_previa = mysql_fetch_assoc($inspeccion_accion_correctiva_previa)){
foreach ($row_inspeccion_accion_correctiva_previa as $inspeccion_correctiva) {
$conti++;
?>

<tr>
<form target="destino"  action="section/inspeccion/guardar_pregunta2.php" name="33<?php echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta;?>" method="post" id="33<?php echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta;?>">

<td><?php echo $conti;?></td>
<td colspan="1"><?php echo utf8_decode($inspeccion_correctiva->no_conformidad);?></td>
<td><?php echo utf8_decode($inspeccion_correctiva->accion_correctiva_previa);?></td>
<td><?php echo utf8_decode($inspeccion_correctiva->origen);?></td>

<td>

<textarea onchange="this.form.submit()" name="situacion_encontrada" class="form-control"><? echo $inspeccion_correctiva->situacion_encontrada;?></textarea>
<input type="hidden" name="idsolicitud" value="<?php echo $idSolicitud; ?>" />
<input type="hidden" name="idinspeccion_accion_correctiva_previa" value="<?php echo $inspeccion_correctiva->idinspeccion_accion_correctiva_previa; ?>" />
<input type="hidden" name="update_accion_correctiva" value="1" />
</td>
</form>
  
</tr>
<?php }?>

</table>

<?php } //fin if
?>
<strong>Escribe tus observaciones aquí:</strong>
<input class="form-control" type="text" name="observacion" value="<?php  echo $row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['observacion']; ?>" placeholder="Observación" onchange="this.form.submit()" />
<input type="hidden" name="idsolicitud" value="<?php  echo $idSolicitud ?>" />
<input type="hidden" name="idinspeccion_reporte_pregunta" value="<?php  echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta; ?>" />
<input type="hidden" name="MM_insert" value="form1" />
</td> 
</form> 
</tr>
         
<?php   } //fin if =3 
}//fin foreach ?>  

<?php // ?>

</td></tr>
</table>
</div>
</div>





      </div>
  </div>
</div>