<?php $this->load->view('superadmin/header'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>user/home">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Bussiness</li>
			</ol>
		</div><!--/.row-->
	
		
		<div class="job_listing_area" >
			<div class="job_lists" >

				<?php foreach ($data->result() as $row) :?>
					<div class="col-lg-12 col-md-12" >
                        <div class="panel-heading white-bg" style="border-bottom: 1px solid #e9ecf2;">
                            Delete
                            <a onclick="delete_bussiness(<?php echo $row->id_jobs;?>)"> <span class="pull-right panel-toggle panel-button-tab-left"><em class="fa fa-close"></em></span></a>
                        </div>
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
 
	var url = window.location;
	var anchors = $('.nav a');

    function delete_bussiness(id_bussiness){

        $.ajax({
            url : "<?php echo base_url('superadmin/Bussiness/delete_bussiness')?>",
            type: "POST",
            data: {
                "id_bussiness": id_bussiness
            },
            success: function(data)
            {
            window.location.reload();
            
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Gagal!');
            }
        });
        
    }

	function detail(id_jobs)
  	{
		window.location.href = "<?php echo base_url('superadmin/Bussiness/detail/')?>"+id_jobs;
  	}

	anchors.parent('li').removeClass('active');

	anchors.filter(function() {
		return this.href == url;
	}).closest('li').addClass('active');
	
	</script>
		
</body>
</html>