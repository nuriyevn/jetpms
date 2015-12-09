<!DOCTYPE html>

<html>
<head>
<style>
table {
   width: 100%;
   border-collapse: collapse;
}

table, td, th {
   border: 1px solid black;
   padding: 5px;
}

th {
   text-align: left;
}
</style>
</head>
<body>
<?php 
$path_to_hostconfig = $_SERVER["DOCUMENT_ROOT"]."/scripts/php/hostconfig.php";
$path_to_cdbconn = $_SERVER["DOCUMENT_ROOT"]."/scripts/php/CDBConn.php";
include_once($path_to_hostconfig);
include_once($path_to_cdbconn);

$q = intval($_GET['q']);

$con = new CDBConn("63.76.216.31", "my_db", "jetuser", "qwerty123", FALSE);
$con->connect();
$sql = "SELECT * FROM my_db.public.user WHERE id = '".$q."'";
$con->run_select($sql);


$con->close();

?>
</body>
</html>
