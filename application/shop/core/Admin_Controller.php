<?php

/*
 * A Website Admin backend system
 */
class Admin_Controller extends CI_Controller {

    /*
     * Controller for Admin page
     */
    function __construct() {
        parent::__construct();
        // $this->load->library('form_validation');
        // Set Container Template
        // $this->_container = 'admin/container';
        
        // Admin Authentication
        // $resource = $this->uri->segment(1);
        // if (isset($_SESSION['ca_email'])) {
        // $this->data['loginstatus'] = 1;
        // //return TRUE;
        // } else {
        // //return FALSE;
        // if ($resource != 'admin') {
        // $last_url = str_replace(site_url(), '', current_url());
        // $_SESSION['last_url'] = $last_url;
        // //echo $last_url;
        // flashMsg('message', 'The page you tried to access requires you to be logged in.');
        // redirect('/admin');
        // }
        // }
    }

}
