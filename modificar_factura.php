<?php
 include('menu.php');
 include('conexion.php');
$id_produc0=$_SESSION['ID'];
 ?>
<div class="content_todo">
  <center>
    <h1 class="titulo">MODIFICACIÓN DE FACTURA DE LA PRODUCCIÓN</h1>
  <hr><br>

<?php
$id=$_REQUEST['id'];
$consulta=mysqli_query($con,"SELECT * FROM factura where id_factura='$id'");
$row=mysqli_fetch_assoc($consulta);

$fecha=$row['fecha'];
$comprador=$row['comprador'];
$cantidad=$row['cantidad'];
$precioU=$row['precioU'];
$preciot=$row['preciot'];
$iva=$row['iva'];
$descuento=$row['descuento'];
$total=$row['total'];
$idp=$row['id_produccion'];

 ?>
  <form class="formu" action="modificarPro_factura.php?id=<?php echo $id; ?>" method="post">
    <label for="" class="etiq">Fecha</label>
    <input type="date" class="cajatext" name="fecha" value="<?php echo $fecha; ?>" required>
    <label for="" class="etiq">Cliente Comprador</label>
    <input type="text"  class="cajatext" placeholder="Ejemplo: Juan Ordoñez" name="cliente" value="<?php echo $comprador; ?>" required>
    <label for="" class="etiq">Catidad</label>
    <input type="text" class="cajatext" id="1" name="cantidad" placeholder="Cajas: 25" value="<?php echo $cantidad; ?>" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <label for="" class="etiq">Precio Unitario($)</label>
    <input type="text" class="cajatext" name="preciou" id="2"  onChange="calcu1(this.value);" placeholder="Precio($): 4.00" value="<?php echo $precioU; ?>" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <label for="" class="etiq">Sub total($)</label>
    <input type="text" class="cajatext" name="preciot" id="3" placeholder="Sub total($): 100" value="<?php echo $preciot; ?>" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <label for="" class="etiq">IVA</label>
    <input type="text" class="cajatext" name="iva" id="4" placeholder="iva ($): 12.00" value="<?php echo $iva; ?>" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <label for="" class="etiq">Descuento</label>
    <input type="text" class="cajatext" name="descuento" id="5"  onChange="calcu2(this.value);" placeholder="Descuento ($): 10.00" value="<?php echo $descuento; ?>" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <label for="" class="etiq">Total</label>
    <input type="text" class="cajatext" name="total" id="6" placeholder="TOTAL ($): 10.00" value="<?php echo $total; ?>" onkeypress="return solonumeros(event)" onpaste="return false" required>
    <div class="C_btn">
      <input type="submit" class="aceptar" name="" value="MODIFICAR">
      <a href="lista_facturas.php" class="cancelar">CANCELAR</a>
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
