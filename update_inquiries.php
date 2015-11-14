<?php

function inquiry_false($id)
{
    // Connecting and selecting database
    $dbconn = pg_connect("host=localhost dbname=jetpms user=jetuser password=qwerty123")
    or
    $dbconn = pg_connect("host=$jet_ip dbname=jetpms user=jetuser password=qwerty123")
    or
    die('Cound not connect. ' . pg_last_error());


    $update_query = "UPDATE inquiries SET is_active=FALSE  WHERE request_id=$id";


    $update_result = pg_query($dbconn, $update_query)
    or die('Illegal query' . pg_last_error());

    pg_free_result($update_result);

    pg_close($dbconn);
    return true;

}

if (isset($_POST['submit'])) {
    $id = $_POST['submit'];
    inquiry_false($id);

}



