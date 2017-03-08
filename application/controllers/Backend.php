<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $this->load->model('categories', '', TRUE);
            $followers = $this->followers(false);
            $posts = $this->posts(false);
            $categories = $this->categories->get_categories();
            
            $data = array(	'js'=>array('/js/dashboard.js','/ckeditor/ckeditor.js'),
                                                                                                                            'css'=>array(),
                            'followers' => $followers,
                            'posts' => $posts,
                    'categories'=>$categories);

            $this->get_view(array('/backend/dashboard'), $data);
	}
        
        public function update_categories($post_id){
            $this->load->model('posts', '', TRUE);
            $this->posts->delete_categories($post_id);
            foreach($this->input->post('categories') as $category){
                $this->posts->set_category($post_id,$category);
            }
            $result = new stdClass();
            $result->success = true;
            echo json_encode($result);
        }
        
       
}
