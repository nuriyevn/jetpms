<?php

session_start();
//error_reporting(E_ALL);
//ini_set("display_errors", 0);


if (isset($_SESSION['g_username']))
{
    // opened and configured, opened misconfigured
    header("Location: /dashboard/index.php");
    exit();
}

// if closed , no matter configured or not, continue load the page
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">

    <title>Login | Jet PMS</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="/css/login.css" rel="stylesheet">

</head>

<body onload="loadLoginData()">
<!-- container 1 -->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center">Jet PMS</h1>

            <div id="white">

                <!--form-->
                <h2 class="text-center">Log in</h2>

                <p id="login_message"></p>
                <button hidden id="submit1"></button>
                <div class="row">
                    <label for="login_id">Email:</label>
                    <input value="" type="email" id="login_id" class="form-control" placeholder="Email address"
                           required=""
                           autofocus="">
                </div>
                <br>

                <div class="row">
                    <label for="password_id">Password:</label>
                    <input type="password" id="password_id" class="form-control" placeholder="Password" required="">
                </div>
                <br>

                <div class="row">
                    <button id="button_id" class="btn btn-lg btn-success btn-block" type="submit">Log in</button>
                </div>
                <br>

                <div class="text-center">
                    <a href="recoverpassword.php">Forgot password?</a>
                </div>
                <!--/form-->
            </div>
            <br>

            <div class="row">
                <div class="text-center" id="comment">
                    Don't have an account? <a href="/signup/index.php"><span id="border">Sign Up</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /container 1 -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/queryString.js"></script>
<script src="/js/login.js"></script>
</body>
</html>
