<?php 

include_once("getpart.php");

echo mb_internal_encoding();
mb_internal_encoding("UTF-8");
echo "<br/>".mb_internal_encoding();

//phpinfo();

set_time_limit(4000);
$imapPath = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'jetpmscom@gmail.com';
$password = '321ytrewq';

$inbox = imap_open($imapPath, $username, $password);


if ($inbox == FALSE)
{
	echo "pizdec happened.";
	echo "Imap_open failed.";
}
else
{
	echo "Taki da";
}

//$output = ''

?>

<form action="" method="POST" >

<input type="submit" name="check_email" value="Check email">

</form>

<?php

if ($_POST["check_email"])
{

$emails = imap_search($inbox, 'UNSEEN');

$output = '';

foreach ($emails as $mail)
{
	$headerInfo = imap_headerinfo($inbox, $mail);
	$output .= $headerInfo->subject.'<br/>';
	$output .= $headerInfo->toaddress.'<br/>';
	$output .= $headerInfo->date.'<br/>From:<br/>';
	
	$from = $headerInfo->from;
	foreach($from as $id => $object)
	{
		$fromname = '';
		$fromaddress = $object->mailbox . "@" . $object->host;
	}

	$output .= $fromname . "<br>" . $fromaddress . "<br>Str:";

	$output .= "<br/><br/>";
	$emailStructure = imap_fetchstructure($inbox, $mail);

	if (isset($emailStructure->parts))
	{

		$type = $emailStructure->parts[1]->type;
		
		$output .= "<br/>!!!Type!!!<br/>".$type."<br>";
		$message = imap_fetchbody($inbox, $mail, 1, FT_PEEK);
		$message = imap_base64($message);	
		//$message = quoted_printable_decode($message);
		$output .= "Message start<br/>";
		$output .= $message;
		$output .= "Message end<br/>";
		
	}
	else
	{
		echo "Else clause";
	}
	echo $output;
	$output = '';
}

}
imap_expunge($inbox);
imap_close($inbox);

?>
