<?php
session_start();

// If already signed in (when we came from, for example, actavateAccount)
if (isset($_SESSION['g_username']))
{
   echo "Session is on<br>";
   http_response_code(302);
   exit();
}

require_once "../app-config.php";
include_once(ABSPATH."/php/CDBConn.php");
include_once(ABSPATH."/php/hostconfig.php");

$login = json_decode($_POST['login']);
$password = json_decode($_POST['password']);

$conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123");

if (!$conn->connect())
{
   http_response_code(503);
   exit();
}

$check_user_sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";

echo $conn->run_select($check_user_sql);

if ($conn->affected_rows() != 1)
{
   echo "user with login:'".$login."'; and password:'".$password."' doesnot exists"."<br>";
   http_response_code(401);
   exit();
}
else
{
   $_SESSION['g_username'] = $login;

   $get_hostel_id_sql ="SELECT hostel_id FROM users WHERE login='$login'";
   $conn->run_query($get_hostel_id_sql);
   $row = $conn->fetch_array();
   $hostel_id = $row['hostel_id'];
   // Even in case if hostel_id is null,
   // doConfigure.php script will create it
   $_SESSION['g_hostel_id'] = $hostel_id;
   http_response_code(200);
   exit();
}

$conn->close();
?>
