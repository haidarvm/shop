<?php

/*
 * By Haidar Mar'ie Email = haidarvm@gmail.com MProduct
 */
class MPasar extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAllProduct() {
        $query = $this->db->get('product');
        return checkRes($query);
    }

    function getProductCat($category_id) {
        $query = $this->db->get_where('product', array('category_id' => $category_id));
        return checkRes($query);
    }

    function insertCheckout($data) {
      
    }

}
