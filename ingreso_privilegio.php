<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
  <center>

    <h1 class="tituloF">REGISTRO DE PRIVILEGIOS</h1>
    <hr><br>
  <form class="formupeque" action="guardar_privilegio.php" method="post">
    <label for="" class="etiq">Privilegio</label>
    <input type="text" class="cajatext" name="privilegio" placeholder="Ejemplo: JORNALERO" value="" onkeypress="return sololetras(event)" onpaste="return false" required>
    <input type="submit" class="aceptarpeque" name="" value="GUARDAR">
  </form>
  <br>
  <br>
  <table class="tabla">
      <thead>
        <tr>
          <th>PRIVILEGIO</th>
          <th>ELIMINAR</th>
        </tr>
      </thead>
      <tr>
        <?php

        $consulta=mysqli_query($con,"SELECT * from privilegios ORDER BY id_privilegio DESC");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['tipo_privi']; ?> </td>
              <td><a href="eliminar_privilegio.php?id=<?php echo $row['id_privilegio'];?>" class="eliminar"><i class="fa fa-trash-alt"> BORRAR</i></a>  </td>
      </tr>
        <?php
              }
        ?>

  </table>
</center>

  </div>
  </body>
  </html>
