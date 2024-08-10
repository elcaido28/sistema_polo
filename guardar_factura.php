
<?php
 include('conexion.php');
 session_start();
$fecha1=$_POST['fecha'];
$cliente=$_POST['cliente'];
$cantidad=$_POST['cantidad'];
$preciou=$_POST['preciou'];
$preciot=$_POST['preciot'];
$iva=$_POST['iva'];
$descuento=$_POST['descuento'];
$total=$_POST['total'];
$id_produccion=$_REQUEST['id'];

$ingreso=mysqli_query($con,"INSERT into factura (fecha,comprador,cantidad, preciou,preciot,iva,descuento,total,id_produccion) values ('$fecha1','$cliente','$cantidad','$preciou','$preciot','$iva','$descuento','$total','$id_produccion')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_factura.php");

 ?>
