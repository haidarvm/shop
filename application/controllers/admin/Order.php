<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Order extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->mcategory = new MCategory();
        $this->mproduct = new MProduct();
        $this->morder = new MOrder();
        $this->muser = new MUser();
    }

    public function index() {
        $this->get_all_new();
    }

    /** Get User Confirm Checktou
     * 
     */
    public function get_all_new() {
        $data['title'] = "List Order New";
    	$data['getAll'] = $this->morder->getAllNewOrder();
        $this->load->admin_template('admin/order', $data);
    }
    
    /** Get User Draft Cart
     * 
     */
    public function get_all_draft() {
        $data['title'] = "List Order Draft";
        $data['getAll'] = $this->morder->getAllDraftOrder();
        $this->load->admin_template('admin/order', $data);
    }

    /** Last History Transcation
     * 
     */
    public function get_all_done() {
        $data['title'] = "List Order History";
    	$data['getAll'] = $this->morder->getAllDoneOrder();
        $this->load->admin_template('admin/order', $data);
    }

    /** View Details Order
     * @param unknown $order_id
     */
    public function detail($order_id) {
        $data['title'] = "Admin Order Details";
        $data['user'] = $this->muser->getUserOrderId($order_id);
    	$data['allOrder'] = $this->morder->getOrderItem($order_id);
        $this->load->admin_template('admin/order_details', $data);
    }
    
    /** Confirm if payment recieved
     * @param unknown $order_id
     */
    public function confirm($order_id) {
        $order_id = $post['order_id'];
        $data['action'] = '1';
        $this->morder->updateOrder($data, $order_id);
    }

}