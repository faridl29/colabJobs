<?php

defined('BASEPATH') OR exit('No direct script allowed');

class Admin_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
    }

    public function getUserByEmailAndPassword($email, $password) {
 
        $sql = "SELECT * from user WHERE email = ? AND password = ? AND level = ?";
		$stmt = $this->db->query($sql, array($email, $password, "superadmin"));
 
        if ($stmt) {
            $user = $stmt->row_array();
            
            return $user;
            
        } else {
            return NULL;
        }
    } 

    public function getData($email){
        $this->db->where('email', $email);
        $data = $this->db->get('user');
        if($data->num_rows() > 0){
           
            return $data->row_array();
        }
    }
    
}