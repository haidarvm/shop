<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/mdashboard');
        $this->mdashboard = new MDashboard();
        $this->mproduct = new MProduct();
        $this->mcategory = new MCategory();
    }

    public function index() {
        $this->home();
    }

    public function home() {
        $data['title'] = "Dashboard Admin";
        $data['chart'] = true;
        $data['version'] = null;
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
        $this->load->admin_template('admin/dashboard', $data);
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

    public function checkSlug($slug) {
        $slugify = slugify($slug);
        $checkSlug = $this->mproduct->checkSlug($slug);
        if ($checkSlug) {
            return $checkSlug;
        } else {
            return $slugify;
        }
    }
    
    public function other(){
        $data['title'] = "None";
        $data['version'] = 2;
        $data['chart'] = true;
        $this->load->admin_template('admin/dashboard2', $data);
        
    }

}