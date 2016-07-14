<?php 
require_once("connection.php");
function redirect($url) 
{ 
    die('<meta http-equiv="refresh" content="0;URL='.$url.'">'); 
}
?>
<?php
$id = $_GET['did'];
$sql = "DELETE FROM blog_entries ". "WHERE e_id = $id" ;

            $retval = mysql_query( $sql );
            
            if(! $retval )
            {
               die('Could not delete data: ' . mysql_error());
            }
            
            echo "Deleted data successfully\n";
			redirect("dashboard");
?>

