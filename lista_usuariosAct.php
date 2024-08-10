<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
  <center>
    <h1 class="titulo">LISTA DE EMPLEADOS</h1>
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
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>CELULAR</th>
        <th>CARGO</th>
        <th>ESTADO</th>
        <th>ACTIVIDAD</th>
      </tr>
    </thead>

    <tr>
      <?php
      if(empty($_POST['busqtipo'])){
            $busqtipo="";

       }else {
          $busqtipo=$_POST['busqtipo'];
        }
      $consulta=mysqli_query($con,"SELECT * from usuarios where nombres like '%".$busqtipo."%' AND tipo_emple !='ADMIN' AND estado !='INACTIVO' ORDER BY apellidos DESC");
       while($row=mysqli_fetch_array($consulta)){
      ?>

            <td><?php echo $row['nombres']; ?> </td>
            <td><?php echo $row['apellidos']; ?> </td>
            <td><?php echo $row['telefono']; ?> </td>
            <td><?php echo $row['tipo_emple']; ?> </td>
            <td><?php echo $row['estado']; ?> </td>
            <td><a href="ingreso_actividadesu.php?id=<?php echo $row['id_usuario'];?>" class="establecer"><i class="far fa-arrow-alt-circle-right">ESTABLECER</i></a></td>
    </tr>
      <?php
            }
      ?>

</table>


</center>
</div>
</body>
</html>
