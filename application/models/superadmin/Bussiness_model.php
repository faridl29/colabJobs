<?php
class Bussiness_model extends CI_Model{


    function get_bussiness_list($limit, $start){
        $query = $this->db->get('jobs', $limit, $start);
        return $query;
    }

    function delete_bussiness($id_jobs){
        $this->db->where("id_jobs", $id_jobs);
        $this->db->delete("jobs");
        return true;
    }

    function get_detail_bussiness($id_jobs){
        $this->db->where('id_jobs', $id_jobs);
        $this->db->join('user', 'user.id_user = jobs.id_user');
        $query = $this->db->get('jobs')->row_array();
        return $query;
    }

} 