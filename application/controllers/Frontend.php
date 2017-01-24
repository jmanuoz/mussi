<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

  public function index(){
    $this->load->view('frontend/index');
  }

  public function get_posts($start=0, $limit=5){
      $this->load->model('posts', '', TRUE);
      $result = $this->posts->get_posts($limit, $start);
      foreach($result as &$post){
          $post->categories = $this->posts->get_categories($post->posts_id);
      }
      echo json_encode($result);
    
  }
  
 


} ?>
