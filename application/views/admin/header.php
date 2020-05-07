<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<link href="<?php echo base_url();?>assets/LuminoAdmin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/LuminoAdmin/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/LuminoAdmin/css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/LuminoAdmin/css/styles.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/custom_style.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url();?>assets/jobboard2/css/style.css">
	<!-- <link href="<?php echo base_url();?>assets/jobboard2/css/bootstrap.min.css" rel="stylesheet"> -->
	
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
	<nav class="navbar btn-primary navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="<?php echo base_url();?>assets/LuminoAdmin/#"><span>Lumino</span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">

					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="<?php echo base_url();?>assets/LuminoAdmin/#">
						<em class="fa fa-bell"></em><span class="label label-danger">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="<?php echo base_url();?>assets/LuminoAdmin/#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url();?>assets/LuminoAdmin/#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo base_url();?>assets/LuminoAdmin/#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="<?php echo base_url();?>images/<?php echo $this->session->userdata("foto");?>" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $this->session->userdata("nama");?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
	
		<ul class="nav menu">
			<li class="active"><a href="<?php echo base_url();?>admin/profile"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="<?php echo base_url();?>admin/post_job"><em class="fa fa-calendar">&nbsp;</em> Post Job</a></li>
			<li><a href="<?php echo base_url();?>admin/history"><em class="fa fa-bar-chart">&nbsp;</em> History</a></li>
			<li><a href="<?php echo base_url();?>login/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	