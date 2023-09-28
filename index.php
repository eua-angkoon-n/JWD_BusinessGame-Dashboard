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
$Time = new Processing;
$start = $Time->Start_Time();

isset($_REQUEST['module']) ? $module = $_REQUEST['module'] : $module = '';

switch ($module) {
    case "A" :
        $include_module = __DIR__ . "/module/team.inc.php";
        $TEAM = "A";
        $module == "A" ? $active_A = "active" : $active_A = ""; #ไฮไลท์เมนูด้านซ้าย
        $title_site = Setting::$title_site[$module];
        $title_act = Setting::$title_act[$module];
        $breadcrumb_txt = Setting::$breadcrumb_txt[$module];
        break;
    case "B" :
        $include_module = __DIR__ . "/module/team.inc.php";
        $TEAM = "B";
        $module == "B" ? $active_B = "active" : $active_B = ""; 
        $title_site = Setting::$title_site[$module];
        $title_act = Setting::$title_act[$module];
        $breadcrumb_txt = Setting::$breadcrumb_txt[$module];
        break;
    case "C" :
        $include_module = __DIR__ . "/module/team.inc.php";
        $TEAM = "C";
        $module == "C" ? $active_C = "active" : $active_C = ""; 
        $title_site = Setting::$title_site[$module];
        $title_act = Setting::$title_act[$module];
        $breadcrumb_txt = Setting::$breadcrumb_txt[$module];
        break;
    case "D" :
        $include_module = __DIR__ . "/module/team.inc.php";
        $TEAM = "D";
        $module == "D" ? $active_D = "active" : $active_D = "";
        $title_site = Setting::$title_site[$module];
        $title_act = Setting::$title_act[$module];
        $breadcrumb_txt = Setting::$breadcrumb_txt[$module];
        break;
    default:
        $include_module = __DIR__ . "/module/dashboard.inc.php";
        $txt = "Dashboard";
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
            <a href="./" class="brand-link">
                <img src="dist/img/SCGJWDLogo.png" alt="JWD Logo" class="w-100 p-0 m-0">
                <!--<img src="dist/img/logo_2.png" alt="JWD Logo" class="brand-image brand-text" >-->
                <span class="font-weight-bold p-1 mt-2 text-pcs-ct" style="background-color:#f15c22;color:white">
            </a>

            <!-- Sidebar -->
            <div class="sidebar "><br><br>
                <!-- Sidebar user panel (optional) -->
                <!-- <div class="user-panel mt-3 pb-1 mb-3 d-flex"> -->
                    <!-- <div class="image">
                        <img src="dist/img/user2-160x160.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            <?PHP echo "ยังไม่เสร็จ _SESSION['sess_fullname']"; ?></a>
                        <span class="text-white">ระดับ:
                            <?PHP echo "ยังไม่เสร็จ classArr[_SESSION['sess_class_user']];" ?> /
                            <?PHP echo "ยังไม่เสร็จ _SESSION['sess_dept_initialname'];" ?></span>
                        <a href="?module=profile" class="d-block text-yellow">[แก้ไขข้อมูลส่วนตัว]</a>
                    </div> -->
                <!-- </div> -->

                <!-- Sidebar Menu active-->
                <nav class="mt-4">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="./" class="nav-link <?PHP echo $active_Dashboard; ?>">
                                <i class="nav-icon fa fa-solid fa-chalkboard"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="./" class="nav-link <?PHP echo $active_Score; ?>">
                                <i class="nav-icon fa far fa-star"></i>
                                <p>Score</p>
                            </a>
                        </li> -->
                        <li class="nav-item menu-open">
                            <!--ถ้าจะให้เปิดใส่คลาส menu-open-->
                            <a href="#" class="nav-link"><i class="nav-icon fas fa-users"></i>
                                <p>Team<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ml-2">
                                    <a href="?module=A" class="nav-link <?PHP echo $active_A;?>">
                                        <i class="fas fa-user-friends"></i>
                                        <p><?php echo Setting::$team['A']?></p>
                                    </a>
                                </li>
                                <li class="nav-item ml-2">
                                    <a href="?module=B" class="nav-link <?PHP echo $active_B;?>">
                                        <i class="fas fa-user-friends"></i>
                                        <p><?php echo Setting::$team['B']?></p>
                                    </a>
                                </li>
                                <li class="nav-item ml-2">
                                    <a href="?module=C" class="nav-link <?PHP echo $active_C;?>">
                                        <i class="fas fa-user-friends"></i>
                                        <p><?php echo Setting::$team['C']?></p>
                                    </a>
                                </li>
                                <li class="nav-item ml-2">
                                    <a href="?module=D" class="nav-link <?PHP echo $active_D;?>">
                                        <i class="fas fa-user-friends"></i>
                                        <p><?php echo Setting::$team['D']?></p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <!-- <li class="nav-item">
                            <a href="?module=MachineDetails" class="nav-link <?PHP echo $active_C;?>">
                                <i class="nav-icon fas fa-tools"></i> 
                                <p>Machine Details</p>
                            </a>
                        </li> -->

                        <!-- <li class="nav-item"><a href="?module=logout" class="nav-link"><i
                                    class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a></li> -->
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header p-1">

            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <?PHP include $include_module; ?>
            <!-- Main content -->

        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer no-print">
            <strong>Copyright &copy; 2022 <a href="#">jwdcoldchain.com</a>.</strong> All rights reserved.
            <?PHP
            $end = $Time->End_Time();
            $total = $Time->Total_Time($start, $end);
            $Time->show_msg($total);
            echo print_mem();
            ?>
            <div class="float-right d-none d-sm-inline-block">
                <!-- <b>Phase 1 / Version</b> 1.0 -->
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <a href="#" class="scrollup"><i class="fas fa-angle-double-up"></i> เลื่อนขึ้น</a>
</body>

</html>
<?PHP //$text;
exit();?>