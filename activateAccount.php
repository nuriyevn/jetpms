<!-- навесить стили-->
<!-- переверстать по бутстраповски-->
<!--подключить нужные стили-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <title>JetPMS [Registration]</title>

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap-theme.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/bootstrap/csscustom/signup.css" rel="stylesheet">

    <!--    Bootstrap cor jquery link-->
    <script src="http://code.jquery.com/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body onload="loadRegistrationData()">
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center">Jet PMS</h1>
                <div class="white">
                    <h2 class="text-center">Finish registration</h2>
                        <div class="form-group">
<!--                            <label for="email">Email login:</label>-->
                            <input type="email" disabled  name="mail" class="form-control" id="email_input" placeholder="Email Address">
                        </div>

                        <div class="form-group">
<!--                            <label for="password1">Create password:</label>-->
                            <input type="password" autofocus required name="password1" class="form-control" id="password1" placeholder="Create Password">
                        </div>

                        <div class="form-group">
<!--                            <label for="password2">Retype password:</label>-->
                            <input type="password" required name="password2" class="form-control" id="password2" placeholder="Retype Password">
                            <input hidden id="token_input" name="token" value="">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" value="Finish registration"
                                   class="btn-success btn-lg btn-block" onclick="completeSignup(document.getElementById('email_input').value, document.getElementById('token_input').value, document.getElementById('password1').value, document.getElementById('password2').value)">
                        </div>
                        <p id="signup_message"></p>
                </div>
               <br/>
               <div class="row">
                   <div class="text-center" id="comment">
                       Already have an account? <a href="login.php">Log In</a>
                   </div>
               </div>
               <div class="row">
                   <div class="text-center" id="comment2">
                       Don't have an account? <a href="signup.php">Sign Up</a>
                   </div>
               </div>


        </div>
    </div>
</div>
<script src="/js/validateEmail.js"></script>
<script src="/js/queryString.js"></script>
<script src="/js/activateAccount.js"></script>

</body>
</html>
