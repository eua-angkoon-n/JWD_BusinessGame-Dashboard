<?php
class Setting
{
    public static $AppTimeZone = 'Asia/Bangkok';
    public static $DefaultProvinceTH = 'สมุทรสาคร';
    public static $DefaultProvince = 'Samut Sakhon';

    public static $strDOWCut = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
    public static $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");

    public static $SiteList = array('PCS', 'JPK', 'JPAC', 'PACM', 'PLP', 'PACS', 'PACA', 'PACT');
    public static $BG_Command = 'bg';

    public static $arr_day_of_week = array('','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์','อาทิตย์');	
    public static $arr_mouth = array('มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');	
    public static $arr_mouthEN = array('January','February','March','April','May','June','July','August','September','October','November','December');	

    public static $arr_newMonths = array(
        '01' => 'มกราคม',
        '02' => 'กุมภาพันธ์',
        '03' => 'มีนาคม',
        '04' => 'เมษายน',
        '05' => 'พฤษภาคม',
        '06' => 'มิถุนายน',
        '07' => 'กรกฎาคม',
        '08' => 'สิงหาคม',
        '09' => 'กันยายน',
        '10' => 'ตุลาคม',
        '11' => 'พฤศจิกายน',
        '12' => 'ธันวาคม'
    );
    public static $arr_newMonthsEN = array(
        '01' => 'January',
        '02' => 'February',
        '03' => 'March',
        '04' => 'April',
        '05' => 'May',
        '06' => 'June',
        '07' => 'July',
        '08' => 'August',
        '09' => 'September',
        '10' => 'October',
        '11' => 'November',
        '12' => 'December'
    );
    public static $ColumnBarColor = array(
        "#3459B8", // Dark Blue
        "#5077C6",
        "#6D94D4",
        "#89B2E2",
        "#A6CFF0", // Pale Blue
        "#C4ECFF", // Lighter Blue
        "#7BA3CC", // Medium Blue
        "#5389B4",
        "#306FA0",
        "#0D559C", // Deep Blue
        "#003C87"  // Navy Blue
    );
    public static $SQLSET = "SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));";
    
    public static $team = array(
        "A" => "เย็นเฉียบ",
        "B" => "Empire Cold Storage",
        "C" => "F&C Team",
        "D" => "Idea Team"
    ); 

    public static $title_site = array
    (
        "Dashboard" => "Dashboard",
        "Score" => "Score", 
        "A" => "เย็นเฉียบ",
        "B" => "Empire Cold Storage",
        "C" => "F&C Team",
        "D" => "Idea Team"
    );
    public static $title_act = array
    (
        "Dashboard" => "Dashboard",
        "Score" => "Score", 
        "A" => "เย็นเฉียบ",
        "B" => "Empire Cold Storage",
        "C" => "F&C Team",
        "D" => "Idea Team"
    );
    public static $breadcrumb_txt = array
    (
        "Dashboard" => "Dashboard",
        "Score" => "Score", 
        "A" => "เย็นเฉียบ",
        "B" => "Empire Cold Storage",
        "C" => "F&C Team",
        "D" => "Idea Team"
    );

    public static $DataTableCol = array( 
        0 => "id_logs",
        1 => "id_logs",
        2 => "logs_datetime",
        3 => "logs_temp",
        4 => "logs_humi",
        5 => "logs_volt",
        6 => "logs_solar",
    );
    public static $DataTableSearch = array(
        "logs_datetime"
    );

    public static $TitleBoard = array(
        "DB" => array(
            "temp" => "Temp.",
            "humi" => "Humidity",
            "lux"  => "Lux",
            "volt" => "Volt",
        ),
        "TeamTitle" => array(
            "ETProd" => "ผลิตไฟฟ้าได้",
            "MXVolt" => "กำลังไฟสูงสุด",
            "tempCan" => "อุณหภูมิที่ทำได้",
            "MXHumi" => "ความชื้นสูงสุด/ต่ำสุด",
        ),
        "Unit" => array(
            "minute" => "min.",
            "volt" => "V.",
            "temp" => "°C",
            "humi" => "%"
        )
    );
}
