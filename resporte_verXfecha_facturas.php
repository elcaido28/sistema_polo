<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
  <center>
    <h1 class="tituloF">BUSQUEDA DE REPORTE POR FECHA</h1>
  <hr><br>
<form class="formupeque" action="reporte_facturas.php" method="post">
  <label for="" class="etiq">Fecha Desde</label>
  <input type="date" class="cajapeque" id="Xfechafin" name="Xfechafin" />
<label for="" class="etiq">Fecha Hasta</label>
<input type="date" class="cajapeque" id="Xfechaini" name="Xfechaini" />
  <label for="" class="etiq">Otra Busqueda:</label>
<input type="checkbox" class="cajatext" id="che" onclick="otrabusqueda()"  name="che" />
<label for="" class="etiq">Nombre de Trabajador</label>
<input type="text" class="cajatext" id="otraB" placeholder="Escribir" disabled onclick="abc()"  name="otraB" />

<div class="C_btn">
<input type="submit" class="aceptar" value="Aceptar"/>
</div>
</form>
</section>
</center>

<br>
<br><br>
<script type="text/javascript">
function otrabusqueda() {
var abc=document.getElementById("che").checked;
if (abc==true) {

    document.getElementById("otraB").disabled = false;
    document.getElementById("Xfechaini").disabled = true;
    document.getElementById("Xfechafin").disabled = true;
    document.getElementById("otraB").focus();
  }else {
    document.getElementById("otraB").disabled = true;
    document.getElementById("Xfechaini").disabled = false;
    document.getElementById("Xfechafin").disabled = false;
  }
}
</script>
  </div>
</div>
</body>
</html>
