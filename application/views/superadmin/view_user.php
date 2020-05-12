<?php $this->load->view('superadmin/header'); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url();?>superadmin/dashboard">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">User</li>
			</ol>
		</div><!--/.row-->

        
        <div class="panel">
			<div class="row">  
                <div class="col-lg-12" style="padding:30px">
                <div class="panel-heading white-bg text-center" style="border-bottom: 1px solid #e9ecf2;">
                   <b> <font color="black">User List </font></b>
                </div>
                <br>    
                <div class="box-body">

                        <table id="user" class="table table-striped table-bordered">
                        <thead>
                            <tr>   
                                <th>No</th>   
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                            <th>No</th>   
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    </div>
                    </div>

		
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
    <script src="<?php echo base_url();?>assets/DataTables/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/DataTables/datatables/js/dataTables.bootstrap.min.js"></script>

	<script type="text/javascript">
 
	var url = window.location;
	var anchors = $('.nav a');

    $(document).ready(function() {
        
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    	{
        return {
          "iStart": oSettings._iDisplayStart,
          "iEnd": oSettings.fnDisplayEnd(),
          "iLength": oSettings._iDisplayLength,
          "iTotal": oSettings.fnRecordsTotal(),
          "iFilteredTotal": oSettings.fnRecordsDisplay(),
          "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
          "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
		  };
        
      table = $("#user").DataTable({
        initComplete: function() {
          var api = this.api();
          $('#user_filter input')
            .off('.DT')
            .on('keyup.DT', function(e) {
                          api.search(this.value).draw();
                      });
        },
        oLanguage: {
                  sProcessing: "loading..."
        },
        processing: true,
        serverSide: true,
        ajax: {
                  "url": "<?= base_url().'superadmin/User/get_user_json'?>",
                  "type": "POST"
              },

        'columnDefs': [{
              'targets': -1 ,
              'searchable': false,
              'orderable': false,
              'className': 'dt-body-center',
              } 
        ],
        order: [[0, 'asc']],
        rowId: function(a){
                  return a;
              },
        
        rowCallback: function(row, data, iDisplayIndex) {
          var info = this.fnPagingInfo();
          var page = info.iPage;
          var length = info.iLength;
                  var index = page * length + (iDisplayIndex + 1);
          $('td:eq(0)', row).html(index);
        }
      });
    });


    function reload_ajax(){
        table.ajax.reload(null, false);
    }

    function hapus_user(id)
    {
        alert(id);
        Swal({
          title: 'Anda yakin?',
          text: "Akan menghapus user ini!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Hapus user!'
      }).then((result) => {
          if(result.value) {
              $.ajax({
                  url : "<?php echo base_url('superadmin/User/delete/')?>"+id,
                  type: "POST",
                  success: function(data)
                  {
                      reload_ajax();
                      Swal({
                        title: 'Success',
                        text: 'User berhasil dihapus',
                        type: 'success'
                    });
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                      alert('Error deleting data');
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