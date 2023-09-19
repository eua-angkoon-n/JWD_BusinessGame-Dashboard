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
            $result[$team]['Temp'] = $temp + rand(1,9);
            $result[$team]['Humi'] = $humi + rand(1,9);
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
            $numTest = rand(1,9);
            $result[$team]['Volt'][] = "$datetime,  ".$volt + $numTest."";
            $result[$team]['Solar'][] = "$datetime, ".$solar + $numTest."";
        }
        
        return json_encode($result);
    }
}
?>
