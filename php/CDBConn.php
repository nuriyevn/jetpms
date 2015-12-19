<?php 
/*
This library is a wrapper class that manages PGSQL connections. 
Designed and implemented by Nusrat Nuriyev. (c) JetPMS 2015 

*/
$path_to_hostconfig = $_SERVER["DOCUMENT_ROOT"]."/php/hostconfig.php";
include_once($path_to_hostconfig);

//$jet_ip = '62.75.216.31';
//$db_name = 'jetpms';
//$db_user = 'jetuser';

class CDBConn
{

   protected $_host;
   protected $_dbname;
   protected $_user;
   protected $_password;
   protected $_dbconn;
   protected $_query;
   protected $_result;
   protected $_already_free;
   protected $_debug;

public function __construct($host, $dbname, $user, $password, $debug=null)
{
   /*if ($host == "" || $dbname == "" || $user == "" || $password == "")
      echo "One or more parameters were not specified.<br>";
*/

   $this->_host = $host;
   $this->_dbname = $dbname;
   $this->_user = $user;
   $this->_password = $password;
   $this->_dbconn = 0;
   $this->_query = "";
   $this->_result = 0;
   $this->_already_free = TRUE;
   if (null == $debug)
      $this->_debug = FALSE;
   else
      $this->_debug = $debug;



   if ($this->_debug)
   {
      error_reporting(E_ALL);
      ini_set("display_errors", 1);
   }
}

public function turn_on_debug($b)
{
   $this->_debug = $b;
}

public function __destruct()
{
   if ($this->_debug)
      echo "CDBConn is getting destructed<br>";
   $this->free_result();
   $this->close();
}

public function __connect_to_localhost()
{
   return $this->_dbconn = pg_connect("host=localhost dbname=$this->_dbname user=$this->_user password=$this->_password");
}

public function reconnect($new_database, $username=null, $password=null)
{
   $this->close();
   if (null != $username)
      $this->_user = $username;
   if (null != $password)
      $this->_password = $password;

   $this->connect($new_database);
}


// setsebool httpd_can_network_connect_db 1
// In case of lack of permission to connect
public function connect()
{
   if ($this->__connect_to_localhost() == FALSE)
   {
      $this->_dbconn = pg_connect("host=$this->_host dbname=$this->_dbname user=$this->_user password=$this->_password") or die("Cannot connect.".pg_last_error());
      if ($this->_debug)
         echo "DB connected to remote host [$this->_host]<br>";
   }
   else
   {
      if ($this->_debug)  
         echo "DB connected to localhost<br/>";
   }
}

public function getResult()
{
   return $this->_result;
}
public function getQuery()
{
   return $this->_query;
}

public function run_query($query)
{
   if ($this->_debug)
      echo "Following query is going to be executed: '".$query."'<br>";
   $this->free_result();

   $this->_query = $query;
   $this->_result = pg_query($this->_dbconn, $this->_query);
   
   if ($this->_result == FALSE)
   {
      echo "Following query '".$query."' cannot be executed.";
      return FALSE;     
   }
   else
   {
      $this->_already_free = FALSE;
      return TRUE;
   }
}

public function affected_rows()
{
   if ($this->_already_free == FALSE)
      return pg_affected_rows($this->_result);
   else
   {  
      if ($this->_debug == TRUE)
         echo "Result of the query is already free. Can't get number of affected rows.<br/>"; 
      return 0;
   }
}

public function run_select($query)
{
   if ($this->run_query($query))
   {
      $affected_rows_count = pg_affected_rows($this->_result);
      if ($this->_debug)
         echo "Affected rows count: $affected_rows_count"."<br>";
      return $this->put_result_to_html();
   }
}

public function run_insert($query)
{
   if ($this->run_query($query))
   {
      $affected_rows_count = pg_affected_rows($this->_result);
      if ($this->_debug)
         echo "Affected rows count: $affected_rows_count"."<br>";
      return $affected_rows_count;
   }
   return 0; // TODO Assuming that insert returns 0, when no row has been inserted or updated.
}

public function fetch_array()
{
   return pg_fetch_array($this->_result);
}

public function put_result_to_html()
{
   if ($this->_result != FALSE)
   {
      $html = "<table>\n";
      while ($line = pg_fetch_array($this->_result, null, PGSQL_ASSOC))
      {
         $html .= "\t<tr>\n";
         foreach($line as $col_value)
         {
            $html .= "\t\t<td>$col_value</td>\n";
         }
         $html .= "\t</tr>\n";
      }

      $html .= "</table>\n";
      
      return $html;
   }
}

public function free_result()
{
   if ($this->_already_free == FALSE)
   {
      pg_free_result($this->_result);
      $this->_already_free = TRUE;
   }
}

public function close()
{
   $this->free_result();  
   pg_close($this->_dbconn);
}



public function getConn()
{
   return $this->_dbconn;
}

public function printinfo()
{

   echo "Host: $this->_host"."<br>";
   echo "Dbname: $this->_dbname"."<br>";
   echo "User: $this->_user"."<br>";
   echo "Password: $this->_password"."<br>"; 
}

public function show_databases()
{
   return $this->run_select("SELECT datname FROM pg_database WHERE datistemplate = false");
}

public function show_tables()
{
   return $this->run_select("SELECT table_name FROM information_schema.tables WHERE table_schema='public'");
}

public function show_columns($table_name)
{
   return $this->run_select("SELECT * FROM information_schema.columns WHERE table_schema = 'public' AND table_name = '$table_name'");
}

}
/*
$conn = new CDBConn("62.75.216.31", "jetpms", "jetuser", "qwerty123");
$conn->turn_on_debug(TRUE);

$conn->connect();

$conn->printinfo();

$query = "SELECT * FROM room ";

$conn->run_query($query);

echo $conn->put_result_to_html();

$conn->run_select("SELECT * FROM inquiries");

echo $conn->put_result_to_html();

//$conn->close();


$webmail_db = new CDBConn("62.75.216.31", "testdb", "jetuser", "qwerty123");

$webmail_db->turn_on_debug(TRUE);
$webmail_db->connect();
$webmail_db->printinfo();

$webmail_db->run_query("SELECT * FROM testtable");
echo $webmail_db->put_result_to_html();

echo $webmail_db->run_select("SELECT * FROM testtable");

//$webmail_db->run_insert("INSERT INTO testtable ()")
$schema = new CDBConn("62.75.216.31", "jetpms", "postgres", "qwerty123");

$schema->turn_on_debug(TRUE);
$schema->connect();
// Database list
echo $schema->run_select("SELECT datname FROM pg_database WHERE datistemplate = false");
// Table list for connected database
echo $schema->run_select("SELECT table_name FROM information_schema.tables WHERE table_schema='public'");

// Columns list in selected table for connected database
echo $schema->run_select("SELECT * FROM information_schema.columns WHERE table_schema = 'public' AND table_name = 'room'");

// table_catalog, table_schema, table_name, column_name

$test_conn = new CDBConn("62.75.216.31", "jetpms", "jetuser", "qwerty123");

$test_conn->connect();

echo $test_conn->show_databases();

echo $test_conn->show_tables();

echo "Reconnecting to postgres db<br>";

$test_conn->reconnect("postgres", "postgres", "qwerty123");

echo $test_conn->show_databases();
echo $test_conn->show_tables();



$test = new CDBConn($jet_ip, $db_name, $db_user, "qwerty123");
$test->turn_on_debug(TRUE);
$test->connect();

$test->printinfo();
//$test->show_databases();
echo $test->show_tables();
echo $test->show_columns("room");

$result = $test->run_query("SELECT room_name FROM room");

if ($result == TRUE)
{
   echo "RC:".$test->affected_rows()."<br>";
   while ($arr = pg_fetch_array($test->getResult()))
   {
      echo "room_name:".$arr[0]."<br>";
   }
}

$test->close();
*/
?>
