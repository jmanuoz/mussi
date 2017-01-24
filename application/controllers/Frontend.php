<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

  public function index(){
    $this->load->view('frontend/index');
  }

  public function get_posts($start=0, $limit=5){

    $this->db->from('posts');
    $this->db->select('*');
    $this->db->limit($limit, $start);
    $this->db->join('categories_posts', 'categories_posts.post_id = posts.posts_id');
    $this->db->group_by('post_id');

    $query = $this->db->get();

    if ($query->num_rows() > 0){
      echo json_encode($query->result());
    } else {
      return array();
    }
  }


} ?>
