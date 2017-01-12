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
        //$views = array('nav_backend_header');
            $data = array('css'=>array(),'js'=>array());
		$this->get_view(array(),$data);
    }
}