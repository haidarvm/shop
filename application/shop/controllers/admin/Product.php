<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->mcategory = new MCategory();
        $this->mproduct = new MProduct();
    }

    public function index() {
        $this->create();
    }

    public function create() {
        $data['title'] = "Admin Create Product";
        $data['productDraft'] = $this->mproduct->getProductDraft();
        if (! $data['productDraft']) {
            $dataDraft['name'] = 'draft';
            $insertProductId = $this->mproduct->insertQuickProduct($dataDraft);
            $dataImgDraft['product_id'] = $insertProductId;
            $dataImgDraft['name'] = 'draft';
            // $insertProductImageId = $this->mproduct->insertQuickProductImg($dataImgDraft);
            $data['productDraft'] = $this->mproduct->getLatestProductDraft($insertProductId);
            $data['productImgDraft'] = null;
        }
        $data['productImgDraft'] = $this->mproduct->getProductImgDraft($data['productDraft']->product_id);
        $data['categories'] = $this->mcategory->getAllCategories();
        $this->load->admin_template('admin/product', $data);
    }

    public function blank(){
        $data['title'] = "Admin Blank";
        $this->load->admin_template('admin/blank', $data);
    }
    
    public function insert_quick_product() {
        $post = $this->input->post();
        unset($post['_wysihtml5_mode']);
        // print_r($post);
        $post['slug'] = $this->checkSlug($post['name']);
        $this->mproduct->editProduct($post, $post['product_id']);
        // echo json_encode($post);
        $this->insert_draft_product();
    }

    public function insert_draft_product() {
        $post = $this->input->post();
        $dataDraft['name'] = 'draft';
        $product_id = $this->mproduct->insertQuickProduct($dataDraft);
        $dataImgDraft['product_id'] = $product_id;
        $dataImgDraft['name'] = 'draft';
        // $image_id = $this->mproduct->insertQuickProductImg($dataImgDraft);
        $data['product_id'] = $product_id;
        $data['image_id'] = null;
        echo json_encode($data);
    }

}