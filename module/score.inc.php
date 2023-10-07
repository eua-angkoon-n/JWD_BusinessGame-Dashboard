<?php 
include( __DIR__ . "/include.php" );
?>

<style>

/* Media query for screens with a maximum width of 768px */
@media (max-width: 768px) {
  #clock {
    font-size: 2.0rem; /* Change the font size for smaller screens */
  }
  #TeamName {
    font-size: 1.5rem;
  }
}
</style>

<section class="content">
  <div class="card cardBackground">
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
       
    <div class="row">
      <div class="col-md-12 col-sm-12 col-12">
       
          <div class="d-flex justify-content-center" >
                <div class="w-25">  <!--  style="background-color:#000043" -->

                  <!-- <h2 class="display-3 text-center mb-0 time-font" id="clock" style="font: 900;color:#000043">  
                    <?php echo date("H:i:s"); ?> 
                  </h2> -->

              </div>
          </div>
      
      </div>
    </div>
     
<div class="row">
    <div class="col-md-12 col-sm-12">
        <section class="TeamA">
            <div class="card-body pt-1 pb-0 ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-1 ">
                            <div class="card-header pt-1 pb-1 gradient">
                                <div class="card-title">
                                    <i class="fas fa-users mr-1 fa-3x d-inline jWText"></i>
                                    <h2 class="d-inline display-4 jWText"><strong>

                                            <?php echo Setting::$team["A"]?>
                                        </strong>

                                    </h2>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-1 pb-0">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-charging-station fa-3x align-middle pt-2 lightBulb"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["ETProd"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="ETProdA" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">
                                                    &nbsp;<?php echo Setting::$TitleBoard["Unit"]["minute"]?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-bolt fa-3x align-middle pt-2 thunder"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["MXVolt"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="MXVoltA" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">
                                                    &nbsp;<?php echo Setting::$TitleBoard["Unit"]["volt"]?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-snowflake fa-3x align-middle pt-2 thermometer"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["tempCan"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="tempCanA" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">
                                                    &nbsp;<?php echo Setting::$TitleBoard["Unit"]["temp"]?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-tint fa-3x align-middle pt-2 dropWater"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["MXHumi"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="MaxHumiA" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline"style="font-size:3.5rem">/</h1> 
                                                <h1 class="d-inline" id="MinHumiA" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">&nbsp;<?php echo Setting::$TitleBoard["Unit"]["humi"]?></h1>
                                            </div>
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
    <div class="col-md-12 col-sm-12">
        <section class="TeamB">
            <div class="card-body pt-1 pb-0 ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-1">
                            <div class="card-header pt-1 pb-1 gradient">
                                <div class="card-title">
                                    <i class="fas fa-users mr-1 fa-3x jWText"></i>
                                    <h1 class="d-inline display-4 jWText"><strong>

                                            <?php echo Setting::$team["B"]?>
                                        </strong>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-1 pb-0">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-charging-station fa-3x align-middle pt-2 lightBulb"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["ETProd"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="ETProdB" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">
                                                    &nbsp;<?php echo Setting::$TitleBoard["Unit"]["minute"]?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-bolt fa-3x align-middle pt-2 thunder"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["MXVolt"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="MXVoltB" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">
                                                    &nbsp;<?php echo Setting::$TitleBoard["Unit"]["volt"]?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-snowflake fa-3x align-middle pt-2 thermometer"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["tempCan"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="tempCanB" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">
                                                    &nbsp;<?php echo Setting::$TitleBoard["Unit"]["temp"]?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-tint fa-3x align-middle pt-2 dropWater"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["MXHumi"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="MaxHumiB" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline"style="font-size:3.5rem">/</h1> 
                                                <h1 class="d-inline" id="MinHumiB" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">&nbsp;<?php echo Setting::$TitleBoard["Unit"]["humi"]?></h1>
                                            </div>
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

<div class="row">
    <div class="col-md-12 col-sm-12">
        <section class="TeamC">
            <div class="card-body pt-1 pb-0 ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-1 ">
                            <div class="card-header pt-1 pb-1 gradient">
                                <div class="card-title">
                                    <i class="fas fa-users mr-1 fa-3x d-inline jWText" id="TeamName"></i>
                                    <h1 class="d-inline display-4 jWText" id="TeamName"><strong>

                                            <?php echo Setting::$team["C"]?>
                                        </strong>

                                    </h1>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-1 pb-0">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-charging-station fa-3x align-middle pt-2 lightBulb"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["ETProd"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="ETProdC" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">
                                                    &nbsp;<?php echo Setting::$TitleBoard["Unit"]["minute"]?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-bolt fa-3x align-middle pt-2 thunder"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["MXVolt"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="MXVoltC" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">
                                                    &nbsp;<?php echo Setting::$TitleBoard["Unit"]["volt"]?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-snowflake fa-3x align-middle pt-2 thermometer"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["tempCan"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="tempCanC" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">
                                                    &nbsp;<?php echo Setting::$TitleBoard["Unit"]["temp"]?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-tint fa-3x align-middle pt-2 dropWater"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["MXHumi"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="MaxHumiC" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline"style="font-size:3.5rem">/</h1> 
                                                <h1 class="d-inline" id="MinHumiC" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">&nbsp;<?php echo Setting::$TitleBoard["Unit"]["humi"]?></h1>
                                            </div>
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
    <div class="col-md-12 col-sm-12">
        <section class="TeamD">
            <div class="card-body pt-1 pb-0 ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-1">
                            <div class="card-header pt-1 pb-1 gradient">
                                <div class="card-title">
                                    <i class="fas fa-users mr-1 fa-3x jWText"></i>
                                    <h1 class="d-inline display-4 jWText"><strong>

                                            <?php echo Setting::$team["D"]?>
                                        </strong>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-1 pb-0">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-charging-station fa-3x align-middle pt-2 lightBulb"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["ETProd"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="ETProdD" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">
                                                    &nbsp;<?php echo Setting::$TitleBoard["Unit"]["minute"]?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-bolt fa-3x align-middle pt-2 thunder"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["MXVolt"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="MXVoltD" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">
                                                    &nbsp;<?php echo Setting::$TitleBoard["Unit"]["volt"]?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-snowflake fa-3x align-middle pt-2 thermometer"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["tempCan"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="tempCanD" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">
                                                    &nbsp;<?php echo Setting::$TitleBoard["Unit"]["temp"]?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="col-12 mb-0 pt-1">
                                            <div class="row ">
                                                <i class="fas fa-tint fa-3x align-middle pt-2 dropWater"></i>
                                                <h2 class="card-title pl-2 mt-1" style="font-size:2rem">
                                                    <strong><?php echo Setting::$TitleBoard["TeamTitle"]["MXHumi"]?></strong>
                                                </h2>
                                            </div>
                                            <div class="text-right">
                                                <h1 class="d-inline" id="MaxHumiD" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline"style="font-size:3.5rem">/</h1> 
                                                <h1 class="d-inline" id="MinHumiD" style="font-size:4.0rem">0</h1>
                                                <h1 class="d-inline">&nbsp;<?php echo Setting::$TitleBoard["Unit"]["humi"]?></h1>
                                            </div>
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

</section>

<script type="text/javascript">
$(document).ready(function () {
    // Initial call to update the clock
    // updateClock();
    // Update the clock every second
    // setInterval(updateClock, 1000);
    
    SendData();
    setInterval(function() {
      SendData();
    }, 3000);
});

function SendData() {
  $.ajax({
    url: "module/ajax_action.php",
    type: "POST",
    data: {
      "action": "Score",
    },
    success: function (data) {
      var jsonData = JSON.parse(data);
      updateData(jsonData);
    // console.log(data);
    },
    error: function (data) {
    }
  });
}

function updateData(parsedData) {
    for (var team in parsedData) {
        var LuxPerMinuteID = "ETProd" + team;
        var MaxVoltID = "MXVolt" + team;
        var MinTempID = "tempCan" + team;
        var MaxHumiID = "MaxHumi" + team;
        var MinHumiID = "MinHumi" + team;

        if (parsedData.hasOwnProperty(team)) {
            var LuxPerMinuteValue = parsedData[team].LuxPerMinute;
            var MaxVoltValue = parsedData[team].MaxVolt;
            var MinTempValue = parsedData[team].MinTemp;
            var MaxHumiValue = parsedData[team].MaxHumi;
            var MinHumiValue = parsedData[team].MinHumi;

          // Update the temperature and humidity elements
          $("#" + LuxPerMinuteID).text(LuxPerMinuteValue);
          $("#" + MaxVoltID).text(MaxVoltValue);
          $("#" + MinTempID).text(MinTempValue);
          $("#" + MaxHumiID).text(MaxHumiValue);
          $("#" + MinHumiID).text(MinHumiValue);
        }
    }
}

// function updateClock() {
//   var now = new Date();
//   var hours = now.getHours().toString().padStart(2, '0');
//   var minutes = now.getMinutes().toString().padStart(2, '0');
//   var seconds = now.getSeconds().toString().padStart(2, '0');
//   var timeString = hours + ':' + minutes + ':' + seconds;
//   document.getElementById('clock').textContent = timeString;
// }


</script>
