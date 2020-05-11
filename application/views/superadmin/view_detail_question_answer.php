<?php $this->load->view('superadmin/header'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>superadmin/dashboard">
					<em class="fa fa-home"></em>
				</a></li>
				<li><a href="<?php echo base_url();?>superadmin/Question_Answer">Q&A</a></li>
				<li class="active">detail</li>
			</ol>
		</div><!--/.row-->
		<div class="panel panel-default" style="margin-top:20px">
			<div class="panel-heading">
					Question				
			</div>
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-10 col-md-10">
					<h4><b><font color="black"><?php echo $question["title"];?></font></b></h4>
					<p><?php echo $question["detail"];?></p>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		</div>
		<div class="panel panel-default chat" style="margin-top:40px">
					<div class="panel-heading">
						Discussion
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
					</div>
				
					<div class="panel-body">
					
			
						<ul>
							<?php if($comments->num_rows() > 0) foreach ($comments->result() as $row) : ;?>
                                <div>
                                <a onclick="delete_comment(<?php echo $row->id_comment;?>)">  <span class="pull-right panel-toggle panel-button-tab-left"><em class="fa fa-close"></em></span></a>
                                <li class="left clearfix"><span class="chat-img pull-left">
                                    <img src="<?php echo base_url("images/").$row->foto;?>" alt="User Avatar" class="img-circle" style="width:60px;"/>
                                    </span>
                                    <div class="chat-body clearfix">
                                        <?php get_instance()->load->helper('waktu');?>
                                        <div class="header"><strong class="primary-font"><?php echo $row->nama;?></strong> <small class="text-muted"><?php echo waktu_lalu($row->date);?></small></div>
                                        <p><?php echo $row->comment;?></p>
                                    </div>
                                </li>
                                </div>
								
							<?php endforeach;?>	
						</ul>
					</div>
					<div class="panel-footer">
						<div class="input-group">
							<input id="comments" name="comments" type="text" class="form-control input-md" placeholder="Type your message here..." /><span class="input-group-btn">
								<button onclick="send(<?php echo $question['id_question'];?>)" class="btn btn-primary btn-md" id="btn-chat" >Send</button>
						</span></div>
					</div>
				</div>
			</div><!--/.col-->
		
		
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
 
	function send(id_question){
		var comment = $('#comments').val();
		$.ajax({
			url : "<?php echo base_url('superadmin/Question_Answer/send')?>",
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

    function delete_comment(id_comment){

		$.ajax({
			url : "<?php echo base_url('superadmin/Question_Answer/delete_comment')?>",
			type: "POST",
			data: {
				"id_comment": id_comment
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

	anchors.parent('li').removeClass('active');

	anchors.filter(function() {
		return this.href == url;
	}).closest('li').addClass('active');
	
	</script>
		
</body>
</html>