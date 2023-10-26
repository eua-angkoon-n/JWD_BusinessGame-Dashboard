<?php 
include( __DIR__ . "/include_score.php" );
?>

<section class="content">
  <div class="card cardBackground">
    <div class="card-header pt-2 pb-1" style="background-color:white">
      <h6 class="display-8 d-inline-block font-weight-bold"><i class="fas fa-chalkboard"></i>
        <?PHP echo $title_act; ?>
      </h6>
      
      <div class="card-tools">
        <ol class="breadcrumb float-sm-right pt-1 pb-1 m-0">
          <?php if((empty($uuid))){?>
            <li class="breadcrumb-item"><a href="./">Home</a></li>
          <?php } ?>
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
    
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="col-12 mb-0 pt-1">
                    <div class="card shadow-lg">
                        <div class="card-header gradient">
                        <div class="card-title">
                          <i class="fas fa-charging-station fa-2x d-inline jWText lightBulb"></i>
                              <h2 class="d-inline jWText" style="font-size:2rem"><strong><?php echo Setting::$TitleBoard["TeamTitle"]["ETProd"]?></strong></h2>

                        </div>
                        </div>
                        <div class="card-body text-right prevent-overflow"> 
                            <h1 class="d-inline" id="LuxPerMin" style="font-size:4.0rem">0</h1>
                            <h1 class="d-inline">&nbsp;<?php echo Setting::$TitleBoard["Unit"]["minute"]?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="col-12 mb-0 pt-1">
                    <div class="card shadow-lg">
                        <div class="card-header gradient">
                        <div class="card-title">
                          <i class="fas fa-bolt fa-2x d-inline jWText thunder"></i>
                              <h2 class="d-inline jWText" style="font-size:2rem"><strong><?php echo Setting::$TitleBoard["TeamTitle"]["MXVolt"]?></strong></h2>
                        </div>
                        </div>
                        <div class="card-body text-right"> 
                            <h1 class="d-inline" id="MaxVolt" style="font-size:4.0rem">0</h1>
                            <h1 class="d-inline">&nbsp;<?php echo Setting::$TitleBoard["Unit"]["volt"]?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="col-12 mb-0 pt-1">
                    <div class="card shadow-lg">
                        <div class="card-header gradient">
                        <div class="card-title">
                          <i class="fas fa-snowflake fa-2x d-inline jWText thermometer"></i>
                              <h2 class="d-inline jWText" style="font-size:2rem"><strong><?php echo Setting::$TitleBoard["TeamTitle"]["tempCan"]?></strong></h2>
                        </div>
                        </div>
                        <div class="card-body text-right"> 
                            <h1 class="d-inline" id="MinTemp" style="font-size:4.0rem">0</h1>
                            <h1 class="d-inline">&nbsp;<?php echo Setting::$TitleBoard["Unit"]["temp"]?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="col-12 mb-0 pt-1">
                    <div class="card shadow-lg">
                        <div class="card-header gradient">
                        <div class="card-title ">
                          <i class="fas fa-tint fa-2x d-inline jWText dropWater"></i>
                              <h2 class="d-inline jWText" style="font-size:2rem"><strong><?php echo Setting::$TitleBoard["TeamTitle"]["MXHumi"]?></strong></h2>
                        </div>
                        </div>
                        <div class="card-body text-right">
                            <h1 class="d-inline" id="MaxHumi" style="font-size:4.0rem">0</h1>
                            <h1 class="d-inline"style="font-size:3.5rem">/</h1> 
                            <h1 class="d-inline" id="MinHumi" style="font-size:4.0rem">0</h1>
                            <h1 class="d-inline">&nbsp;<?php echo Setting::$TitleBoard["Unit"]["humi"]?></h1>
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

    <div class="row pt-1">
      <div class="col-12">
        <section class="2">
          <div class="row pl-4">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend" >
                  <span class="input-group-text"><i class="far fa-clock"></i></span>
                </div>
                <input type="text" class="form-control float-right " id="reservationtime">
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-lg-4 col-md-12">
              <div class="ChartSizeTeam" id="TempHumiChart"></div>
            </div>
            <div class="col-lg-4 col-md-12">
              <div class="ChartSizeTeam" id="VoltChart"></div>
            </div>
            <div class="col-lg-4 col-md-12">
              <div class="ChartSizeTeam" id="SolarChart"></div>
            </div>

          </div>
        </section>
      </div>
    </div>

    <div class="row pt-3 p-2">
      <div class="col-sm-12 p-1 m-0">
        <table id="dataTableB" class="table table-bordered table-hover dataTable dtr-inline display nowrap shadow-lg" style="background-color:white">
          <thead>
            <tr class="bg-light">
              <th scope="col" class="sorting_disabled">No</th>
              <th scope="col">Date Time</th>
              <th scope="col">Temperature</th>
              <th scope="col">Humidity</th>
              <th scope="col">Volt</th>
              <th scope="col">Lux</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div><!-- /.row -->
  </div>

</section>

<script type="text/javascript">
var TEAM = "<?php echo $TEAM ?>";
var jsonData;
var table;
var date;

$(document).ready(function () {
  
  initializeDateRangePicker();
  var date = $('#reservationtime').val();
  GetChart(TEAM,date);
  SendData(TEAM);
  
  setInterval(function() {
    var date = $('#reservationtime').val();
    GetChart(TEAM,date);
    SendData(TEAM);
  }, 3000);

  setInterval(function() {
    $('#dataTableB').DataTable().ajax.reload(NULL, false);  
  }, 15000);

function initializeDateRangePicker() {
    var today = moment().startOf('day'); // Get today's date at the start of the day
    var startOfDay = today.clone();
    var endOfDay = today.clone().endOf('day');
      
  $('#reservationtime').daterangepicker({
      startDate: startOfDay,
      endDate: endOfDay,
      timePicker: true,
      timePickerIncrement: 15,
      timePicker24Hour: true, // Display time in 24-hour format
      timePickerMin: moment().startOf('day'), // Set minimum time to start of the day
      timePickerMax: moment().endOf('day'), // Set maximum time to end of the day
      locale: {
        format: 'MM/DD/YYYY HH:mm' // Adjust the time format as needed
      },
      minDate: startOfDay, // Set minimum date to today
      maxDate: endOfDay, // Set maximum date to today
  });

  // Add a change event handler to #reservationtime
  $('#reservationtime').on('change', function() {
    var date = $('#reservationtime').val();
    GetChart(TEAM,date); // Call the GetChart function when the value changes
    $('#dataTableB').DataTable().ajax.reload();  
  });
}

});

function GetChart(TEAM,date) {
  $.ajax({
    url: "module/ajax_action.php",
    type: "POST",
    data: {
      "action": "Team",
      "team": TEAM,
      "date": date
    },
    success: function (data) {
      
      var jsonData = JSON.parse(data);
      drawCharts(jsonData);
      // console.log(data);
    },
    error: function (data) {
      console.log(data);
    }
  });
}

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
    },
    error: function (data) {
      console.log(data);
    }
  });
}

////////////////////////////////////////////////////////////////////////////////////
$('#dataTableB').DataTable({
    "scrollX": true,
    "processing": true,
    "serverSide": true,
    "order": [0, 'desc'], //ถ้าโหลดครั้งแรกจะให้เรียงตามคอลัมน์ไหนก็ใส่เลขคอลัมน์ 0,'desc'
    "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }, //คอลัมน์ที่จะไม่ให้ฟังก์ชั่นเรียง
        {
            "bSearchable": false,
            "aTargets": [0]
        } //คอลัมน์ที่จะไม่ให้เสริท
    ],
    ajax: {
        beforeSend: function () {
            //จะให้ทำอะไรก่อนส่งค่าไปหรือไม่
        },
        url: 'module/datatable_processing.php', 
        type: 'POST',
        data: function (data) {
            data.action = "TEAM";
            data.team   = TEAM;
            data.date   = $('#reservationtime').val();
        },
        error: function (xhr, error, code) {
            console.log(xhr, code);
        },
        async: false,
        cache: false,
    },
    "lengthMenu": [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "ทั้งหมด"]
    ],
    "paging": true,
    "lengthChange": true, //ออฟชั่นแสดงผลต่อหน้า
    "pagingType": "simple_numbers",
    "pageLength": 25,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    //"responsive": true,
});

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
    backgroundColor: {
      fillOpacity: 0
    },
    series: {
      0: {pointSize: 0 ,color: 'blue' }, // Temperature
      1: {pointSize: 0 ,color: 'red' },  // Humidity
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
    backgroundColor: {
      fillOpacity: 0
    },
    series: {
      0: {pointSize: 0 ,color: 'green' }, // Voltage
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
    backgroundColor: {
      fillOpacity: 0
    },
    series: {
      0: {pointSize: 0 ,color: 'orange' }, // Solar
      1: {color: 'orange' } // Solar
    }
  };

  var chart = new google.visualization.LineChart(document.getElementById('SolarChart'));
  chart.draw(data, options);
}

</script>
