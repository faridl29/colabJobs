<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('superadmin/Admin_model', 'Admin_model');

    }

	public function index()
	{
        if($this->session->userdata('status') == "login_admin"){
			redirect(base_url("superadmin/dashboard"));
		}
		
        $data['note'] = "";
		$data['message'] = "";
		$this->load->view('superadmin/view_login', $data);
    }

    public function aksi_login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $data = $this->Admin_model->getData($email);

		if($email != '' && $password != ''){

			// get the user by email and password
			// get user berdasarkan email dan password
			$login = $this->Admin_model->getUserByEmailAndPassword($email, $password);
		 
			if ($login != false) {
                
                $data_session = array(
                    'id_user' => $data['id_user'],
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'telepon' => $data['telepon'],
                    'foto' => $data['foto'],
                    'status' => "login_admin"
                    );
     
                $this->session->set_userdata($data_session);
     
                redirect(base_url(("superadmin/dashboard")));
				
			} else {
                // user tidak ditemukan password/email salah
                $data['note'] = "Note : ";
                $data['message'] = "Email atau password salah!";
				$this->load->view('superadmin/view_login', $data);

			}
		
		}else {
			echo "Isi semua kolom !";
        }
        
    }

    public function logout(){   
        $this->session->sess_destroy();
        redirect(base_url('superadmin/login'));
    }
}