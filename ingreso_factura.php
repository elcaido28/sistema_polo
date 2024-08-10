<?php
 include('menu.php');
 include('conexion.php');
$id_produc0=$_SESSION['ID'];
 ?>
<div class="content_todo">
  <center>
    <h1 class="titulo">REGISTRO DE FACTURA DE LA PRODUCCIÓN</h1>
  <hr><br>

<?php
$consulta=mysqli_query($con,"SELECT * FROM producciones order by fecha ASC");
while($row=mysqli_fetch_array($consulta)){
$id=$row['id_produccion'];
$fechap=$row['fecha'];
$cantcaja=$row['cajas'];
}
$consulta2=mysqli_query($con,"SELECT SUM(cantidad)canti FROM factura order by fecha ASC");
while($row2=mysqli_fetch_array($consulta2)){
$cantF=$row2['canti'];
}
if (isset($cantF)) {
  $cantcajaT=$cantcaja-$cantF;
}else {
  $cantcajaT=$cantcaja;
}
 ?>

  <form class="formu" action="guardar_factura.php?id=<?php echo $id; ?>" method="post">
    <label for="" class="etiq">Fecha de Producción</label>
    <input type="text" class="cajatext" name="fechaP" value="<?php echo $fechap; ?>" onkeypress="return enable(event)" onpaste="return false">
    <label for="" class="etiq">Cajas Disponibles</label>
    <input type="text" class="cajatext" placeholder="Cajas Disponibles" name="cliente" value="<?php echo $cantcajaT; ?>" onkeypress="return enable(event)" onpaste="return false">
    <p class="separador"> _____________________________________________________________________________________________________</p>

    <label for="" class="etiq">Fecha</label>
    <input type="date" class="cajatext" name="fecha" value="" required>
    <label for="" class="etiq">Cliente Comprador</label>
    <input type="text"  class="cajatext" placeholder="Ejemplo: Juan Ordoñez" name="cliente" value="" onkeypress="return sololetras(event)" required>
    <label for="" class="etiq">Catidad</label>
    <input type="text" class="cajatext" id="1" name="cantidad" placeholder="Cajas: 25" value="" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <label for="" class="etiq">Precio Unitario($)</label>
    <input type="text" class="cajatext" id="2" name="preciou" onChange="calcu1(this.value);" placeholder="Precio($): 4.00" value="" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <label for="" class="etiq">Sub total($)</label>
    <input type="text" class="cajatext" id="3" name="preciot" placeholder="Sub total($): 100" value="" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <label for="" class="etiq">IVA</label>
    <input type="text" class="cajatext" id="4" name="iva" placeholder="iva ($): 12.00" value="" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <label for="" class="etiq">Descuento</label>
    <input type="text" class="cajatext" id="5" name="descuento" onChange="calcu2(this.value);" placeholder="Descuento ($): 10.00" value="" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <label for="" class="etiq">Total</label>
    <input type="text" class="cajatext" id="6" name="total" placeholder="TOTAL ($): 10.00" value="" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <div class="C_btn">
      <input type="submit" class="aceptar" name="" value="FACTURAR">
    </div>
  </form>


  <script type="text/javascript">
  function calcu1() {
   var cantidad=document.getElementById('1').value;
   var precio=document.getElementById('2').value;
   var subt=cantidad*precio;
    document.getElementById('3').value=subt;
    var iva=subt*0.12;
    document.getElementById('4').value=iva;
    var descuento=document.getElementById('5').value;
    var total=iva+subt;
    document.getElementById('6').value= total;
  }
function calcu2(){
  var tota =document.getElementById('6').value;
  var descuento2=document.getElementById('5').value;
  var totalT=tota-descuento2;
  document.getElementById('6').value=totalT;
}
</script>

</center>
</div>
</body>
</html>
