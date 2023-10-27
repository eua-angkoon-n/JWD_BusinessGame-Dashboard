<?PHP
ob_start();
session_start();

require_once __DIR__ . '/config/connect_db.inc.php';
require_once __DIR__ . '/include/class_crud.inc.php';
require_once __DIR__ . '/include/function.inc.php';
require_once __DIR__ . '/include/setting.inc.php';
require_once __DIR__ . '/include/timer.inc.php';

header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set(Setting::$AppTimeZone);

isset($_REQUEST['module']) ? $module = $_REQUEST['module'] : $module = '';
isset($_REQUEST['uuid']) ? $uuid = $_REQUEST['uuid'] : $uuid = '';

if( empty($_SESSION['sess_user']) 
    && $uuid != Setting::$bcrypt['A'] 
    && $uuid != Setting::$bcrypt['B'] 
    && $uuid != Setting::$bcrypt['C'] 
    && $uuid != Setting::$bcrypt['D'] 
    && $uuid != Setting::$bcrypt['admin']
) { 
    $_SESSION = []; //empty array. 
    session_destroy(); 
    die(include('login.php')); 
} else if (
    empty($_SESSION['sess_user']) 
    && $uuid == Setting::$bcrypt['admin']
) {
    $_SESSION = []; //empty array. 
    session_destroy(); 
    die(include('login.php')); 
}

$Time = new Processing;
$start = $Time->Start_Time();



chkModule($module, $uuid);

switch ($module) {
    case "A" :
        // chkModule($module,$uuid);
        $include_module = __DIR__ . "/module/team.inc.php";
        $TEAM = "A";
        $module == "A" ? $active_A = "active" : $active_A = ""; #ไฮไลท์เมนูด้านซ้าย
        $title_site = Setting::$title_site[$module];
        $title_act = Setting::$title_act[$module];
        $breadcrumb_txt = Setting::$breadcrumb_txt[$module];

        break;
    case "B" :
        // chkModule($module,$uuid);
        $include_module = __DIR__ . "/module/team.inc.php";
        $TEAM = "B";
        $module == "B" ? $active_B = "active" : $active_B = ""; 
        $title_site = Setting::$title_site[$module];
        $title_act = Setting::$title_act[$module];
        $breadcrumb_txt = Setting::$breadcrumb_txt[$module];
        break;
    case "C" :
        // chkModule($module,$uuid);
        $include_module = __DIR__ . "/module/team.inc.php";
        $TEAM = "C";
        $module == "C" ? $active_C = "active" : $active_C = ""; 
        $title_site = Setting::$title_site[$module];
        $title_act = Setting::$title_act[$module];
        $breadcrumb_txt = Setting::$breadcrumb_txt[$module];
        break;
    case "D" :
        // chkModule($module,$uuid);
        $include_module = __DIR__ . "/module/team.inc.php";
        $TEAM = "D";
        $module == "D" ? $active_D = "active" : $active_D = "";
        $title_site = Setting::$title_site[$module];
        $title_act = Setting::$title_act[$module];
        $breadcrumb_txt = Setting::$breadcrumb_txt[$module];
        break;
    case "Score":
        $include_module = __DIR__ . "/module/score.inc.php";
        $module == "Score" ? $active_Score = "active" : $active_Score = "";
        $title_site = Setting::$title_site[$module];
        $title_act = Setting::$title_act[$module];
        $breadcrumb_txt = Setting::$breadcrumb_txt[$module];
        break;
    case "linkTable":
        $include_module = __DIR__ . "/module/linktable.inc.php";
        $module == "linkTable" ? $backgroundL = "cardBackground" : $backgroundL = "";
        $title_site = Setting::$title_site[$module];
        $title_act = Setting::$title_act[$module];
        $breadcrumb_txt = Setting::$breadcrumb_txt[$module];
        break;
    case 'logout':
        include('logout.php');
      break;
    default:
        $include_module = __DIR__ . "/module/dashboard.inc.php";
        $txt = "Dashboard";
        $uuid = Setting::$bcrypt['admin'];
        $module == "dashboard" || $module == "" ? $active_Dashboard = "active" : $active_Dashboard = ""; #ไฮไลท์เมนูด้านซ้าย
        $title_site = Setting::$title_site[$txt];
        $title_act = Setting::$title_act[$txt];
        $breadcrumb_txt = Setting::$breadcrumb_txt[$txt];
      break;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include( __DIR__ . "/header.php"); ?>
</head>

<body class="layout-fixed layout-navbar-fixed sidebar-collapse">
    <!--sidebar-collapse sidebar-mini layout-fixed layout-navbar-fixed sidebar-closed-->
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/SCGJWDLogo.png" alt="AdminLTELogo" height="40" width="200">
        </div>

       <?php include( __DIR__ . "/navbar.php"); ?>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#000043;">
            <!-- Brand Logo -->
            <a href="./?uuid=<?php echo Setting::$bcrypt['admin']?>" class="brand-link">
                <img src="dist/img/SCGJWDLogo.png" alt="JWD Logo" class="w-100 p-0 m-0">
                <span class="font-weight-bold p-1 mt-2 text-pcs-ct" style="background-color:#f15c22;color:white">
            </a>

            <!-- Sidebar -->
            <div class="sidebar "><br><br>

                <!-- Sidebar Menu active-->
                <nav class="mt-4">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="./?uuid=<?php echo Setting::$bcrypt['admin']?>" class="nav-link <?PHP echo $active_Dashboard; ?>">
                                <i class="nav-icon fa fa-solid fa-chalkboard"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?module=Score&uuid=<?php echo Setting::$bcrypt['admin']?>" class="nav-link <?PHP echo $active_Score; ?>">
                                <i class="nav-icon fa far fa-star"></i>
                                <p>Score</p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <!--ถ้าจะให้เปิดใส่คลาส menu-open-->
                            <a href="#" class="nav-link"><i class="nav-icon fas fa-users"></i>
                                <p>Team<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ml-2">
                                    <a href="?module=A&uuid=<?php echo Setting::$bcrypt['admin']?>" class="nav-link <?PHP echo $active_A;?>">
                                        <i class="fas fa-user-friends"></i>
                                        <p><?php echo Setting::$team['A']?></p>
                                    </a>
                                </li>
                                <li class="nav-item ml-2">
                                    <a href="?module=B&uuid=<?php echo Setting::$bcrypt['admin']?>" class="nav-link <?PHP echo $active_B;?>">
                                        <i class="fas fa-user-friends"></i>
                                        <p><?php echo Setting::$team['B']?></p>
                                    </a>
                                </li>
                                <li class="nav-item ml-2">
                                    <a href="?module=C&uuid=<?php echo Setting::$bcrypt['admin']?>" class="nav-link <?PHP echo $active_C;?>">
                                        <i class="fas fa-user-friends"></i>
                                        <p><?php echo Setting::$team['C']?></p>
                                    </a>
                                </li>
                                <li class="nav-item ml-2">
                                    <a href="?module=D&uuid=<?php echo Setting::$bcrypt['admin']?>" class="nav-link <?PHP echo $active_D;?>">
                                        <i class="fas fa-user-friends"></i>
                                        <p><?php echo Setting::$team['D']?></p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="?module=logout" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper <?PHP echo  $backgroundL ?> ">
            <!-- Content Header (Page header) -->
            <div class="content-header p-1">

            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <?PHP include $include_module; ?>
            <!-- Main content -->

        </div>
        <!-- /.content-wrapper -->

        

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

   
</body>

</html>
<?PHP //$text;
exit();?>