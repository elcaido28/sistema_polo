<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
    <div class="Ver_pro_actual">
    <h3 class="titulo"> VER PRODUCCIÓN ACTUAL <i class="far fa-eye"></i></h3>
  <br>

  <?php
  $consulta=mysqli_query($con,"SELECT * from regis_produccion  ORDER BY fecha ASC");
   while($row=mysqli_fetch_array($consulta)){
   $ids=$row['id_regis_Produccion'];
   $proT=$row['total_prod'];
   $fecha=$row['fecha'];
  }
  $consulta1=mysqli_query($con,"SELECT SUM(merma) Merma from regis_produccion2 where id_regis_produccion='$ids' ORDER BY id_regis_produccion2 ASC");
   while($row1=mysqli_fetch_array($consulta1)){
   $merma=$row1['Merma'];
  }
  $consulta2=mysqli_query($con,"SELECT SUM(cant_caja) Caja from regis_produccion3 where id_regis_produccion='$ids' ORDER BY id_regis_produccion3 ASC");
   while($row2=mysqli_fetch_array($consulta2)){
   $cajas=$row2['Caja'];
  }
  // $consulta3=mysqli_query($con,"SELECT SUM(caja)Caja from regis_produccion2 where id_regis_produccion='$ids' ORDER BY fecha ASC");
  //  while($row3=mysqli_fetch_array($consulta3)){
  $consulta2=mysqli_query($con,"SELECT SUM(total)tota FROM factura order by fecha ASC");
  while($row2=mysqli_fetch_array($consulta2)){
  $totalF=$row2['tota'];
  }
  // }
  ?>

  <table class="tabla">
      <thead>
        <tr>
          <th>FECHA</th>
          <th>PRODUCCION TOTAL(Kg)</th>
          <th>MERMAS(Kg)</th>
          <th>NUMERO / CAJAS</th>
          <th>VALOR</th>
        </tr>
      </thead>
      <tr>
              <td><?php echo $fecha; ?> </td>
              <td><?php echo $proT." Kg"; ?> </td>
              <td><?php echo $merma." Kg"; ?> </td>
              <td><?php echo $cajas; ?> </td>
              <td><?php echo $totalF; ?> </td>
      </tr>
  </table>
  </div>






<center>

  <h1 class="tituloF">PRODUCCIÓN DE NARANJA</h1>
  <hr><br>
<script type="text/javascript">
function estimacion() {
  var precio= prompt("INGRESE PRECIO POR CAJA DE NARANJA", "");
  var hectareas =document.getElementById('1').value;
  var producT=hectareas*22100;
  document.getElementById('2').value=producT;
  var merma=producT*0.31;
  document.getElementById('3').value=merma;
  var cajas=(producT-merma)/10;
  document.getElementById('4').value= parseInt(cajas);
  var valor =parseInt(cajas)*precio;
  document.getElementById('5').value= valor;
}
</script>

<form class="formu" action="guardar_produccion.php" method="post">
  <label for="" class="etiq">Fecha</label>
  <input type="date" class="cajatext" name="fecha" value="" required>
  <label for="" class="etiq">Terreno en Hectareas</label>
  <input type="text" class="cajatext" id="1" placeholder="Terreno en Hectareas: 10" name="numerop" value="" onkeypress="return solonumeros(event)" onpaste="return false" required>
  <label for="" class="etiq">Producción Total(Kg)</label>
  <input type="text" class="cajatext" id="2" name="totalpro" placeholder="Producción Total: 1000" value="" onkeypress="return solonumeros(event)" onpaste="return false" required>
  <label for="" class="etiq">Merma en (Kg)</label>
  <input type="text" class="cajatext" id="3" name="merma" placeholder="Merma de Producción: 100" value="" onkeypress="return solonumeros(event)" onpaste="return false" required>
  <label for="" class="etiq">Cantidad de Cajas</label>
  <input type="text" class="cajatext" id="4" name="cajas" placeholder="Cantidad de Cajas: 9" value="" onkeypress="return solonumeros(event)" onpaste="return false" required>
  <label for="" class="etiq">Valor por Producción</label>
  <input type="text" class="cajatext" id="5" name="valor" placeholder="Valor por Producción $: 100.00" value="" onkeypress="return solonumeros(event)" onpaste="return false" required>
  <div class="C_btn">
    <input type="submit" class="aceptar" name="" value="GUARDAR">
    <button type="button" name="button" onclick="estimacion()" class="aceptar">ESTIMACIÓN</button>
  </div>
</form>
<br><br><br>

<section class="busqueda">
  <form  method="post">
  <input type="text" name="busqtipo" value="" />
  <input type="submit"  value="Buscar"  />
  </form>
</section>
<br>
<table class="tabla">
    <thead>
      <tr>
        <th>FECHA</th>
        <th>TERRENO EN HECTÁREA</th>
        <th>TOTAL PRODUCCIÓN(Kg)</th>
        <th>MERMAS(Kg)</th>
        <th>CAJAS PRODUCIDAS</th>
        <th>VALOR($)</th>
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
      $consulta=mysqli_query($con,"SELECT * from producciones where fecha like '%".$busqtipo."%' or total_prod like '%".$busqtipo."%' or cajas like '%".$busqtipo."%'or merma like '%".$busqtipo."%' ORDER BY fecha DESC");
       while($row=mysqli_fetch_array($consulta)){
      ?>

            <td><?php echo $row['fecha']; ?> </td>
            <td><?php echo $row['canti_planta']; ?> </td>
            <td><?php echo $row['total_prod']." (Kg)"; ?> </td>
            <td><?php echo $row['merma']." (Kg)"; ?> </td>
            <td><?php echo $row['cajas']; ?> </td>
            <td><?php echo $row['valor']; ?> </td>
            <td><a href="modificar_produccion.php?id=<?php echo $row['id_produccion'];?>" class="modificar"><i class="far fa-edit">CAMBIAR</i></a></td>
    </tr>
      <?php
            }
      ?>

</table>






  </center>
</div>
  </body>
</html>
