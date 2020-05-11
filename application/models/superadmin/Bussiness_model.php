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

} 