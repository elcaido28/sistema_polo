<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
<center>
  <h1 class="tituloF">LISTADO DE ACTIVIDADES</h1>
<hr><br>
<section class="busqueda">
  <form  method="post">
  <input type="text" name="busqtipo" value="" />
  <input type="submit"  value="Buscar"  />
  </form>
</section>
<br>
<table class="tabla">
    <thead>
      <tr>
        <th>EMPLEADO</th>
        <th>ACTIVIDAD</th>
        <th>FECHA</th>
        <th>HORA</th>
        <th>DESCRIPCIÓN</th>
      </tr>
    </thead>

    <tr>
      <?php
      if(empty($_POST['busqtipo'])){
            $busqtipo="";

       }else {
          $busqtipo=$_POST['busqtipo'];
        }
      $idemp=$_SESSION['IDemp'];
      $consulta=mysqli_query($con,"SELECT * from actividadesu AU INNER JOIN actividad A on A.id_actividad=AU.id_actividad INNER JOIN usuarios U on U.id_usuario=AU.id_usuario where fecha like '%".$busqtipo."%' and U.id_usuario='$idemp' OR nombres like '%".$busqtipo."%' and U.id_usuario='$idemp' ORDER BY AU.fecha DESC");
       while($row=mysqli_fetch_array($consulta)){
      ?>

            <td><?php echo $row['nombres']." ".$row['apellidos']; ?> </td>
            <td><?php echo $row['trabajo']; ?> </td>
            <td><?php echo $row['fecha']; ?> </td>
            <td><?php echo $row['hora']; ?> </td>
            <td><?php echo $row['descripcion']; ?> </td>
      </tr>
      <?php
            }
      ?>

</table>




</center>
</div>
</body>
</html>
