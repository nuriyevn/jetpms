<?php
$host='http://jetpms.com/';
$database='jetms';
$user='jetpms';
$pswd='qwerty123';

$dbh = mysql_connect($host, $user, $pswd) or die("�� ���� ����������� � MySQL.");
mysql_select_db($database) or die("�� ���� ������������ � ����.");