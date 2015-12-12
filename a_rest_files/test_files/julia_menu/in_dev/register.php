<?php
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];
   

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JetPMS [Registration]</title>
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="../bootstrap/css/register.css" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
</head>
<body>
<div class="container" id="head_img">
    <h1>Welcome to JetPMS!</h1>

    <h2>You are one step away to finish registration</h2>
</div>
<div class="container">
    <form action="register.php" method="POST" role="form">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>"
                   placeholder="Введите email">
            <input hidden name="token" value="<?php echo $token; ?>">
        </div>
        <div class="form-group">
            <label for="pass1">Придумайте пароль</label>
            <input type="password" name="password1" class="form-control" placeholder="Пароль" id="pass1">
        </div>
        <div class="form-group">
            <label for="pass2">Повторите пароль</label>
            <input type="password" name="password2" class="form-control" placeholder="Повторите пароль" id="pass2">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Finish registration" class="form-control">
        </div>
    </form>
    <?php
      $path_to_hostconfig = $_SERVER['DOCUMENT_ROOT']."/scripts/php/hostconfig.php";
      $path_to_cdbconn = $_SERVER['DOCUMENT_ROOT']."/scripts/php/CDBConn.php";
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

         if ($input_password1  != $input_password2 || strlen($input_password1) < 6)
         {
            echo "Passwords must be matched and length must be more or equal than 6<br>";
            exit(1);
         }
         else
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
                  }
                  else
                  {
                     echo "Wrong token. Please, contact support or try to make new registration inquiry for another email.<br>";
                     
                  }
                  break;
               default:
                  echo "Too much registration attempts. Please, contact support or try to make new registration inquiry for another email.<br>";
                  break;
            }
         
         }
         else
         {
            echo "Database error, while trying to find email request<br>";
         }
      
         $test->close();

      }
      else
      {/*
         $another = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123", TRUE);
         $another->connect();
         echo $another->run_select("SELECT room_name FROM room");
         $another->close();
         echo "<p>As soon you fill up all fields, you will be redirected to SETTING PAGE<br>
There are four simple steps to set up Hostel's profile in order to let you start to work.\n</p>";
      */}
   ?>
</div>
</body>
<footer style="text-align: center;">
    Copyright © 2014 bla-bla-bla
</footer>
</html>
