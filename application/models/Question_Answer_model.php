<?php
class Question_Answer_model extends CI_Model{
    
    function get_question_all($limit, $start){
        
        $this->db->select('comments.*, question_answer.*, user.*, count(comments.id_comment) as jumlah');
        $this->db->join('comments', 'comments.id_question = question_answer.id_question','left');
        $this->db->join('user', 'user.id_user = question_answer.id_user');
        $this->db->group_by('question_answer.id_question');   
        $query = $this->db->get('question_answer', $limit, $start);
        return $query;
    }

    function get_question_list($limit, $start, $id_user){
        $this->db->select('comments.*, question_answer.*, user.*, count(comments.id_comment) as jumlah');
        $this->db->join('comments', 'comments.id_question = question_answer.id_question','left');
        $this->db->join('user', 'user.id_user = question_answer.id_user');
        $this->db->where('question_answer.id_user', $id_user);   
        $this->db->group_by('question_answer.id_question');      
        $query = $this->db->get('question_answer', $limit, $start);
        return $query;
    }

    function get_question_with_filter($limit, $start, $search){
        
        $this->db->select('comments.*, question_answer.*, user.*, count(comments.id_comment) as jumlah');
        $this->db->join('comments', 'comments.id_question = question_answer.id_question','left');
        $this->db->join('user', 'user.id_user = question_answer.id_user');
        $this->db->like('question_answer.title', $search);
        $this->db->or_like('question_answer.detail', $search);
        $this->db->group_by('question_answer.id_question');   
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

    function update($id, $update = array()){
        $this->db->where("id_question", $id);
        $this->db->update('question_answer', $update);
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

    function delete_question($id_question){
        $this->db->where("id_question", $id_question);
        $this->db->delete("question_answer");
        return true;
    }

    public function get_by_id($id) {
		$this->db->where('id_question',$id);
		$query = $this->db->get('question_answer');
		return $query->row();
    }
} 