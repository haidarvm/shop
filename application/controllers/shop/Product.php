<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mproduct');
        $this->mproduct = new MProduct();
    }

    public function index() {
        $this->products();
    }

    public function products() {
        $data['title'] = "All Products";
        $data['products'] = $this->mproduct->getAllProduct();
        $this->load->shop_template('shop/products', $data);
    }

    public function product($slug) {
        $data['title'] = "Product Info";
        $data['product'] = $this->mproduct->getProductSlug($slug);
        $data['images'] = $this->mproduct->getProductImg($data['product']->product_id);
        $this->load->shop_template('shop/product', $data);
    }

}
