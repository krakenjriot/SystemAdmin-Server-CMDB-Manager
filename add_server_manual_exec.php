<?php




		//*************************************************
		if(isset($_GET['domain_suffix'])) {
			$domainname = $_GET['domain_suffix'];
		}
		
		if(isset($_GET['hostname'])) {
			$thostname = $_GET['hostname'];
		}	
		//*************************************************
		
		
		//*************************************************
		if(isset($_GET['hostname']) && isset($_GET['domain_suffix'])) {
			$fqdn = $_GET['hostname'].'.'.$_GET['domain_suffix'];
		}		
		//*************************************************
		//if(isset($_POST['hostname'])) { //get it from GET
		//	$thostname = $_GET['hostname'];
		//}
		//*************************************************
		//if(isset($_POST['domainname'])) { //get it from GET
		//	$domainname = $_POST['domainname'];
		//}	
		//*************************************************
		if(isset($_POST['hostfqdn'])) {
			$hostfqdn = $_POST['hostfqdn'];
		}
		//*************************************************
		if(isset($_POST['rdpipv4'])) {
			$rdpipv4 = $_POST['rdpipv4'];
		}
		//*************************************************
		if(isset($_POST['rdpipv4mac'])) {
			$rdpipv4mac = $_POST['rdpipv4mac'];
		}	
		//*************************************************
		if(isset($_POST['defaultgateway'])) {
			$defaultgateway = $_POST['defaultgateway'];
		}
		//*************************************************		
		if(isset($_POST['dns1'])) {
			$dns1 = $_POST['dns1'];
		}
		//*************************************************
		if(isset($_POST['dns2'])) {
			$dns2 = $_POST['dns2'];
		}	
		//*************************************************
		if(isset($_POST['subnetmask'])) {
			$subnetmask = $_POST['subnetmask'];
		}
		//*************************************************		
		if(isset($_POST['machinetype'])) {
			$machinetype = $_POST['machinetype'];
		}
		//*************************************************
		if(isset($_POST['serialnumber'])) {
			$serialnumber = $_POST['serialnumber'];
		}	
		//*************************************************
		if(isset($_POST['model'])) {
			$model = $_POST['model'];
		}
		//*************************************************
		if(isset($_POST['osname'])) {
			$osname = $_POST['osname'];
		}
		//*************************************************
		if(isset($_POST['totalphysicalmemorymb'])) {
			$totalphysicalmemorymb = $_POST['totalphysicalmemorymb'];
		}	
		//*************************************************
		if(isset($_POST['cpuname'])) {
			$cpuname = $_POST['cpuname'];
		}
		//*************************************************
		if(isset($_POST['cpumanufacturer'])) {
			$cpumanufacturer = $_POST['cpumanufacturer'];
		}
		//*************************************************
		if(isset($_POST['cpuclockspeed'])) {
			$cpuclockspeed = $_POST['cpuclockspeed'];
		}
		//*************************************************
		if(isset($_POST['cpunumberofcore'])) {
			$cpunumberofcore = $_POST['cpunumberofcore'];
		}
		//*************************************************
		if(isset($_POST['cpunumberoflogicalprocessor'])) {
			$cpunumberoflogicalprocessor = $_POST['cpunumberoflogicalprocessor'];
		}
		//*************************************************
		if(isset($_POST['installeddate'])) {
			$installeddate = $_POST['installeddate'];
		}
		//*************************************************
		if(isset($_POST['drivec'])) {
			$drivec = $_POST['drivec'];
		}
		//*************************************************
		//*************************************************
		
		
		/////////////////////////////////////////////////////////////			
		/////////////////////////////////////////////////////////////			
		/////////////////////////////////////////////////////////////	
		include_once 'libs/dbh.inc.php';
		include_once 'func/func.php';			
		$fqdn = $hostname.".".$domain_suffix;
		//$sql = "SELECT * FROM tbl_machine WHERE fqdn ='$fqdn'";	
		//$sql = "UPDATE tbl_machine SET role_name='$rolename',role_function='$rolefunction',role_owners='$roleowners' WHERE fqdn='$fqdn'; ";
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
				
				//if(!empty($role_name)) $sql .= ",role_name"; 
				//if(!empty($role_function)) $sql .= ",role_function"; 
				//if(!empty($role_descriptions)) $sql .= ",role_descriptions"; 
				//if(!empty($role_owners)) $sql .= ",role_owners"; 
								
				//if(!empty($drivea)) $sql .= ",drivea"; 				
				//if(!empty($driveb)) $sql .= ",driveb"; 				
				if(!empty($drivec)) $sql .= ",drivec"; 				
				//if(!empty($drived)) $sql .= ",drived"; 				
				//if(!empty($drivee)) $sql .= ",drivee"; 				
				//if(!empty($drivef)) $sql .= ",drivef"; 				
				//if(!empty($driveg)) $sql .= ",driveg"; 				
				//if(!empty($driveh)) $sql .= ",driveh"; 				
				//if(!empty($drivei)) $sql .= ",drivei"; 				
				//if(!empty($drivej)) $sql .= ",drivej"; 				
				//if(!empty($drivek)) $sql .= ",drivek"; 				
				//if(!empty($drivel)) $sql .= ",drivel"; 				
				//if(!empty($drivem)) $sql .= ",drivem"; 				
				//if(!empty($driven)) $sql .= ",driven"; 				
				//if(!empty($driveo)) $sql .= ",driveo"; 				
				//if(!empty($drivep)) $sql .= ",drivep"; 				
				//if(!empty($driveq)) $sql .= ",driveq"; 				
				//if(!empty($driver)) $sql .= ",driver"; 				
				//if(!empty($drives)) $sql .= ",drives"; 				
				//if(!empty($drivet)) $sql .= ",drivet"; 				
				//if(!empty($driveu)) $sql .= ",driveu"; 				
				//if(!empty($drivev)) $sql .= ",drivev"; 				
				//if(!empty($drivew)) $sql .= ",drivew"; 				
				//if(!empty($drivex)) $sql .= ",drivex"; 				
				//if(!empty($drivey)) $sql .= ",drivey"; 				
				//if(!empty($drivez)) $sql .= ",drivez"; 				
		
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
				
				//if(!empty($role_name)) $sql .= ",'".$role_name."'"; 
				//if(!empty($role_function)) $sql .= ",'".$role_function."'"; 
				//if(!empty($role_descriptions)) $sql .= ",'".$role_descriptions."'"; 
				//if(!empty($role_owners)) $sql .= ",'".$role_owners."'"; 
				
				//if(!empty($drivea)) $sql .= ",'".$drivea."'"; 			
				//if(!empty($driveb)) $sql .= ",'".$driveb."'"; 			
				if(!empty($drivec)) $sql .= ",'".$drivec."'"; 			
				//if(!empty($drived)) $sql .= ",'".$drived."'"; 			
				//if(!empty($drivee)) $sql .= ",'".$drivee."'"; 			
				//if(!empty($drivef)) $sql .= ",'".$drivef."'"; 			
				//if(!empty($driveg)) $sql .= ",'".$driveg."'"; 			
				//if(!empty($driveh)) $sql .= ",'".$driveh."'"; 			
				//if(!empty($drivei)) $sql .= ",'".$drivei."'"; 			
				//if(!empty($drivej)) $sql .= ",'".$drivej."'"; 			
				//if(!empty($drivek)) $sql .= ",'".$drivek."'"; 			
				//if(!empty($drivel)) $sql .= ",'".$drivel."'"; 			
				//if(!empty($drivem)) $sql .= ",'".$drivem."'"; 			
				//if(!empty($driven)) $sql .= ",'".$driven."'"; 			
				//if(!empty($driveo)) $sql .= ",'".$driveo."'"; 			
				//if(!empty($drivep)) $sql .= ",'".$drivep."'"; 			
				//if(!empty($driveq)) $sql .= ",'".$driveq."'"; 			
				//if(!empty($driver)) $sql .= ",'".$driver."'"; 			
				//if(!empty($drives)) $sql .= ",'".$drives."'"; 			
				//if(!empty($drivet)) $sql .= ",'".$drivet."'"; 			
				//if(!empty($driveu)) $sql .= ",'".$driveu."'"; 			
				//if(!empty($drivev)) $sql .= ",'".$drivev."'"; 			
				//if(!empty($drivew)) $sql .= ",'".$drivew."'"; 			
				//if(!empty($drivex)) $sql .= ",'".$drivex."'"; 			
				//if(!empty($drivey)) $sql .= ",'".$drivey."'"; 			
				//if(!empty($drivez)) $sql .= ",'".$drivez."'"; 	
				
				if(!empty($BU)) $sql .= ",'".$BU."'"; 	
				if(!empty($ENV)) $sql .= ",'".$ENV."'"; 	
				
				if(!empty($PRIORITY)) $sql .= ",'".$PRIORITY."'"; 	
				if(!empty($SEVERITY)) $sql .= ",'".$SEVERITY."'"; 	
				
				
				$sql .= " )";	//close the sql statement
				//echo $sql;
				$result = mysqli_query($conn, $sql);
				//echo $result;
				$msg = "record has been successfully created!";
		
		
		
		
		
		$result = mysqli_query($conn, $sql);
		//$resultCheck = mysqli_num_rows($result);
		
		if($result){
			header("location: serverdet.php?id=0&query=".$hostname."&domain_suffix=".$domain_suffix);
			exit();
		} else {
			//header("location: msg.php?val1=Update Failed&val2=Update Success");
			//exit();
		}			
		
		?>