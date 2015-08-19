<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mhome');
        $this->mhome = new MHome();
    }

    public function index() {
        $this->show();
    }

    public function show() {
        $data['title'] = 'Home';
//         $data['slide'] = $this->mhome->getSlide();
//         $data['featured'] = $this->mhome->getFeature();
//         $data['categories'] = $this->mproduct->getAllCategories();
        $this->load->shop_template('home', $data);
    }

}