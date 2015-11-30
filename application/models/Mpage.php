<?php

class MPage extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function listPage() {
        $query = $this->db->get_where('page');
        return $query->result();
    }
    
    function getPage($slug) {
        $query = $this->db->get_where('page', array('slug'=>$slug));
        return $query->row();
    }
    
    function getPageId($page_id) {
        $query = $this->db->get_where('page', array('id'=>page_id));
        return $query->row();
    }
    
    function insertPage($data) {
        $query = $this->db->insert('page',$data);
		return $this->db->insert_id();
    }
    
    function updatePage($data,$page_id) {
        $query = $this->db->update('page', $data, array('page_id'=>$page_id));
        return $query;
    }

}