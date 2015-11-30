<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Resize extends CI_Controller {

    function __construct() {
        parent::__construct();;
        $this->load->model('mproduct', TRUE);
        $this->mproduct = new MProduct();
    }

    public function index() {
        $this->testing();
    }
    
    public function testing() {
		echo 'testing';
	}
	
	public function resize_all($ori, $new) {
	    $this->load->library('image_lib');
	    $config['image_library'] = 'gd2';
	    $config['source_image'] = $ori;
	    $config['create_thumb'] = false;
	    $config['file_permissions'] = 0777;
	    $config['maintain_ratio'] = TRUE;
	    list($width, $height) = getimagesize($config['source_image']);
	    $this->mproduct->resize_all($config, $new, min_percent($width,10), min_percent($height,10), 85, $type="ori");
	    $this->mproduct->resize_all($config, $new, 460, 460, 85, $type="small");
	    $this->mproduct->resize_all($config, $new, 200, 200, 85, $type="thumb");
	}
	
}
