<?php
header('Content-type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<link rel="stylesheet" href="./css/maincss.css">
</head>
<body>
	<h1>New hostel sign Up </h1>
	<form method="post" action="./addRooms.php">
		<table>
			<tr>
				<td>Введите имя хостела:</td>
				<td><input type="text" name="hostel_name" ></td>
			</tr>
			<tr>
				<td>Ведите количество номеров:</td>
				<td><input type="number" name="room_count" min="1" max="10" ></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" ></td>
			</tr>
		</table>
	</form>
</body>
</html>