<?php
class Jobs_model extends CI_Model{
    
    function get_jobs_list($limit, $start){
        $query = $this->db->get('jobs', $limit, $start);
        return $query;
    }

    function get_detail_job($id_jobs){
        $this->db->where('id_jobs', $id_jobs);
        $query = $this->db->get('jobs')->row_array();
        return $query;
    }

    function get_job_with_category($limit, $start, $category){
        $this->db->where('jenis_usaha', urldecode($category));
        $query = $this->db->get('jobs', $limit, $start);
        return $query;
    }

    function total($category){
        $this->db->where('jenis_usaha', urldecode($category));
        $query = $this->db->get('jobs')->num_rows();
        return $query;
    }
} 