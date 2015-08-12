<?php

/*
 * By Haidar Mar'ie Email = haidarvm@gmail.com MProduct
 */
class MProduct extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAllProduct() {
        $query = $this->db->get('product');
        return checkRs($query);
    }

    function getProduct($id) {
        $query = $this->db->get_where('product', array('product_id' => $id));
        return checkRow($query);
    }

    function getProductSlug($slug) {
        $query = $this->db->get_where('product', array('slug' => $slug));
        return checkRow($query);
    }

    function getProductCat($prod_id, $cat_id) {
        $query = $this->db->get_where('product', array('product_id' => $prod_id,'category_id' => $cat_id));
        return checkRs($query);
    }

}