<?php
class Question_Answer_model extends CI_Model{
    
    function get_question_list($limit, $start, $id_user){
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('question_answer', $limit, $start);
        return $query;
    }
    
    function get_total_question($id_user){
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('question_answer');
        return $query;
    }

    function insert($upload = array()){
        $this->db->insert('question_answer', $upload);
        return TRUE;
    }
} 