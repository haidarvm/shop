<?php

class MY_Loader extends CI_Loader {

    public function shop_template($template_name, $vars = array(), $return = FALSE) {
        if ($return) :
            $content = $this->view('shop/shop_template/shop_header', $vars, $return);
            // $content .= $this->view('shop/shop_template/sidebar', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('shop/shop_template/shop_footer', $vars, $return);
            return $content;
         else :
            $this->view('shop/shop_template/shop_header', $vars);
            // $this->view('shop/shop_template/sidebar', $vars);
            $this->view($template_name, $vars);
            $this->view('shop/shop_template/shop_footer', $vars);
        endif;
    }

    public function admin_template($template_name, $vars = array(), $return = FALSE) {
        checkAdminUser();
        if ($return) :
            $content = $this->view('admin/admin_template/admin_header', $vars, $return);
            $content .= $this->view('admin/admin_template/admin_sidebar', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('admin/admin_template/admin_footer', $vars, $return);
            
            return $content;
         else :
            $this->view('admin/admin_template/admin_header', $vars);
            $this->view('admin/admin_template/admin_sidebar', $vars);
            $this->view($template_name, $vars);
            $this->view('admin/admin_template/admin_footer', $vars);
        endif;
    }

    public function controller($name, $folder = null) {
        $className = str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $name))) . '.php';
        $classPath = ($folder) ? trim($folder, '/') . '/' . $className : $className;

        require_once __DIR__ . '/../controllers/' . $classPath;
    }

}