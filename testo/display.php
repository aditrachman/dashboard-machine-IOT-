<!-- UNTUK PHP DI TARUH DI DATA INDEX DAN DATALAP_OP-->
<!-- data php--> <?php include 'component/dataindex.php';?>
<!-- data php--> <?php include 'component/datalap_op.php';?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'component/aset.php';?>
      <meta http-equiv="refresh" content="3" />
   </head>
   <body class="container bg-info">
      <div class="row py-5 px-2 ">
         <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <div class="d-flex justify-content-between">
                     <h3 class="font-bold center">Chart Data IOT dan Real time data</h3>
                  </div>
                  <div id="sales-legend" class="chartjs-legend mt-n1 mb-3"></div>
                  <canvas id="sales-chart"></canvas>
               </div>
            </div>
         </div>
         <div class="col-lg-12 grid-margin stretch-card mt-n4">
            <div class="card">
               <div class="card-body text-center">
                  <h2> Date <?php echo $hari; ?>, <?php echo $tanggal; ?> <h2 id="clock" onload="currentTime()"></h2>
                  </h2>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>



<script>
  if ($("#sales-chart").length) {
      var SalesChartCanvas = $("#sales-chart").get(0).getContext("2d");
      var SalesChart = new Chart(SalesChartCanvas, {
        type: 'bar',
        data: {
          labels: ['Station 1', 'Station 2', 'Station 3','Station 4', 'Station 5', 'Station 6'],
          
          datasets: [{
              label: 'IOT',
              data: [
                <?php echo $masker_station1 ;?>, 
				        <?php echo $masker_station2;?>, 
				        <?php echo $masker_station3;?>, 
				        <?php echo $masker_station4;?>, 
				        <?php echo $masker_station5;?>, 
				        <?php echo $masker_station6;?>,
              ],
              backgroundColor: '#98BDFF'
            },     


            {
              label: 'REAL DATA',
              data: [
				        <?php echo $jumlah_msn1_ok; ?>, 
				        <?php echo $jumlah_msn2_ok; ?>, 
				        <?php echo $jumlah_msn3_ok; ?>, 
				        <?php echo $jumlah_msn4_ok; ?>, 
				        <?php echo $jumlah_msn5_ok; ?>,
                <?php echo $jumlah_msn6_ok; ?>,
              ],
              backgroundColor: '#4B49AC'
            }
          ]
        },
        options: {
            responsive: true,
            legend: {
            display: false},


          tooltips: {
            enabled: false},


          scales: {
                    yAxes: [{
                            display: true,
                            ticks: {
                                beginAtZero: true,
                                steps: 10,
                                stepValue: 5,
                                max: 1200,
                                fontSize: 12}
                            }]},
                            
                            


          "hover": {
              "animationDuration": 0},

          "animation": {
              "duration": 1,
              "onComplete": function()
              
              {
                  var chartInstance = this.chart,
                    ctx = chartInstance.ctx;
                    ctx.font = Chart.helpers.fontString(Chart.defaults.global.barfontsize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                    ctx.textAlign = 'center';
                    ctx.textBaseline = 'bottom';
 
                  this.data.datasets.forEach(function(dataset, i) {

                  var meta = chartInstance.controller.getDatasetMeta(i);
                    meta.data.forEach
                    
                    (function(bar, index) {
                  var data = dataset.data[index];
                    ctx.fillText(data, bar._model.x, bar._model.y - 5);
                    })}
                
                );
               }
              }
             }
            });
              document.getElementById('sales-legend').innerHTML = SalesChart.generateLegend();
              Chart.defaults.global.defaultFontSize = 19;
              Chart.defaults.global.barfontsize = 26;


    }
</script>




<!-- Digital clock -->
<script> 
function currentTime() {
  let date = new Date(); 
  let hh = date.getHours();
  let mm = date.getMinutes();
  let ss = date.getSeconds();
  let session = "AM";

  if(hh === 0){
      hh = 12;
  }
  if(hh > 12){
      hh = hh - 12;
      session = "PM";
   }

   hh = (hh < 10) ? "0" + hh : hh;
   mm = (mm < 10) ? "0" + mm : mm;
   ss = (ss < 10) ? "0" + ss : ss;
    
   let time = hh + ":" + mm + ":" + ss + " " + session;

  document.getElementById("clock").innerText = time; 
  let t = setTimeout(function(){ currentTime() }, 1000);
}

currentTime();
</script>