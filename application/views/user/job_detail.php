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
                                <div class="thumb">
                                    <img src="<?php echo base_url();?>assets/jobboard2/img/svg_icon/1.svg" alt="">
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
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h4>Job description</h4>
                            <p><?php echo $result["deskripsi"];?></p>
                        </div>
                        
                        <div class="single_wrap">
                            <h4>Contact Person</h4>
                            <p> Email or Telephone : <?php echo $result["contact"];?>
                        </div>
                      
                    </div>
                    <div class="apply_job_form white-bg">
                        <h4>Apply for the job</h4>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input_field">
                                        <input type="text" placeholder="Website/Portfolio link">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                          </button>
                                        </div>
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                          <label class="custom-file-label" for="inputGroupFile03">Upload CV</label>
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input_field">
                                        <textarea name="#" id="" cols="30" rows="10" placeholder="Coverletter"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="submit_btn">
                                        <button class="boxed-btn3 w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="job_sumary">
                        <div class="summery_header">
                            <h3>Job Summery</h3>
                        </div>
                        <div class="job_content">
                            <ul>
                                <li>Published on: <span><?php echo $result["published"];?></span></li>
                                <li>Date line: <span><?php echo $result["dateline"];?></span></li>
                                <li>Owner: 
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
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="<?php echo base_url();?>assets/jobboard2/img/logo.png" alt="">
                                </a>
                            </div>
                            <p>
                                finloan@support.com <br>
                                +10 873 672 6782 <br>
                                600/D, Green road, NewYork
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.1s" data-wow-delay=".4s">
                            <h3 class="footer_title">
                                Company
                            </h3>
                            <ul>
                                <li><a href="#">About </a></li>
                                <li><a href="#"> Pricing</a></li>
                                <li><a href="#">Carrier Tips</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.2s" data-wow-delay=".5s">
                            <h3 class="footer_title">
                                Category
                            </h3>
                            <ul>
                                <li><a href="#">Design & Art</a></li>
                                <li><a href="#">Engineering</a></li>
                                <li><a href="#">Sales & Marketing</a></li>
                                <li><a href="#">Finance</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".6s">
                            <h3 class="footer_title">
                                Subscribe
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit">Subscribe</button>
                            </form>
                            <p class="newsletter_text">Esteem spirit temper too say adieus who direct esteem esteems
                                luckily.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text wow fadeInUp" data-wow-duration="1.4s" data-wow-delay=".3s">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
</body>

</html>