<?php


function inquiry_false($id)
{
    // Connecting and selecting database
    $dbconn = pg_connect("host=localhost dbname=jetpms user=jetuser password=qwerty123")
    or
    $dbconn = pg_connect("host=62.75.216.31 dbname=jetpms user=jetuser password=qwerty123")
    or
    die('Could not connect. ' . pg_last_error());

    $update_query = "UPDATE inquiries SET is_active=FALSE  WHERE request_id=$id";

    $update_result = pg_query($dbconn, $update_query)
    or die('Illegal query inquiry false' . pg_last_error());

    pg_free_result($update_result);

    pg_close($dbconn);
    echo '<meta http-equiv="refresh" content="0; url=index.php">';

}

function inquiry_true($id)
{
    // Connecting and selecting database
    $dbconn = pg_connect("host=localhost dbname=jetpms user=jetuser password=qwerty123")
    or
    $dbconn = pg_connect("host=62.75.216.31 dbname=jetpms user=jetuser password=qwerty123")
    or
    die('Cound not connect. ' . pg_last_error());

    $update_query = "UPDATE inquiries SET is_active=TRUE  WHERE request_id=$id";

    $update_result = pg_query($dbconn, $update_query)
    or die('Illegal query inquiry false' . pg_last_error());

    pg_free_result($update_result);

    pg_close($dbconn);
    echo '<meta http-equiv="refresh" content="0; url=index.php">';

}

if (isset($_POST['submit_false'])) {
    $request_id = $_POST['submit_false'];
    inquiry_false($request_id);
}

if (isset($_POST['submit_true'])) {
    $request_id = $_POST['submit_true'];
    inquiry_true($request_id);
}

