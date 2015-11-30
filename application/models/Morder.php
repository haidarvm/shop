<?php

/*
 * By Haidar Mar'ie Email = haidarvm@gmail.com MProduct
 */
class MOrder extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAllProduct() {
    }

    function getAllCategories() {
    }

    function getAllUserOrder($user_id) {
        $query = $this->db->get_where('order', array('user_id' => $user_id));
        return checkRes($query);
    }

    function getOrder($order_id) {
        $query = $this->db->get_where('order', array('order_id' => $order_id));
        return checkRes($query);
    }

    function getAllOrderItem($order_id) {
        $sql = "SELECT *,SUM(oi.qty * p.price) as totalPrice, SUM(qty) as qty FROM {PRE}order o
				INNER JOIN {PRE}order_item oi ON o.order_id = oi.order_id
                INNER JOIN {PRE}product p ON p.product_id = oi.product_id
                INNER JOIN {PRE}user u ON u.user_id = o.user_id
                WHERE order_id = $order_id
                GROUP BY o.order_id
				ORDER BY o.order_id DESC";
        $query = $this->db->query($sql);
        // $query = $this->db->get('order', array('is_done' => 0));
        return checkRes($query);
    }

    function getAllNewOrder() {
        $sql = "SELECT *,SUM(oi.qty * p.price) as totalPrice, SUM(oi.qty) as qty FROM {PRE}order o
				INNER JOIN {PRE}order_item oi ON o.order_id = oi.order_id
                INNER JOIN {PRE}product p ON p.product_id = oi.product_id
                INNER JOIN {PRE}category c ON p.category_id = c.category_id
                INNER JOIN {PRE}user u ON u.user_id = o.user_id
                WHERE is_done = 1
                GROUP BY o.order_id
				ORDER BY o.order_id DESC";
        $query = $this->db->query($sql);
        // echo $this->db->last_query();
        // $query = $this->db->get('order', array('is_done' => 0));
        return checkRes($query);
    }

    function getAllDraftOrder() {
        $sql = "SELECT *,SUM(oi.qty * p.price) as totalPrice, SUM(oi.qty) as qty FROM {PRE}order o
				INNER JOIN {PRE}order_item oi ON o.order_id = oi.order_id
                INNER JOIN {PRE}product p ON p.product_id = oi.product_id
                INNER JOIN {PRE}category c ON p.category_id = c.category_id
                INNER JOIN {PRE}user u ON u.user_id = o.user_id
                WHERE is_done = 0
                GROUP BY o.order_id
				ORDER BY o.order_id DESC";
        $query = $this->db->query($sql);
        // echo $this->db->last_query();
        // $query = $this->db->get('order', array('is_done' => 0));
        return checkRes($query);
    }

    /**
     * History Transaction
     * 
     * @return boolean
     */
    function getAllDoneOrder() {
        $sql = "SELECT *,SUM(p.price) as totalPrice, SUM(oi.qty) as qty FROM {PRE}order o
				INNER JOIN {PRE}order_item oi ON o.order_id = oi.order_id
                INNER JOIN {PRE}product p ON p.product_id = oi.product_id
                INNER JOIN {PRE}category c ON p.category_id = c.category_id
                INNER JOIN {PRE}user u ON u.user_id = o.user_id
                WHERE is_done = 2
                GROUP BY o.order_id
				ORDER BY o.order_id DESC";
        $query = $this->db->query($sql);
        // $query = $this->db->get('order', array('is_done' => 0));
        return checkRes($query);
    }

    function getOrderItem($order_id) {
        $sql = "SELECT *, qty * p.price as total_price FROM {PRE}order_item oi
				INNER JOIN {PRE}product p ON p.product_id = oi.product_id
                INNER JOIN {PRE}category c ON p.category_id = c.category_id
				INNER JOIN {PRE}order o ON o.order_id = oi.order_id
				WHERE oi.order_id=$order_id";
        $query = $this->db->query($sql);
        return checkRes($query);
        // $this->db->join('product', 'product.product_id = order_item.product_id');
        // $query = $this->db->get_where('order_item',array('order_id'=> $order_id));
        // return checkRes($query);
    }

    function insertOrderItem($data) {
        $this->db->insert('order_item', $data);
        return $this->db->insert_id();
    }

    function insertOrder($data) {
        $query = $this->db->insert('order', $data);
        return $this->db->insert_id();
    }

    function updateOrder($data, $order_id) {
        return $this->db->update('order', $data, array('order_id' => $order_id));
    }

    function checkOrderIsDone($order_id) {
        $query = $this->db->get_where('order', array('order_id' => $order_id,'is_done' => 1));
        // echo $this->db->last_query();
        return checkRow($query);
    }

    function checkOrderId($order_id) {
        $query = $this->db->get_where('order', array('order_id' => $order_id));
        // echo $this->db->last_query();
        return checkRow($query);
    }

    function checkOrderItem($order_id, $product_id) {
        $query = $this->db->get_where('order_item', array('order_id' => $order_id,'product_id' => $product_id));
        return checkRow($query);
    }

    function checkOrderItemId($order_item_id) {
        $query = $this->db->get_where('order_item', array('order_item_id' => $order_item_id));
        return checkRow($query);
    }

    function updateOrderItem($data, $order_id, $product_id) {
        return $this->db->update('order_item', $data, array("product_id" => $product_id,'order_id' => $order_id));
    }

    function updateOrderItemId($data, $order_item_id) {
        $query = $this->db->update('order_item', $data, array('order_item_id' => $order_item_id));
        return $query;
    }

    function totalPriceOrder($order_id) {
        $sql = "SELECT SUM(oi.qty * p.price) as totalPrice FROM {PRE}order o
				INNER JOIN {PRE}order_item oi ON o.order_id = oi.order_id
                INNER JOIN {PRE}product p ON p.product_id = oi.product_id
				WHERE oi.order_id = $order_id";
        $query = $this->db->query($sql);
        return checkRow($query);
    }

    function getOrderId($order_item_id) {
        $query = $this->db->get_where('order_item', array('order_item_id' => $order_item_id));
        return checkRow($query);
    }

    function deleteOrderItemId($order_item_id) {
        return $this->db->delete("order_item", array('order_item_id' => $order_item_id));
    }

}
