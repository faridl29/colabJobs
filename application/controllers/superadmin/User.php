<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');// Load Library Ignited-Datatables
		$this->load->library('session');
		$this->load->model("superadmin/User_model");

		if($this->session->userdata('status') != "login_admin"){
			redirect(base_url("superadmin/login"));
		}
    }

	public function index()
	{
        $this->load->view("superadmin/view_user");
	}
	
	function get_user_json() {
		header('Content-Type: application/json');
		echo $this->User_model->get_list_user();
	}

	public function delete($id)
	{
		$this->User_model->delete(urldecode($id));
	}
}