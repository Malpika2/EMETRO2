<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>METROCERT SC - EMETRO</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/'); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/');?>files/style.css" rel="stylesheet">
  </head>
  <body>


    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('inicio') ?>">EMETRO</a>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
    
    
    <div class="col-lg-6" align="center">
    <br><br><br><br>
    <p class="lead">
    
    <img src="<?php echo base_url('Images/logo_mto.gif'); ?>" width="150">
   	
    <?php
    $mensaje_sinc=''; //provicional
    if(strlen($mensaje_sinc)){
			?>
      <div class="alert alert-success lead" role="alert"><strong><?php echo $mensaje_sinc;?></strong></div>
      <?php
			}?>
     
<?php if(isset($mensaje)){?>
<br><br>      
<br><br>
<div class="col-lg-4">
<form action="<?php echo $loginFormAction; ?>" method="POST" class="form-signin">
<p class="lead form-signin-heading"><strong><? echo $mensaje;?></strong><br><br>Inicio de sesi&oacute;n: <strong>Operadores</strong></p>        
<label for="usuario2" class="sr-only">Usuario</label>
<input type="text" name="usuario2" id="usuario" class="form-control" placeholder="Usuario" required autofocus value="<? echo $_POST['usuario']; ?>">
<label for="password2" class="sr-only">Password</label>
<input type="password" name="password2" id="password" class="form-control" placeholder="Password" required value="<? echo $_POST['password']; ?>">
<button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar</button>
</form>
</div>

<?php }else{?><br><br><br><br>
      
      
      
<p class="lead">Selecciona un tipo de usuario para iniciar sesi&oacute;n</p>
      <ul style="list-style: none;">
      <li><h3><a href="inspector/">Inspector</a></h3></li>
      <li><h4><a href="actualizar">Actualizar datos de usuarios</a></h4></li>
      </ul>
      
      
<? }?>
      
      </div>
      
      
      
</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
