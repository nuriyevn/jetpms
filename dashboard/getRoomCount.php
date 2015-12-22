<?php
session_start();

if (!isset($_SESSION['g_username']))
{
    http_response_code(401);
    exit();
}

$hostel_id = $_POST['hostel_id'];

require_once "../app-config.php";
include_once(ABSPATH."/php/CDBConn.php");
include_once(ABSPATH."/php/hostconfig.php");

$conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123");
$conn->connect();

$room_count_query = "SELECT room_count FROM hostels WHERE id = $hostel_id";

$conn->run_query($room_count_query);
$row = $conn->fetch_array();

if ($conn->affected_rows() == 1)
{
    echo $row['room_count'];
    http_response_code(200);
    exit();
}
else
{
    http_response_code(401);
    exit();
}