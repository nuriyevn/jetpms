<html>
<head>
<title>Email sender program on PHP</title>
</head>
<body>

<label>From:</label>
<label for="from_">customer-care@jetpms.com</label>
<br>
<br>
<label>To:</label>
<input type="text" name="to_" value="">
<br>
<br>
<input type="text" name="subject_box" value="Some subject">
<br>
<br>
<textarea rows="4" cols="70">
Put some text here...
</textarea>
<br>

<input type="button" name="sendbutton" value="Send!">
<br>
<br>


<?php
$message = "Line1\rLine2\rLine3";
$message = wordwrap($message, 70, "\r\n");

mail("nuriyevn@gmail.com", "Some subject", $message);

?>

Please check spam if you can't get an email.

</body>
</html>
