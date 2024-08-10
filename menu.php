<?php session_start();
if ($_SESSION['Est']=="ACTIVO" and isset($_SESSION['TE'])) {

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="Sistema Polo" content="">
    <link rel="shortcut icon" type="image/x-icon" href="LOGHP.png">
    <title>Sistema Polo</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.rawgit.com/olton/Metro-UI-CSS/master/build/css/metro-icons.min.css">
    <link rel="stylesheet" href="estilo_todo.css">
      <script src="validaciones.js"></script>


    <link class="include" rel="stylesheet" type="text/css" href="jquery.jqplot.min.css" />
    <link rel="stylesheet" type="text/css" href="examples.min.css" />
    <link type="text/css" rel="stylesheet" href="syntaxhighlighter/styles/shCoreDefault.min.css" />
    <link type="text/css" rel="stylesheet" href="syntaxhighlighter/styles/shThemejqPlot.min.css" />
<script class="include" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



  </head>
  <body>

  <nav class="menutop">
    <img src="logomenu.png" alt="" width="65px" height="40px">
  <ul class="navtop">
    <li><i class="far fa-user principales"></i> <?php echo $_SESSION['NU']; ?> </li>
    <li class="li2"><a href="salir.php">SALIR  <i class="fas fa-sign-in-alt"></i></a></li>
  </ul>
  </nav>

    <div class="container">
  		<span class="mif-chevron-left mif-3x boton"></span>
  		<nav>
  			<ul id="menu_principal">
           <?php if ($_SESSION['TE']=="ADMIN") { ?>
  				<li><a href="inicio.php"><span class="mif-home mif-3x principales"></span>Inicio</a></li>
  				<li>
  					<label for="drop-1">
  						<span class="fas fa-clipboard fa-w-12 fa-2x principales"></span>
  						Información
  						<span class="mif-chevron-right mif-2x derecha"></span>
  						<span class="mif-expand-more mif-2x derecha"></span>
  					</label>
  					<input type="checkbox" id="drop-1">

  					<ul>
  						<li><a href="vista_sensores.php">Sensores</a></li>
  						<li><a href="estadisticas_sensores.php">Estadisticas</a></li>
  					</ul>
  				</li>


  				<li>
  					<label for="drop-2">
  						<span class="mif-widgets mif-3x principales"></span>
  						Produccion
  						<span class="mif-chevron-right mif-2x derecha"></span>
  						<span class="mif-expand-more mif-2x derecha"></span>
  					</label>
  					<input type="checkbox" id="drop-2">

  					<ul>
  						<li><a href="ingreso_pasoProduc.php">Registrar</a></li>
              <li><a href="ingreso_produccion.php">Produccion/Cosecha</a></li>
              <li><a href="vista_produccion.php">Administrar</a></li>

  					   <!-- <li>
  							<label for="drop-3">
  								Servicio 2
  								<span class="mif-chevron-right mif-2x derecha"></span>
  								<span class="mif-expand-more mif-2x derecha"></span>
  							</label>
  							<input type="checkbox" id="drop-3">
  							<ul>
  								<li><a href="">Elemento 1</a></li>
  								<li><a href="">Elemento 2</a></li>
  								<li><a href="">Elemento 3</a></li>
  								<li><a href="">Elemento 4</a></li>
  								<li><a href="">Elemento 5</a></li>
  							</ul>

  						</li>

  						<li><a href="">Servicio 3</a></li>
  						<li><a href="">Servicio 4</a></li>
  						<li><a href="">Servicio 5</a></li> -->
  					</ul>

  				</li>

    <?php } ?>
    <?php if (isset($_SESSION['TE'])) { ?>

  				<li><label for="drop-3"><span class="fas fa-clipboard-list fa-w-12 fa-2x principales"></span> Actividades<span class="mif-chevron-right mif-2x derecha"></span> <span class="mif-expand-more mif-2x derecha"></span> </label>
            <ul>
    <?php } ?>
      <?php if ($_SESSION['TE']=="ADMIN") { ?>
  						<li><a href="lista_usuariosAct.php">Gestionar</a></li>
      <?php } ?>
    <?php if (isset($_SESSION['TE'])) {?>
              <li><a href="lista_actividades.php">Lisado/Actividades</a></li>
    <?php } ?>
    <?php if ($_SESSION['TE']=="ADMIN") { ?>
            </ul>
          </li>
          <li><label for="drop-3"><span class="far fa-file-alt fa-w-12 fa-2x principales"></span> Reportes<span class="mif-chevron-right mif-2x derecha"></span> <span class="mif-expand-more mif-2x derecha"></span> </label>
            <ul>
              <li><label for="drop-3"> Cultivo<span class="mif-chevron-right mif-2x derecha"></span> <span class="mif-expand-more mif-2x derecha"></span> </label>
                <input type="checkbox" id="drop-3">
                <ul>
                  <li><a href="resporte_verXfecha_produccion.php">Producciones</a></li>
                  <li><a href="resporte_verXfecha_facturas.php">Facturas</a></li>
                  <li><a href="resporte_verXfecha_cada_produccion.php">Produccion / Cosecha</a></li>
                </ul>
              </li>
              <!-- <li><label for="drop-3"> Reporte 2 <span class="mif-chevron-right mif-2x derecha"></span> <span class="mif-expand-more mif-2x derecha"></span> </label>
                <input type="checkbox" id="drop-3">
                <ul>
                  <li><a href="">Elemento 1</a></li>
                  <li><a href="">Elemento 2</a></li>
                  <li><a href="">Elemento 3</a></li>
                </ul>
              </li> -->
              <li><a href="resporte_verXfecha_actividad.php">Actividades</a></li>
              <li><a href="reporte_usuarios.php">Usuarios</a></li>
            </ul>
          </li>

          <li><label for="drop-3"><span class="fas fa-money-bill-alt fa-w-12 fa-2x principales"></span> Facturas<span class="mif-chevron-right mif-2x derecha"></span> <span class="mif-expand-more mif-2x derecha"></span> </label>
            <ul>
  						<li><a href="ingreso_factura.php">Registrar</a></li>
              <li><a href="lista_facturas.php">Facturas</a></li>
            </ul>
          </li>
          <li><label for="drop-3"><span class="mif-organization mif-3x principales"></span> Administrador<span class="mif-chevron-right mif-2x derecha"></span> <span class="mif-expand-more mif-2x derecha"></span> </label>
            <ul>
              <li><label for="drop-3"> Ingresos<span class="mif-chevron-right mif-2x derecha"></span> <span class="mif-expand-more mif-2x derecha"></span> </label>
                <ul>
                  <li><a href="ingreso_actividad.php">Actividades/Trabajos</a></li>
                  <li><a href="ingreso_privilegio.php">Privilegios</a></li>
                </ul>
  						<li><label for="drop-3"> Usuarios<span class="mif-chevron-right mif-2x derecha"></span> <span class="mif-expand-more mif-2x derecha"></span> </label>
                <ul>
                  <li><a href="ingreso_usuario.php">Gestionar</a></li>
                </ul>
              </li>
            </ul>
          </li>
  			</ul>
  		</nav>
  <?php } ?>
  	</div>
  <script src="menu_vertical.js"></script>
<!-- <div class="content_todo">
</div> -->
  </body>
</html>
<?php }else{
  $_SESSION['mensaje']="2";
 header("Location:index.php");
} ?>
