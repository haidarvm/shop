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
        return checkRes($query);
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
    
    function getProductImgDraft($product_id) {
        $this->db->order_by('image_id', "desc");
        $this->db->limit(1);
        $query = $this->db->get_where('product_image', array('product_id' => $product_id,'name' => 'draft'));
        return checkRow($query);
    }

    function getLatestProductDraft($id) {
        $query = $this->db->get_where('product', array('product_id' => $id));
        return checkRow($query);
    }
    
    function getLatestProductImgDraft($id) {
        $this->db->order_by('image_id', "desc");
        $this->db->limit(1);
        $query = $this->db->get_where('product_image', array('product_id' => $id));
        return checkRow($query);
    }

    function getProductSlug($slug) {
        $query = $this->db->get_where('product', array('slug' => $slug));
        return checkRow($query);
    }
    
    function getProductImg($id) {
        $query = $this->db->get_where('product_image', array('product_id' => $id));
        return checkRes($query);
    }

    function checkSlug($slug) {
        $this->db->like('slug', $slug);
        $query = $this->db->get('product');
        if(checkRes($query)) {
            return $this->getLatestExistsSlug($slug);
        } else {
            return false;
        }
    }

    function getLatestExistsSlug($slug) {
        $this->db->order_by('product_id', "desc");
        $this->db->like('slug', $slug);
        $this->db->limit(1);
        $query = $this->db->get('product');
        $slugName = checkRow($query);
        if (strpos($slugName->slug, '-') !== false) {
            $latestSlugPlus = substr($slugName->slug, strrpos($slugName->slug, '-') + 1) +1;
            $latestSlugClear = preg_replace('/[0-9]+/', '', $slugName->slug);
            return $latestSlugClear . $latestSlugPlus;
        } else {
            return $slugName->slug . '-' . 1;
        }
    }

    function getProductCat($prod_id, $cat_id) {
        $query = $this->db->get_where('product', array('product_id' => $prod_id,'category_id' => $cat_id));
        return checkRes($query);
    }

    function insertProductImg($data) {
        $this->db->insert('product_image', $data);
        return $this->db->insert_id();
    }

    function insertQuickProduct($data) {
        $query = $this->db->insert('product', $data);
        return $this->db->insert_id();
    }
    
    function insertQuickProductImg($data) {
        $query = $this->db->insert('product_image', $data);
        return $this->db->insert_id();
    }
    
    function insertProductPrice($data) {
        $data_price['price'] = $data['price'];
        $data_price['unit_id'] = $data['unit_id'];
        $data_price['product_id'] = $data['product_id'];
        $data_price['status'] = 1;
        $data_price['description'] = "Product Pertama";
        $data_price['price'] = numberOnly($data['price']);
        $query = $this->db->insert('product_price', $data_price);
        return $this->db->insert_id();
    }

    function editProduct($data, $id) {
        unset($data['product_id']);
        unset($data['image_id']);
        unset($data['price']);
        unset($data['unit_id']);
        $query = $this->db->update('product', $data, array('product_id' => $id));
        return $query;
    }

    function editProductImg($data, $id) {
        unset($data['image_id']);
        $query = $this->db->update('product_image', $data, array('image_id' => $id));
        fire($this->db->last_query());
        return $query;
    }

}
