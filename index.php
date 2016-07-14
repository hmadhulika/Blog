<?php
include "connection.php";

function redirect($url) 
{ 
    die('<meta http-equiv="refresh" content="0;URL='.$url.'">'); 
}
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
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

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Simple Blog</h1>
                        <hr class="small">    
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <?php
		$sql = "SELECT COUNT(*) FROM blog_entries";
		$result = mysql_query($sql) or trigger_error("SQL", E_USER_ERROR);
		$r = mysql_fetch_row($result);
		$numrows = $r[0];
		
		// number of rows to show per page
		$rowsperpage = 4;
		// find out total pages
		$totalpages = ceil($numrows / $rowsperpage);
		
		// get the current page or set a default
		if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
		   // cast var as int
		   $currentpage = (int) $_GET['currentpage'];
		} else {
		   // default page num
		   $currentpage = 1;
		} // end if
		
		// if current page is greater than total pages...
		if ($currentpage > $totalpages) {
		   // set current page to last page
		   $currentpage = $totalpages;
		} // end if
		// if current page is less than first page...
		if ($currentpage < 1) {
		   // set current page to first page
		   $currentpage = 1;
		} // end if
		
		// the offset of the list, based on current page 
		$offset = ($currentpage - 1) * $rowsperpage;

	?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php
				$sql = "SELECT * FROM blog_entries order by date LIMIT $offset, $rowsperpage";
					$result = mysql_query($sql) or trigger_error("SQL", E_USER_ERROR);
						while ($list = mysql_fetch_assoc($result)) {
						
			?>
                <div class="post-preview">
                    <a href="post_inter?id=<?php  echo $list['e_id'];?>">
                        <h2 class="post-title">
                            <?php
								echo $list['title'] . "<br />";
							?>
                        </h2>
                    </a>
                    <p class="post-meta">
					<?php
                    	echo $list['author']. "<br />";
						echo $list['date']. "<br />";
						
						}		
					?>
                    </p>
                </div>
                <hr>
        </div>
    </div>

    <hr>
    <?php
		$range = 0;

	// if not on page 1, don't show back links
	if ($currentpage > 1) {
	   // show << link to go back to page 1
	   //echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
	   // get previous page num
	   $prevpage = $currentpage - 1; ?>
       <ul class="pager">
                    <li class="previous">
                        <?php
	   					 echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'>Previous</a> "; ?>
                    </li>
                </ul>
       <?php
	   // show < link to go back to 1 page
	  
	} // end if 
	
	// loop to show links to range of pages around current page
	for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
	   // if it's a valid page number...
	   if (($x > 0) && ($x <= $totalpages)) {
		  // if we're on current page...
		  if ($x == $currentpage) {
			 // 'highlight' it but don't make a link
			 //echo " [<b>$x</b>] ";
		  // if not current page...
		  } else {
			 // make it a link
	   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
		  } // end else
	   } // end if 
	} // end for
	
	// if not on last page, show forward and last page links    
	if ($currentpage != $totalpages) {
	   // get next page
	   $nextpage = $currentpage + 1;
		// echo forward link for next page 
		?>
        <ul class="pager">
                    <li class="next">
                        <?php
	   					echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>Next</a> "; ?>
                    </li>
                </ul>
        <?php
	   // echo forward link for lastpage
	   //echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
	} // end if
	/****** end build pagination links ******/
	?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>
