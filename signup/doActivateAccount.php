<?php
session_start();

   require_once "../app-config.php";
   include_once(ABSPATH."/php/hostconfig.php");
   include_once(ABSPATH."/php/CDBConn.php");

   $input_email = $_POST['email'];
   $input_reg_token = $_POST['reg_token'];
   $input_password1 = $_POST['password1'];
   $input_password2 = $_POST['password2'];

   //printf("input_email=%s<br>input_reg_token=%s<br>input_password1=%s<br>input_password2=%s<br>", $input_email, $input_reg_token, $input_password1, $input_password2);

   $conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123", FALSE);

   $conn->connect();

   $query = "SELECT reg_token, is_activated FROM users WHERE login='$input_email'";

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
         //var_dump($arr['reg_token']);
         //var_dump($_POST['reg_token']);
         if ($arr["reg_token"] == $input_reg_token)
         {
            $adduser_query = "UPDATE users SET is_activated = TRUE, password='$input_password1' WHERE login='$input_email'";
            if ($arr["is_activated"] === 't')
            {
               echo "Your email has been activated. You may log in to your account";
               http_response_code(422);
               exit();
            }
            
            if ($conn->run_insert($adduser_query) != 0)
            {
               $_SESSION['g_username'] = $input_email;
               $_SESSION['g_hostel_id'] = NULL;
               echo "Congratulation, registration completed!";
               http_response_code(200);
               exit();
            }
            else
            {
               echo "Error: Can't add user to users table.";
               http_response_code(422);
            }
         } 
         else
         {
            echo "Wrong registration token. Please, be sure, that you have copied activation link correctly or contact support or try to make new registration inquiry for another email.<br>";
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
