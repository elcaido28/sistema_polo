<?php
 include('menu.php');
 include('conexion.php');
 ?>
<div class="content_todo">
<center>
  <h2 class="titulo">RENDIMIENTO DE LA PRODUCCION</h2>
<hr> <br>  
<div class="col1" id="example-content">
</center> <h5 class="etiq_F_G2">Kg Producidos</h5> <center>
  <div class="grafic2">
    <div id="chart1"  style="margin-top:20px; margin-left:20px; height:480px; width:100%;"></div>
  </div>
 <h4 class="etiq_F_G">Fechas de Produccion</h4>
</div>

<script type="text/javascript">
$(document).ready(function(){
      $.jqplot.config.enablePlugins = true;
      var totalP= 0;
      var fecha;
      var s1 = [];
      var ticks = [];
      var i=0;
      <?php
      $consulta=mysqli_query($con,"SELECT * from producciones");
       while($row=mysqli_fetch_array($consulta)){

       ?>
       i+=+1;
       totalP=<?php echo $row['total_prod']; ?>;
       fecha='<?php echo $row['fecha'];?>';
          s1.push([i, totalP]);
          ticks.push([fecha]);
      <?php } ?>


      plot1 = $.jqplot('chart1', [s1], {
          // Only animate if we're not using excanvas (not in IE 7 or IE 8)..
          title: "GRAFICO ESTADISTICO DE PRODUCCION (1000 Kg) POR COSECHA (Fecha 01-01-2018)",

          animate: !$.jqplot.use_excanvas,
          seriesDefaults:{
              renderer:$.jqplot.BarRenderer,
              pointLabels: { show: true }
          },
          axes: {
              xaxis: {
                  renderer: $.jqplot.CategoryAxisRenderer,
                  ticks: ticks
              }
          },
          highlighter: { show: false }
      });

      $('#chart1').bind('jqplotDataClick',
          function (ev, seriesIndex, pointIndex, data) {
              $('#info1').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
          }
      );
  });
</script>
</center>


</div>
<script class="include" type="text/javascript" src="jquery.jqplot.min.js"></script>
<script type="text/javascript" src="syntaxhighlighter/scripts/shCore.min.js"></script>
<script type="text/javascript" src="syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
<script type="text/javascript" src="syntaxhighlighter/scripts/shBrushXml.min.js"></script>
<!-- End Don't touch this! -->

<!-- Additional plugins go here -->

<script class="include" type="text/javascript" src="plugins/jqplot.barRenderer.min.js"></script>
<script class="include" type="text/javascript" src="plugins/jqplot.pieRenderer.min.js"></script>
<script class="include" type="text/javascript" src="plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script class="include" type="text/javascript" src="plugins/jqplot.pointLabels.min.js"></script>

  </body>
</html>
