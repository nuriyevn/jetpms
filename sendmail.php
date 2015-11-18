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
<input type="text" name="to_" value="mamahostel.od@gmail.com">
<br>
<br>
<input type="text" name="subject_box" value="Some subject">
<br>
<br>
<textarea rows="4" cols="70">
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

	$subject = $_POST['subject_box'];
	$to = $_POST['to_'];

	var_dump($subject);

	$message = "Line1\rLine2\rLine3";
	$message = wordwrap($message, 70, "\r\n");

	mail($to, $subject, $message);
}
?>

Please check spam if you can't get an email.

</body>
</html>
