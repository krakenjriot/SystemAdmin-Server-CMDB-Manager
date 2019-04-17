<?php
	
	if(isset($_POST['submit'])){
		$uaccount = $_POST['uaccount'];
		echo $uaccount;
		$output = shell_exec('C:\xampp\htdocs\kraken\batchfile\unlockaduser.bat '.$uaccount.'');		
		echo $output;		
		echo $output;		
	}//

	
	echo "<pre>";
	//echo $output;
	echo "</pre>";
