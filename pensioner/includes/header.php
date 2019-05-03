<?php 
include('includes/controller.php');
if(!isset($_SESSION['pensioner_id']))
{
  $auth->redirect('login.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>KSRTC-Pension</title>
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-datepicker3.min.css" rel="stylesheet">
	<link href="assets/css/styles.css" rel="stylesheet">
	<link href="assets/css/jquery.fancybox.min.css" rel="stylesheet">
	<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/buttons.bootstrap.min.css" rel="stylesheet">
 <link href="assets/css/estyle.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
	<style>

body {
   margin:0;
   padding:0;
   height:100%;
}
#wrapper {
   min-height:100%;
   position:relative;
}
.header {
   background:#ff0;
   padding:10px;
}
.body {
   padding:10px;
   padding-bottom:60px;   /* Height of the footer */
}
.footer {
   position:absolute;
   bottom:0;
   width:100%;
   height:60px;   /* Height of the footer */
   background:#6cf;
}


/*    */
        .error{
            color: red;
        }
    </style>
	
</head>
    
    
<body>
	<div id="wrapper">
		<div class="header">
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>KSRTC-Pension</span> Pensioner</a>
				<ul class="nav navbar-top-links navbar-right">
					<li style="padding: 10px 15px;"><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em>Logout</a></li>

				</ul>
				<!-- <ul class="nav navbar-top-links navbar-right">
					<li style="padding: 10px 5px;" class="parent "><a data-toggle="collapse" href="#settings">
				<em class="fa fa-cog">&nbsp;</em> Settings <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
					
				</span>
				</a>
				<ul class="children collapse" id="settings">
					<li><a class="" href="change_password">
						<span class="fa fa-arrow-right">&nbsp;</span> Change Password
					</a></li>
					<li><a class="" href="upload_photo">
						<span class="fa fa-arrow-right">&nbsp;</span> Upload Photo
					</a></li>
					
				</ul>
			</li>
				</ul> -->
			</div>
		</div><!-- /.container-fluid -->
	</nav>
</div>
<div class="main-content">