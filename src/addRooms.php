<?php
$hostel_name = $_POST['hostel_name'];
$room_count = $_POST['room_count'];
	
?>

<!DOCTYPE html5>
<html>
<head>
</head>
<body>
	<h1>Add new rooms </h1>
	<p>Заполните таблицу</p>
	
	<form>
		<table>
			<tr>
				<td>#</td>
				<td>Имя</td>
				<td>Вместимость</td>
			</tr>

			<?php 
				for ($i = 0; $i < $room_count; $i++ )
				{
					echo "<tr>";
					echo "<td>".$i+1."</td>";
					echo "<td><input type=\"text\" name=\"room_name\"".i+1."></td>";
					echo "<td><input type=\"number\" name=\"bed_count\"".i+1."></td>";
					echo "</tr>"
				}
	 		?>
		</table>
	</form>


</body>
</html>