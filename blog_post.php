<?php
include "connection.php";
session_start();
function redirect($url) 
{ 
    die('<meta http-equiv="refresh" content="0;URL='.$url.'">'); 
}
?>
<?php
   
	if(isset($_POST['title'])){
			
			$title = $_POST['title'];
			$summary = $_POST['summary'];
			$content = $_POST['content'];
			$author = $_POST['author'];
			//echo $content;
			$uid = $_SESSION['uid'];
			//$date = date("Y-m-d H:i:s");
			//echo $date;
			$sql = "insert into blog_entries(u_id,title,summary,content,date,author)values('$uid','$title','$summary','$content',now(),'$author')";
			$retval = mysql_query( $sql );
            
            if(! $retval )
            {
               die('Could not enter data: ' . mysql_error());
            }
            
            echo "Entered data successfully\n";
			redirect('dashboard');
			
		}
		else{
			echo "Please Give the title to your blog";
		}
		
?>
