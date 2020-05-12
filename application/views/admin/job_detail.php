<?php $this->load->view('admin/header'); ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    <div class="row">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>user/home">
                <em class="fa fa-home"></em>
            </a></li>
            <li><a href="<?php echo base_url();?>admin/History/index">History</a></li>
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
                    <br>
					<a onclick="applyer()"  class="btn btn-primary float-right" style="width:100%"> Show All Applyer </a>						
            </div>
        </div>
    </div> 

    <!-- Bootstrap modal -->
	<div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modal_title">Detail Applyer</h4>
                    
                </div>
                <div class="modal-body siswa form">
                    
            
                    <div class="job_lists">

                        <?php foreach ($this->session->userdata("list_applyer")->result() as $row) :?>
                            <div class="col-lg-12 col-md-12">
                                <div class="single_jobs white-bg d-flex justify-content-between" style="display: -webkit-box!important;display: -ms-flexbox!important;display: flex!important">
                                    <div class="jobs_left d-flex align-items-center" style="width:85%;display: -webkit-box!important;display: -ms-flexbox!important;display: flex!important">
                                        <div class="thumb">
                                            <img src="<?php echo base_url();?>assets/jobboard2/img/svg_icon/1.svg" alt="">
                                        </div>
                                        <div class="jobs_conetent">
                                            
                                        <div class="location">
                                            <p style="margin-left:20px">Nama : <?php echo $row->nama;?></p>
                                        </div>
                                        <div class="location">
                                            <p style="margin-left:20px; margin-top:-20px">Email : <?php echo $row->email;?></p>
                                        </div>
                                        <div class="location">
                                            <p style="margin-left:20px; margin-top:-20px">Cover Letter : <?php echo $row->cover_letter;?></p>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now">
                                            <?php if($row->status == "pending"){
                                                ?><a href="#" onclick="accept(<?php echo $row->id;?>)" class="btn btn-primary" style="width:120px">Accept</a>
                                            <?php } else {
                                                ?><a class="btn btn-primary disabled" style="width:120px">Accepted</a>
                                            <?php }?>
    
                                        </div>
                                        
                                    </div>
                                </div><hr>
                            </div>
                        <?php endforeach; ?>    
                    </div>
                </div>
                
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End Bootstrap modal -->

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

        $('#modal_form').on('hidden.bs.modal', function () {
            location.reload();
        })

        var url = window.location;
        var anchors = $('.nav a');

        function applyer(){
            $('#modal_form').modal('show'); // show bootstrap modal
        }

        function accept(id){
            Swal({
            title: 'Anda yakin?',
            text: "Akan menyetujui kolaborasi dengan user ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!'
            }).then((result) => {
                if(result.value) {
                    $.ajax({
                        url : "<?php echo base_url('Admin/History/accept')?>/"+id,
                        type: "POST",
                        success: function(data)
                        {
                            $('#modal_form').modal('hide');
                            
                            Swal({
                                title: 'Success',
                                text: 'Colaborate Accepted!',
                                type: 'success'
                            });
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            alert('Error accepting data');
                        }
                    });
                }
            });
        }

        anchors.parent('li').removeClass('active');

        anchors.filter(function() {
            return this.href == url;
        }).closest('li').addClass('active');

	</script>
</body>

</html>