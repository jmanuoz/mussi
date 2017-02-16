<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('notifications_model', '', TRUE);
    }
    
    public function index(){
        $data = array();    
        $data['notifications'] = $this->notifications_model->get_all();
        $this->get_view(array('backend/notifications_list'),$data); 
    }
    
    
    
    public function read(){
        $result = $this->notifications_model->read();
        echo json_encode (array('result'=>1,'affected'=>$result));
    }
    
    public function new_posts(){
        $this->load->model('socialnets', '', TRUE);
        $this->load->model('posts', '', TRUE);
        $this->load->library('twitterinterface',array($this->posts)); 
        $this->load->library('facebookInterface',array(0=>array())); 
        $this->load->library('instagramInterface',array($this->posts)); 
        $fbNotification = $this->notifications_model->get_last_notification_by_type(Notifications_model::NEW_FB_POSTS);
        if(count($fbNotification) == 0){
            $sinceFbGetPost = date("Y-m-d", time() - 60 * 60 * 24);
        }else{
            $sinceFbGetPost = $fbNotification->date;
        }
        $fbNewPosts = $this->facebookinterface->get_new_posts($sinceFbGetPost);
        if(count($fbNewPosts) > 0){
            $this->notifications_model->create(Notifications_model::NEW_FB_POSTS,date('Y-m-d H:i:s'),'Hay '.count($fbNewPosts).' posts nuevos de Facebook');
        }
        $TwLast = $this->socialnets->get_last_post_id(POSTS::TWITTER_ID);       
        $twitterPosts = $this->twitterinterface->get_new_posts($TwLast->last_post_id);
        
        if(count($twitterPosts) > 0){
            $this->notifications_model->create(Notifications_model::NEW_TWITTER_POSTS,date('Y-m-d H:i:s'),'Hay '.count($twitterPosts).' tweets nuevos');
            $this->socialnets->update_last_post_id(Posts::TWITTER_ID,$twitterPosts[0]->post_id);
        }
        
        $instaLast = $this->socialnets->get_last_post_id(POSTS::INSTAGRAM_ID);       
        $instaPosts = $this->instagraminterface->get_new_posts($this->session->userdata('instagram-token'),$instaLast->last_post_id);
        
        if(count($instaPosts) > 0){
            $this->notifications_model->create(Notifications_model::NEW_INSTA_POSTS,date('Y-m-d H:i:s'),'Hay '.count($instaPosts).' posts nuevos de Instagram');
            $this->socialnets->update_last_post_id(Posts::INSTAGRAM_ID,$instaPosts[0]->post_id);
        }
    }
}