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
if(isset($_GET['filename'])){
	$filename  = $_GET['filename'];
	$fqdn  = $_GET['fqdn'];
}//isset
###############################################################################
#create random report name
#check if existing
#if existing do loop
#if non-existing exit loop
$filenameDirPath = './batchfile/report/'.$filename;
#$filenameDirPath = './batchfile/report/'.$filename;
###############################################################################

//echo $filenameDirPath;
/******************************************************************/
/******************************************************************/
/*******read the csv file and store it to php variables************/
$csv = array();

if (FALSE !== $handle = fopen($filenameDirPath, "r")){
  while (FALSE !== $row = fgetcsv($handle)){
 	$csv[] = $row;
	}
}

/******************************************************************/
$new_csv = array();
foreach ($csv as $row){
  $new_row = array();
  for ($i = 0, $n = count($csv[0]); $i < $n; ++$i){
    $new_row[$csv[0][$i]] = $row[$i];
  }
  $new_csv[] = $new_row;
}

			$thostname = strtolower($new_csv[1]['thostname']);
			$hostfqdn = strtolower($new_csv[1]['hostfqdn']);
			$domainname = strtolower($new_csv[1]['domainname']);
			$fqdn = strtolower($thostname.".".$domainname);
			$rdpipv4 = strtolower($new_csv[1]['rdpipv4']);
			$rdpipv4mac = strtolower($new_csv[1]['rdpipv4mac']);
			$defaultgateway = strtolower($new_csv[1]['defaultgateway']);
			$dns1 = strtolower($new_csv[1]['dns1']);
			$dns2 = strtolower($new_csv[1]['dns2']);
			$subnetmask = strtolower($new_csv[1]['subnetmask']);
			$machinetype = strtolower($new_csv[1]['machinetype']);
			$serialnumber = strtolower($new_csv[1]['serialnumber']);
			$model = strtolower($new_csv[1]['model']);
			$osname = strtolower($new_csv[1]['osname']);
			$totalphysicalmemorymb = strtolower($new_csv[1]['totalphysicalmemorymb']);
			$cpuname = strtolower($new_csv[1]['cpuname']);
			$cpumanufacturer = strtolower($new_csv[1]['cpumanufacturer']);
			$cpuclockspeed = strtolower($new_csv[1]['cpuclockspeed']);
			$cpunumberofcore = strtolower($new_csv[1]['cpunumberofcore']);
			$cpunumberoflogicalprocessor = strtolower($new_csv[1]['cpunumberoflogicalprocessor']);
			$installeddate = strtolower($new_csv[1]['installeddate']);
			
			$drivea = strtolower($new_csv[1]['drivea']);
			$driveb = strtolower($new_csv[1]['driveb']);
			$drivec = strtolower($new_csv[1]['drivec']);
			$drived = strtolower($new_csv[1]['drived']);
			$drivee = strtolower($new_csv[1]['drivee']);
			$drivef = strtolower($new_csv[1]['drivef']);
			$driveg = strtolower($new_csv[1]['driveg']);
			$driveh = strtolower($new_csv[1]['driveh']);
			$drivei = strtolower($new_csv[1]['drivei']);
			$drivej = strtolower($new_csv[1]['drivej']);
			$drivek = strtolower($new_csv[1]['drivek']);
			$drivel = strtolower($new_csv[1]['drivel']);
			$drivem = strtolower($new_csv[1]['drivem']);
			$driven = strtolower($new_csv[1]['driven']);
			$driveo = strtolower($new_csv[1]['driveo']);
			$drivep = strtolower($new_csv[1]['drivep']);
			$driveq = strtolower($new_csv[1]['driveq']);
			$driver = strtolower($new_csv[1]['driver']);
			$drives = strtolower($new_csv[1]['drives']);
			$drivet = strtolower($new_csv[1]['drivet']);
			$driveu = strtolower($new_csv[1]['driveu']);
			$drivev = strtolower($new_csv[1]['drivev']);
			$drivew = strtolower($new_csv[1]['drivew']);
			$drivex = strtolower($new_csv[1]['drivex']);
			$drivey = strtolower($new_csv[1]['drivey']);
			$drivez = strtolower($new_csv[1]['drivez']);


//echo $fqdn;



//check if fqdn is existing in the database
//if existing then update records
//if not existing then add record
include_once './libs/dbh.inc.php';
include_once './func/func.php';

$sql = "SELECT * FROM tbl_machine WHERE fqdn ='$fqdn'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

//echo $resultCheck;
//1 means existing
//0 means non-existing
  if($resultCheck < 1) {
		//insert data
		//$sql = "INSERT INTO tbl_machine (user_first, user_last, user_email, user_pwd) VALUE ('$firstname','$lastname','$email','$hashedpwd'); ";
				$sql = "INSERT INTO tbl_machine (fqdn,thostname,domainname,hostfqdn,rdpipv4,rdpipv4mac,defaultgateway,dns1,dns2,subnetmask,machinetype,serialnumber,
				model,osname,totalphysicalmemorymb,cpuname,cpumanufacturer,cpuclockspeed,cpunumberofcore,cpunumberoflogicalprocessor,
				installeddate,drivea,driveb,drivec,drived,drivee,drivef,driveg,driveh,drivei,drivej,drivek,drivel,drivem,driven,driveo,drivep,driveq,driver,
				drives,drivet,driveu,drivev,drivew,drivex,drivey,drivez
				) VALUE ('$fqdn','$thostname','$domainname','$hostfqdn','$rdpipv4','$rdpipv4mac','$defaultgateway','$dns1','$dns2','$subnetmask','$machinetype','$serialnumber','$model','$osname','$totalphysicalmemorymb','$cpuname','$cpumanufacturer','$cpuclockspeed','$cpunumberofcore','$cpunumberoflogicalprocessor','$installeddate','$drivea','$driveb','$drivec','$drived','$drivee','$drivef','$driveg','$driveh','$drivei','$drivej','$drivek','$drivel','$drivem','$driven','$driveo','$drivep','$driveq','$driver','$drives','$drivet','$driveu','$drivev','$drivew','$drivex','$drivey','$drivez');";
				$result = mysqli_query($conn, $sql);
		//echo $result;
		$msg = "$fqdn record has been successfully created!";
	}
	else {
		//update data
				$sql = "UPDATE tbl_machine SET thostname='$thostname',domainname='$domainname',hostfqdn='$hostfqdn',
				rdpipv4='$rdpipv4',rdpipv4mac='$rdpipv4mac',defaultgateway='$defaultgateway',dns1='$dns1',
				dns2='$dns2',subnetmask='$subnetmask',machinetype='$machinetype',serialnumber='$serialnumber',model='$model',osname='$osname',
				totalphysicalmemorymb='$totalphysicalmemorymb',cpuname='$cpuname',cpumanufacturer='$cpumanufacturer',
				cpuclockspeed='$cpuclockspeed',cpunumberofcore='$cpunumberofcore',
				cpunumberoflogicalprocessor='$cpunumberoflogicalprocessor',installeddate='$installeddate',drivea='$drivea',driveb='$driveb',drivec='$drivec',drived='$drived',drivee='$drivee',drivef='$drivef',driveg='$driveg',driveh='$driveh',drivei='$drivei',drivej='$drivej',drivek='$drivek',drivel='$drivel',drivem='$drivem',driven='$driven',
				driveo='$driveo',drivep='$drivep',driveq='$driveq',driver='$driver',drives='$drives',drivet='$drivet',driveu='$driveu',drivev='$drivev',drivew='$drivew',drivex='$drivex',drivey='$drivey',drivez='$drivez' WHERE fqdn='$fqdn';";

		$result = mysqli_query($conn, $sql);
		//echo $result;
		$msg = "$fqdn record has been successfully updated!";
	}
/******************************************************************/
/******************************************************************/

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

	  
	  
	<div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
	  <ul class="navbar-nav">
		<li class="nav-item">		  
		  <a href="javascript:window.close();" class="btn btn-outline-success btn-danger" role="button">Close</a></br>
		</li>
	  </ul>
	</div>	  
    </nav>

    <main role="main" class="container">

				<?php echo "<p>$msg</p>"; ?>

	








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
