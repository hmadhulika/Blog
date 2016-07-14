<?php
include "connection.php";
?>
<?php
function redirect($url) 
{ 
    die('<meta http-equiv="refresh" content="0;URL='.$url.'">'); 
}

	if(isset($_POST['username']) && isset($_POST['name']) && isset($_POST['password']) && isset($_POST['password_confirm'])){
		
		if($_POST['password'] == $_POST['password_confirm']){
			
			$name = $_POST['name'];
			$uname = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$cpassword = $_POST['password_confirm'];
	
			$sql = "insert into users (name,username,email,password) values ('$name','$uname','$email','$password')";
			$retval = mysql_query( $sql );
            
            if(! $retval )
            {
               die('Could not enter data: ' . mysql_error());
            }
            
            echo "Entered data successfully\n";
			redirect('login');
			
		}
		else{
			echo "password and confirm password are not matching";
		}
	}
			
?>