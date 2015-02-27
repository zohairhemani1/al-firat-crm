<?php
	ini_set('session.gc_maxlifetime', 31556926);
	session_start();
	include 'headers/connect_to_mysql.php';	
	
	if($_POST)
	{
		
		$user = $_POST['user'];
		$password = $_POST['password'];
		$query = "SELECT * from login where user ='$user' AND password ='$password'"
		or die('error2');
		$result = mysqli_query($con,$query);
		$count = mysqli_num_rows($result);
		$row = mysqli_fetch_assoc($result);

		if($count == 1)
		{


			$emp_id = $row['emp_id'];
			$_SESSION['emp_id'] = $emp_id;
			header ('Location: index.php');						
		
		}

	else{ 	
	
		echo"
			 <div id='alert1' class='alert alert-warning alert-dismissible' role='alert'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  <strong>Error!</strong> The Username or Password you have provide is not valid.
</div>";	
		
	}
			}
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Wahab Jawed">
<link rel="shortcut icon" href="../../assets/ico/favicon.ico">
<title>Login - Al Furat</title>

<!-- Bootstrap core CSS -->
<link href="stylesheet/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="stylesheet/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/style_responsive.css" rel="stylesheet" type="text/css">
<link href="css/style_default.css" rel="stylesheet" type="text/css" id="style_color">

<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<!-- BEGIN BODY -->
<body id="login-body">
<div class="login-header"> 
  <!-- BEGIN LOGO -->
  <div id="logo" class="center"> <img src="img/logo.png" alt="logo" class="center" /> </div>
  <!-- END LOGO --> 
</div>

<!-- BEGIN LOGIN -->
<div id="login"> 
  <!-- BEGIN LOGIN FORM -->
  <form id="loginform" class="form-vertical no-padding no-margin" action="login.php" method="post">
    <div class="lock"> <i class="icon-lock"></i> </div>
    <div class="control-wrap">
      <h4>Login</h4>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend"> <span class="add-on"><i class="icon-user"></i></span>
            <input id="input-username" name="user" type="text" placeholder="Username" />
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <div class="input-prepend"> <span class="add-on"><i class="icon-key"></i></span>
            <input id="input-password" name="password" type="password" placeholder="Password" />
          </div>
          <div style="display:none" class="mtop10">
            <div class="block-hint pull-left small">
              <input  type="checkbox" id="">
              Remember Me </div>
          </div>
          <div class="clearfix space5"></div>
        </div>
      </div>
    </div>
    <input type="submit" id="login-btn" class="btn btn-block login-btn" value="Login" />

  </form>
  <!-- END LOGIN FORM --> 
   <!-- END REGISTER FORM --> 
  
</div>
<!-- END LOGIN --> 
<!-- BEGIN COPYRIGHT -->
<div id="login-copyright"> <a href ="http://www.digitaleggheads.com/">2014-15 &copy; Digital Eggheads.</a> </div>
<!-- END COPYRIGHT --> 
<!-- js placed at the end of the document so the pages load faster --> 
<script src="script/jquery-1.8.3.min.js"></script> 
<script src="stylesheet/bootstrap/js/bootstrap.min.js"></script> 
<script src="script/jquery.blockui.js"></script> 
<script src="script/scripts.js"></script> 
<script>
    jQuery(document).ready(function() {     
      App.initLogin();
    
		
	
	});
	
	
  </script> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster -->

</body>
</html>
