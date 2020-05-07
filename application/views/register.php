<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ColabJobs - Register</title>
	<link href="<?php echo base_url();?>assets/LuminoAdmin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/LuminoAdmin/css/datepicker3.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/LuminoAdmin/css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="<?php echo base_url();?>assets/LuminoAdmin/js/html5shiv.js"></script>
	<script src="<?php echo base_url();?>assets/LuminoAdmin/js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					<form action="<?php echo base_url('register/aksi_register'); ?>" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Nama" name="nama" type="text" required>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="" required>
									</div>
									<div class="col-md-6">
										<input class="form-control" placeholder="Telepon" name="telepon" type="text" autofocus="" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Konfirmasi Password" name="confirm_password" type="password" required>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
							</div>
							<div class="form-group">
								Have an account? <a href="<?php echo base_url("login");?>">Login here</a>
							</div>
						</fieldset>	
					</form>
					<span><b class="note"><?php echo $note; ?></b><?php echo $message; ?></span>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="<?php echo base_url();?>assets/LuminoAdmin/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/LuminoAdmin/js/bootstrap.min.js"></script>
</body>
</html>
