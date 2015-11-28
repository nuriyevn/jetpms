<?php
if (isset($_POST['csubmit'])) {
    $bedscount = $_POST['amountofbeds'];
    $country = $_POST['country'];

    switch ($bedscount) {
        case 1:
            $b_price = 0;
            break;
        case 2:
            $b_price = 5;
            break;
        case 3:
            $b_price = 10;
            break;
        case 4:
            $b_price = 12;
            break;
    }

    switch ($country) {
        case 1:
            $b_price *= 1;
            break;
        case 2:
            $b_price *= 1.25;
            break;
        case 3:
            $b_price *= 1.5;
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
    <style>
        td {
            padding: 5px;
        }
    </style>
</head>
<body class="container">
<h1>Calc the cost</h1>

<p>this page contain base form which will calculate monthly price for using JetPMS </p>

<p>Price depends on:
<ol>
    <li>amount of beds</li>
    <li>country</li>
</ol>
</p>
<form action="" method="post">
    <table>
        <tr>
            <td>Amount of beds</td>
            <td>
                <select name="amountofbeds" id="">
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
        <?php
        if (isset($_POST['csubmit'])) {
            ?>
            <tr>
                <td>Total price $/month</td>
                <td><?php echo $b_price; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>

</form>
</body>
</html>