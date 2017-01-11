<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Redes extends CI_Controller {
    
    

    public function __construct() {
        parent::__construct();
        $this->load->model('posts', '', TRUE);
    }
    
    public function twitter(){
        $this->load->library('twitteroauth');
        
        if(isset($_POST['tweets'])){
            foreach($_POST['tweets'] as $tweet){
                $post = json_decode($tweet);
                
                $datetime = new DateTime($post->date);
                $datetime->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
                $date = $datetime->format('Y-m-d H:i:s');
               
                $this->posts->create(Posts::TWITTER_ID,$post->post_id,$date,$post->text,json_encode($post->media));
                
            }
            exit;
        }
        
        $connection = $this->twitteroauth->create(TW_CONSUMER_KEY, TW_CONSUMER_SECRET, TW_ACCESS_TOKEN, TW_ACCESS_TOKEN_SECRET);
        $data = array(
            'screen_name' => TW_USER,
            'tweet_mode'=>'extended'
            
        );
        $result = $connection->get('statuses/user_timeline', $data);
        $tweets = $this->preprocessTweets($result);
//        echo'<pre>';
//        print_r($result);echo'</pre>';exit;
        
        $data = array('css'=>array(),'js'=>array(''),'tweets'=>$tweets);
        $this->get_view(array('/backend/list_tweets'),$data);
    }
    
    protected function preprocessTweets($tweets) {
        $formattedTweets = array();
        foreach ($tweets as $tweet) {
            $formattedTweet = new stdClass();
            $formattedTweet->profile_image = $tweet->user->profile_image_url;
            $formattedTweet->date = $tweet->created_at;
            $formattedTweet->post_id = $tweet->id;
            if (isset($tweet->retweeted_status->full_text)) {
                $formattedTweet->text = $tweet->retweeted_status->full_text;
            }else{
                $formattedTweet->text = $tweet->full_text;
            }
            $formattedTweet->media = array();
            if (isset($tweet->extended_entities->media)) {
                foreach ($tweet->extended_entities->media as $media) {
                    $formattedTweet->media[] = $this->formatMedia($media);
                }
            }
            if (isset($tweet->retweeted_status->extended_entities->media)) {
                foreach ($tweet->retweeted_status->extended_entities->media as $media) {                    
                    $formattedTweet->media[] = $this->formatMedia($media);
                }
            }
            $formattedTweets[] = $formattedTweet;
        }
        return $formattedTweets;
    }
    
    protected function formatMedia($media){
        $formattedMedia = new stdClass();
        $formattedMedia->type = $media->type;

        if($media->type == 'photo'){
            $formattedMedia->src = $media->media_url;
        }else{
            foreach ($media->video_info->variants as $variant){
                if($variant->content_type == 'video/mp4'){

                    $formattedMedia->src = $variant->url;
                    break;
                }
            }
        }
        return $formattedMedia; 
    }

    public function fb(){
        //$views = array('nav_backend_header');
            $data = array('css'=>array(),'js'=>array());
		$this->get_view(array(),$data);
    }
    public function instagram(){
        //$views = array('nav_backend_header');
            $data = array('css'=>array(),'js'=>array());
		$this->get_view(array(),$data);
    }
}