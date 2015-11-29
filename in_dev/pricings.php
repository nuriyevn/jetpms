<?php

$script_parent_dir = __DIR__;
$document_root = $_SERVER["DOCUMENT_ROOT"];
$http_host = $_SERVER['HTTP_HOST'];
$script_parent_dir = str_replace($document_root, $http_host, $script_parent_dir);

if ($_POST['csubmit'] == 'Calculate') {
    $bedscount= $_POST['amountofbeds'];
    $country = $_POST['country'];

	//var_dump($bedscount);
	//var_dump($country);
	
    switch ($bedscount) {
        case 1:
            $b_price = 2;
            $bedscount = "from 1 to 10";
            break;
        case 2:
            $b_price = 5;
            $bedscount = "from 11 to 18";
            break;
        case 3:
            $b_price = 10;
            $bedscount = "from 19 to 26";
            break;
        case 4:
            $b_price = 12;
            $bedscount = "more than 26";
            break;
    }

    switch ($country) {
        case 1:
            $b_price *= 1;
            $country = "Ukraine";
            break;
        case 2:
            $b_price *= 1.25;
            $country = "Russia";
            break;
        case 3:
            $b_price *= 1.5;
            $country = "Another country";
            break;
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>rate calculator</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
</head>
<body class="container">
<h1>Calculate the cost</h1>

<p>this page contain base form which will calculate monthly price for using JetPMS </p>

<p>Price depends on: <b>amount of beds and country</b></p>

<?php
if (!isset($_POST['csubmit']))
{
?>

<form action="" method="post">
    <table>
        <tr>
            <td>Amount of beds</td>
            <td>

                <select name="amountofbeds" id="">
                    <!--option selected>How many beds</option-->
                    <option value="1">from 1 to 10</option>
                    <option value="2">from 11 to 18</option>
                    <option value="3">from 19 to 26</option>
                    <option value="4">more than 26</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Country</td>
            <td>
                <select name="country" id="">
                    <!--option selected>What country hostel from?</option-->
                    <option value="1">Ukraine</option>
                    <option value="2">Russia</option>
                    <option value="3">Another country</option>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="submit" name="csubmit" value="Calculate">

            </td>
        </tr>
    </table>
</form>
    <?php
    } else if ($_POST["csubmit"] == 'Calculate') {
        ?>
    <form action="" method="post">


        <table>

            <tr>
                <td>Beds</td>
                <td><?php echo $bedscount; ?></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><?php echo $country; ?></td>
            </tr>
            <tr>
                <td>Total price</td>
                <td><?php echo $b_price . " "; ?> $ / month</td>
            </tr>
			<tr>
			<td colspan="2"><p>Like price and features? <br> Do register in one easy single step. </p></td>
            </tr>
            <tr>
                <td>Hostel's corporate e-mail:</td>
                <td>

                    <input hidden name="bedscount" value="<?php echo $bedscount; ?>">
                    <input hidden name="country" value="<?php echo $country; ?>">
                    <input hidden name="b_price" value="<?php echo $b_price; ?>">
                    <input required type="email" name="email" value="jetpmscom@gmail.com" >


                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="csubmit" value="Do register">
                </td>
            </tr>
        </table>

    </form>

        <?php
    }
	?>

	<?php
   
   $path_to_hostconfig = $_SERVER['DOCUMENT_ROOT'];
   $path_to_hostconfig .= "/scripts/php/hostconfig.php";
   
   include_once($path_to_hostconfig);

	if ($_POST["csubmit"] === 'Do register')
	{
      
      
      $dbconn = pg_connect("host=localhost dbname=$database user=$user password=$pswd")
      or
      $dbconn = pg_


		if (($_POST["email"]) != "")
		{



			$send_to = $_POST["email"];
			$subject = "JetPMS.com Registration Request";
			$message = "Dear customer, <br><br><br>We are glad to inform that you have almost done with the registration at JetPMS.<br/> Please, follow further simple instruction and be ready for evaluating our product.<br>";
			$message .= "So far, you have requested JetPMS for:<br>";

			$message .= "Beds <b>".$_POST["bedscount"] . "</b><br/>";
			$message .= "Country <b>".$_POST["country"]."</b><br/>";
			$message .= "Total price: <b>".$_POST["b_price"]."$/month</b><br>";

         $message .= "Please, click to this activation link: ";

         $activation_link = $script_parent_dir."/register.php?email=".$send_to;
         $href_tag = '<a href=http://'.$activation_link.">$activation_link</a>";
         $message .= $href_tag."<br>";

			$message .= "<br><br>Best Wishes,<br/>JetPMS.com Team<br/>+380980238180<br>";
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers = "Content-type:text/html;charset=UTF-8"."\r\n";

            echo "$_POST";
            echo "mail functioncall <br>";
			mail($send_to, $subject, $message, $headers);
			echo "Registration info is sent. Please check email (also, check spam if you will have not found the email)<br/>";
            echo "Email message:<br>";
            //var_dump($message);

		}
		else
		{
			echo "Please specify email.<br>";
			
		}
	}
    ?>

</body>
</html>
