<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
  <center>
    <h1 class="tituloF">REGISTRO DE LA PRODUCCIÓN</h1>
  <hr><br>
  <form class="formu" action="guardar_pasoProduc.php" method="post">
    <label for="" class="etiq">Fecha</label>
    <input type="date" class="cajatext" name="fecha" value="" required>
    <label for="" class="etiq">Producción Total(Kg)</label>
    <input type="text" class="cajatext" name="totalpro" placeholder="Producción Total: 1000" value="" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <input type="submit" class="aceptarpeque" name="" value="GUARDAR">

  </form>
  <br>
  <table class="tabla">
      <thead>
        <tr>
          <th>FECHA</th>
          <th>TOTAL PRODUCCIÓN</th>
          <th>ESTABLECER MAS</th>
        </tr>
      </thead>

      <tr>
        <?php
        if(empty($_POST['busqtipo'])){
              $busqtipo="";

         }else {
            $busqtipo=$_POST['busqtipo'];
          }
        $consulta=mysqli_query($con,"SELECT * from regis_produccion where fecha like '%".$busqtipo."%' ORDER BY fecha DESC");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['fecha']; ?> </td>
              <td><?php echo $row['total_prod']." Kg"; ?> </td>
              <td><a href="ingreso_todoProduc.php?id=<?php echo $row['id_regis_Produccion'];?>" class="establecer"><i class="far fa-arrow-alt-circle-right"> REGISTRAR</i></a></td>
      </tr>
        <?php
              }
        ?>

  </table>





</div>
</body>
</html>
