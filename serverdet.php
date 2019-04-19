<?php
/*******************************************/
//([WMI] "").ConvertToDateTime((Get-WmiObject Win32_OperatingSystem -ComputerName AUATGISARC001).InstallDate)
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



	
	$thostname = $_GET['thostname'];	
	//$hostname = $query;
	$id = $_GET['id'];
	$domainname= $_GET['domainname'];
	
	
	
	$osname =  $_GET['osname'];
	
	//echo $osname;
	
	
	$urlip = "10.48.21.55";
	
	////check if ip address
	//if(filter_var($query, FILTER_VALIDATE_IP) !== false) {
	//	//echo "is an ip";
	//	//echo $query." ";
	//	$query = gethostbyaddr($query);
	//	//echo $query;
	//	preg_match('@^(?:http://)?([^/]+)@i', $query, $matches);
	//	$host = $matches[1];
	//	//else make $host your FQDN and skip the above segment
	//	preg_match("/^(.*?)\.(.*)/", $host, $rest);			
	//	if($rest){$query = $rest[1];}
	//	if($rest){$domainname= $rest[2];}		
	//	
	//} else {
	//	//echo "is not an ip";
	//	//if query is string
	//	//check query if valid fqdn
	//	//if host needs to be striped from a URL
	//	preg_match('@^(?:http://)?([^/]+)@i', $query, $matches);
	//	$host = $matches[1];
	//	//else make $host your FQDN and skip the above segment
	//	preg_match("/^(.*?)\.(.*)/", $host, $rest);			
	//	if($rest){$query = $rest[1];}
	//	if($rest){$domainname= $rest[2];}		
	//}
	//
    //
	//
	//	
	//	
	//	/////////////////////////////////////////////////////////////
	//	/////////////////////////////////////////////////////////////
	//	//sleep(100);
	//	$a = "";
	//	$b = "";
	//	$pingresult = 0;
	//	//echo $domainname." ";
	//		if($domainname=="tag_domainname"){
	//			foreach(array('nwc.com.sa','dev.hq.nwc','dmz.nwc') as $a){
	//				$pingresult = shell_exec('C:\xampp\htdocs\hwinv\batchfile\pingme.bat '.$query.'.'.$a);
	//				if($pingresult==1){ 						
	//					$domainname= $a; 							
	//					break; 
	//				}
	//					
	//			}			
	//		}//if
	//		else 
	//		{
	//			//$domainname= "name_cannot_resolve"; 
	//			$pingresult = shell_exec('C:\xampp\htdocs\hwinv\batchfile\pingme.bat '.$query.'.'.$domainname);		
	//		}	
	//		
	//	
	//	
	//if($domainname=="tag_domainname"){
	//	$query = "$query.cannot_resolve";	
	//} else {
	//	$query = "$query.$domainname";		
	//}
	//	
	////echo $query;
	// 
	//switch ($domainname) {
	//		case "nwc.com.sa":
	//			$b = "nwc";
	//			break;
	//		case "dev.hq.nwc":
	//			$b = "dev";
	//			break;					
	//		case "dmz.nwc":
	//			$b = "dmz";
	//			break;
	//		default:															
	//			$b = "xxx";
	//			break;			
	//	} //switch
	//	
	//	
	//	$urlip = "$b.scominv.nwc.com.sa";		
	//	
	// /*
	//switch ($domainname) {
	//		case "nwc.com.sa":
	//			$b = "10.48.21.55";
	//			break;
	//		case "dev.hq.nwc":
	//			$b = "10.68.140.55";
	//			break;					
	//		case "dmz.nwc":
	//			$b = "10.49.27.55";
	//			break;
	//		default:															
	//			$b = "xxx";
	//			break;			
	//	} //switch
	//	
	//	
	//	$urlip = "$b";		
	//	*/
	//	//echo $urlip."</br>";				
	//	
	//	//echo "query=$query | a=$a | b=$b | domainname=$domainname| pingresult=$pingresult</br>"; 
	//
	//#####################################################################################################
	//#####################################################################################################
	//#####################################################################################################
    //
	//#####################################################################################################		
	//
	//
	////$query = $query."nwc.com.sa";
	////$query = $query."nwc.com.sa";
	////$query = $query."nwc.com.sa";
	//
	//
	///*
	////if query does not have a domain suffix process below code
	//if($id=="NA"){//
	//	$query = $query.".nwc.com.sa";				
	//	if(isset($_GET['domainname'])) {///
	//	$domainname= urldecode($_GET['domainname']);
	//	$query = $query.".".$domainname;
	//	}///			
	//}//
	////if query does have a domain suffix process below code
	////
	////
	////
	////
	//
	//
	///* our simple php ping function 
	//$host = "10.48.10.111";
	//function ping($host)
	//{
	//		exec(sprintf('ping -c 1 -W 5 %s', escapeshellarg($host)), $res, $rval);
	//		return $rval === 0;
	//}
	//	
    //
	//$up = ping($host);
    //
	//echo "UP=".$up;	
	//
	////echo $query;
	//*/
	
	////////////////////////////////////////////////////////////////////////////////////////
	//$pingresult = 1;
	//$pingresult = shell_exec('ping -n 1 '.$hostname.'');
	//$pingresult = shell_exec('C:\xampp\htdocs\hwinv\batchfile\pingme.bat '.$query.'');	

	//check if machine is pingable!
	$pingresult = shell_exec('C:\xampp\htdocs\hwinv\batchfile\pingme.bat '.$thostname.'.'.$domainname);	
	$_SESSION['pingresult'] = $pingresult;
	$access_lvl  = $_SESSION['access_lvl'];
	//$ipaddress = $_SESSION['ipaddress'];
	
	
	

	#####################################################################################################
	//check if server is in database, and get the osname same time
	include_once 'libs/dbh.inc.php';
	include_once 'func/func.php';
    $sql = "SELECT * FROM tbl_machine WHERE fqdn='$thostname'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
	$row = mysqli_fetch_assoc($result);		
	#####################################################################################################
	
	
	if($pingresult==0){
		$netstat = "<font color='RED' ><span style='background-color: #FFFF00'>&nbsp;OFFLINE&nbsp;</span></font>";	
		//if($resultCheck){
		//	$osname = strtolower( $row['osname']);
		//} 
		//else {
		//	$osname = "server";
		//}
			
	}
	if($pingresult==1){
		#$netstat = "(</strong><font color='SLATEBLUE' >Online</font></strong>)";	
		$netstat = "<font color='LIME' ><span style='background-color: FORESTGREEN'>&nbsp;ONLINE&nbsp;</span></font>";	
	/////////////////////////////////////////////////////////////////////
		//if($resultCheck){
		//	$osname = strtolower( $row['osname']);
		//}
		//else {
		//	//$osname = shell_exec('C:\xampp\htdocs\hwinv\batchfile\getOSname.bat '.$query.'');
		//} 	
	/////////////////////////////////////////////////////////////////////		
	}


	$server = 0;
	//$_SESSION['osname'] = $osname;
	$osname_lower = strtolower($osname);
	if (fnmatch("*server*",$osname_lower)){
	//	//echo "this is server...$osname_lower";
		$server = 1;	
	}
	
	
	/*	
	////////////////////////////////////////////////////////////////////////////////////////
	// check if $hostname is ip address or string hostname
	if(filter_var($query, FILTER_VALIDATE_IP)) {
	//if the query is ipaddress
	// then convert it to hostname


	//valid ip address so use it directly for ping
	$pingresult = shell_exec('C:\xampp\htdocs\kraken\batchfile\pingme.bat '.$query);

	//convert ip to hostname
	//$query1 = gethostbyaddr($query);
	//if($query=$query2)


	//initialize variable
	$valid_ip_add = 1;
	
	header("location: ip2name.php?query=$query");
	exit();
	
	
	}
	else {

		//if query is string
		//check query if valid fqdn
		//if host needs to be striped from a URL
		preg_match('@^(?:http://)?([^/]+)@i', $query, $matches);
		$host = $matches[1];
		//else make $host your FQDN and skip the above segment
		preg_match("/^(.*?)\.(.*)/", $host, $rest);
		$thostname = $rest[1];
		$domainname = $rest[2];
		$fqdn = $host;
		
		

		//echo $thostname.'.'.$domainname;
		$domainname = strtolower($domainname);
		$error = 0;
		if($domainname=="nwc.com.sa"){
			$domainnamestatus = "</b><font color='green'>valid NWC domain</font></b>";
			$urlip = "http://10.48.21.55";
		}
		elseif($domainname=="dev.hq.nwc"){
			$domainnamestatus = "</b><font color='green'>valid NWC domain</font></b>";
			$urlip = "http://10.68.140.55";
		}
		elseif($domainname=="dmz.nwc"){
			$domainnamestatus = "</b><font color='green'>valid NWC domain</font></b>";
			$urlip = "http://10.49.27.55";
		}
		elseif($domainname=="pro.hq.nwc"){
			$domainnamestatus = "</b><font color='green'>valid NWC domain</font></b>";
			$urlip = "http://10.48.21.55";
		}
		else{
			$domainnamestatus = "</b><font color='red'>invalid domain</font></b>";
			$error = 1;
		}


	$valid_ip_add = 0;
	$pingresult = shell_exec('C:\xampp\htdocs\kraken\batchfile\pingme.bat '.$thostname.'.'.$domainname);
	}
	////////////////////////////////////////////////////////////////////////////////////////
	###########################################################################################
					$rdp_file = "@ECHO OFF

					mstsc.exe /v:$fqdn";

					if($fqdn=="noMachineSelected"){
						$rdp_file = "#";
					}

					$rdp_path = "./rdpfile";
					file_put_contents("$rdp_path/remotepc.$fqdn.bat",$rdp_file);
	###########################################################################################

	//if host needs to be striped from a URL
	preg_match('@^(?:http://)?([^/]+)@i', $query, $matches);
	$host = $matches[1];
	//else make $host your FQDN and skip the above segment
	preg_match("/^(.*?)\.(.*)/", $host, $rest);
	$thostname = $rest[1];
	$domainname = $rest[2];
	$fqdn = $host;
	//echo $thostname.'.'.$domainname;

	if (!filter_var($query, FILTER_VALIDATE_IP)) {
	//echo(" is not a valid IP address");
	$valid_ip_add = 0;
	$pingresult = shell_exec('C:\xampp\htdocs\kraken\batchfile\pingme.bat '.$thostname.'.'.$domainname);
	}


	if(isset($_GET["urlpage"])){
	$urlippage = $_GET["urlpage"];
	$hostname = $_GET['hostname'];
	$u_email  = $_GET['u_email'];
	}//isset


	//echo "ping result: $pingresult";
	if($pingresult==1){
		$status_mgs = "</b><font color='darkgreen'>Reachable</font></b>";
	}
	else{
		$status_mgs = "</b><font color='red'>Unreachable</font></b>";
	}



	if (filter_var($fqdn, FILTER_VALIDATE_DOMAIN)) {
		//if valid domain continue
		$validdomain = 1;
	} else {
		//if not valid domain then add domain
		$validdomain = 0;
	}
*/ //MTPROESMAPS001

	//if(empty($_SESSION['osname'])){
	//	$server = 0;
	//	$osname = shell_exec('C:\xampp\htdocs\hwinv\batchfile\getOSname.bat '.$thostname.'');
	//	$_SESSION['osname'] = $osname;
	//} else {
	//	$osname = $_SESSION['osname'];	
	//}
	//
	//
	//
	//$osname_lower = strtolower($osname);
	//if (fnmatch("*server*",$osname_lower)){
	//	$server = 1;	
	//}
	
	$fqdn = $thostname.".".$domainname;
	###########################################################################################
					$rdp_file = "@ECHO OFF

					mstsc.exe /v:$fqdn";

					if($fqdn=="noMachineSelected"){
						$rdp_file = "#";
					}

					$rdp_path = "./rdpfile";
					file_put_contents("$rdp_path/remotepc.$fqdn.bat",$rdp_file);
	###########################################################################################







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
	<?php
	
		if($access_lvl == 1){
			$tag = "Operator";
		} 

		if($access_lvl > 1){
			$tag = "Admin";
		} 
		
	?>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Testastika Console v1.0 (<?php echo $tag; ?>)</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


    </nav>

    <main role="main" class="container">
			

			<a href="javascript:window.close();">(Close Window)</a></br>
			
			
			<?php
			
							
			include_once("menu.php");
			

	///////////////////////////////////////////////////////	
	///////////////////////////////////////////////////////	
			//if($server==0){//						
			//	//echo "</br>(You are authorized to view this node!)";
			//	//allowed 				
			//	$server_type = "CLIENT";				
			//}	
			//if($server==1){
			////					
			//	$server_type = "SERVER";								
			//}				///////////////////////////////////////////////////////	
	///////////////////////////////////////////////////////	
	///////////////////////////////////////////////////////	
	
			$sdip = gethostbyname($thostname);
			///////////////////////////////////////////
			//if($resultCheck == 1) {echo $xx = "(Database Record Exist)"; }
			//else { echo $xx = "(Database Record Empty!)"; }
			echo "<b>Machine: </b>". strtoupper($thostname);
			echo " / ".strtoupper($osname);
			echo " / $sdip";
			echo " $netstat";
			if($pingresult == 0) echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='add_server_manual.php?thostname=".$thostname."&domainname=".$domainname."&osname=".$osname."'>( Manually Add? )</a>";

			
			
			
			
			
			//echo "</br>Database Record: $resultCheck";
		/////////////////////////////////////////////////////////////
		if($pingresult==0 && $access_lvl==1){	
			
			
			if($server==0){//						
				//echo "</br>(You are authorized to view this node!)";
				//allowed 				
				
				//echo $menu_000;
				if($resultCheck)echo $menu_showdatabaselink;
			}	
			if($server==1){
			//					
				echo "</br><b>View Info: </b>Access Denied";
				
				//echo $menu_000;
			}
			
		}	
		
		
		
		
		////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////
		include_once 'libs/dbh.inc.php';
		include_once 'func/func.php';
		//
		$sql = "SELECT * FROM tbl_machine WHERE fqdn = '".$thostname.".".$domainname."'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);		
		if($row = mysqli_fetch_assoc($result)){
			
			echo "</br><b>ROLE NAME: </b>". strtoupper($row['role_name']);
			echo "<b> / FUNCTION: </b>". strtoupper($row['role_function']); 
			echo "&nbsp;&nbsp;<font color='RED' ><span style='background-color: #FFFF00'>&nbsp;&nbsp;<a href='update_role_owners.php?thostname=".$thostname."&domainname=".$domainname."&osname=".$osname."'>EDIT</a>&nbsp;&nbsp;</span></font>";
			echo "</br><b>ROLE OWNER(S): </b>". strtoupper($row['role_owners']); 
			echo "</br><b>BU: </b>". strtoupper($row['BU']); 
			echo "&nbsp;&nbsp;<b>ENVIRONMENT: </b>". strtoupper($row['ENV']); 
			echo "&nbsp;&nbsp;<b>PRIORITY: </b>". strtoupper($row['PRIORITY']); 
			echo "&nbsp;&nbsp;<b>SEVERITY: </b>". strtoupper($row['SEVERITY']); 			
			echo "&nbsp;&nbsp;<font color='RED' ><span style='background-color: #FFFF00'>&nbsp;&nbsp;<a href='update_other_details.php?thostname=".$thostname."&domainname=".$domainname."&osname=".$osname."'>EDIT</a>&nbsp;&nbsp;</span></font>";
			 
			echo "</br></br>";

		} else {
			//echo "</br><b>Role Name: </b>";
			//echo "<b> / Functions: </b>"; 
			//echo "<font color='RED' ><span style='background-color: #FFFF00'>&nbsp;&nbsp;<a href='#' disabled>EDIT</a>&nbsp;&nbsp;</span></font>";
			//echo "</br><b>Role Owners: </b>"; 			
		}			
		
	
		/////////////////////////////////////////////////////////////			
		/////////////////////////////////////////////////////////////			
		/////////////////////////////////////////////////////////////
		if($pingresult==1 && $access_lvl==1){	
			
			
			if($server==0){//						
				//echo "</br>(You are authorized to view this node!)";
				//allowed 				
				
				//echo $menu_000;
				if($resultCheck)echo $menu_showdata;
				echo $menu_reachable;	
				if($resultCheck)echo $menu_deleterecord;			

			}	
			if($server==1){
			//					
				echo "</br><b>View Info: </b>Access Denied";
				
				//echo $menu_000;
			}	
				
		}	
		////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////


		/////////////////////////////////////////////////////////////
		if($pingresult==0 && $access_lvl>1){	
			
				
			if($server==0){//						
				//echo "</br>(You are authorized to view this node!)";
				//allowed 				
				
				
			}	
			if($server==1){
			//					
				//echo "</br>Warning: You are NOT authorized to view this node!";
				
				
			}	
				//if($resultCheck)echo $menu_showdatabaselink;
				if($resultCheck)echo $menu_showdata;
				//echo $menu_reachable;	
				if($resultCheck)echo $menu_deleterecord;
		}	
		////////////////////////////////////////////////////////////			
		/////////////////////////////////////////////////////////////
		if($pingresult==1 && $access_lvl>1){	
			
			
			if($server==0){//						
				//echo "</br>(You are authorized to view this node!)";
				//allowed 				
								
			}	
			if($server==1){
			//					
				//echo "</br>Warning: You are NOT authorized to view this node!";
				
			}				
			
						
				if($resultCheck)echo $menu_showdata;
				echo $menu_reachable;	
				if($resultCheck)echo $menu_deleterecord;
		}

	
	
			//?>




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
