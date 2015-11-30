<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends CI_Controller {

    private $folder = 'shop/page/';

    function __construct() {
        parent::__construct();
        $this->load->model('mpage', TRUE);
        $this->mpage = new MPage();
    }
    
    public function index() {
        $this->list_page();
    }
    
    public function list_page(){
        $data['title'] = "List Page";
        $data['pages'] = $this->mpage->listPage();
        $this->load->template('shop/list_page', $data);
    }
    
    public function get($slug) {
        $data['title'] = $slug;
        $data['page'] = $this->mpage->getPage($slug);
        $this->load->template('shop/page', $data);
    }
    
    public function get_id($page_id) {
        $data['title'] = "Page";
        $data['page'] = $this->mpage->getPageId($page_id);
        $this->load->template('shop/page', $data);
    }
    
    public function promo() {
        $data['title'] = "Promo";
        $this->load->shop_template('shop/page/promo', $data);
    }
    
    public function login() {
        $data['title'] = "Login";
        $this->load->shop_template($this->folder.'login', $data);
    }
    
    public function contact() {
        $data['title'] = "contact";
        $this->load->shop_template($this->folder.'contact', $data);
    }
    
    public function stockist() {
        $data['title'] = "Stockist";
        $this->load->shop_template($this->folder.'stockist', $data);
    }
    
//     public function back_in_stock() {
//         $data['title'] = "Stockist";
//         $this->load->shop_template($this->folder.'back_in_stock', $data);
//     }
    
    public function collaboration() {
        $data['title'] = "contact";
        $this->load->shop_template($this->folder.'collaboration', $data);
        
    }
    
    
}