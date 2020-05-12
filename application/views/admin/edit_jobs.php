<?php $this->load->view('admin/header'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>user/home">
					<em class="fa fa-home"></em>
				</a></li>
				<li><a href="<?php echo base_url();?>admin/History/index">History</a></li>
				<li class="active">Edit Bussiness</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Bussiness</h1>
			</div>
		</div><!--/.row-->
		
		

			<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Bussiness Data
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
					<div class="panel-body pad">
					<form action="#" id="form" method="post" enctype="multipart/form-data">
						<input type="hidden" value="<?php echo $data['id_jobs'];?>" name="id"/> 
						<div class="form-group">	
							<label>Judul</label>
							<div class="row">
								<div class="col-md-8">
									<input class="form-control" style="height:40px" name="judul" value="<?php echo $data['judul'];?>">
									<span class="invalid-feedback"></span>
								</div>
								<div class="col-md-4">
									<a onclick="update()" type="submit" class="btn btn-primary float-right" style="width:100px;height:40px"> Update </a>
								</div>
							</div>
						</div>
						<div class="row">
							<hr>
							<div class="col-md-8">
								<textarea name="deskripsi" class="textarea" placeholder="Description..." style="width: 100%; height: 700px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $data['deskripsi'];?></textarea>
								<span class="invalid-feedback"></span>
							</div>
							<div class="col-md-4">
							<div class="form-group">
								<label>Nama Perusahaan</label>
								<input class="form-control" style="height:40px" value="<?php echo $data['nama_perusahaan'];?>" name="nama_perusahaan">
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
								<input class="form-control" style="height:40px" name="domisili" value="<?php echo $data['domisili'];?>">
								<span class="invalid-feedback"></span>
							</div>
							<div class="form-group">
								<label>Contact Person</label> 
								<input class="form-control" placeholder="email or phone" style="height:40px" name="contact" value="<?php echo $data['contact'];?>">
								<span class="invalid-feedback"></span>
							</div>
							<div class="form-group">
								<label>Photo</label>
								<input name="images" id="images" class="form-control" type="file" accept="image/png,image/gif,image/jpeg, image/jpg">
								<span class="invalid-feedback"></span>
							</div>
							<div class="form-group">
								<label>Dateline</label>
        						<input type="text" name="dateline" class="form-control" id="datetimepicker2" placeholder="click here.." value="<?php echo $data['dateline'];?>"/>
								<span class="invalid-feedback"></span>
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
	$('#datetimepicker2').datepicker({
		format: 'yyyy-mm-dd'
	});
 
	var url = window.location;
	var anchors = $('.nav a');
	
	function update(){
	
		$.ajax({
			url : "<?php echo base_url('admin/edit_jobs/update')?>",
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
						text: 'Berhasil mengupdate data!',
						type: 'success'
					});

					window.location.href = "<?php echo base_url('admin/History/index')?>";

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
				alert('Error updating data');
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
		$('#form')[0].reset(); 
	
	}

	anchors.parent('li').removeClass('active');

	anchors.filter(function() {
		return this.href == url;
	}).closest('li').addClass('active');
	
	</script>
		
</body>
</html>