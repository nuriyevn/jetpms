<?php
   $path_to_cdbconn = $_SERVER["DOCUMENT_ROOT"]."/php/CDBConn.php";
   include_once($path_to_cdbconn);
   
   $hostel_name = $_POST["hostel_name"];
   $room_count = $_POST["room_count"];
   //$hostel_name = "My hostel";
   //$room_count = 2;

   $conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123");
   $conn->connect();
   
   $insert_query = "INSERT INTO hostels (name, room_count) VALUES('$hostel_name', $room_count)";
   
   $conn->run_select($insert_query);
   echo $conn->affected_rows()." rows inserted."; 
   
   $conn->close();

?>
