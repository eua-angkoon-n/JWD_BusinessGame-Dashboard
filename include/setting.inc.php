<?php
class Setting
{
    public static $AppTimeZone = 'Asia/Bangkok';
    public static $arr_day_of_week = array('','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์','อาทิตย์');	
    public static $team = array(
        "A" => "คลังสินค้า YENCHEIB",
        "B" => "คลังสินค้า JMT",
        "C" => "คลังสินค้า F&C",
        "D" => "คลังสินค้า IDEA"
    ); 

    public static $title_site = array
    (
        "Dashboard" => "Dashboard",
        "Score" => "Score", 
        "A" => "คลังสินค้า YENCHEIB",
        "B" => "คลังสินค้า JMT",
        "C" => "คลังสินค้า F&C",
        "D" => "คลังสินค้า IDEA"
    );
    public static $title_act = array
    (
        "Dashboard" => "Dashboard",
        "Score" => "Score", 
        "A" => "คลังสินค้า YENCHEIB",
        "B" => "คลังสินค้า JMT",
        "C" => "คลังสินค้า F&C",
        "D" => "คลังสินค้า IDEA"
    );
    public static $breadcrumb_txt = array
    (
        "Dashboard" => "Dashboard",
        "Score" => "Score", 
        "A" => "คลังสินค้า YENCHEIB",
        "B" => "คลังสินค้า JMT",
        "C" => "คลังสินค้า F&C",
        "D" => "คลังสินค้า IDEA"
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
