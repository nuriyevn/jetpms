<?php

$script_parent_dir = __DIR__;
echo "<br><br>";
var_dump($script_parent_dir);

$document_root = $_SERVER["DOCUMENT_ROOT"];
echo "<br><br>";
var_dump($document_root);

$http_host = $_SERVER['HTTP_HOST'];
echo "<br><br>";
var_dump($http_host);

$script_parent_dir = str_replace($document_root, $http_host, $script_parent_dir);
echo "<br>";
var_dump($script_parent_dir);

?>