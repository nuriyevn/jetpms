<?php
session_start();

if (!isset($_SESSION['g_hostel_id']))
{
    http_response_code(401);
    exit();
}

$g_hostel_id = $_SESSION['g_hostel_id'];

require_once '../app-config.php';
include_once(ABSPATH.'/php/CDBConn.php');
include_once(ABSPATH.'/php/hostconfig.php');

$conn = new CDBConn($jet_ip, $db_name, $db_user, 'qwerty123');

$conn->connect();

$sql = "SELECT name FROM hostels WHERE id = '$g_hostel_id'";

$conn->run_query($sql);

if ($conn->affected_rows() == 1)
{
    $arr = $conn->fetch_array();
    $hostel_name = $arr['name'];


    $hostel_info = [];
    $hostel_info[0]->id = $g_hostel_id;
    $hostel_info[0]->name = $hostel_name;

    echo json_encode($hostel_info);
    http_response_code(200);
}
else
{
    echo "Please Contact support";
    http_response_code(401);
}

$conn->close();

exit();