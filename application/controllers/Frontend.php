<?php

header("Access-Control-Allow-Origin: *");

// defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);

class Frontend extends CI_Controller {

  public function index(){
    $this->load->view('frontend/index');
  }
  public function post($idPost){

    $this->load->model('posts', '', TRUE);
    $posts = $this->posts->get_post($idPost);

    foreach ($posts as &$post) {
        $post->categories = $this->posts->get_categories($post->posts_id);
        $post->textShare = $post->text;
        $post->text = $this->putLinks($post->text);
    }
    $imgArray = json_decode($post->media);

    $headers['title'] = substr($post->textShare, 0, 40) . " ..";
    $headers['desc'] = substr($post->textShare, 0, 120);
    $headers['image'] = $imgArray[0]->src;

    $this->load->view('frontend/post', $headers);
  }

  public function nota($idNote){

    header("Access-Control-Allow-Origin: *");

    $this->load->model('notes', '', TRUE);
    $notes = $this->notes->get_full_notes($limit, $start);
    foreach ($notes as &$note) {
        $note->categories = $this->notes->get_categories($note->notes_id);
        $note->social_net = 6;
    }

    $imgArray = json_decode($note->media);

    $headers['title'] = $note->title;
    $headers['desc'] = substr($note->text, 3, 120);
    $headers['image'] = $imgArray[0]->src;

    $this->load->view('frontend/nota', $headers);
  }

  public function get_followers(){
    header("Access-Control-Allow-Origin: *");
     $this->followers(true);
  }
  public function get_posts($start = 0, $limit = 5){
    header('Access-Control-Allow-Origin: *');

     $this->posts(true, $start, $limit);
  }

  public function get_post($idPost){
    header("Access-Control-Allow-Origin: *");
    $this->load->model('posts', '', TRUE);
    $posts = $this->posts->get_post($idPost);

    foreach ($posts as &$post) {
        $post->categories = $this->posts->get_categories($post->posts_id);
        $post->text = $this->putLinks($post->text);
    }

    echo json_encode($posts);

  }

  public function get_note($idNote){
    header("Access-Control-Allow-Origin: *");
    $this->load->model('notes', '', TRUE);
    $notes = $this->notes->get_full_notes($limit, $start);
    foreach ($notes as &$note) {
        $note->categories = $this->notes->get_categories($note->notes_id);
        $note->social_net = 6;
    }

    echo json_encode($notes);

  }

  public function get_calendar(){
    header("Access-Control-Allow-Origin: *");
      $response = new stdClass();
      try{
        $this->load->library('google/calendar/google_calendar');
        $fourDaysAgo = date("Y-m-d\TH:i:sP",strtotime('-4 day', strtotime('12:00:00')));
        $today = date("Y-m-d\TH:i:sP",strtotime('12:00:00'));

        $events_past = $this->google_calendar->get_events($fourDaysAgo,$today);
        $events_future = $this->google_calendar->get_events($today);

        $items = $events_past['modelData']['items'];
        $lastEvent = array();
        $lastEvent1 = array_pop($items);
        if($lastEvent1 != null){
            $lastEvent2 = array_pop($items);
            if($lastEvent2 != null){
                $lastEvent[] = $lastEvent2;
                $lastEvent[] = $lastEvent1;
            }else{
                $lastEvent[] = $lastEvent1;
            }
        }

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
    header("Access-Control-Allow-Origin: *");
      $this->load->model('posts', '', TRUE);
      $result = $this->posts->get_categoriesAll();
      echo json_encode($result);
  }

  public function get_categories_number($category){
    header("Access-Control-Allow-Origin: *");
      $this->load->model('posts', '', TRUE);
      $result = $this->posts->get_categoriesNumber($category);
      echo json_encode($result);
  }

  public function message_to_user(){
    header("Access-Control-Allow-Origin: *");
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

  public function set_post_higlighted($postId){
    header("Access-Control-Allow-Origin: *");
      $this->load->model('posts', '', TRUE);
      $response = new stdClass();
      $success = $this->posts->remove_highlighted();
      $success = $this->posts->higlight_post($postId);
      if($success){
          $response->status = 1;
          $response->message = 'Se destacó exitosamente';
          echo json_encode($response);
          return 0;
      }
      $response->status = 0;
      $response->message = 'No se pudo destacar';
      echo json_encode($response);
      return 0;
  }

}

?>
