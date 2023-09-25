<?php
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once __DIR__ . "/../config/connect_db.inc.php";
require_once __DIR__ . "/../include/class_crud.inc.php";
require_once __DIR__ . "/../include/function.inc.php";
require_once __DIR__ . "/../include/setting.inc.php";

$column = $_POST['order']['0']['column'] + 1;
$search = $_POST["search"]["value"];
$start  = $_POST["start"];
$length = $_POST["length"];
$dir    = $_POST['order']['0']['dir'];
$draw   = $_POST["draw"];

$dataGet = array(
    'column' => $column,
    'search' => $search,
    'length' => $length,
    'start'  => $start,
    'dir'    => $dir,
    'draw'   => $draw
);

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'TEAM':
            $Call    = new TeamTable($_POST['team'],$_POST['date'],$dataGet);
            $result = $Call->getTable(); 
            // print_r($result); 
            echo json_encode($result); 
            break;
    }
} else {
    echo json_encode('No Action');
}
exit;

Class TableProcessing {
    protected $search;
    protected $query_search;
    protected $length;
    protected $start;
    protected $pStart;
    protected $limit;
    protected $column_sort;
    protected $orderBY;
    protected $column;
    protected $dir;
    protected $draw;
    public function __construct($dataGet)
    {
        $this->pStart = $dataGet['start'];
        $this->length = $dataGet['length'];
        $this->search = $dataGet['search'];
        $this->dir    = $dataGet['dir'];
        $this->draw   = $dataGet['draw'];

        $this->query_search = $this->getQuery_search($dataGet['search']);
        $this->length = $this->getLength($dataGet['start']);
        $this->start = $this->getStart($dataGet['start']);
        $this->limit = $this->getLimit();
        $this->column = $this->getColumn($dataGet['column']);
        $this->column_sort = $this->getColumn_sort();
        $this->orderBY = $this->getOrderBY();
    }

    public function getQuery_search($search){
        $query_search = "";
        if (!empty($search)) {
            $query_search = $this->getStringSearch($search);
        } else {
            $query_search = "";
        }
        return $query_search;
    }

    public function getStringSearch($search) {
        $arrSearch = Setting::$DataTableSearch;
        
        // Initialize an empty array to store individual search conditions
        $conditions = [];
    
        // Loop through the array of search fields
        foreach ($arrSearch as $value) {
            // Add each search condition to the array
            $conditions[] = "`$value` LIKE '%" . $search . "%'";
        }
    
        // Join the individual conditions with "OR" to create the final condition
        $finalCondition = implode(" OR ", $conditions);
    
        // Construct the SQL query string
        $sql = "AND ($finalCondition)";
    
        return $sql;
    }

    public function getLength($start){
        if ($start == 0) {
            $length = $this->length;
        } else {
            $length = $this->length;
        }
        return $length;
    }

    public function getStart($start){
        // if($start == 0) 
        //     return 0;
        $start = ($start - 1) * $this->length;
        return $start;
    }

    public function getLimit(){
        $limit = "LIMIT " . $this->pStart . ", " . $this->length . "";
        $this->length == -1 ? $limit = "" : '';
        return $limit;
    }

    public function getColumn($column){
        empty($column) ? $column = 0 : $column;
        return $column;
    }

    public function getColumn_sort(){
        $column_sort = Setting::$DataTableCol;
        return $column_sort;
    }

    public function getOrderBY(){
        $column_sort = $this->column_sort;
        $orderBY = $column_sort[$this->column];
        return $orderBY;
    }
}

class TeamTable extends TableProcessing {
    protected $team;
    protected $date;
    public function __construct($team, $date, $TableSET) {
        parent::__construct($TableSET);

        $this->team = $team ?? NULL;
        $this->date = $this->splitDateRange($date) ?? getLast1Day();
    }

    public function getTable(){
        return $this->SqlQuery();
    }

    public function splitDateRange($dateRange) {
        // Split the date range string by " - "
        $dateParts = explode(" - ", $dateRange);
    
        if (count($dateParts) === 2) {
            // If there are two parts, assume the first part is the start date and the second part is the end date
            $startDate = trim($dateParts[0]);
            $endDate = trim($dateParts[1]);
    
            // You can further format the dates if needed
            $startDate = date("Y-m-d H:i:s", strtotime($startDate));
            $endDate = date("Y-m-d H:i:s", strtotime($endDate));
    
            return [$startDate, $endDate];
        } else {
            // If there aren't exactly two parts, return an empty array or handle the error as needed
            return [];
        }
    }
    public function SqlQuery(){
        $sql      = $this->getSQL(true);
        $sqlCount = $this->getSQL(false);
        // return $sql;
        try {
            $con = connect_database();
            $obj = new CRUD($con);

            $fetchRow = $obj->fetchRows($sql);
            $numRow   = $obj->getCount($sqlCount);

            $Result   = $this->createArrayDataTable($fetchRow, $numRow);
            
            return $Result;
        } catch (PDOException $e) {
            return "Database connection failed: " . $e->getMessage();
        
        } catch (Exception $e) {
            return "An error occurred: " . $e->getMessage();
        } finally {
            $con = null;
        }
    }

    public function getSQL(bool $OrderBY){
        $team = $this->team;
        $date = $this->date;

        if($OrderBY)
            $sql  = "SELECT * ";
        else
            $sql  = "SELECT count(id_logs) AS total_row ";
        $sql .= "FROM tb_logs_test ";
        $sql .= "WHERE 1=1 ";
        $sql .= "AND team = '$team' ";
        if(!empty($date)) {
            $sql .= "AND logs_datetime BETWEEN '".$date[0]."' AND '".$date[1]."' ";
            $sql .= "$this->query_search ";
        }
        if($OrderBY) {
            $sql .= "ORDER BY ";
            $sql .= "$this->orderBY ";
            $sql .= "$this->dir ";
            $sql .= "$this->limit ";
        }
        
        return $sql;
    }

    public function createArrayDataTable($fetchRow, $numRow){

        $arrData = null;
        $output = array(
            "draw" => intval($this->draw),
            "recordsTotal" => intval(0),
            "recordsFiltered" => intval(0),
            "data" => $arrData,
        );

        if (count($fetchRow) > 0) {
            $No = ($numRow - $this->pStart);
            foreach ($fetchRow as $key => $value) {

                $dataRow = array();
                $dataRow[] = $No . '.';
              
                $dataRow[] = ($fetchRow[$key]['logs_datetime'] == '' ? '-' : date("d/m/Y H:i:s", strtotime($fetchRow[$key]['logs_datetime'])));
                $dataRow[] = ($fetchRow[$key]['logs_temp']     == '' ? '-' : $fetchRow[$key]['logs_temp']);
                $dataRow[] = ($fetchRow[$key]['logs_humi']     == '' ? '-' : $fetchRow[$key]['logs_humi']);
                $dataRow[] = ($fetchRow[$key]['logs_volt']     == '' ? '-' : $fetchRow[$key]['logs_volt']);
                $dataRow[] = ($fetchRow[$key]['logs_solar']    == '' ? '-' : $fetchRow[$key]['logs_solar']);
              
                $arrData[] = $dataRow;
                $No--;
            }
        }

        $output = array(
            "draw" => intval($this->draw),
            "recordsTotal" => intval($numRow),
            "recordsFiltered" => intval($numRow),
            "data" => $arrData,
        );

        return $output;
    }
}

?>