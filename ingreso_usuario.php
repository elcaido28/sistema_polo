<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
  <center>

    <h1 class="tituloF">REGISTRO DE USUARIOS</h1>
    <hr><br>
  <form class="formu" action="guardar_usuario.php" method="post">
    <label for="" class="etiq">Nombres</label>
    <input type="text" class="cajatext" name="nombre" placeholder="Ejemplo: ANDRES ANTONIO" value="" onkeypress="return sololetras(event)" onpaste="return false" required>
    <label for="" class="etiq">Apellidos</label>
    <input type="text" class="cajatext" name="apellido" placeholder="Ejemplo: SOSA PAREDES" value="" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <label for="" class="etiq">Cedula Pasaporte</label>
    <input type="text" class="cajatext" name="cedula" placeholder="Ejemplo: 0934754664" value="" onkeypress="return solonumeroRUC(event)"  required>
    <label for="" class="etiq">Celular</label>
    <input type="text" class="cajatext" name="celular" placeholder="Ejemplo: 0985536401" value="" onkeypress="return solonumeros(event)" >
    <label for="" class="etiq">Nombre de Usuario</label>
    <input type="text" class="cajatext" name="nomusu" value="" required>
    <label for="" class="etiq">Contraseña</label>
    <input type="text" class="cajatext" name="clave"  value="" required>
    <label for="" class="etiq">Privilegio</label>
    <select class="cajatext" name="privilegio" required><option value="">-PRIVILEGIOS-</option>
    <?php $consulta6=mysqli_query($con,"SELECT * from privilegios ");
      while($row6=mysqli_fetch_array($consulta6)){
      echo "<option> "; echo $row6['tipo_privi']; echo "</option>"; } ?> </select>

    <label for="" class="etiq">Estado</label>
    <select class="cajatext" name="estado" required><option value="">-ESTADO-</option><option>ACTIVO</option></select>

    <div class="C_btn">
      <input type="submit" class="aceptar" name="" value="GUARDAR">
      <a href="ingreso_usuario.php" class="cancelar">CANCELAR</a>
    </div>
  </form>
  <br>
  <br>
  <table class="tabla">
      <thead>
        <tr>
          <th>NOMBRES</th>
          <th>APELIDOS</th>
          <th>CEDULA</th>
          <th>CELULAR</th>
          <th>NOMBRE DE USUARIO</th>
          <th>CONTRASEÑA</th>
          <th>PRIVILEGIO</th>
          <th>ESTADO</th>
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
        $consulta=mysqli_query($con,"SELECT * from usuarios where nombres like '%".$busqtipo."%' ORDER BY id_usuario DESC");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['nombres']; ?> </td>
              <td><?php echo $row['apellidos']; ?> </td>
              <td><?php echo $row['cedula']; ?> </td>
              <td><?php echo $row['telefono']; ?> </td>
              <td><?php echo $row['nomusu']; ?> </td>
              <td><?php echo $row['contrasena']; ?> </td>
              <td><?php echo $row['tipo_emple']; ?> </td>
              <td><?php echo $row['estado']; ?> </td>
              <td><a href="modificar_usuario.php?id=<?php echo $row['id_usuario'];?>" class="modificar"><i class="far fa-edit">CAMBIAR</i></a>
              <a href="Modif_elim_usuario.php?id=<?php echo $row['id_usuario'];?>" class="eliminar"><i class="fa fa-trash-alt"> BORRAR</i></a>  </td>
      </tr>
        <?php
              }
        ?>

  </table>

</center>


  </div>
  </body>
  </html>
