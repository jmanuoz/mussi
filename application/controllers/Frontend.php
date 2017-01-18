<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

  public function index(){
    $this->load->view('frontend/index');
  }

  public function get_posts(){
    $this->db->from('posts');
    $this->db->select('*');

    $query = $this->db->get();

    if ($query->num_rows() > 0){
      echo json_encode($query->result());
    } else {
      return array();
    }
  }


} ?>
