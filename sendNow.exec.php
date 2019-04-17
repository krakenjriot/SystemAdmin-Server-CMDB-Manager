<?php
/*******************************************/
//initialize session

set_time_limit (600);
session_start();

if(!isset($_SESSION['u_email'])) {
  header("location: login1.php?header=Session&msg=\"Please Login\"");
  exit();
}
$hostname = $_SESSION['u_hostname'];
$u_id  = $_SESSION['u_id'];
$u_email  = $_SESSION['u_email'];
/*******************************************/
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Kraken Ball</title>



    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/starter-template.css" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>




  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="landingpage1.php">Testastika Console v1.0</a>


    </nav>

  </br></br>
    <main role="main" class="container">
	<a href="javascript:window.close();">(Close Window)</a></br></br>


	<!---------------------------------------------------------------------------------------------->
		<section id="container" >

			<!--main content start-->
			<section id="main-content" style="margin-left: 0px;">
				<section class="wrapper">


			<?php
        $email = $_POST['email'];
        $filename = $_GET['filename'];
		$fqdn = $_GET['fqdn'];
        

        echo "<p>Sent To: $email</p>";
        echo "<p>Filename: $filename</p>";


        $output = shell_exec('C:\xampp\htdocs\kraken\batchfile\sendNow.bat '.$email.' '.$filename.' '.$fqdn.' '.$u_email.'');



        /*
        require_once('mailer\class.smtp.php');
        require_once('mailer\class.phpmailer.php');

        //----------------------------------------------
        // Send an e-mail. Returns true if successful
        //
        //   $to - destination
        //   $nameto - destination name
        //   $subject - e-mail subject
        //   $message - HTML e-mail body
        //   altmess - text alternative for HTML.
        //----------------------------------------------
        function sendmail($to,$nameto,$subject,$message,$altmess)  {

        $from  = "rolly@nwc.com.sa";
        $namefrom = "rolly";
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();   // by SMTP
        $mail->SMTPAuth   = true;   // user and password
        $mail->Host       = "smtp.nwc.com.sa";
        $mail->Port       = 25;
        $mail->Username   = $from;
        $mail->Password   = "Azsx1234567890";
        $mail->SMTPSecure = "";    // options: 'ssl', 'tls' , ''
        $mail->setFrom($from,$namefrom);   // From (origin)
        $mail->addCC($from,$namefrom);      // There is also addBCC
        $mail->Subject  = $subject;
        $mail->AltBody  = $altmess;
        $mail->Body = $message;
        $mail->isHTML();   // Set HTML type
        //$mail->addAttachment("attachment");
        $mail->addAddress($to, $nameto);
        return $mail->send();
      }


      $stat = sendmail($email, 'joey', 'test email', 'this is my message', 'alt message');
      echo "send email stat: $stat";
      */
      ?>

	  <!--<a href="landingpage1.php?<?php echo "fqdn=$fqdn"; ?>">Home</a>-->
		
		<p>
		<!--Testastika <a href="#">Console v1.0</a>-->
		</p>

				</section>
				<! --/wrapper -->
			</section><!-- /MAIN CONTENT -->

			<!--main content end-->

		</section>

	<!---------------------------------------------------------------------------------------------->




    </main><!-- /.container -->

	<!---------------------------------------------------------------------------------------------->
	<!-- place JS scripts at end of page for faster load times -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
		<!--script for this page-->
		<script type="text/javascript" src="scripts/triggers.js"></script>
	<!---------------------------------------------------------------------------------------------->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->



    <script src="bootstrap/js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"> </script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
