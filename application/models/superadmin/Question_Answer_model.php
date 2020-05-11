<?php
class Question_Answer_model extends CI_Model{
    
    function get_question_list($limit, $start){
        
        $this->db->select('comments.*, question_answer.*, user.*, count(comments.id_comment) as jumlah');
        $this->db->join('comments', 'comments.id_question = question_answer.id_question','left');
        $this->db->join('user', 'user.id_user = question_answer.id_user');
        $this->db->group_by('question_answer.id_question');   
        $query = $this->db->get('question_answer', $limit, $start);
        return $query;
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

    function delete_comment($id_comment){
        $this->db->where("id_comment", $id_comment);
        $this->db->delete("comments");
        return true;
    }

    function delete_question($id_question){
        $this->db->where("id_question", $id_question);
        $this->db->delete("question_answer");
        return true;
    }
} 