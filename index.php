<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="estilo_login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <script src="jquery.js" charset="utf-8"></script>
  </head>
  <body>

<form class="Formu" action="login.php" method="post">
<h1 class="F_titulo"> INICIAR SESIÓN </h1>

<div class="F_posi">
<input type="text" class="F_input" name="user" autofocus value="">
<label for="" class="F_label"><i class="fas fa-user-shield"></i> USUARIO</label>
</div>
<div class="F_posi">
<input type="password" class="F_input" name="pass" value="">
<label for="" class="F_label"><i class="fas fa-key"></i> CONTRASEÑA</label>
</div>
<?php
session_start();
if ($_SESSION['mensaje']=="1") {?>
<div class="mensaje">
  <label> USUARIO O CONTRASEÑA INCORRECTOS </label>
</div>
<?php $_SESSION['mensaje']=0;  } ?>
<?php
if ($_SESSION['mensaje']=="2") {?>
<div class="mensaje">
  <label> ESTE USUARIO YA NO TIENE ACCESO AL SISTEMA </label>
</div>
<?php $_SESSION['mensaje']=0;  } ?>
<input type="submit" class="F_boton" name="" value="INGRESAR">
</form>

<script src="efecto_login.js" charset="utf-8"></script>

  </body>
</html>
