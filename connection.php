<?php
//create database connection
require_once("conn.php");
$dbhandle = mysql_connect(hostname,username,password) 
  or die("Unable to connect to MySQL");

//select database
$db_select=mysql_select_db('blog')
 or	die("Database selection failed: ");

?>