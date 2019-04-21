<?php
/*******************************************/
//initialize session
/*
set_time_limit (600);
session_start();

if(!isset($_SESSION['u_email'])) {
  header("location: login1.php?header=Session&msg=\"Please Login\"");
  exit();
}
$hostname = $_SESSION['u_hostname'];
$u_id  = $_SESSION['u_id'];
$u_email  = $_SESSION['u_email'];
*/
/*******************************************/
?>




<!doctype html>
<html lang="en">
  <head>
	<META charset="utf-8">
	<META content="IE=11.0000" http-equiv="X-UA-Compatible">
    <META name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Kraken Ball</title>

    <!-- Bootstrap core CSS -->
    <link href="xbootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="xbootstrap/css/starter-template.css" rel="stylesheet">



	<!-- Bootstrap core CSS -->
    <link href="bootstrap4/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap4/dist/css/signin.css" rel="stylesheet">

























  </head>

  <body>





			<?php



			//$hash = GenRandomString_50();
			//$reset_link = "resetpass.exec.now.php?h=$hash";




			if(isset($_POST['resetpass'])) {
			//##############################################################################################//
			//##############################################################################################//
			//check if email is existing
			include_once 'libs/dbh.inc.php';
			include_once 'func/func.php';
			$email = mysqli_real_escape_string($conn, $_POST["email"]);
			$email = strtolower($email);
		    $sql = "SELECT * FROM t_users WHERE user_email='$email'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

				if($resultCheck < 1) {//3
				  //if not existing show an error and button home
				  header("location:msg.php?val1=$email&val2=account does not exist!");
				  exit();
				} else {

					$hash = GenRandomString_50();
					//echo $hash;

					//update reset_pass_hash

					$sql = "UPDATE t_users
							SET reset_pass_hash='$hash'
							WHERE user_email='$email';";

					$result = mysqli_query($conn, $sql);
					//header("location:msg.php?val1=$email&val2=reset link has been sent to email, please check now!");


					//send link
					$link = "http://verify_reset_link.php?x=".$hash;

					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\sendResetLink.bat '.$email.' '.$hash.' ');



				}



			}//isset
			//##############################################################################################//
			//##############################################################################################//







			//if existing
				//generate hash
				//save to database
				//send email link to user with hash value
				//show login page button







			?>



<div class="form-wrapper">
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
<!-- flex container -->
<div class="d-flex h-100">
  <!-- login box -->
  <div class="m-auto">
				<form class="form-signin">

					<!------------------------honeypot---------------->
						<input name="honeypot1" type="text" hidden/>
					<!------------------------------------------------>

					  <img class="mb-4" src="bootstrap/svg/bootstrap-solid.svg" alt="" width="72" height="72">
					  <h1 class="h3 mb-3 font-weight-normal">Reset Password Success</h1>
					  <p><em>Your reset link has been successfully sent to your email!</em></p>

				
	  <a href="login1.php" class="btn btn-outline-success btn-block" role="button">Login Now</a>&nbsp

      <p class="mt-5 mb-3 text-muted" align="center">--- Wipro Manage Services ---<br>©2019</p>




					  <!------------------------honeypot---------------->
						<input name="honeypot2" type="text" hidden/>
					  <!------------------------------------------------>

				</form>
				</div></div></div>


						<!---------------------------------------------------------------------------------------------->
						<!-- place JS scripts at end of page for faster load times -->
							<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
							<script src="assets/js/bootstrap.min.js"></script>
							<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
							<!--script for this page-->
							<script type="text/javascript" src="scripts/triggers.js"></script>
						<!---------------------------------------------------------------------------------------------->

					    <!-- Bootstrap core JavaScript
					    ================================================== -->
					    <!-- Placed at the end of the document so the pages load faster -->



					    <script src="bootstrap/js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
					    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
					    <script src="bootstrap/js/popper.min.js"></script>
					    <script src="bootstrap/js/bootstrap.min.js"></script>
					  </body>
					</html>
