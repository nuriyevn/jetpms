<!DOCTYPE html>
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
            <td>Телефон</td>
            <td>Email</td>
            <td>Количесвто кроватей</td>
            <td>Активна заявка?</td>
            <td>Деактивировать</td>
        </tr>
        <?php

        function console_log($data)
        {
            echo '<script>';
            echo 'console.log(' . json_encode($data) . ')';
            echo '</script>';
        }

        function inquiry_false($dbconn, $id)
        {
            // UPDATE inquiries SET is_active=FALSE WHERE request_id=2 ;
            $update_query = "UPDATE inquiries SET is_active=FALSE  WHERE request_id=$id";
            $update_result = pg_query($dbconn, $update_query)
            or die('Illegal query:' . pg_last_error());
            console_log($update_query);

            pg_free_result($update_result);
        }


        // Connecting and selecting database
        $dbconn = pg_connect("host=62.75.216.31 dbname=jetpms user=jetuser password=qwerty123")
        or die('Cound not connect. ' . pg_last_error());
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

            var_dump($line["request_id"]);

            echo "<td><input type='button' name=" . $line['request_id'] . " value=" . $line['request_id'] . " onclick=" . inquiry_false($dbconn, 2);
            "></td>";
            echo "</tr>";
        }

        ?>
    </table>

    <h2>Обработанные заявки</h2>
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

        $query = "SELECT request_id, time_and_date, hostel_name, hostel_country, hostel_city, telephone, email, bed_count, is_active FROM inquiries WHERE is_active=FALSE";
        //var_dump(pg_query($query));

        $result = pg_query($dbconn, $query)
        or die('Illegal query:' . pg_last_error());

        // Output of results in HTML

        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            echo "<tr>";
            foreach ($line as $col_value) {
                echo "<td>$col_value</td>";
            }
            echo "<td><input type='button' value='change'></td>";
            echo "</tr>";
        }

        ?>
    </table>
    <?php
    // Cleaning the result
    pg_free_result($result);

    // Close connection
    pg_close($dbconn);
    ?>

    </body>
    </html>
