<html>
<title> PHP Hidden 1a</title>
<p>Enter your pets name</p>
<form method="post" action="c.php">
    <input type="hidden" name="myname" value="<?php echo $HTTP_POST_VARS['myname'];?>" /> 
    <input type="text" name="mypet" value="<?php echo $HTTP_POST_VARS['mypet'];?>" /> 
    <input type="submit" value="Register my pets name" />
</form>
