<?php

if (isset($_GET["email"]))
{
   $email_from_addr = $_GET["email"];
   $token_from_addr = $_GET["token"];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>
Get method usage example
</title>
</head>
<body>
<form action="./getmethod.php" method="POST">

Email:<input type="email" name="email" value="<?php echo $email_from_addr; ?>">
<br>
Password:<input type="password" name="password" value="">
<br>
<input hidden type="text" name="token" value="<?php echo $token_from_addr; ?>">
<input type="submit" name="form_sumbit" value="submitted">
</form>
<?php

if (isset($_POST["form_sumbit"])=="submitted")
{
   echo "submitted<br>";
}
else
{
   echo "unsubmitted<br>";   
}

?>

</body>
</html>
