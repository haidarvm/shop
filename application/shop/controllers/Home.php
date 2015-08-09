<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mhome');
        $this->mhome = new Mhome();
    }

    public function index() {
        $this->show();
    }

    public function show() {
//         $data['slide'] = $this->mhome->getSlide();
//         $data['featured'] = $this->mhome->getFeature();
//         $data['categories'] = $this->mproduct->getAllCategories();
            echo 'home';
    }

}