<?php 
include( __DIR__ . "/include.php" );
?>

<section class="content">
  <div class="card">
    <div class="card-header pt-2 pb-1">
      <h6 class="display-8 d-inline-block font-weight-bold"><i class="fas fa-chalkboard"></i>
        <?PHP echo $title_act; ?>
      </h6>
      
      <div class="card-tools">
        <ol class="breadcrumb float-sm-right pt-1 pb-1 m-0">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item active">
            <?PHP echo $breadcrumb_txt; ?>
          </li>
        </ol>
      </div>
    </div>
    <div id="chart_script"></div>

    <div class="row">
      <div class="col-12">
      <section class="1">
      <div class="card-body pt-1 pb-0 pr-0">
    
        <div class="row">
    
            <div class="col-3">
                <div class="col-12 mb-0 pt-1">
                    <div class="card card-outline card-primary">
                        <div class="card-header row ">
                        <i class="fas fa-charging-station fa-2x align-middle pt-2"></i>
                            <h2 class="card-title pl-2" style="font-size:2rem"><strong>ผลิตไฟฟ้าได้</strong></h2>
                        </div>
                        <div class="card-body text-right"> 
                            <h1 class="d-inline" style="font-size:4.0rem">00</h1>
                            <h1 class="d-inline">&nbsp;นาที</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="col-12 mb-0 pt-1">
                    <div class="card card-outline card-primary">
                        <div class="card-header row ">
                        <i class="fas fa-bolt fa-2x align-middle pt-2"></i>
                            <h2 class="card-title pl-2" style="font-size:2rem"><strong>กำลังไฟสูงสุด</strong></h2>
                        </div>
                        <div class="card-body text-right"> 
                            <h1 class="d-inline" style="font-size:4.0rem">00</h1>
                            <h1 class="d-inline">&nbsp;V.</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="col-12 mb-0 pt-1">
                    <div class="card card-outline card-primary">
                        <div class="card-header row ">
                        <i class="fas fa-snowflake fa-2x align-middle pt-2"></i>
                            <h2 class="card-title pl-2" style="font-size:2rem"><strong>อุณหภูมิที่ทำได้</strong></h2>
                        </div>
                        <div class="card-body text-right"> 
                            <h1 class="d-inline" style="font-size:4.0rem">00</h1>
                            <h1 class="d-inline">&nbsp;°C</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="col-12 mb-0 pt-1">
                    <div class="card card-outline card-primary">
                        <div class="card-header row ">
                        <i class="fas fa-tint fa-2x align-middle pt-2"></i>
                            <h2 class="card-title pl-2" style="font-size:2rem"><strong>ความชื้นต่ำสุด</strong></h2>
                        </div>
                        <div class="card-body text-right"> 
                            <h1 class="d-inline" style="font-size:4.0rem">00</h1>
                            <h1 class="d-inline">&nbsp;%</h1>
                        </div>
                    </div>
                </div>
            </div>

           

          
      
          <!-- /.card -->
        </div>
      </div>
    </section>
      </div>
    </div>

    <div class="row">
        <div class="col-12">
            <section class="2">
                <div class="row">

                    <div class="col-4">
                        <div class="ChartSizeTeam" id="TempHumiChart"></div>
                    </div>
                    <div class="col-4">
                        <div class="ChartSizeTeam" id="VoltChart"></div>
                    </div>
                    <div class="col-4">
                        <div class="ChartSizeTeam" id="SolarChart"></div>
                    </div>

                </div>
            </section>
        </div>
    </div>



  

  </div>

</section>

<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Dogs');
      data.addColumn('number', 'Cats');

      data.addRows([
        [0, 0, 0],    [1, 10, 5],   [2, 23, 15],  [3, 17, 9],   [4, 18, 10],  [5, 9, 5],
        [6, 11, 3],   [7, 27, 19],  [8, 33, 25],  [9, 40, 32],  [10, 32, 24], [11, 35, 27],
        [12, 30, 22], [13, 40, 32], [14, 42, 34], [15, 47, 39], [16, 44, 36], [17, 48, 40],
        [18, 52, 44], [19, 54, 46],
      ]);

      var options = {
        chartArea: { width: '90%', height: '85%' },
        hAxis: {
  
        },
        vAxis: {

        },
        series: {
          1: {curveType: 'function'}
        }
      };

      var TempHumiChart = new google.visualization.LineChart(document.getElementById('TempHumiChart'));
      var VoltChart = new google.visualization.LineChart(document.getElementById('VoltChart'));
      var SolarChart = new google.visualization.LineChart(document.getElementById('SolarChart'));


      TempHumiChart.draw(data, options);
      VoltChart.draw(data, options);
      SolarChart.draw(data, options);
    }
</script>
