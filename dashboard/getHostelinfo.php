<?php

require_once "../app-config.php";
include_once(ABSPATH."/php/CDBConn.php");
include_once(ABSPATH."/php/hostconfig.php");

$conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123");
$conn->connect();



$hostel_info_query = "SELECT * FROM users WHERE login=";



$conn->close();