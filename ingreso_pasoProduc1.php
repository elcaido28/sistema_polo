<?php
 include('menu.php');
 include('conexion.php');
$id_produc0=$_SESSION['ID'];
 ?>
<div class="content_todo">
  <center>
    <h1 class="tituloF">REGISTRO DE LA PRODUCCIÓN - LAVADO</h1>
  <hr><br>
  <form class="formu" action="guardar_pasoProduc1.php?id=<?php echo $id_produc0; ?>" method="post">
    <label for="" class="etiq">Fecha Inicio</label>
    <input type="date" class="cajatext" name="fecha1" value="" required>
    <label for="" class="etiq">Fecha Fin</label>
    <input type="date" class="cajatext" name="fecha2" value="" required>
    <label for="" class="etiq">Descripción</label>
    <textarea class="cajadescrip" name="descripcion" placeholder="DESCRIPCIÓN" rows="8" cols="80"></textarea>
    <div class="C_btn">
      <input type="submit" class="aceptar" name="" value="GUARDAR">
      <a href="ingreso_todoProduc.php?id=<?php echo $id_produc0; ?>" class="cancelar">CANCELAR</a>
    </div>
  </form>
  <br>
  <br>
  <table class="tabla">
      <thead>
        <tr>
          <th>FECHA INICIO</th>
          <th>FECHA FIN</th>
          <th>DESCRIPCION</th>
          <th>EDITAR</th>
        </tr>
      </thead>

      <tr>
        <?php
        if(empty($_POST['busqtipo'])){
              $busqtipo="";

         }else {
            $busqtipo=$_POST['busqtipo'];
          }
        $consulta=mysqli_query($con,"SELECT * from regis_produccion1 where fecha1 like '%".$busqtipo."%' and id_regis_produccion='$id_produc0' ORDER BY fecha1 DESC");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['fecha1']; ?> </td>
              <td><?php echo $row['fecha2']; ?> </td>
              <td><?php echo $row['descripcion']; ?> </td>
              <td><a href="modificar_pasoProduc1.php?id=<?php echo $row['id_regis_produccion1'];?>" class="modificar"><i class="far fa-edit">CAMBIAR</i></a></td>
      </tr>
        <?php
              }
        ?>

  </table>







  </div>
  </body>
  </html>
