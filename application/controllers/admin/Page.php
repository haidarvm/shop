<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends CI_Controller {

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
        $this->load->admin_template('admin/list_page_admin', $data);
    }
    
    public function add() {
        $data['title'] = "Add Page";
        $this->load->admin_template('shop/page_admin', $data);
    }
    
    public function update($page_id) {
        $data['title'] = "Page";
        $data['page'] = $this->mpage->getPageId($page_id);
        $this->load->admin_template('shop/page_admin', $data);
    }
    
    
}