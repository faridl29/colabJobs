<?php $this->load->view('admin/header'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>assets/LuminoAdmin/#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<div class="large">120</div>
							<div class="text-muted">New Orders</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large">52</div>
							<div class="text-muted">Comments</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large">24</div>
							<div class="text-muted">New Users</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
							<div class="large">25.2k</div>
							<div class="text-muted">Page Views</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
						<div class="panel-heading">
							Profile
							<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
						</div>
						<div class="panel-body">
							<div class="col-md-6">
								<form action="#" id="form" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label>Nama</label>
										<input class="form-control" name="nama" value="<?php echo $this->session->userdata("nama"); ?>">
										<span class="invalid-feedback"></span>
									</div>
									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" name="email" value="<?php echo $this->session->userdata("email"); ?>">
										<span class="invalid-feedback"></span>
									</div>
									<div class="form-group">
										<label>Telepon</label>
										<input class="form-control" name="telepon" value="<?php echo $this->session->userdata("telepon"); ?>">
										<span class="invalid-feedback"></span>
									</div>
									<div class="form-group">
										<label>Foto Profile</label>
										<input name="images" id="images" class="form-control" type="file" accept="image/png,image/gif,image/jpeg, image/jpg">
                        				<span class="invalid-feedback"></span>
									</div>
									<!-- Form actions -->
									<div class="form-group">
										<a onclick="edit_profile()" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Edit Profile</a>
									</div>
								
								</form>
							</div>
							<div class="col-md-6">
								<form role="form">
									<div class="form-group">
										<label>Last Password</label>
										<input class="form-control">
									</div>
									<div class="form-group">
										<label>New Password</label>
										<input type="password" class="form-control">
									</div>
									<div class="form-group">
										<label>Confirm New Password</label>
										<input type="password" class="form-control">
									</div>
									<!-- Form actions -->
									<div class="form-group">
										<a onclick="change_password()" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> Change Password</a>
									</div>
								
								</form>
							</div>
						</div>
					</div><!-- /.panel-->

				</div>
			</div>

			<div class="col-sm-12">
				<p class="back-link">Lumino Theme by <a href="<?php echo base_url();?>assets/LuminoAdmin/https://www.medialoot.com">Medialoot</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="<?php echo base_url();?>assets/LuminoAdmin/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/LuminoAdmin/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/LuminoAdmin/js/chart.min.js"></script>
	<script src="<?php echo base_url();?>assets/LuminoAdmin/js/chart-data.js"></script>
	<script src="<?php echo base_url();?>assets/LuminoAdmin/js/easypiechart.js"></script>
	<script src="<?php echo base_url();?>assets/LuminoAdmin/js/easypiechart-data.js"></script>
	<script src="<?php echo base_url();?>assets/LuminoAdmin/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url();?>assets/LuminoAdmin/js/custom.js"></script>
	<script src="<?php echo base_url();?>assets/sweetalert2/sweetalert2.all.min.js"></script>
	<script src="<?php echo base_url();?>assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

	<script type="text/javascript">


	$('.textarea').wysihtml5()
 
	var url = window.location;
	var anchors = $('.nav a');

	function edit_profile(){
	
		$.ajax({
			url : "<?php echo base_url('admin/profile/edit_profile')?>",
			type: "POST",
			enctype: 'multipart/form-data',
			processData: false,
			contentType: false,
			data: new FormData($('#form')[0]),
			success: function(data)
			{
				console.log(data);
				if(data.status) //if success close modal and reload ajax table
				{
				Swal({
					title: 'Success',
					text: 'Profile berhasil diubah!',
					type: 'success'
				});
				}
				else
				{
					$.each(data.errors, function(key, value){
						$('[name="'+key+'"]').addClass('is-invalid'); //select parent twice to select div form-group class and add has-error class
						$('[name="'+key+'"]').next().text(value); //select span help-block class set text error string
						if(value == ""){
							$('[name="'+key+'"]').removeClass('is-invalid');
							$('[name="'+key+'"]').addClass('is-valid');
						}
					});
				}
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error editing data');
			}
		});
		
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('.invalid-feedback').empty();

		$('#form input').on('keyup', function(){
			$(this).removeClass('is-valid is-invalid');            
		});
		$('#form select').on('change', function(){
			$(this).removeClass('is-valid is-invalid');
		});

		$('#images').val('');
	
	}

	anchors.parent('li').removeClass('active');

	anchors.filter(function() {
		return this.href == url;
	}).closest('li').addClass('active');
	
	</script>
		
</body>
</html>