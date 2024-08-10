<?php
 include('conexion.php');

$actividad=$_POST['actividad'];
$ingreso=mysqli_query($con,"INSERT into actividad (trabajo) values ('$actividad')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_actividad.php");
 ?>
