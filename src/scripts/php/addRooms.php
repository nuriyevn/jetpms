<?php
// TODO php scripts should be configured here
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="../../css/maincss.css">
</head>
<body>
	<h1>Add new rooms </h1>
	<p>Заполните таблицу</p>

	<form method="post" action="calendar.php">
		<table>
			<tr>
				<td># п/п</td>
				<td>Название комнаты</td>
				<td>Количество кроватей</td>
			</tr>

            <?php
				for ($i = 0; $i < $room_count; $i++ )
				{
					echo "<tr>";
					echo "<td>" . ($i + 1) . "</td>";
					echo "<td><input type='text' name='room_name' " .($i+1) . " min='1' max='24' ></td>";
					echo "<td><input type='number' name='bed_count' " . ($i+1) .  " min='1' max='24' ></td>";
					echo "</tr>";
				}
	 		?>
			<tr>
				<td colspan="3">
					<input type="submit" name="submitAddRoms" >
				</td>
			</tr>
		</table>
	</form>
</body>
</html>


