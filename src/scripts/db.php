<?php
$host='http://jetpms.com/';
$database='jetms';
$user='jetpms';
$pswd='qwerty123';

$dbh = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
mysql_select_db($database) or die("Не могу подключиться к базе.");