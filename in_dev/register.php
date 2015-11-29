<?php
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JetPMS [Registration]</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">

</head>
<body>
<div class="container">
    <h1>Welcome to JetPMS!</h1>

    <h2>You are one step away to finish registration</h2>

    <form action="./set.php" method="post">
        <table>
            <tr>
                <td>Your login is :</td>
                <td>
                    <input type="email" name="email" value="<?php echo $email; ?>">
                    <input hidden name="token" value="<?php echo $token; ?>">
                </td>
            </tr>
            <tr>
                <td>Create your password</td>
                <td>
                    <input type="password" name="password1">
                </td>
            </tr>
            <tr>
                <td>Re type your password</td>
                <td>
                    <input type="password" name="password2">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" value="Finish registration">
                </td>
            </tr>
        </table>
    </form>
    <p>As soon you fill up all fields, you will be redirected to SETTING PAGE <br>
        There are four simple steps to set up Hostel's profile in order to let you start to work.
    </p>
</div>

</body>
</html>