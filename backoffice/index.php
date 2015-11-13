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
            <td>Телефон</td>
            <td>Email</td>
            <td>Количесвто кроватей</td>
            <td>Активна заявка?</td>
            <td>Деактивировать</td>
        </tr>
        <?php

        // Connecting and selecting database
        $dbconn = pg_connect("host=62.75.216.31 dbname=jetpms user=jetuser password=qwerty123")
        or die('Cound not connect. ' . pg_last_error());
        // Running SQL Query

        $query = "SELECT * FROM inquiries";
        //var_dump(pg_query($query));

        $result = pg_query($dbconn, $query)
        or die('Illegal query:' . pg_last_error());

        // Output of results in HTML


        while ($row = pg_fetch_row($result)) {
            $request_id = $row[7];
            $timestamp = $row[0];
            $hostel_name = $row[1];
            $hostel_country = $row[2];
            $hostel_city = $row[3];
            $telephone = $row[4];
            $email = $row[5];
            $is_active = $row[6];
            $bed_count = $row[8];

            echo "<tr>";
            echo "<td>";
            echo $request_id;
            echo "</td>";
            echo "<td>";
            echo $timestamp;
            echo "</td>";
            echo "<td>";
            echo $hostel_name;
            echo "</td>";
            echo "<td>";
            echo $hostel_country;
            echo "</td>";
            echo "<td>";
            echo $hostel_city;
            echo "</td>";
            echo "<td>";
            echo $telephone;
            echo "</td>";
            echo "<td>";
            echo $email;
            echo "</td>";
            echo "<td>";
            echo $bed_count;
            echo "</td>";
            echo "<td>";
            if ($is_active == "t") {
                echo "active";
            } else {
                echo "NOT active";
            }
            echo "</td>";
            echo "<td>";
            echo "<form action='index.php' method='get'>";
            echo "<input type='button' name='active' value='change'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";


        }

        ?>
    </table>
    <?php
    echo "try #2<br>";

    $query2 = "SELECT hostel_name FROM inquiries WHERE hostel_name LIKE 'Mama'";
    $res = pg_query($dbconn, $query2)
    or die ('Illegal query:' . pg_last_error());

    echo "<table>";
    while ($line = pg_fetch_array($res, null, PGSQL_ASSOC)) {
        echo "<tr>";
        foreach ($line as $col_value) {
            echo "<td>$col_value</td>";
        }
        echo "</tr>";

    }
    echo "</table>";


    // Cleaning the result
    pg_free_result($result);
    pg_free_result($res);

    // Close connection
    pg_close($dbconn);
    ?>
    </body>
    </html>
