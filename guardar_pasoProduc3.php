
<?php
 include('conexion.php');
 session_start();
$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];
$cajas=$_POST['cajas'];
$descrip=$_POST['descripcion'];
$id_produc0=$_SESSION['ID'];
$ingreso=mysqli_query($con,"INSERT into regis_produccion3 (fecha1,fecha2,cant_caja, descripcion,id_regis_Produccion) values ('$fecha1','$fecha2','$cajas','$descrip','$id_produc0')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_pasoProduc3.php");

 ?>
