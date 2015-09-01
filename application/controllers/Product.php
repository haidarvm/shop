<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('mpasar');
		$this->mpasar = new MPasar();
	}

	public function index()
	{
		//echo 'test';
		$this->get_all();
	}

	public function get_all(){
		$product = $this->mpasar->getAllProduct();
		header('Access-Control-Allow-Headers: Content-Type');
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		header('Access-Control-Allow-Origin: *');
		echo json_encode($product);
	}

	public function list_product_cat($category_id) {
		$product = $this->mpasar->getProductCat($category_id);
		header('Access-Control-Allow-Headers: Content-Type');
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		header('Access-Control-Allow-Origin: *');
		echo json_encode($product);
	}

	public function checkout(){
		$post = $this->input->post();
		if (isset($_SERVER['HTTP_ORIGIN'])) {
			header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Max-Age: 86400');    // cache for 1 day
		}

		// Access-Control headers are received during OPTIONS requests
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Control-Allow-Headers:
			{$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
			exit(0);
		}

		//http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
		$postdata = file_get_contents("php://input");
		if (isset($postdata)) {
			$request = json_decode($postdata);
			$qty = $request->qty;
			//print_r($qty);
			$data["product_id"] = array();
			$data["qty"] = array();
			foreach($qty as $key => $value){
					//$data["product_id"][] = $key;
					//$data["qty"] = $value;
					$data[$key] = $value;
			}
			print_r($data);
		} else {
			echo "Not called properly with username parameter!";
		}
	}
}
