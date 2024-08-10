<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
  <center>

    <h1 class="tituloF">REGISTRO DE ACTIVIDADES O TRABAJOS</h1>
    <hr><br>
  <form class="formupeque" action="guardar_actividad.php" method="post">
    <label for="" class="etiq">Actividad</label>
    <input type="text" class="cajatext" name="actividad" placeholder="Ejemplo: ARADO" onkeypress="return sololetras(event)" required>
    <input type="submit" class="aceptarpeque" name="" value="GUARDAR">
  </form>
  <br>
  <br>
  <table class="tabla">
      <thead>
        <tr>
          <th>ACTIVIDAD O TRABAJO</th>
          <th>ELIMINAR</th>
        </tr>
      </thead>
      <tr>
        <?php

        $consulta=mysqli_query($con,"SELECT * from actividad ORDER BY id_actividad DESC");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['trabajo']; ?> </td>
              <td><a href="eliminar_actividad.php?id=<?php echo $row['id_actividad'];?>" class="eliminar"><i class="fa fa-trash-alt"> BORRAR</i></a>  </td>
      </tr>
        <?php
              }
        ?>

  </table>
</center>

  </div>
  </body>
  </html>
