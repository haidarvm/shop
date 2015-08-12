<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mproduct');
        $this->mproduct = new MProduct();
    }

    public function index() {
        $this->home();
    }

    public function home() {
        $data['title'] = "Dashboard Admin";
//         $data['products'] = $this->mproduct->getAllProduct();
        $this->load->admin_template('admin/dashboard', $data);
    }
    
}