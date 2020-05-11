<?php $this->load->view('superadmin/header'); ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>superadmin/dashboard">
                <em class="fa fa-home"></em>
            </a></li>
            <li><a href="<?php echo base_url();?>superadmin/Bussiness">Bussiness</a></li>
            <li class="active">Detail</li>
        </ol>
	</div><!--/.row-->
    <div class="row job_details_area">
        <div class="job_lists" style="margin-top:-80px">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between"  style="display: -webkit-box!important;display: -ms-flexbox!important;display: flex!important">
                            <div class="jobs_left d-flex align-items-center"  style="display: -webkit-box!important;display: -ms-flexbox!important;display: flex!important">
                                <div class="thumb" style="width:100px;height:100px">
                                    <img src="<?php echo base_url();?>images/<?php echo $result["photo"];?>"alt="" style="width:100%">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="#"><h4><?php echo $result["judul"];?></h4></a>
                                    <div class="links_locat d-flex align-items-center"  style="display: -webkit-box!important;display: -ms-flexbox!important;display: flex!important"> 
                                        <div class="location">
                                            <p><?php echo $result["nama_perusahaan"];?> </p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> <?php echo $result["domisili"];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap" style="word-wrap: break-word;">
                            <h4>Bussiness description</h4>
                            <p><?php echo $result["deskripsi"];?></p>
                        </div>
                        
                        <div class="single_wrap">
                            <h4>Contact Person</h4>
                            <p> Email or Telephone : <?php echo $result["contact"];?>
                        </div>
                      
                    </div>
                    
                </div>
                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Bussiness Summery</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <?php get_instance()->load->helper('tgl_indo');?>
                                <li>Published on: <span><?php echo date_indo($result["published"]);?></span></li>
                                <li>Date line: <span><?php echo date_indo($result["dateline"]);?></span></li>
                                <li>Publisher: <span><?php echo $result["nama"];?></span></li>
                                <li>Location: <span><?php echo $result["domisili"];?></span></li>
                                <li>Bussiness Catogory: <span> <?php echo $result["jenis_usaha"];?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </div> 

    <!-- footer start -->
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

        anchors.parent('li').removeClass('active');

        anchors.filter(function() {
            return this.href == url;
        }).closest('li').addClass('active');

	</script>
</body>

</html>