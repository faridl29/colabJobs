<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Jobs_model");

		if($this->session->userdata('status') != "login_admin"){
			redirect(base_url("superadmin/login"));
		}
    }

	public function index()
	{
		$data["user"] = $this->db->count_all("user");
		$data["bussiness"] = $this->db->count_all("jobs");
		$data["question"] = $this->db->count_all("question_answer");
        $this->load->view("superadmin/view_dashboard", $data);
    }
}