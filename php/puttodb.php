<?php
$path_to_hostconfig = $_SERVER['DOCUMENT_ROOT'];
$path_to_hostconfig .= "/scripts/php/hostconfig.php";

include_once($path_to_hostconfig);

if (!isset($_POST['submitsignuppage'])) {
    header('Location: ./signup.php');

} else {
    $hostel_name = $_POST['hostel_name'];
    $bed_count = $_POST['bed_count'];
    $hostel_country = $_POST['hostel_country'];
    $hostel_city = $_POST['hostel_city'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $timestamp = date('j-M-Y H:i');


//    echo $timestamp."<hr><br>";
//    var_dump($timestamp)."<hr>";


    $dbconn = pg_connect("host=localhost dbname=jetpms user=jetuser password=qwerty123")
    or
    $dbconn = pg_connect("host=$jet_ip dbname=jetpms user=jetuser password=qwerty123")
    or die('Could not connect. ' . pg_last_error());

    $query = "INSERT INTO inquiries (time_and_date, hostel_name,bed_count, hostel_country, hostel_city, telephone, email, is_active)
    VALUES('$timestamp', '$hostel_name', $bed_count, '$hostel_country', '$hostel_city', '$telephone', '$email', TRUE)";

    $result = pg_query($query)
    or die('Illegal query:' . pg_last_error());

    echo "Successfully executed";
    // redirecting to thxpage.php


    pg_free_result($result)
    or die('Could not connect. ' . pg_last_error());
    pg_close($dbconn);

}
