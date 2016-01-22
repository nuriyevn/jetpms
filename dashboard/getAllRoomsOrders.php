<?php

session_start();
if (!isset($_SESSION['g_username']))
{
    http_response_code(401);
    exit();
}

$room_ids = $_POST['room_ids'];

require_once '../app-config.php';
include_once(ABSPATH.'/php/CDBConn.php');
include_once(ABSPATH.'/php/hostconfig.php');

$conn = new CDBConn($jet_ip, $db_name, $db_user, 'qwerty123');
$conn->connect();

// Generating SQL query
$select_rooms_orders = "SELECT * FROM orders WHERE ";
//echo "Select rooms orders query(before)= ".$select_rooms_orders;
$append = "";
//echo "\n".sizeof($room_ids)."\n";
for ($i = 0 ; $i < sizeof($room_ids); $i++)
{


    $current_id = $room_ids[$i];
    if ($i != 0)
    {
        $append = $append." OR room_id=$current_id";
    }
    else
    {
        $append = $append." room_id=$current_id";
    }
}

//echo "\nappend = ".$append."\n";


$select_rooms_orders = $select_rooms_orders.$append;

//echo "Select rooms orders query(after) = ".$select_rooms_orders;


$conn->run_query($select_rooms_orders);

$orders = [];

$i = 0;
while ($order = $conn->fetch_array())
{
    $orders[$i] = $order;
    $i++;
}

echo json_encode($orders);

$conn->close();


