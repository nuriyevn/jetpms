<!-- Первый Шаг регистрации -->
<!-- После получения письма пользователь направляяется на страничку complite_signup.php -->
<!--Навесить правильные стили стили, переверстать в настоящий бутстрап -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">

    <title>Signup | Jet PMS</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/csscustom/signup.css" rel="stylesheet">

    <!--    Bootstrap cor jquery link-->
    <script src="http://code.jquery.com/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- container 1 -->
<div class="container">

    <div id="maindiv">
        <div id="margin">

        </div>

        <h1>Jet PMS</h1>

        <div id="white">
            <div class="form-signin" role="form">
                <h2 class="form-signin-heading"><b>Sign Up</b></h2>
                <h3 id="email_label">Email:</h3>
                <input id="email_location"  hidden type="text" value=""/>
                <input id="email_input" type="email" class="form-control" value="jetpmscom@gmail.com" placeholder="Email address" required="" autofocus=""><br>
                <input id="submit_input" class="btn btn-lg btn-primary btn-block" type="submit" name="sign_up" value="Sign up" onclick="registerUser(document.getElementById('email_input').value)" />
                <p id="signup_message" style="color: #0000FF"></p>

            </div>
        </div>




            <p>
            <ul class="text-left">
                <li>Link in your letter is valid for 24 hours</li>
                <li>Check spam folder if you have not found our letter in inbox. Please, mark it *non spam*. Tnx.</li>
                <li>Have a question? Send us a letter <a href="mailto:jetpmscom@gmail.com">jetpmscom@gmail.com</a></li>
            </ul>
            </p>
            <form action="" method="post">

            <textarea name="signup" class="form-signin-heading" id="" cols="" rows="10"
                      placeholder="I got a question. Could you be so kind to help me?"></textarea><br>
                <input type="email" class="form-control" placeholder="Email address" required=""><br>
                <input type="submit" class="btn btn-lg btn-primary btn-block" name="Sign up">
            </form>

        <footer>
            All rights are right
        </footer>

    </div>






</div>
<!-- /container 1 -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/bootstrap/jscustom/signup.js"></script>
</body>
</html>
