<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="iso-8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>METROCERT SC - EMETRO</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/'); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url('assets/');?>files/style.css" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">EMETRO</a>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
    
    
    <div class="col-lg-6" align="center">
    <br><br><br><br>
    <p class="lead">
    
    <img src="img/logo_mto.gif" width="150">
    
    <br><br>
    Para solicitar tu inspecci&oacute;n, puedes realizar tu registro a continuaci&oacute;n:<br>
    <?php /*<small>(Si ya cuentas con registro da <a href="operador/"><strong>clic aqu&iacute;</strong></a> para iniciar sesi&oacute;n)</small> */?><br>
    
    formulario
    </p>
    <form method="post" name="form1" action="<?php ?>">
      <table align="center">
        <tr valign="baseline">
          <td class="lead" valign="middle" nowrap align="right">Nombre/Empresa*:</td>
          <td><input required class="form-control" type="text" name="operador" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td class="lead" valign="middle" nowrap align="right">Municipio:</td>
          <td><input class="form-control" type="text" name="municipio" value="Morelia" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td class="lead" valign="middle" nowrap align="right">Entidad federativa*:</td>
          <td><input required class="form-control" type="text" name="entidad_federativa" value="Michoac·n"></td>
        </tr>
        <tr valign="baseline">
          <td class="lead" valign="middle" nowrap align="right">Pa&iacute;s*:</td>
          <td><input required class="form-control" type="text" name="pais" value="MÈxico"></td>
        </tr>
        <tr valign="baseline">
          <td class="lead" valign="middle" nowrap align="right">Tel&eacute;fono*:</td>
          <td><input required class="form-control" type="text" name="telefono" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td class="lead" valign="middle" nowrap align="right">Email*:</td>
          <td><input required class="form-control" type="email" name="email" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">&nbsp;</td>
          <td><input disabled="true" class="btn btn-primary form-control" type="submit" value="Registrarme"></td>
        </tr>
      </table>
      <input type="hidden" name="permiso" value="1">
      <input type="hidden" name="clase" value="OPERADOR">
      <input type="hidden" name="MM_insert" value="form1">
    </form>
    <p>&nbsp;</p>
    </div>
    <div class="col-lg-6">
    
      <br><br>
      <br><br>      
      <br><br>
      
<?php if(isset($mensaje)){?>

<br><br>
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
      <ul>
      <li>
      <h3><a href="Administrador/">Administrador</a></h3>
      </li>
      <?php /*<li><h3><a href="#">Operador</a></h3></li>*/?>
      <li><h3><a href="inspector/">Inspector</a></h3></li>
      </ul>
      
      
<? }?>
      
      </div>
      
      
      
</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
