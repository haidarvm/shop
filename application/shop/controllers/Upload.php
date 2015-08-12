<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->do_upload();
    }
    
    public function do_upload() {
        $this->load->library("uploadhandler");
    }

}