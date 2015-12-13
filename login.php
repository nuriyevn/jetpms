<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <title>Login | Jet PMS</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap/bootstrap-theme.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/login.css" rel="stylesheet">

    <!--    Bootstrap cor jquery link-->
    <script src="http://code.jquery.com/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body onload="loadLoginData()">

<!-- container 1 -->
<div class="container">

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center">Jet PMS</h1>

            <div id="white">

                <form class="form-signin" role="form">
                    <h2 class="text-center">Log in</h2>
                    <p id="login_message"></p>
                    <div class="row">
                        <input type="email" class="form-control" placeholder="Email address" required=""
                               autofocus="">
                    </div>
                    <br>

                    <div class="row">
                        <input type="password" class="form-control" placeholder="Password" required="">
                    </div>
                    <br>
                    <!--div class="row">
                        <label class="checkbox">
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div-->
                    <div class="row">
                        <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
                    </div>
                    <br>

                    <div class="text-center">
                        <a href="#">Forgot password?</a>
                    </div>
                </form>
            </div>
            <br>

            <div class="row">
                <div class="text-center" id="comment">
                    Don't have an account? <a href="signup.php">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /container 1 -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/queryString.js"></script>
<script src="/js/login.js"></script>
</body>
</html>
