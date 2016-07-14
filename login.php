<?php 
require_once("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="style.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<script type="text/javascript">
	
	$(document).ready(function(){
		$("#login").click(function(){
			
			var action = $("#lg-form").attr('action');
			var form_data = {
				username: $("#username").val(),
				password: $("#password").val(),
				is_ajax: 1
			};
			
			$.ajax({
				type: "POST",
				url: action,
				data: form_data,
				success: function(response)
				{
					if(response == "success")
						$("#lg-form").slideUp('slow', function(){
							$("#message").html('<p class="success">You have logged in successfully!</p><p>Redirecting....</p>');
						});
					else
						$("#message").html('<p class="error">ERROR: Invalid username and/or password.</p>');
				}	
			});
			return false;
		});
	});
	</script>
<title>LOGIN</title>
</head>
<body background="img/home-bg.jpg">
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
			</div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index">Home</a>
                    </li>
                    <li>
                        <a href="login">Login</a>
                    </li>
                    <li>
                        <a href="register">Register</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div class="lg-container">
<center>
  <h2>Login Here</h2></center>
<form id="lg-form" name="lg-form" method="post">
  <div>
    <label for="username">Userename:</label>    
	<input type="text" name="username" id="username" placeholder="username"/>
  </div>
  <div>
    <label for="password">password</label>
     <input type="password" name="password" id="password" placeholder="password" />
  </div>
  <div>
    <input type="submit" name="submit" id="submit" value="Submit" />
  </div>
</form>
<p>
  <?php  
function redirect($url) 
{ 
    die('<meta http-equiv="refresh" content="0;URL='.$url.'">'); 
}

if(isset($_POST['username']))
{
	if(isset($_POST['password']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$qry="select * from users where username='$username' and password='$password' ";		
			$res1=mysql_query($qry);
			if(mysql_num_rows($res1)>0)
				{
					$row=mysql_fetch_array($res1);
					$_SESSION['uid']=$row['user_id'];		
					redirect("dashboard");				
					//print "valid";				
				}	
				else
				{
					$msg="Invalid Username and password";
					print $msg;
				}
			}
		
			
}
?>
</p>
</div>
</body>
</html>