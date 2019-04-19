<?php
/*******************************************/
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

$access_lvl  = $_SESSION['access_lvl'];
?>

<?php 

		//*************************************************
		if(isset($_GET['domain_suffix'])) {
			$domain_suffix = $_GET['domain_suffix'];
		}
		
		if(isset($_GET['hostname'])) {
			$hostname = $_GET['hostname'];
		}	
		
		////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////
		include_once 'libs/dbh.inc.php';
		include_once 'func/func.php';
		
		if(isset($_GET['hostname']) && isset($_GET['domain_suffix'])) $fqdn = $hostname.".".$domain_suffix;
		
		//$sql = "SELECT * FROM tbl_machine WHERE fqdn ='$fqdn'";
		////$sql = "SELECT * FROM tbl_machine WHERE fqdn ='aproscomms701.nwc.com.sa'";
		//$result = mysqli_query($conn, $sql);
		//$resultCheck = mysqli_num_rows($result);		
		//if($row = mysqli_fetch_assoc($result)){
		//	
		//	$rolename = $row['role_name'];
		//	$rolefunction = $row['role_function'];
		//	$roledescriptions = $row['role_descriptions'];
		//	$roleowners = $row['role_owners'];			
		//}					
		/////////////////////////////////////////////////////////////			
		/////////////////////////////////////////////////////////////			
		/////////////////////////////////////////////////////////////	
?>


<!DOCTYPE html><html lang='en' class=''>
<head>

    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Kraken Ball</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/starter-template.css" rel="stylesheet">
  
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
	
	

<!--<script src='https://static.codepen.io/assets/editor/live/console_runner-1df7d3399bdc1f40995a35209755dcfd8c7547da127f6469fd81e5fba982f6af.js'></script><script src='https://static.codepen.io/assets/editor/live/css_reload-5619dc0905a68b2e6298901de54f73cefe4e079f65a75406858d92924b4938bf.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/anon/pen/yrvXLB" />-->
<!--<script src='https://static.codepen.io/assets/editor/live/console_runner-1df7d3399bdc1f40995a35209755dcfd8c7547da127f6469fd81e5fba982f6af.js'></script><script src='https://static.codepen.io/assets/editor/live/css_reload-5619dc0905a68b2e6298901de54f73cefe4e079f65a75406858d92924b4938bf.js'></script><meta charset='UTF-8'><meta name="robots" content="noindex"><link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" /><link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" /><link rel="canonical" href="https://codepen.io/anon/pen/yrvXLB" />-->
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>

<link rel='stylesheet' href='update_role_owners.css'>
<script src='update_role_owners.js'></script>





<style class="cp-pen-styles">body {
  background-color: #f5f5f5;
}

.form-wrapper {
  max-width: 30%;
  min-width: 300px;
  padding: 50px 30px 50px 30px;
  margin: 50px auto;
  background-color: #ffffff;
  border-radius: 5px;
  box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
}

.form-group {
  position: relative;
}
.form-group + .form-group {
  margin-top: 30px;
}

.form-label {
  position: absolute;
  left: 0;
  top: 10px;
  color: #999;
  background-color: #fff;
  z-index: 10;
  transition: font-size 150ms ease-out, -webkit-transform 150ms ease-out;
  transition: transform 150ms ease-out, font-size 150ms ease-out;
  transition: transform 150ms ease-out, font-size 150ms ease-out, -webkit-transform 150ms ease-out;
}


<?php
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		#role_name		
		if(empty($rolename)){
			
			echo '.focused .form-label#rolename {
				-webkit-transform: translateY(-125%);
				transform: translateY(-125%);
				font-size: .75em;
			}';
		}

		if(!empty($rolename)){
			
			echo '.form-label#rolename {
				-webkit-transform: translateY(-125%);
				transform: translateY(-125%);
				font-size: .75em;
			}';
		}
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//	
		#roledescriptionss		
		if(empty($roledescriptions)){
			
			echo '.focused .form-label#roledescriptions {
				-webkit-transform: translateY(-125%);
				transform: translateY(-125%);
				font-size: .75em;
			}';
		}

		if(!empty($roledescriptions)){
			
			echo '.form-label#roledescriptions {
				-webkit-transform: translateY(-125%);
				transform: translateY(-125%);
				font-size: .75em;
			}';
		}
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//			
		#rolefunction		
		if(empty($rolefunction)){
			
			echo '.focused .form-label#rolefunction {
				-webkit-transform: translateY(-125%);
				transform: translateY(-125%);
				font-size: .75em;
			}';
		}

		if(!empty($rolefunction)){
			
			echo '.form-label#rolefunction {
				-webkit-transform: translateY(-125%);
				transform: translateY(-125%);
				font-size: .75em;
			}';
		}
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//	
		#roleowners		
		if(empty($roleowners)){
			
			echo '.focused .form-label#roleowners {
				-webkit-transform: translateY(-125%);
				transform: translateY(-125%);
				font-size: .75em;
			}';
		}

		if(!empty($roleowners)){
			
			echo '.form-label#roleowners {
				-webkit-transform: translateY(-125%);
				transform: translateY(-125%);
				font-size: .75em;
			}';
		}
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//
		//---------------------------------------------------------------//			
?>





/*
.focused .form-label {
  -webkit-transform: translateY(-125%);
          transform: translateY(-125%);
  font-size: .75em;
}
*/




.form-input {
  position: relative;
  padding: 12px 0px 5px 0;
  width: 100%;
  outline: 0;
  border: 0;
  box-shadow: 0 1px 0 0 #e5e5e5;
  transition: box-shadow 150ms ease-out;
}


.form-input:focus {
  box-shadow: 0 2px 0 0 blue;
}

.form-input.filled {
  box-shadow: 0 2px 0 0 lightgreen;
}





<?php


?>

</style>

	<script type="text/javascript">
	function newPage(num) {
	var url=new Array();
	url[0]="<?php echo 'serverdet.php?id=0&query='.$hostname."&domain_suffix=".$domain_suffix; ?>";
	url[1]="forgotpass.php";
	url[2]="resetpass.php";
	window.location=url[num];``
	}
	//
	</script>
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


<div class="form-wrapper">
  <form action="add_server_manual_exec.php?hostname=<?php echo $hostname; ?>&domain_suffix=<?php echo $domain_suffix; ?>" class="form" method="post">
  <label><h4><b>ADD NEW SERVER</b> (<?php echo strtoupper($fqdn); ?>)</h4></label>

  
  <?php //---------------------------------------------------- //?>
  <div class="form-group">
      <label class="form-label" id="hostfqdn" for="first">hostfqdn</label>
      <input id="first" class="form-input" type="text" name="hostfqdn" value="<?php echo strtoupper($hostfqdn); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
  <?php //---------------------------------------------------- //?>
  <div class="form-group">
      <label class="form-label" id="rdpipv4" for="first">rdpipv4</label>
      <input id="first" class="form-input" type="text" name="rdpipv4" value="<?php echo strtoupper($rdpipv4); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
  <div class="form-group">
      <label class="form-label" id="rdpipv4mac" for="first">rdpipv4mac</label>
      <input id="first" class="form-input" type="text" name="rdpipv4mac" value="<?php echo strtoupper($rdpipv4mac); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="defaultgateway" for="first">defaultgateway</label>
      <input id="first" class="form-input" type="text" name="defaultgateway" value="<?php echo strtoupper($defaultgateway); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="dns1" for="first">dns1</label>
      <input id="first" class="form-input" type="text" name="dns1" value="<?php echo strtoupper($dns1); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="dns2" for="first">dns2</label>
      <input id="first" class="form-input" type="text" name="dns2" value="<?php echo strtoupper($dns2); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="subnetmask" for="first">subnetmask</label>
      <input id="first" class="form-input" type="text" name="subnetmask" value="<?php echo strtoupper($subnetmask); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="machinetype" for="first">machinetype</label>
      <input id="first" class="form-input" type="text" name="machinetype" value="<?php echo strtoupper($machinetype); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="serialnumber" for="first">serialnumber</label>
      <input id="first" class="form-input" type="text" name="serialnumber" value="<?php echo strtoupper($serialnumber); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="model" for="first">model</label>
      <input id="first" class="form-input" type="text" name="model" value="<?php echo strtoupper($model); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="osname" for="first">osname</label>
      <input id="first" class="form-input" type="text" name="osname" value="<?php echo strtoupper($osname); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="totalphysicalmemorymb" for="first">totalphysicalmemorymb</label>
      <input id="first" class="form-input" type="text" name="totalphysicalmemorymb" value="<?php echo strtoupper($totalphysicalmemorymb); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="cpuname" for="first">cpuname</label>
      <input id="first" class="form-input" type="text" name="cpuname" value="<?php echo strtoupper($cpuname); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="cpumanufacturer" for="first">cpumanufacturer</label>
      <input id="first" class="form-input" type="text" name="cpumanufacturer" value="<?php echo strtoupper($cpumanufacturer); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="cpuclockspeed" for="first">cpuclockspeed</label>
      <input id="first" class="form-input" type="text" name="cpuclockspeed" value="<?php echo strtoupper($cpuclockspeed); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="cpunumberofcore" for="first">cpunumberofcore</label>
      <input id="first" class="form-input" type="text" name="cpunumberofcore" value="<?php echo strtoupper($cpunumberofcore); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="cpunumberoflogicalprocessor" for="first">cpunumberoflogicalprocessor</label>
      <input id="first" class="form-input" type="text" name="cpunumberoflogicalprocessor" value="<?php echo strtoupper($cpunumberoflogicalprocessor); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="installeddate" for="first">installeddate</label>
      <input id="first" class="form-input" type="text" name="installeddate" value="<?php echo strtoupper($installeddate); ?>"/>
  </div>
  <?php //---------------------------------------------------- //?>
    <div class="form-group">
      <label class="form-label" id="drivec" for="first">drivec</label>
      <input id="first" class="form-input" type="text" name="drivec" value="<?php echo strtoupper($drivec); ?>"/>
  </div>
 
	
	
	
    <div class="form-group">
      <!--<label class="form-label" for="color">What is your favorite color?</label>-->
      <input type="submit" class="btn btn-success" value="Submit">
	  <button type="button" class="btn btn-danger" value="Cancel" name="cancel" onclick="newPage(0)">Cancel</button>
    </div>	
  </form>
</div>
<script src='https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
        <script id="rendered-js">
          $('input').focus(function () {
  $(this).parents('.form-group').addClass('focused');
});

$('input').blur(function () {
  var inputValue = $(this).val();
  if (inputValue == "") {
    $(this).removeClass('filled');
    $(this).parents('.form-group').removeClass('focused');
  } else {
    $(this).addClass('filled');
  }
});
          //# sourceURL=pen.js
        </script>
</body></html>