<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Postgres insert example</title>
	<!--link rel="stylesheet" href="main.css"-->
</head>
<body>
<h1>inserting row to rooms table</h2>
<?php
// Connecting and selecting database

$dbconn = pg_connect("host=localhost dbname=jetpms user=jetuser password=qwerty123")
or die('Could not connect. '.pg_last_error());

//Running SQL Query

$query = "INSERT INTO room (room_name, bed_count) VALUES('magenta', 6)";

$result = pg_query($query)
or die('Illegal query:'.pg_last_error());

echo "Successfully executed";

pg_free_result($result);
pg_close($dbconn);

?>

</body>
</html>
