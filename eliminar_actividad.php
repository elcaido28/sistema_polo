<?php
$id=$_REQUEST['id'];
include('conexion.php');
mysqli_query($con,"DELETE from actividad where id_actividad='$id'");
mysqli_close($con);
header("Location:ingreso_actividad.php");

 ?>
