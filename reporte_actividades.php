<?php
include('TD_reportes.php');
include('conexion.php');
 if (isset($_POST['otraB'])) {
  $otra=$_POST['otraB'];
 $consulta=mysqli_query($con,"SELECT * from actividadesu AU INNER JOIN usuarios U on AU.id_usuario=U.id_usuario INNER JOIN actividad A on AU.id_actividad=A.id_actividad where U.nombres like '%".$otra."%' or U.apellidos like '%".$otra."%' ORDER BY fecha ASC");
}else {
if(empty($_POST['Xfechaini']) and empty($_POST['Xfechafin'])){
      $desde="";
      $hasta="";
       $consulta=mysqli_query($con,"SELECT * from actividadesu AU INNER JOIN usuarios U on AU.id_usuario=U.id_usuario INNER JOIN actividad A on AU.id_actividad=A.id_actividad
         where AU.fecha like '%".$desde."%' ORDER BY AU.fecha ASC");
 }else {
   $hasta=$_POST['Xfechaini'];
   $desde=$_POST['Xfechafin'];
   $consulta=mysqli_query($con,"SELECT * from actividadesu AU INNER JOIN usuarios U on AU.id_usuario=U.id_usuario INNER JOIN actividad A on AU.id_actividad=A.id_actividad
   where AU.fecha BETWEEN '$desde' and '$hasta' ORDER BY AU.fecha ASC");
 }
 }
//$consulta=mysqli_query($con,"SELECT * from actividadesu AU INNER JOIN usuarios U on AU.id_usuario=U.id_usuario INNER JOIN actividad A on AU.id_actividad=A.id_actividad ORDER BY fecha ASC");

$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(170,10,'REPORTE DE ACTIVIDADES',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetY($y+15);
$pdf->SetFont('arial','B',8);
$pdf->Cell(22,10,'Fecha',1,0,'C');
$pdf->Cell(40,10,'Nombres',1,0,'C');
$pdf->Cell(40,10,'Apellidos',1,0,'C');
$pdf->Cell(20,10,'Actividad',1,0,'C');
$pdf->Cell(65,10,utf8_decode('Descripción'),1,1,'C');

$pdf->SetFont('arial','B',8);
while($row5=mysqli_fetch_array($consulta)){
$pdf->Cell(22,10,$row5['fecha'],'LR',0,'C');
$pdf->Cell(40,10,utf8_decode($row5['nombres']),'R',0,'C');
$pdf->Cell(40,10,utf8_decode($row5['apellidos']),'R',0,'C');
$pdf->Cell(20,10,utf8_decode($row5['trabajo']),'R',0,'C');
$y=$pdf->GetY();
$pdf->SetXY(132,$y);
$pdf->MultiCell(65,5,utf8_decode($row5['descripcion']),'R','L',0);

}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
