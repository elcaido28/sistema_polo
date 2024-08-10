<?php
 include('menu.php');
 include('conexion.php');
 ?>

<div class="content_todo">
  <h2 class="titulo">ESTADO ACTUAL DE LOS SENSORES</h2>
<hr><br>

<?php
$consulta=mysqli_query($con,"SELECT * from sensores ORDER BY fecha_hora ASC");
 while($row=mysqli_fetch_array($consulta)){
$tempe=substr($row['temperatura'],2,-1);
$humedad=substr($row['humedad'],2,-1);
$tierra=substr($row['tierra_humedad'],2,-1);
if (substr($row['tierra_humedad'],2,-1)<=550) {
  $hume_tierra="TIERRA ESTA MOJADA";
}else {
    $hume_tierra="TIERRA ESTA SECA";
}
if (substr($row['lluvia'],2,-1)<=550) {
  $lluvia="ESTA LLOVIENDO";
}else {
    $lluvia="NO ESTA LLOVIENDO";
}
$bomba=substr($row['bomba'],2,-1);
 }
?>


<center>
<div class="div_sensor1" border="2"  bordercolor="#336666">
  <div class="div_sensor2"  id="1">
    <img src="img_sensores/img_temperatura.png" alt="" width="140" height="80">
    <input type="text" name="" value=" <?php echo  $tempe." ºC";?>" onkeypress="return enable(event)" onpaste="return false">
  </div>
  <div class="div_sensor2" id="2">
    <img src="img_sensores/img_humedad.png" alt="" width="140" height="80" >
    <input type="text" name="" value="<?php echo  $humedad." %";?>" onkeypress="return enable(event)" onpaste="return false">
  </div>
  <div class="div_sensor2" id="3">
    <img src="img_sensores/img_tierra.jpg" alt="" width="140" height="80" onkeypress="return enable(event)" onpaste="return false">
    <input type="text" name="" value="<?php echo  $hume_tierra;?>">
  </div>
  <div class="div_sensor2">
    <img src="img_sensores/img_lluvia.jpg" alt="" width="140" height="80" onkeypress="return enable(event)" onpaste="return false">
    <input type="text" name="" value="<?php echo  $lluvia;?>">
  </div>
  <div class="div_sensor2">
    <img src="img_sensores/img_bomba.png" alt="" width="140" height="80" onkeypress="return enable(event)" onpaste="return false">
    <input type="text" name="" value="<?php echo  $bomba;?>">
  </div>


</div>
</center>
  <br/>  <br/>  <br/>  <br/>
<center>
  <section class="busqueda">
    <form  method="post">
    <input type="text" name="busqtipo" value="" />
    <input type="submit"  value="Buscar"  />
    </form>
  </section>
  <br/>
<table class="tabla">
			<thead>
				<tr>
					<th>FECHA Y HORA</th>
          <th>TEMPERATURA</th>
          <th>HUMEDAD DE AMBIENTE</th>
          <th>HUMEDAD DE TIERRA</th>
          <th>LLUVIA</th>
          <th>BOMBA</th>
				</tr>
			</thead>

			<tr>
        <?php
        if(empty($_POST['busqtipo'])){
              $busqtipo="";

         }else {
            $busqtipo=$_POST['busqtipo'];
          }
        $consulta=mysqli_query($con,"SELECT * from sensores where fecha_hora like '%".$busqtipo."%' or temperatura like '%".$busqtipo."%' or humedad like '%".$busqtipo."%'or tierra_humedad like '%".$busqtipo."%'or lluvia like '%".$busqtipo."%'or bomba like '%".$busqtipo."%' ORDER BY fecha_hora DESC");
         while($row=mysqli_fetch_array($consulta)){
        ?>

              <td><?php echo $row['fecha_hora']; ?> </td>
              <td><?php echo substr($row['temperatura'],2,-3)." ºC"; ?> </td>
              <td><?php echo substr($row['humedad'],2,-3)." %"; ?> </td>
              <td><?php echo substr($row['tierra_humedad'],2,-3)." %"; ?> </td>
              <td><?php echo substr($row['lluvia'],2,-3)." %"; ?> </td>
              <td><?php echo substr($row['bomba'],2,-3); ?> </td>
      </tr>
        <?php
              }
        ?>

</table>
</center>
</div>
  </body>
</html>
<?php

 if($tempe<=30.00 and $tempe>=15.00){ ?>
<script type="text/javascript">
  $('#1').addClass('color');
</script>
<?php }elseif ($tempe<=35.00 and $tempe>=31.00 or $tempe<=14.00 and $tempe>=5.00) { ?>
<script type="text/javascript">
    $('#1').addClass('color2');
</script>
<?php }elseif ($tempe<=4.00 or $tempe>=36.00) {?>
<script type="text/javascript">
    $('#1').addClass('color3');
</script>
<?php }


if($humedad<=80.00 and $humedad>=50.00){ ?>
<script type="text/javascript">
 $('#2').addClass('color');
</script>
<?php }elseif ($humedad<=90.00 and $humedad>=81.00 or $humedad<=49.00 and $humedad>=41.00) { ?>
<script type="text/javascript">
   $('#2').addClass('color2');
</script>
<?php }elseif ($humedad<=40.00 or $humedad>=91.00) {?>
<script type="text/javascript">
   $('#2').addClass('color3');
</script>
<?php }




if($tierra<=650 and $tierra>=100){ ?>
<script type="text/javascript">
 $('#3').addClass('color');
</script>
<?php }elseif ($tierra<=1000 and $tierra>=660 or $tierra<=99 and $tierra>=10) { ?>
<script type="text/javascript">
   $('#3').addClass('color2');
</script>
<?php }elseif ($tierra<=9 or $tierra>=1001) {?>
<script type="text/javascript">
   $('#3').addClass('color3');
</script>
<?php }

?>
