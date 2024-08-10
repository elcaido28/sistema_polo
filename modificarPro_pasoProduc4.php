<?php
 include('conexion.php');
 session_start();
 $id=$_REQUEST['id'];
$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];
$descrip=$_POST['descripcion'];
$id_produc0=$_SESSION['ID'];

$ingreso=mysqli_query($con,"UPDATE regis_produccion4 SET id_regis_produccion4='$id',fecha1='$fecha1',fecha2='$fecha2' ,descripcion='$descrip' where id_regis_produccion4='$id'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_pasoProduc4.php");

 ?>
