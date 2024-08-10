<?php
 include('conexion.php');
 session_start();
 $id=$_REQUEST['id'];
$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];
$cajas=$_POST['cajas'];
$descrip=$_POST['descripcion'];
$id_produc0=$_SESSION['ID'];

$ingreso=mysqli_query($con,"UPDATE regis_produccion3 SET id_regis_produccion3='$id',fecha1='$fecha1',fecha2='$fecha2',cant_caja='$cajas' ,descripcion='$descrip' where id_regis_produccion3='$id'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_pasoProduc3.php");

 ?>
