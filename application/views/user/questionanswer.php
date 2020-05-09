<?php $this->load->view('user/header'); ?>

<!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Discussion About Business Here</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <div class="job_listing_area plus_padding">
        
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Job Listing</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="serch_cat d-flex justify-content-end">
                                        <select>
                                            <option data-display="Most Recent">Most Recent</option>
                                            <option value="1">Marketer</option>
                                            <option value="2">Wordpress </option>
                                            <option value="4">Designer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="job_lists m-0">
                        <div class="row">

                        <?php foreach ($data->result() as $row) :?>
                            <div class="col-lg-12 col-md-12" >
                                <div class="single_jobs white-bg d-flex justify-content-between" >
                                    <div class="jobs_left d-flex align-items-center">
                                    
                                        <div class="jobs_conetent" style="margin-right:50px">
                                            <a href="#" onclick="detail(<?php echo $row->id_question;?>)">
                                                <h4><?php echo substr($row->title, 0, 200) . (strlen($row->title) > 200 ? "..." : '');?></h4>
                                            </a>
                                            <div class="location" style="margin-bottom:-20px;">
                                                <p><?php echo substr($row->detail, 0, 200) . (strlen($row->detail) > 200 ? "..." : ''); ?></p>
                                            </div>
                                            <div class="links_locat d-flex align-items-center">
                                                
                                                <div class="jobs_right">
                                                    <div class="date">
                                                        <?php get_instance()->load->helper('waktu');?>
                                                        <p><?php echo waktu_lalu($row->date);?></p>
                                                    </div>
                                                </div>
                                                <div class="jobs_right" style="margin-left:20px">
                                                    <div class="date">
                                                        
                                                        <p><?php echo $row->jumlah;?> Comments</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobs_right" style="width:150px">
                                        <div class="pull-right">
                                            <img src="<?php echo base_url("images/").$row->foto;?>" alt="User Avatar" class="img-circle pull-right" style="width:50px;"/>
                                       
                                            <p><?php echo $row->nama;?></p>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>    

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo $pagination;?>
                            </div>
                        </div>
                    </div>
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
    <!-- <script src="<?php echo base_url();?>assets/jobboard2/js/gijgo.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/jobboard2/js/range.js"></script>



    <!--contact js-->
    <script src="<?php echo base_url();?>assets/jobboard2/js/contact.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/jquery.form.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url();?>assets/jobboard2/js/mail-script.js"></script>


    <script src="<?php echo base_url();?>assets/jobboard2/js/main.js"></script>


	<script type="text/javascript">
        function detail(id_question)
        {
            window.location.href = "<?php echo base_url('user/detail_question_answer/detail/')?>"+id_question;
        }
    </script>
</body>

</html>