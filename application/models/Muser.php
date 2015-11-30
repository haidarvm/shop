<?php

/*
 * By Haidar Mar'ie Email = haidarvm@gmail.com MProduct
 */
class MUser extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    /** Get All User
     * @return boolean
     */
    function getAllUser() {
        $query = $this->db->get("user");
        return checkRes($query);
    }

    /** Get User Profile
     * @param unknown $user_id
     * @return boolean
     */
    function getUser($user_id) {
        $query = $this->db->get_where("user", array('user_id'=>$user_id));
        return checkRow($query);
    }
    
    /** Get User Profile by Order Id
     * @param unknown $user_id
     * @return boolean
     */
    function getUserOrderId($order_id) {
        $this->db->join('user', 'order.user_id = user.user_id','inner');
        $query = $this->db->get_where("order", array('order.order_id'=> $order_id));
        return checkRow($query);
    }

    /** Register User
     * @param unknown $data
     */
    function insertUser($data) {
       $data['level_id'] = '2';
       unset($data['user_id']);
       $this->db->insert("user",$data);
       return $this->db->insert_id();
    }

    /** Update User Profile
     * @param unknown $data
     * @param unknown $user_id
     * @return unknown
     */
    function updateUser($id,$data){
        unset($data['user_id']);
        $this->db->where('user_id',$id);
        $this->db->update('user',$data);
    }
    
    
    function login($username, $password) {
        $this->db->select('username, user_id, full_name, level_id, email');
        $query = $this->db->get_where('user', array(
            'username' => $username,
            'password' => md5($password)
        ));
        // echo $this->db->last_query();
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $user_id = $row->user_id;
            $this->user_login($user_id);
            //echo $this->db->last_query();exit;
            return $query->row(); // if data is true
        } else {
            return false; // if data is wrong
        }
    }
    
    /** Check if user insert Address & others
     * @param unknown $user_id
     */
    function checkUserDetails($user_id) {
        $this->db->where('address is NOT NULL',null, false);
        $query = $this->db->get_where('user', array('user_id'=> $user_id));
        if(checkRow($query)) {
            return checkRow($query);
        } else {
            return false;
        }
    }
    
    function user_login($user_id) {
        $data['user_id'] = $user_id;
        $data['login'] = date('Y-m-d H:i:s');
        $this->db->insert('user_log', $data);
        return $this->db->insert_id();
    }
    
    function user_logout($user_id) {
        $last = $this->check_last_login($user_id);
        $data['logout'] = date('Y-m-d H:i:s');
        $this->db->update('user_log', $data, array(
            'user_id' => $user_id,
            'login' => $last->login
        ));
    }
    
    function check_last_login($user_id) {
        $this->db->order_by("log_id", "desc");
        $this->db->limit(1);
        $query = $this->db->get_where('user_log', array(
            'user_id' => $user_id,
            'logout' => NULL,
            'DATE(login)' => date('Y-m-d')
        ));
        $this->db->last_query();
        return $query->row();
    }

    function checkUserId($user_id){
        $query = $this->db->get_where("user", array('user_id'=>$user_id));
        //echo $this->db->last_query();
        return checkRow($query);
    }

}
