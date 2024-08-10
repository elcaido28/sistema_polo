<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
  <center>
<?php
$id=$_REQUEST['id'];
$consulta=mysqli_query($con,"SELECT * from usuarios where id_usuario='$id'");
$row=mysqli_fetch_array($consulta);
 ?>
    <h1 class="tituloF">MODIFICACIÓN DE USUARIOS</h1>
    <hr><br>
  <form class="formu" action="modificarPro_usuario.php?id=<?php echo $row['id_usuario']; ?>" method="post">
    <label for="" class="etiq">Nombres</label>
    <input type="text" class="cajatext" name="nombre" placeholder="Ejemplo: ANDRES ANTONIO" value="<?php echo $row['nombres']; ?>" onkeypress="return sololetras(event)" onpaste="return false" required>
    <label for="" class="etiq">Apellidos</label>
    <input type="text" class="cajatext" name="apellido" placeholder="Ejemplo: SOSA PAREDES" value="<?php echo $row['apellidos']; ?>" onkeypress="return sololetras(event)" onpaste="return false" required>
    <label for="" class="etiq">Cedula Pasaporte</label>
    <input type="text" class="cajatext" name="cedula" placeholder="Ejemplo: 0934754664" value="<?php echo $row['cedula']; ?>" onkeypress="return solonumeroRUC(event)" onpaste="return false" required>
    <label for="" class="etiq">Celular</label>
    <input type="text" class="cajatext" name="celular" placeholder="Ejemplo: 0985536401" value="<?php echo $row['telefono']; ?>">
    <label for="" class="etiq">Nombre de Usuario</label>
    <input type="text" class="cajatext" name="nomusu" value="<?php echo $row['nomusu']; ?>" required>
    <label for="" class="etiq">Contraseña</label>
    <input type="text" class="cajatext" name="clave"  value="<?php echo $row['contrasena']; ?>" required>
    <label for="" class="etiq">Privilegio</label>
    <select class="cajatext" name="privilegio" required><option><?php echo $row['tipo_emple']; ?></option><option>ADMIN</option><option>JORNALERO</option> </select>
    <label for="" class="etiq">Estado</label>
    <select class="cajatext" name="estado" required><option><?php echo $row['estado']; ?></option><option>ACTIVO</option></select>

    <div class="C_btn">
      <input type="submit" class="aceptar" name="" value="GUARDAR">
      <a href="ingreso_usuario.php" class="cancelar">CANCELAR</a>
    </div>
  </form>
  <br>
  <br>

  </div>
  </body>
  </html>
