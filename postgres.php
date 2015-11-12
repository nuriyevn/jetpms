<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Postgresql select example Page</title>
    <!--link rel="stylesheet" href="main.css"-->
</head>
<body>
<h1>Content of room table</h1>

<?php



	// Connecting and selecting database
	$dbconn = pg_connect("host=localhost dbname=jetpms user=jetuser password=qwerty123")
	or die('Cound not connect. '.pg_last_error());
	// Running SQL Query
	$query = 'SELECT * FROM room';
	$result = pg_query($query) 
	or die('Illegal query:' . pg_last_error());
	
	// Output of results in HTML
	
	echo "<table>\n";
	/*echo "<tr>\n";
	echo "<th>"
	</th>
	echo "</tr>\n";*/
	while ($line = pg_fetch_array($result, null, PGSQL_ASSOC))
	{
		echo "\t<tr>\n";
		foreach($line as $col_value)
		{
			echo "\t\t<td>$col_value</td>\n";
		}
		echo "\t</tr>\n";
		
	}
	echo "</table>\n";
	// Cleaning the result
	pg_free_result($result);
	
	// Close connection
	pg_close($dbconn);

?>

<!--table>
    <tr>
        <td># заявки</td>
        <td>Дата и время</td>
        <td>Название хостела</td>
        <td>Страна</td>
        <td>Город</td>
        <td>Email</td>
        <td>Телефон</td>
    </tr>
    <?php
/*
    $countsignups = 1; //здесь надо доставать количество заявок из базы
    for ($i = 0; $i < $countsignups; $i++) 
	{
        echo "<tr>";
        echo "<td>";
        echo "порядковый номер";
        echo "</td>";
        echo "<td>";
        echo "дата и время";
        echo "</td>";
        echo "<td>";
        echo "название";
        echo "</td>";
        echo "<td>";
        echo "страна";
        echo "</td>";
        echo "<td>";
        echo "город";
        echo "</td>";
        echo "<td>";
        echo "Email";
        echo "</td>";
        echo "<td>";
        echo "телефон";
        echo "</td>";
        echo "</tr>";
    }*/
    ?>
</table-->
</body>
</html>
