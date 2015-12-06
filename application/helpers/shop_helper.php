<?php
// @session_start();
// if (! isset($_SESSION)) :
// @session_start();
// $ci = & get_instance();
// log_message('error', 'Session ALREADY STARTED: ' . $ci->uri->uri_string());
// else :
// @session_start();
// endif;
/**
 * Check if Result Query more or one row
 *
 * @param unknown $query        	
 * @return
 *
 */
function checkRes($query) {
	if ($query->num_rows() > 0) {
		return $query->result();
	} else {
		return false;
	}
}

/**
 * Check if Result Query has one row
 *
 * @param unknown $query        	
 * @return boolean
 */
function checkRow($query) {
	if ($query->num_rows() > 0) {
		return $query->row();
	} else {
		return false;
	}
}

/**
 * Count Row
 *
 * @param unknown $query        	
 * @return boolean
 */
function countRow($query) {
	if ($query->num_rows() > 0) {
		return $query->num_rows();
	} else {
		return false;
	}
}

/**
 * Only Number Allow
 *
 * @param unknown $num        	
 * @return mixed
 */
function numberOnly($num) {
	return preg_replace('/\D/', '', $num);
}

function checkAdminUser() {
	// echo $_SESSION['level_id'];
	if (isset($_SESSION['level_id'])) {
		if ($_SESSION['level_id'] == 1) {
			return true;
		} else {
			redirect('home');
		}
	} else {
		redirect('home');
	}
}

/**
 * User Login insert Session
 *
 * @param unknown $username        	
 * @param unknown $user_id        	
 * @param unknown $full_name        	
 * @param unknown $level        	
 * @param unknown $company_id        	
 * @param unknown $company_name        	
 */
function define_sess($username, $user_id, $full_name, $email, $level_id) {
	// $_SESSION['jk_username'] = $username;
	// $_SESSION['jk_user_id'] = $user_id;
	// $_SESSION['jk_full_name'] = $full_name;
	// $_SESSION['jk_level'] = $level;
	$ci = & get_instance();
	$newdata = array( 'username' => $username, 'user_id' => $user_id, 'full_name' => $full_name, 'email' => $email, 'level_id' => $level_id, 'last_url' => $_SERVER['HTTP_REFERER'], 'logged_in' => TRUE );
	$ci->session->set_userdata($newdata);
	// echo USERNAME;exit;
	// print_r($_SESSION);exit;
}

/**
 * For Back to previous URL
 */
function previous_url() {
	if ($_SESSION['last_url']) {
		return header('Location: ' . $_SESSION['last_url']);
	} elseif ($_SESSION['last_url'] == 'logout') {
		echo 'bad';
	} elseif ($_SESSION['cart_contents']) {
		return redirect('cart/list');
	} elseif (! isset($_SESSION['cart_contents'])) {
		return redirect('product');
	} else {
		return redirect('product/tees');
	}
}

function fire($log) {
	$ci = & get_instance();
	$ci->load->library('firephp');
	return $ci->firephp->log($log, __METHOD__);
}

function uploader($log) {
	$ci = & get_instance();
	$ci->load->library('uploadhandler');
	return $ci->uploadhandler->log($log, __METHOD__);
}

/**
 * Generate Slug
 *
 * @param string $text        	
 * @return string|mixed
 */
function slugify($text) {
	// replace non letter or digits by -
	$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	// trim
	$text = trim($text, '-');
	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	// lowercase
	$text = strtolower($text);
	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);
	if (empty($text)) {
		return 'n-a';
	}
	return $text;
}

/**
 * Get First Digit
 *
 * @param unknown $char        	
 * @return string
 */
function get3Digit($char) {
	return substr($char, 0, 3);
}

/**
 * Image Url
 *
 * @return string
 */
function img_url() {
	return base_url() . 'assets/img/';
}

/**
 * Product Thumbnail Url
 *
 * @return string
 */
function prod_thumb_url() {
	return base_url() . 'assets/product/thumb/';
}

/**
 * Product Original Url
 *
 * @return string
 */
function prod_ori_url() {
	return base_url() . 'assets/product/ori/';
}

/**
 * Product Small Image Url
 *
 * @return string
 */
function prod_small_url() {
	return base_url() . 'assets/product/small/';
}

function basic_path() {
	$fr_loc = explode('/', $_SERVER['SCRIPT_NAME']);
	$base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $fr_loc[1] . '/';
	return $base_path;
}

/**
 *
 * @return page url
 */
function page_url() {
	return site_url() . 'page/';
}

/**
 * Delete Unused Character
 *
 * @param string $text        	
 * @return mixed
 */
function delUn($text) {
	$remove = array( 'copy', 'close' );
	$string = str_replace($remove, '', $text);
	return $string;
}

/**
 * Replace char
 *
 * @param unknown $text        	
 * @return mixed
 */
function repChar($text) {
	$remove = array( '&' );
	$string = str_replace($remove, '-', $text);
	return $string;
}

/**
 * Delete Extension
 *
 * @param unknown $filename        	
 * @return mixed
 */
function delExt($filename) {
	return preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
}

function clearName($filename) {
	return repChar(delUn(delExt($filename)));
}

/**
 * Minus Percantage Ex.
 * 90 - 10% = 80
 *
 * @param number $before        	
 * @param number $min        	
 * @return number
 */
function min_percent($before, $min) {
	return $before * ((100 - $min) / 100);
}

/**
 * Delete files
 *
 * @param path $path        	
 */
function deleteFiles($path) {
	$files = glob($path . '*'); // get all file names
	foreach ($files as $file ) { // iterate files
		if (is_file($file))
			unlink($file); // delete file
				               // echo $file.'file deleted';
	}
}

function debug($params) {
	echo '<pre>';
	print_r($params);
	echo '</pre>';
}

function dump($params) {
	echo '<pre>';
	var_dump($params);
	echo '</pre>';
}

function checkHome() {
}