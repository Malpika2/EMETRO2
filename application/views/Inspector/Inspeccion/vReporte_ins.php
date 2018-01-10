<div class="col-sm-12  col-md-10 main">
    <h1 class="page-header">Inspección</h1>
  <form method="post" action="<?php echo base_url('inspector'); ?>">
      <button type="submit" class="btn btn-primary">Ver Todas</button>
  </form><br>
  <h3 class="col-lg-12">Captura tu reporte de inspección</h3>

<iframe width="1" height="1" src="secciones/inicio.php" name="destino"  frameborder="0"></iframe>
   
      <!--derecha col-lg-8-->
<table class="table table-condensed table-bordered table-hover">
  <tbody>
<?php 
foreach ($row_inspeccion_reporte_pregunta as $inspeccion_reporte_pregunta){

 ?>

<?php if($inspeccion_reporte_pregunta->tipo==1){ ?> 

<tr class="success">
<td colspan="2" align="center">
<h4> <?php  echo $inspeccion_reporte_pregunta->texto1;?></h4>
</td>  
</tr>

<?php } else if($inspeccion_reporte_pregunta->tipo==2){  ?> 
<form target="destino"  action="<?php echo base_url('Inspector/R_ins/guardar_pregunta2') ?>" method="post">
  <tr>
    <td colspan="1"><?php  echo utf8_decode($inspeccion_reporte_pregunta->texto1);?></td>  
    <td rowspan="2" class="warning">
      <select   onchange="this.form.submit()" class="form-control" name="respuesta">
        <option  value="" >Selecciona</option>
        <option value="CUMPLE" <?php  if (!(strcmp("CUMPLE", htmlentities($row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>CUMPLE</option>
        <option value="NO CUMPLE" <?php  if (!(strcmp("NO CUMPLE", htmlentities($row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO CUMPLE</option>
        <option value="NO APLICA" <?php if (!(strcmp("NO APLICA", htmlentities($row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO APLICA</option>
      </select>
    </td>
  </tr>
  <tr>
  <td colspan="1" class="warning"> 
    <input class="form-control" type="text" name="observacion" value="<?php  echo $row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['observacion']; ?>" placeholder="Observacion" onchange="this.form.submit()" />
    <input type="hidden" name="idsolicitud" value="<?php  echo $idSolicitud?>" />
    <input type="hidden" name="idinspeccion_reporte_pregunta" value="<?php echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta; ?>" />
    <input type="hidden" name="MM_insert" value="form1" />
  </td>  
</tr>
</form>   

<?php } else if($inspeccion_reporte_pregunta->tipo==3){ ?> 
<form target="destino" action="<?php echo base_url('Inspector/R_ins/guardar_pregunta2') ?>" name="<?php echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta;?>" method="post" id="<?php echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta;?>" > 
  <tr class="info">
    <td colspan="1">3<?php  echo utf8_decode($inspeccion_reporte_pregunta->texto1);?></td>   
    <td  rowspan="2" class="warning">
      <select  onchange="this.form.submit()" class="form-control" name="respuesta">
        <option value="" >Selecciona</option>
        <option value="CUMPLE" <?php  if (!(strcmp("CUMPLE", htmlentities($row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>CUMPLE</option>
        <option value="NO CUMPLE" <?php  if (!(strcmp("NO CUMPLE", htmlentities($row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO CUMPLE</option>
        <option value="NO APLICA" <?php  if (!(strcmp("NO APLICA", htmlentities($row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['respuesta'], ENT_COMPAT, '')))) {echo "SELECTED";} ?>>NO APLICA</option>
      </select>

                <input type="hidden" name="idinspeccion_reporte_pregunta" value="<?php  echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta; ?>" />
            <input type="hidden" id="observacion" name="observacion" value="<?php  echo $row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['observacion']; ?>"/>

    </td>
  </tr>
  <tr class="info">
    <td> 
<?php  
 if(strlen($inspeccion_reporte_pregunta->direccion_formulario)>0){ ?>
    <table align="center" class="table table-bordered table-condensed">
      <tr class="warning">
        <td width="1">Nº</td>
        <td>No conformidad</td>
        <td>Acción correctiva propuesta</td>
        <td>Origen</td>
        <td>Situación encontrada</td>
      </tr>
        <?php 
        $conti=0; 
        foreach ($row_inspeccion_accion_correctiva_previa as $inspeccion_correctiva) {
        $conti++;
        ?>
        <form target="destino"  action="<?php echo base_url('Inspector/R_ins/guardar_pregunta2') ?>" name="33<?php echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta;?>" method="post" id="33<?php echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta;?>">
      <tr>
          <td colspan="1"><?php echo utf8_decode($inspeccion_correctiva->no_conformidad);?></td>
          <td><?php echo utf8_decode($inspeccion_correctiva->accion_correctiva_previa);?></td>
          <td><?php echo utf8_decode($inspeccion_correctiva->origen);?></td>

          <td>
            <textarea onchange="this.form.submit()" name="situacion_encontrada" class="form-control"><? echo $inspeccion_correctiva->situacion_encontrada;?></textarea>
            <input type="hidden" name="idsolicitud" value="<?php echo $idSolicitud; ?>" />
            <input type="hidden" name="idinspeccion_accion_correctiva_previa" value="<?php echo $inspeccion_correctiva->idinspeccion_accion_correctiva_previa; ?>" />
            <input type="hidden" name="update_accion_correctiva" value="1" />
          </td>
      </tr>
          </form>
        <?php } //end foreach?>
    </table>
<?php } //fin if ?>
        <strong>Escribe tus observaciones aquí:</strong>
        <form target="destino"  action="<?php echo base_url('Inspector/R_ins/guardar_pregunta2Observacion') ?>" method="post">
          <input id="observacions" onchange="pasarValor(),this.form.submit()" class="form-control" type="text" name="observacion" value="<?php  echo $row_inspeccion_reporte_respuesta[$inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta]['observacion']; ?>" placeholder="Observación"/>
          <input type="hidden" name="idsolicitud" value="<?php echo $idSolicitud ?>" />
          <input type="hidden" name="idinspeccion_reporte_pregunta" value="<?php  echo $inspeccion_reporte_pregunta->idinspeccion_reporte_pregunta; ?>" />
          <input type="hidden" name="MM_insert" value="form1" />
        </form>
      </td> 
    </tr>
    </form>
     
<?php   } //fin if =3 
?>  
<?php } ?>
</tbody>
</table>
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
  </div>
</div>
<script type="text/javascript">
  pasarValor = function (){
    $var = $('#observacions').val();
    $('#observacion').val($var);
  }
</script>