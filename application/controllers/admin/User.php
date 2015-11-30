<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Haidar Mar'ie
 * email : haidarvm@gmail.com
 */
class User extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->muser = new MUser();
        $this->mproduct = new MProduct();
    }

    /** Redirect to product_list
     * 
     */
    public function index() {
        $this->user_list();
    }
    
    /** List All Product
     *
     * @param string Category slug
     */
    public function user_list() {
        $data['title'] = "Admin Category List";
        $data['getAll'] = $this->muser->getAllUser();
        $this->load->admin_template('admin/user_list', $data);
        
    }
    
    /**
     * For Insert View
     * And execute insert
     */
    public function insert() {
        $data['title'] = "Admin Create Category";
        $data['action'] = 'insert';
        $post = $this->input->post();
        if ($post) {
            $insertCategoryId = $this->muser->insertUser($post);
            redirect(site_url() . 'admin/user/user_list');
        }
        $this->load->admin_template('admin/user', $data);
    }
    
    /**
     * For Edit / Update Product
     *
     * @param int $id
     */
    public function update($id = NULL) {
        $data['title'] = "Admin Edit Category";
        $data['action'] = 'update';
        $post = $this->input->post();
        if ($post) {
//             print_r($post);
            if($post['password'] == $post['re_password']) {
                if(!empty($post['password'])) {
                    $post['password'] = md5($post['password']);
                } else {
                    unset($post['password']);
                }
                unset($post['re_password']);
                $post['username'] = $post['email']; 
                $this->muser->updateUser($id, $post);
                redirect(site_url() . 'admin/user/user_list');
            } else {
                redirect(site_url() . 'admin/user/update/'.$id);
            }
        } else {
            $data['user'] = $this->muser->getUser($id);
            $this->load->admin_template('admin/user', $data);
        }
    }
    
}