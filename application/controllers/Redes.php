<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Redes extends CI_Controller {
    
    

    public function __construct() {
        parent::__construct();
        $this->load->model('posts', '', TRUE);
    }
    
    public function twitter(){
        $this->load->library('twitteroauth');
        $this->load->library('formatTweets');
        if(isset($_POST['tweets'])){
            foreach($_POST['tweets'] as $tweet){
                $post = json_decode($tweet);                
                $datetime = new DateTime($post->date);
                $datetime->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
                $date = $datetime->format('Y-m-d H:i:s');               
                $this->posts->create(Posts::TWITTER_ID,$post->post_id,$date,$post->text,json_encode($post->media),$post->posted_by);                
            }
            
        }
        
        $connection = $this->twitteroauth->create(TW_CONSUMER_KEY, TW_CONSUMER_SECRET, TW_ACCESS_TOKEN, TW_ACCESS_TOKEN_SECRET);
        $data = array(
            'screen_name' => TW_USER,
            'tweet_mode'=>'extended'
            
        );
        $result = $connection->get('statuses/user_timeline', $data);
        $tweets = $this->formattweets->formatPosts($result);
//        echo'<pre>';
//        print_r($result);echo'</pre>';exit;
        
        $data = array('css'=>array(),'js'=>array(''),'tweets'=>$tweets);
        $this->get_view(array('/backend/list_tweets'),$data);
    }
    
    

    public function fb(){
        $this->load->library('facebook');
        $this->load->helper('url');
        $this->load->library('formatFbPosts');
        $authenticated = $this->facebook->is_authenticated();
        if (  $authenticated){  
            if(isset($_POST['posts'])){
                foreach($_POST['posts'] as $posts){
                    $post = json_decode($posts);                
                    $datetime = new DateTime($post->date);
                    $datetime->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
                    $date = $datetime->format('Y-m-d H:i:s');               
                    $this->posts->create(Posts::FACEBOOK_ID,$post->post_id,$date,$post->text,json_encode($post->media),$post->posted_by);                
                }
                
            }
            $posts = $this->facebook->request('get', '/'.FACEBOOK_PAGE_ID.'/posts?fields=id,created_time,type,source,shares,name,status_type,message,link,attachments&limit=25',array());
            $posts = $this->formatfbposts->formatPosts($posts['data']);
//            echo'<pre>';print_r($posts);echo'</pre>';exit;
        }else{            
            $posts = array();
        }
        
        $data = array('css'=>array(),'js'=>array(),'authenticated'=>$authenticated,'posts'=>$posts);
        $this->get_view(array('/backend/list_fb_posts'),$data);
    }   
    
    
    public function instagram(){
        $this->load->library('instagram_api');
        $login_link = '';
        if($this->session->userdata('instagram-token') != '') {
            if(isset($_POST['instaPosts'])){
                foreach($_POST['instaPosts'] as $instaPost){
                    $post = json_decode($instaPost);
                    $this->posts->create(Posts::INSTAGRAM_ID,$post->post_id,$post->date,$post->text,json_encode($post->media),$post->posted_by);                
                }

            }
            $this->load->library('formatInstaPosts');
            $this->instagram_api->access_token = $this->session->userdata('instagram-token');
            
            $insta_posts = $this->instagram_api->get_popular_media();
            $posts = $this->formatinstaposts->formatPosts($insta_posts->data);
//            echo '<pre>';print_r($insta_posts);echo'</pre>';exit;
        }else{
            $login_link = anchor($this->instagram_api->instagram_login(), 'Instagram Login'); 
        }
            $data = array('css'=>array(),'js'=>array(),'login_link'=>$login_link,'posts'=>$posts);
		$this->get_view(array('/backend/list_instagram'),$data);
    }
    
    function get_code_insta() {
	$this->load->library('instagram_api');
        // Make sure that there is a GET variable of code
        if(isset($_GET['code']) && $_GET['code'] != '') {

                $auth_response = $this->instagram_api->authorize($_GET['code']);
                echo  $auth_response->access_token;exit;
                // Set up session variables containing some useful Instagram data
                $this->session->set_userdata('instagram-token', $auth_response->access_token);
                $this->session->set_userdata('instagram-username', $auth_response->user->username);
                $this->session->set_userdata('instagram-profile-picture', $auth_response->user->profile_picture);
                $this->session->set_userdata('instagram-user-id', $auth_response->user->id);
                $this->session->set_userdata('instagram-full-name', $auth_response->user->full_name);
                
                redirect('Redes/instagram');

        } else {

                // There was no GET variable so redirect back to the homepage
                redirect('Backend');

        }
	
    }
}