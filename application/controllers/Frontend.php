<?php

header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Frontend extends CI_Controller {

  public function index(){
    $this->load->view('frontend/index');
  }

}

?>
