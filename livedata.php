<?php 
/*******************************************/
//initialize session
set_time_limit (600);
session_start();

if(!isset($_SESSION['u_email'])) {
  header("location: login1.php?header=Session&msg=\"Please Login\"");
  exit();
}
$hostname = $_SESSION['u_hostname'];
$u_id  = $_SESSION['u_id'];
$u_email  = $_SESSION['u_email'];
/*******************************************/
?>
<?php
include_once 'func/func.php';
###############################################################################
if(isset($_GET["urlpage"])){
	$urlpage = $_GET["urlpage"];
	$fqdn = $_GET['fqdn'];
	//$u_email  = $_GET['u_email'];
	$u_email  = "";
}//isset


	//if host needs to be striped from a URL
	preg_match('@^(?:http://)?([^/]+)@i', $fqdn, $matches);
	$host = $matches[1];
	//else make $host your FQDN and skip the above segment
	preg_match("/^(.*?)\.(.*)/", $host, $rest);
	$thostname = $rest[1];
	$domainname = $rest[2];
	$fqdn = $host;
	//echo $thostname.'.'.$domain;

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

//debug...
/*********************************************
if(file_exists($filenameDirPath)){
	echo "file exist for sure       ";
}
else {
	echo "file not exist for sure       ";
}

echo $filename;
echo $filenameDirPath;
//debug...
/*********************************************/

###############################################################################
	$output  = "";

		switch ($urlpage) {
				case "getdetailinventory" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\getdetailinventory.bat '.$thostname.' '.$domainname.' '.$filename);

					/*
					$psPath = 'powershell.exe';
					$psDIR = 'C:\Windows\System32\WindowsPowerShell\v1.0\powershell.exe';
					$psScript = 'C:\xampp\htdocs\kraken\batchfile\getdetailinventory.ps1 -thostname '.$thostname.' -domainname '.$domainname.' -reportname '.$filename.'';
					$runScript = $psDIR. $psScript;
					$runCMD = $psPath." ".$runScript;
					$output= shell_exec($runCMD);
					*/



					break;
				case "getlastbootuptime" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\getlastbootuptime.bat '.$fqdn.'');
					break;
				case "getserialnumber" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\getserialnumber.bat '.$fqdn.'');
					break;
				case "lastuserlogintime" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\lastuserlogintime.bat '.$fqdn.'');
					break;
				case "alluserlogintime" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\alluserlogintime.bat '.$fqdn.'');
					break;
				case "currentloggedusers" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\currentloggedusers.bat '.$fqdn.'');
					break;
				case "getscreenmonitor" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\getscreenmonitor.bat '.$fqdn.'');
					break;
				case "listprogramfilefolder" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\listprogramfilefolder.bat '.$fqdn.'');
					break;
				case "getdiskdetails" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\getdiskdetails.bat '.$fqdn.'');
					break;
				case "unlockaduser" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\unlockaduser.bat '.$fqdn.'');
					break;
				case "diskcleanuptool" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\diskcleanuptool.bat '.$fqdn.'');
					break;
				case "perfv1" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\perfv1.bat '.$fqdn.'');
					break;
				case "gethotfix" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\gethotfix.bat '.$fqdn.'');
					break;
				case "getPrograms" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\getPrograms.bat '.$fqdn.'');
					break;					
				case "getLocalAdmin" :
					$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\getLocalAdmin.bat '.$fqdn.'');
					break;	
				case "sendNow" :
					$output .= shell_exec('C:\xampp\htdocs\kraken\batchfile\sendNow.bat '.$email.' '.$filename);
					break;					
					
					
								
		}//case


	###############################################################################


		###############################################################################

		//logs all transactions
		###############################################################################
		$datetimestamp = date("Y.m.d.s");
		$logcontent = "User: $u_email
		Script Executed: $urlpage.ps1
		DateTimeStamp: $datetimestamp
		Target: $fqdn
		Output: \n\r $output";
		file_put_contents("logs/$urlpage.$u_email.$datetimestamp.log",$logcontent);
		###############################################################################
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
      <a class="navbar-brand" href="#"><?php echo strtoupper($fqdn); ?></a>	
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

	<div class="collapse navbar-collapse" id="navbarCollapse">
	  <ul class="navbar-nav">
		<li class="nav-item">	
			<?php 				
					if($urlpage=="getdetailinventory") {
						echo "<a href='".$filenameDirPath."' class='btn btn-outline-success btn-danger' role='button'>Download</a>&nbsp;&nbsp;";
						echo "<a href='syncData.php?filename=".$filename."&fqdn=".$fqdn."' class='btn btn-outline-success btn-danger' role='button'>Database Import</a>";						
					}	
			?>		  
		</li>
	  </ul>
	</div>		  
	  
	<div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
	  <ul class="navbar-nav">
		<li class="nav-item">		  
		  <a href="javascript:window.close();" class="btn btn-outline-success btn-danger" role="button">Close</a></br>
		</li>
	  </ul>
	</div>	  
    </nav>

    <main role="main" class="container">

          <pre>
					<?php echo "\n\r".$output; ?>
          </pre>
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
