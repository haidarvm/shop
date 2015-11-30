<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @author Haidar Mar'ie
 *         email : haidarvm@gmail.com
 */
class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mproduct');
        $this->load->model('morder');
        $this->load->model('muser');
        $this->mproduct = new MProduct();
        $this->morder = new MOrder();
        $this->muser = new MUser();
    }

    public function index() {
        $this->login();
    }
    
    public function login($msg = NULL) {
        $data['msg'] = $msg;
        $data['pageTitle'] = "Login";
        print_r($this->session->userdata('item'));
        if(isset($_SESSION['user_id'])) {
            redirect('user/profile');
        } else {
            $this->load->shop_template('shop/login',$data);
        }
//         print_r($_SESSION);exit;
//         echo $_SESSION['user_id'];
        //$this->load->shop_template('shop/login', $data);
    }
    
    public function do_login() {
        $post = $this->input->post();
        if ($post) {
            try {
                $login = $this->muser->login($post['email'], $post['password']);
                if ($login !== FALSE) {
                    define_sess($login->username, $login->user_id, $login->full_name, $login->email, $login->level_id);
                    // print_r($_SESSION);exit;
                    if($_SESSION['cart_contents']) {
                        previous_url();
                    } else {
                        redirect('product/tees');
                    }
                } else {
                    // throw new Exception("Username Or Password is invalid");
                    $msg = "Username Or Password is invalid";
                    $this->login($msg);
                }
            } catch ( Exception $e ) {
                echo $e->getMessage();
            }
        }
    }
    
    
    /** Register / Create New User Account
     * 
     */
    public function register() {
        $data['title'] = "Register New User";
        $post = $this->input->post();
        if(isset($_SESSION['user_id'])) {
            redirect('user/profile');
        }
        if($post) {
            $password = $post['password'];
			$post['password'] = md5($post['password']);
			$post['full_name'] = $post['first_name'].' '. $post['last_name'];
			$post['username'] = $post['email'];
			unset($post['re_password']);
            $user_id = $this->muser->insertUser($post);
            if($user_id) {
                $login = $this->muser->login($post['email'], $password);
                define_sess($login->username, $login->user_id, $login->full_name,$login->email, $login->level_id);
                //print_r($login);exit;
                previous_url();
            }
        }
//         print_r($_SESSION);
//         print_r($_SESSION['cart_contents']);
        $this->load->shop_template('shop/register', $data);
    }
    
    

    /** Get User Profile Details
     * 
     */
    public function profile() {
        $data['title'] = "Title";
        //print_r($_SESSION);
        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $data['user'] = $this->muser->getUser($user_id);
            $this->load->shop_template('shop/register', $data);
        } else {
            redirect('user/login');
        }
    }
    
    public function check() {
        $details = $this->muser->checkUserDetails($_SESSION['user_id']);
        echo $details->address;
    }
    
    /** Get User Profile Details
     *
     */
    public function address() {
        $data['title'] = "Register New User";
        $post = $this->input->post();
        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $data['user'] = $this->muser->getUser($user_id);
        } else {
            redirect('user/login');
        }
        if($post) {
			$post['full_name'] = $post['first_name'].' '. $post['last_name'];
			$post['username'] = $post['email'];
            $user_id = $this->muser->updateUser($user_id, $post);
            previous_url();
        }
        $this->load->shop_template('shop/address', $data);
    }
    
    
    public function update(){
        $data['title'] = "Title";
        $this->load->shop_template('shop/list_cart', $data);
    }
    
    
    
    public function logout() {
        $this->muser->user_logout($_SESSION['gps_user_id']);
        session_destroy();
        redirect('home');
    }
    
    public function check_log() {
        $post['email'] = 'haidarvm@gmail.com';
        $post['password'] = 'haidar';
        $login = $this->muser->login($post['email'], $post['password']);
        print_r($login);
    }
}