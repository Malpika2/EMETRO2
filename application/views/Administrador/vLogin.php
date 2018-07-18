<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(''); ?> /favicon.ico">

    <title>Inicio de sesión - eMetro</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/'); ?>files/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url('assets/'); ?>files/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/'); ?>files/login.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url('assets/'); ?>files/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <div class="container">

      <form action="<?php echo base_url('Administrador/'); ?>" METHOD="POST" class="form-signin">
        <p class="lead form-signin-heading">Inicio de sesión: <strong>Administradores</strong></p>
        <label><?php if (isset($Mensaje)){ echo $Mensaje;} ?></label>
        <label for="usuario" class="sr-only">Usuario</label>
        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets/'); ?>files/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
