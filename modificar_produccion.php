<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
  <center>
    <h1 class="tituloF">MODIFICAR PRODUCCIÓN DE NARANJA</h1>
  <hr><br>
<script type="text/javascript">

</script>

<?php
   $id=$_REQUEST['id'];
include('conexion.php');
$result= mysqli_query($con,"SELECT * from producciones where id_produccion='$id'");
$row= mysqli_fetch_assoc($result);
 ?>


<form class="formu" action="modificarPro_produccion.php?id=<?php echo $row['id_produccion']; ?>" method="post">
  <label for="" class="etiq">Fecha</label>
  <input type="date" class="cajatext" name="fecha"  value="<?php echo $row['fecha']; ?>" required>
  <label for="" class="etiq">Terreno en Hectareas</label>
  <input type="text" class="cajatext" placeholder="Terreno en Hectareas: 10" name="numerop" value="<?php echo $row['canti_planta']; ?>" onkeypress="return solonumeros(event)" onpaste="return false" required>
  <label for="" class="etiq">Producción Total(Kg)</label>
  <input type="text" class="cajatext" name="totalpro" placeholder="Producción Total: 1000" value="<?php echo $row['total_prod']; ?>" onkeypress="return solonumeros(event)" onpaste="return false" required>
  <label for="" class="etiq">Merma en (Kg)</label>
  <input type="text" class="cajatext" name="merma" placeholder="Merma de Producción: 100" value="<?php echo $row['merma']; ?>" onkeypress="return solonumeros(event)" onpaste="return false" required>
  <label for="" class="etiq">Cantidad de Cajas</label>
  <input type="text" class="cajatext" name="cajas" placeholder="Cantidad de Cajas: 9" value="<?php echo $row['cajas']; ?>" onkeypress="return solonumeros(event)" onpaste="return false" required>
  <label for="" class="etiq">Valor por Producción</label>
  <input type="text" class="cajatext" name="valor" placeholder="Valor por Producción $: 100.00" value="<?php echo $row['valor']; ?>" onkeypress="return solonumeros(event)" onpaste="return false" required>
  <div class="C_btn">
    <input type="submit" class="aceptar" name="" value="MODIFICAR">
    <a href="ingreso_produccion.php" class="cancelar">CANCELAR</a>
  </div>
</form>
<br><br><br>







  </center>
</div>
  </body>
</html>
