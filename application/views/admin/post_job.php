<?php $this->load->view('admin/header'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>assets/LuminoAdmin/#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Post Job</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Post a New Colab Job</h1>
			</div>
		</div><!--/.row-->
		
		

			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Profile
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body pad">
					<form action="#" id="form" method="post" enctype="multipart/form-data">
						<div class="form-group">	
							<label>Judul</label>
							<div class="row">
								<div class="col-md-8">
									<input class="form-control" style="height:40px" name="judul">
									<span class="invalid-feedback"></span>
								</div>
								<div class="col-md-4">
									<a onclick="upload()" type="submit" class="btn btn-primary float-right" style="width:100px;height:40px"> Upload </a>
								</div>
							</div>
						</div>
						<div class="row">
							<hr>
							<div class="col-md-8">
								<textarea name="deskripsi" class="textarea" placeholder="Description..." style="width: 100%; height: 700px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
								<span class="invalid-feedback"></span>
							</div>
							<div class="col-md-4">
							<div class="form-group">
								<label>Nama Perusahaan</label>
								<input class="form-control" style="height:40px" name="nama_perusahaan">
								<span class="invalid-feedback"></span>
							</div>
							<div class="form-group">
								<label class="control-label">Jenis Usaha</label>
								<select name="jenis_usaha" class="form-control select2" style="width: 100%;">
									<option value="Design & Creative">Design & Creative</option>
									<option value="Marketing">Marketing</option>
									<option value="Telemarketing">Telemarketing</option>
									<option value="Software & Web">Software & Web</option>
									<option value="Administration">Administration</option>
									<option value="Teaching & Education">Teaching & Education</option>
									<option value="Engineering">Engineering</option>
									<option value="Garments / Textile">Garments / Textile</option>
									<option value="Lainnya">Lainnya</option>
								</select>
								<span class="invalid-feedback"></span>
							</div>
							<div class="form-group">
								<label>Domisili</label>
								<input class="form-control" style="height:40px" name="domisili">
								<span class="invalid-feedback"></span>
							</div>
							<div class="form-group">
								<label>Contact Person</label> 
								<input class="form-control" placeholder="email or phone" style="height:40px" name="contact">
								<span class="invalid-feedback"></span>
							</div>
							<div class="form-group">
								<label>Photo</label>
								<input name="images" id="images" class="form-control" type="file" accept="image/png,image/gif,image/jpeg, image/jpg">
								<span class="invalid-feedback"></span>
							</div>
							<div class="panel panel-default">
								<label>Dateline</label>
									
								<div class="panel-body">
									<div id="calendar" name="calendar"></div>
								</div>
							</div>
							</div>
						</div>
						
					</form>
					</div>
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
	var anchors = $('.sidebar-menu a');

	function upload(){
	
		$.ajax({
			url : "<?php echo base_url('admin/post_job/post')?>",
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
					text: 'Berhasil memposting data!',
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
				alert('Error adding data');
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

	anchors.filter(function() {
		return this.href == url;
	}).closest('li').addClass('active');
	
	</script>
		
</body>
</html>