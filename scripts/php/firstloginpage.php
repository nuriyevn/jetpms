<?php
$path_to_hostconfig = $_SERVER['DOCUMENT_ROOT'];
$path_to_hostconfig .= "/scripts/php/hostconfig.php";

include_once($path_to_hostconfig);

if (!isset($_POST['submitsignuppage'])) {
    header('Location: ./signuppage.php');

} else {
    $hostel_name = $_POST['hostel_name'];
    $bed_count = $_POST['bed_count'];
    $hostel_country = $_POST['hostel_country'];
    $hostel_city = $_POST['hostel_city'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $timestamp = date('F-d-Y ; H:i');
    var_dump($jet_ip);
    $dbconn = pg_connect("host=localhost dbname=jetpms user=jetuser password=qwerty123")
    or
	$dbconn = pg_connect("host=$jet_ip dbname=jetpms user=jetuser password=qwerty123")
	or
 	die('Could not connect. ' . pg_last_error());

    $query = "INSERT INTO inquiries (time_and_date, hostel_name,bed_count, hostel_country, hostel_city, telephone, email, is_active)
    VALUES(NULL, '$hostel_name', $bed_count, '$hostel_country', '$hostel_city', '$telephone', '$email', TRUE)";

    $result = pg_query($query)
    or die('Illegal query:' . pg_last_error());

    echo "Successfully executed";

    pg_free_result($result)
    or die('Could not connect. ' . pg_last_error());
    pg_close($dbconn);

}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="windows-1251">
    <title>First login Page</title>
    <link rel="stylesheet" href="../../css/maincss.css">
    <link rel="stylesheet" href="../../css/firstloginpage.css">

</head>
<body>
<!--<div class="tabs">-->
<!--<input id="tab1" type="radio" name="tabs" checked>-->
<!--<label for="tab1" title="¬кладка 1">¬кладка 1</label>-->
<!---->
<!--<input id="tab2" type="radio" name="tabs">-->
<!--<label for="tab2" title="¬кладка 2">¬кладка 2</label>-->
<!---->
<!--<input id="tab3" type="radio" name="tabs">-->
<!--<label for="tab3" title="¬кладка 3">¬кладка 3</label>-->
<!---->
<!--<input id="tab4" type="radio" name="tabs">-->
<!--<label for="tab4" title="¬кладка 4">¬кладка 4</label>-->
<!---->
<!--<section id="content1">-->
<!--    <p>-->
<!--        «десь размещаете любое содержание....<br>-->
<!--    </p>-->
<!--</section>-->
<!--<section id="content2">-->
<!--    <p>-->
<!--        «десь размещаете любое содержание....-->
<!--    </p>-->
<!--</section>-->
<!--<section id="content3">-->
<!--    <p>-->
<!--        «десь размещаете любое содержание....-->
<!--    </p>-->
<!--</section>-->
<!--<section id="content4">-->
<!--    <p>-->
<!--        «десь размещаете любое содержание....-->
<!--    </p>-->
<!--</section>-->
<!--</div>-->
<!---->
</body>
</html>
