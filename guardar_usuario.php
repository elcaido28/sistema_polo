<?php
 include('conexion.php');

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$cedula=$_POST['cedula'];
$celular=$_POST['celular'];
$nomusu=$_POST['nomusu'];
$clave=$_POST['clave'];
$privilegio=$_POST['privilegio'];
$estado=$_POST['estado'];

$ingreso=mysqli_query($con,"INSERT into usuarios (nombres, apellidos, cedula, telefono, nomusu,contrasena,tipo_emple,estado) values ('$nombre','$apellido','$cedula','$celular','$nomusu','$clave','$privilegio','$estado')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_usuario.php");

 ?>
