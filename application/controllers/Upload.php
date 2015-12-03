<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('mproduct');
        $this->mproduct = new MProduct();
    }
    
    public function do_upload($product_id) {
        $upload_path_url = base_url() . 'assets/product/';
        //echo $upload_path_url;
        $config['upload_path'] = FCPATH . 'assets/product/';
        $dataDraftImg['product_id'] = $product_id;
        $dataDraftImg['img_name'] = 'draft';
        // echo 'prod from upload ='.$product_id.'<br>';
        $image_id = $this->mproduct->insertQuickProductImg($dataDraftImg);
        // $image_id = ! empty($image_id) ? $image_id : $this->mproduct->insertQuickProductImg($dataDraftImg);
        $config['file_name'] = $image_id;
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '3000000';
        
        $this->load->library('upload', $config);
        if (! $this->upload->do_upload()) {
            $existingFiles = get_dir_file_info($config['upload_path']);
            $foundFiles = array();
            $f = 0;
            foreach ($existingFiles as $fileName => $info) {
                if ($fileName != 'thumbs') { // Skip over thumbs directory
                                             // set the data for the json array
                    $foundFiles[$f]['name'] = $fileName;
                    $foundFiles[$f]['size'] = $info['size'];
                    $foundFiles[$f]['url'] = $upload_path_url . $fileName;
                    $foundFiles[$f]['thumbnailUrl'] = $upload_path_url  . $fileName;
                    $foundFiles[$f]['deleteUrl'] = base_url() . 'upload/deleteImage/' . $fileName;
                    $foundFiles[$f]['deleteType'] = 'DELETE';
                    $foundFiles[$f]['error'] = null;
                    $f ++;
                }
            }
            $this->output->set_content_type('application/json')->set_output(json_encode(array('files' => $foundFiles)));
        } else {
            $data = $this->upload->data();
            $this->insert_batch($product_id, $data['full_path'],$image_id);
            deleteFiles($data['full_path']);
            // print_r($config);
            // set the data for the json array
            $info = new StdClass();
            $info->name = $data['file_name'];
            $info->size = $data['file_size'] * 1024;
            $info->type = $data['file_type'];
            $info->url = $upload_path_url . $data['file_name'];
            // I set this to original file since I did not create thumbs. change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
//             $info->thumbnailUrl = $upload_path_url . 'thumb/' . $data['file_name'];
            $info->deleteUrl = base_url() . 'upload/deleteImage/' . $data['file_name'];
            $info->deleteType = 'DELETE';
            $info->error = null;
            // print_r($info);
            
            $files[] = $info;
            $data_upload['image_id'] = $image_id;
            $data_upload['img_name'] = $data['client_name'];
            $data_upload['ext'] = strtolower($data['file_ext']);
            $data_upload['size'] = $data['file_size'];
            $data_upload['width'] = $data['image_width'];
            $data_upload['height'] = $data['image_height'];
            $data_upload['type'] = $data['image_type'];
            $data_upload['url'] = $data['orig_name'];
            $data_upload['path'] = $data['full_path'];
//             $data_upload['thumbnail_url'] = $upload_path_url . 'thumb/' . $data['file_name'];
            $this->mproduct->editProductImg($data_upload, $image_id);
            // this is why we put this in the constants to pass only json data
            if (IS_AJAX) {
                echo json_encode(array("files" => $files));
                // this has to be the only data returned or you will get an error.
                // if you don't give this a json array it will give you a Empty file upload result error
                // it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
                // so that this will still work if javascript is not enabled
            } else {
                $file_data['upload_data'] = $this->upload->data();
                $this->load->view('upload/upload_success', $file_data);
            }
        }
    }

    public function deleteImage($file) { // gets the job done but you might want to add error checking and security
        $success = unlink(FCPATH . 'assets/files/' . $file);
        $success = unlink(FCPATH . 'assets/files/thumb/' . $file);
        // info to see if it is doing what it is supposed to
        $info = new StdClass();
        $info->sucess = $success;
        $info->path = base_url() . 'assets/files/' . $file;
        $info->file = is_file(FCPATH . 'assets/files/' . $file);
        
        if (IS_AJAX) {
            // I don't think it matters if this is set but good for error checking in the console/firebug
            echo json_encode(array($info));
        } else {
            // here you will need to decide what you want to show for a successful delete
            $file_data['delete_data'] = $file;
            $this->load->view('admin/delete_success', $file_data);
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
    
    /** To generate Resize into 3 image
     * Execute by insert_multi()
     *
     * @param int $product_id
     * @param file path $ori_file
     */
    public function insert_batch($product_id, $ori_file, $image_id) {
        $info = getimagesize($ori_file);
        $filesize = filesize($ori_file);
        $extension = pathinfo($ori_file, PATHINFO_EXTENSION);
        $type = image_type_to_extension($info[2]);
        list ($width, $height) = getimagesize($ori_file);
        if ($product_id) {
            $data_img['product_id'] = $product_id;
            $data_img['name'] = clearName(basename($ori_file));
            $data_img['full_name'] = basename($ori_file);
            $data_img['path'] = $ori_file;
            $data_img['width'] = $width;
            $data_img['height'] = $height;
            $data_img['ext'] = $extension;
            $data_img['type'] = $type;
            $data_img['size'] = $filesize;
            $this->resize_all($ori_file, $image_id . '.' . $extension);
        }
    }
    
    /** Resize All into 3 img original, small and thumbnail
     * @param unknown $ori
     * @param unknown $new
     */
    public function resize_all($ori, $new) {
        $this->load->library('image_lib');
        $config['image_library'] = 'gd2';
        $config['source_image'] = $ori;
        $config['create_thumb'] = false;
        $config['file_permissions'] = 0777;
        $config['maintain_ratio'] = TRUE;
        list ($width, $height) = getimagesize($config['source_image']);
        $this->mproduct->resize_all($config, $new, min_percent($width, 10), min_percent($height, 10), 85, $type = "ori");
        $this->mproduct->resize_all($config, $new, 460, 460, 85, $type = "small");
        $this->mproduct->resize_all($config, $new, 200, 200, 85, $type = "thumb");
    }

}
