<?php
 include('menu.php');
 include('conexion.php');
$_SESSION['ID']=$_REQUEST['id'];
$id_produc0=$_SESSION['ID'];
 ?>
<div class="content_todo">
  <center>
    <h1 class="tituloF">REGISTRO DE LA PRODUCCIÓN</h1><hr><br></center>
  <div class="div_1">
    <div class="div_2">
      <h3>LAVADO</h3>
      <a href="ingreso_pasoProduc1.php"><img src="img/lavado.jpg" alt=""></a>
    </div>
    <div class="div_2">
      <h3>SELECCIONADO</h3>
      <a href="ingreso_pasoProduc2.php"><img src="img/seleccionado.jpg" alt=""></a>
    </div>
    <div class="div_2">
      <h3>EMPAQUETADO</h3>
      <a href="ingreso_pasoProduc3.php"><img src="img/empaquetado.jpg" alt=""></a>
    </div>
    <div class="div_2">
      <h3>DISTRIBUCIÓN</h3>
      <a href="ingreso_pasoProduc4.php"><img src="img/distribucion.jpg" alt=""></a>
    </div>


  </div>



</div>
</body>
</html>
