<?php
   session_start();


if (isset($_SESSION['g_username']))
{
   echo $_SESSION['g_username'];
   http_response_code(200);
   exit();
}

http_response_code(401);
exit();

?>