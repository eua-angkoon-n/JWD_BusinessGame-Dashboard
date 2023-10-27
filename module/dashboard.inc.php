<?php 
include( __DIR__ . "/include.php" );
?>

<section class="content">
  <div class="card cardBackground">  <!--style="background-color:#adb5bd" -->
    <div class="card-header pt-2 pb-1" style="background-color:white">
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
      <div class="col-md-12 col-sm-12 col-12">
       
          <div class="d-flex justify-content-center" >
                <div class="w-100">  <!--  style="background-color:#000043" -->

                  <h2 class="text-center mb-0 time-font" id="clock" style="font: 900;color:#000043">  
                    <?php echo date("H:i:s"); ?> 
                  </h2>

              </div>
          </div>
      
      </div>
    </div>

    <!---- Team A / B ---->
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
      <section class="TeamA">
      <div class="card-body pt-1 pb-0 ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12"></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-1 ">
              <div class="card-header pt-1 pb-1 gradient" >
                <div class="card-title prevent-overflow d-inline-flex " >
                <img src="dist/img/yenteams.png" class="icon-team mr-2 mt-1" alt="YENCHIEB">
                  <!-- <i class="fas fa-users mr-1 icon-team d-inline jWText"></i> -->
                  <h1 class="d-inline team-font jWText"><strong>

                    <?php echo Setting::$team["A"]?>
                  </strong>

                  </h1>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-1 pb-0">
                <div class="row">
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 center-text justify-content-between mb-1 pt-1 pb-1 card-header shadow-sm">
                    <div class="col-1 ">
                      <i class="fas fa-thermometer-three-quarters thermometer"></i>
                    </div>
                    <div class="col-4 left-text ml-2">
                      <h3 class="text-team"><strong><?php echo Setting::$TitleBoard["DB"]["temp"];?></strong></h3>
                    </div>
                    <div class="col-7 right-left prevent-overflow">
                      <h2 class="valuetext-team mr-3" id="tempA"><strong>0<?php echo Setting::$TitleBoard["Unit"]["temp"]?></strong></h2>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 center-text justify-content-between mb-1 pt-1 pb-1 card-header shadow-sm pl-0">
                    <div class="col-1 ">
                      <i class="fas fa-tint fa-4x ml-2 dropWater"></i>
                    </div>
                    <div class="col-5 left-text ml-4">
                      <h3 class="text-team"><strong><?php echo Setting::$TitleBoard["DB"]["humi"];?></strong></h3>
                    </div>
                    <div class="col-6 right-left prevent-overflow">
                      <h2 class="valuetext-team mr-3" id="humiA"><strong>0<?php echo Setting::$TitleBoard["Unit"]["humi"]?></strong></h2>
                    </div>
                  </div>
                </div>
                <div class="row pb-0">
                  <div class="col-md-6 col-sm-12 card-header shadow-sm mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text ml-3">
                          <i class="fas fa-lightbulb fa-2x lightBulb"></i>
                        </div>
                        <div class="col text-align-center pl-0 ml-2">
                          <h2 class="mr-3 mb-0"><strong><?php echo Setting::$TitleBoard["DB"]["lux"];?></strong></h2>
                        </div>
                        <div class="ChartSize" id="ChartASolar"></div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12 card-header shadow-sm mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text ml-4">
                          <i class="fas fa-bolt fa-2x thunder"></i>
                        </div>
                        <div class="col text-align-center pl-0 ml-2">
                          <h2 class="mr-3 mb-0"><strong><?php echo Setting::$TitleBoard["DB"]["volt"];?></strong></h2>
                        </div>
                        <div class="ChartSize" id="ChartAVolt"></div>
                      </div>
                    </div>
                </div>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
      </div>
      <div class="col-md-6 col-sm-12">
      <section class="TeamB">
      <div class="card-body pt-1 pb-0 ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12"></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-1">
              <div class="card-header pt-1 pb-1 gradient">
              <div class="card-title prevent-overflow d-inline-flex " >
                <img src="dist/img/jmtteams.png" class="icon-team mr-2 mt-1" alt="JMT">
                  <!-- <i class="fas fa-users mr-1 icon-team jWText"></i> -->
                  <h1 class="d-inline team-font team2-font jWText"><strong>

                    <?php echo Setting::$team["B"]?>
                  </strong>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-1 pb-0">
                <div class="row">
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 center-text justify-content-between mb-1 pt-1 pb-1 card-header shadow-sm" >
                  <div class="col-1 ">
                      <i class="fas fa-thermometer-three-quarters thermometer"></i>
                    </div>
                    <div class="col-4 left-text ml-2">
                      <h3 class="text-team"><strong><?php echo Setting::$TitleBoard["DB"]["temp"];?></strong></h3>
                    </div>
                    <div class="col-7 right-left prevent-overflow">
                      <h2 class="valuetext-team mr-3" id="tempB"><strong>0<?php echo Setting::$TitleBoard["Unit"]["temp"]?></strong></h2>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12  center-text justify-content-between mb-1 pt-1 pb-1 pl-0 card-header shadow-sm" >
                  <div class="col-1 ">
                      <i class="fas fa-tint fa-4x ml-2 dropWater"></i>
                    </div>
                    <div class="col-5 left-text ml-4">
                      <h3 class="text-team"><strong><?php echo Setting::$TitleBoard["DB"]["humi"];?></strong></h3>
                    </div>
                    <div class="col-6 right-left prevent-overflow">
                      <h2 class="valuetext-team mr-3" id="humiB"><strong>0<?php echo Setting::$TitleBoard["Unit"]["humi"]?></strong></h2>
                    </div>
                  </div>
                </div>
                <div class="row pb-0">
                  <div class="col-md-6 col-sm-12 mb-0 pt-1 pb-1 shadow-sm card-header">
                      <div class="row">
                        <div class="col-1 center-text ml-3">
                          <i class="fas fa-lightbulb fa-2x lightBulb"></i>
                        </div>
                        <div class="col text-align-center pl-0 ml-2">
                          <h2 class="mr-3 mb-0"><strong><?php echo Setting::$TitleBoard["DB"]["lux"];?></strong></h2>
                        </div>
                        <div class="ChartSize" id="ChartBSolar"></div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12 mb-0 pt-1 pb-1 shadow-sm card-header" >
                      <div class="row">
                        <div class="col-1 center-text ml-4">
                          <i class="fas fa-bolt fa-2x thunder"></i>
                        </div>
                        <div class="col text-align-center pl-0 ml-2">
                          <h2 class="mr-3 mb-0"><strong><?php echo Setting::$TitleBoard["DB"]["volt"];?></strong></h2>
                        </div>
                        <div class="ChartSize" id="ChartBVolt"></div>
                      </div>
                    </div>
                </div>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
      </div>
    </div>

    <!---- Team C / D ---->
    <div class="row">
      <div class="col-md-6 col-sm-12">
      <section class="TeamC">
      <div class="card-body pt-1 pb-0">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12"></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-1">
              <div class="card-header pt-1 pb-1 gradient">
              <div class="card-title prevent-overflow d-inline-flex " >
                <img src="dist/img/fncteam.png" class="icon-team mr-2 mt-1" alt="F&C">
                  <h1 class="d-inline team-font jWText"><strong>

                    <?php echo Setting::$team["C"]?>
                  </strong>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-1 pb-0">
                <div class="row">
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 card-header shadow-sm center-text justify-content-between mb-1 pt-1 pb-1">
                  <div class="col-1 ">
                      <i class="fas fa-thermometer-three-quarters thermometer"></i>
                    </div>
                    <div class="col-4 left-text ml-2">
                      <h3 class="text-team"><strong><?php echo Setting::$TitleBoard["DB"]["temp"];?></strong></h3>
                    </div>
                    <div class="col-7 right-left">
                      <h2 class="valuetext-team mr-3" id="tempC"><strong>0<?php echo Setting::$TitleBoard["Unit"]["temp"]?></strong></h2>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 pl-0 card-header shadow-sm center-text justify-content-between mb-1 pt-1 pb-1">
                  <div class="col-1 ">
                      <i class="fas fa-tint fa-4x ml-2 dropWater"></i>
                    </div>
                    <div class="col-5 left-text ml-4">
                      <h3 class="text-team"><strong><?php echo Setting::$TitleBoard["DB"]["humi"];?></strong></h3>
                    </div>
                    <div class="col-6 right-left prevent-overflow">
                      <h2 class="valuetext-team mr-3" id="humiC"><strong>0<?php echo Setting::$TitleBoard["Unit"]["humi"]?></strong></h2>
                    </div>
                  </div>
                </div>
                <div class="row pb-0">
                  <div class="col-md-6 col-sm-12 card-header shadow-sm mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text ml-3">
                          <i class="fas fa-lightbulb fa-2x lightBulb"></i>
                        </div>
                        <div class="col text-align-center pl-0">
                          <h2 class="mr-3 mb-0"><strong><?php echo Setting::$TitleBoard["DB"]["lux"];?></strong></h2>
                        </div>
                        <div class="ChartSize" id="ChartCSolar"></div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12 card-header shadow-sm mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text ml-4">
                          <i class="fas fa-bolt fa-2x thunder"></i>
                        </div>
                        <div class="col text-align-center pl-0">
                          <h2 class="mr-3 mb-0"><strong><?php echo Setting::$TitleBoard["DB"]["volt"];?></strong></h2>
                        </div>
                        <div class="ChartSize" id="ChartCVolt"></div>
                      </div>
                    </div>
                </div>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
      </div>
      <div class="col-md-6 col-sm-12 ">
      <section class="TeamD">
      <div class="card-body pt-1 pb-0 ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12"></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-1">
              <div class="card-header pt-1 pb-1 gradient">
              <div class="card-title prevent-overflow d-inline-flex " >
                <img src="dist/img/ideateams.png" class="icon-team mr-2 mt-1" alt="IDEA">
                  <h1 class="d-inline team-font jWText"><strong>
                    <?php echo Setting::$team["D"]?>
                  </strong>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-1 pb-0">
                <div class="row">
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 card-header shadow-sm center-text justify-content-between mb-1 pt-1 pb-1">
                  <div class="col-1 ">
                      <i class="fas fa-thermometer-three-quarters thermometer"></i>
                    </div>
                    <div class="col-4 left-text ml-2">
                      <h3 class="text-team"><strong><?php echo Setting::$TitleBoard["DB"]["temp"];?></strong></h3>
                    </div>
                    <div class="col-7 right-left">
                      <h2 class="valuetext-team mr-3" id="tempD"><strong>0<?php echo Setting::$TitleBoard["Unit"]["temp"]?></strong></h2>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 pl-0 card-header shadow-sm center-text justify-content-between mb-1 pt-1 pb-1">
                  <div class="col-1 ">
                      <i class="fas fa-tint fa-4x ml-2 dropWater"></i>
                    </div>
                    <div class="col-5 left-text ml-4">
                      <h3 class="text-team"><strong><?php echo Setting::$TitleBoard["DB"]["humi"];?></strong></h3>
                    </div>
                    <div class="col-6 right-left prevent-overflow">
                      <h2 class="valuetext-team mr-3" id="humiD"><strong>0<?php echo Setting::$TitleBoard["Unit"]["humi"]?></strong></h2>
                    </div>
                  </div>
                </div>
                <div class="row pb-0">
                  <div class="col-md-6 col-sm-12 card-header shadow-sm mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text ml-3">
                          <i class="fas fa-lightbulb fa-2x lightBulb"></i>
                        </div>
                        <div class="col text-align-center pl-0 ml-2">
                          <h2 class="mr-3 mb-0"><strong><?php echo Setting::$TitleBoard["DB"]["lux"];?></strong></h2>
                        </div>
                        <div class="ChartSize" id="ChartDSolar"></div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12 card-header shadow-sm mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text ml-4">
                          <i class="fas fa-bolt fa-2x thunder"></i>
                        </div>
                        <div class="col text-align-center pl-0 ml-2">
                          <h2 class="mr-3 mb-0"><strong><?php echo Setting::$TitleBoard["DB"]["volt"];?></strong></h2>
                        </div>
                        <div class="ChartSize" id="ChartDVolt"></div>
                      </div>
                    </div>
                </div>
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
      </div>
    </div>
  </div>

</section>

<script type="text/javascript">
google.charts.load('current', { packages: ['corechart', 'line'] });
google.charts.setOnLoadCallback(drawCharts);

function drawCharts(chartData) {  
    // Loop through the team data
    for (var team in chartData) {
        if (chartData.hasOwnProperty(team)) {
            var teamData = chartData[team];

            // Create separate DataTables and charts for 'Volt' and 'Solar'
            for (var dataType in teamData) {
                if (teamData.hasOwnProperty(dataType)) {
                    var data = new google.visualization.DataTable();
                    data.addColumn('datetime', 'Date and Time'); // Change to datetime
                    data.addColumn('number', dataType); // 'Volt' or 'Solar'
                    data.addColumn('number', 'points');
                    data.addColumn({ type: 'string', role: 'annotation' });

                    // Add rows to the DataTable
                    var rows = teamData[dataType];
                    for (var i = 0; i < rows.length; i++) {
                        var row = rows[i].split(', ');
                        var dateTimeParts = row[0].split(' ');
                        var dateParts = dateTimeParts[0].split('-');
                        var timeParts = dateTimeParts[1].split(':');
                        var datetime = new Date(
                            parseInt(dateParts[0]),
                            parseInt(dateParts[1]) - 1,
                            parseInt(dateParts[2]),
                            parseInt(timeParts[0]),
                            parseInt(timeParts[1]),
                            parseInt(timeParts[2])
                        );

                        // Determine if this is the last data point
                        var isLastPoint = i === rows.length - 1;

                        // Add annotation and point values
                        var annotation = isLastPoint ? parseFloat(row[1]).toString() : null;
                        var point = isLastPoint ? parseFloat(row[1]) : null;

                        data.addRow([datetime, parseFloat(row[1]), point, annotation]);
                    }

                    if (dataType == 'Volt') {
                      var color = '#ffca05';
                    } else if (dataType == 'Solar') {
                      var color = '#f15c22';
                    }

                    var options = {
                        chartArea: { width: '85%', height: '95%' },
                        colors: [color],
                        fontName: 'Arial',
                        fontSize: '14',
                        legend: { position: 'none' },
                        selectionMode: 'multiple',
                        lineWidth: 3,
                        vAxis: {
                            gridlines: { color: 'none' },
                            minValue: 0
                        },
                        hAxis: {
                            format: 'MMM dd, yyyy HH:mm'
                        },
                        annotations: {
                            textStyle: {
                                fontName: 'Arial',
                                fontSize: 22,
                                color: '#000',
                                auraColor: 'none'
                            }
                        },
                        series: {
                            1: {
                                pointSize: 7 ,
                                color: color
                            }
                        }
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('Chart' + team + dataType));

                    var dateFormatter = new google.visualization.DateFormat({ pattern: 'HH:mm:ss' });
                    dateFormatter.format(data, 0);

                    chart.draw(data, options);
                }
            }
        }
    }
}
// Helper function to parse time strings into Google Visualization TimeOfDay objects
function parseTime(timeStr) {
    var parts = timeStr.split(':');
    return [parseInt(parts[0]), parseInt(parts[1]), parseInt(parts[2])];
}

function SendData(log) {
  $.ajax({
    url: "module/ajax_action.php",
    type: "POST",
    data: {
      "action": log
    },
    success: function (data) {
      if (log == "Digital") {
        var parsedData = JSON.parse(data);
  
        // Loop through the parsed data to update the HTML elements
        for (var team in parsedData) {
          var tempElementId = "temp" + team;
          var humiElementId = "humi" + team;
  
          if (parsedData.hasOwnProperty(team)) {
            var tempValue = parsedData[team].Temp;
            var humiValue = parsedData[team].Humi;
  
            // Update the temperature and humidity elements
            $("#" + tempElementId).text(tempValue + "<?php echo Setting::$TitleBoard["Unit"]["temp"]?>");
            $("#" + humiElementId).text(humiValue + "<?php echo Setting::$TitleBoard["Unit"]["humi"]?>");
          }
        }
      } else if (log == "Chart") {
        var chartData = JSON.parse(data); 
        drawCharts(chartData);
      }
    },
    error: function (data) {
      console.log(data);
    }
  });
}
// Function to update the clock time
function updateClock() {
  var now = new Date();
  var hours = now.getHours().toString().padStart(2, '0');
  var minutes = now.getMinutes().toString().padStart(2, '0');
  var seconds = now.getSeconds().toString().padStart(2, '0');
  var timeString = hours + ':' + minutes + ':' + seconds;
  document.getElementById('clock').textContent = timeString;
}

$(document).ready(function () {

        // Initial call to update the clock
        updateClock();
        SendData('Digital');
        SendData('Chart');

        // Update the clock every second
        setInterval(updateClock, 1000);

        setInterval(function() {
          SendData('Digital');
          SendData('Chart');
        }, 3000);

});
</script>
