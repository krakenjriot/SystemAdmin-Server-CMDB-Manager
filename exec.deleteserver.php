<?php
/*******************************************/
//initialize session
set_time_limit (600);
session_start();

if(!isset($_SESSION['u_email'])) {	
  header("location: login1.php?header=Session&msg=\"Please Login\"");
  exit();
}
if($_SESSION['user_stat']==0) {
  header("location: login1.php?header=Session&msg=\"Account is not Active!\"");
  exit();
}

if($_SESSION['access_lvl']==0) {
  header("location: login1.php?header=Session&msg=\"Access Denied, Please Contact! The Administrator (4169)\"");
  exit();
}
?>

<?php 
$hostname = $_SESSION['u_hostname'];
$u_id  = $_SESSION['u_id'];
$u_email  = $_SESSION['u_email'];
/*******************************************/
?>

<?php 


if(isset($_GET['fqdn'])) {
  //header("location: login1.php?header=Session&msg=\"Please Login\"");
  //exit();
   //$fqdn = $_GET['query'];aproscominv02
   $fqdn = $_GET['fqdn'];
}



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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/starter-template.css" rel="stylesheet">


  </head>

  <body>


    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="landingpage1.php">Testastika Console v1.0</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


    </nav>

    <main role="main" class="container">

			
			
			<?php


			
					include_once 'libs/dbh.inc.php';
					include_once 'func/func.php';

					//$fqdn = mysqli_real_escape_string($conn, $_GET["fqdn"]);


					//$fqdn = strtolower($fqdn);
						//echo $fqdn;

					$sql = "DELETE FROM tbl_machine WHERE fqdn='$fqdn'";
						
						
					if ($conn->query($sql) === TRUE) {
						echo "Record deleted successfully";
					} else {
						echo "Error deleting record: " . $conn->error;
					}

					$conn->close();	






			?>


			</br></br></br>

			<a href="landingpage1.php">Go Back</a>

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
