<?php
 include('menu.php');
 include('conexion.php');
$id_produc0=$_SESSION['ID'];
 ?>
 <?php
    $id=$_REQUEST['id'];
 include('conexion.php');
 $result= mysqli_query($con,"SELECT * from regis_produccion3 where id_regis_produccion3='$id'");
 $row= mysqli_fetch_assoc($result);
  ?>
<div class="content_todo">
  <center>
    <h1 class="tituloF">REGISTRO DE LA PRODUCCIÓN - LAVADO</h1>
  <hr><br><br>
  <form class="formu" action="modificarPro_pasoProduc3.php?id=<?php echo $id; ?>" method="post">
    <label for="" class="etiq">Fecha Inicio</label>
    <input type="date" class="cajatext" name="fecha1" value="<?php echo $row['fecha1']; ?>" required>
    <label for="" class="etiq">Fecha Fin</label>
    <input type="date" class="cajatext" name="fecha2" value="<?php echo $row['fecha2']; ?>" required>
    <label for="" class="etiq">Cantidad de Cajas</label>
    <input type="text" class="cajatext" name="cajas" placeholder="Total cajas: 100" value="<?php echo $row['cant_caja']; ?>" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <label for="" class="etiq">Descripción</label>
    <textarea class="cajadescrip" name="descripcion" placeholder="DESCRIPCIÓN" rows="8" cols="80"><?php echo $row['descripcion']; ?></textarea>
    <div class="C_btn">
      <input type="submit" class="aceptar" name="" value="MODIFICAR">
      <a href="ingreso_pasoProduc3.php" class="cancelar">CANCELAR</a>
    </div>
  </form>
  <br>

</div>
</body>
</html>