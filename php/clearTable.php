<?php

$confirm = $_GET['confirm'];
$table = $_GET['table'];

if ($table == "")
{
   echo "Please, specify table name<br>";
   exit(1);
}

if ($confirm == 1)
{
   $path_to_cdbconn = $_SERVER["DOCUMENT_ROOT"]."/php/CDBConn.php";
   $path_to_hostconfig = $_SERVER["DOCUMENT_ROOT"]."/php/hostconfig.php";

   include_once($path_to_cdbconn);
   include_once($path_to_hostconfig);


   $conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123", TRUE);

   $conn->connect();
   $sql = 'DELETE FROM "public".'.$table.' WHERE true';
   $conn->run_query($sql);
   echo $conn->affected_rows()." rows deleted.<br>";

   $conn->close();
}
else
{
   echo "you must add confirm=1 param to delete";
}


?>
