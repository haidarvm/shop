<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/mdashboard');
        $this->mdashboard = new MDashboard();
        $this->mcategory = new MCategory();
    }

    public function index() {
        $this->home();
    }

    public function home() {
        $data['title'] = "Dashboard Admin";
        $data['productDraft'] = $this->mdashboard->getProductDraft();
        if (! $data['productDraft']) {
            $data_draft['name'] = 'draft';
            $insert_id = $this->mdashboard->insertQuickProduct($data_draft);
            $data['productDraft'] = $this->mdashboard->getLatestProductDraft($insert_id);
        }
        $data['categories'] = $this->mcategory->getAllCategories();
        $this->load->admin_template('admin/dashboard', $data);
    }

    public function insert_quick_product() {
        $post = $this->input->post();
        unset($post['_wysihtml5_mode']);
        // print_r($post);
        $post['slug'] = slugify($post['name']);
        return $this->mdashboard->editProduct($post, $post['product_id']);
    }

}