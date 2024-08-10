<?php
session_start();
  $nomU = $_POST['user'];
  $pas = $_POST['pass'];
  if(empty($nomU) || empty($pas)){
  	header("Location: index.php");
  	exit();
  }

   include('conexion.php');
   $result= mysqli_query($con,"SELECT * from usuarios where nomusu ='$nomU'");
   $row= mysqli_fetch_assoc($result);
   $abc=$row['id_usuario'];

   if($row['contrasena']==$pas){
  $result2= mysqli_query($con,"SELECT * from usuarios  where  id_usuario='$abc'");
  $row4= mysqli_fetch_assoc($result2);
    $_SESSION['IDemp']=$row4['id_usuario'];
    $_SESSION['NU']=$row4['nombres']." ".$row4['apellidos'];
    $_SESSION['TE']=$row4['tipo_emple'];
    $_SESSION['Est']=$row4['estado'];
     // $_SESSION['S']=$row4['recurso_secre'];
     // $_SESSION['PD']=$row4['recurso_profe_dele'];
     // $_SESSION['SC']=$row4['recurso_secre_conse'];
     header("Location:inicio.php");
   }else{
     $_SESSION['mensaje']="1";
     header("Location:index.php");
   }
 ?>
