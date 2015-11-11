<?php
header('Content-Type: text/html; charset=utf-8');

include ('config.php');

echo "Database name = $database<br>";
echo "Hostname = $host<br>";
echo "Username = $user<br>";
echo "password = $pswd<br/>";

$datebase = mysql_connect($host, $user, $pswd);

if (!$database)
{
	echo "Can't connect";
	exit();
}

$sql='CREATE DATABASE dummy;';
if (!mysql_query($sql))
{
	echo 'Cant create database';
exit();
}
if (!mysql_select_db($db_name, $db))
{
	echo ('База данных'.$database.' недоступна');
	exit();
}

echo('Подключение к базе '.$database.'выполнено.');
?>
