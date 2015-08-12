<?php

class MY_Loader extends CI_Loader {

    public function shop_template($template_name, $vars = array(), $return = FALSE) {
        if ($return) :
            $content = $this->view('shop/shop_template/header', $vars, $return);
            // $content .= $this->view('shop/shop_template/sidebar', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('shop/shop_template/footer', $vars, $return);
            return $content;
         else :
            $this->view('shop/shop_template/header', $vars);
            // $this->view('shop/shop_template/sidebar', $vars);
            $this->view($template_name, $vars);
            $this->view('shop/shop_template/footer', $vars);
        endif;
    }

    public function admin_template($template_name, $vars = array(), $return = FALSE) {
        if ($return) :
            $content = $this->view('admin/admin_template/header', $vars, $return);
            $content .= $this->view('admin/admin_template/sidebar', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('admin/admin_template/footer', $vars, $return);
            
            return $content;
         else :
            $this->view('admin/admin_template/header', $vars);
            $this->view('admin/admin_template/sidebar', $vars);
            $this->view($template_name, $vars);
            $this->view('admin/admin_template/footer', $vars);
        endif;
    }

}