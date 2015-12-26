<?php

session_start();
if (isset($_SESSION['g_username']))
{
    echo "Session is on";

}
else
    echo "Session is off";
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/23/15
 * Time: 1:32 AM
 */