<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('notifications_model', '', TRUE);
    }
    
    public function ver(){
        $data = array();    
        $data['notificaciones'] = $this->notifications_model->obtener_todas($this->get_user_id());
        $this->get_view(array('backend/notificaciones'),$data);        
        
    }
    
    
    
    public function read(){
        $result = $this->notifications_model->read();
        echo json_encode (array('result'=>1,'affected'=>$result));
    }
}