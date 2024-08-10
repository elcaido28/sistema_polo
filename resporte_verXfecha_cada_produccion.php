<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
  <center>
    <h1 class="tituloF">BUSQUEDA DE REPORTE POR FECHA</h1>
  <hr><br>
<form class="formupeque" action="reporte_cada_produccion.php" method="post">
  <label for="" class="etiq">Fecha de Produccion</label>
  <select class="cajatext" name="otraB" required><option value="">-PRODUCCIONES-</option>
  <?php $consulta6=mysqli_query($con,"SELECT * from producciones ORDER BY fecha DESC ");
    while($row6=mysqli_fetch_array($consulta6)){
    echo "<option> "; echo $row6['fecha']; echo "</option>"; } ?> </select>

<input type="submit" class="aceptarpeque" value="Aceptar"/>

</form>
</section>
</center>

<br>
<br><br>
  </div>
</div>
</body>
</html>
