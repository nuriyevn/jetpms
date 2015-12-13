<?php
   $script_parent_dir = __DIR__;
   $document_root = $_SERVER["DOCUMENT_ROOT"];
   $http_host = $_SERVER["HTTP_HOST"];
   $script_parent_dir = str_replace($document_root, $http_host, $script_parent_dir);
   
   $path_to_cdbconn = $_SERVER['DOCUMENT_ROOT']."/php/CDBConn.php";
   $path_to_hostconfig = $_SERVER['DOCUMENT_ROOT']."/php/hostconfig.php";

   include_once($path_to_cdbconn);
   include_once($path_to_hostconfig);

   $send_to = $_GET["email"];
   if ($send_to == "")
   {
      
      echo "Email is empty. nothing to do<br>";
      http_response_code(422);
      exit(1);
   }
   $conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123", FALSE);
   $conn->connect();
   
   $conn->run_select("SELECT * FROM inquiries WHERE email='$send_to'");
   if ($conn->affected_rows() > 0)
   {
      echo "Following email '$send_to' is already used or activation requested. Please, select another email, if appropriate.<br>";
      http_response_code(422);
      exit(1);
   }
   else
   {
      $subject = "JetPMS.com Registration Request";
      $message = "Dear customer, <br><br><br>We are glad to inform that you have almost done with the registration at JetPMS.<br/> Please, follow further simple instruction and be ready for evaluating our product.<br>";
      /*$message .= "So far, you have requested JetPMS for:<br>";

      $message .= "Beds <b>".$_POST["bedscount"] . "</b><br/>";
      $message .= "Country <b>".$_POST["country"]."</b><br/>";
      $message .= "Total price: <b>".$_POST["b_price"]."$/month</b><br>";
      */

      $message .= "Please, click to this activation link: ";

      $token= bin2hex(openssl_random_pseudo_bytes(16));
      $activation_link = "http://".$script_parent_dir."/activateAccount.php?email=".$send_to."&token=".$token;
      $href_tag = "<a href=".$activation_link.">$activation_link</a>";

      $conn->run_insert("INSERT INTO inquiries (email, token, hostel_name, telephone, is_active) VALUES('$send_to', '$token','', '', FALSE)");

      $message .= $href_tag."<br>";

      $message .= "<br><br>Best Wishes,<br/>JetPMS.com Team<br/>+380980238180<br>";
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers = "Content-type:text/html;charset=UTF-8"."\r\n";

      mail($send_to, $subject, $message, $headers);
      echo "Registration info is sent. Please check email (also, check spam if you will have not found the email)<br/>";
      http_response_code(200);
   }

?>
