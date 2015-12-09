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
            <?php if (isset($_POST["submit"]) != "Finish registration"): ?>

                <div id="white">
                    <h2 class="text-center">Finish registration</h2>

                <!--form action="" method="POST"-->
                    <form action="in_dev/set.php" role="form">
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
                                   class="btn-primary btn-lg btn-block" onclick="completeSignup(document.getElementById('email_input').value, document.getElementById('token_input').value)">
                        </div>
                        <p id="signup_message"></p>
                    </form>
                <!--/form-->

            <?php else: ?>
                <?php
                $path_to_hostconfig = $_SERVER['DOCUMENT_ROOT'] . "/scripts/php/hostconfig.php";
                $path_to_cdbconn = $_SERVER['DOCUMENT_ROOT'] . "/scripts/php/CDBConn.php";
                include_once($path_to_hostconfig);
                include_once($path_to_cdbconn);


                if (isset($_POST['submit']) == 'Finish registration')
                {
                    //echo "You are almost done!<br>";

                    $input_email = $_POST['email'];
                    $input_token = $_POST['token'];
                    $input_password1 = $_POST['password1'];
                    $input_password2 = $_POST['password2'];

                    if ($input_token == "")
                    {
                        echo "No token specified. Please, check your email your activation link. You are lucky, if you find! :) <br>";
                        exit(1);
                    }

                    if ($input_password1 != $input_password2 || strlen($input_password1) < 6)
                    {
                        echo "Passwords must be matched and length must be more or equal than 6<br>";
                        exit(1);
                    } else
                    {
                        // echo "Password is OK <br>";

                    }


                    $test = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123"/*, TRUE*/);

                    $test->connect();


                    $query = "SELECT token FROM inquiries WHERE email='$input_email'";

                    if ($test->run_query($query))
                    {

                        switch ($test->affected_rows())
                        {
                            case 0:
                                echo "This email has no associated registration inquiry.<br>";
                                break;
                            case 1:
                                $arr = pg_fetch_array($test->getResult());
                                if ($arr["token"] == $input_token)
                                {
                                    // echo "Tokens are equal!<br>";
                                    $activate_query = "UPDATE inquiries SET password='$input_password1', is_active=TRUE WHERE email='$input_email'";
                                    if ($test->run_insert($activate_query) != 0)
                                    {
                                        echo "Congratulation, registration completed!<br>";
                                    }
                                } else
                                {
                                    echo "Wrong token. Please, contact support or try to make new registration inquiry for another email.<br>";

                                }
                                break;
                            default:
                                echo "Too much registration attempts. Please, contact support or try to make new registration inquiry for another email.<br>";
                                break;
                        }

                    } else
                    {
                        echo "Database error, while trying to find email request<br>";
                    }

                    $test->close();

                } else
                {/*
         $another = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123", TRUE);
         $another->connect();
         echo $another->run_select("SELECT room_name FROM room");
         $another->close();
         echo "<p>As soon you fill up all fields, you will be redirected to SETTING PAGE<br>
There are four simple steps to set up Hostel's profile in order to let you start to work.\n</p>";
      */
                }
                ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<script src="/bootstrap/jscustom/complete_signup.js"></script>
</body>
</html>
