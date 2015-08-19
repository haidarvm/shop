<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mmenu');
        $this->load->model('mpage');
        $this->load->model('mproduct');
        $this->load->model('mcategory');
        $this->load->model('mcart');
        $this->load->model('mcustomer');
        $this->load->model('morder');
        $this->mmenu = new MMenu();
        $this->mpage = new Mpage();
        $this->mproduct = new MProduct();
        $this->mcategory = new MCategory();
        // $cats = array();
        // $cats = $this->mcats->getAllActiveCategories();
        // $this->categories = $cats;
        // $this->nav_list = $this->mmenus->getLinks($position="left");
        // $this->ext_links = $this->mmenus->getLinks($position="right");
        // // Set Container Template
        // $this->_container = 'shop/container';
        // $this->_home = 'shop/home';
        // if ($this->cart->total()) {
        // $this->total_cart = $this->cart->total();
        // } else {
        // $this->total_cart = '0.00';
        // }
        // // This part is used in all the pages so load it here
        // // For customer login status
        // if (isset($_SESSION['customer_first_name'])) {
        // $this->data['customer_status'] = 1;
        // $this->data['loginstatus'] = lang('general_hello') . $_SESSION['customer_first_name'] . " | " . lang('general_logged_in') . "</a>
        // <a href=" . site_url() . '/webshop' . "/logout \">Log out</a>";
        // } else {
        // $this->data['customer_status'] = 0;
        // $this->data['loginstatus'] = "<a href='" . site_url() . "/webshop/login' >You are not logged in.</a> | <a href=\"" . site_url() . '/webshop/login' . "/registration \">My Account</a>";
        // }
        // // Total price will be displayed
        // // handlekurv means shopping cart in Norwegian
        // // sorry for this. I will use English in future.
        // // It's too late and too much work to replace now.
        // if (isset($_SESSION['totalprice'])) {
        // $this->data['handlekurv'] = $_SESSION['totalprice'];
        // } else {
        // $this->data['handlekurv'] = 0;
        // }
        
        // if ($this->uri->segment(2) != 'login') {
        // $last_url = str_replace(site_url(), '', current_url());
        // $_SESSION['last_url_shop'] = $last_url;
        // }
    }

}
