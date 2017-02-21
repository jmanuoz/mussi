<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Frontend extends CI_Controller {

  public function index(){
    $this->load->view('frontend/index');
  }

  public function get_posts($start=0, $limit=5){
      $this->load->model('posts', '', TRUE);
      $this->load->model('notes', '', TRUE);
      $posts= $this->posts->get_posts($limit, $start);
      foreach($posts as &$post){
          $post->categories = $this->posts->get_categories($post->posts_id);
      }
      
      $notes = $this->notes->get_notes($limit, $start);
      foreach($notes as &$note){
          $note->categories = $this->notes->get_categories($post->notes_id);
          $note->social_net = 6;
      }
      $resultado = array_merge($posts, $notes);
      usort($resultado, array($this,"order_posts"));
      echo json_encode($resultado);

  }
  function order_posts($a, $b)
    {
        return (strtotime($a->date) < strtotime($a->date));
    }


  public function get_followers(){
      $this->load->model('socialnets', '', TRUE);
      $result = $this->socialnets->get_followers();
      echo json_encode($result);
  }

  public function get_calendar(){
      $response = new stdClass();
      try{
        $this->load->library('google/calendar/google_calendar');
        $fourDaysAgo = date("Y-m-d\TH:i:sP",strtotime('-4 day', strtotime('12:00:00')));
        $today = date("Y-m-d\TH:i:sP",strtotime('12:00:00'));

        $events_past = $this->google_calendar->get_events($fourDaysAgo,$today);
        $events_future = $this->google_calendar->get_events($today);

        $items = $events_past['modelData']['items'];
        $lastEvent = array();
        $lastEvent[] = array_pop($items);
        $events = array_merge($lastEvent,$events_future['modelData']['items']);
        $response->status = true;
        $jsonEvents = array();
        foreach($events as $event){
            $jsonEvent = new stdClass();
            $jsonEvent->date = $event['start']['dateTime'];
            $jsonEvent->description = $event['summary'];
            $jsonEvent->location = isset($event['location'])?$event['location']:'';
            $jsonEvents[] = $jsonEvent;
        }
        $response->events = $jsonEvents;
      }catch (Exception $e){
        $response->status = false;
        $response->error = $e->getMessage();
        log_message('error', '[Google Calendar]'.$e->getMessage());
      }

      echo json_encode($response);
      //echo'<pre>';print_r($this->google_calendar->get_events());echo '</pre>';
  }


  public function get_categories(){
      $this->load->model('posts', '', TRUE);
      $result = $this->posts->get_categoriesAll();
      echo json_encode($result);
  }

  public function get_categories_number($category){
      $this->load->model('posts', '', TRUE);
      $result = $this->posts->get_categoriesNumber($category);
      echo json_encode($result);
  }

  public function message_to_user(){
      $this->load->model('messages_model', '', TRUE);
      $id = $this->messages_model->create($this->input->post('name'),$this->input->post('email'),$this->input->post('mensaje'),0);
      $response = new stdClass();
      if($id > 0){
          $this->load->model('notifications_model', '', TRUE);
          $this->notifications_model->create(Notifications_model::NEW_MESSAGE,date('Y-m-d H:i:s'),'Tenes un nuevo mensaje');
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

?>
