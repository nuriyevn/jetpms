<?php
session_start();
if (isset($_SESSION['g_hostel_id']));
{
    echo $_SESSION['g_hostel_id'];
    http_response_code(200);
    exit();
}


http_response_code(401);
exit();

?>