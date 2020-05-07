<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','file'));
		$this->load->library(array('session','form_validation','upload'));
		$this->load->model("User_model");

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }

	public function index()
	{
		$this->load->view('admin/profile');
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

					$data['status'] = TRUE;
					$this->output->set_content_type('application/json')->set_output(json_encode($data));
				}
			}
			
			else{
				$update = array(
					'nama'      => $this->input->post('nama'),
					'email'		=> $this->input->post('email'),
					'telepon' 	=> $this->input->post('telepon')
				);
			
				$this->User_model->edit_profile($this->session->userdata("id_user"),$update);

				$data['status'] = TRUE;
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
}