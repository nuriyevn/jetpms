<?php
// in php scripts all pathes should be in such manner
// example  https//jetpms.com/img/loading.gif
// $path = ABSPATH."/img/loading.gif"
// pretty easy, huh?

if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');


$handle = fopen(ABSPATH."/pgsql_password", "r");

if ($handle)
{
   $db_user = fgets($handle);
   $db_pass = fgets($handle);
}
else
{

}
