<?php
if (!isset($_POST['submitsignuppage'])) {
    header('Location: ./signuppage.php');

} else {
    $hostel_name = $_POST['hostelname'];
    $bed_count = $_POST['bed_count'];
    $hostel_country = $_POST['hostelcountry'];
    $hostel_city = $_POST['hostelcity'];
    $telephone = $_POST['telephone'];
    $email = $_POST['mail'];
    $timestamp = date('F-d-Y ; H:i');

    $dbconn = pg_connect("gost=localhost dbname=jetpms user=jetuser password=qwerty123")
    or die('Could not connect. ' . pg_last_error());

    $query = "INSERT INTO inquiries (time_and_date, hostel_name,bed_count, country, city, telephone, email, is_active)
    VALUES($timestamp, $hostel_name, $bed_count, $hostel_country, $hostel_city, $telephone, $email, TRUE)";

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
<!--<label for="tab1" title="������� 1">������� 1</label>-->
<!---->
<!--<input id="tab2" type="radio" name="tabs">-->
<!--<label for="tab2" title="������� 2">������� 2</label>-->
<!---->
<!--<input id="tab3" type="radio" name="tabs">-->
<!--<label for="tab3" title="������� 3">������� 3</label>-->
<!---->
<!--<input id="tab4" type="radio" name="tabs">-->
<!--<label for="tab4" title="������� 4">������� 4</label>-->
<!---->
<!--<section id="content1">-->
<!--    <p>-->
<!--        ����� ���������� ����� ����������....<br>-->
<!--    </p>-->
<!--</section>-->
<!--<section id="content2">-->
<!--    <p>-->
<!--        ����� ���������� ����� ����������....-->
<!--    </p>-->
<!--</section>-->
<!--<section id="content3">-->
<!--    <p>-->
<!--        ����� ���������� ����� ����������....-->
<!--    </p>-->
<!--</section>-->
<!--<section id="content4">-->
<!--    <p>-->
<!--        ����� ���������� ����� ����������....-->
<!--    </p>-->
<!--</section>-->
<!--</div>-->
<!---->
</body>
</html>
