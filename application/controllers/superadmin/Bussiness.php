<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bussiness extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session','pagination'));
		$this->load->model("superadmin/Bussiness_model");

		if($this->session->userdata('status') != "login_admin"){
			redirect(base_url("superadmin/login"));
		}
    }

	public function index()
	{
       //konfigurasi pagination
       $config['base_url'] = site_url('superadmin/Bussiness/index'); //site url
       $config['total_rows'] = $this->db->count_all("jobs"); //total row
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

       $data['data'] = $this->Bussiness_model->get_bussiness_list($config["per_page"], $data['page']);           

	   $data['pagination'] = $this->pagination->create_links();
	   
       $this->load->view('superadmin/view_bussiness', $data);
	}
	
	public function delete_bussiness()
	{
        $data = array(

            'id_bussiness'   => $this->input->post('id_bussiness')
        );

        $this->Bussiness_model->delete_bussiness($this->input->post('id_bussiness'));
        
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    
	}
}