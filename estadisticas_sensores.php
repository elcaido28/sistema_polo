<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">

  <h2 class="titulo">ESTADISTICA DE LOS SENSORES</h2>
<hr><br>
<div class="estadis_sendor">
<div class="col1" id="example-content">
  <?php
  $consulta=mysqli_query($con,"SELECT Max(temperatura) Mxtemp,Min(temperatura) Mntemp,Max(humedad) Mxhume,Min(humedad) Mnhume from sensores ");
   while($row=mysqli_fetch_array($consulta)){
     $maxtempera=substr($row['Mxtemp'],2,-3);
     $mintempera=substr($row['Mntemp'],2,-3);
     $maxhumedad=substr($row['Mxhume'],2,-3);
     $minhumedad=substr($row['Mnhume'],2,-3);
   }
   $consulta1=mysqli_query($con,"SELECT temperatura,COUNT(temperatura)TEMP FROM sensores GROUP BY temperatura ORDER BY TEMP ASC ");
    while($row1=mysqli_fetch_array($consulta1)){
      $tempMas=substr($row1['temperatura'],2,-3);
    }
    $consulta2=mysqli_query($con,"SELECT humedad,COUNT(humedad) HUME FROM sensores GROUP BY humedad ORDER BY HUME ASC ");
     while($row2=mysqli_fetch_array($consulta2)){
       $humeMas=substr($row2['humedad'],2,-3);
     }

   $msmTemp="LA TEMPERATURA FLUCTUA ENTRE LOS ".$mintempera."ºC Y LOS ".$maxtempera."ºC GRADOS SENTIGRADOS. LA TEMPERATURA MAS FRECUENTE ES DE ".$tempMas."ºC.";
   $msmHume="LA HUMEDAD DEL AMBIENE FLUCTUA ENTRE ".$minhumedad."% Y LOS ".$maxhumedad."%. LA HUMEDAD MAS FRECUENTE ES DE ".$humeMas."%.";
   ?>
  <div class="est1">
      <div class="jqplot" style="height:450px; width:530px;"></div>
      <div class="leyenda_grafica">
        <p class="naranja"><?php echo $msmHume; ?></p>
        <p class="azul"><?php echo $msmTemp; ?></p>
      </div>
  </div>

  <?php
  $consulta=mysqli_query($con,"SELECT Max(tierra_humedad) Mxtie_hume,Min(tierra_humedad) Mntie_hume,Max(lluvia) Mxlluvia,Min(lluvia) Mnlluvia from sensores ");
   while($row=mysqli_fetch_array($consulta)){
     $maxtierraH=substr($row['Mxtie_hume'],2,-3);
     $mintierraH=substr($row['Mntie_hume'],2,-3);
     $maxlluvia=substr($row['Mxlluvia'],2,-3);
     $minlluvia=substr($row['Mnlluvia'],2,-3);
   }
   $consulta1=mysqli_query($con,"SELECT tierra_humedad,COUNT(tierra_humedad) TIEH FROM sensores GROUP BY tierra_humedad ORDER BY TIEH ASC ");
    while($row1=mysqli_fetch_array($consulta1)){
      $tierraHMas=substr($row1['tierra_humedad'],2,-3);
    }
    $consulta2=mysqli_query($con,"SELECT lluvia,COUNT(lluvia) LLUV FROM sensores GROUP BY lluvia ORDER BY LLUV ASC ");
     while($row2=mysqli_fetch_array($consulta2)){
       $lluviaMas=substr($row2['lluvia'],2,-3);
     }

   $msmTemp="LA HUMEDAD DE LA TIERRA FLUCTUA ENTRE ".$mintierraH."% Y LOS ".$maxtierraH."% PORCIENTO. LA HUMEDAD DE LA TIERRA MAS FRECUENTE ES DE ".$tierraHMas."%.";
   $msmHume="LOS VALORES DE LLUVIA FLUCTUA ENTRE ".$minlluvia."% Y LOS ".$maxlluvia."% . EL VALOR DE LLUVIA MAS FRECUENTE ES DE ".$lluviaMas."%.";
   ?>
  <div class="est2">
  <div class="chart2" style="height:450px; width:530px;"></div>
  <div class="leyenda_grafica">
    <p class="naranja"><?php echo $msmHume; ?></p>
    <p class="azul"><?php echo $msmTemp; ?></p>
  </div>
</div>
</div>


  <script class="code" type="text/javascript">
  $(document).ready(function(){
    // Some simple loops to build up data arrays.
      var powPoints1 = [];
      var powPoints2 = [];
      var powPoints3 = [];
      var powPoints4 = [];
      var i=0;
      var tempera=0;
      var hume;
      var tierra_hume;
      var lluvia=0;
    <?php
    $consulta=mysqli_query($con,"SELECT * from sensores");
     while($row=mysqli_fetch_array($consulta)){
     ?>
     i+=+1;
     tempera=<?php echo substr($row['temperatura'],2,-1);  ?>
     hume=<?php echo substr($row['humedad'],2,-1);  ?>
     tierra_hume=<?php echo substr($row['tierra_humedad'],2,-1);  ?>
     lluvia=<?php echo substr($row['lluvia'],2,-1);  ?>

        powPoints1.push([i, tempera]);
        powPoints2.push([i, hume]);
        powPoints3.push([i, tierra_hume]);
        powPoints4.push([i, lluvia]);

    <?php } ?>
    // jQuery selector for all divs with a class of "jqplot".
    // Here, there are two divs that match.  By supplying 2 seperate
    // arrays of data, each plot will have it's own independent series.
    // Only one options array is supplied, so it will be used for both
    // plots.
    $(".jqplot").jqplot([powPoints1, powPoints2], {
        title: "GRAFICO ESTADISTICO DE TEMPERATURA Y HUMEDAD",
        animate: !$.jqplot.use_excanvas,
        seriesDefaults: {
            rendererOptions: {
                smooth: true
            }
        }
    });
    $(".chart2").jqplot([powPoints3, powPoints4], {
        title: "GRAFICO ESTADISTICO DE HUMEDAD TIERRA Y LLUVIA",
        animate: !$.jqplot.use_excanvas,
        seriesDefaults: {
            rendererOptions: {
                smooth: true
            }
        }
    });


  });
  </script>
</div>

</div>


<script class="include" type="text/javascript" src="jquery.jqplot.min.js"></script>
<script type="text/javascript" src="syntaxhighlighter/scripts/shCore.min.js"></script>
<script type="text/javascript" src="syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
<script type="text/javascript" src="syntaxhighlighter/scripts/shBrushXml.min.js"></script>
<!-- End Don't touch this! -->

<!-- Additional plugins go here -->

<script class="include" type="text/javascript" src="plugins/jqplot.canvasTextRenderer.min.js"></script>
<script class="include" type="text/javascript" src="plugins/jqplot.canvasAxisLabelRenderer.min.js"></script>

  </body>
</html>


<?php
if($tempMas<=30.00 and $tempMas>=15.00){ ?>
<script type="text/javascript">
 $('.est1').addClass('color');
</script>
<?php }elseif ($tempMas<=35.00 and $tempMas>=31.00 or $tempMas<=14.00 and $tempMas>=5.00) { ?>
<script type="text/javascript">
   $('.est1').addClass('color2');
</script>
<?php }elseif ($tempMas<=4.00 or $tempMas>=36.00) {?>
<script type="text/javascript">
   $('.est1').addClass('color3');
</script>
<?php }


if($tierraHMas<=650 and $tierraHMas>=100){ ?>
<script type="text/javascript">
 $('.est2').addClass('color');
</script>
<?php }elseif ($tierraHMas<=1000 and $tierraHMas>=660 or $tierraHMas<=99 and $tierraHMas>=10) { ?>
<script type="text/javascript">
   $('.est2').addClass('color2');
</script>
<?php }elseif ($tierraHMas<=9 or $tierraHMas>=1001) {?>
<script type="text/javascript">
   $('.est2').addClass('color3');
</script>
<?php }

 ?>
