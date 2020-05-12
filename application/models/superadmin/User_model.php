<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function get_list_user() {
        $this->datatables->select('id_user, nama, email, telepon,');
        $this->datatables->from('user');
        $this->datatables->add_column('view', '<button type="button" onclick="hapus_user(`$3`)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button> ','id_user, nama, email, telepon');

        return $this->datatables->generate();
    }
    
    function delete($email){
        $this->db->where('email', urldecode($email));
        $this->db->delete('user');
        return TRUE;
    }
}