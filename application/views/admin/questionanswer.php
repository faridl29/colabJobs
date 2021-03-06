<?php $this->load->view('admin/header'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>user/home">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">History</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-6 col-md-12">
				<h1 class="page-header">All Questions</h1>
			</div>
			<div class="col-lg-6 col-md-12">
				<h1 class="page-header text-right"><a  onclick="add_question()" class="btn btn-primary" style="width:120px">Ask Question</a></h1>
			</div>
		</div><!--/.row-->
		
		
		<div class="job_listing_area">
			<div class="job_lists" >

				<?php foreach ($data->result() as $row) :?>
					<div class="col-lg-12 col-md-12" >
						<div class="panel-heading white-bg" style="border-bottom: 1px solid #e9ecf2;">
                            Action
                            <a onclick="delete_question(<?php echo $row->id_question;?>)"> <span class="pull-right panel-toggle panel-button-tab-left"><em class="fa fa-close"></em></span></a>
							<a onclick="edit_question(<?php echo $row->id_question;?>)"> <span class="pull-right panel-toggle panel-button-tab-left"><em class="fa fa-edit"></em></span></a>
                        </div>
						<div class="single_jobs white-bg d-flex justify-content-between" style="display: -webkit-box!important;display: -ms-flexbox!important;display: flex!important">
							<div class="jobs_left d-flex align-items-center" style="width:85%;display: -webkit-box!important;display: -ms-flexbox!important;display: flex!important">
							
								<div class="jobs_conetent" style="margin-right:50px">
									<a href="#" onclick="detail(<?php echo $row->id_question;?>)">
										<h4><?php echo substr($row->title, 0, 200) . (strlen($row->title) > 200 ? "..." : '');?></h4>
									</a>
									<div class="location" style="margin-bottom:-20px;">
										<p><?php echo substr($row->detail, 0, 200) . (strlen($row->detail) > 200 ? "..." : ''); ?></p>
									</div>
									<div class="links_locat d-flex align-items-center" style="display: -webkit-box!important;display: -ms-flexbox!important;display: flex!important">
										
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

				<!-- </div> -->
				<div class="row">
					<div class="col-lg-12">
						<?php echo $pagination;?>
					</div>
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
						<h4 class="modal-title" id="modal_title">Ask Question</h4>
						
					</div>
					<div class="modal-body form">
                            
                            <form action="#" id="form">
                                <input type="hidden" value="" name="id"/> 
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="control-label">Main Question</label>
                                        <textarea name="main" class="form-control" placeholder="Write here..." style="width: 100%; font-size: 14px; height: 60px; border: 1px solid #dddddd; padding: 10px; resize:none"></textarea>
                                        <span class="invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
										<label class="control-label">Detail Question</label>
										<textarea name="detail" class="form-control" placeholder="Write here..." style="width: 100%; font-size: 14px; height: 160px; border: 1px solid #dddddd; padding: 10px; resize:none"></textarea>
										<span class="invalid-feedback"></span>
									</div>
                                          
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnSave" onclick="upload()" class="btn btn-primary upload">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
					
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<!-- End Bootstrap modal -->

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

	var save_label;
 
	var url = window.location;
	var anchors = $('.nav a');

	function add_question(){
		save_label = 'add';
		$('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string	
        $('.invalid-feedback').empty();
        $('#modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Ask Question'); // title heading modal
	}

	function edit_question(id){
		save_label = 'update';
		$('#form')[0].reset(); // reset form on modals
		$('.invalid-feedback').empty();
		document.getElementById('form').reset();
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string

		$.ajax({
			url : "<?php echo base_url('Admin/QuestionAnswer/edit/')?>"+id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{
				$('[name="id"]').val(data.id_question);
				$('[name="main"]').val(data.title);
				$('[name="detail"]').val(data.detail);
				$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
				$('.modal-title').text('Edit Question'); // Set title to Bootstrap modal title

			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});
	}

	function upload(){

		$('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url, method;

		if(save_label == 'add') {
            url = "<?php echo base_url('admin/QuestionAnswer/post')?>";
            method = 'diposting';
        } else {
			url = "<?php echo base_url('admin/QuestionAnswer/update')?>";
            method = 'diupdate';
        }
	
		$.ajax({
			url : url,
			type: "POST",
			data: $('#form').serialize(),
            dataType: "json",
			success: function(data)
			{	
				console.log(data);
				if(data.status)
				{
					
					Swal({
						title: 'Success',
						text: 'Pertanyaan berhasil '+method,
						type: 'success',
						timer:3000,
						showConfirmButton: false
					});

					window.setTimeout(function(){ } ,3000);
                    location.reload();
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
				$('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error posting / update question');
				$('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable
			}
		});
		
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('.invalid-feedback').empty();

		$('#form input').on('keyup', function(){
			$(this).removeClass('is-valid is-invalid');            
		});


		$('#form')[0].reset(); 
	
	}


	function detail(id_question)
  	{
		window.location.href = "<?php echo base_url('admin/detail_question_answer/detail/')?>"+id_question;
  	}

	  function delete_question(id_question){

		Swal({
          title: 'Anda yakin?',
          text: "Akan menghapus pertanyaan ini!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Hapus pertanyaan!'
      }).then((result) => {
		$.ajax({
			url : "<?php echo base_url('admin/QuestionAnswer/delete_question')?>",
			type: "POST",
			data: {
				"id_question": id_question
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

          
      });
		

	}

	anchors.parent('li').removeClass('active');

	anchors.filter(function() {
		return this.href == url;
	}).closest('li').addClass('active');
	
	</script>
		
</body>
</html>