<?php $this->load->view('admin/header'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>admin/profile">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">History</li>
			</ol>
		</div><!--/.row-->
	
		
		<div class="job_listing_area" >
			<div class="job_lists" >

				<?php foreach ($data->result() as $row) :?>
					<div class="col-lg-12 col-md-12" >
						<div class="single_jobs white-bg d-flex justify-content-between" style="display: -webkit-box!important;display: -ms-flexbox!important;display: flex!important">
							<div class="jobs_left d-flex align-items-center" style="width:85%;display: -webkit-box!important;display: -ms-flexbox!important;display: flex!important">
								<div class="thumb" style="width:100px;height:100px">
									<img src="<?php echo base_url();?>images/<?php echo $row->photo;?>"alt="" style="width:100%">
								</div>
								<div class="jobs_conetent">
									<h4><?php echo $row->judul;?></h4>
									<div class="links_locat d-flex align-items-center" style="display: -webkit-box!important;display: -ms-flexbox!important;display: flex!important">
										<div class="location">
											<p><?php echo $row->nama_perusahaan;?></p>
										</div>
										<div class="location">
											<p> <i class="fa fa-map-marker"></i> <?php echo $row->domisili;?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="jobs_right">
								<div class="apply_now">
									<a href="#" onclick="detail(<?php echo $row->id_jobs;?>)" class="boxed-btn3" style="width:120px">Detail</a>
								</div>
								<div class="date">
									<?php get_instance()->load->helper('tgl_indo');?>
									<p>Date line: <?php echo date_indo($row->dateline);?></p>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>    

				<!-- </div> -->
				<div class="row">
					<div class="col-lg-12">
						<?php echo $pagination;?>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-12">
			<p class="back-link">Lumino Theme by <a href="<?php echo base_url();?>assets/LuminoAdmin/https://www.medialoot.com">Medialoot</a></p>
		</div>
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

	function detail(id_jobs)
  	{
		window.location.href = "<?php echo base_url('admin/job_detail/detail/')?>"+id_jobs;
  	}

	anchors.parent('li').removeClass('active');

	anchors.filter(function() {
		return this.href == url;
	}).closest('li').addClass('active');
	
	</script>
		
</body>
</html>