
<?php
 include('conexion.php');

$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$descrip=$_POST['descrip'];
$id_usu=$_REQUEST['id'];
$id_act=$_POST['actividad'];

$ingreso=mysqli_query($con,"INSERT into actividadesu (fecha,hora,descripcion, id_usuario,id_actividad) values ('$fecha','$hora','$descrip','$id_usu','$id_act')") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_actividadesu.php?id=$id_usu");

 ?>
