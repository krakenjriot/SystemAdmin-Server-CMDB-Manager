
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
    <link href="bootstrap4/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap4/dist/css/signin.css" rel="stylesheet">


	<script type="text/javascript">
	<!--
	function newPage(num) {
	var url=new Array();
	url[0]="register2.php";
	url[1]="forgotpass.php";
	url[2]="resetpass.php";
	window.location=url[num];``
	}
	//


	</script>



	</head>




	<!------------------------------------------------------------------------------------------------------------------------------->



  </head>

  <body class="text-center" >
    <form class="form-signin" action="incl/login.inc1.php" method="post" >

	<!------------------------honeypot---------------->
        <input name="honeypot1" type="text" hidden/>
    <!------------------------------------------------>

      <img class="mb-4" src="bootstrap/svg/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" >Sign in</button>
	  <button class="btn btn-lg btn-primary btn-block" type="button" name="register" onclick="newPage(0)">Register</button>
	  <button class="btn btn-lg btn-primary btn-block" type="button" name="forgotpass" onclick="newPage(1)">Forgot Password</button>


      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>

	  <!------------------------honeypot---------------->
        <input name="honeypot2" type="text" hidden/>
      <!------------------------------------------------>

    </form>
  </body>
</html>
