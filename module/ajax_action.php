<?php
require_once __DIR__ . "/../config/connect_db.inc.php";
require_once __DIR__ . "/../include/class_crud.inc.php";
require_once __DIR__ . "/../include/function.inc.php";

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action){
        case 'Digital':
            $Call   = new DashboardResult($action);
            $Result = $Call->getTempAndHumi();
            print_r($Result);
            break;
        case 'Chart':
            $Call   = new DashboardResult($action);
            $Result = $Call->getChartArray();
            print_r($Result);
            break;
        case 'Team':
            if(isset($_POST['date'])) {
                $Call = new TeamBoard($_POST['team'],$_POST['date']);
                $Result = $Call->getOnlyChart();
                print_r($Result);
                break;
            }
            $Call   = new TeamBoard($_POST['team'],NULL);
            $Result = $Call->processLogData();
            print_r($Result);
            break;
    }
} else {
    echo 0;
}
exit;


Class DashboardResult 
{
    private $action;

    public function __construct($action){
        $this->action = $action ?? NULL;
    }

    public function getTempAndHumi() {
        return $this->ConvertTempAndHumi();
    }

    public function getChartArray() {
        return $this->ConvertVoltAndSolar();
    }

    public function getRecord() {
        $action = $this->action;

        $sql  = "SELECT * ";
        $sql .= "FROM ";
        $sql .= "( ";
        $sql .= "SELECT *, ROW_NUMBER() OVER (PARTITION BY team ORDER BY logs_datetime DESC) AS row_num ";
        $sql .= "FROM tb_logs_test ";
        $sql .= ") AS ranked ";
        $sql .= "WHERE ";
        if($action == "Digital")
            $sql .= "row_num = 1";
        else {
            $sql .= "row_num BETWEEN 1 AND 20 ";
            $sql .= "ORDER BY row_num DESC";
        }

        try {
            $con = connect_database();
            $obj = new CRUD($con);

            try {
                $lastRecord = $obj -> fetchRows($sql);
                return $lastRecord;
            } catch (Exception $e) {
                return "An error occurred: " . $e->getMessage();
            }

        } catch (PDOException $e) {
            return "Database connection failed: " . $e->getMessage();
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        } finally {
            $con = null;
        }
        
    }

    public function ConvertTempAndHumi() {
        $data = $this->getRecord();
        $result = array();

        foreach($data as $record) {
            $team = $record['team'];
            $temp = $record['logs_temp'];
            $humi = $record['logs_humi'];
    
            // Check if the team already exists in the result array
            if (!isset($result[$team])) {
                $result[$team] = array();
            }
    
            // Add temperature and humidity to the team's data
            $result[$team]['Temp'] = $temp;
            $result[$team]['Humi'] = $humi;
        }

        return json_encode($result);
    }

    public function ConvertVoltAndSolar() {
        $data = $this->getRecord();
        $result = array();

        foreach ($data as $record) {
            $team = $record['team'];
            $datetime = $record['logs_datetime'];
            $volt = $record['logs_volt'];
            $solar = $record['logs_solar'];
        
            if (!isset($result[$team])) {
                $result[$team] = array("Volt" => array(), "Solar" => array());
            }
            $result[$team]['Volt'][] = "$datetime,  ".$volt."";
            $result[$team]['Solar'][] = "$datetime, ".$solar."";
        }
        
        return json_encode($result);
    }
}

Class TeamBoard {
    private $team;
    private $fetchData;
    private $date;
    public function __construct($action,?string $date){
        $this->team = $action ?? NULL;
        if($date)
            $this->date = parseDateString($date);
        $this->fetchData = $this->QueryDB();
    }

    public function test(){
        return $this->date;
    }

    public function getCardArray(){

    }

    public function QueryDB(){
        $sql  = "SELECT * ";
        $sql .= "FROM ";
        $sql .= "( ";
        $sql .= "SELECT *, ROW_NUMBER() OVER (PARTITION BY team ORDER BY logs_datetime DESC) AS row_num ";
        $sql .= "FROM tb_logs_test ";
        $sql .= ") AS ranked ";
        $sql .= "WHERE ";
        $sql .= "team = '$this->team' ";
        if(!empty($this->date)){
            $date = $this->date;
            $sql .= "AND ";
            $sql .= "logs_datetime BETWEEN '".$date['start']."' AND '".$date['end']."' ";
        }
        $sql .= "ORDER BY row_num DESC ";
        
        try {
            $con = connect_database();
            $obj = new CRUD($con);
            $Row = $obj->fetchRows($sql);
        } catch (PDOException $e){
            return "Database connection failed: " . $e->getMessage();
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        } finally {
            $con = null;
        }
        return $Row;
    }

    // Function to get the last 20 data points for logs_temp and logs_humi
    public function getLast20TempHumiData($logData) {
        $tempHumiData = array();
        $dataCount = count($logData);

        for ($i = max(0, $dataCount - 30); $i < $dataCount; $i++) {
            $log = $logData[$i];
            $formattedDatetime = date('H:i:s', strtotime($log['logs_datetime']));

            if ($i === $dataCount - 1) {
                // If it's the last data, set the third value to logs_solar
                $tempHumiData[] = [$formattedDatetime, $log['logs_temp'], $log['logs_humi'], $log['logs_temp'], $log['logs_temp']."°C", $log['logs_humi'], $log['logs_humi']."%"];
            } else {
                $tempHumiData[] = [$formattedDatetime, $log['logs_temp'], $log['logs_humi'], NULL,NULL,NULL,NULL];
            }
        }

        return $tempHumiData;
    }

    // Function to get the last 20 data points for logs_volt
    public function getLast20VoltData($logData) {
        $voltData = array();
        $dataCount = count($logData);

        for ($i = max(0, $dataCount - 30); $i < $dataCount; $i++) {
            $log = $logData[$i];
            $formattedDatetime = date("H:i:s", strtotime($log['logs_datetime']));

            if ($i === $dataCount - 1) {
                $voltData[] = [$formattedDatetime, $log['logs_volt'], $log['logs_volt'], $log['logs_volt']."v."];
            } else {
                $voltData[] = [$formattedDatetime, $log['logs_volt'], NULL, NULL];
            }
        }

        return $voltData;
    }

    // Function to get the last 20 data points for logs_solar
    public function getLast20SolarData($logData) {
        $solarData = array();
        $dataCount = count($logData);

        for ($i = max(0, $dataCount - 30); $i < $dataCount; $i++) {
            $log = $logData[$i];
            $formattedDatetime = date("H:i:s", strtotime($log['logs_datetime']));

            if ($i === $dataCount - 1) {
                $solarData[] = [$formattedDatetime, $log['logs_solar'], $log['logs_solar'], $log['logs_solar']."Lux"];
            } else {
                $solarData[] = [$formattedDatetime, $log['logs_solar'], NULL, NULL];
            }
        }

        return $solarData;
    }

    public function getLast300Data($logData) {
        $Data = array();
        $dataCount = count($logData);

        for ($i = max(0, $dataCount - 30); $i < $dataCount; $i++) {
            $log = $logData[$i];
            $formattedDatetime = date("d/m/Y H:i:s", strtotime($log['logs_datetime']));

            $Data[] = [
                "Date" => $formattedDatetime, 
                "temp" => $log['logs_temp'], 
                "humi" => $log['logs_humi'], 
                "volt" => $log['logs_volt'], 
                "solar"=> $log['logs_solar']
            ];
            
        }

        return $Data;
    }

    public function getOnlyChart() {
        $logData = $this->fetchData;
        $tempHumiData = $this->getLast20TempHumiData($logData);
        $voltData     = $this->getLast20VoltData($logData);
        $solarData    = $this->getLast20SolarData($logData);
        $result = array(
            'ChartData' => array(
                'TempHumiData' => $tempHumiData,
                'VoltData' => $voltData,
                'SolarData' => $solarData
            ),
        );
        return json_encode($result);
    }

    public function processLogData() {
        $logData = $this->fetchData;
        $countLux = 0;
        $MaxVolt = null;
        $MinTemp = null;
        $MaxHumi = null;
        $MinHumi = null;
    
        // Get the last 20 data points for each chart
        // $tempHumiData = $this->getLast20TempHumiData($logData);
        // $voltData     = $this->getLast20VoltData($logData);
        // $solarData    = $this->getLast20SolarData($logData);
        $Data300      = $this->getLast300Data($logData); 
    
        // Calculate LuxPerMinute
        foreach ($logData as $log) {
            // Calculate LuxPerMinute
            if ($log['logs_solar'] >= 3000) {
                $countLux += 1;
            }
    
            // Update MaxVolt
            if ($MaxVolt === null || $log['logs_volt'] > $MaxVolt) {
                $MaxVolt = $log['logs_volt'];
            }
    
            // Update MinTemp
            if ($MinTemp === null || $log['logs_temp'] < $MinTemp) {
                $MinTemp = $log['logs_temp'];
            }
    
            // Update MaxHumi and MinHumi
            if ($MaxHumi === null || $log['logs_humi'] > $MaxHumi) {
                $MaxHumi = $log['logs_humi'];
            }
            if ($MinHumi === null || $log['logs_humi'] < $MinHumi) {
                $MinHumi = $log['logs_humi'];
            }
        }
    
        // Calculate LuxPerMinute as per your updated formula
        $LuxPerMinute = ($countLux * 5) / 60;

        // Store the results in an associative array
        $result = array(
            'Card' => array(
                'LuxPerMinute' => round($LuxPerMinute, 2),
                'MaxVolt' => $MaxVolt ?? 0,
                'MinTemp' => $MinTemp ?? 0,
                'MaxHumi' => $MaxHumi ?? 0,
                'MinHumi' => $MinHumi ?? 0
            ),
            // 'ChartData' => array(
            //     'TempHumiData' => $tempHumiData,
            //     'VoltData' => $voltData,
            //     'SolarData' => $solarData
            // ),
            'Fetch' => $Data300
        );
        // return $result;
        return json_encode($result);
    }
}
?>
