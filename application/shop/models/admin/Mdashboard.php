<?php

/*
 * By Haidar Mar'ie Email = haidarvm@gmail.com MProduct
 */
class MDashboard extends CI_Model {

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

    function getProductDraft() {
        $this->db->order_by('product_id', "desc");
        $this->db->limit(1);
        $query = $this->db->get_where('product', array('name' => 'draft'));
        return checkRow($query);
    }

    function getLatestProductDraft($id) {
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

    function insertQuickProduct($data) {
        $query = $this->db->insert('product', $data);
        return $this->db->insert_id();
    }

    function editProduct($data, $id) {
        unset($data['product_id']);
        $query = $this->db->update('product', $data, array('product_id' => $id));
        return $query;
    }

}