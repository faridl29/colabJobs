<?php $this->load->view('user/header'); ?>

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s"><?php echo $all;?>+ Bussiness Listed</h5>
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Colaborate Your Bussiness</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">work faster and more efficiently by collaborating on business</p>
                            <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                                <a href="<?php echo base_url();?>user/jobs" class="boxed-btn3">Browse Bussiness</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
            <img src="<?php echo base_url();?>assets/jobboard2/img/banner/illustration.png" alt="">
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- popular_catagory_area_start  -->
    <div class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-40">
                        <h3>Popolar Categories</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="#" onclick="get_with_category('Design & Creative')"><h4>Design & Creative</h4></a>
                        <p> <span><?php echo $design;?></span> Available</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="#" onclick="get_with_category('Marketing')"><h4>Marketing</h4></a>
                        <p> <span><?php echo $marketing;?></span> Available</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="#" onclick="get_with_category('Telemarketing')"><h4>Telemarketing</h4></a>
                        <p> <span><?php echo $telemarketing;?></span> Available</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="#" onclick="get_with_category('Software & Web')"><h4>Software & Web</h4></a>
                        <p> <span><?php echo $software;?></span> Available</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="#" onclick="get_with_category('Administration')"><h4>Administration</h4></a>
                        <p> <span><?php echo $administration;?></span> Available</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="#" onclick="get_with_category('Teaching & Education')"><h4>Teaching & Education</h4></a>
                        <p> <span><?php echo $teaching;?></span> Available</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="#" onclick="get_with_category('Engineering')"><h4>Engineering</h4></a>
                        <p> <span><?php echo $engineering;?></span> Available</p>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="#" onclick="get_with_category('Garments / Textile')"><h4>Garments / Textile</h4></a>
                        <p> <span><?php echo $garments;?></span> Available</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular_catagory_area_end  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>Job Listing</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="brouse_job text-right">
                        <a href="<?php echo base_url();?>user/jobs" class="boxed-btn4">Browse More Bussiness</a>
                    </div>
                </div>
            </div>
            <div class="job_lists">
                <div class="row">
                    <?php foreach ($data->result() as $row) :?>
                        <div class="col-lg-12 col-md-12">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center" style="width:70%">
                                    <div class="thumb" style="width:100px;height:100px">
                                        <img src="<?php echo base_url();?>images/<?php echo $row->photo;?>"alt="" style="width:100%">
                                    </div>
                                    <div class="jobs_conetent">
                                        <a href="#" onclick="location.href='<?php echo base_url('user/job_detail/detail/'); echo $row->id_jobs;?>';"><h4><?php echo $row->judul;?></h4></a>
                                        <div class="links_locat d-flex align-items-center">
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
                                        <a onclick="location.href='<?php echo base_url('user/job_detail/detail/'); echo $row->id_jobs;?>';" class="boxed-btn3">Apply Now</a>
                                    </div>
                                    <div class="date">
                                    <?php get_instance()->load->helper('tgl_indo');?>
                                        <p>Date line: <?php echo date_indo($row->dateline);?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>    
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->

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



    <!--contact js-->
    <script src="<?php echo base_url();?>assets/jobboard2/js/contact.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/jquery.form.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/mail-script.js"></script>


    <script src="<?php echo base_url();?>assets/jobboard2/js/main.js"></script>

    <script type="text/javascript">

    function get_with_category(category){
        window.location.href = "<?php echo base_url('user/jobs/get_job_with_category')?>/"+category;
    }
    
    </script>

</body>
</html>