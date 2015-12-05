<?php

if (isset($_POST['step1'])) {
    $step1 = $_POST['step1'];
}
if (isset($_POST['step2'])) {
    $step2 = $_POST['step2'];
}

if (isset($_POST['step3'])) {
    $step3 = $_POST['step3'];
}


function loadRoomTypes()
{
   $path_to_hostconfig = $_SERVER['DOCUMENT_ROOT']."/scripts/php/hostconfig.php";
   include_once($path_to_hostconfig);
   $path_to_cdbconn = $_SERVER["DOCUMENT_ROOT"]."/scripts/php/CDBConn.php";
   include_once($path_to_cdbconn);

   $my_conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123", FALSE);
   $my_conn->connect();
     
   if ($my_conn->run_query("SELECT room_type_id, room_type_name FROM room_type"))
   {
     while ($arr = pg_fetch_array($my_conn->getResult()))
      {
         $html_room_types .="<option value=$arr[0]>$arr[1]</option>"; 
      }
   }
   
   $my_conn->close();
   return $html_room_types;
 }


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>JetPMS [Set up step first]</title>

    <!-- Bootstrap -->
    <!--    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">-->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link rel="stylesheet" href="../bootstrap/css/id.css">
    <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container" id="set">

    <!--- - - step one begins here - - - - - - - - - - - - -  -->

    <?php if (!isset($step1) && !isset($step2) && !isset($step3)): ?>
       <h1>Welcome to JetPMS!</h1>

       <h2>1-st step: Adding rooms</h2>

       <p>that is important to add properly room and rates in order to let the rooms to be sold</p>

       <h3>How many rooms in your hostel?</h3>

       <p>FOR EXAMPLE: <br> in Mama hostel there are four rooms:
       <ul>
           <li>Private ensuite double room</li>
           <li>Shared mixed dorm for four</li>
           <li>Shared female dorm for eight</li>
           <li>Shared mixed dorm for eight</li>
       </ul>
       ANOTHER EXAMPLE: <br>in Centro Hostel there are three rooms:
       <ul>
           <li>Shared mixed dorm for eight</li>
           <li>Shared female dorm for eight</li>
           <li>Shared mixed dorm for eight</li>
       </ul>
       <h3>So, how many rooms in the hostel?</h3>

       <form action="" method="post">
           <input type="number" name="roomscount" min="1" max="99">
           <input type="submit" name="step1" value="Proceed to 2-nd step">
       </form>
       </p>

    <!-- - step two begins here - - - - - - - -  -->
    <?php elseif ($_POST["step1"] == "Proceed to 2-nd step"): ?>

         <h2>Configuring the rooms</h2>
         <?php
         $roomscount = $_POST['roomscount'];
         ?>
         <form action="" method="post">
        

            <input hidden name="roomscount" value="<?php echo $roomscount?>">; 
            <?php
            $html_room_type_options = loadRoomTypes();
            for ($i = 0; $i < $roomscount; $i++) 
            {
            ?>
            <hr>
            <h3>Room # <?php echo $i + 1; ?></h3>
            <table>
                <tr>
                    <td>
                        Give a name for this room: <br>
                        <input required type="text" name="nazv<?php echo $i + 1; ?>">
                    </td>
                    <td>
                        Define the type for this room: <br>
                        <?php
                           echo "<select required name=\"type";
                           echo $i+1;
                           echo "\" id=\"\">";
                           echo $html_room_type_options;    
                           echo "</select>"
                        ?>
                        </td>
                    <td>
                        Define capacity of this room: <br>
                        <input required type="number" name="capacity<?php echo $i + 1; ?>" min="1" max="24">
                    </td>
                </tr>
            </table>
            <?php
            }
            ?>
            <br><br>
            <input type="submit" name="step2" value="Proceed to 3-rd step">
            <br><br>
            <hr>
         </form>

    <!------- step three begins here -------------------------------------------------------------------------------->

    <?php elseif ($_POST["step2"] == "Proceed to 3-rd step"): ?> 
    <?php
       $arr = $_POST;
       $rcount = $_POST["roomscount"];
       $room_info = array();
      
      
       function putRoomsToDatabase(&$arr, $rcount)
       {
            $path_to_hostconfig = $_SERVER['DOCUMENT_ROOT']."/scripts/php/hostconfig.php";
            include_once($path_to_hostconfig);
            $path_to_cdbconn = $_SERVER["DOCUMENT_ROOT"]."/scripts/php/CDBConn.php";
            include_once($path_to_cdbconn);

            $my_conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123", FALSE);
            $my_conn->connect();
            for ($i = 1; $i <= $rcount; $i++)
            {
               $nazv = "nazv".$i;
               $room_info[$i] .= "<br><br>Room name: ".$arr[$nazv];
               $type_id = "type".$i;


               $q_select = "SELECT room_type_name FROM room_type WHERE room_type_id = '".$arr[$type_id]."'";
               $my_conn->run_query($q_select);
               $line = pg_fetch_array($my_conn->getResult());

               $type_name = "type_name".$i;
               $arr[$type_name] = $line[0];
               $room_info[$i] .= "<br><br>Category of room: ".$arr[$type_name];

               $capacity = "capacity".$i;
               $room_info[$i] .= "<br><br>Capacity of the room: ".$arr[$capacity];

               //$q_insert = "INSERT INTO room (room_name, room_type_id, bed_count) VALUES('".$arr[$nazv]."',".$arr[$type_id].",".$arr[$capacity].")";
               //$my_conn->run_insert($q_insert);
            }

            $my_conn->close();
            return $room_info;
       }

       $room_info = putRoomsToDatabase($arr, $rcount);
    // 161
    ?>
    <h2>Configuring the prices</h2>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <form action="" method="post">
                <div class="tabs">
               <?php 
                     echo "<ul class=\"nav nav-tabs\">";
                     for ($i = 1; $i <= $rcount; $i++)
                     {
                        if ($i == 1)
                           echo "<li class=\"active\"><a href=\"#tab-".$i."\" data-toggle=\"tab\">"."Room #$i"."</a></li>";
                        else
                           echo "<li><a href=\"#tab-".$i."\" data-toggle=\"tab\">"."Room #$i"."</a></li>";
                     }
                     echo "</ul>";
                  
                     echo "<div class=\"tab-content\">";
                     for ($i = 1; $i <= $rcount; $i++)
                     {
                        // open tag
                        if ($i == 1)
                           echo "<div class=\"tab-pane active\" id=\"tab-".$i."\">";
                        else
                           echo "<div class=\"tab-pane\" id=\"tab-".$i."\">";
                        // content of tag 
                        echo "<table id=\"table-set\"> ";
                        echo "<p>".$room_info[$i]."<p>";
                        
                        $price_i = "price".$i;
                        echo "<input type=\"number\" name=\"".$price_i."\" value=\"0\" min=\"0\"/>";
                        
                        $nazv_i = "nazv".$i;
                        echo "<input type=\"hidden\" name=\"nazv".$i."\" value=\"".$arr[$nazv_i]."\" />";

                        $type_i = "type".$i;
                        echo "<input type=\"hidden\" name=\"type".$i."\" value=".$arr[$type_i]." />";

                        $capacity_i = "capacity".$i;
                        echo "<input type=\"hidden\" name=\"capacity".$i."\" value=".$arr[$capacity_i]." />";
                        

                        echo "</table>";

                        

                        // submit button to thx.php
                        echo "<input type=\"submit\" class=\"btn-success\" name=\"step3\" value=\"SAVE ALL & FINISH\"/>";
                        // close tag

                        echo "</div>";      
                        
                     }
                     echo "<input type=\"hidden\" name=\"roomscount\" value=".$rcount." />";
                     echo "</div>";
               // 217
               ?>
                 </div>
                </form>
            </div>

                                                         <!--div class="col-md-6">
                                                             <div class="tabs">
                                                                 <ul class="nav nav-tabs">

                                                                     <li class="active"><a href="#tab-4" data-toggle="tab">Вкладка 1</a></li>
                                                                     <li><a href="#tab-5" data-toggle="tab">Вкладка 2</a></li>
                                                                     <li><a href="#tab-6" data-toggle="tab">Вкладка 3</a></li>

                                                                 </ul>
                                                                 <div class="tab-content">
                                                                     <div class="tab-pane active" id="tab-4">
                                                                         <p>first paragraf</p>
                                                                     </div>
                                                                     <div class="tab-pane" id="tab-5">
                                                                         <p>Second paragraf</p>
                                                                     </div>
                                                                     <div class="tab-pane" id="tab-6">
                                                                         <p>Third paragraf</p>
                                                                     </div>
                                                                 </div>
                                                              </div>
                                                          </div-->
        </div>
    </div>
    <?php elseif ($_POST["step3"] == "SAVE ALL & FINISH"): ?>
        <?php  
            $arr = $_POST;
            $rcount = $_POST["roomscount"];
            $path_to_hostconfig = $_SERVER['DOCUMENT_ROOT']."/scripts/php/hostconfig.php";
            include_once($path_to_hostconfig);
            $path_to_cdbconn = $_SERVER["DOCUMENT_ROOT"]."/scripts/php/CDBConn.php";
            include_once($path_to_cdbconn);

            $my_conn = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123", FALSE);
            $my_conn->connect();
            for ($i = 1; $i <= $rcount; $i++)
            {
               $nazv = "nazv".$i;
               $type_id = "type".$i;
               $capacity = "capacity".$i;
               $price = "price".$i;
               
               $q_insert = "INSERT INTO room (room_name, room_type_id, bed_count, room_rate) VALUES('".$arr[$nazv]."',".$arr[$type_id].",".$arr[$capacity].",".$arr[$price].")";
               $my_conn->run_insert($q_insert);
            }

            $my_conn->close(); 
            header('Refresh: 1; url=thx.php');
         
        ?>
    <?php endif; ?>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../bootstrap/js/bootstrap.js"></script>
</body>
</html>
