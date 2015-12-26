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
    <link href="/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet">

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

                <!--form class="form-signin" role="form"-->
                <h2 class="text-center">Forgot your password?</h2>
                <h3 class="text-center">Provide your e-mail.</h3>
                <p id=""></p>
                <div class="row">
                    <input value="" type="email" id="login_id" class="form-control" placeholder="Email address" required=""
                           autofocus="">
                </div>
                <br>
                <!--div class="row">
                    <label class="checkbox">
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div-->
                <div class="row">
                    <button id="button_id" class="btn btn-lg btn-success btn-block" type="submit">Recover now</button>
                </div>
                <br>

                <div class="text-center btn-hover">
                    <a href="index.php">Back to login page</a>
                </div>
                <!--/form-->
            </div>
            <br>

            <div class="row">
                <div class="text-center" id="comment">
                    Don't have an account? <a href="/signup/index.php">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /container 1 -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="/js/queryString.js"></script>
<script src="/js/login.js"></script>
</body>
</html>