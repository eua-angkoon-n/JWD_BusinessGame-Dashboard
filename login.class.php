<?php 
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');

require_once ('include/class_crud.inc.php');
require_once ('include/setting.inc.php');
require_once ('include/function.inc.php');
require_once ('config/mysecret.php');


Class Login{


    public function getLogin($email,$pass){
        if(isset($email) && isset($pass) ){
            $email = trim($email);
            $pass = trim($pass);
          
            if($email == MySecret::$adminUser && $pass == MySecret::$adminPass){
                $_SESSION['sess_user'] = $email;
                $_SESSION['sess_pass'] = $pass;
                return true;
            } else{
                return '<script>sweetAlert("ผิดพลาด...", "ชื่อผู้ใช้ระบบหรือรหัสผ่านไม่ถูกต้อง ", "error");</script>';
              }
        }
    }
}
?>