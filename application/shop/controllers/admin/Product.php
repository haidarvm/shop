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
        $data['categories'] = $this->mcategory->getAllCategories();
        $data['error'] = "";
        $this->load->view('admin/product', $data);
    }

    public function do_upload() {
        $config['upload_path'] = FCPATH.'/assets/files/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = 'good.jpg';
        $config['overwrite'] = false;
        $config['max_size'] = 100000;
        $config['max_width'] = 100024;
        $config['max_height'] = 76800;
        $this->load->library('upload', $config);
        if (! $this->upload->do_upload($field = 'filed')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/product', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('admin/product_success', $data);
        }
    }

}