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
        "linkTable"=> "",
        "Score" => "Score", 
        "A" => "คลังสินค้า YENCHEIB",
        "B" => "คลังสินค้า JMT",
        "C" => "คลังสินค้า F&C",
        "D" => "คลังสินค้า IDEA"
    );
    public static $title_act = array
    (
        "Dashboard" => "Dashboard",
        "linkTable"=> "",
        "Score" => "Score", 
        "A" => "คลังสินค้า YENCHEIB",
        "B" => "คลังสินค้า JMT",
        "C" => "คลังสินค้า F&C",
        "D" => "คลังสินค้า IDEA"
    );
    public static $breadcrumb_txt = array
    (
        "Dashboard" => "Dashboard",
        "linkTable"=> "",
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
            "ETProd" => "ผลิตโซลาร์ได้",
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

    public static $bcrypt = array(
        "A" => "0ea7f0f9529085aba63e4745c6556bef3b1f0df4",
        "B" => "53bef39b17fa4f7cab7c0de0a65f3035b779e1ef",
        "C" => "6be820c13e494f33a8d5240596a8244152bd55ce",
        "D" => "2853d1f1c7fbe524c961103ebc77cf9c8181a34c"
    );

    public static $webLocation = "http://localhost/BusinessGame_Dashboard/";
}
