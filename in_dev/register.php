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

    <form action="./register.php" method="POST">
        <table>
            <tr>
                <td>Your login is :</td>
                <td>
                    <input required type="email" name="email" value="<?php echo $email; ?>">
                    <input hidden name="token" value="<?php echo $token; ?>">
                </td>
            </tr>
            <tr>
                <td>Create your password</td>
                <td>
                    <input required type="password" name="password1">
                </td>
            </tr>
            <tr>
                <td>Re type your password</td>
                <td>
                    <input required type="password" name="password2">
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
</html>
