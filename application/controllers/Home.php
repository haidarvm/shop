<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('mhome');
		$this->mhome = new MHome();
		$this->load->model('mproduct');
		$this->mproduct = new MProduct();
	}

	public function index() {
		$this->show();
	}

	public function show() {
		$data['title'] = 'Home';
		$data['products'] = $this->mproduct->getAllProductCat($cat=NULL,4);
		$this->load->shop_template('home', $data);
	}

	public function promo() {
		$data['title'] = 'Promo';
		$this->load->shop_template('shop/promo', $data);
	}

	public function info() {
		phpinfo();
	}
}