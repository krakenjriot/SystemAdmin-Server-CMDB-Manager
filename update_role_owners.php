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

$access_lvl  = $_SESSION['access_lvl'];
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
<link src='update_role_owners.js'>





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


.focused .form-label {
  -webkit-transform: translateY(-125%);
          transform: translateY(-125%);
  font-size: .75em;
}


.form-label-textarea {
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

.focused .form-label-textarea {
  -webkit-transform: translateY(-125%);
          transform: translateY(-125%);
  font-size: .75em;
}


.form-input {
  position: relative;
  padding: 12px 0px 5px 0;
  width: 100%;
  outline: 0;
  border: 0;
  box-shadow: 0 1px 0 0 #e5e5e5;
  transition: box-shadow 150ms ease-out;
}

.form-input-textarea {
  position: relative;
  padding: 40px 0px 5px 0;
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


.form-button-submit {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.form-button-back {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.form-button-reset {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

</style>
</head><body>
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
  <form action="update_role_owners_exec.php" class="form">
  <label><h4>Update Server Roles</h4></label>
    <div class="form-group">
      <label class="form-label" for="first">Role Name</label>
      <input id="first" class="form-input" type="text" name="rolename"/>
    </div>
    <div class="form-group">
      <label class="form-label" for="last">Role Function</label>
      <input id="last" class="form-input" type="text" name="rolefunction" />
    </div>
    <div class="form-group">
      <label class="form-label-textarea" for="color" >Role Owners</label>
	  <textarea id="textarea" class="form-input-textarea" name="roleowner" placeholder="" style="height:100px"></textarea>
    </div>
    <div class="form-group">
      <!--<label class="form-label" for="color">What is your favorite color?</label>-->
      <input type="submit" class="btn btn-success" value="Submit">
	  <button type="button" class="btn btn-danger">Cancel</button>
	  

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