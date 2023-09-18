<?php
require_once __DIR__ . "/module_errorlog/errorlog.php";
require_once __DIR__ . "/module_errorcode/errorCode.php";
require_once __DIR__ . "/moule_errorMachine/errorMachine.php";

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
        // case 'errorCode':
        //     $CtResult  = new ErrorCode_Total($wh,$newDate);
        //     $result    = $CtResult->getChart();
        //     $errorCode = $CtResult->getErrorCode();
        //     $Ct2Result = new ErrorCode($arrWH,$newDate,$errorCode);
        //     $result   .= $Ct2Result->getChart();
        //     print_r($result);
        //     break;
        // case 'errorMachine':
        //     $CtResult  = new ErrorMachine_Total($wh,$newDate);
        //     $result    = $CtResult->getChart();
        //     // $errorCode = $CtResult->getErrorCode();
        //     // $Ct2Result = new ErrorMachine_Compare($WH,$date,$errorCode);
        //     // $result   .= $Ct2Result->getChart();
        //     print_r($result);
        //     break;
        // case 'MachineDetails':
            
        //     break;
        // default:
        //     echo "No Action Name " . $action;
        //     break;
    }
} else {
    echo 0;
}
exit;

Class getAction
{
    private $wh;
    private $date;
    public function __construct($formData)
    {
        parse_str($formData, $data);
  
        $this->wh = $data['dropdownWH'] ?? NULL;
        $this->date = $data['selectedDateRange'] ?? NULL;
    }

    public function getDate(){
        $date = $this->date;
        $a = explode("||//",$date);
        return $a;
    }

    public function getData(
        &$wh_query,
        &$date,
        &$newDate,
        &$arrWH
    ) {
        $wh_query = $this->getWH();
        $date     = $this->date;
        $newDate  = $this->getDate();
        $arrWH    = $this->wh;
    }

    public function getWH(){
        $wh = $this->wh;
        if($wh == NULL)
            return false;
        $wh_query =' ';
        if(!is_array($wh))
            return " asrs_error_trans.wh = '$wh' ";
       
        foreach ($wh as $key => $value) {
            $wh_query .= count($wh) > 1 && $key == 0 ? ' ( ' : ' ';
        
            $wh_query .= count($wh) > 1 && $key == 0 ? ' asrs_error_trans.wh = "' .$value. '" ' : ' OR asrs_error_trans.wh = "' .$value. '" ';
        
            $wh_query .= count($wh) > 1 && array_key_last($wh) == $key ? ') ' : '';
        }
        count($wh) == 1 ? $wh_query = str_replace('OR', '', $wh_query) : $wh_query;
        
        return $wh_query;
    }

    // public function getMonth(){
    //     $month = $this->month;
    //     if($month == NULL)
    //         return false;
    //     $month_query =' ';
    //     //MONTH(`tran_date_time`) = 7
    //     foreach ($month as $key => $value) {
    //         $month_query .= count($month) > 1 && $key == 0 ? ' ( ' : ' ';
        
    //         $month_query .= count($month) > 1 && $key == 0 ? ' MONTH(`tran_date_time`) = "' .$value. '" ' : ' OR MONTH(`tran_date_time`) = "' .$value. '" ';
        
    //         $month_query .= count($month) > 1 && array_key_last($month) == $key ? ') ' : '';
    //     }
    //     count($month) == 1 ? $month_query = str_replace('OR', '', $month_query) : $month_query;
        
    //     return $month_query;
    // }

    // public function getYear(){
    //     $year = $this->year;
    //     if($year == NULL)
    //         return false;
    //     $year_query =' ';
        
    //     foreach ($year as $key => $value) {
    //         $year_query .= count($year) > 1 && $key == 0 ? ' ( ' : ' ';
        
    //         $year_query .= count($year) > 1 && $key == 0 ? ' YEAR(`tran_date_time`) = "' .$value. '" ' : ' OR YEAR(`tran_date_time`) = "' .$value. '" ';
        
    //         $year_query .= count($year) > 1 && array_key_last($year) == $key ? ') ' : '';
    //     }
    //     count($year) == 1 ? $year_query = str_replace('OR', '', $year_query) : $year_query;
        
    //     return $year_query;
    // }

    // public function getCompare(&$mt_date, &$WH){
    //     $Year = $this->year;
    //     $Month = $this->month;
    //     if($Year == NULL || $Month == NULL)
    //         return NULL;

    //     foreach ($Year as $key => $value) {
    //         $Year = $value;
    //         foreach ($Month as $key => $values) {
    //             $dateReq = $Year . '-' . $values;
    //             $mt_date[] = $dateReq;
    //         }
    //     }
    //     $WH = $this->wh;
    // }
   
}

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
