<?php

$a = 1;
$b = 2;

function Sum()
{
   global $a, $b;
   $b = $a + $b;
}

Sum();

echo $b."<br>";



$c = 3;
$d = 4;

function Mult()
{
   $d = $c * $d;
   echo "Local d: ".$d."<br>";
}

Mult();
echo $d."<br>";

function Subtraction()
{
   $GLOBALS['d'] = $GLOBALS['c'] - $GLOBALS['d'];
}

Subtraction();
echo $d."<br>";


function test_global()
{
   global $HTTP_POST_VARS;
   
   echo $HTTP_POST_VARS['name'];
   echo $_POST['name'];

}

?>


