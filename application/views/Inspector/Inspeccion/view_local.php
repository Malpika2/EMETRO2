<div class="container-fluid">
    <div class="row">
      <div class="col-sm-12  col-md-12 main">
        <form method="post" action="<?php echo base_url('inspector'); ?>">
          <button type="submit" class="btn btn-success">INICIO</button>
        </form>
          <h1 class="page-header">Metrocert Movil</h1>
        <form method="post" action="<?php echo base_url('inspector'); ?>">
          <input type="hidden" name="online" id="online" value="1">
          <button type="submit" class="btn btn-primary">INSPECCIONES ASIGNADAS</button>
        </form>
        <br>
        <table class="table table-bordered table-striped table-hover table-condensed" >
          <thead>
            <tr>
              <thead>
                <th colspan="6">Inspecciónes descargadas</th>
              </thead>
            </tr>
          </thead>
          <tbody>
            
                    <?php
        foreach ($row_Solicitudes as $solicitud) {
          if ($row_orden_inspeccion[$solicitud->idsolicitud]['autorizacion_fecha'] > 1) {?>
          <tr>
    
    
      <td><?php echo $solicitud->idsolicitud; ?>
        <?php echo $row_operador[$solicitud->idsolicitud]->operador; ?><br>
      <?php echo date("Y-m-d",$solicitud->fecha); ?><br>
      <?php echo $solicitud->solicitud_tipo; ?>
      </td>
      <td>
      
      <form method="post" action="<?php echo base_url('Inspector/solicitud');?>">
      <input type="hidden" name="idsolicitud" value="<?php echo $solicitud->idsolicitud; ?>">
      <button class="form-control btn btn-info" name="section_post" value="update_solicitud" type="submit">Solicitud</button>
      </form>
      <form method="post" action="<?php echo base_url('Inspector/Inspecciones') ?>">
      <button class="form-control btn btn-info" name="section_post" value="update" type="submit">Inspección</button>
      <input type="hidden" name="idsolicitud" value="<?php echo $solicitud->idsolicitud; ?>">
      </form>
      </td>
      
      <td>
      <form method="post" action="<?php echo base_url('Inspector/Pmo'); ?>">
<button class="form-control btn btn-primary" name="section_post" value="ri_cultivo" type="submit">PMO</button>
<input type="hidden" name="MM_insert" value="formaaa"> 
<input type="hidden" name="pmo" value="1"> 
<input type="hidden" name="id" value="<?php echo $solicitud->idsolicitud; ?>">
</form>
      </td>
      
      <td>
      <form method="post" action="<?php echo base_url('Inspector/R_ins'); ?>">
<button class="form-control btn btn-primary" name="section_post" value="ri_cultivo" type="submit">REPORTE INS</button>
<input type="hidden" name="MM_insert" value="formaaa"> 
<input type="hidden" name="id" value="<?php echo $solicitud->idsolicitud; ?>">
</form>
      </td>
      
<!--       <td>
      <form method="post">
<button class="form-control btn btn-default" name="section_post" value="ri_cultivo" type="submit">Estado</button>
<input type="hidden" name="MM_insert" value="formaaa"> 
<input type="hidden" name="id" value="<?php echo $solicitud->idsolicitud; ?>">
</form>
      </td> -->
      
      <td>
      <a href="index.php?online=0&enviar=1&idsolicitud=<?php echo $solicitud->idsolicitud; ?>">Enviar</a>
      </td>
      
          
    </tr>   
<?php
          }
        }
        ?>
          </tbody>
        </table>

      </div>
    </div>
</div>
