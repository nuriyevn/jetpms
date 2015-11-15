<!DOCTYPE html>
<html>
<head>
	<title>Redirect Form To a Particular Page On Submit - Demo Preview</title>
	<meta content="noindex, nofollow" name="robots">
</head>
<body>

	<h2>Redirect Form to a Particular Page</h2>

	<form action="redirect_form.php" id="#form" method="post" name="#form">
		<input id='btn' name="submit" type='submit' value='Submit'>
		<input id="email" name="email" type='text' value="myemail">
		<?php
		include "redirect.php";
		
		
		//echo "$email_str";
		?>
	</form>

</body>
</html>
