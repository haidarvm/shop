<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Haidar Mar'ie
 * email : haidarvm@gmail.com
 */
class Category extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->mcategory = new MCategory();
        $this->mproduct = new MProduct();
    }

    /** Redirect to product_list
     * 
     */
    public function index() {
        $this->category_list();
    }
    
    /** List All Product
     *
     * @param string Category slug
     */
    public function category_list() {
        $data['title'] = "Admin Category List";
        $data['getAll'] = $this->mcategory->getAllCategories();
        $this->load->admin_template('admin/category_list', $data);
        
    }
    
    /**
     * For Insert View
     * And execute insert
     */
    public function insert() {
        $data['title'] = "Admin Create Category";
        $data['action'] = 'insert';
        $post = $this->input->post();
        if ($post) {
            $post['slug'] = $this->mcategory->checkSlug($post['category_name']);
            $insertCategoryId = $this->mcategory->insertCategory($post);
            redirect(site_url() . 'admin/category/category_list');
        }
        $this->load->admin_template('admin/category', $data);
    }
    
    /**
     * For Edit / Update Product
     *
     * @param int $id
     */
    public function update($id = NULL) {
        $data['title'] = "Admin Edit Category";
        $data['action'] = 'update';
        $post = $this->input->post();
        if ($post) {
            print_r($post);
            $this->mcategory->updateCategory($post, $post['category_id']);
            redirect(site_url() . 'admin/category/category_list');
        } else {
            $data['category'] = $this->mcategory->getCategory($id);
            $this->load->admin_template('admin/category', $data);
        }
    }
    
}