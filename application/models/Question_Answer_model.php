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

    function get_question_by_id($id_question){
        $this->db->where('id_question', $id_question);
        $this->db->join('user', 'user.id_user = question_answer.id_user');
        $query = $this->db->get('question_answer');
        return $query;
    }

    function get_comments($id_question){
        $this->db->where('id_question', $id_question);
        $this->db->order_by("date", "asc");
        $this->db->join('user', 'user.id_user = comments.id_user');
        $query = $this->db->get('comments');
        return $query;
    }

    function send($data = array()){
        $this->db->insert("comments", $data);
        return true;
    }
} 