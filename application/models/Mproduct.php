<?php

/**
 * @author Haidar Mar'ie
 * email : haidarvm@gmail.com
 */
class MProduct extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAllProduct() {
        $this->db->join('category', 'category.category_id = product.category_id');
        $query = $this->db->get('product');
        return checkRes($query);
    }

    function getAllProductCat($cat = NULL, $limit = NULL, $offset = FALSE) {
        // $limit = 16;
        $limit = $limit ? $limit : $limit = 16;
        $offset = $offset ? $offset : $offset = 0;
        $this->db->join('product_image', 'product_image.product_id = product.product_id','left');
        $this->db->join('category', 'category.category_id = product.category_id','inner');
        $this->db->group_by('product.product_id');
        //$not_draft = array('product_image.img_name !=' => 'draft');
        $where = ! empty($cat) ? array('category.slug' => $cat) : array();
        $query = $this->db->get_where('product', $where, $limit, $offset);
        //echo $this->db->last_query();
        return checkRes($query);
    }

    function countAllProductCat($cat = NULL) {
        $this->db->join('product_image', 'product_image.product_id = product.product_id');
        $this->db->join('category', 'category.category_id = product.category_id');
        $this->db->group_by('product.product_id');
        $where = ! empty($cat) ? array('category.slug' => $cat) : array();
        $query = $this->db->get_where('product', $where);
        // echo $this->db->last_query();
        return $query->num_rows();
    }

    function getProduct($id) {
        $this->db->join('product_image', 'product_image.product_id = product.product_id','inner');
        $query = $this->db->get_where('product', array('product.product_id' => $id));
        return checkRow($query);
    }

    function getProductDraft() {
        $this->db->order_by('product_id', "desc");
        $this->db->limit(1);
        $query = $this->db->get_where('product', array('name' => 'draft'));
        //echo $this->db->last_query();
        return checkRow($query);
    }

    /** Draft only
     * @param unknown $product_id
     * @return boolean
     */
    function getProductImgDraft($product_id) {
        $this->db->order_by('image_id', "desc");
        $this->db->limit(1);
        $query = $this->db->get_where('product_image', array('product_id' => $product_id,'img_name' => 'draft'));
        return checkRow($query);
    }
    
    /** Get All Product Image from 1 id
     *
     * @param int $id
     * @return boolean
     */
    function getAllProductImg($id) {
        $query = $this->db->get_where('product_image', array('product_id' => $id, 'img_name !=' => 'draft'));
        return checkRes($query);
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

    
    /** Get Only One Default Product Image
     * @param unknown $id
     * @return boolean
     */
    function getOneProductImg($id) {
        $this->db->limit(1);
        $this->db->order_by('product_id', 'ASC');
        $query = $this->db->get_where('product_image', array('product_id' => $id));
        return checkRow($query);
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

    function getLatestExistsSlug($slug) {
        $this->db->order_by('product_id', "desc");
        $this->db->like('slug', $slug);
        $this->db->limit(1);
        $query = $this->db->get('product');
        $slugName = checkRow($query);
        if (strpos($slugName->slug, '-') !== false) {
            $latestSlugPlus = substr($slugName->slug, strrpos($slugName->slug, '-') + 1) + 1;
            $latestSlugClear = preg_replace('/[0-9]+/', '', $slugName->slug);
            return $latestSlugClear . $latestSlugPlus;
        } else {
            return $slugName->slug . '-' . 1;
        }
    }
    
    function getAllSize() {
		$query = $this->db->get('size');
		return checkRes($query);
	}

    function getCatSlug($cat) {
        $this->db->like('slug', $cat);
        $this->db->limit(1);
        $query = $this->db->get('category');
        // echo $this->db->last_query();
        $row = checkRow($query);
        // print_r($row);exit();
        return $row->category_id;
    }

    function getProductCat($prod_id, $cat_id) {
        $query = $this->db->get_where('product', array('product_id' => $prod_id,'category_id' => $cat_id));
        return checkRes($query);
    }

    function insertProductImg($data) {
        $this->db->insert('product_image', $data);
        return $this->db->insert_id();
    }
    
    // Insert Quick Only
    function insertQuickProduct($data) {
        $query = $this->db->insert('product', $data);
        return $this->db->insert_id();
    }
    
    // Insert Quick Image Only
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

    function updateProduct($data, $id) {
        unset($data['product_id']);
        unset($data['image_id']);
//         unset($data['stock']);
//         unset($data['qty']);
        $data['price'] = numberOnly($data['price']);
        $data['price_en'] = numberOnly($data['price_en']);
        $query = $this->db->update('product', $data, array('product_id' => $id));
        return $query;
    }

    function editProductImg($data, $id) {
        unset($data['image_id']);
        $query = $this->db->update('product_image', $data, array('image_id' => $id));
        fire($this->db->last_query());
        return $query;
    }

    /**
     * Resize Uploaded Image to original, small and thumb
     *
     * @param files $ori            
     * @param files $new            
     */
    function resize_all($config, $new_name, $width, $height, $quality, $type) {
        $config['new_image'] = FCPATH . 'assets/product/' . $type . '/' . $new_name;
        // echo $config['new_image'] . "<br/>";
        $config['width'] = $width;
        $config['height'] = $height;
        $config['quality'] = $quality;
        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        if (! $this->image_lib->resize()) {
        echo $this->image_lib->display_errors();
        }
    }

    function getProductSize() {
        return array('S' => 'Small','M' => 'Medium','L' => 'Large','XL' => 'Extra Large');
    }

}
