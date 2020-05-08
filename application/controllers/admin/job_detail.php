<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_detail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model(array('Jobs_model','History_model'));

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }

	public function detail($id_jobs)
	{
        $result = $this->Jobs_model->get_detail_job($id_jobs);
        $list = $this->History_model->get_applyer($id_jobs);  
        $data['result'] = $result;
		$this->session->set_userdata("list_applyer", $list);
        $this->load->view('admin/job_detail', $data);
    
	}
	
}