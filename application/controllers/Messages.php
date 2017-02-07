<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

  public function index(){
    $this->load->model('messages_model', '', TRUE);
    
    $data = array('css'=>array(),'js'=>array());
    $data['messages'] = $this->messages_model->get_all();
    $this->get_view(array('backend/messages'),$data);
  }
  
  public function response($messages_id){
    $this->load->model('messages_model', '', TRUE);
    $data = array('css'=>array(),'js'=>array('/js/messages.js'));
    $data['messages'] = $this->messages_model->get_conversation($messages_id);
    $data['first_message_id'] = $messages_id;
    $userData = $this->session->userdata('logged_in');
    $data['username'] = $userData['data']->nombre.' '.$userData['data']->apellido;
    $this->get_view(array('backend/response_message'),$data);
    
  }
  
  public function admin_response_message($messages_id){
      $this->load->model('messages_model', '', TRUE);
      $userData = $this->session->userdata('logged_in');
      $id = $this->messages_model->create($userData['data']->nombre.' '.$userData['data']->apellido,'',$this->input->post('message'),$messages_id);
      $response = new stdClass();
      if($id > 0){
          $response->status = 1;
          $response->id = $id;
          $response->message = 'Se envío exitosamente';
      }else{
          $response->status = 0;
          $response->message = 'No se pudo crear el mensaje';
      }
      echo json_encode($response);
  }
}