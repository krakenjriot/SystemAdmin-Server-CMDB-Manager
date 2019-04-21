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
	<META charset="utf-8">
	<META content="IE=11.0000" http-equiv="X-UA-Compatible">
    <META name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Register</title>

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

  <body>
  <div class="form-wrapper">
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
<!-- flex container -->
<div class="d-flex h-100">
  <!-- login box -->
  <div class="m-auto">
    <form class="form-signin" action="incl/register.inc1.php" method="post" autocomplete="nope">
	
	<!------------------------honeypot---------------->
        <input name="honeypot1" type="text" hidden/>
    <!------------------------------------------------>
	
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
	  
<!--	  
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
-->	  

	  
	  <!---------------------------------------------------------------->
	  <div class="text-center">
      <img class="rounded float-right" src="0.png" alt="" width="100" height="100">
	  </div>
      <h1 class="h3 mb-3 font-weight-normal">Register</h1><p>Authorized Personnel Only</p>	  

<!--      
	  <label for="inputEmail" class="sr-only">Email address</label>	  
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="email">&nbsp;
-->
  <div class="form-group">
    <!--<label for="exampleInputEmail1">Email address</label>-->
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email" required autofocus>
    <small id="emailHelp" class="form-text text-muted">Email</small>
  </div>
  <div class="form-group">
    <!--<label for="exampleInputPassword1">Password</label>-->
    <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname">
	<small id="emailPassword" class="form-text text-muted">First Name</small>
  </div>
   <div class="form-group">
    <!--<label for="exampleInputPassword1">Password</label>-->
    <input type="lastname" class="form-control" id="exampleInputPassword1" placeholder="Enter Last Name" name="lastname">
	<small id="emailPassword" class="form-text text-muted">Last Name</small>
  </div>
    <div class="form-group">
    <!--<label for="exampleInputPassword1">Password</label>-->
    <input type="password" class="form-control" id="password1" placeholder="Enter Password" name="password1">
	<small id="emailPassword" class="form-text text-muted">Password</small>
  </div>
    <div class="form-group">
    <!--<label for="exampleInputPassword1">Password</label>-->
    <input type="password" class="form-control" id="password2" placeholder="Repeat Password" name="password2">
	<small id="emailPassword" class="form-text text-muted">Repeat Password</small>
  </div>   

<!---------------------------------------------------------------->


	  
	  
	  
	  <!--<div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>-->
	  <button class="btn btn-outline-success btn-block" type="submit" name="register" >Register Now</button>
	  <a href="login1.php" class="btn btn-outline-success btn-block" role="button">Login</a>

       <p class="mt-5 mb-3 text-muted" align="center">--- Wipro Manage Services ---<br>©2019</p>
	  
	  <!------------------------honeypot---------------->
        <input name="honeypot2" type="text" hidden/>
      <!------------------------------------------------>
	  </div></div></div>
    </form>
  </body>
</html>
