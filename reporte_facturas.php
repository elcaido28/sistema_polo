<?php
include('TD_reportes_Horizontal.php');
include('conexion.php');
 if (isset($_POST['otraB'])) {
$otra=$_POST['otraB'];
$consulta=mysqli_query($con,"SELECT *,P.fecha fech,F.fecha fech2 from producciones P inner join factura F on P.id_produccion=F.id_produccion
where F.comprador like '%".$otra."%' ORDER BY F.fecha ASC");
 }else {
    if(empty($_POST['Xfechaini']) and empty($_POST['Xfechafin'])){
      $desde="";
      $hasta="";
      $consulta=mysqli_query($con,"SELECT *,P.fecha fech,F.fecha fech2 from producciones P inner join factura F on P.id_produccion=F.id_produccion
      where F.fecha like '%".$desde."%' ORDER BY F.fecha ASC");
     }else {
     $hasta=$_POST['Xfechaini'];
     $desde=$_POST['Xfechafin'];
     $consulta=mysqli_query($con,"SELECT *,P.fecha fech,F.fecha fech2 from producciones P inner join factura F on P.id_produccion=F.id_produccion
    where F.fecha BETWEEN '$desde' and '$hasta' ORDER BY F.fecha ASC");
 }
}
//$consulta=mysqli_query($con,"SELECT *,P.fecha fech,F.fecha fech2 from producciones P inner join factura F on P.id_produccion=F.id_produccion ORDER BY F.fecha ASC");

$pdf=new PDF('L','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(65,25);
$pdf->Cell(170,10,utf8_decode('REPORTE DE FACTURAS POR FECHA'),0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetXY(40,$y+15);
$pdf->SetFont('arial','B',8);
$pdf->Cell(30,10,'Fecha de Produccion',1,0,'C');
$pdf->Cell(25,10,'Fecha de Factura',1,0,'C');
$pdf->Cell(50,10,'Comprador',1,0,'C');
$pdf->Cell(20,10,'Cantidad',1,0,'C');
$pdf->Cell(25,10,utf8_decode('Precio Uni.'),1,0,'C');
$pdf->Cell(25,10,'Sub Total',1,0,'C');
$pdf->Cell(10,10,'IVA',1,0,'C');
$pdf->Cell(20,10,'Descuento',1,0,'C');
$pdf->Cell(20,10,'TOTAL',1,1,'C');


$pdf->SetFont('arial','B',8);
while($row5=mysqli_fetch_array($consulta)){
  $y=$pdf->GetY();
  $pdf->SetXY(40,$y);
$pdf->Cell(30,10,$row5['fech'],1,0,'C');
$pdf->Cell(25,10,$row5['fech2'],1,0,'C');
$pdf->Cell(50,10,$row5['comprador'],1,0,'C');
$pdf->Cell(20,10,$row5['cantidad'],1,0,'C');
$pdf->Cell(25,10,$row5['precioU'],1,0,'C');
$pdf->Cell(25,10,$row5['preciot'],1,0,'C');
$pdf->Cell(10,10,$row5['iva'],1,0,'C');
$pdf->Cell(20,10,$row5['descuento'],1,0,'C');
$pdf->Cell(20,10,$row5['total'],1,1,'C');
}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
