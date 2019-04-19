<?php

			$BU = $row['BU'];
			$PRIORITY = $row['PRIORITY'];
			$SEVERITY = $row['SEVERITY'];			
			//$firewalled = $row['firewalled'];			
			//$ilo = $row['ilo'];


		//*************************************************
		//*************************************************
		if(isset($_GET['domainname'])) {
			$domainname = $_GET['domainname'];
		}
		
		if(isset($_GET['thostname'])) {
			$thostname = $_GET['thostname'];
		}	
		
		if(isset($_GET['osname'])) {
			$osname = $_GET['osname'];
		}			

		//*************************************************
		if(isset($_POST['BU'])) {
			$BU = $_POST['BU'];
		}//
		
		if(isset($_POST['ENV'])) {
			$ENV = $_POST['ENV'];
		}//
		
		if(isset($_POST['PRIORITY'])) {
			$PRIORITY = $_POST['PRIORITY'];
		}//	

		if(isset($_POST['SEVERITY'])) {
			$SEVERITY = $_POST['SEVERITY'];
		}//

		
						
		/////////////////////////////////////////////////////////////			
		/////////////////////////////////////////////////////////////			
		/////////////////////////////////////////////////////////////	
		include_once 'libs/dbh.inc.php';
		include_once 'func/func.php';			
		$fqdn = $thostname.".".$domainname;
		//$sql = "SELECT * FROM tbl_machine WHERE fqdn ='$fqdn'";	
		$sql = "UPDATE tbl_machine SET BU='$BU',ENV='$ENV',PRIORITY='$PRIORITY',SEVERITY='$SEVERITY' WHERE fqdn='$fqdn'; ";
		$result = mysqli_query($conn, $sql);
		//$resultCheck = mysqli_num_rows($result);
		
		if($result){
			header("location: serverdet.php?id=0&thostname=".$thostname."&domainname=".$domainname."&osname=".$osname);
			exit();
		} else {
			//header("location: msg.php?val1=Update Failed&val2=Update Success");
			//exit();
		}			
		
		?>