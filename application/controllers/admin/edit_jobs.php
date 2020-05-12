<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_jobs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','file'));
		$this->load->library(array('session','form_validation','upload'));
		$this->load->model("Jobs_model");
		$this->load->model("Notification_model");

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }

    public function edit($id)
	{
        $data["notif"] = $this->Notification_model->get_notification_list($this->session->userdata("id_user"));
        $data["data"] = $this->Jobs_model->get_detail_job($id);
        $this->load->view("admin/edit_jobs",$data);
	}

	public function update(){

		$data = array();
		$data['status'] = TRUE;

		$this->_validate();

        if ($this->form_validation->run() == FALSE )
        {
            $errors = array(
                'judul' 			    => form_error('judul'),
				'deskripsi' 			=> form_error('deskripsi'),
				'nama_perusahaan'       => form_error('nama_perusahaan'),
                'jenis_usaha'           => form_error('jenis_usaha'),
                'domisili'              => form_error('domisili'),
				'contact'              	=> form_error('contact'),
				'dateline'             	=> form_error('dateline'),
				'images'           		=> form_error('images')
			);
            $data = array(
                'status' 		=> FALSE,
				'errors' 		=> $errors
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }else{

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
					'id_user'			=> $this->session->userdata("id_user"),
					'judul'      		=> $this->input->post('judul'),
					'deskripsi'			=> $this->input->post('deskripsi'),
					'nama_perusahaan' 	=> $this->input->post('nama_perusahaan'),
					'jenis_usaha' 		=> $this->input->post('jenis_usaha'),
					'domisili' 			=> $this->input->post('domisili'),
					'contact' 			=> $this->input->post('contact'),
					'published'			=> date('y-m-d'),
					'dateline'			=> urldecode($this->input->post('dateline')),
					'photo'				=> $gambar
				);
			
				$this->Jobs_model->update($this->input->post('id'), $update);

				$data['status'] = TRUE;
				$this->output->set_content_type('application/json')->set_output(json_encode($data));
			}
		}
    }

    private function _validate()
	{
		$this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
        $this->form_validation->set_rules('jenis_usaha', 'Jenis Usaha', 'required');
        $this->form_validation->set_rules('domisili', 'Domisili', 'required');
		$this->form_validation->set_rules('contact', 'Contact Person', 'required');
		$this->form_validation->set_rules('dateline', 'Dateline', 'required');
		if (empty($_FILES['images']['name']) && $_FILES['images']['error'] == 4)
		{
			$this->form_validation->set_rules('images', 'Document', 'required');
		}
	}
    
}