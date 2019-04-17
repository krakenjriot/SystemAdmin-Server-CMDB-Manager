<?php
/*
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
			if(isset($_GET['x'])) {
			//##############################################################################################//
			//##############################################################################################//
			//check if email is existing
			include_once 'libs/dbh.inc.php';
			include_once 'func/func.php';
			$reset_pass_hash = mysqli_real_escape_string($conn, $_GET['x']);	
			$email = mysqli_real_escape_string($conn, $_GET['email']);	
			//$email = strtolower($hash);
			
			//echo $reset_pass_hash;
			
			
		    $sql = "SELECT * FROM t_users WHERE reset_pass_hash = '$reset_pass_hash' AND user_email = '$email'; ";
			
			$result = mysqli_query($conn, $sql);
			
			$resultCheck = mysqli_num_rows($result);
			
			
			
				if($resultCheck < 1) {//3
					//header("location: msg.php?val1=Hash Code Verification&val2=Verified not matched!");
					//exit();	
					$verified = 0;	
					
					
				}//
				else if($resultCheck = 1) {//3
					//header("location: msg.php?val1=Hash Code Verification&val2=Verified matched!");
					//exit();					
					$verified = 1;
				}//
			
			}//isset
			//##############################################################################################//
			//##############################################################################################//
			
			
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


    </nav>

    <main role="main" class="container">

			
			
			<?php 		
				//echo "<p> are you sure you want to delete this server <b><em>$fqdn</em></b> from database? </p>";
				//echo "<a href='exec.deleteserver.php?id=$id&fqdn=$fqdn'>Yes</a> / ";			
				//echo "<a href=landingpage1.php?id=$id&fqdn=$fqdn'>No</a>";	
			?>

			
			
				<script type="text/javascript">
				<!-- 
				function newPage(num) {
				var url=new Array();
				url[0]='landingpage1.php';					
				window.location=url[num];``
				}
				// 
				</script>	
					
				<!-------------------------------------------------------------------------------------------------------------------->	
				<!-------------------------------------------------------------------------------------------------------------------->
				<!-------------------------------------------------------------------------------------------------------------------->
				<?php if($verified == 1){ 	?> 
				<form class="form-signin" action="verify_forgot_link_process.php?email=<?php echo $email; ?>" method="post" >
					
					<!------------------------honeypot---------------->
						<input name="honeypot1" type="text" hidden/>
					<!------------------------------------------------>
					
					  <img class="mb-4" src="bootstrap/svg/bootstrap-solid.svg" alt="" width="72" height="72">
					  <h1 class="h3 mb-3 font-weight-normal">Reset Password</h1>
					  <p></p>
					  
					  
					<label for="inputEmail" class="sr-only">Email address</label>
					<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address"  value="<?php echo $email; ?>" disabled>	
					</br>		  
					
					  
					<label for="inputPassword" class="sr-only">New Password</label>
					<input type="password" name="pass2" id="inputPassword" class="form-control" placeholder="New Password" required >


					<label for="inputPassword" class="sr-only">Repeat New Password</label>
					<input type="password" name="pass3" id="inputPassword" class="form-control" placeholder="Repeat New Password" required >
					
					

					
					  
					<button class="btn btn-lg btn-primary btn-block" type="submit" name="resetpass" >Reset Now</button>
					<button class="btn btn-lg btn-primary btn-block" type="button" name="home" onclick="newPage(0) ">Home</button>
					  
					  
					  
					  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
					  
					  <!------------------------honeypot---------------->
						<input name="honeypot2" type="text" hidden/>
					  <!------------------------------------------------>
					  
				</form>	
				<?php }//	?> 
				<!-------------------------------------------------------------------------------------------------------------------->	
				<!-------------------------------------------------------------------------------------------------------------------->
				<!-------------------------------------------------------------------------------------------------------------------->				
				<!-------------------------------------------------------------------------------------------------------------------->	
				<!-------------------------------------------------------------------------------------------------------------------->
				<!-------------------------------------------------------------------------------------------------------------------->
				<?php if($verified == 0){ 	?> 
				<form class="form-signin">
					
					<!------------------------honeypot---------------->
						<input name="honeypot1" type="text" hidden/>
					<!------------------------------------------------>
					
					  <img class="mb-4" src="bootstrap/svg/bootstrap-solid.svg" alt="" width="72" height="72">
					  
					  <h1 class="h3 mb-3 font-weight-normal">Reset Password</h1>
					  <p><em>Sorry your hash/email not found in database!</em></p>

					<button class="btn btn-lg btn-primary btn-block" type="button" name="home" onclick="newPage(0) ">Home</button>
					  
					  
					  
					  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
					  
					  <!------------------------honeypot---------------->
						<input name="honeypot2" type="text" hidden/>
					  <!------------------------------------------------>
					  
				</form>	
				<?php }//	?> 
				<!-------------------------------------------------------------------------------------------------------------------->	
				<!-------------------------------------------------------------------------------------------------------------------->
				<!-------------------------------------------------------------------------------------------------------------------->						
				
				
				

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






	