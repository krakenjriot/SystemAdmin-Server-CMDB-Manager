<?php




		//*************************************************
		if(isset($_GET['domain_suffix'])) {
			$domain_suffix = $_GET['domain_suffix'];
		}
		
		if(isset($_GET['hostname'])) {
			$hostname = $_GET['hostname'];
		}	
		

		//*************************************************
		if(isset($_POST['rolename'])) {
			$rolename = $_POST['rolename'];
		}
		
		if(isset($_POST['rolefunction'])) {
			$rolefunction = $_POST['rolefunction'];
		}	

		if(isset($_POST['roleowners'])) {
			$roleowners = $_POST['roleowners'];
		}
		include_once 'libs/dbh.inc.php';
		include_once 'func/func.php';
		
						
		/////////////////////////////////////////////////////////////			
		/////////////////////////////////////////////////////////////			
		/////////////////////////////////////////////////////////////	
			
		$fqdn = $hostname.".".$domain_suffix;
		//$sql = "SELECT * FROM tbl_machine WHERE fqdn ='$fqdn'";	
		$sql = "UPDATE tbl_machine SET role_name='$rolename',role_function='$rolefunction',role_owners='$roleowners' WHERE fqdn='$fqdn'; ";
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