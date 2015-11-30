<?php

/*
 * By Haidar Mar'ie Email = haidarvm@gmail.com MProduct
 */
class MCustomer extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAllCategories() {
        $query = $this->db->get('category');
        return checkRes($query);
    }
    
    function getCategory($id) {
        $query = $this->db->get_where('product', array('product_id', $id));
        return checkRow($query);
    }
    
    
}