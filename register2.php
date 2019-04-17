<?php
	session_start();

	if (isset($_SESSION['u_email'])) {
	  header("location: index1.php?header=Session&msg=\"Logged in as ".$_SESSION['u_email']."\"");
	  exit();
	}

	if(isset($_GET["header"])){
		$header = strtoupper($_GET["header"]);
	} 
	else {
		$header = "";
	}

	if(isset($_GET["msg"])){
		$msg = strtoupper($_GET["msg"]);
	} 
	else {
		$msg = "";
	}
 ?>

 
 
 
 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/signin.css" rel="stylesheet">
	
	<script type="text/javascript">
	<!-- 
	function newPage(num) {
	var url=new Array();
	url[0]="login1.php";

	window.location=url[num];``
	}
	// -->
	</script>
	
	
	
  </head>

  <body class="text-center" >
    <form class="form-signin" action="incl/register.inc1.php" method="post" autocomplete="nope">
	
	<!------------------------honeypot---------------->
        <input name="honeypot1" type="text" hidden/>
    <!------------------------------------------------>
	
      <img class="mb-4" src="bootstrap/svg/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Register</h1>
      
	  
	  
	  <label class="sr-only">First Name</label>
      <input type="input" name="firstname"  id="inputFirstName" class="form-control" placeholder="First Name" required autofocus>
	  
	  <label  class="sr-only">Last Name</label>
      <input type="input" name="lastname"  id="inputLastname" class="form-control" placeholder="Last Name" required>

	  <label  for="inputEmail" class="sr-only">Email Address</label>
      <input type="email" name="email"  id="inputEmail" class="form-control" placeholder="Email address" required>
      
	  </br>
	  <label for="inputPassword" class="sr-only">Secret Word</label>
      <input type="password" name="secretword"  id="inputPassword" class="form-control" placeholder="Secret Word" required>
	  
	  
	  </br>
	  <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password1"  id="inputPassword" class="form-control" placeholder="Password" required>
	  
	  

      
	  <label  for="inputPassword" class="sr-only">Repeat Password</label>
      <input type="password" name="password2"  id="inputPassword" class="form-control" placeholder="Repeat Password" required>
	  
	  
	  
	  
	  
	  <!--<div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>-->
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="register" >Register Now</button>
	  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" onclick="newPage(0)" >Login</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
	  
	  <!------------------------honeypot---------------->
        <input name="honeypot1" type="text" hidden/>
      <!------------------------------------------------>
	  
    </form>
  </body>
</html>
