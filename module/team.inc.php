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
                            <h1 class="d-inline" id="LuxPerMin" style="font-size:4.0rem">00</h1>
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
                            <h1 class="d-inline" id="MaxVolt" style="font-size:4.0rem">00</h1>
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
                            <h1 class="d-inline" id="MinTemp" style="font-size:4.0rem">00</h1>
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
                            <h2 class="card-title pl-2" style="font-size:2rem"><strong>ความชื้นสูงสุด/ต่ำสุด</strong></h2>
                        </div>
                        <div class="card-body text-right">
                            <h1 class="d-inline" id="MaxHumi" style="font-size:4.0rem">00</h1>
                            <h1 class="d-inline"style="font-size:3.5rem">/</h1> 
                            <h1 class="d-inline" id="MinHumi" style="font-size:4.0rem">00</h1>
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

    <div class="row pt-2">
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

    <div class="row">
      <div class="col-12 p-3 m-0 ">
        <table id="dataTable" class="table table-bordered dataTable dtr-inline display  " >
            <thead>
              <tr class="bg-light">
                <th class="text-center" scope="col" class="sorting_disabled">No.</th>
                <th class="text-center" scope="col">Date Time</th>
                <th class="text-center" scope="col">Temperature</th>
                <th class="text-center" scope="col">Humidity</th>
                <th class="text-center" scope="col">Volt</th>
                <th class="text-center" scope="col">Lux</th>
              </tr>
            </thead>
            <tbody>
              <!-- Table data will be added here -->
            </tbody>
          </table>
      </div>
    </div>
  </div>

</section>

<script type="text/javascript">
var TEAM = "<?php echo $TEAM ?>";
var jsonData;
var table;
var currentPage = 1;

$(document).ready(function () {
  table = $('#dataTable').DataTable({
    "order": [0, 'desc'],
    "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0, 1, 2, 3, 4, 5]
        },
      ],
    "searching": false,
    "pageLength": 50,
    "lengthChange": true,
    "info": true,
    "scrollX": true,
    columns: [
      { width: '3%' }, // Adjust the width as needed for each column
      { width: '10%' },
      { width: '15%' },
      { width: '15%' },
      { width: '15%' },
      { width: '15%' },
    ],
  });
  
  SendData(TEAM);
  setInterval(function() {
    currentPage = table.page.info().page + 1;
    SendData(TEAM);
  }, 3000);
  table.page(currentPage - 1).draw('page');
});

function SendData(TEAM) {
  $.ajax({
    url: "module/ajax_action.php",
    type: "POST",
    data: {
      "action": "Team",
      "team": TEAM
    },
    success: function (data) {
      var jsonData = JSON.parse(data);

      updateCardData(jsonData);
      drawCharts(jsonData);

      updateDataTable(jsonData);
      
      console.log(data);
    },
    error: function (data) {
      console.log(data);
    }
  });
}

function updateCardData(jsonData) {
  // Update card data with jsonData
  $("#LuxPerMin").text(jsonData.Card.LuxPerMinute);
  $("#MaxVolt").text(jsonData.Card.MaxVolt);
  $("#MinTemp").text(jsonData.Card.MinTemp);
  $("#MaxHumi").text(jsonData.Card.MaxHumi);
  $("#MinHumi").text(jsonData.Card.MinHumi);
}

function drawCharts(jsonData) {
  // Now you can access jsonData here to draw charts
  google.charts.load('current', { packages: ['corechart', 'line'] });
  google.charts.setOnLoadCallback(function () {
    // Draw your charts using the jsonData.ChartData object
    drawTempHumiChart(jsonData.ChartData.TempHumiData);
    drawVoltChart(jsonData.ChartData.VoltData);
    drawSolarChart(jsonData.ChartData.SolarData);
  });
}

function drawTempHumiChart(tempHumiData) {
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Time');
  data.addColumn('number', 'Temperature');
  data.addColumn('number', 'Humidity');
  data.addColumn('number', 'Temperature');
  data.addColumn({ type: 'string', role: 'annotation' });
  data.addColumn('number', 'Humidity');
  data.addColumn({ type: 'string', role: 'annotation' });

  // Populate the data table with TempHumiData
  data.addRows(tempHumiData);

  var options = {
    title: 'Temperature and Humidity',
    titleTextStyle: {
        fontName: 'Arial', // i.e. 'Times New Roman'
        fontSize: 28, // 12, 18 whatever you want (don't specify px)
        bold: true,    // true or false
    },
    chartArea: { width: '85%', height: '85%' },
    hAxis: {
      slantedText: false, // Prevent slanted (rotated) text on the horizontal axis
      textPosition: 'none' // Place labels outside the chart area
    },
    vAxis: {},
    legend: 'none',
    annotations: {
        textStyle: {
            fontName: 'Arial',
            fontSize: 18,
            color: '#000',
            auraColor: 'none'
        }
    },
    series: {
      0: {pointSize: 5 ,color: 'blue' }, // Temperature
      1: {pointSize: 5 ,color: 'red' },  // Humidity
      2: {color: 'blue' }, // Temperature
      3: {color: 'red' }  // Humidity
    }
  };

  var chart = new google.visualization.LineChart(document.getElementById('TempHumiChart'));
  chart.draw(data, options);
}

function drawVoltChart(voltData) {
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Time');
  data.addColumn('number', 'Voltage');
  data.addColumn('number', 'Voltage');
  data.addColumn({ type: 'string', role: 'annotation' });

  // Populate the data table with VoltData
  data.addRows(voltData);

  var options = {
    title: 'Volt',
    titleTextStyle: {
        fontName: 'Arial', // i.e. 'Times New Roman'
        fontSize: 28, // 12, 18 whatever you want (don't specify px)
        bold: true,    // true or false
    },
    chartArea: { width: '90%', height: '85%' },
    hAxis: {
      slantedText: false, // Prevent slanted (rotated) text on the horizontal axis
      textPosition: 'none' // Place labels outside the chart area
    },
    vAxis: {},
    legend: 'none',
    annotations: {
        textStyle: {
            fontName: 'Arial',
            fontSize: 18,
            color: '#000',
            auraColor: 'none'
        }
    },
    series: {
      0: {pointSize: 5 ,color: 'green' }, // Voltage
      1: {color: 'green' } // Voltage
    }
  };

  var chart = new google.visualization.LineChart(document.getElementById('VoltChart'));
  chart.draw(data, options);
}

function drawSolarChart(solarData) {
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Time');
  data.addColumn('number', 'Solar');
  data.addColumn('number', 'Solar');
  data.addColumn({ type: 'string', role: 'annotation' });

  // Populate the data table with SolarData
  data.addRows(solarData);

  var options = {
    title: 'Lux',
    titleTextStyle: {
        fontName: 'Arial', // i.e. 'Times New Roman'
        fontSize: 28, // 12, 18 whatever you want (don't specify px)
        bold: true,    // true or false
    },
    chartArea: { width: '90%', height: '85%' },
    hAxis: {
      slantedText: false, // Prevent slanted (rotated) text on the horizontal axis
      textPosition: 'none' // Place labels outside the chart area
    },
    vAxis: {},
    legend: 'none',
    annotations: {
        textStyle: {
            fontName: 'Arial',
            fontSize: 18,
            color: '#000',
            auraColor: 'none'
        }
    },
    series: {
      0: {pointSize: 5 ,color: 'orange' }, // Solar
      1: {color: 'orange' } // Solar
    }
  };

  var chart = new google.visualization.LineChart(document.getElementById('SolarChart'));
  chart.draw(data, options);
}

function updateDataTable(data) {
    // Clear existing table data
    table.clear().draw();

    if (data && data.Fetch) {
        var fetchArray = data.Fetch;

        for (var i = 0; i < fetchArray.length; i++) {
            var rowData = fetchArray[i];
            var number = i + 1;
            var date = rowData.Date;
            var temp = rowData.temp;
            var humi = rowData.humi;
            var volt = rowData.volt;
            var solar = rowData.solar;

            // Add data to the table
            table.row.add([number, date, temp, humi, volt, solar]).draw();
        }
    }
}

</script>
