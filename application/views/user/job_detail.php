<?php $this->load->view('user/header'); ?>

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3><?php echo $result["judul"];?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="job_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb" style="width:100px;height:100px">
                                    <img src="<?php echo base_url();?>images/<?php echo $result["photo"];?>"alt="" style="width:100%">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="#"><h4><?php echo $result["judul"];?></h4></a>
                                    <div class="links_locat d-flex align-items-center"> 
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
                    <div class="apply_job_form white-bg">
                        <h4>Apply for the colaborating bussiness</h4>
                        <form action="#" id="form" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input class="form-control" type="text" placeholder="Your name" name="nama">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input  class="form-control" type="email" placeholder="Email" name="email">
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input_field">
                                        <textarea  class="form-control" name="cover_letter" id="" cols="30" rows="10" placeholder="Coverletter"></textarea>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit_btn">
                                    <a onclick="apply(<?php echo $result['id_jobs'];?>)" type="submit" class="boxed-btn3 w-100"> Apply Now </a>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    </div>

    <!-- footer start -->
    <!-- footer start -->
    <footer class="footer">
    
        <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center" style="margin-bottom:-20px; margin-top:10px">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="<?php echo base_url();?>assets/jobboard2/https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->

    <!-- link that opens popup -->
    <!-- JS here -->
    <script src="<?php echo base_url();?>assets/jobboard2/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/ajax-form.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/scrollIt.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/wow.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/nice-select.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/jquery.slicknav.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/plugins.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/gijgo.min.js"></script>
    <script src="<?php echo base_url();?>assets/sweetalert2/sweetalert2.js"></script>


    <!--contact js-->
    <script src="<?php echo base_url();?>assets/jobboard2/js/contact.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/jquery.form.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/mail-script.js"></script>


    <script src="<?php echo base_url();?>assets/jobboard2/js/main.js"></script>

    <script type="text/javascript">

	function apply(id_jobs){
	
		$.ajax({
			url : "<?php echo base_url('user/jobs/apply/')?>"+id_jobs,
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
					text: 'Permintaan berhasil dikirim!',
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

        $('#form')[0].reset(); 
	
	}

	</script>
</body>

</html>