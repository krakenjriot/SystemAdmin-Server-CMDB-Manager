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

<?php

$query = "";


?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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


    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Testastika Console v1.0</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>








	       <div class="collapse navbar-collapse" id="navbarsExampleDefault">

		  <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">#<span class="sr-only">(current)</span></a>
          </li>

        </ul>


      </div>



















    </nav>

    <main role="main" class="container">








			</br>

				<script type="text/javascript">
				<!--->
				function newPage(num) {
				var url=new Array();
				url[0]="landingpage1.php";
				window.location=url[num];``
				}
				//

				</script>
					<form class="form-signin" action="resetpass.exec.php" method="post" >

					<!------------------------honeypot---------------->
						<input name="honeypot1" type="text" hidden/>
					<!------------------------------------------------>

					  <img class="mb-4" src="bootstrap/svg/bootstrap-solid.svg" alt="" width="72" height="72">
					  <h1 class="h3 mb-3 font-weight-normal">Reset Password</h1>
					  <label for="inputEmail" class="sr-only">Email address</label>
					  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
					  </br>
					  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" >Send Now</button>
					  <button class="btn btn-lg btn-primary btn-block" type="button" name="home" onclick="newPage(0)">Back</button>



					  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>

					  <!------------------------honeypot---------------->
						<input name="honeypot2" type="text" hidden/>
					  <!------------------------------------------------>

					</form>




					    </main><!-- /.container -->

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
