<?php

session_start();
if (!isset($_SESSION['g_username']))
{
    http_response_code(401);
    exit();
}

$room_id =  $_POST['room_id'];

require_once '../app-config.php';
include_once(ABSPATH.'/php/CDBConn.php');
include_once(ABSPATH.'/php/hostconfig.php');

$conn = new CDBConn($jet_ip, $db_name, $db_user, 'qwerty123');
$conn->connect();

$select_orders = "SELECT * FROM orders WHERE room_id = $room_id";

$conn->run_query($select_orders);

$orders = [];
$i = 0;
while ($order = $conn->fetch_array())
{
    $orders[$i] = $order;
    $i++;
}

echo json_encode($orders);

$conn->close();
