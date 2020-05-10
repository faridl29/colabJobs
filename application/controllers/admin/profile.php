<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','file'));
		$this->load->library(array('session','form_validation','upload'));
		$this->load->model(array("User_model","Notification_model","History_model","Question_Answer_model"));

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }

	public function index()
	{
		$data["notif"] = $this->Notification_model->get_notification_list($this->session->userdata("id_user"));
		$data["total_bussiness"] = $this->History_model->total($this->session->userdata("id_user"));
		$data["total_question"] = $this->Question_Answer_model->get_total_question($this->session->userdata("id_user"))->num_rows();
		$this->load->view('admin/profile', $data);
	}
	
	public function edit_profile(){

		$data = array();
		$data['status'] = TRUE;

		$this->_validate();

        if ($this->form_validation->run() == FALSE )
        {
            $errors = array(
                'nama' 			    => form_error('nama'),
				'email' 			=> form_error('email'),
				'telepon'           => form_error('telepon'),
			);
            $data = array(
                'status' 		=> FALSE,
				'errors' 		=> $errors
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }else{

			if(isset($_FILES['images']['name']) && !empty($_FILES['images']['name'])){
				// File upload configuration 
				$uploadPath = 'images/'; 
				$config['upload_path'] = $uploadPath; 
				$config['allowed_types'] = 'jpg|jpeg|png'; 		
				
				$this->upload->initialize($config);
				
				// Upload file to server 
				if($this->upload->do_upload('images')){

					$gbr = $this->upload->data();
					//Compress Image
					$config['image_library']='gd2';
					$config['source_image']='images/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['width']= 200;
					$config['height']= 200;
					$config['new_image']= 'images/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar=$gbr['file_name'];
					
					$update = array(
						'nama'      => $this->input->post('nama'),
						'email'		=> $this->input->post('email'),
						'telepon' 	=> $this->input->post('telepon'),
						'foto'		=> $gambar
					);
				
					$this->User_model->edit_profile($this->session->userdata("id_user"),$update);

				}
			}
			
			else{
				$update = array(
					'nama'      => $this->input->post('nama'),
					'email'		=> $this->input->post('email'),
					'telepon' 	=> $this->input->post('telepon')
				);
			
				$this->User_model->edit_profile($this->session->userdata("id_user"),$update);

				
			}

			$user = $this->User_model->get_user_by_id($this->session->userdata("id_user"));
				$data_session = array(
					'id_user' => $user['id_user'],
					'nama' => $user['nama'],
					'email' => $user['email'],
					'telepon' => $user['telepon'],
					'foto' => $user['foto'],
					'status' => "login"
					);
		
				$this->session->set_userdata($data_session);

				$data['status'] = TRUE;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));

		}
	}

	public function change_password(){

		$data = array();
		$data['status'] = TRUE;

		$this->_validate_password();

        if ($this->form_validation->run() == FALSE )
        {
            $errors = array(
                'last_password' 		=> form_error('last_password'),
				'new_password' 			=> form_error('new_password'),
				'confirm_new_password'  => form_error('confirm_new_password'),
			);
            $data = array(
                'status' 		=> FALSE,
				'errors' 		=> $errors
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }else{
			$last_password = $this->input->post("last_password");
			$new_password = $this->input->post("new_password");
			$cek = $this->User_model->getUserByEmailAndPassword($this->session->userdata("email"), $last_password);

			if ($cek != false) {
	
				$this->User_model->change_password($this->session->userdata("id_user"),$new_password);

				$data['status'] = TRUE;
				$data['error'] = false;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));

			}else{
				$data['status'] = TRUE;
				$data['error'] = TRUE;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}

		}
	}

	private function _validate()
	{
		$this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required');
		
	}

	private function _validate_password()
	{
		$this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('last_password', 'Last Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required');
		$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'required|matches[new_password]');
		
	}
}