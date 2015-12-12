<?php
if (isset($_POST["csubmit"]))
{
	$_hostel = $_POST["hostel_name"];
	var_dump($_hostel);
	if ($_POST["csubmit"] == 'Do register')
	{
		var_dump($_POST["email"]);
	}
}

?>
<html>
<head>
<title>
The form which contains two submits. 
</title>

</head>
<body>

<form action="" method="post">
<table>
	<input type="text" name="hostel_name" value="The name of hostel">
	<input type="submit" name="csubmit" value="calc">
</table>
<?php
if ($_POST["csubmit"] == 'calc')
{
?>
<table>
	<tr>
	<input type="email" name="email">
	</tr>
	<tr>
	<input type="submit" name="csubmit" value="Do register">
	</tr>
</table>
<?php
}
?>
</form>

</body>
</html>


