<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mcategory');
        $this->mcategory = new MCategory();
    }

    public function index() {
        $this->all_category();
    }

    public function categories() {
        $data['categories'] = $this->mcategory->getAllCategories();
        $this->load->shop_template('shop/categories', $data);
    }

    public function category($slug) {
        $data['category'] = $this->mcategory->getCategorySlug($slug);
        $this->load->shop_template('shop/category', $data);
    }

}