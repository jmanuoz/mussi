<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

  public function index(){
    $this->load->view('frontend/index');
  }

  public function get_posts($start=0, $limit=5){
      $this->load->model('posts', '', TRUE);
      $result = $this->posts->get_posts($limit, $start);
      foreach($result as &$post){
          $post->categories = $this->posts->get_categories($post->posts_id);
      }
      echo json_encode($result);
    
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


} ?>
