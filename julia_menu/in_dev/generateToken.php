<?php

$token = bin2hex(openssl_random_pseudo_bytes(16));

var_dump($token);


?>
