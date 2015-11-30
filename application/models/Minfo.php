<?php

/*
 * By Haidar Mar'ie Email = haidarvm@gmail.com MProduct
 */
class MInfo extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function getAllInfo() {
		$query = $this->db->get('info');
		return checkRes($query);
	}

}
