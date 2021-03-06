<?php $this->load->view('user/header'); ?>

<!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3><?php echo $all;?>+ Bussiness Listed</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area plus_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="job_filter white-bg">
                        <div class="form_inner white-bg">
                            <h3>Filter</h3>
                            <form action="<?php echo base_url('user/jobs/search_location_category'); ?>" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <input name ="location" type="text" placeholder="Location">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <select class="wide" name="category">
                                                <option data-display="Category">Category</option>
                                                <option value="Design & Creative">Design & Creative</option>
                                                <option value="Marketing">Marketing</option>
                                                <option value="Telemarketing">Telemarketing</option>
                                                <option value="Software & Web">Software & Web</option>
                                                <option value="Administration">Administration</option>
                                                <option value="Teaching & Education">Teaching & Education</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Garments / Textile">Garments / Textile</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="single_field">
                                            <button  class="boxed-btn3 w-100" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                        
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h4>Bussiness Listing</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="serch_cat d-flex justify-content-end">
                                        <input name="search" id="search" value="<?php echo $search;?>" type="text" class="form-control" style="width:175px" placeholder="Search..">
                                        <button onclick="search()" class="btn btn-primary" style="margin-left:20px">Search</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="job_lists m-0">
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


	<script>
        $( function() {
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 24600,
                values: [ 750, 24600 ],
                slide: function( event, ui ) {
                    $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] +"/ Year" );
                }
            });
            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
                " - $" + $( "#slider-range" ).slider( "values", 1 ) + "/ Year");
        } );

        function search()
        {
            window.location.href = "<?php echo base_url('user/jobs/search/')?>"+$("#search").val();
			
		}
    </script>
</body>

</html>