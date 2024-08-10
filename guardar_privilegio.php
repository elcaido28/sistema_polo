<?php
 include('conexion.php');

$privilegio=$_POST['privilegio'];
$ingreso=mysqli_query($con,"INSERT into privilegios (tipo_privi) values ('$privilegio')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_privilegio.php");
 ?>
