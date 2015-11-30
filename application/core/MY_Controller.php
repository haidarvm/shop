<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mmenu');
        $this->load->model('mpage');
        $this->load->model('mproduct');
        $this->load->model('mcategory');
        $this->load->model('mcart');
        $this->load->model('morder');
        $this->load->model('muser');
        $this->mmenu = new MMenu();
        $this->mpage = new Mpage();
        $this->mproduct = new MProduct();
        $this->muser = new MUser();
        $this->mcategory = new MCategory();
    }

}
