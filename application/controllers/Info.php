<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Info extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('minfo');
        $this->minfo = new minfo();
    }

    public function index(){
    	$this->get_all();
    }

	public function get_all(){
		$order = $this->minfo->getAllInfo();
		header('Access-Control-Allow-Headers: Content-Type');
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		header('Access-Control-Allow-Origin: *');
		echo json_encode($order);
	}
}