<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
<center>
  <?php
  $id=$_REQUEST['id'];
  $consulta2=mysqli_query($con,"SELECT * from usuarios where id_usuario='$id'");
  $row2=mysqli_fetch_assoc($consulta2)
   ?>
  <h1 class="tituloF">REGISTRO DE ACTIVIDADES</h1>
<hr><br>
<form class="formu" action="guardar_actividadesu.php?id=<?php echo $id; ?>" method="post">
  <label for="" class="etiq">Empleado</label>
  <input type="text" class="cajapeque" name="" value="<?php echo $row2['nombres']; ?>" onkeypress="return enable(event)" onpaste="return false">
  <label for="" class="etiq">Actividad</label>
  <select class="cajatext" name="actividad" required> <option value="">-ACTIVIDADES-</option>
  <?php $consulta6=mysqli_query($con,"SELECT * from actividad ");
    while($row6=mysqli_fetch_array($consulta6)){
    echo "<option value='".$row6['id_actividad']."'> "; echo $row6['trabajo']; echo "</option>"; } ?> </select>

  <label for="" class="etiq">Fecha</label>
  <input type="date" class="cajatext" name="fecha" value="" required>
  <label for="" class="etiq">Hora</label>
  <input type="time" class="cajatext" name="hora" value="" required>
  <label for="" class="etiq">Descripción</label>
  <textarea name="descrip" class="cajadescrip2" rows="8" cols="80" required></textarea>
  <div class="C_btn">
  <input type="submit" class="aceptar" name="" value="GUARDAR">
  <a href="lista_usuariosAct.php" class="cancelar">CANCELAR</a>
  </div>
</form>
<br>
<table class="tabla">
    <thead>
      <tr>
        <th>ACTIVIDAD</th>
        <th>FECHA</th>
        <th>HORA</th>
        <th>DESCRIPCIÓN</th>
        <th>CAMBIAR</th>
      </tr>
    </thead>

    <tr>
      <?php
      if(empty($_POST['busqtipo'])){
            $busqtipo="";

       }else {
          $busqtipo=$_POST['busqtipo'];
        }
      $consulta=mysqli_query($con,"SELECT * from actividadesu AU inner join actividad A on A.id_actividad=AU.id_actividad where fecha like '%".$busqtipo."%' and id_usuario='$id' ORDER BY AU.fecha DESC");
       while($row=mysqli_fetch_array($consulta)){
      ?>

            <td><?php echo $row['trabajo']; ?> </td>
            <td><?php echo $row['fecha']; ?> </td>
            <td><?php echo $row['hora']; ?> </td>
            <td><?php echo $row['descripcion']; ?> </td>
            <td><a href="modificar_actividadesu.php?id=<?php echo $row['id_actividadesu'];?>" class="modificar"><i class="far fa-edit"> EDITAR</i></a></td>
    </tr>
      <?php
            }
      ?>

</table>




</center>
</div>
</body>
</html>
