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
	

	var_dump($update_query);
    $update_result = pg_query($dbconn, $update_query)
    or die('Illegal query inquiry false' . pg_last_error());

    pg_free_result($update_result);

    pg_close($dbconn);
    return true;

}


if (isset($_POST['submit'])) {
    $request_id = $_POST['submit'];
	//var_dump($request_id);
    inquiry_false($request_id);
}



