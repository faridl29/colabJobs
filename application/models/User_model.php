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
        $hash = $this->hashSSHA($password);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"]; // salt
 
        $sql = "INSERT INTO user(id_user, nama, email, telepon, foto, password, salt) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->query($sql,array($uuid, $nama, $email, $telepon, $photo, $encrypted_password, $salt));


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
 
        $sql = "SELECT * from user WHERE email = ?";
		$stmt = $this->db->query($sql, array($email));
 
        if ($stmt) {
            $user = $stmt->row_array();
 
            // verifikasi password user
            $salt = $user['salt'];
            $encrypted_password = $user['password'];
            $hash = $this->checkhashSSHA($salt, $password);
            // cek password jika sesuai
            if ($encrypted_password == $hash) {
                // autentikasi user berhasil
                return $user;
            }
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
 
    public function hashSSHA($password) {
 
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }
 
    public function checkhashSSHA($salt, $password) {
 
        $hash = base64_encode(sha1($password . $salt, true) . $salt);
 
        return $hash;
    }

    public function getData($email){
        $this->db->where('email', $email);
        $data = $this->db->get('user');
        if($data->num_rows() > 0){
           
            return $data->row_array();
        }
    }

    public function edit_profile($id_user, $update = array()){
        $this->db->where('id_user', $id_user);
		$this->db->update('user', $update);
    }

}