<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model("Jobs_model");

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }

	public function index()
	{
		$data["all"] = $this->db->count_all("jobs");
		$data["design"] = $this->Jobs_model->total("Design & Creative");
		$data["marketing"] = $this->Jobs_model->total("Marketing");
		$data["telemarketing"] = $this->Jobs_model->total("Telemarketing");
		$data["administration"] = $this->Jobs_model->total("Administration");
		$data["teaching"] = $this->Jobs_model->total("Teaching & Education");
		$data["software"] = $this->Jobs_model->total("Software & Web");
		$data["engineering"] = $this->Jobs_model->total("Engineering");
		$data["garments"] = $this->Jobs_model->total("Garments / Texttile");
		$this->load->view('user/home', $data);
    }
}