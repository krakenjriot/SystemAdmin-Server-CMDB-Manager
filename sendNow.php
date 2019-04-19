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

				

			


			<?php 
			//**********************************************************************************************************************************
			//START - CONNECT DB AND PREPARE QUERY
			//**********************************************************************************************************************************
			$domainname = $_GET['domainname'];
			$thostname = $_GET['thostname'];
			$osname = $_GET['osname'];
			
			$fqdn = $thostname.".".$domainname;
			
			$config= array(
				'DB_USERNAME' => 'root',
				'DB_PASSWORD' => '');

			try{
				$conn = new PDO('mysql:host=127.0.0.1;dbname=hwinv', $config['DB_USERNAME'],   $config['DB_PASSWORD']);

				//$statement = $conn->prepare('SELECT * FROM places_visited WHERE email = :email');
				//$statement = $conn->prepare('SELECT * FROM `tbl_servers` WHERE hostname = :hostname');
				
				
				
				//$statement  = $conn->prepare('SELECT tbl_servers.*, tbl_hw.* FROM tbl_hw INNER JOIN tbl_servers ON tbl_hw.sn = tbl_servers.sn WHERE hostname = :hostname');
				$statement = $conn->prepare('SELECT * FROM `tbl_machine` WHERE fqdn = :fqdn');
				

				$statement->execute( array( 'fqdn' => "{$fqdn}" ) );
				$results = $statement->fetch(PDO::FETCH_ASSOC);

				//var_dump($results);

			} catch (PDOException $e) {
					echo 'ERROR'.$e->getMessage();
					return false;
			}
			//**********************************************************************************************************************************
			//CONNECT DB AND PREPARE QUERY >>
			//**********************************************************************************************************************************

			//**********************************************************************************************************************************
			// FORMAT $RESULT >>
			//**********************************************************************************************************************************
				//echo "<br>";
				//echo "&nbsp&nbsp&nbsp";
				
				//echo "<a href='serverdet.php?id=2&query={$fqdn}&'><button class='btn btn-primary'><span class='glyphicon glyphicon-home'>&nbspHome</span></button></a>";
				
	
				echo "<h4>&nbsp&nbsp{$fqdn}</h4>";
				
				

				//echo "<thead><tr><th><h4>&nbsp&nbsp&nbspSERVER DETAILS <a href='#'>(update)</a></h4></th></tr></thead>";
				
				///echo "<table>";
				//echo "<tbody>";
				
				$i=0;
				$num = count($results);
				
				//echo $num;
				
				$csv_file	=  "";
				
				
				//header
				if($num > 1)
				{
				  
					foreach($results as $key => $value) {
						$i++;

						$csv_file	.=  "$key,";				
					}

				}

				$csv_file	.=  "\r\n";


				$i=0;
				$num = count($results);				
				//content
				if($num > 1)
				{
				  
					foreach($results as $key => $value) {
						$i++;

						$csv_file	.=  "$value,";				
					}
					
						$csv_file	.=  "\r\n";
				}	
				
				
				
				
				###############################################################################
				include_once 'func/func.php';
				#create random report name
				#check if existing
				#if existing do loop
				#if non-existing exit loop
				$fileEx  = ".csv";
				do {
					$filename = GenRandomString(13) . $fileEx;
					$filenameDirPath = './batchfile/report/'.$filename;
					//$filenameDirPath = "http://10.48.21.55/kraken/batchfile/report/".$filename;


				} while(file_exists($filenameDirPath));
				###############################################################################


				
				
				
				file_put_contents($filenameDirPath,$csv_file);
				//else echo "<td class='tg-ugh9'>&nbsp&nbsp&nbsp&nbspNO RECORDS FOUND</td>";

				//echo "</tbody>";
				//echo "</table>";
			//**********************************************************************************************************************************
			//END - CONNECT DB AND PREPARE QUERY
			//**********************************************************************************************************************************	
			
			//echo $csv_file;
			//echo "</br>";
			//echo $filenameDirPath;
			//echo "</br>";
				
				
				
				
			?>


			
				<script type="text/javascript">
				<!--->
				function newPage(num) {
				var url=new Array();
				url[0]='landingpage1.php?<?php echo "fqdn=$fqdn"; ?>';	
				url[1]="landingpage1.php?<?php echo "fqdn=$fqdn"; ?>";	
				window.location=url[num];``
				}
				// 		

				</script>	
					<form class="form-signin" action="sendNow.exec.php?<?php echo "filename=$filename&fqdn=$fqdn"; ?>" method="post" >
					
					</br></br>
					-->CSV Raw<--<textarea name="textareaname" cols="40" rows="10">  
					<?php echo $csv_file; ?>
					</textarea>
					
					<a href="<?php echo $filenameDirPath; ?>" >Download CVS</a></br></br>
					
					<!------------------------honeypot---------------->
						<input name="honeypot1" type="text" hidden/>
					<!------------------------------------------------>
					
					  <!--<img class="mb-4" src="bootstrap/svg/bootstrap-solid.svg" alt="" width="72" height="72">-->
					  <!--<h1 class="h3 mb-3 font-weight-normal">Send CSV File To: (Email)</h1>-->
					  <label for="inputEmail" class="sr-only">Email address</label>					  
					  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>					 					  
					  </br>
					  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" >Send Now</button>
					  </br>
					  <a href="javascript:window.close();"><button class="btn btn-lg btn-primary btn-block" type="button" name="register" >Close</button></a>
					  
					  
					  
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


