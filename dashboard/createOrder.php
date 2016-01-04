<?php

session_start();

if (!isset($_SESSION['g_username']))
{
    http_response_code(401);
    exit();
}

$bed_index = $_POST['bed_index'];
$room_id = $_POST['room_id'];
$telephone = $_POST['telephone'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_in = $_POST['date_in'];
$date_out = $_POST['date_out'];

require_once '../app-config.php';
include_once(ABSPATH.'/php/CDBConn.php');
include_once(ABSPATH.'/php/hostconfig.php');

$conn = new CDBConn($jet_ip, $db_name, $db_user, 'qwerty123', TRUE);

$conn->connect();

/*
SELECT date_overlap(date_in, date_out, '2016-01-12', '2016-01-13') FROM orders WHERE bed_index=1 AND room_id=328
 */
// check avalability
$check_availability = "SELECT date_overlap(date_in, date_out, '$date_in', '$date_out') FROM orders WHERE bed_index=$bed_index AND room_id=$room_id";

$conn->run_query($check_availability);
$line = $conn->fetch_array();

if ($line['date_overlap'] == 1)
{
    echo ('dates are not available');
    http_response_code(409);
    exit();
}


$get_guest = "SELECT id FROM guests WHERE first_name='$first_name' AND last_name='$last_name' AND telephone = '$telephone'";

$conn->run_query($get_guest);

$guest_id = 0;

if ($conn->affected_rows() == 0)
{
    $insert_guest = "INSERT INTO guests(first_name, last_name, telephone) VALUES('$first_name','$last_name','$telephone') RETURNING id";
    $conn->run_query($insert_guest);
    $arr = $conn->fetch_array();
    $guest_id = $arr['id'];
    echo "New guest id = ".$guest_id."<br>";
}
else if ($conn->affected_rows() == 1)
{
    $arr = $conn->fetch_array();
    $guest_id = $arr['id'];
    echo 'Old guest id = '.$guest_id."<br>";
}
else
{
    echo "Please, contact support";
    http_response_code(409);
    exit();
}



$state_id = 1;
$insert_order = "INSERT INTO orders(guest_id, date_in, date_out, state_id, room_id, bed_index)
VALUES($guest_id, '$date_in', '$date_out', $state_id, $room_id, $bed_index)";

$conn->run_insert($insert_order);

if ($conn->affected_rows() != 1)
{
    http_response_code(409);
    exit();

}
else if ($conn->affected_rows() == 1)
{
    http_response_code(200);
}

$conn->close();