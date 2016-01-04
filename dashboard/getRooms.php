<?php
session_start();
if (!isset($_SESSION['g_username']))
{
    http_response_code(401);
    exit();
}


require_once '../app-config.php';
include_once(ABSPATH."/php/CDBConn.php");
include_once(ABSPATH."/php/hostconfig.php");


//$hostel_id = $_POST['hostel_id'];
$hostel_id = $_SESSION['g_hostel_id'];

$conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123");
$conn->connect();

$sql = "SELECT name, bed_count,id FROM rooms WHERE hostel_id =$hostel_id ORDER BY id DESC";
$rooms = array();

$result = $conn->run_query($sql);

if (!$result)
{
    http_response_code(404);
    exit();
}
else
{
    $i = 0;
    while ($room = $conn->fetch_array())
    {
        $rooms[$i]->name = $room['name'];
        $rooms[$i]->bed_count = $room['bed_count'];
        $rooms[$i]->id = $room['id'];
        $i++;
    }
    echo json_encode($rooms);
}


$conn->close();