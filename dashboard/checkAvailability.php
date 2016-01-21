<?php

session_start();

if (!isset($_SESSION['g_username']))
{
    http_response_code(401);
    exit();
}

$date_in = $_POST['date_in'];
$date_out = $_POST['date_out'];
$bed_index = $_POST['bed_index'];
$room_id = $_POST['room_id'];

require_once '../app-config.php';
include_once(ABSPATH.'/php/CDBConn.php');
include_once(ABSPATH.'/php/hostconfig.php');

$conn = new CDBConn($jet_ip, $db_name, $db_user, 'qwerty123', FALSE);
$conn->connect();


// Finding whether it overlaps with some of existing orders

$check_availability = "SELECT  guest_id, date_in, date_out, date_overlap(date_in, date_out, '$date_in', '$date_out') FROM orders WHERE bed_index=$bed_index AND room_id=$room_id";
$conn->run_query($check_availability);


$order_info = [];

while ($line = $conn->fetch_array())
{
    if ($line['date_overlap'] == 1) {
        // avail = 0; does mean there exists at least on order
        // which conflicts with the current order.
        $order_info[0]->avail = 0;
        $order_info[0]->date_in = $line['date_in'];
        $order_info[0]->date_out = $line['date_out'];

          $guest_id = $line['guest_id'];

          $guest_query = "SELECT * FROM guests WHERE id = '$guest_id'";
          $conn->run_query($guest_query);
          if ($conn->affected_rows() == 1)
          {
              $guest_row = $conn->fetch_array();
              $order_info[0]->first_name = $guest_row['first_name'];
              $order_info[0]->last_name = $guest_row['last_name'];
              $order_info[0]->telephone = $guest_row['telephone'];

          }
          else
          {
              $order_info[0]->first_name = 'Name';
              $order_info[0]->last_name = 'Surname';
              $order_info[0]->telephone = '';
          }


        echo json_encode($order_info); // Not available
        http_response_code(200);
        exit();
    }
}


// if it passes the while cause
// That's a good sign of availability of the current order
// for selected dates

$order_info[0]->avail = 1;
echo json_encode($order_info); // Available
http_response_code(200);
exit();





$conn->close();
