<?php
 include('conexion.php');

$fecha=$_POST['fecha'];
$producTotal=$_POST['totalpro'];
$ingreso=mysqli_query($con,"INSERT into regis_produccion (fecha, total_prod) values ('$fecha','$producTotal')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_pasoProduc.php");

 ?>
