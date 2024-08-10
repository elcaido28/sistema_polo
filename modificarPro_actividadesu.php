<?php
 include('conexion.php');
 $id=$_REQUEST['id']; //actividadesu
 $consulta2=mysqli_query($con,"SELECT * from actividadesu where id_actividadesu='$id'");
 $row2=mysqli_fetch_assoc($consulta2);

 $fecha=$_POST['fecha'];
 $hora=$_POST['hora'];
 $descrip=$_POST['descrip'];
 $id_usu=$row2['id_usuario'];
 $id_act=$_POST['actividad'];

$ingreso=mysqli_query($con,"UPDATE actividadesu SET id_actividadesu='$id',fecha='$fecha',hora='$hora',descripcion='$descrip',id_usuario='$id_usu',id_actividad='$id_act' where id_actividadesu='$id'") or die ("error".mysqli_error());
mysqli_close($con);
header("Location:ingreso_actividadesu.php?id=$id_usu");

 ?>
