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
    
    function checkSlug($slug) {
        $this->db->like('slug', $slug);
        $query = $this->db->get('product');
        if (checkRes($query)) {
            return $this->getLatestExistsSlug($slug);
        } else {
            return slugify($slug);
        }
    }
    
    function getAllUnit() {
		$query = $this->db->get('unit');
		return checkRes($query);
	}
	
	function insertCategory($data) {
        unset($data['category_id']);
	    $query = $this->db->insert('category', $data);
	    return $this->db->insert_id();
	}
	
	function updateCategory($data, $id) {
	    unset($data['category_id']);
	    $query = $this->db->update('category', $data, array('category_id' => $id));
	    return $query;
	}

}
