<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test onclck</title>
</head>
<body>
<form action="onclick_test.php" method="post">
    <input type="number" name="fnum" value="2">
    <input type="number" name="snum" value="3">
    <input type="submit" name="submit" value="calc">
</form>
<?php
include('proccess.php');
echo "<br>" . $result * 2;

?>


</body>
</html>