<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JetPMS [Registration]</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/register.css" rel="stylesheet">
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
          <input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>" placeholder="Введите email">
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
    </div>
</body>
<footer style="text-align: center;">
    Copyright © 2014 bla-bla-bla
</footer>
</html>