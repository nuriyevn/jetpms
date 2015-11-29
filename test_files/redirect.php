<?php
$email_str = "empty";

if (isset($_POST['submit']))
{
	$email_str = $_POST['email'];
	if ($email_str != '')
	{
		echo $email_str;
	//	header("Location: http://jetpms.com/redirect_form.php");
	}
}
?>
