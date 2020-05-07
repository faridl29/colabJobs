<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('User_model');
    }

	public function index()
	{
		$data['note'] = "";
		$data['message'] = "";
		$this->load->view('register', $data);
	}
	
	public function aksi_register(){
		$nama = $this->input->post('nama');
        $telepon = $this->input->post('password');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');

		$cek = $this->User_model->isUserExisted($email);
		
		if ($cek == false) {
			if($password != $confirm_password){
				$data['note'] = "Note : ";
				$data['message'] = "Password tidak cocok, periksa kembali!";
				$this->load->view('register', $data);
			} else {
				$this->User_model->simpanUser($nama, $email, $password, $telepon, "default_profile.jpg");
				$data['note'] = "Note : ";
				$data['message'] = "Registrasi berhasil, silahkan login!";
				$this->load->view('register', $data);
			}
		} else {
			
			$data['note'] = "Note : ";
			$data['message'] = "Email telah terdaftar, coba email lain!";
			$this->load->view('register', $data);

		}
		
	
	}
}