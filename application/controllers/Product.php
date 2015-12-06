<?php
if (! defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 *
 * @author Haidar Mar'ie
 *         email : haidarvm@gmail.com
 */
class Product extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->controller('page', 'admin');
		$this->load->model('mhome');
		$this->load->model('mproduct');
		$this->mhome = new MHome();
		$this->mproduct = new MProduct();
	}

	public function index() {
		$this->cat('tanaman-hias');
	}

	public function calling() {
		echo 'calling';
		$this->page = new Page();
		$this->page->list_page();
	}

	public function detail($id) {
		$data['title'] = 'Details';
		$data['product'] = $this->mproduct->getProduct($id);
		$data['images'] = $this->mproduct->getAllProductImg($id);
		$this->load->shop_template('shop/product_detail', $data);
	}

	public function cat($cat = NULL, $page = NULL) {
		$this->load->library('pagination');
		$data['title'] = "Product";
		$config['base_url'] = site_url() . 'product/cat/' . $cat;
		$config['total_rows'] = $this->mproduct->countAllProductCat($cat);
		// echo $config['total_rows'];exit;
		$config['per_page'] = "16";
		// $config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		// config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['page'] = ($page) ? $page : 0;
		$data['product'] = $this->mproduct->getAllProductCat($cat, $config["per_page"], $page);
		$data['mproduct'] = $this->mproduct;
		$data['sizes'] = $this->mproduct->getProductSize();
		$data['pagination'] = $this->pagination->create_links();
		$this->load->shop_template('shop/product', $data);
	}
}
