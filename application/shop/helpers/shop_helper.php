<?php

// function loadDb() {
// $CI =& get_instance();
// $CI->load->library('database');
// return $CI;
// }
function checkRs($query) {
    // $CI =& get_instance();
    // $CI->load->library('database');
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return false;
    }
}

function checkRow($query) {
    // $CI =& get_instance();
    // $CI->load->library('database');
    if ($query->num_rows() > 0) {
        return $query->row();
    } else {
        return false;
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

function prod_thumb_dir() {
    return base_url() . 'assets/product_thumb/';
}

function prod_dir() {
    return base_url() . 'assets/product/';
}

function basic_path() {
    $fr_loc = explode('/', $_SERVER['SCRIPT_NAME']);
    $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $fr_loc[1] . '/';
    return $base_path;
}