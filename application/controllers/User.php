<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('muser');
		$this->muser = new MUser();
	}

	public function index() {
		//echo 'test';
		$this->get_all();
	}

  public function get_all() {
    echo 'all';
  }
  public function insert() {
    $postdata = file_get_contents("php://input");
		if (isset($postdata)) {
      print_r($postdata);
			$data = json_decode($postdata);
		  echo $data->username;
      echo  $data->address;
    }
  }
}
