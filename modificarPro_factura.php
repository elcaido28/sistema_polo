<?php
 include('conexion.php');
 $id=$_REQUEST['id'];
 $consulta=mysqli_query($con,"SELECT * FROM factura where id_factura='$id'");
 $row=mysqli_fetch_assoc($consulta);

 $fecha1=$_POST['fecha'];
 $cliente=$_POST['cliente'];
 $cantidad=$_POST['cantidad'];
 $preciou=$_POST['preciou'];
 $preciot=$_POST['preciot'];
 $iva=$_POST['iva'];
 $descuento=$_POST['descuento'];
 $total=$_POST['total'];
$idp=$row['id_produccion'];

$ingreso=mysqli_query($con,"UPDATE factura SET id_factura='$id',fecha='$fecha1',comprador='$cliente',cantidad='$cantidad',precioU='$preciou',preciot='$preciot',iva='$iva',descuento='$descuento',total='$total',id_produccion='$idp' where id_factura='$id'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:lista_facturas.php");

 ?>
