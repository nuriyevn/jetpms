<?php

function sum($par1, $par2)
{

    $r = $par1 + $par2;
    return $r;
}

if (isset ($_POST['submit'])) {
    $fnum = $_POST['fnum'];
    $snum = $_POST['snum'];

    $result = sum($fnum, $snum);

    if ($result != null) {
        //header("Location: http://jetpms/onclick_test.php");
    }


}


?>