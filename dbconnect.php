<?php 
define("hostname","localhost");
define("username","root");
define("password","");
define("dbname","smartcity");
?>
<?php
$dbhandle = mysql_connect(hostname,username,password) 
  or die("Unable to connect to MySQL");

//select database
$db_select=mysql_select_db('smartcity')
 or	die("Database selection failed: ");

?>