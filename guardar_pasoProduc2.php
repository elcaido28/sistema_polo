
<?php
 include('conexion.php');
 session_start();
$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];
$merma=$_POST['merma'];
$descrip=$_POST['descripcion'];
$id_produc0=$_SESSION['ID'];
$ingreso=mysqli_query($con,"INSERT into regis_produccion2 (fecha1,fecha2,merma, descripcion,id_regis_Produccion) values ('$fecha1','$fecha2','$merma','$descrip','$id_produc0')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_pasoProduc2.php");

 ?>
