<?php $this->load->view('user/header'); ?>

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Discussion</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
    
    <div class="job_details_area">
    
        <div class="container">
            <div class="panel panel-default" style="background:#fff">
                <div class="panel-heading">
                    <div style="padding-left:20px;">Question</div>
                    <hr>
                </div>
                <div class="panel-body" style="padding-left:20px; padding-right:20px; padding-bottom:20px">
                    <h3><b><font color="black"><?php echo $question["title"];?></font></b></h3>
                    <p><?php echo $question["detail"];?></p>
                </div>
            </div>   
               
            <div class="panel panel-default chat" style="margin-top:20px;background:#fff">
                <div class="panel-heading" style="padding-left:20px">
                    Discussion
                    
                </div>
            
                <div class="panel-body" style="overflow-x:hidden;background:#fff">
                        
                <div class="article border-bottom">
                </div>
                    
                    <ul>
                        <?php if($comments->num_rows() > 0) foreach ($comments->result() as $row) :
                            if($row->id_user != $this->session->userdata("id_user")) {?>
                                <li class="left clearfix" style="padding:20px"><span class="chat-img pull-left">
                                    <img src="<?php echo base_url("images/").$row->foto;?>" alt="User Avatar" class="img-circle" style="width:60px;"/>
                                    </span>
                                    <div class="chat-body clearfix">
                                        <?php get_instance()->load->helper('waktu');?>
                                        <div class="header"><strong class="primary-font"><?php echo $row->nama;?></strong> <small class="text-muted"><?php echo waktu_lalu($row->date);?></small></div>
                                        <p><?php echo $row->comment;?></p>
                                    </div>
                                </li>
                            <?php } else { ?>
                                <li class="right clearfix" style="padding:20px"><span class="chat-img pull-right">
                                    <img src="<?php echo base_url("images/").$row->foto;?>" alt="User Avatar" class="img-circle" style="width:60px;"/>
                                    </span>
                                    <div class="chat-body clearfix">
                                        <?php get_instance()->load->helper('waktu');?>
                                        <div class="header"><strong class="primary-font"><?php echo $row->nama;?></strong> <small class="text-muted"><?php echo waktu_lalu($row->date);?></small></div>
                                        <p><?php echo $row->comment;?></p>
                                    </div>
                                </li>
                        <?php } endforeach;?>	
                    </ul>
                </div>
                <div class="panel-footer" style="background:#fff;border-top:1px solid #e9ecf2; padding:10px">
                    <div class="input-group">
                        <input id="comments" name="comments" type="text" class="form-control input-md" placeholder="Type your message here..." /><span class="input-group-btn">
                            <button onclick="send(<?php echo $question['id_question'];?>)" class="btn btn-primary btn-md" id="btn-chat" >Send</button>
                    </span></div>
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

function send(id_question){
    var comment = $('#comments').val();
    $.ajax({
        url : "<?php echo base_url('user/detail_question_answer/send')?>",
        type: "POST",
        data: {
            "id_question": id_question,
            "comment": comment,
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

	</script>
</body>

</html>