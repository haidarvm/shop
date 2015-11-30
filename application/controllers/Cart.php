<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @author Haidar Mar'ie
 *         email : haidarvm@gmail.com
 */
class Cart extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mproduct');
        $this->load->model('morder');
        $this->load->library('cart');
        $this->mproduct = new MProduct();
        $this->morder = new MOrder();
    }

    public function index() {
        debug($this->cart->contents());
        die();
    }

    public function cart_list() {
        $data['title'] = "Title";
        $data['mproduct'] = $this->mproduct;
        $data['getAllSize'] = $this->mproduct->getAllSize();
        $data['cart'] = ! empty($this->cart->contents()) ? $this->cart->contents() : false;
        if ($data['cart']) {
            $this->load->shop_template('shop/basket_list', $data);
        } else {
            redirect('product');
        }
    }

    public function json() {
        $data = $this->cart->contents();
        print_r($data);
    }

    public function insert() {
        if (! $this->input->is_ajax_request() || $this->input->server('REQUEST_METHOD') != 'POST') {
            exit('No direct script access allowed');
        }
        
        $return = array('status' => false,'msg' => null);
        $input = $this->input->post();
        
        if (! $input || empty($input['id']) || empty($input['qty']) || empty($input['size'])) {
            $return['msg'] = 'Required input is not available, please try again..';
            
            return $this->jsonData($return);
        }
        
        $product = $this->mproduct->getProduct($input['id']);
        if (! $product) {
            $return['msg'] = 'Selected product couldn\'t be found, please try another product..';
            
            return $this->jsonData($return);
        }
        
        $data = array('id' => $product->product_id,'qty' => $input['qty'],'name' => $product->name,'price' => $product->price,'size' => $input['size']);
        
        $result = $this->cart->insert($data);
        if (! $result) {
            $return['msg'] = 'An error was encountered when inserting cart data, please contact administrator..';
            
            return $this->jsonData($return);
        }
        
        $return['status'] = true;
        $return['msg'] = 'SUCCESS : Selected product has added to your basket..';
        $return['result'] = $result;
        
        return $this->jsonData($return);
    }

    /**
     * Update only one row
     *
     * @param int $rowId            
     */
    public function update($rowId) {
        if (! $this->input->is_ajax_request() || $this->input->server('REQUEST_METHOD') != 'POST') {
            exit('No direct script access allowed');
        }
        
        $return = array('status' => false,'msg' => null);
        $input = $this->input->post();
        
        if (! $input || ! $rowId || empty($input['qty']) || empty($input['size'])) {
            $return['msg'] = 'Required input is not available, please try again..';
            
            return $this->jsonData($return);
        }
        
        $data = array('rowid' => $rowId,'qty' => $input['qty'],'size' => $input['size']);
        
        $result = $this->cart->update($data);
        if (! $result) {
            $return['msg'] = 'An error was encountered when updating cart data, please contact administrator..';
            
            return $this->jsonData($return);
        }
        
        $return['status'] = true;
        $return['msg'] = 'SUCCESS : Updated your basket data..';
        $return['result'] = $result;
        
        return $this->jsonData($return);
    }

    /**
     * For Update Multiple
     */
    public function update_all() {
        $input = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        $size = $this->input->post('size');
        echo "<pre>";
        print_r($input);
        echo "</pre>";
        for ($i = 0; $i < count($input); $i ++) {
            $data = array('rowid' => $input[$i],'qty' => $qty[$i],'size' => $size[$i]);
            
            $this->cart->update($data);
            $this->checkout();
        }
        redirect('cart/list');
    }

    /**
     * Insert Into Table Order
     */
    public function checkout() {
        // $this->update_all();
        // print_r($_SESSION);exit;
        if ($_SESSION['user_id']) {
            $user_id = $_SESSION['user_id'];
        } else {
            redirect('user/login');
        }
        
        // echo $_SESSION['order_id'];exit;
        // $data_order['order_id'] = $this->morder->insertOrder($data_order);
        $data_order['user_id'] = $_SESSION['user_id'];
        foreach ($this->cart->contents() as $item) {
            $_SESSION['order_id'] = ! empty($_SESSION['order_id']) ? $_SESSION['order_id'] : $this->morder->insertOrder($data_order);
            $order_id = $_SESSION['order_id'];
            $data_item['product_id'] = $item['id'];
            $data_item['order_id'] = $order_id;
            $data_item['qty'] = $item['qty'];
            $data_item['size'] = $item['size'];
            $data_item['price'] = $item['price'];
            if ($this->morder->checkOrderItem($order_id, $data_item['product_id'])) {
                $this->morder->updateOrderItem($data_item, $order_id, $data_item['product_id']);
            } else {
                $this->morder->insertOrderItem($data_item);
            }
            // $this->morder->insertOrderItem($data_item);
        }
        // print_r($this->cart->contents());
        // redirect('cart/list');
    }

    public function get_city() {
        // require_once 'library_location/REST_Ongkir.php';
        $this->load->library('REST_Ongkir');
        $rest = new REST_Ongkir(array('server' => 'http://api.ongkir.info/'));
        
        $result = $rest->post('city/list', array('query' => 'b','type' => 'origin','courier' => 'jne','API-Key' => 'a1edf4ed1599db0e7cb5b8e23769ba0d'));
        
        try {
            $status = $result['status'];
            
            // Handling the data
            if ($status->code == 0) {
                $cities = $result['cities'];
                
                foreach ($cities->item as $item) {
                    echo 'Kota: ' . $item . '<br />';
                }
            } else {
                echo 'Tidak ditemukan kota yang diawali "band"';
            }
        } catch (Exception $e) {
            echo 'Processing error.';
        }
    }

    public function get_cost() {
        $this->load->library('REST_Ongkir');
        $rest = new REST_Ongkir(array('server' => 'http://api.ongkir.info/'));
        
        $result = $rest->post('cost/find', array('from' => 'bandung','to' => 'bandung','weight' => 1000,'courier' => 'jne','API-Key' => 'a1edf4ed1599db0e7cb5b8e23769ba0d'));
        
        try {
            $status = $result['status'];
            
            // Handling the data
            if ($status->code == 0) {
                $prices = $result['price'];
                $city = $result['city'];
                
                echo 'Ongkos kirim dari ' . $city->origin . ' ke ' . $city->destination . '<br /><br />';
                
                foreach ($prices->item as $item) {
                    echo 'Layanan: ' . $item->service . ', dengan harga : Rp. ' . $item->value . ',- <br />';
                }
            } else {
                echo 'Tidak ditemukan jalur pengiriman dari bandung ke jakarta';
            }
        } catch (Exception $e) {
            echo 'Processing error.';
        }
    }

    public function delete($rowId) {
        if (! $this->input->is_ajax_request() || $this->input->server('REQUEST_METHOD') != 'POST') {
            exit('No direct script access allowed');
        }
        
        $return = array('status' => false,'msg' => null);
        if (! $rowId) {
            $return['msg'] = 'Required input is not available, please try again..';
            
            return $this->jsonData($return);
        }
        
        $result = $this->cart->remove($rowId);
        if (! $result) {
            $return['msg'] = 'An error was encountered when removing cart data, please contact administrator..';
            
            return $this->jsonData($return);
        }
        
        $return['status'] = true;
        $return['msg'] = 'SUCCESS : Removed your basket data..';
        $return['result'] = $result;
        
        return $this->jsonData($return);
    }

    public function destroy() {
        return $this->cart->destroy();
    }

    private function jsonData($data) {
        return $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

}
