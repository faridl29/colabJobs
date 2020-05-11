<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','file'));
        $this->load->library(array('session','pagination'));
        $this->load->model("History_model");
        $this->load->model("Notification_model");

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }

	public function index()
	{
       //konfigurasi pagination
       $config['base_url'] = site_url('admin/History/index'); //site url
       $config['total_rows'] = $this->History_model->total($this->session->userdata("id_user")); //total row
       $config['per_page'] = 6;  //show record per halaman
       $config["uri_segment"] = 4;  // uri parameter
       $choice = $config["total_rows"] / $config["per_page"];
       $config["num_links"] = floor($choice);

       // Membuat Style pagination untuk BootStrap v4
       $config['first_link']       = 'First';
       $config['last_link']        = 'Last';
       $config['next_link']        = 'Next';
       $config['prev_link']        = 'Prev';
       $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
       $config['full_tag_close']   = '</ul></nav></div>';
       $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
       $config['num_tag_close']    = '</span></li>';
       $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
       $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
       $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
       $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
       $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
       $config['prev_tagl_close']  = '</span>Next</li>';
       $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
       $config['first_tagl_close'] = '</span></li>';
       $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
       $config['last_tagl_close']  = '</span></li>';

       $this->pagination->initialize($config);
       $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

       $data['data'] = $this->History_model->get_job_by_user($config["per_page"], $data['page'], $this->session->userdata("id_user"));           

       $data['pagination'] = $this->pagination->create_links();
       $list = $this->History_model->get_applyer("1");  
       $this->session->set_userdata("list_applyer", $list);
       $data["notif"] = $this->Notification_model->get_notification_list($this->session->userdata("id_user"));
       $this->load->view('admin/history', $data);
    }
    
    public function accept($id){
        $data = array(
            'status'		=> "accepted"
        );
    
       $this->History_model->accept($id, $data);
    }

    public function delete_bussiness()
	{
        $data = array(

            'id_bussiness'   => $this->input->post('id_bussiness')
        );

        $this->History_model->delete_bussiness($this->input->post('id_bussiness'));
        
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    
    }
}