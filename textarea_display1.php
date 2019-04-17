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
      <a class="navbar-brand" href="#">Testastika Console v1.0</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


    </nav>

    <main role="main" class="container">

      <a href="textarea_form1.php">Back</a>
	  </br>
	  <!--<a href="javascript:window.close();">Close Window</a>-->
      </br></br>
<!------------------------------------------------------------------------------------------------------------->		
<!------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------->

<?php 

	###############################################################################	
	#create random report name
	#check if existing
	#if existing loop again
	#if non-existing exit loop	
	include_once 'func/func.php';
	//variable declarations
	$log = "";
	$thostname = "";
	$domainname = "";
	$fqdn = "";	
	$domainValidity = "";	

	/////////////////////////////////////////////////////////////
	//unlink(); delete a file
	/////////////////////////////////////////////////////////////	
	//create random filename
	do {
		$filename = GenRandomString(13) . ".csv";
		$filenameDirPath = './batchfile/report/'.$filename;		
	} while(file_exists($filenameDirPath));		
	
	/////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////
	//create random logname
	do {
		$logname = GenRandomString(13) . ".log";
		$lognameDirPath = './batchfile/report/'.$logname;		
	} while(file_exists($lognameDirPath));	

	//erase contents
	file_put_contents($filenameDirPath, "");	
	file_put_contents($lognameDirPath, "");
	/////////////////////////////////////////////////////////////	
	/////////////////////////////////////////////////////////////
	
	
	$log .= "Data Filename: $filename\r\n";
	$log .= "Log Filename: $logname\r\n";
	$log .= "***************************************************\r\n";
	########################################################################################################################################################
	########################################################################################################################################################
	/////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////
	/// parse textarea
	$text = trim($_POST['textareaname']);		
	$textAr = explode("\n", $text);
	$textAr = array_filter($textAr, 'trim'); // remove any extra \r characters left behind
	/////////////////////////////////////////////////////////////
		
	/////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////
	/// assign to array	
	$value = array();		
	$i = 0;	
	foreach ($textAr as $line) {				
		/////////////////////////////////////////////////////////////
		// convert to lowercase
		$value[$i] = trim(strtolower($line));
		$servername = "Server Name: ".$value[$i];
		$thostname = $value[$i];
		/////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////
		########################################################################################################################################################
		// check if reachable		
		$pingresult = shell_exec('C:\xampp\htdocs\kraken\batchfile\pingme.bat '.$value[$i]);
		if($pingresult==1){
			//echo " $value[$i] server is reachable "; //debug
			//echo $pingresult;//debug	
			$pingResult = "Ping Result: Reachable";

			
		}
		else {
			//do not process and logged it
			//echo " $value[$i] server is un-reachable "; //debug
			//echo $pingresult; //debug
			//update log and skip process
			$pingResult = "Ping Result: Un-Reachable";			
			//break; //skip 
		}
		########################################################################################################################################################
		
		
		
		########################################################################################################################################################		
		/////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////
			//separate host and domain part of the string			
			preg_match('@^(?:http://)?([^/]+)@i', $value[$i], $matches);
			$host = $matches[1];
			//else make $host your FQDN and skip the above segment
			preg_match("/^(.*?)\.(.*)/", $host, $rest);
		
			/////////////////////////////////////////////////////////////
			//check if domain is invalid and skip
			if(!empty($rest[2])){
				$thostname = $rest[1];
				$domainname = $rest[2];
				$fqdn = $host;					
				
				/////////////////////////////////////////////////////////////
				/////////////////////////////////////////////////////////////
				//check if domain is valid
				//echo "the domain name is ".$domainname;
				if($domainname=="nwc.com.sa"){
					//$domainnamestatus = "</b><font color='green'>valid NWC domain</font></b>";
					//$urlip = "http://10.48.21.55";
					$domainStatus = 1;
					$domainValidity = "Ok";
					//file_put_contents($lognameDirPath, PHP_EOL . " $domainname is Valid NWC Domain!\r\n", FILE_APPEND);	
					
					
				}
				elseif($domainname=="dev.hq.nwc"){
					//$domainnamestatus = "</b><font color='green'>valid NWC domain</font></b>";
					//$urlip = "http://10.68.140.55";
					$domainValidity = "Ok";
					$domainStatus = 1;
					
				}
				elseif($domainname=="dmz.nwc"){
					//$domainnamestatus = "</b><font color='green'>valid NWC domain</font></b>";
					//$urlip = "http://10.49.27.55";
					$domainValidity = "Ok";
					$domainStatus =  1;
				}
				elseif($domainname=="pro.hq.nwc"){
					//$domainnamestatus = "</b><font color='green'>valid NWC domain</font></b>";
					//$urlip = "http://10.48.21.55";
					$domainValidity = "Ok";
					$domainStatus= 1;
				}
				else{
					//$domainnamestatus = "</b><font color='red'>invalid domain</font></b>";
					//$error = 1;
					$domainStatus= 0;
					$domainValidity = "Invalid";
					//update log and skip process				
					//break; //skip process
				}
				/////////////////////////////////////////////////////////////

				/////////////////////////////////////////////////////////////
			} else {
				//if domain part is empty execute below
				$domainStatus= 0;
				$domainValidity = "Invalid (empty)";				
			}		
		########################################################################################################################################################		
		
		

		/////////////////////////////////////////////////////////////	

		/////////////////////////////////////////////////////////////
		//process code here
		$output = "";
		if($pingResult== true && $domainStatus == true){
		#	echo "everything is alright!";
			$output .= shell_exec('C:\xampp\htdocs\kraken\batchfile\getdetailinventory1.bat '.$thostname.' '.$domainname.' '.$filename);
			header("location:http://hwinv.nwc.com.sa/kraken/syncData2.php?filename=$filename");
		
		} else {
		#	echo "script failed!";
			$output = "Error";
		}
		
		#$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\getdetailinventory1.bat '.$thostname.' '.$domainname.' '.$filename);
		#header("location:http://hwinv.nwc.com.sa/kraken/syncData2.php?filename=$filename");
		
		/////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////
		//save all msg to variable $log
		$log .= "***************************************************\r\n";
		$log .= "$servername\r\n";
		$log .= "Hostname: $thostname\r\n";
		$log .= "Domain Name: $domainname\r\n";
		$log .= "$pingResult\r\n";
		$log .= "Domain Validity: $domainValidity\r\n";
		$log .= "Domain Status: $domainStatus\r\n";
		$log .= $output;
		/////////////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////			
		
		$i = $i + 1;		
	}//foreach end 
	########################################################################################################################################################
	########################################################################################################################################################
	

			
	
	/////////////////////////////////////////////////////////////	
					//file_put_contents($filenameDirPath, "");	
					file_put_contents($lognameDirPath, $log);
	
					#display log results	
					//echo "<pre>";
					//echo $log;
					//echo "</pre>";
	
	
	
		$msg = 		file_get_contents($lognameDirPath);
	
					echo "<pre>";
					echo $msg;
					echo "</pre>";
	
	//file_put_contents($lognameDirPath, $log, FILE_APPEND);
	
	/*
	echo "2: ".$value[2-1];
	echo "<br>";
	echo "3: ".$value[3-1];
	
	
	//check query if valid fqdn
	//if host needs to be striped from a URL
	preg_match('@^(?:http://)?([^/]+)@i', $query, $matches);
	$host = $matches[1];
	//else make $host your FQDN and skip the above segment
	preg_match("/^(.*?)\.(.*)/", $host, $rest);
	$thostname = $rest[1];
	$domainname = $rest[2];
	$fqdn = $host;
	*/
	
	

?>
<!------------------------------------------------------------------------------------------------------------->		
<!------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------->

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
