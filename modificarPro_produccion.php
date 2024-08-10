<?php
 include('conexion.php');
$id=$_REQUEST['id'];
$fecha=$_POST['fecha'];
$cantPlant=$_POST['numerop'];
$producTotal=$_POST['totalpro'];
$merma=$_POST['merma'];
$ncajas=$_POST['cajas'];
$valor=$_POST['valor'];

$ingreso=mysqli_query($con,"UPDATE producciones SET id_produccion='$id',fecha='$fecha',canti_planta='$cantPlant',total_prod='$producTotal',merma='$merma',cajas='$ncajas',valor='$valor' where id_produccion='$id'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_produccion.php");

 ?>
