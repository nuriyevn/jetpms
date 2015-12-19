<?php
   $path_to_cdbconn = $_SERVER["DOCUMENT_ROOT"]."/php/CDBConn.php";
   include_once($path_to_cdbconn);
   
   $hostel_info = json_decode($_POST["hostel_info"]);
   $rooms = json_decode($_POST["rooms"]);

   $conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123");
   $conn->connect();
   
   $insert_query = "INSERT INTO hostels (name, room_count) VALUES('$hostel_info->hostel_name', $hostel_info->room_count) RETURNING id";
   
   $conn->run_query($insert_query);

   echo $conn->affected_rows()." rows inserted."; 
   
   $new_hostel_id = 0;
   while ($line = $conn->fetch_array())
   {
      echo "id = ".$line[0];  
      $new_hostel_id = $line[0];
   }

   
   for ($i = 0; $i < count($rooms); $i++)
   {
      $cur_room_name = $rooms[$i]->name;
      $cur_room_capacity = $rooms[$i]->capacity;
      $cur_room_type = $rooms[$i]->type;
      $cur_room_rate = $rooms[$i]->rate;

      $sql_room_add = "INSERT INTO rooms (name, bed_count, type_id, rate, hostel_id) VALUES('$cur_room_name', $cur_room_capacity,   $cur_room_type, $cur_room_rate, $new_hostel_id)";
      
      $conn->run_insert($sql_room_add);
      
   } 
    
   $conn->close();

?>
