<?php 

$dbconnect_script = $_SERVER['DOCUMENT_ROOT'];
$dbconnect_script .= "/scripts/php/connect_to_database.php";


include_once($dbconnect_script);


$dbconn = connect_to_database();

$query = "SELECT * FROM room";


$result = pg_query($query)
or
die("Illegal query:".pg_last_error());

echo "<table>\n";

while ($line = pg_fetch_array($result, null, PG_SQL_ASSOC))
{
   echo "<tr>";
   foreach ($line as $col_value) 
   {
      echo "<td>$col_value</td>";
   }
   echo "</tr>";
}

echo "</table>\n";


pg_free_result($result);
pg_close($dbconn);


?>
