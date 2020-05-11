<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionAnswer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','file'));
        $this->load->library(array('session','pagination','form_validation'));
        $this->load->model("Question_Answer_model");
        $this->load->model("Notification_model");

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }

	public function index()
	{
       //konfigurasi pagination
       $config['base_url'] = site_url('admin/History/index'); //site url
       $config['total_rows'] = $this->Question_Answer_model->get_total_question($this->session->userdata("id_user"))->num_rows(); //total row
       $config['per_page'] = 6;  //show record per halaman
       $config["uri_segment"] = 4;  // uri parameter
       $choice = $config["total_rows"] / $config["per_page"];
       $config["num_links"] = floor($choice);

       // Membuat Style pagination untuk BootStrap v4
       $config['first_link']       = 'First';
       $config['last_link']        = 'Last';
       $config['next_link']        = 'Next';
       $config['prev_link']        = 'Prev';
       $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
       $config['full_tag_close']   = '</ul></nav></div>';
       $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
       $config['num_tag_close']    = '</span></li>';
       $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
       $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
       $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
       $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
       $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
       $config['prev_tagl_close']  = '</span>Next</li>';
       $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
       $config['first_tagl_close'] = '</span></li>';
       $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
       $config['last_tagl_close']  = '</span></li>';

       $this->pagination->initialize($config);
       $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

       $data['data'] = $this->Question_Answer_model->get_question_list($config["per_page"], $data['page'], $this->session->userdata("id_user"));           

       $data['pagination'] = $this->pagination->create_links();

       $data["notif"] = $this->Notification_model->get_notification_list($this->session->userdata("id_user"));

       $this->load->view('admin/questionanswer', $data);
    }
    
    public function post(){

		$data = array();
		$data['status'] = TRUE;

		$this->_validate();

        if ($this->form_validation->run() == FALSE )
        {
            $errors = array(
                'main' 			    => form_error('main'),
				'detail' 			=> form_error('detail')
			);
            $data = array(
                'status' 		=> FALSE,
				'errors' 		=> $errors
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }else{

            $upload = array(
                'id_user'			=> $this->session->userdata("id_user"),
                'title'      		=> $this->input->post('main'),
                'detail'			=> $this->input->post('detail'),
                'date'			    => date('Y-m-d H:i:s'),
            );
        
            $this->Question_Answer_model->insert($upload);

            $data['status'] = $upload;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
			
		}
	}

	private function _validate()
	{
		$this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('main', 'Main Question', 'required');
		$this->form_validation->set_rules('detail', 'Detail Question', 'required');
    }
    
    public function delete_question()
	{
        $data = array(

            'id_question'   => $this->input->post('id_question')
        );

        $this->Question_Answer_model->delete_question($this->input->post('id_question'));
        
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    
	}
}