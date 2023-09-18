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
      <div class="col-md-12 col-sm-12 col-12">
        <div class="info-box shadow-none m-0 p-0">
          <div class="info-box-content d-inline">
          <!-- <h2 class="display-3 text-center mb-0">  
          Current Time
             </h2> -->
      
                <h2 class="display-3 text-center mb-0" id="clock" style="font: 900;">
              
                <?php echo date("H:i:s"); ?>

               </h2>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>

    <!---- Team A / B ---->
    <div class="row">
      <div class="col-6">
      <section class="TeamA">
      <div class="card-body pt-1 pb-0 pr-0">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12"></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-info mb-1">
              <div class="card-header pt-1 pb-1">
                <div class="card-title">
                  <i class="fas fa-users mr-1 fa-4x d-inline"></i>
                  <h1 class="d-inline display-3"><strong>

                    <?php echo Setting::$team["A"]?>
                  </strong>

                  </h1>
                </div>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-1 pb-0">
                <div class="row">
                  <div class="col-6 callout callout-info center-text justify-content-between mb-1 pt-1 pb-1">
                  <div class="row">
                    <div class="col-1 ">
                      <i class="fas fa-thermometer-three-quarters fa-5x "></i>
                    </div>
                    <div class="col-5 center-text">
                      <h3 class=""><strong>อุณหภูมิ</strong></h3>
                    </div>
                    <div class="col-6 ">
                      <h2 class="display-4 mr-3" id="tempA"><strong>23°C</strong></h2>
                    </div>
                  </div>  
                  </div>
                  <div class="col-6 callout callout-info center-text justify-content-between mb-1 pt-1 pb-1">
                    <i class="fas fa-tint fa-4x ml-3"></i>
                    <h2 class="display-4 mr-3" id="humiA"><strong>5%</strong></h2>
                  </div>
                </div>
                <div class="row pb-0">
                  <div class="col-6 callout callout-info mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text">
                          <i class="fas fa-lightbulb fa-2x"></i>
                        </div>
                        <div class="col text-align-center pl-0">
                          <h2 class="mr-3 mb-0"><strong>Lucidity</strong></h2>
                        </div>
                        <div class="ChartSize" id="ChartASolar"></div>
                      </div>
                    </div>
                    <div class="col-6 callout callout-info mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text">
                          <i class="fas fa-bolt fa-2x"></i>
                        </div>
                        <div class="col text-align-center pl-0">
                          <h2 class="mr-3 mb-0"><strong>Volt</strong></h2>
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
      <div class="col-6 pl-0 pr-0">
      <section class="TeamB">
      <div class="card-body pt-1 pb-0 pl-0">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12"></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-success mb-1">
              <div class="card-header pt-1 pb-1">
                <div class="card-title">
                  <i class="fas fa-users mr-1 fa-4x"></i>
                  <h1 class="d-inline display-3"><strong>

                    <?php echo Setting::$team["B"]?>
                  </strong>
                </div>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-1 pb-0">
                <div class="row">
                  <div class="col-6 callout callout-success center-text justify-content-between mb-1 pt-1 pb-1">
                  <div class="row d-inline">
                    <i class="fas fa-thermometer-three-quarters fa-5x d-inline"></i>
                    <h3 class="d-inline"><strong>อุณหภูมิ</strong></h3>
                  </div>  
                    <h2 class="display-4 mr-3" id="tempB"><strong>23°C</strong></h2>
                  </div>
                  <div class="col-6 callout callout-success center-text justify-content-between mb-1 pt-1 pb-1">
                    <i class="fas fa-tint fa-4x ml-3"></i>
                    <h2 class="display-4 mr-3" id="humiB"><strong>5%</strong></h2>
                  </div>
                </div>
                <div class="row pb-0">
                  <div class="col-6 callout callout-success mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text">
                          <i class="fas fa-lightbulb fa-2x"></i>
                        </div>
                        <div class="col text-align-center pl-0">
                          <h2 class="mr-3 mb-0"><strong>Lucidity</strong></h2>
                        </div>
                        <div class="ChartSize" id="ChartBSolar"></div>
                      </div>
                    </div>
                    <div class="col-6 callout callout-success mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text">
                          <i class="fas fa-bolt fa-2x"></i>
                        </div>
                        <div class="col text-align-center pl-0">
                          <h2 class="mr-3 mb-0"><strong>Volt</strong></h2>
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
      <div class="col-6">
      <section class="TeamC">
      <div class="card-body pt-1 pb-0 pr-0">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12"></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-warning mb-1">
              <div class="card-header pt-1 pb-1">
                <div class="card-title">
                  <i class="fas fa-users mr-1 fa-4x"></i>
                  <h1 class="d-inline display-3"><strong>

                    <?php echo Setting::$team["C"]?>
                  </strong>
                </div>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-1 pb-0">
                <div class="row">
                  <div class="col-6 callout callout-success center-text justify-content-between mb-1 pt-1 pb-1">
                  <div class="row d-inline">
                    <i class="fas fa-thermometer-three-quarters fa-5x d-inline"></i>
                    <h3 class="d-inline"><strong>อุณหภูมิ</strong></h3>
                  </div>  
                    <h2 class="display-4 mr-3" id="tempC"><strong>23°C</strong></h2>
                  </div>
                  <div class="col-6 callout callout-success center-text justify-content-between mb-1 pt-1 pb-1">
                    <i class="fas fa-tint fa-4x ml-3"></i>
                    <h2 class="display-4 mr-3" id="humiC"><strong>5%</strong></h2>
                  </div>
                </div>
                <div class="row pb-0">
                  <div class="col-6 callout callout-success mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text">
                          <i class="fas fa-lightbulb fa-2x"></i>
                        </div>
                        <div class="col text-align-center pl-0">
                          <h2 class="mr-3 mb-0"><strong>Lucidity</strong></h2>
                        </div>
                        <div class="ChartSize" id="ChartCSolar"></div>
                      </div>
                    </div>
                    <div class="col-6 callout callout-success mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text">
                          <i class="fas fa-bolt fa-2x"></i>
                        </div>
                        <div class="col text-align-center pl-0">
                          <h2 class="mr-3 mb-0"><strong>Volt</strong></h2>
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
      <div class="col-6 pl-0 pr-0">
      <section class="TeamD">
      <div class="card-body pt-1 pb-0 pl-0">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-12"></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card card-danger mb-1">
              <div class="card-header pt-1 pb-1">
                <div class="card-title">
                  <i class="fas fa-users mr-1 fa-4x"></i>
                  <h1 class="d-inline display-3"><strong>

                    <?php echo Setting::$team["D"]?>
                  </strong>
                </div>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-1 pb-0">
                <div class="row">
                  <div class="col-6 callout callout-success center-text justify-content-between mb-1 pt-1 pb-1">
                  <div class="row d-inline">
                    <i class="fas fa-thermometer-three-quarters fa-5x d-inline"></i>
                    <h3 class="d-inline"><strong>อุณหภูมิ</strong></h3>
                  </div>  
                    <h2 class="display-4 mr-3" id="tempD"><strong>23°C</strong></h2>
                  </div>
                  <div class="col-6 callout callout-success center-text justify-content-between mb-1 pt-1 pb-1">
                    <i class="fas fa-tint fa-4x ml-3"></i>
                    <h2 class="display-4 mr-3" id="humiD"><strong>5%</strong></h2>
                  </div>
                </div>
                <div class="row pb-0">
                  <div class="col-6 callout callout-success mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text">
                          <i class="fas fa-lightbulb fa-2x"></i>
                        </div>
                        <div class="col text-align-center pl-0">
                          <h2 class="mr-3 mb-0"><strong>Lucidity</strong></h2>
                        </div>
                        <div class="ChartSize" id="ChartDSolar"></div>
                      </div>
                    </div>
                    <div class="col-6 callout callout-success mb-0 pt-1 pb-1">
                      <div class="row">
                        <div class="col-1 center-text">
                          <i class="fas fa-bolt fa-2x"></i>
                        </div>
                        <div class="col text-align-center pl-0">
                          <h2 class="mr-3 mb-0"><strong>Volt</strong></h2>
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

                    var options = {
                        chartArea: { width: '90%', height: '95%' },
                        fontName: 'Arial',
                        fontSize: '14',
                        legend: { position: 'none' },
                        selectionMode: 'multiple',
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
                                color: 'blue'
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
            $("#" + tempElementId).text(tempValue);
            $("#" + humiElementId).text(humiValue);
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
        }, 5000);

        setInterval(function() {
          SendData('Chart');
        }, 5000);

});
</script>
