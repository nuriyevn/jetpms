<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Back Office Page</title>
    <link rel="stylesheet" href="css/backoffice.css">
</head>
<body>
<h1>Поданные заявки</h1>

<form action="index.php" name="form" value="FALSE" method="post">
    <table>
        <tr>
            <td># заявки</td>
            <td>Дата и время</td>
            <td>Название хостела</td>
            <td>Страна</td>
            <td>Город</td>
            <td>Телефон</td>
            <td>Email</td>
            <td>Количесвто кроватей</td>
            <td>Активна заявка?</td>
            <td>Деактивировать</td>
        </tr>
        <?php
        $path_to_hostconfig = $_SERVER['DOCUMENT_ROOT'];
        $path_to_hostconfig .= "/scripts/php/hostconfig.php";
        include_once($path_to_hostconfig);

        function console_log($data)
        {
            echo '<script>';
            echo 'console.log(' . json_encode($data) . ')';
            echo '</script>';
        }

        // Connecting and selecting database
        $dbconn = pg_connect("host=localhost dbname=jetpms user=jetuser password=qwerty123")
        or
        $dbconn = pg_connect("host=$jet_ip dbname=jetpms user=jetuser password=qwerty123")
        or
        die('Cound not connect. ' . pg_last_error());
        // Running SQL Query

        $query = "SELECT request_id, time_and_date, hostel_name, hostel_country, hostel_city, telephone, email, bed_count, is_active FROM inquiries WHERE is_active=TRUE";

        $result = pg_query($dbconn, $query)
        or die('Illegal query:' . pg_last_error());

        // Output of results in HTML

        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            echo "<tr>";
			
            foreach ($line as $col_value) {
                echo "<td>$col_value</td>";
            }

            echo "<td><input type='submit' name='submit' value=" . $line['request_id'] . " ></td>";
            echo "</tr>";
        }
		pg_free_result($result);
		pg_close($dbconn);

        ?>
    </table>
    <?php

    $path_to_update = $_SERVER['DOCUMENT_ROOT'];
    $path_to_update .= "/backoffice/update_inquiries.php";
    include_once($path_to_update);
	var_dump($request_id);
	var_dump($update_query);
	var_dump($update_result);
    ?>
</form>

<h2>Обработанные заявки</h2>
<form action="index.php" name="form" value="TRUE" method="post">
<table>
    <tr>
        <td># заявки</td>`
        <td>Дата и время</td>
        <td>Название хостела</td>
        <td>Страна</td>
        <td>Город</td>
        <td>Телефон</td>
        <td>Email</td>
        <td>Количесвто кроватей</td>
        <td>Активна заявка?</td>
        <td>Деактивировать</td>
    </tr>
    <?php

	$dbconn = pg_connect("host=localhost dbname=jetpms user=jetuser password=qwerty123")
    or
    $dbconn = pg_connect("host=$jet_ip dbname=jetpms user=jetuser password=qwerty123")
    or
    die('Cound not connect. ' . pg_last_error());
	

    $query = "SELECT request_id, time_and_date, hostel_name, hostel_country, hostel_city, telephone, email, bed_count, is_active FROM inquiries WHERE is_active=FALSE";
    var_dump($query);

    $result = pg_query($dbconn, $query)
    or die('Illegal query of selecting inactive:' . pg_last_error());

    // Output of results in HTML

    while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
        echo "<tr>";
        foreach ($line as $col_value) {
            echo "<td>$col_value</td>";
        }
        echo "<td><input type='button' name='submit' value=".$line['request_id']."></td>";
        echo "</tr>";
    }

    ?>
</table>
</form>
<?php
// Cleaning the result
pg_free_result($result);

// Close connection
pg_close($dbconn);
?>

</body>
</html>
