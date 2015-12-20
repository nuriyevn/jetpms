<?php
session_start();

// If already signed in (when we came from, for example, actavateAccount)
if (isset($_SESSION['g_username']))
{
   http_response_code(302);
   exit();
}

// else

$script_parent_dir = __DIR__;
$document_root = $_SERVER["DOCUMENT_ROOT"];
$http_host = $_SERVER["HTTP_HOST"];
$script_parent_dir = str_replace($document_root, $http_host, $script_parent_dir);

$path_to_cdbconn = $_SERVER["DOCUMENT_ROOT"]."/php/CDBConn.php";
$path_to_hostconfig = $_SERVER["DOCUMENT_ROOT"]."/php/hostconfig.php";
include_once($path_to_cdbconn);
include_once($path_to_hostconfig);

$login = json_decode($_POST['login']);
$password = json_decode($_POST['password']);

//printf("Login: %s; password: %s", $login, $password);

$conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123", TRUE);

$conn->connect();

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
   http_response_code(200); 
   //header("location:dashboard.php");
   exit();
}

$conn->close();
?>
