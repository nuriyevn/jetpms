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

echo "<br>--------------<br>";
echo "CDBConn::connect()<br>";
$conn->connect();
$conn->printinfo();
$sql = "SELECT * FROM rooms";
echo "<div style=\"background-color:#00FF00\">".$conn->run_select($sql)."</div>";
$conn->close();
