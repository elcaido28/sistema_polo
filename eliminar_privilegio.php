<?php
$id=$_REQUEST['id'];
include('conexion.php');
mysqli_query($con,"DELETE from privilegios where id_privilegio='$id'");
mysqli_close($con);
header("Location:ingreso_privilegio.php");

 ?>
