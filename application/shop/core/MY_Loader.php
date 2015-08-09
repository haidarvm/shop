<?php

class MY_Loader extends CI_Loader {

    public function template($template_name, $vars = array(), $return = FALSE) {
        if ($return) :
            $content = $this->view('shop_template/header', $vars, $return);
            // $content .= $this->view('shop_template/sidebar', $vars, $return);
            $content .= $this->view($template_name, $vars, $return);
            $content .= $this->view('shop_template/footer', $vars, $return);
            
            return $content;
         else :
            $this->view('shop_template/header', $vars);
            // $this->view('shop_template/sidebar', $vars);
            $this->view($template_name, $vars);
            $this->view('shop_template/footer', $vars);
        endif;
    }

}