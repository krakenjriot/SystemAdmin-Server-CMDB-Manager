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
	
			if(!empty($new_csv[$ii]['thostname'])) $thostname = strtolower($new_csv[$ii]['thostname']);
			if(!empty($new_csv[$ii]['hostfqdn'])) $hostfqdn = strtolower($new_csv[$ii]['hostfqdn']);
			if(!empty($new_csv[$ii]['domainname'])) $domainname = strtolower($new_csv[$ii]['domainname']);
			if(!empty($thostname) && !empty($domainname)) $fqdn = strtolower($thostname.".".$domainname);
			if(!empty($new_csv[$ii]['rdpipv4'])) $rdpipv4 = strtolower($new_csv[$ii]['rdpipv4']);
			if(!empty($new_csv[$ii]['rdpipv4mac'])) $rdpipv4mac = strtolower($new_csv[$ii]['rdpipv4mac']);
			if(!empty($new_csv[$ii]['defaultgateway'])) $defaultgateway = strtolower($new_csv[$ii]['defaultgateway']);
			if(!empty($new_csv[$ii]['dns1'])) $dns1 = strtolower($new_csv[$ii]['dns1']);
			if(!empty($new_csv[$ii]['dns2'])) $dns2 = strtolower($new_csv[$ii]['dns2']);
			if(!empty($new_csv[$ii]['subnetmask'])) $subnetmask = strtolower($new_csv[$ii]['subnetmask']);
			if(!empty($new_csv[$ii]['machinetype'])) $machinetype = strtolower($new_csv[$ii]['machinetype']);
			if(!empty($new_csv[$ii]['serialnumber'])) $serialnumber = strtolower($new_csv[$ii]['serialnumber']);
			if(!empty($new_csv[$ii]['model'])) $model = strtolower($new_csv[$ii]['model']);
			if(!empty($new_csv[$ii]['osname'])) $osname = strtolower($new_csv[$ii]['osname']);
			if(!empty($new_csv[$ii]['totalphysicalmemorymb'])) $totalphysicalmemorymb = strtolower($new_csv[$ii]['totalphysicalmemorymb']);
			if(!empty($new_csv[$ii]['cpuname'])) $cpuname = strtolower($new_csv[$ii]['cpuname']);
			if(!empty($new_csv[$ii]['cpumanufacturer'])) $cpumanufacturer = strtolower($new_csv[$ii]['cpumanufacturer']);
			if(!empty($new_csv[$ii]['cpuclockspeed'])) $cpuclockspeed = strtolower($new_csv[$ii]['cpuclockspeed']);
			if(!empty($new_csv[$ii]['cpunumberofcore'])) $cpunumberofcore = strtolower($new_csv[$ii]['cpunumberofcore']);
			if(!empty($new_csv[$ii]['cpunumberoflogicalprocessor'])) $cpunumberoflogicalprocessor = strtolower($new_csv[$ii]['cpunumberoflogicalprocessor']);
			if(!empty($new_csv[$ii]['installeddate'])) $installeddate = strtolower($new_csv[$ii]['installeddate']);
			
			if(!empty($new_csv[$ii]['role_name'])) $role_name = strtolower($new_csv[$ii]['role_name']);
			if(!empty($new_csv[$ii]['role_function'])) $role_function = strtolower($new_csv[$ii]['role_function']);
			if(!empty($new_csv[$ii]['role_descriptions'])) $role_descriptions = strtolower($new_csv[$ii]['role_descriptions']);
			if(!empty($new_csv[$ii]['role_owners'])) $role_owners = strtolower($new_csv[$ii]['role_owners']);
			
			if(!empty($new_csv[$ii]['drivea'])) $driveo = strtolower($new_csv[$ii]['drivea']);
			if(!empty($new_csv[$ii]['driveb'])) $driveo = strtolower($new_csv[$ii]['driveb']);
			if(!empty($new_csv[$ii]['drivec'])) $driveo = strtolower($new_csv[$ii]['drivec']);
			if(!empty($new_csv[$ii]['drived'])) $driveo = strtolower($new_csv[$ii]['drived']);
			if(!empty($new_csv[$ii]['drivee'])) $driveo = strtolower($new_csv[$ii]['drivee']);
			if(!empty($new_csv[$ii]['drivef'])) $driveo = strtolower($new_csv[$ii]['drivef']);
			if(!empty($new_csv[$ii]['driveg'])) $driveo = strtolower($new_csv[$ii]['driveg']);
			if(!empty($new_csv[$ii]['driveh'])) $driveo = strtolower($new_csv[$ii]['driveh']);
			if(!empty($new_csv[$ii]['drivei'])) $driveo = strtolower($new_csv[$ii]['drivei']);
			if(!empty($new_csv[$ii]['drivej'])) $driveo = strtolower($new_csv[$ii]['drivej']);
			if(!empty($new_csv[$ii]['drivek'])) $driveo = strtolower($new_csv[$ii]['drivek']);
			if(!empty($new_csv[$ii]['drivel'])) $driveo = strtolower($new_csv[$ii]['drivel']);
			if(!empty($new_csv[$ii]['drivem'])) $driveo = strtolower($new_csv[$ii]['drivem']);
			if(!empty($new_csv[$ii]['driven'])) $driveo = strtolower($new_csv[$ii]['driven']);
			if(!empty($new_csv[$ii]['drivep'])) $driveo = strtolower($new_csv[$ii]['drivep']);
			if(!empty($new_csv[$ii]['driveq'])) $driveo = strtolower($new_csv[$ii]['driveq']);
			if(!empty($new_csv[$ii]['driver'])) $driveo = strtolower($new_csv[$ii]['driver']);
			if(!empty($new_csv[$ii]['drives'])) $driveo = strtolower($new_csv[$ii]['drives']);
			if(!empty($new_csv[$ii]['drivet'])) $driveo = strtolower($new_csv[$ii]['drivet']);
			if(!empty($new_csv[$ii]['driveu'])) $driveo = strtolower($new_csv[$ii]['driveu']);
			if(!empty($new_csv[$ii]['drivev'])) $driveo = strtolower($new_csv[$ii]['drivev']);
			if(!empty($new_csv[$ii]['drivew'])) $driveo = strtolower($new_csv[$ii]['drivew']);
			if(!empty($new_csv[$ii]['drivex'])) $driveo = strtolower($new_csv[$ii]['drivex']);
			if(!empty($new_csv[$ii]['drivey'])) $driveo = strtolower($new_csv[$ii]['drivey']);
			if(!empty($new_csv[$ii]['drivez'])) $driveo = strtolower($new_csv[$ii]['drivez']);
			
			
			if(!empty($new_csv[$ii]['BU'])) $BU = strtolower($new_csv[$ii]['BU']);
			if(!empty($new_csv[$ii]['ENV'])) $ENV = strtolower($new_csv[$ii]['ENV']);
						
			if(!empty($new_csv[$ii]['PRIORITY'])) $PRIORITY = strtolower($new_csv[$ii]['PRIORITY']);
			if(!empty($new_csv[$ii]['SEVERITY'])) $SEVERITY = strtolower($new_csv[$ii]['SEVERITY']);


				
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
				//mandatory that fqdn, thostname, domainname are not empty
				//insert data				
				$sql  = "INSERT INTO tbl_machine ( ";
				$sql .= " fqdn"; //mandatory 				
				if(!empty($thostname)) $sql .= ",thostname"; 				
				if(!empty($domainname)) $sql .= ",domainname"; 				
				if(!empty($hostfqdn)) $sql .= ",hostfqdn"; 				
				if(!empty($rdpipv4)) $sql .= ",rdpipv4"; 				
				if(!empty($rdpipv4mac)) $sql .= ",rdpipv4mac"; 				
				if(!empty($defaultgateway)) $sql .= ",defaultgateway"; 				
				if(!empty($dns1)) $sql .= ",dns1"; 				
				if(!empty($dns2)) $sql .= ",dns2"; 				
				if(!empty($subnetmask)) $sql .= ",subnetmask"; 				
				if(!empty($machinetype)) $sql .= ",machinetype"; 				
				if(!empty($serialnumber)) $sql .= ",serialnumber"; 				
				if(!empty($model)) $sql .= ",model"; 				
				if(!empty($osname)) $sql .= ",osname"; 				
				if(!empty($totalphysicalmemorymb)) $sql .= ",totalphysicalmemorymb"; 				
				if(!empty($cpuname)) $sql .= ",cpuname"; 				
				if(!empty($cpumanufacturer)) $sql .= ",cpumanufacturer"; 				
				if(!empty($cpuclockspeed)) $sql .= ",cpuclockspeed"; 				
				if(!empty($cpunumberofcore)) $sql .= ",cpunumberofcore"; 				
				if(!empty($cpunumberoflogicalprocessor)) $sql .= ",cpunumberoflogicalprocessor"; 				
				if(!empty($installeddate)) $sql .= ",installeddate"; 
				
				if(!empty($role_name)) $sql .= ",role_name"; 
				if(!empty($role_function)) $sql .= ",role_function"; 
				if(!empty($role_descriptions)) $sql .= ",role_descriptions"; 
				if(!empty($role_owners)) $sql .= ",role_owners"; 
								
				if(!empty($drivea)) $sql .= ",drivea"; 				
				if(!empty($driveb)) $sql .= ",driveb"; 				
				if(!empty($drivec)) $sql .= ",drivec"; 				
				if(!empty($drived)) $sql .= ",drived"; 				
				if(!empty($drivee)) $sql .= ",drivee"; 				
				if(!empty($drivef)) $sql .= ",drivef"; 				
				if(!empty($driveg)) $sql .= ",driveg"; 				
				if(!empty($driveh)) $sql .= ",driveh"; 				
				if(!empty($drivei)) $sql .= ",drivei"; 				
				if(!empty($drivej)) $sql .= ",drivej"; 				
				if(!empty($drivek)) $sql .= ",drivek"; 				
				if(!empty($drivel)) $sql .= ",drivel"; 				
				if(!empty($drivem)) $sql .= ",drivem"; 				
				if(!empty($driven)) $sql .= ",driven"; 				
				if(!empty($driveo)) $sql .= ",driveo"; 				
				if(!empty($drivep)) $sql .= ",drivep"; 				
				if(!empty($driveq)) $sql .= ",driveq"; 				
				if(!empty($driver)) $sql .= ",driver"; 				
				if(!empty($drives)) $sql .= ",drives"; 				
				if(!empty($drivet)) $sql .= ",drivet"; 				
				if(!empty($driveu)) $sql .= ",driveu"; 				
				if(!empty($drivev)) $sql .= ",drivev"; 				
				if(!empty($drivew)) $sql .= ",drivew"; 				
				if(!empty($drivex)) $sql .= ",drivex"; 				
				if(!empty($drivey)) $sql .= ",drivey"; 				
				if(!empty($drivez)) $sql .= ",drivez"; 
				
		
				if(!empty($BU)) $sql .= ",BU"; 
				if(!empty($ENV)) $sql .= ",ENV"; 	

				
				if(!empty($PRIORITY)) $sql .= ",PRIORITY"; 				
				if(!empty($SEVERITY)) $sql .= ",SEVERITY"; 				
				
				$sql .= " ) VALUE ( ";				
				
				$sql .= "'".$fqdn."'"; //mandatory			
				if(!empty($thostname)) $sql .= ",'".$thostname."'"; 			
				if(!empty($domainname)) $sql .= ",'".$domainname."'"; 			
				if(!empty($hostfqdn)) $sql .= ",'".$hostfqdn."'"; 			
				if(!empty($rdpipv4)) $sql .= ",'".$rdpipv4."'"; 			
				if(!empty($rdpipv4mac)) $sql .= ",'".$rdpipv4mac."'"; 			
				if(!empty($defaultgateway)) $sql .= ",'".$defaultgateway."'"; 			
				if(!empty($dns1)) $sql .= ",'".$dns1."'"; 			
				if(!empty($dns2)) $sql .= ",'".$dns2."'"; 			
				if(!empty($subnetmask)) $sql .= ",'".$subnetmask."'"; 			
				if(!empty($machinetype)) $sql .= ",'".$machinetype."'"; 			
				if(!empty($serialnumber)) $sql .= ",'".$serialnumber."'"; 			
				if(!empty($model)) $sql .= ",'".$model."'"; 			
				if(!empty($osname)) $sql .= ",'".$osname."'"; 			
				if(!empty($totalphysicalmemorymb)) $sql .= ",'".$totalphysicalmemorymb."'"; 			
				if(!empty($cpuname)) $sql .= ",'".$cpuname."'"; 			
				if(!empty($cpumanufacturer)) $sql .= ",'".$cpumanufacturer."'"; 			
				if(!empty($cpuclockspeed)) $sql .= ",'".$cpuclockspeed."'"; 			
				if(!empty($cpunumberofcore)) $sql .= ",'".$cpunumberofcore."'"; 			
				if(!empty($cpunumberoflogicalprocessor)) $sql .= ",'".$cpunumberoflogicalprocessor."'"; 			
				if(!empty($installeddate)) $sql .= ",'".$installeddate."'"; 
				
				if(!empty($role_name)) $sql .= ",'".$role_name."'"; 
				if(!empty($role_function)) $sql .= ",'".$role_function."'"; 
				if(!empty($role_descriptions)) $sql .= ",'".$role_descriptions."'"; 
				if(!empty($role_owners)) $sql .= ",'".$role_owners."'"; 
				
				if(!empty($drivea)) $sql .= ",'".$drivea."'"; 			
				if(!empty($driveb)) $sql .= ",'".$driveb."'"; 			
				if(!empty($drivec)) $sql .= ",'".$drivec."'"; 			
				if(!empty($drived)) $sql .= ",'".$drived."'"; 			
				if(!empty($drivee)) $sql .= ",'".$drivee."'"; 			
				if(!empty($drivef)) $sql .= ",'".$drivef."'"; 			
				if(!empty($driveg)) $sql .= ",'".$driveg."'"; 			
				if(!empty($driveh)) $sql .= ",'".$driveh."'"; 			
				if(!empty($drivei)) $sql .= ",'".$drivei."'"; 			
				if(!empty($drivej)) $sql .= ",'".$drivej."'"; 			
				if(!empty($drivek)) $sql .= ",'".$drivek."'"; 			
				if(!empty($drivel)) $sql .= ",'".$drivel."'"; 			
				if(!empty($drivem)) $sql .= ",'".$drivem."'"; 			
				if(!empty($driven)) $sql .= ",'".$driven."'"; 			
				if(!empty($driveo)) $sql .= ",'".$driveo."'"; 			
				if(!empty($drivep)) $sql .= ",'".$drivep."'"; 			
				if(!empty($driveq)) $sql .= ",'".$driveq."'"; 			
				if(!empty($driver)) $sql .= ",'".$driver."'"; 			
				if(!empty($drives)) $sql .= ",'".$drives."'"; 			
				if(!empty($drivet)) $sql .= ",'".$drivet."'"; 			
				if(!empty($driveu)) $sql .= ",'".$driveu."'"; 			
				if(!empty($drivev)) $sql .= ",'".$drivev."'"; 			
				if(!empty($drivew)) $sql .= ",'".$drivew."'"; 			
				if(!empty($drivex)) $sql .= ",'".$drivex."'"; 			
				if(!empty($drivey)) $sql .= ",'".$drivey."'"; 			
				if(!empty($drivez)) $sql .= ",'".$drivez."'"; 	
				
				if(!empty($BU)) $sql .= ",'".$BU."'"; 	
				if(!empty($ENV)) $sql .= ",'".$ENV."'"; 	
				
				if(!empty($PRIORITY)) $sql .= ",'".$PRIORITY."'"; 	
				if(!empty($SEVERITY)) $sql .= ",'".$SEVERITY."'"; 	
				

				
				
				$sql .= " )";	//close the sql statement
				//echo $sql;
				$result = mysqli_query($conn, $sql);
				//echo $result;
				$msg = "record has been successfully created!";
			}
			else {
				//update data
				
				$sql  = "UPDATE tbl_machine SET ";
				//$sql .= "fqdn='$fqdn'"; 
				if(!empty($thostname)) $sql .= "thostname='".$thostname."'"; 
				if(!empty($domainname)) $sql .= ",domainname='".$domainname."'"; 
				if(!empty($hostfqdn)) $sql .= ",hostfqdn='".$hostfqdn."'"; 
				if(!empty($rdpipv4)) $sql .= ",rdpipv4='".$rdpipv4."'"; 			
				
				
				if(!empty($rdpipv4mac)) $sql .= ",rdpipv4mac='".$rdpipv4mac."'"; 
				if(!empty($defaultgateway)) $sql .= ",defaultgateway='".$defaultgateway."'"; 
				if(!empty($dns1)) $sql .= ",dns1='".$dns1."'"; 
				if(!empty($dns2)) $sql .= ",dns2='".$dns2."'"; 
				if(!empty($subnetmask)) $sql .= ",subnetmask='".$subnetmask."'"; 
				if(!empty($machinetype)) $sql .= ",machinetype='".$machinetype."'"; 
				if(!empty($serialnumber)) $sql .= ",serialnumber='".$serialnumber."'"; 
				if(!empty($model)) $sql .= ",model='".$model."'"; 
				if(!empty($osname)) $sql .= ",osname='".$osname."'"; 
				if(!empty($totalphysicalmemorymb)) $sql .= ",totalphysicalmemorymb='".$totalphysicalmemorymb."'"; 
				if(!empty($cpuname)) $sql .= ",cpuname='".$cpuname."'"; 
				if(!empty($cpumanufacturer)) $sql .= ",cpumanufacturer='".$cpumanufacturer."'"; 
				
				if(!empty($cpuclockspeed)) $sql .= ",cpuclockspeed='".$cpuclockspeed."'"; 
				if(!empty($cpunumberofcore)) $sql .= ",cpunumberofcore='".$cpunumberofcore."'"; 
				if(!empty($cpunumberoflogicalprocessor)) $sql .= ",cpunumberoflogicalprocessor='".$cpunumberoflogicalprocessor."'"; 
				if(!empty($installeddate)) $sql .= ",installeddate='".$installeddate."'"; 
				
				if(!empty($role_name)) $sql .= ",role_name='".$role_name."'"; 
				if(!empty($role_function)) $sql .= ",role_function='".$role_function."'"; 
				if(!empty($role_descriptions)) $sql .= ",role_descriptions='".$role_descriptions."'"; 
				if(!empty($role_owners)) $sql .= ",role_owners='".$role_owners."'"; 
				
				if(!empty($drivea)) $sql .= ",drivea='".$drivea."'"; 
				if(!empty($driveb)) $sql .= ",driveb='".$driveb."'"; 
				if(!empty($drivec)) $sql .= ",drivec='".$drivec."'"; 
				if(!empty($drived)) $sql .= ",drived='".$drived."'"; 
				if(!empty($drivee)) $sql .= ",drivee='".$drivee."'"; 
				if(!empty($drivef)) $sql .= ",drivef='".$drivef."'"; 
				if(!empty($driveg)) $sql .= ",driveg='".$driveg."'"; 
				if(!empty($driveh)) $sql .= ",driveh='".$driveh."'"; 
				if(!empty($drivei)) $sql .= ",drivei='".$drivei."'"; 
				if(!empty($drivej)) $sql .= ",drivej='".$drivej."'"; 
				if(!empty($drivek)) $sql .= ",drivek='".$drivek."'"; 
				if(!empty($drivel)) $sql .= ",drivel='".$drivel."'"; 
				if(!empty($drivem)) $sql .= ",drivem='".$drivem."'"; 
				if(!empty($driven)) $sql .= ",driven='".$driven."'"; 
				if(!empty($driveo)) $sql .= ",driveo='".$driveo."'"; 
				if(!empty($drivep)) $sql .= ",drivep='".$drivep."'"; 
				if(!empty($driveq)) $sql .= ",driveq='".$driveq."'"; 
				if(!empty($driver)) $sql .= ",driver='".$driver."'"; 
				if(!empty($drives)) $sql .= ",drives='".$drives."'"; 
				if(!empty($drivet)) $sql .= ",drivet='".$drivet."'"; 
				if(!empty($driveu)) $sql .= ",driveu='".$driveu."'"; 
				if(!empty($drivev)) $sql .= ",drivev='".$drivev."'"; 
				if(!empty($drivew)) $sql .= ",drivew='".$drivew."'"; 
				if(!empty($drivex)) $sql .= ",drivex='".$drivex."'"; 
				if(!empty($drivey)) $sql .= ",drivey='".$drivey."'"; 
				if(!empty($drivez)) $sql .= ",drivez='".$drivez."'"; 
				
				
				if(!empty($BU)) $sql .= ",BU='".$BU."'"; 
				if(!empty($ENV)) $sql .= ",ENV='".$ENV."'"; 
				
					
				if(!empty($SEVERITY)) $sql .= ",SEVERITY='".$SEVERITY."'"; 
				if(!empty($PRIORITY)) $sql .= ",PRIORITY='".$PRIORITY."'"; 
				
				
				$sql .= " WHERE fqdn='$fqdn'; ";
						
				$result = mysqli_query($conn, $sql);
				echo "</BR>RESULT".$result;
				$msg = "record has been successfully updated!";
				
				echo "</BR>SQL ".$sql;
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