<doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Back Office Page</title>
    <link rel="stylesheet" href="css/backoffice.css">
</head>
<body>
<h1>Поданные заявки</h1>
<table>
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
    }
    ?>
</table>
</body>
</html>
