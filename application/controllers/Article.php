<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Article extends CI_Controller {

    private $folder = 'shop/page/';

    function __construct() {
        parent::__construct();
        $this->load->model('mpage', TRUE);
        $this->mpage = new MPage();
    }
    
    public function index() {
        $this->list_article();
    }
    
    public function list_article() {
        echo 'list';
    }
    
}