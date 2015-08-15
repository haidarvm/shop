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
        $data['productDraft'] = $this->mproduct->getProductDraft();
        if (! $data['productDraft']) {
            $data_draft['name'] = 'draft';
            $insert_id = $this->mproduct->insertQuickProduct($data_draft);
            $data['productDraft'] = $this->mproduct->getLatestProductDraft($insert_id);
        }
        $data['categories'] = $this->mcategory->getAllCategories();
        $this->load->admin_template('admin/dashboard', $data);
    }

    public function insert_quick_product() {
        $post = $this->input->post();
        unset($post['_wysihtml5_mode']);
        // print_r($post);
        $post['slug'] = $this->checkSlug($post['name']);
        $this->mproduct->editProduct($post, $post['product_id']);
        echo json_encode($post);
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

}