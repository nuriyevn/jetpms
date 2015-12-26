<?php

require_once './app-config.php';
include_once( ABSPATH."/php/CDBConn.php");
include_once(ABSPATH."/php/hostconfig.php");
$conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123", TRUE);

echo "CDBConn::connect_no_locathost();<br>";
$conn->connect_no_localhost();
$conn->printinfo();
$sql = "SELECT * FROM hostels";
echo "<div style=\"background-color:#00FF00\">".$conn->run_select($sql)."</div>";


$conn->close();

$conn2 = new CDBConn("127.0.0.1", $db_name, $db_user, "qwerty123", TRUE);

echo "<br>--------------<br>";
echo "CDBConn::connect()<br>";
$conn2->connect_no_localhost();
$conn2->printinfo();
$sql = "SELECT * FROM rooms";
echo "<div style=\"background-color:#00FF00\">".$conn2->run_select($sql)."</div>";
$conn2->close();
