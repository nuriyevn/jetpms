<?php
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Sign Up Today! ! !</title>
    <link rel="stylesheet" href="../../css/maincss.css">
    <link rel="stylesheet" href="../../css/signup.css">
</head>
<body>
<div class="topsiguppage">
<!--that is just light blue stripe on the top of the screen-->
</div>
<div id="middlesiguppage">
    <h1>Welcome to Hostel Property Managment System! </h1>
    <h2>Please do sign up!</h2>

    <form action="firstloginpage.php" method="post">
        <table>
            <tr>
                <td><input type="text" name="hostelname" placeholder="Hostel's name"></td>
                <td>Let us know who you are</td>
            </tr>
            <tr>
                <td><input type="number" name="amountofbeds" min="1" max="100" size="50"
                           placeholder="Number of beds in Hostel"></td>
                <td>Price depends of number people fitable in the hostel</td>
            </tr>
            <tr>
                <td><input type="text" name="hostelcountry" placeholder="Country"></td>
                <td>Also price is different for every counrtry</td>
            </tr>
            <tr>
                <td><input type="text" name="hostelcity" placeholder="City" title="Optional field"></td>
                <td>Indicate hostel's city.</td>
            </tr>
            <tr>
                <td><input type="email" name="hostelmail" placeholder="E-mail@mail.com"></td>
                <td>We will send to you registration data to let you try JetPMS in action ! </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submitsignuppage" value="Let's go"></td>
            </tr>
        </table>
    </form>

</div>
<div id="bottomsign">

</div>

</body>
</html>
