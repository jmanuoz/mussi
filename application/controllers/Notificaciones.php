<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificaciones extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('notificacion', '', TRUE);
    }
    
    public function ver_admin(){
        $data = array();    
        $data['notificaciones'] = $this->notificacion->obtener_todas($this->get_user_id());
        $this->get_view(array('backend/notificaciones'),$data);        
        
    }
    
    public function ver(){
        $data = array();    
        $data['notificaciones'] = $this->notificacion->obtener_todas($this->get_user_id());
        $this->get_front_view(array('notificaciones'),$data);  
    }
    
    public function vistas(){
        $result = $this->notificacion->vistas($this->get_user_id());
        echo json_encode (array('result'=>1,'affected'=>$result));
    }
}