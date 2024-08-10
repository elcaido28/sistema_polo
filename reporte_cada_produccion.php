<?php
include('TD_reportes.php');
include('conexion.php');

 $otra=$_POST['otraB'];
$consulta=mysqli_query($con,"SELECT * from producciones where fecha='$otra'");

$pdf=new PDF('P','mm','A4');#(orizontal L o vertical P,medida cm mm, A3-A4)
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('arial','B',12);
$pdf->SetXY(20,17);
$pdf->Cell(170,10,'REPORTE DE PRODUCCION  DE HECTAREA',0,1,'C');#(ancho,alto,texto,borde,salto linea,alineacion L C R)

$y=$pdf->GetY();
$pdf->SetXY(-185,$y+15);
$pdf->SetFont('arial','B',8);
$pdf->Cell(22,10,'Fecha',1,0,'C');
$pdf->Cell(25,10,'Hectareas',1,0,'C');
$pdf->Cell(30,10,'Produccion',1,0,'C');
$pdf->Cell(35,10,'Mermas',1,0,'C');
$pdf->Cell(25,10,utf8_decode('Nº de Cajas'),1,0,'C');
$pdf->Cell(27,10,'Valores',1,1,'C');

$pdf->SetFont('arial','B',8);
while($row1=mysqli_fetch_assoc($consulta)){
  $y=$pdf->GetY();
  $pdf->SetXY(-185,$y);
$pdf->Cell(22,10,$row1['fecha'],1,0,'C');
$pdf->Cell(25,10,$row1['canti_planta'],1,0,'C');
$pdf->Cell(30,10,$row1['total_prod'],1,0,'C');
$pdf->Cell(35,10,$row1['merma'],1,0,'C');
$pdf->Cell(25,10,$row1['cajas'],1,0,'C');
$pdf->Cell(27,10,$row1['valor'],1,1,'C');
}

$y2=$pdf->GetY();
$y2=$y2+10;
$pdf->SetXY(-188,$y2);
$pdf->SetFont('arial','B',8);
$pdf->Cell(22,10,'Labadas',1,0,'C');
$pdf->Cell(22,10,'Distribuciones',1,0,'C');
$pdf->Cell(15,10,' ',0,0,'C');
$pdf->Cell(47,10,'Mermas',1,0,'C');
$pdf->Cell(15,10,' ',0,0,'C');
$pdf->Cell(47,10,'Cajas',1,1,'C');

$consulta2=mysqli_num_rows(mysqli_query($con,"SELECT * from regis_produccion RP inner join regis_produccion1 RPa on RP.id_regis_produccion=RPa.id_regis_produccion where RP.fecha='$otra'"));

  $y=$pdf->GetY();
  $pdf->SetXY(-188,$y);
$pdf->Cell(22,10,$consulta2,1,0,'C');

$consulta3=mysqli_num_rows(mysqli_query($con,"SELECT * from regis_produccion RP inner join regis_produccion4 RPd on RP.id_regis_produccion=RPd.id_regis_produccion where RP.fecha='$otra'"));

  $y=$pdf->GetY();
  $pdf->SetXY(-166,$y);
$pdf->Cell(22,10,$consulta3,1,0,'C');


$consulta4=mysqli_query($con,"SELECT * from regis_produccion RP inner join regis_produccion2 RPb on RP.id_regis_produccion=RPb.id_regis_produccion where RP.fecha='$otra'");
  $y=$pdf->GetY();
while($row4=mysqli_fetch_array($consulta4)){
  $pdf->SetXY(-129,$y);
$pdf->Cell(22,10,$row4['fecha1'],1,0,'C');
$pdf->Cell(25,10,$row4['merma'],1,0,'C');
  $y=$y+10;
}
$y4=$pdf->GetY();

$consulta5=mysqli_query($con,"SELECT * from regis_produccion RP inner join regis_produccion3 RPc on RP.id_regis_produccion=RPc.id_regis_produccion where RP.fecha='$otra'");
$y2=$y2+10;
while($row5=mysqli_fetch_array($consulta5)){
  $pdf->SetXY(-67,$y2);
$pdf->Cell(22,10,$row5['fecha1'],1,0,'C');
$pdf->Cell(25,10,$row5['cant_caja'],1,0,'C');
  $y2=$y2+10;
}
$y5=$pdf->GetY();
if ($y4>=$y5) {
  $y=$y4+20;
}else{
  $y=$y5+20;
}

$pdf->SetXY(-175,$y);
$pdf->SetFont('arial','B',8);
$pdf->Cell(25,10,'Fecha',1,0,'C');
$pdf->Cell(40,10,'Comprador',1,0,'C');
$pdf->Cell(15,10,'Sub Total',1,0,'C');
$pdf->Cell(15,10,'IVA',1,0,'C');
$pdf->Cell(20,10,'Descuento',1,0,'C');
$pdf->Cell(20,10,'TOTAL',1,1,'C');
$consulta6=mysqli_query($con,"SELECT *,F.fecha fech from producciones P inner join factura F on P.id_produccion=F.id_produccion where P.fecha='$otra'");
$y=$y+10;
while($row6=mysqli_fetch_array($consulta6)){
  $pdf->SetXY(-175,$y);

$pdf->Cell(25,10,$row6['fech'],1,0,'C');
$pdf->Cell(40,10,$row6['comprador'],1,0,'C');
$pdf->Cell(15,10,$row6['preciot'],1,0,'C');
$pdf->Cell(15,10,$row6['iva'],1,0,'C');
$pdf->Cell(20,10,$row6['descuento'],1,0,'C');
$pdf->Cell(20,10,$row6['total'],1,0,'C');
$y=$y+10;
}
/*
$pdf->SetFont('arial','B',15);
$pdf->SetXY(10,70);
$pdf->MultiCell(60,5,'hola mundo como estan todo aqui',1,'C',0);
$pdf->MultiCell(100,5,'hola mundo como estan todo aqui',1,'C',0);
*/
$pdf->Output();
 ?>
