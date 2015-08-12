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