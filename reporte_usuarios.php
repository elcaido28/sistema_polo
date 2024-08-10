<?php
include('TD_reportes.php');
include('conexion.php');
//  if (isset($_POST['otraB'])) {
// $otra=$_POST['otraB'];
// $consulta=mysqli_query($con,"SELECT * from proyectos P INNER JOIN clientes C on P.id_cliente=C.id_cliente INNER JOIN empleados E on P.id_empleado= E.id_empleado INNER JOIN objetos_d_proy OP on P.id_proyecto=OP.id_proyecto INNER JOIN objetos_publicitarios O on O.id_objetos_publicitarios=OP.id_objeto_publicitario
//  where P.estado_proy like '%".$otra."%' or P.nombre_proy like '%".$otra."%' or P.id_proyecto like '%".$otra."%' or C.nombreEmp_cli like '%".$otra."%' or C.nombreEmp_cli like '%".$otra."%' ORDER BY nombre_proy ASC");
// }else {
// if(empty($_POST['Xfechaini']) and empty($_POST['Xfechafin'])){
//       $desde="";
//       $hasta="";
//
//       $consulta=mysqli_query($con,"SELECT * from proyectos P INNER JOIN clientes C on P.id_cliente=C.id_cliente INNER JOIN empleados E on P.id_empleado=E.id_empleado INNER JOIN objetos_d_proy OP on P.id_proyecto=OP.id_proyecto INNER JOIN objetos_publicitarios O on O.id_objetos_publicitarios=OP.id_objeto_publicitario
//       where P.fechap like '%".$desde."%' ORDER BY nombre_proy ASC");
//  }else {
//    $hasta=$_POST['Xfechaini'];
//    $desde=$_POST['Xfechafin'];
//    $consulta=mysqli_query($con,"SELECT * from proyectos P INNER JOIN clientes C on P.id_cliente=C.id_cliente INNER JOIN empleados E on P.id_empleado=E.id_empleado INNER JOIN objetos_d_proy OP on P.id_proyecto=OP.id_proyecto INNER JOIN objetos_publicitarios O on O.id_objetos_publicitarios=OP.id_objeto_publicitario
//   where P.fechap BETWEEN '$desde' and '$hasta' ORDER BY nombre_proy ASC");
// }
// }
$consulta=mysqli_query($con,"SELECT * from usuarios  ORDER BY apellidos ASC");

$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(170,10,'REPORTE DE USUARIOS',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetY($y+15);
$pdf->SetFont('arial','B',8);
$pdf->Cell(75,10,'Nombres   Apellidos',1,0,'C');
$pdf->Cell(20,10,'Cedula',1,0,'C');
$pdf->Cell(20,10,'Telefono',1,0,'C');
$pdf->Cell(30,10,'Usuario',1,0,'C');
$pdf->Cell(25,10,utf8_decode('Privilegio'),1,0,'C');
$pdf->Cell(20,10,'Estado',1,1,'C');

$pdf->SetFont('arial','B',8);
while($row5=mysqli_fetch_array($consulta)){
$pdf->Cell(75,10,utf8_decode($row5['nombres']." ".$row5['apellidos']),1,0,'C');
$pdf->Cell(20,10,$row5['cedula'],1,0,'C');
$pdf->Cell(20,10,$row5['telefono'],1,0,'C');
$pdf->Cell(30,10,utf8_decode($row5['nomusu']),1,0,'C');
$pdf->Cell(25,10,utf8_decode($row5['tipo_emple']),1,0,'C');
$pdf->Cell(20,10,$row5['estado'],1,1,'C');
}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
