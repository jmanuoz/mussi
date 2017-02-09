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
    $data = array('css'=>array(),'js'=>array('/js/messages.js','/js/canvas/html2canvas.js','/js/canvas/jquery.plugin.html2canvas.js'));
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
  
  public function share_conversation(){
      $response = new stdClass();
      try{
      //Get the base-64 string from data
        $filteredData=substr($this->input->post('img_val'), strpos($this->input->post('img_val'), ",")+1);

        //Decode the string
        $unencodedData=base64_decode($filteredData);
        $path='assets/images/conversations/conversation_'.$this->input->post('messages_id').'.png';
        //Save the image
        file_put_contents($path, $unencodedData);
        
        $media = array();
        $image = new stdClass();
        $image->type='photo';
        $image->src=site_url().$path;
        $media[] = $image;
        $this->save_conversation($this->input->post('messages_id'),$this->input->post('texto_for_share'),$media);
        $response->status = 1;
        
      }catch(Exception $e){
          $response->status = 0;
          $response->message = $e->getMessage();
          log_message('error', '[Google Calendar]'.$e->getMessage());
      }
      echo json_encode($response);
  }
  
  protected function save_conversation($messages_id,$text,$media){
      $this->load->model('posts', '', TRUE);
        $post_db = $this->posts->get_by_social_post_id($messages_id, POSTS::CONVERSATION_ID);
        if(count($post_db)==0){
            $id_post = $this->posts->create(POSTS::CONVERSATION_ID,$messages_id,date('Y-m-d H:i:s'),$text,json_encode($media),'', '');
            
        }else{
            $this->posts->update(POSTS::CONVERSATION_ID,$messages_id,$post_db[0]->date,$text,json_encode($media),'', '');
            $this->posts->delete_categories($post_db[0]->posts_id);
            $id_post = $post_db[0]->posts_id;           
        }
//        if($this->input->post('category-'.$post->post_id) != ''){
//                foreach($this->input->post('category-'.$post->post_id) as $category){
//                    $this->posts->set_category($id_post,$category);
//                }
//            }

    }
}