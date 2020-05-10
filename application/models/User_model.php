<?php

defined('BASEPATH') OR exit('No direct script allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function simpanUser($nama, $email, $password, $telepon, $photo) {
        $uuid = uniqid('', true);
 
        $sql = "INSERT INTO user(id_user, nama, email, telepon, foto, password) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->query($sql,array($uuid, $nama, $email, $telepon, $photo, $password));


        // cek jika sudah sukses
        if ($stmt) {
            $sql = "SELECT * FROM user WHERE email = ?";
			$stmt = $this->db->query($sql, array($email));
		
            return $stmt->row_array();
        } else {
            return false;
        }
    }

    public function getUserByEmailAndPassword($email, $password) {
 
        $sql = "SELECT * from user WHERE email = ? AND password = ?";
		$stmt = $this->db->query($sql, array($email, $password));
 
        if ($stmt) {
            $user = $stmt->row_array();
            
            return $user;
            
        } else {
            return NULL;
        }
    }
 
  
    public function isUserExisted($email) {
		$sql = "SELECT email from user WHERE email = ?";
		$stmt = $this->db->query($sql, array($email));
 

        if ($stmt->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
 

    public function getData($email){
        $this->db->where('email', $email);
        $data = $this->db->get('user');
        if($data->num_rows() > 0){
           
            return $data->row_array();
        }
    }

    public function get_user_by_id($id){
        $this->db->where('id_user', $id);
        $data = $this->db->get('user');
        if($data->num_rows() > 0){
           
            return $data->row_array();
        }
    }

    public function edit_profile($id_user, $update = array()){
        $this->db->where('id_user', $id_user);
		$this->db->update('user', $update);
    }

    public function change_password($id_user, $password) {
 
        $data = array(
            'password'  => $password
        );

        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);

        return true;
    }

}