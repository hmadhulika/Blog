<?php

include("connection.php");
session_start();
function redirect($url) 
{ 
    die('<meta http-equiv="refresh" content="0;URL='.$url.'">'); 
}

$_SESSION['e_id']=$_GET['id'];
echo $_SESSION['e_id'];
if(!isset($_SESSION['e_id']))
{
	header("Location:index");
}
else
{
	redirect("post");
}													
?>