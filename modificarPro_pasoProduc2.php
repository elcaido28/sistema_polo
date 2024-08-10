<?php
 include('conexion.php');
 session_start();
 $id=$_REQUEST['id'];
$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];
$merma=$_POST['merma'];
$descrip=$_POST['descripcion'];
$id_produc0=$_SESSION['ID'];

$ingreso=mysqli_query($con,"UPDATE regis_produccion2 SET id_regis_produccion2='$id',fecha1='$fecha1',fecha2='$fecha2',merma='$merma' ,descripcion='$descrip' where id_regis_produccion2='$id'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_pasoProduc2.php");

 ?>
