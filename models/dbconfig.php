<meta charset="utf-8">
<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','RentalCar');

class DB_con
{
 function __construct()
 {
  $conn = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('error connecting to server'.mysql_error());
  mysql_select_db(DB_NAME, $conn) or die('error connecting to database->'.mysql_error());
  mysql_query("SET NAMES UTF8;");
  mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
  mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");
  mysql_query("set character set utf8");


  // $db = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME.";port=3306", DB_USER, DB_PASSWORD);
  // $db->exec("set character set utf8");
  
  // return $db;
 }
}
?>
