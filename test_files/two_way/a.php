<html>
<title> PHP Hidden 1a</title>
<p>Enter your name</p>
<form method="post" action="c.php">
    <input type="text" name="myname" value="<?php echo $HTTP_POST_VARS['myname'];?>" /> 
    <input type="hidden" name="mypet" value="<?php echo $HTTP_POST_VARS['mypet'];?>" /> 
    <input type="submit" value="Register my name" />
</form>


</html>
