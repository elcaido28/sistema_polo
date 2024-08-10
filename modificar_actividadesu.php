<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
<center>
  <?php
  $id=$_REQUEST['id'];
  $consulta2=mysqli_query($con,"SELECT * from actividadesu AU inner join actividad A on A.id_actividad=AU.id_actividad where AU.id_actividadesu='$id'");
  $row2=mysqli_fetch_assoc($consulta2)
   ?>
  <h1 class="tituloF">REGISTRO DE ACTIVIDADES</h1>
<hr><br>
<form class="formu" action="modificarPro_actividadesu.php?id=<?php echo $id;  ?>" method="post">
  <label for="" class="etiq">Actividad</label>
  <select class="cajatext" name="actividad" required> <option value="<?php echo $row2['id_actividad'];  ?>"><?php echo $row2['trabajo'];  ?></option>
  <?php $consulta6=mysqli_query($con,"SELECT * from actividad ");
    while($row6=mysqli_fetch_array($consulta6)){
    echo "<option value='".$row6['id_actividad']."'> "; echo $row6['trabajo']; echo "</option>"; } ?> </select>

  <label for="" class="etiq">Fecha</label>
  <input type="date" class="cajatext" name="fecha" value="<?php echo $row2['fecha'];  ?>" required>
  <label for="" class="etiq">Hora</label>
  <input type="time" class="cajatext" name="hora" value="<?php echo $row2['hora'];  ?>" required>
  <label for="" class="etiq">Descripción</label>
  <textarea name="descrip" class="cajadescrip2" rows="8" cols="80"><?php echo $row2['descripcion'];  ?></textarea>
  <div class="C_btn">
  <input type="submit" class="aceptar" name="" value="MODIFICAR">
  <a href="ingreso_actividadesu.php?id=<?php echo $row2['id_usuario']; ?>" class="cancelar">CANCELAR</a>
  </div>
</form>
<br>
</center>
</div>
</body>
</html>
