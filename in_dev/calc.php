<?php
if (isset($_POST['csubmit'])) {
    $bedscount = $_POST['amountofbeds'];
    $country = $_POST['country'];

    switch ($bedscount) {
        case 1:
            $b_price = 2;
            $bedscount = "from 1 to 10";
            break;
        case 2:
            $b_price = 5;
            $bedscount = "from 11 to 18";
            break;
        case 3:
            $b_price = 10;
            $bedscount = "from 19 to 26";
            break;
        case 4:
            $b_price = 12;
            $bedscount = "more than 26";
            break;
    }

    switch ($country) {
        case 1:
            $b_price *= 1;
            $country = "Ukraine";
            break;
        case 2:
            $b_price *= 1.25;
            $country = "Russia";
            break;
        case 3:
            $b_price *= 1.5;
            $country = "Another country";
            break;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>rate calculator</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
</head>
<body class="container">
<h1>Calc the cost</h1>

<p>this page contain base form which will calculate monthly price for using JetPMS </p>

<p>Price depends on: <b>amount of beds and country</b></p>
<form action="" method="post">
    <table>
        <tr>
            <td>Amount of beds</td>
            <td>

                <select name="amountofbeds" id="">
                    <option disabled selected>How many beds</option>
                    <option value="1">from 1 to 10</option>
                    <option value="2">from 11 to 18</option>
                    <option value="3">from 19 to 26</option>
                    <option value="4">more than 26</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Country</td>
            <td>
                <select name="country" id="">
                    <option disabled selected>What country hostel from?</option>
                    <option value="1">Ukraine</option>
                    <option value="2">Russia</option>
                    <option value="3">Another country</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="csubmit" value="calk">
            </td>
        </tr>
    </table>
    <?php
    if (isset($_POST['csubmit'])) {
        ?>
        <table>
            <tr>
                <td>Beds</td>
                <td><?php echo $bedscount; ?></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><?php echo $country; ?></td>
            </tr>
            <tr>
                <td>Total price</td>
                <td><?php echo $b_price . " "; ?> $ / month</td>
            </tr>
            <tr>
                <td colspan="2"><p>Like price and features? <br> Do register in one easy single step. </p></td>
            </tr>
            <tr>
                <td>Hostel's corporate e-mail:</td>
                <td>
                    <input type="email" name="email">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="register" value="Do register">
                </td>
            </tr>
        </table>
        <?php
    }
    ?>

</form>
</body>
</html>