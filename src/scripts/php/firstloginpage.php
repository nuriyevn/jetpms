<?php
if (!isset($_POST['submitsignuppage'])) {
    header('Location: ./signuppage.php');

} else {
    $hostel_name = $_POST['hostelname'];
    $amount_of_beds = $_POST['amountofbeds'];
    $hostel_country = $_POST['hostelcountry'];
    $hostel_mail = $_POST['hostelmail'];

    include('./scripts/db.php');


    $sql = "INSERT INTO signup(hostel_name, count_beds, country, email)
            VALUES('mama', '24', 'ukr', 'naum@com.ua')"
    or die ("Invalid query: " . mysql_error());

    // '".$hostel_name."', '".$amount_of_beds."', '".$hostel_country."', '".$hostel_mail."'


    mysql_query($sql);
    if (!mysql_query($sql)) {
        echo "ошибка при добавлении данных";
    } else {
        echo "Данные успешно добавлены";
    }
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
<!--<label for="tab1" title="Вкладка 1">Вкладка 1</label>-->
<!---->
<!--<input id="tab2" type="radio" name="tabs">-->
<!--<label for="tab2" title="Вкладка 2">Вкладка 2</label>-->
<!---->
<!--<input id="tab3" type="radio" name="tabs">-->
<!--<label for="tab3" title="Вкладка 3">Вкладка 3</label>-->
<!---->
<!--<input id="tab4" type="radio" name="tabs">-->
<!--<label for="tab4" title="Вкладка 4">Вкладка 4</label>-->
<!---->
<!--<section id="content1">-->
<!--    <p>-->
<!--        Здесь размещаете любое содержание....<br>-->
<!--    </p>-->
<!--</section>-->
<!--<section id="content2">-->
<!--    <p>-->
<!--        Здесь размещаете любое содержание....-->
<!--    </p>-->
<!--</section>-->
<!--<section id="content3">-->
<!--    <p>-->
<!--        Здесь размещаете любое содержание....-->
<!--    </p>-->
<!--</section>-->
<!--<section id="content4">-->
<!--    <p>-->
<!--        Здесь размещаете любое содержание....-->
<!--    </p>-->
<!--</section>-->
<!--</div>-->
<!---->
</body>
</html>
