
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

#$hostname = $_SESSION['u_hostname'];
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
$_SESSION['osname'] = ""; // RESET OS CACHED
?>


<?php
		//if host needs to be striped from a URL
		preg_match('@^(?:http://)?([^/]+)@i', $u_email, $matches);
		$host = $matches[1];
		//else make $host your FQDN and skip the above segment
		preg_match("/^(.*?)\.(.*)/", $host, $rest);
		$username = $rest[0];
?>

<!DOCTYPE HTML>
<!-- saved from url=(0060)https://getbootstrap.com/docs/4.0/examples/starter-template/ -->
<!DOCTYPE html PUBLIC "" "">
<HTML lang="en">

<HEAD>
    
    <META charset="utf-8">
	<META content="IE=11.0000" http-equiv="X-UA-Compatible">
    <META name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <META name="description" content="">
    <META name="author" content="">
    <LINK href="../../../../favicon.ico" rel="icon">
    <TITLE>Home</TITLE>
    <LINK href="https://getbootstrap.com/docs/4.0/examples/starter-template/" rel="canonical">
    <!-- Bootstrap core CSS -->
    <LINK href="index_files/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <LINK href="index_files/starter-template.css" rel="stylesheet">
    
	
	
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	
	
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
	

	
	
</HEAD>

<BODY>
    <NAV class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <A class="navbar-brand" href="#"><?php echo "Welcome! ".strtoupper($username); ?></A>
        <BUTTON class="navbar-toggler" aria-expanded="false" aria-controls="navbarsExampleDefault" aria-label="Toggle navigation" type="button" data-target="#navbarsExampleDefault" data-toggle="collapse">
            <SPAN class="navbar-toggler-icon"></SPAN> </BUTTON>

        <DIV class="collapse navbar-collapse" id="navbarsExampleDefault">
            <UL class="navbar-nav mr-auto">
                <LI class="nav-item active">
                    <A class="nav-link" href="#">Home 
					<SPAN class="sr-only">(current)</SPAN></A>
                </LI>
				
				<!--
                <LI class="nav-item">
                    <A class="nav-link" href="https://getbootstrap.com/docs/4.0/examples/starter-template/#">Link</A>
                </LI>
                <LI class="nav-item">
                    <A class="nav-link disabled" href="https://getbootstrap.com/docs/4.0/examples/starter-template/#">Disabled</A>
                </LI>
				
				-->		
				<!--Mylinks-->
                <LI class="nav-item dropdown">
                    <A class="nav-link dropdown-toggle" id="dropdown01" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown">MyLinks</A>
                    <DIV class="dropdown-menu" aria-labelledby="dropdown01">
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
                    </DIV>
                </LI>
		
				
				<!--Others-->
                <LI class="nav-item dropdown">
                    <A class="nav-link dropdown-toggle" id="dropdown02" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown">Other</A>
                    <DIV class="dropdown-menu" aria-labelledby="dropdown02">
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
                    </DIV>
                </LI>				
				
				<!--myWipro-->
                <LI class="nav-item dropdown">
                    <A class="nav-link dropdown-toggle" id="dropdown03" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown">myWipro</A>
                    <DIV class="dropdown-menu" aria-labelledby="dropdown03">
					  <a class="dropdown-item" href="https://mywipro.wipro.com/irj/portal/" target="_blank">Wipro Portal</a>
					  <a class="dropdown-item" href="https://outlook.com/owa/wipro.com" target="_blank">Wipro Mail</a>	
                    </DIV>
                </LI>				
				
				
				<!--File Management-->
                <LI class="nav-item dropdown">
                    <A class="nav-link dropdown-toggle" id="dropdown04" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown">VersionCtrl</A>
                    <DIV class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="#">Version Control</a>
              <a class="dropdown-item" href="#">UploadCopy</a>
                    </DIV>
                </LI>					
				
				<!--Account Management-->
                <LI class="nav-item dropdown">
                    <A class="nav-link dropdown-toggle" id="dropdown05" aria-expanded="false" aria-haspopup="true" href="#" data-toggle="dropdown">Account</A>
                    <DIV class="dropdown-menu" aria-labelledby="dropdown05">
					  <a class="dropdown-item" href="resetpass.php">Reset Password</a>
					  <a class="dropdown-item" href="#">Update Profile</a>
                    </DIV>
                </LI>				
	
            </UL>
            <!--<FORM class="form-inline my-2 my-lg-0" type="text" placeholder="Search" aria-label="Search" name="search" role="form" method="POST" onkeypress="return event.keyCode != 13;" >
			<form class="form-inline my-2 my-lg-0" type="text" placeholder="Search" aria-label="Search" name="search" role="form" method="POST" onkeypress="return event.keyCode != 13;">
			<input  <?php echo "value='$fqdn'"; ?> id="name" name="name" type="text" class="form-control" placeholder="Query/Inspect..." autocomplete="off" onselect="myFunction()"> />&nbsp;&nbsp;
			<button type="button" class="btn btn-primary" name="reset" onclick="newPage(0)" ><span class="glyphicon glyphicon-refresh"></span>Reset</span></button>				
            </FORM>-->
			<FORM class="form-inline my-2 my-lg-0" type="text" placeholder="Search" aria-label="Search" name="search" role="form" method="POST" >
				<!--<BUTTON class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="newPage(0)">Logout</BUTTON>&nbsp;&nbsp;-->
				<a href="logout.php" class="btn btn-outline-success my-2 my-sm-0" role="button">Logout</a>&nbsp;&nbsp;
				
				
				
				
                <INPUT class="form-control mr-sm-2" aria-label="Search" type="text" placeholder="Search" id="name" name="name" type="text" onselect="myFunction()">
                <INPUT  class="btn btn-outline-success my-2 my-sm-0"  type="submit" value="Clear" >Clear</input>
				
            </FORM>		
        </DIV>
    </NAV>	
	

	
	<!--	<DIV class="starter-template">
            <H1>Welcome to Testastika</H1>
            <P class="lead">Web Based Windows Server Inventory Manager 
                <BR> and Administration Console</P>
        </DIV>	-->
		</br></br>
    <main class="container" role="main">
        

			
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
	<p class="mt-5 mb-3 text-muted" align="center">--- Wipro Manage Services ---<br>©2019</p>
    </main>
    <!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
		<!-- place JS scripts at end of page for faster load times -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<!--<script src="assets/js/bootstrap.min.js"></script>-->
		<!--<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>-->		
		<!--script for this page-->
		<script type="text/javascript" src="scripts/triggers.js"></script>
	
	
	
	
	
	
    <!--<SCRIPT src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"></SCRIPT>    -->
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
	<!--<SCRIPT>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</SCRIPT>-->

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>



</BODY>

</HTML>