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
}//isset
###############################################################################
#create random report name
#check if existing
#if existing do loop
#if non-existing exit loop

		#$filename = "test.csv";
		$filenameDirPath = 'batchfile/report/'.$filename; //this is for bulk upload
		#$filenameDirPath = 'upload/'.$filename;
		



#echo "</br>";
#
#echo $new_csv[0]['thostname']."</br>";	
#echo $new_csv[1]['thostname']."</br>";	
#echo $new_csv[2]['thostname']."</br>";	
#echo $new_csv[3]['thostname']."</br>";	
#



//echo $new_csv[1]['hostname'];
//echo " ";
//echo $new_csv[1]['domainname'];

	
		include_once './libs/dbh.inc.php';
		include_once './func/func.php';
		$msg = "No Data Found!";
				
		
		
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
		
		###############################################################################

		//count total rows found in csv
		$csv_file_path = file($filenameDirPath,FILE_SKIP_EMPTY_LINES);
		//echo count($csv_file_path);
		//echo "</br>";
		/////////////////////////////////////////////////
		$csv_row_count = count($csv_file_path);
		//display all

		for($ii = 1; $ii < $csv_row_count;  ++$ii){
			//echo $ii;
			//echo $new_csv[$ii]['thostname']."</br>";
			//////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////		
			//////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////
			$thostname = strtolower($new_csv[$ii]['thostname']);
			$hostfqdn = strtolower($new_csv[$ii]['hostfqdn']);
			$domainname = strtolower($new_csv[$ii]['domainname']);
			$fqdn = strtolower($thostname.".".$domainname);
			$rdpipv4 = strtolower($new_csv[$ii]['rdpipv4']);
			$rdpipv4mac = strtolower($new_csv[$ii]['rdpipv4mac']);
			$defaultgateway = strtolower($new_csv[$ii]['defaultgateway']);
			$dns1 = strtolower($new_csv[$ii]['dns1']);
			$dns2 = strtolower($new_csv[$ii]['dns2']);
			$subnetmask = strtolower($new_csv[$ii]['subnetmask']);
			$machinetype = strtolower($new_csv[$ii]['machinetype']);
			$serialnumber = strtolower($new_csv[$ii]['serialnumber']);
			$model = strtolower($new_csv[$ii]['model']);
			$osname = strtolower($new_csv[$ii]['osname']);
			$totalphysicalmemorymb = strtolower($new_csv[$ii]['totalphysicalmemorymb']);
			$cpuname = strtolower($new_csv[$ii]['cpuname']);
			$cpumanufacturer = strtolower($new_csv[$ii]['cpumanufacturer']);
			$cpuclockspeed = strtolower($new_csv[$ii]['cpuclockspeed']);
			$cpunumberofcore = strtolower($new_csv[$ii]['cpunumberofcore']);
			$cpunumberoflogicalprocessor = strtolower($new_csv[$ii]['cpunumberoflogicalprocessor']);
			$installeddate = strtolower($new_csv[$ii]['installeddate']);
			
			$drivea = strtolower($new_csv[$ii]['drivea']);
			$driveb = strtolower($new_csv[$ii]['driveb']);
			$drivec = strtolower($new_csv[$ii]['drivec']);
			$drived = strtolower($new_csv[$ii]['drived']);
			$drivee = strtolower($new_csv[$ii]['drivee']);
			$drivef = strtolower($new_csv[$ii]['drivef']);
			$driveg = strtolower($new_csv[$ii]['driveg']);
			$driveh = strtolower($new_csv[$ii]['driveh']);
			$drivei = strtolower($new_csv[$ii]['drivei']);
			$drivej = strtolower($new_csv[$ii]['drivej']);
			$drivek = strtolower($new_csv[$ii]['drivek']);
			$drivel = strtolower($new_csv[$ii]['drivel']);
			$drivem = strtolower($new_csv[$ii]['drivem']);
			$driven = strtolower($new_csv[$ii]['driven']);
			$driveo = strtolower($new_csv[$ii]['driveo']);
			$drivep = strtolower($new_csv[$ii]['drivep']);
			$driveq = strtolower($new_csv[$ii]['driveq']);
			$driver = strtolower($new_csv[$ii]['driver']);
			$drives = strtolower($new_csv[$ii]['drives']);
			$drivet = strtolower($new_csv[$ii]['drivet']);
			$driveu = strtolower($new_csv[$ii]['driveu']);
			$drivev = strtolower($new_csv[$ii]['drivev']);
			$drivew = strtolower($new_csv[$ii]['drivew']);
			$drivex = strtolower($new_csv[$ii]['drivex']);
			$drivey = strtolower($new_csv[$ii]['drivey']);
			$drivez = strtolower($new_csv[$ii]['drivez']);			
			
			//check if fqdn is existing in the database
			//if existing then update records
			//if not existing then add record
		
				
			$sql = "SELECT * FROM tbl_machine WHERE fqdn ='$fqdn'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			//echo $resultCheck;
			//1 means existing
			//0 means non-existing
			if($resultCheck < 1) {
				
				//insert data				
				$sql = "INSERT INTO tbl_machine ( ";
				if(!empty($fqdn) $sql += "fqdn"; 				
				if(!empty($thostname) $sql += ",thostname"; 				
				if(!empty($domainname) $sql += ",domainname"; 				
				if(!empty($hostfqdn) $sql += ",hostfqdn"; 				
				if(!empty($rdpipv4) $sql += ",rdpipv4"; 				
				if(!empty($rdpipv4mac) $sql += ",rdpipv4mac"; 				
				if(!empty($defaultgateway) $sql += ",defaultgateway"; 				
				if(!empty($dns1) $sql += ",dns1"; 				
				if(!empty($dns2) $sql += ",dns2"; 				
				if(!empty($subnetmask) $sql += ",subnetmask"; 				
				if(!empty($machinetype) $sql += ",machinetype"; 				
				if(!empty($serialnumber) $sql += ",serialnumber"; 				
				if(!empty($thostname) $sql += ",model"; 				
				if(!empty($thostname) $sql += ",osname"; 				
				if(!empty($thostname) $sql += ",totalphysicalmemorymb"; 				
				if(!empty($thostname) $sql += ",cpuname"; 				
				if(!empty($thostname) $sql += ",cpumanufacturer"; 				
				if(!empty($thostname) $sql += ",cpuclockspeed"; 				
				if(!empty($thostname) $sql += ",cpunumberofcore"; 				
				if(!empty($thostname) $sql += ",cpunumberoflogicalprocessor"; 				
				if(!empty($thostname) $sql += ",installeddate"; 				
				if(!empty($thostname) $sql += ",drivea"; 				
				if(!empty($thostname) $sql += ",driveb"; 				
				if(!empty($thostname) $sql += ",drivec"; 				
				if(!empty($thostname) $sql += ",drived"; 				
				if(!empty($thostname) $sql += ",drivee"; 				
				if(!empty($thostname) $sql += ",drivef"; 				
				if(!empty($thostname) $sql += ",driveg"; 				
				if(!empty($thostname) $sql += ",driveh"; 				
				if(!empty($thostname) $sql += ",drivei"; 				
				if(!empty($thostname) $sql += ",drivej"; 				
				if(!empty($thostname) $sql += ",drivek"; 				
				if(!empty($thostname) $sql += ",drivel"; 				
				if(!empty($thostname) $sql += ",drivem"; 				
				if(!empty($thostname) $sql += ",driven"; 				
				if(!empty($thostname) $sql += ",driveo"; 				
				if(!empty($thostname) $sql += ",drivep"; 				
				if(!empty($thostname) $sql += ",driveq"; 				
				if(!empty($thostname) $sql += ",driver"; 				
				if(!empty($thostname) $sql += ",drives"; 				
				if(!empty($thostname) $sql += ",drivet"; 				
				if(!empty($thostname) $sql += ",driveu"; 				
				if(!empty($thostname) $sql += ",drivev"; 				
				if(!empty($thostname) $sql += ",drivew"; 				
				if(!empty($thostname) $sql += ",drivex"; 				
				if(!empty($thostname) $sql += ",drivey"; 				
				if(!empty($thostname) $sql += ",drivez"; 
				
				$sql += " ) VALUE ( ";			
						
				if(!empty($thostname) $sql += "'".$fqdn."'"; 			
				if(!empty($thostname) $sql += ",'".$thostname."'"; 			
				if(!empty($thostname) $sql += ",'".$domainname."'"; 			
				if(!empty($thostname) $sql += ",'".$hostfqdn."'"; 			
				if(!empty($thostname) $sql += ",'".$rdpipv4."'"; 			
				if(!empty($thostname) $sql += ",'".$rdpipv4mac."'"; 			
				if(!empty($thostname) $sql += ",'".$defaultgateway."'"; 			
				if(!empty($thostname) $sql += ",'".$dns1."'"; 			
				if(!empty($thostname) $sql += ",'".$dns2."'"; 			
				if(!empty($thostname) $sql += ",'".$subnetmask."'"; 			
				if(!empty($thostname) $sql += ",'".$machinetype."'"; 			
				if(!empty($thostname) $sql += ",'".$serialnumber."'"; 			
				if(!empty($thostname) $sql += ",'".$model."'"; 			
				if(!empty($thostname) $sql += ",'".$osname."'"; 			
				if(!empty($thostname) $sql += ",'".$totalphysicalmemorymb."'"; 			
				if(!empty($thostname) $sql += ",'".$cpuname."'"; 			
				if(!empty($thostname) $sql += ",'".$cpumanufacturer."'"; 			
				if(!empty($thostname) $sql += ",'".$cpuclockspeed."'"; 			
				if(!empty($thostname) $sql += ",'".$cpunumberofcore."'"; 			
				if(!empty($thostname) $sql += ",'".$cpunumberoflogicalprocessor."'"; 			
				if(!empty($thostname) $sql += ",'".$installeddate."'"; 			
				if(!empty($thostname) $sql += ",'".$drivea."'"; 			
				if(!empty($thostname) $sql += ",'".$driveb."'"; 			
				if(!empty($thostname) $sql += ",'".$drivec."'"; 			
				if(!empty($thostname) $sql += ",'".$drived."'"; 			
				if(!empty($thostname) $sql += ",'".$drivee."'"; 			
				if(!empty($thostname) $sql += ",'".$drivef."'"; 			
				if(!empty($thostname) $sql += ",'".$driveg."'"; 			
				if(!empty($thostname) $sql += ",'".$driveh."'"; 			
				if(!empty($thostname) $sql += ",'".$drivei."'"; 			
				if(!empty($thostname) $sql += ",'".$drivej."'"; 			
				if(!empty($thostname) $sql += ",'".$drivek."'"; 			
				if(!empty($thostname) $sql += ",'".$drivel."'"; 			
				if(!empty($thostname) $sql += ",'".$drivem."'"; 			
				if(!empty($thostname) $sql += ",'".$driven."'"; 			
				if(!empty($thostname) $sql += ",'".$driveo."'"; 			
				if(!empty($thostname) $sql += ",'".$drivep."'"; 			
				if(!empty($thostname) $sql += ",'".$driveq."'"; 			
				if(!empty($thostname) $sql += ",'".$driver."'"; 			
				if(!empty($thostname) $sql += ",'".$drives."'"; 			
				if(!empty($thostname) $sql += ",'".$drivet."'"; 			
				if(!empty($thostname) $sql += ",'".$driveu."'"; 			
				if(!empty($thostname) $sql += ",'".$drivev."'"; 			
				if(!empty($thostname) $sql += ",'".$drivew."'"; 			
				if(!empty($thostname) $sql += ",'".$drivex."'"; 			
				if(!empty($thostname) $sql += ",'".$drivey."'"; 			
				if(!empty($thostname) $sql += ",'".$drivez."'"; 	
				$sql += " )";	//close the sql statement
				
				$result = mysqli_query($conn, $sql);
				//echo $result;
				$msg = "record has been successfully created!";
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
				$msg = "record has been successfully updated!";
			}
			//////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////		
			//////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////
		}//for	
		
		//delete csv file after upload		
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

	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

	


  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="landingpage1.php">Testastika Console v1.0</a>
	  
	  
	  <!--
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Script <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
			  <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>		
      </div>
	  -->
    </nav>

  </br></br>
    <main role="main" class="container">



	<!---------------------------------------------------------------------------------------------->
		<section id="container" >

			<!--main content start-->
			<section id="main-content" style="margin-left: 0px;">
				<section class="wrapper">

			
			
					<?php 
						echo $msg;
						
					?>
			
			
			
				

				</section>
				<! --/wrapper -->
			</section><!-- /MAIN CONTENT -->

			<!--main content end-->

		</section>

	<!---------------------------------------------------------------------------------------------->




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



    <script src="bootstrap/js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"> </script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>