<?php

/*
 * By Haidar Mar'ie Email = haidarvm@gmail.com MProduct
 */
class MCategory extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAllCategories() {
        $query = $this->db->get('category');
        return checkRes($query);
    }

    function getCategory($id) {
        $query = $this->db->get('category');
        return checkRow($query);
    }

    function getCategorySlug($slug) {
        $query = $this->db->get_where('category', array('slug' => $slug));
        return checkRow($query);
    }

    function getAllProduct() {
		
    }
    
    function getAllUnit() {
		$query = $this->db->get('unit');
		return checkRes($query);
	}
    
    function insertUnit($data) {
		$query = $this->db->insert('unit', $data);
		return $this->db->insert_id();
	}

}
