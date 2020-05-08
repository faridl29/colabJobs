<?php
class Notification_model extends CI_Model{
    
    function get_notification_list($id_user){
        $this->db->where("id_user", $id_user);
        $query = $this->db->get('notification');
        return $query;
    }
    
} 