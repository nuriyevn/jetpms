<html>
<head>
<title>
PHP Hidden 1c
</title>
</head>
<body>
<p>My name is <?php echo $HTTP_POST_VARS['myname'];?>. My Pets name is <?php echo $HTTP_POST_VARS['mypet'];?>.</p>
<form method="post" action="a.php">
   <input type="hidden" name="myname" value="<?php echo $HTTP_POST_VARS['myname'];?>"/>
   <input type="hidden" name="mypet" value="<?php echo $HTTP_POST_VARS['mypet'];?>"/>
   <input type="submit" value="Change My name"/>
</form>
<form method="post" action="b.php">
   <input type="hidden" name="myname" value="<?php echo $HTTP_POST_VARS['myname'];?>"/>
   <input type="hidden" name="mypet" value="<?php echo $HTTP_POST_VARS['mypet'];?>"/>
   <input type="submit" value="Change Pets name"/>
</form>
</body>
</html>
