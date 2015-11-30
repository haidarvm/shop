<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author Haidar Mar'ie
 * email : haidarvm@gmail.com
 */
class Product extends MY_Controller {

    function __construct() {
        parent::__construct();
//         $this->load->controller('resize', 'admin');
//         $this->resize = new Resize();
        $this->mcategory = new MCategory();
        $this->mproduct = new MProduct();
    }

    /** Redirect to product_list
     * 
     */
    public function index() {
        $this->product_list();
    }

    /** Calling other Page controller function
     * 
     */
    public function calling() {
        echo 'calling';
//         $this->resize->testing();
    }

    /** List All Product
     * 
     * @param string Category slug
     */
    public function product_list($cat = NULL, $page = NULL) {
        $this->load->library('pagination');
        $data['title'] = "Admin Product List";
//         $page = $this->uri->segment(4) ? $this->uri->segment(4);
        $seg_four = $this->uri->segment(4);
        if((string)(int)$seg_four == $seg_four) {
            $page = $seg_four;
            $cat = NULL;
//             echo 'number';exit;
        }
        $config['base_url'] = site_url().'admin/product/list/'.$cat;
        $config['total_rows'] = $this->mproduct->countAllProductCat($cat);
        //echo $config['total_rows'];exit;
        $config['per_page'] = "16";
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        
        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        $this->pagination->initialize($config);
        $data['page'] = ($page) ? $page : 0;
        $data['getAll'] = $this->mproduct->getAllProductCat($cat,$config["per_page"], $page);
        $data['category'] = !empty($cat) ? $cat : NULL ;
        $data['categories'] = $this->mcategory->getAllCategories();
//         $data['mproduct'] = $this->mproduct;
//         $data['getAll'] = $this->mproduct->getAllProductCat($cat);
        $data['sizes'] = $this->mproduct->getProductSize();
        $data['pagination'] = $this->pagination->create_links();
        $this->load->admin_template('admin/product_list', $data);
    }

    /**
     * For Insert View
     * And execute insert
     */
    public function insert() {
        $data['title'] = "Admin Create Product";
        $data['action'] = 'insert';
        $data['productDraft'] = $this->mproduct->getProductDraft();
        $data['productImgs'] = '';
        if (! $data['productDraft']) {
            $dataDraft['name'] = 'draft';
            $insertProductId = $this->mproduct->insertQuickProduct($dataDraft);
            $dataImgDraft['product_id'] = $insertProductId;
            $dataImgDraft['name'] = 'draft';
            // $insertProductImageId = $this->mproduct->insertQuickProductImg($dataImgDraft);
            $data['productDraft'] = $this->mproduct->getLatestProductDraft($insertProductId);
            $data['productImgDraft'] = null;
        }
        $data['productImgDraft'] = $this->mproduct->getProductImgDraft($data['productDraft']->product_id);
        $data['categories'] = $this->mcategory->getAllCategories();
        $data['units'] = $this->mcategory->getAllUnit();
        $this->load->admin_template('admin/product', $data);
    }

    /**
     * For Edit / Update Product
     *
     * @param int $id            
     */
    public function update($id = NULL) {
        $data['title'] = "Admin Edit Product";
        $data['action'] = 'update';
        $post = $this->input->post();
        if ($post) {
            print_r($post);
            $this->mproduct->updateProduct($post, $post['product_id']);
            redirect(site_url() . 'admin/product/product_list');
        } else {
            $data['product'] = $this->mproduct->getProduct($id);
            $data['getAllProductImg'] = $this->mproduct->getAllProductImg($id);
            $data['productImgDraft'] = $this->mproduct->getProductImgDraft($id);
            $data['categories'] = $this->mcategory->getAllCategories();
            $data['units'] = $this->mcategory->getAllUnit();
            $this->load->admin_template('admin/product', $data);
        }
    }

    /**
     * Blank Template
     */
    public function blank() {
        $data['title'] = "Admin Blank";
        $this->load->admin_template('admin/blank', $data);
    }

    /** For Quick Product insert
     * 
     */
    public function insert_quick_product() {
        $post = $this->input->post();
        unset($post['_wysihtml5_mode']);
        $post['slug'] = $this->mproduct->checkSlug($post['name']);
        $post['price_id'] = $this->mproduct->insertProductPrice($post);
        $this->mproduct->editProduct($post, $post['product_id']);
        $this->insert_draft_product();
    }

    /**
     * For Insert Product Draft when add product view
     * to make sure image has product id
     */
    public function insert_draft_product() {
        $post = $this->input->post();
        $dataDraft['name'] = 'draft';
        $product_id = $this->mproduct->insertQuickProduct($dataDraft);
        $dataImgDraft['product_id'] = $product_id;
        $dataImgDraft['name'] = 'draft';
        // $image_id = $this->mproduct->insertQuickProductImg($dataImgDraft);
        $data['product_id'] = $product_id;
        $data['image_id'] = null;
        echo json_encode($data);
    }

    /** Read Directory
     * 
     * @param id $cat The Category product id
     */
    public function read_dir($cat) {
        $data['title'] = "Read Dir";
        $oridir = FCPATH . 'assets/ori/' . $cat . '/';
        $files = array();
        $dir = opendir($oridir); // open the cwd..also do an err check.
        while (false != ($file = readdir($dir))) {
            if (($file != ".") and ($file != "..") and ($file != "index.php")) {
                $files[] = $file; // put in array.
            }
        }
        
        natsort($files); // sort 
        $product_id = '';
        foreach ($files as $file) {
            if ($product_id != get3Digit($file)) {
                // echo("<a href='$oridir$file'>".delUn($file)."</a> <br />\n");
                echo get3Digit($file) . '<br />';
                // $this->insert_batch($oridir.$file);
            }
            $product_id = get3Digit($file);
        }
    }

    /** Insert Product execute by Insert Multi
     *
     * @param string $ori_file file path location
     * @param string $cat Category Sluq
     * @return unknown
     */
    private function insert_product($ori_file, $cat, $price = '125000') {
        $info = getimagesize($ori_file);
        $filesize = filesize($ori_file);
        $extension = pathinfo($ori_file, PATHINFO_EXTENSION);
        $type = image_type_to_extension($info[2]);
        list ($width, $height) = getimagesize($ori_file);
        // echo $width. ' h'.$height .' e'.$extension.'<br/>';
        $data_product['category_id'] = $this->mproduct->getCatSlug($cat);
        $data_product['name'] = clearName(basename($ori_file));
        $data_product['slug'] = slugify($data_product['name']);
        $data_product['shortdesc'] = clearName(basename($ori_file));
        $data_product['price'] = $price;
        $product_id = $this->mproduct->insertQuickProduct($data_product);
        return $product_id;
    }

    /** For Multiple insert read base on folder
     * 
     * @param id $cat The Category product id
     */
    public function insert_multi($cat) {
        $data['title'] = "Read Dir";
        $oridir = FCPATH . 'assets/ori/' . $cat . '/';
        $files = array();
        $dir = opendir($oridir); // open the cwd..also do an err check.
        while (false != ($file = readdir($dir))) {
            if (($file != ".") and ($file != "..") and ($file != "index.php")) {
                $files[] = $file; // put in array.
            }
        }
        
        natsort($files); // sort.  // print.
        $file_name_id = '';
        foreach ($files as $file) {
            if ($file_name_id != get3Digit($file)) {
                // echo $file_name_id;
                // echo("<a href='$oridir$file'>".delUn($file)."</a> <br />\n");
                // echo $file.'<br />';
                // echo get3Digit($file).'<br />';
                $product_id = $this->insert_product($oridir . $file, $cat);
                echo $product_id . '<br/>';
            }
            $this->insert_batch($product_id, $oridir . $file);
            $file_name_id = get3Digit($file);
        }
    }

    /** To generate Resize into 3 image
     * Execute by insert_multi()
     * 
     * @param int $product_id            
     * @param file path $ori_file
     */
    public function insert_batch($product_id, $ori_file) {
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
            $data_img['ext'] = '.'.$extension;
            $data_img['type'] = $type;
            $data_img['size'] = $filesize;
            $image_id = $this->mproduct->insertQuickProductImg($data_img);
            if ($image_id) {
                $this->resize_all($ori_file, $image_id . '.' . $extension);
            }
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
