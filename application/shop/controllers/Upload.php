<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->do_upload();
    }

    public function manual() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 100;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (! $this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            print_r($data);
        }
    }

    public function do_upload_good() {
        $config['upload_path'] = FCPATH . '/assets/files/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 50000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $this->load->library('upload', $config);
        if (! $this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('admin/product', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('admin/product_success', $data);
        }
    }

    public function do_upload() {
        $upload_path_url = base_url() . 'assets/files/';
        $config['upload_path'] = FCPATH . 'assets/files/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '30000';
        $config['file_name'] = 'dist.jpg';
        $config['overwrite'] = false;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (! $this->upload->do_upload()) {
            // $error = array('error' => $this->upload->display_errors());
            // $this->load->view('upload', $error);
            $existingFiles = get_dir_file_info($config['upload_path']);
            $foundFiles = array();
            $f = 0;
            foreach ($existingFiles as $fileName => $info) {
                if ($fileName != 'thumbs') { 
                    $foundFiles[$f]['name'] = $fileName;
                    $foundFiles[$f]['size'] = $info['size'];
                    $foundFiles[$f]['url'] = $upload_path_url . $fileName;
                    $foundFiles[$f]['thumbnailUrl'] = $upload_path_url . 'thumbnail/' . $fileName;
                    $foundFiles[$f]['deleteUrl'] = base_url() . 'files/deleteImage/' . $fileName;
                    $foundFiles[$f]['deleteType'] = 'DELETE';
                    $foundFiles[$f]['error'] = null;
                    
                    $f ++;
                }
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('files' => $foundFiles)));
        } else {
            $data = $this->upload->data();
            $config = array();
            $config['file_name'] = 'dist.jpg';
            $config['overwrite'] = false;
            $config['image_library'] = 'gd2';
            $config['source_image'] = $data['full_path'];
            $config['create_thumb'] = TRUE;
            $config['new_image'] = $data['file_path'] . 'thumbnail/';
            $config['maintain_ratio'] = TRUE;
            $config['thumb_marker'] = '';
            $config['width'] = 200;
            $config['height'] = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $info = new StdClass();
            $info->name = 'dist.jpg';
            $data['file_name'] = 'dist.jpg';
            $info->size = $data['file_size'] * 1024;
            $info->type = $data['file_type'];
            $info->url = $upload_path_url . $data['file_name'];
            $info->thumbnailUrl = $upload_path_url . 'thumbnail/' . $data['file_name'];
            $info->deleteUrl = base_url() . 'files/deleteImage/' . $data['file_name'];
            $info->deleteType = 'DELETE';
            $info->error = null;
            $files[] = $info;
            if (IS_AJAX) {
                echo json_encode(array("files" => $files));
            } else {
                $file_data['upload_data'] = $this->upload->data();
                print_r($file_data);
            }
        }
    }

    public function deleteImage($file) { // gets the job done but you might want to add error checking and security
        $success = unlink(FCPATH . 'uploads/' . $file);
        $success = unlink(FCPATH . 'uploads/thumbs/' . $file);
        // info to see if it is doing what it is supposed to
        $info = new StdClass();
        $info->sucess = $success;
        $info->path = base_url() . 'uploads/' . $file;
        $info->file = is_file(FCPATH . 'uploads/' . $file);
        
        if (IS_AJAX) {
            // I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {
            // here you will need to decide what you want to show for a successful delete
            $file_data['delete_data'] = $file;
            $this->load->view('admin/delete_success', $file_data);
        }
    }

}