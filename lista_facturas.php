<?php
 include('menu.php');
 include('conexion.php');
$id_produc0=$_SESSION['ID'];
 ?>
<div class="content_todo">
  <center>
    <h1 class="titulo">LISTA FACTURAS</h1>
  <hr><br>
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
        <th>COMPRADOR</th>
        <th>CANTIDAD VENDIDA</th>
        <th>PRECIO UNITARIO</th>
        <th>SUB TOTAL</th>
        <th>IVA</th>
        <th>DESCUENTOS</th>
        <th>TOTAL</th>
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
      $consulta=mysqli_query($con,"SELECT * from factura where fecha like '%".$busqtipo."%' ORDER BY fecha DESC");
       while($row=mysqli_fetch_array($consulta)){
      ?>

            <td><?php echo $row['fecha']; ?> </td>
            <td><?php echo $row['comprador']; ?> </td>
            <td><?php echo $row['cantidad']; ?> </td>
            <td><?php echo $row['precioU']; ?> </td>
            <td><?php echo $row['preciot']; ?> </td>
            <td><?php echo $row['iva']; ?> </td>
            <td><?php echo $row['descuento']; ?> </td>
            <td><?php echo $row['total']; ?> </td>
            <td><a href="modificar_factura.php?id=<?php echo $row['id_factura'];?>" class="modificar"><i class="far fa-edit">MODIFICAR</i></a></td>
    </tr>
      <?php
            }
      ?>

</table>
