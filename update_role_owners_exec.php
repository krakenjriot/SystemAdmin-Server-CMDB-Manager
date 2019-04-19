<?php




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
		if(isset($_POST['rolename'])) {
			$rolename = $_POST['rolename'];
		}
		
		if(isset($_POST['rolefunction'])) {
			$rolefunction = $_POST['rolefunction'];
		}	

		if(isset($_POST['roleowners'])) {
			$roleowners = $_POST['roleowners'];
		}

		if(isset($_POST['roledescriptions'])) {
			$roledescriptions = $_POST['roledescriptions'];
		}
		
						
		/////////////////////////////////////////////////////////////			
		/////////////////////////////////////////////////////////////			
		/////////////////////////////////////////////////////////////	
		include_once 'libs/dbh.inc.php';
		include_once 'func/func.php';			
		$fqdn = $thostname.".".$domainname;
		//$sql = "SELECT * FROM tbl_machine WHERE fqdn ='$fqdn'";	
		$sql = "UPDATE tbl_machine SET 
		role_name='$rolename',
		role_function='$rolefunction',
		role_descriptions='$roledescriptions',
		role_owners='$roleowners' 
		WHERE fqdn='$fqdn'; ";
		
		$result = mysqli_query($conn, $sql);
		//$resultCheck = mysqli_num_rows($result);
		
		if($result){
			header("location: serverdet.php?id=0&thostname=".$thostname."&domainname=".$domainname."&osname=".$osname);
			exit();
		} else {
			//header("location: msg.php?val1=Update Failed&val2=Update Success");
			//exit();
			echo "error";
		}			
		
		?>