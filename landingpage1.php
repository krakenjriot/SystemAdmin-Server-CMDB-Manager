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
?>

<?php

$hostname = $_SESSION['u_hostname'];
$u_id  = $_SESSION['u_id'];
$u_email  = $_SESSION['u_email'];
/*******************************************/
?>

<?php
if(isset($_GET['fqdn'])) {
	$fqdn = $_GET['fqdn'];
} else {
	$fqdn = "";
}
?>


<?php
		//if host needs to be striped from a URL
		preg_match('@^(?:http://)?([^/]+)@i', $u_email, $matches);
		$host = $matches[1];
		//else make $host your FQDN and skip the above segment
		preg_match("/^(.*?)\.(.*)/", $host, $rest);
		$username = $rest[0];
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Testastika v1.0</title>



    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/starter-template.css" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

	<!--
	<script type="text/javascript">
	$(document).ready(function(){
		$('.search-box input[type="text"]').on("keyup input", function(){
			/* Get input value on change */
			var inputVal = $(this).val();
			var resultDropdown = $(this).siblings(".result");
			if(inputVal.length){
				$.get("backend-search.php", {term: inputVal}).done(function(data){
					// Display the returned data in browser
					resultDropdown.html(data);
				});
			} else{
				resultDropdown.empty();
			}
		});

		// Set search input value on click of result item
		$(document).on("click", ".result p", function(){
			$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
			$(this).parent(".result").empty();
		});
	});
	</script>
	-->


		<?php

		//for($i=0; $i<1 ; $i++) echo "<script>window.onload = function(){ document.forms['search'].submit() }</script>";

		?>


		<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="landingpage1.php"><?php echo "Welcome! ".strtoupper($username); ?></a>
	  <!--<a class="navbar-brand" href="landingpage1.php">Testastika Console v1.0</a>-->


      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">

		  <ul class="navbar-nav mr-auto">


			<!--
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>-->

		  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			I/O</a>

			<div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="textarea_form1.php">Bulk Live Query</a>
              <a class="dropdown-item" href="selectCsv.php">Upload CSV</a>
            </div>
          </li>

		  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			MyReports</a>
			<div class="dropdown-menu" aria-labelledby="dropdown03">
              <a class="dropdown-item" href="#">#</a>
            </div>
          </li>

		  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			MyLinks</a>
			<div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="http://hwinv.nwc.com.sa/avayareports" target="_blank">Avaya Reports Console</a>
			  <a class="dropdown-item" href="https://admin.nwc.com.sa/cscp" target="_blank">Skype4Business</a>
			  <a class="dropdown-item" href="https://10.55.30.18:7906/" target="_blank">IRS</a>
			  <a class="dropdown-item" href="https://login.microsoftonline.com/" target="_blank">Office365</a>
			  <a class="dropdown-item" href="https://apropkirca000.nwc.com.sa/certsrv/" target="_blank">PKI#1</a>
			  <a class="dropdown-item" href="https://apropkirca001.nwc.com.sa/certsrv/" target="_blank">PKI#2</a>
			  <a class="dropdown-item" href="https://outlook.nwc.com.sa/ecp/" target="_blank">Exchange ECP (PROD)</a>
			  <a class="dropdown-item" href="https://adevexcmbx001.dev.hq.nwc/ecp/" target="_blank">Exchange ECP (DEV)</a>
			  <a class="dropdown-item" href="http://itsmsupport.nwc.com.sa/SM/index.do?" target="_blank">ITSM</a>
			  <a class="dropdown-item" href="https://aproscomhpov2.nwc.com.sa/#/login" target="_blank">HPOneView (HQ)</a>
			  <a class="dropdown-item" href="https://jproscomhpov1.nwc.com.sa/#/login" target="_blank">HPOneView (JCBU)</a>
			  <a class="dropdown-item" href="https://atacenter.nwc.com.sa/" target="_blank">ATA</a>
            </div>
          </li>

		  		  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Others</a>
			<div class="dropdown-menu" aria-labelledby="dropdown02">
			  <a class="dropdown-item" href="http://www.saponsolaris.com/hp.html" target="_blank">HP Proliant Server Ref#</a>
			  <a class="dropdown-item" href="https://translate.google.com.sa/?um=1&ie=UTF-8&hl=en&client=tw-ob#ar/en/" target="_blank">Google Translator</a>
			  <a class="dropdown-item" href="https://support.hp.com/us-en" target="_blank">HP Customer Support</a>
			  <a class="dropdown-item" href="https://support.hp.com/us-en" target="_blank">HP Check your warranty status (DESKTOP)</a>
			  <a class="dropdown-item" href="http://h20564.www2.hpe.com/hpsc/wc/public/home" target="_blank">HP Check your warranty status (SERVER)</a>
			  <a class="dropdown-item" href="http://h17007.www1.hpe.com/us/en/enterprise/servers/solutions/info-library/index.aspx#.WOIysfmGMdV" target="_blank"></a>
			  <a class="dropdown-item" href="http://h17007.www1.hpe.com/us/en/enterprise/servers/solutions/info-library/index.aspx#.XLR_3ugzYdW" target="_blank">Hewlett Packard Enterprise Information Library</a>
			  <a class="dropdown-item" href="https://mywipro.wipro.com/irj/portal/" target="_blank">Wipro Portal Link</a>
			  <a class="dropdown-item" href="https://outlook.com/owa/wipro.com" target="_blank">Wipro Mail Link</a>
			  <a class="dropdown-item" href="http://www.catalog.update.microsoft.com/Home.aspx" target="_blank">Microsoft®Update Catalog</a>
            </div>
          </li>

		  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			myWipro</a>
			<div class="dropdown-menu" aria-labelledby="dropdown07">
			  <a class="dropdown-item" href="https://mywipro.wipro.com/irj/portal/" target="_blank">Wipro Portal</a>
			  <a class="dropdown-item" href="https://outlook.com/owa/wipro.com" target="_blank">Wipro Mail</a>			 
            </div>
          </li>		  
		  
		  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			File Mngt.</a>

			<div class="dropdown-menu" aria-labelledby="dropdown09">
              <a class="dropdown-item" href="#">Version Control</a>
              <a class="dropdown-item" href="#">UploadCopy</a>
            </div>
          </li>


		  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Account Mngt.</a>

			<div class="dropdown-menu" aria-labelledby="dropdown10">
              <a class="dropdown-item" href="resetpass.php">Reset Password</a>
              <a class="dropdown-item" href="#">Update Profile</a>


            </div>
          </li>

		  <!--
		  <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>-->
        </ul>

		<ul class="nav navbar-nav navbar-right">
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Logout&nbsp;&nbsp;<span class="sr-only"></span></a>
			</li>

		</ul>

		
		<script type="text/javascript">
		<!-- 
		function newPage(num) {
		var url=new Array();
		url[0]="http://hwinv/kraken/landingpage1.php?fqdn=";
		url[1]="forgotpass.php";
		url[2]="http://www.w3schools.com";
		url[3]="http://www.webmasterworld.com";
		window.location=url[num];``
		}
		// 
		</script>
		
		<ul class="nav navbar-nav navbar-right">
			<form class="form-inline my-2 my-lg-0" type="text" placeholder="Search" aria-label="Search" name="search" role="form" method="POST" onkeypress="return event.keyCode != 13;">
			<input  <?php echo "value='$fqdn'"; ?> id="name" name="name" type="text" class="form-control" placeholder="Query/Inspect..." autocomplete="off" onselect="myFunction()"> />&nbsp;&nbsp;
			<button type="button" class="btn btn-primary" name="reset" onclick="newPage(0)" ><span class="glyphicon glyphicon-refresh"></span>Reset</span></button>
      </form>
		</ul>




      </div>
    </nav>

  </br></br>
    <main role="main" class="container">

		<!--
		<div class="starter-template">
			<h1>Search Server</h1>
			<p class="lead">Searching....</p>

		</div>
		-->

	<!---------------------------------------------------------------------------------------------->
		<section id="container" >

			<!--main content start-->
			<section id="main-content" style="margin-left: 0px;">
				<section class="wrapper">

					<?php
					 //$access_lvl = $_SESSION['access_lvl'];
					//echo $access_lvl;
					?>

					<div class="row mt">
						<div class="col-lg-12">
							<div class="content-panel tablesearch">

								<section id="unseen">
									<!--<table id="resultTable" class="table table-bordered table-hover table-condensed">-->
									<table id="resultTable" class="table table-hover">
										<thead>
											<tr>

												<th class="small">ID</th>
												<th class="small">FQDN</th>
                        <th class="small">Host-FQDN</th>
												<th class="small">RDP IPv4</th>
                        <th class="small">RDP IPv4 MAC</th>
                        <th class="small">Serial Number</th>
                        <th class="small">Model</th>
                        <th class="small">Operating System</th>
						<!--<th class="small">Mail</th>
						<th class="small">Action</th>-->

											</tr>
										</thead>

										<tbody></tbody>
									</table>
								</section>

							</div><!-- /content-panel -->
						</div><!-- /col-lg-4 -->
					</div><!-- /row -->




					<!--
					<p>
						Testastika <a href="#">Console v1.0</a>
					</p>
					-->
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



    <script src="bootstrap/js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>


	<!--
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	-->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




  </body>
</html>
