<?php
require_once '../app-config.php';
include_once( ABSPATH."/php/CDBConn.php");
include_once(ABSPATH."/php/hostconfig.php");
$conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123", FALSE);

$conn->connect_no_localhost();
$conn->printinfo();
$conn->close();

/**
 * Created by PhpStorm.
 * User: Elisha
 * Date: 26.12.2015
 * Time: 20:01
 */