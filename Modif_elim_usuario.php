<?php
 include('conexion.php');

$id=$_REQUEST['id'];
$consulta=mysqli_query($con,"SELECT * from usuarios where id_usuario='$id'");
$row=mysqli_fetch_array($consulta);


 $nombre=$row['nombres'];
 $apellido=$row['apellidos'];
 $cedula=$row['cedula'];
 $celular=$row['telefono'];
 $nomusu=$row['nomusu'];
 $clave=$row['contrasena'];
 $privilegio=$row['tipo_emple'];
 $estado="INACTIVO";

$ingreso=mysqli_query($con,"UPDATE usuarios SET id_usuario='$id',nombres='$nombre',apellidos='$apellido',cedula='$cedula',telefono='$celular',nomusu='$nomusu',contrasena='$clave',tipo_emple='$privilegio',estado='$estado' where id_usuario='$id'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_usuario.php");

 ?>
