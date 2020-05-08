<?php
class History_model extends CI_Model{


    function get_job_by_user($limit, $start, $id_user){
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('jobs', $limit, $start);
        return $query;
    }

    function total($id_user){
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('jobs')->num_rows();
        return $query;
    }

    function get_applyer($id_jobs){
        $this->db->where('id_jobs', $id_jobs);
        $query = $this->db->get('apply_jobs');
        return $query;
    }

    function accept($id, $data = array()){
        $this->db->where("id", $id);
        $apply_jobs = $this->db->get("apply_jobs")->row_array();

        $this->db->where("id_jobs", $apply_jobs['id_jobs']);
        $jobs = $this->db->get("jobs")->row_array();

        date_default_timezone_set('Asia/Jakarta');

        $notif = array(
            'message' => "Permintaan kolaborasi (".$jobs['judul'].") diterima!",
            'date'    => date('Y-m-d H:i:s'),
            'id_user' => $apply_jobs['id_user']
        );

        $this->db->insert('notification', $notif);

        $this->db->where("id", $id);
        $this->db->update("apply_jobs", $data);
        return true;
    }
} 