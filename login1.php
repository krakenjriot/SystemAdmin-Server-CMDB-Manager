<!DOCTYPE html>
<!-- saved from url=(0051)https://getbootstrap.com/docs/4.0/examples/sign-in/ -->
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="./signin/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./signin/signin.css" rel="stylesheet">
	
	
	
<style class="cp-pen-styles"> 

/*
.form-wrapper {
  max-width: 30%;
  min-width: 300px;
  padding: 50px 30px 50px 30px;
  margin: 50px auto;
  background-color: #ffffff;
  border-radius: 5px;
  box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
}
*/

</style>
	
	
  </head>
<body>
<div class="form-wrapper">
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
<!-- flex container -->
<div class="d-flex h-100">
  <!-- login box -->
  <div class="m-auto">
  
    <form class="form-signin" action="incl/login.inc1.php" method="post">

		<!------------------------honeypot---------------->
			<input name="honeypot1" type="text" hidden/>
		<!------------------------------------------------>
	
	  <div class="text-center">
      <img class="rounded float-right" src="0.png" alt="" width="100" height="100">
	  </div>
      <h1 class="h3 mb-3 font-weight-normal">IT Admin</h1><p>Authorized Personnel Only</p>	  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--      
	  <label for="inputEmail" class="sr-only">Email address</label>	  
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name="email">&nbsp;
-->
  <div class="form-group">
    <!--<label for="exampleInputEmail1">Email address</label>-->
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">Email</small>
  </div>
  <div class="form-group">
    <!--<label for="exampleInputPassword1">Password</label>-->
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
	<small id="emailPassword" class="form-text text-muted">Password</small>
  </div>
  
  <!--
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>-->
  


	  
	  <!--
      <label for="inputPassword" class="sr-only">Password</label>	  
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name="password">
	  -->
	  
	  
	  
	  
	  
	  
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
	  
	  <button class="btn btn-outline-success btn-block" type="submit" name="login" >Sign in</button>
	  <a href="register2.php" class="btn btn-outline-success btn-block" role="button">Register</a>
	  <a href="resetpass.php" class="btn btn-outline-success btn-block" role="button">Reset Password</a>&nbsp

      <p class="mt-5 mb-3 text-muted" align="center">--- Wipro Manage Services ---<br>©2019</p>
	  <!------------------------honeypot---------------->
			<input name="honeypot2" type="text" hidden/>
   	  <!------------------------------------------------>
    </form>
	</div>
	</div>	
 </div> 
 

</body></html>