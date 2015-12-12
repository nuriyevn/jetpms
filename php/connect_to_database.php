<?php
$path_to_hostconfig = $_SERVER['DOCUMENT_ROOT'];
$path_to_hostconfig .= "/scripts/php/hostconfig.php";
include_once($path_to_hostconfig);


var_dump ($host);

function connect_to_database()
{

   $dbconn = pg_connect("host=$jet_ip dbname=$db_name user=$db_user password=qwerty123")
   or
   $dbconn = pg_connect("host=localhost dbname=$dbname user=$db_user password=qwerty123")
   or
   die("Could not connect.".pg_last_error());

   return $dbconn;  
}

connect_to_database();


?>
