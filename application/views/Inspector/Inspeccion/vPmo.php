<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12  col-md-12 main">
        <form method="post" action="<?php  echo base_url('inspector'); ?>">
          <button type="submit" class="btn btn-success">INICIO</button>
        </form>
          <h1 class="page-header">Metrocert Movil</h1>
          <h3 class="col-lg-12">Captura tu reporte de inspección</h3>


<div id="contenido" class="container col-lg-12">
  <div class="row">
      <!--derecha col-lg-8-->
      <table class="table table-condensed table-bordered table-hover">
       
<?php 
foreach ($row_po_cultivo_pregunta as $po_cultivo_pregunta) {
?>

<?php   if($po_cultivo_pregunta->tipo==1){ ?> 

<tr class="success">
<td colspan="2" align="center">
<h4><?php  echo $po_cultivo_pregunta->texto1;?></h4>
</td>	 
</tr>

<?php  } else if($po_cultivo_pregunta->tipo==2){  ?> 

<tr class="info">
<td colspan="1"><?php  echo $po_cultivo_pregunta->texto1;?></td>	 
<td colspan="1">Conformidad</td>   
</tr>
     

<?php  } elseif($po_cultivo_pregunta->tipo==3){  ?> 
<form target="destino" action="section/inspeccion/guardar_pregunta_pmo.php" method="post" name="form1b" id="<?php echo $po_cultivo_pregunta->idpo_cultivo_pregunta;?>">
<tr>
<td colspan="2"> <?php  echo utf8_decode($po_cultivo_pregunta->texto1);?><br />
<strong>Resp</strong>: <?php echo $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['respuesta']; ?><br />
<strong>Com</strong>: <?php  echo $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['comentario']; ?>
</td>
</tr>
<tr>
<td>
Implementación:
<input class="form-control"type="text" name="implementacion" value="<?php echo $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['implementacion']; ?>" onchange="this.form.submit()"/>
</td>
<td>
Conformidad:<br />
<select name="conformidad"  onchange="this.form.submit()">
  <option value="" >Selecciona</option>
  <option value="CUMPLE" <?php  if (!(strcmp("CUMPLE", $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['conformidad']))) {echo "selected=\"selected\"";} ?>>CUMPLE</option>
  <option value="NO CUMPLE" <?php  if (!(strcmp("NO CUMPLE", $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['conformidad']))) {echo "selected=\"selected\"";} ?>>NO CUMPLE</option>
  <option value="NO APLICA" <?php if (!(strcmp("NO APLICA", $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['conformidad']))) {echo "selected=\"selected\"";} ?>>NO APLICA</option>
</select>
</td>
</tr>
<input type="hidden" name="respuesta" value="<?php  echo $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['respuesta']; ?>" />
<input type="hidden" name="comentario" value="<?php  echo $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['comentario']; ?>" />
<input type="hidden" name="idsolicitud" value="<?php  echo $idsolicitud ?>" />
<input type="hidden" name="idpregunta" value="<?php  echo $po_cultivo_pregunta->idpo_cultivo_pregunta; ?>" />
<input type="hidden" name="MM_insertb" value="form1b" />
</form>
<?php  } else if($po_cultivo_pregunta->tipo==4){  ?> 
<form target="destino" action="section/inspeccion/guardar_pregunta_pmo.php" method="post" name="form1b" id="<?php  echo $po_cultivo_pregunta->idpo_cultivo_pregunta;?>">
<tr>     
<td colspan="2" align="left">
<b><?php  echo utf8_decode($po_cultivo_pregunta->texto1);?></b>
</td>	 
</tr>
	
<?php   }else if($po_cultivo_pregunta->tipo==6){?>
		    
<tr>
<td colspan="1"> <?php echo utf8_decode($po_cultivo_pregunta->texto1);?><br />
Resp:
<?php
$row_po_cultivo_subpregunta;
$var7 = utf8_decode($row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['respuesta']); 

foreach ($row_po_cultivo_subpregunta[$po_cultivo_pregunta->idpo_cultivo_pregunta] as $cultivo_subpregunta) {
$var8 = utf8_decode($cultivo_subpregunta->texto1);

if($var7==$var8){
?>
<?php echo utf8_decode($cultivo_subpregunta->texto1);
}
}
?>

<br />
Com: <?php  echo $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['comentario']; ?>
</td>  
</tr>
<tr>
<td>
Implementación:
<input class="form-control"type="text" name="implementacion" value="<?php  echo $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['implementacion']; ?>" onchange="this.form.submit()"/>
</td>
<td>
Conformidad:<br />
<select name="conformidad" onchange="this.form.submit()">
  <option value="" >Selecciona</option>
  <option value="CUMPLE" <?php  if (!(strcmp("CUMPLE", $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['conformidad']))) {echo "selected=\"selected\"";} ?>>CUMPLE</option>
  <option value="NO CUMPLE" <?php  if (!(strcmp("NO CUMPLE", $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['conformidad']))) {echo "selected=\"selected\"";} ?>>NO CUMPLE</option>
  <option value="NO APLICA" <?php  if (!(strcmp("NO APLICA", $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['conformidad']))) {echo "selected=\"selected\"";} ?>>NO APLICA</option>
</select>
</td>
</tr>
<input type="hidden" name="respuesta" value="<?php  echo $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['respuesta']; ?>" />
<input type="hidden" name="comentario" value="<?php  echo $row_resp[$po_cultivo_pregunta->idpo_cultivo_pregunta]['comentario']; ?>" />
<input type="hidden" name="idsolicitud" value="<?php  echo $idsolicitud?>" />
<input type="hidden" name="idpregunta" value="<?php  echo $po_cultivo_pregunta->idpo_cultivo_pregunta; ?>" />
<input type="hidden" name="MM_insertb" value="form1b" />
</form>
         
<?php } 
} ?>  
<tr><td colspan="3"><hr /></td></tr>


</table>
    
</div>

</div>





		</div>
	</div>
</div>
