<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('mpasar');
		$this->mpasar = new MPasar();
		$this->load->model('morder');
		$this->morder = new MOrder();
	}

	public function index() {
		$this->get_all();
	}

	public function get_all($user_id){
		server_ori();
		$order = $this->morder->getAllUserOrder($user_id);
		// header('Access-Control-Allow-Headers: Content-Type');
		// header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		// header('Access-Control-Allow-Origin: *');
		echo json_encode($order);
	}

	public function get_order_item($order_id=NULL) {
		if($order_id != "undefined") {
			$order = $this->morder->getOrderItem($order_id);
		} else {
			$order= "null";
		}
		//header("Content-Type: application/json");
		header("Expires: 0");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		//$order['total_price'] = $this->morder->totalPriceOrder($order_id);
		header('Access-Control-Allow-Headers: Content-Type');
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		header('Access-Control-Allow-Origin: *');
		echo json_encode($order);

	}

	public function buy(){
		$post = $this->input->post();
		server_ori();
		$postdata = file_get_contents("php://input");
		if (isset($postdata)) {
			$request = json_decode($postdata);
			$user_id = $request->user_id;
			$product = $request->product;
				if($product) {
					$data_order['user_id'] = $user_id;
					if($request->order_id == 0) {
						$order_id = $this->morder->insertOrder($data_order);
					} elseif($this->morder->checkOrderIsDone($request->order_id)) {
						//echo 'masuk sini is done';
						$order_id = $this->morder->insertOrder($data_order);
					} elseif(!$this->morder->checkOrderId($request->order_id)) {
						$order_id = $this->morder->insertOrder($data_order);
					} else {
						$order_id = $request->order_id;
					}
					
					foreach($product as $key => $value){
							//$data["product_id"][] = $key;
							//$data["qty"] = $value;
							//$data[$key] = $value;
							$data_order_item['product_id'] = $key;
							$data_order_item['qty'] = $value;
							$data_order_item['order_id'] = $order_id;
							if($this->morder->checkOrderItem($data_order_item['order_id'],$data_order_item['product_id'])) {
								$this->morder->updateOrderItem($data_order_item,$data_order_item['order_id'],$data_order_item['product_id']);
							} else {
								$this->morder->insertOrderItem($data_order_item);
							}
							//echo $data_product['qty'];
					}

					$response['order_id'] = $order_id;
					$total_price = $this->morder->totalPriceOrder($order_id);
					$response['total_price'] = $total_price->totalPrice;
					//echo $order_id;
					echo json_encode($response);
				}
			//print_r($data);
		} else {
			echo "Not called properly with username parameter!";
		}
	}

	public function checkout($order_id=NULL){
		$post = $this->input->post();
		server_ori();
		//http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
		$postdata = file_get_contents("php://input");
		if (isset($postdata)) {
			//print_r($postdata);
			$request = json_decode($postdata);
			$user_id = $request->user_id;
			$checkout = $request->checkout;
				if($checkout) {
					$data_order['user_id'] = $user_id;
					if($request->order_id == 0) {
						$order_id = $this->morder->insertOrder($data_order);
					} else {
						$order_id = $request->order_id;
					}
					// if($this->morder->checkOrderIsDone($request->order_id)) {
					// 	//echo 'masuk sini is done';
					// 	$order_id = $this->morder->insertOrder($data_order);
					// } else {
					// 	$order_id = $request->order_id;
					// }
					foreach($checkout as $key => $value){
							//$data["product_id"][] = $key;
							//$data["qty"] = $value;
							//$data[$key] = $value;
							$data_order_item['order_item_id'] = $key;
							//echo $key;
							$data_order_item['qty'] = $value;
							$data_order_item['order_id'] = $order_id;
							if($this->morder->checkOrderItemId($data_order_item['order_item_id'])) {
								//echo "ada order id".$data_order_item['order_item_id'];
								$this->morder->updateOrderItemId($data_order_item,$data_order_item['order_item_id']);
							} 
							// else {
							// 	$this->morder->insertOrderItem($data_order_item);
							// }
							//echo $data_product['qty'];
					}

					$response['order_id'] = $order_id;
					$total_price = $this->morder->totalPriceOrder($order_id);
					$response['total_price'] = $total_price->totalPrice;
					//echo $order_id;
					echo json_encode($response);
				}
			//print_r($data);
		} else {
			echo "Not called properly with username parameter!";
		}
	}

	function delete(){
		server_ori();
		//http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
		$postdata = file_get_contents("php://input");
		if (isset($postdata)) {
			$request = json_decode($postdata);
			$order = $this->morder->getOrderId($request);
			$this->morder->deleteOrderItemId($request);
			//print_r($request);
			$total_price = $this->morder->totalPriceOrder($order->order_id);
			$response['total_price'] = $total_price->totalPrice;
			echo json_encode($response);
		}
		//echo $order_item_id;
	}

	public function checkout_confirm(){
		$post = $this->input->post();
		server_ori();
		$postdata = file_get_contents("php://input");
		if (isset($postdata)) {
			$request = json_decode($postdata);
			//print_r($request);
			$dt = new DateTime($request->delivery_date);
			$dt->add(new DateInterval('P1D'));
			$date_format = $dt->format('Y-m-d');
			$confirm['user_id'] = $request->user_id;
			$confirm['delivery_hour'] = $request->delivery_hour;
			$confirm['delivery_date'] = $date_format;
			$confirm['is_done'] = 1;
			$order_id = $request->order_id;
			$total_price = $this->morder->updateOrder($confirm,$order_id);
			$response['total_price'] = $total_price ;
			echo json_encode($response);
		}
	}
}