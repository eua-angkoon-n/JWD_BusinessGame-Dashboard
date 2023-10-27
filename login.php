<?PHP
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok');	
error_reporting(error_reporting() & ~E_NOTICE);
require_once (__DIR__ . '/login.class.php');

$Call = new Login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <?php include(__DIR__ . '/header_login.php'); ?>
</head>

<body class="hold-transition login-page" style="background:url(dist/img/bg_login.png) no-repeat; background-position: 50% center;">

<section class="h-100">
    <div class="container h-100 col-md-12">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="brand text-center">
                    <img src="dist/img/SCGJWDLogo.png" alt="logo" class="logo img-responsive m-0">
                </div>
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title text-center w-100 text-bold" style="line-height:1.8rem;">Bussiness Game Admin Panel
                        </h4><br />

                        <!-------------------------------------------------------------->
                        <form method="POST" id="frm_login" name="frm_login" class="my-login-validation" novalidate="">
                            <br />
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input id="email" type="text" class="form-control" name="email" value="" required
                                    autofocus>
                                <div class="invalid-feedback">Username is invalid</div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password"
                                    autocomplete="off" required>
                                <div class="invalid-feedback">Password is required</div>
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block" id="chk_login">เข้าระบบ</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="footer text-center">
                    Copyright &copy; 2022 &mdash; SCG JWD Logistics
                </div>
            </div>
        </div>
    </div>
</section>


<script>

$(document).ready(function () { 

  $("#chk_login").click(function(){
  if ($("#email").val()==""){
    sweetAlert("ผิดพลาด...", "ชื่อผู้ใช้งานไม่ถูกต้อง!", "error"); //The error will display
		return false;
 	}else if($("#password").val()==""){
    sweetAlert("ผิดพลาด...", "กรุณากรอกรหัสผ่าน", "error"); //The error will display
		return false;
  }else{
    
        return true;  
  }

  });

});

</script>

<?PHP
    if(isset($_POST['email']) && isset($_POST['password']) ){
        $GetLogin = $Call->getLogin($_POST['email'],$_POST['password']);
        if(!is_string($GetLogin)){
            $web = "./?uuid=".Setting::$bcrypt['admin'];
            header("Location:$web");
        } else {
            echo $GetLogin;
            exit;
        }
    }
?>

</body>
</html>