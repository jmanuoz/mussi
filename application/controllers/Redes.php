<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Redes extends CI_Controller {

    public function __construct() {
        parent::__construct();
       // $this->load->model('user', '', TRUE);
    }
    
    public function twitter(){
        //$views = array('nav_backend_header');
            $data = array('css'=>array(),'js'=>array());
		$this->get_view(array(),$data);
    }
    public function fb(){
        //$views = array('nav_backend_header');
            $data = array('css'=>array(),'js'=>array());
		$this->get_view(array(),$data);
    }
    public function instagram(){
        //$views = array('nav_backend_header');
            $data = array('css'=>array(),'js'=>array());
		$this->get_view(array(),$data);
    }
}