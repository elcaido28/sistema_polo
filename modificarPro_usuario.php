<?php
 include('conexion.php');

$id=$_REQUEST['id'];
 $nombre=$_POST['nombre'];
 $apellido=$_POST['apellido'];
 $cedula=$_POST['cedula'];
 $celular=$_POST['celular'];
 $nomusu=$_POST['nomusu'];
 $clave=$_POST['clave'];
 $privilegio=$_POST['privilegio'];
 $estado=$_POST['estado'];

$ingreso=mysqli_query($con,"UPDATE usuarios SET id_usuario='$id',nombres='$nombre',apellidos='$apellido',cedula='$cedula',telefono='$celular',nomusu='$nomusu',contrasena='$clave',tipo_emple='$privilegio',estado='$estado' where id_usuario='$id'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_usuario.php");

 ?>
