<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->mcategory = new MCategory();
    }

    public function index() {
        $this->home();
    }

    public function home() {
        $data['title'] = "Dashboard Admin";
        $data['categories'] = $this->mcategory->getAllCategories();
        $this->load->admin_template('admin/dashboard', $data);
    }
    
}