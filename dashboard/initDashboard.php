<?php
    require_once '../app-config.php';


    //ini_set('display_error', 1);
function initDashboard()
{
    // If you didn't come from login.php (200), or accountActivate (302), then please login
    if (!isset($_SESSION['g_username'])) {
       //header("Location: /login.php");
        http_response_code(401);
        exit();
    }


   // $path_to_cdbconn = $_SERVER['DOCUMENT_ROOT'] . "/php/CDBConn.php";
   //  $path_to_hostconfig = $_SERVER['DOCUMENT_ROOT'] . "/php/hostconfig.php";
    $path_to_cdbconn = ABSPATH."/php/CDBConn.php";
    $path_to_hostconfig = ABSPATH."/php/hostconfig.php";
    include_once($path_to_cdbconn);
    include_once($path_to_hostconfig);

    $conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123", FALSE);

    $conn->connect();
    $cur_login = $_SESSION['g_username'];
    $get_hostel_id_sql = "SELECT hostel_id FROM users WHERE login = '$cur_login'";

    $conn->run_query($get_hostel_id_sql);
    $line = $conn->fetch_array();


    // We almost now from which hostel is user
    $hostel_id = $line['hostel_id'];

    // in case if hostel id is not set, it's an indicator that hostel  definetely has not been configured yet.
    if ($hostel_id === NULL) {
        header("Location: /configure.php");
        exit();
    }


    $get_is_configured_sql = "SELECT is_configured FROM hostels WHERE id = $hostel_id";
    $conn->run_query($get_is_configured_sql);
    $line = $conn->fetch_array();
    $is_configured = $line['is_configured'];

    // This is the case when user almost configured not
    if ($is_configured === 'f') {
        header("Location: /configure.php");
       // exit();
    }

    $conn->close();
}
initDashboard();

?>