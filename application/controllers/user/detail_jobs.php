<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_jobs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Jobs_model');
    }

	public function index()
	{
		$this->load->view('user/detail_jobs');
    }
}