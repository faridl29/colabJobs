<?php
class Jobs_model extends CI_Model{
    
    function get_jobs_list($limit, $start){
        $query = $this->db->get('jobs', $limit, $start);
        return $query;
    }
} 