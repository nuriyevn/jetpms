<?php
$path_to_hostconfig = $_SERVER["DOCUMENT_ROOT"]."/php/hostconfig.php";
$path_to_cdbconn = $_SERVER["DOCUMENT_ROOT"]."/php/CDBConn.php";

include_once($path_to_hostconfig);
include_once($path_to_cdbconn);

$conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123");
$conn->connect();

$sql = "SELECT * FROM room_types";

$conn->run_query($sql);


$data = array();

/*while ($line = pg_fetch_array($conn->getResult()))
{
  // echo $arr["room_type_id"].$arr["room_type_name"]."<br>";
   $data[$line["room_type_id"]] = $line["room_type_name"];
}

foreach($data as $id => $name)
{
   echo $id.$name."<br>";
}*/


while ($line = pg_fetch_row($conn->getResult()))
{
   $data[] = $line;
}

echo json_encode($data);

$conn->close();

?>
