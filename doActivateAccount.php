<?php
session_start();

$path_to_hostconfig = $_SERVER['DOCUMENT_ROOT']."/php/hostconfig.php";
$path_to_cdbconn = $_SERVER['DOCUMENT_ROOT']."/php/CDBConn.php";

include_once($path_to_hostconfig);
include_once($path_to_cdbconn);

$input_email = $_POST['email'];
$input_token = $_POST['token'];
$input_password1 = $_POST['password1'];
$input_password2 = $_POST['password2'];

//printf("input_email=%s<br>input_token=%s<br>input_password1=%s<br>input_password2=%s<br>", $input_email, $input_token, $input_password1, $input_password2);

$conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123", FALSE);

$conn->connect();

$query = "SELECT token, is_active FROM inquiries WHERE email='$input_email'";

if ($conn->run_query($query))
{

   switch ($conn->affected_rows())
   {
      case 0:
         echo "This email has no associated registration inquiry. Link is invalid. Please, review whether you fully copied the activation link. If you don't know what's happened, just try signup again.<br>";
         http_response_code(422);
         break;
      case 1:
         $arr = $conn->fetch_array();
         if ($arr["token"] == $input_token)
         {
            $activate_query = "UPDATE inquiries SET is_active=TRUE WHERE email='$input_email'";
            $adduser_query = "INSERT INTO users(login, password) VALUES('$input_email', '$input_password1')";
            if ($arr["is_active"] === 't')
            {
               echo "Your email has been activated. You may log in to your account";
               http_response_code(422);
               exit();
            }
            
            if ($conn->run_insert($adduser_query) != 0)
            {
               if ($conn->run_insert($activate_query) != 0)
               {
                  $_SESSION['g_username'] = $input_email;
                  $_SESSION['g_hostel_id'] = NULL;
                  echo "Congratulation, registration completed!";
                  http_response_code(200);
                  exit();
               }
               http_response_code(422);
            }
            else
            {
               echo "Error: Can't add user to users table.";
               http_response_code(422);
            }
         } 
         else
         {
            echo "Wrong token. Please, be sure, that you have copied activation link correctly or contact support or try to make new registration inquiry for another email.<br>";
            http_response_code(422);
            
         }
         break;
      default:
         echo "Too much registration attempts. Please, contact support or try to make new registration inquiry for another email.<br>";
         break;
   }
} 
else
{
   echo "Database error, while trying to find email request<br>";
   http_response_code(422);
}
http_response_code(422);
$conn->close();


?>
