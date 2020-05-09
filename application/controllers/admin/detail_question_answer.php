<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_question_answer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model(array('Question_Answer_model','History_model','Notification_model'));

		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}
    }

	public function detail($id_question)
	{
        $data["notif"] = $this->Notification_model->get_notification_list($this->session->userdata("id_user"));
        $data["question"] = $this->Question_Answer_model->get_question_by_id($id_question)->row_array();
        $data["comments"] = $this->Question_Answer_model->get_comments($id_question);
       
        $this->load->view('admin/detail_questionanswer', $data);
    
    }
    
    public function send()
	{
        $data = array(

            'id_question'   => $this->input->post('id_question'),
			'id_user'       => $this->session->userdata("id_user"),
			'comment'       => $this->input->post('comment'),
			'date'          => date('Y-m-d H:i:s'),
        );

        $this->Question_Answer_model->send($data);
        
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    
	}
	
}