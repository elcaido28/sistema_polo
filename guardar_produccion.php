<?php
 include('conexion.php');

$fecha=$_POST['fecha'];
$cantPlant=$_POST['numerop'];
$areaTerre=$_POST['areat'];
$producTotal=$_POST['totalpro'];
$merma=$_POST['merma'];
$ncajas=$_POST['cajas'];
$valor=$_POST['valor'];

$ingreso=mysqli_query($con,"INSERT into producciones (fecha, canti_planta, total_prod, merma, cajas,valor) values ('$fecha','$cantPlant','$producTotal','$merma','$ncajas','$valor')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_produccion.php");

 ?>
