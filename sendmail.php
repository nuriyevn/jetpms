<html>
<head>
<title>Email sender program on PHP</title>
</head>
<body>
<form action="./sendmail.php" method="post">
<label>From:</label>
<label for="from_">customer-care@jetpms.com</label>
<br>
<br>
<label>To:</label>
<input type="text" name="to_" value="naum.oleks@gmail.com">
<br>
<br>
<input type="text" name="subject_box" value="Some subject">
<br>
<br>
<textarea rows="4" cols="70" name="message_text" value="Default text">
Put some text here...
</textarea>
<br>

<input type="submit" name="sendbutton" value="Send!">
<br>
<br>

</form>


<?php

if (isset($_POST['sendbutton']))
{
	
	if (isset($_POST['subject_box']))
		$subject = $_POST['subject_box'];

	if (isset($_POST['to_']))
		$to = $_POST['to_'];
	
	if (isset($_POST['message_text']))
		$message = $_POST['message_text'];

	echo "<br/>";
	var_dump($subject);
	echo "<br/>";
	var_dump($to_);
	echo "<br>";
	var_dump($message);
	echo "<br>";
	$message = wordwrap($message, 70, "\r\n");
	$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	
	mail($to, $subject, $message, $headers);
}
?>

Please check spam if you can't get an email.

</body>
</html>
