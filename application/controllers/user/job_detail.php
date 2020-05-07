<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_detail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Jobs_model');

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }

	public function detail($id_jobs)
	{
		$result = $this->Jobs_model->get_detail_job($id_jobs);
		$data['result'] = $result;
		$this->load->view('user/job_detail', $data);
	}
	
}