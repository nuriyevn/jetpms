<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">

    <title>Signup | Jet PMS</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/login.css" rel="stylesheet">
    <link rel='stylesheet' type='text/css' href='http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css'/>

</head>

<body>
<!-- container 1 -->
<div class="container">
    <div id="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 class="text-center">Jet PMS</h1>

            <div id="white">

                <h2 class="text-center">Sign Up</h2>

                <input id="email_location" hidden type="text" value=""/>
                <label for="login_id">Email:</label>
                <input id="email_input" type="email" class="form-control" value="nuriyevn@gmail.com"
                       placeholder="Email address" required autofocus="" id="login_id"><br>
                <input id="submit_input" class="btn btn-lg btn-success btn-block" type="submit" name="sign_up"
                       value="Sign up" onclick="registerUser(document.getElementById('email_input').value)"/>

                <p id="signup_message"></p>

                <!--/form-->
            </div>
            <br>

            <div class="row">
                <div class="text-center" id="comment">
                    Already have an account? <a href="/login/index.php"><span id="border">Log In</span></a>
                </div>
            </div>

            <p>
            <ul class="text-left">
                <li>Link in your letter is valid for 24 hours</li>
                <li>Check spam folder if you have not found our letter in inbox. Please, mark it *non spam*. Tnx.</li>
                <li>Have a question? Send us a letter <a href="mailto:nuriyevn@gmail.com">nuriyevn@gmail.com</a></li>
            </ul>
            </p>
            <div id="accordion">
                <h3>Send us a letter</h3>

                <div>
                    <form action="" method="post">
                <textarea name="signup" class="form-signin-heading" id="send_email" cols="" rows="10"
                          placeholder="I got a question. Could you be so kind to help me?">

                </textarea><br>
                        <input type="email" class="form-control" aria-required="true" placeholder="Email address"
                               required=""><br>
                        <input type="submit" class="btn btn-lg btn-success btn-block" name="Sign up" value="Send">
                    </form>
                </div>
            </div>
            <br>
            <footer class="text-center">
                All rights are right
            </footer>
        </div>

    </div>


</div>
<!-- /container 1 -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/validateEmail.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="../js/jquery-ui-1.11.4.custom/jquery-ui.js"></script>

<script src="../js/signup.js"></script>

</body>
</html>
