<?php
require_once('FormatTweets.php');
require_once('Twitteroauth.php');
class Twitterinterface{
    
    protected $twitterOAuth;
    
    protected $formattweets;
    
    public function __construct($post_model){
        $this->twitteroauth = new TwitterOAuth();
        $this->formattweets = new FormatTweets($post_model);
    }
    
    public function get_posts(){
         $connection = $this->twitteroauth->create(TW_CONSUMER_KEY, TW_CONSUMER_SECRET, TW_ACCESS_TOKEN, TW_ACCESS_TOKEN_SECRET);
        $data = array(
            'screen_name' => TW_USER,
            'tweet_mode'=>'extended'

        );
        $result = $connection->get('statuses/user_timeline', $data);
        return $this->formattweets->formatPosts($result);
    }
    
    public function get_followers(){
        
        $connection = $this->twitteroauth->create(TW_CONSUMER_KEY, TW_CONSUMER_SECRET, TW_ACCESS_TOKEN, TW_ACCESS_TOKEN_SECRET);
        $data = array(
            'screen_name' => TW_USER,
            'tweet_mode'=>'extended'

        );
        $result = $connection->get('users/lookup', $data);
        return $result[0]->followers_count;
      }
    
    public function get_new_posts($last_post_id){
         $connection = $this->twitteroauth->create(TW_CONSUMER_KEY, TW_CONSUMER_SECRET, TW_ACCESS_TOKEN, TW_ACCESS_TOKEN_SECRET);
        $data = array(
            'screen_name' => TW_USER,
            'tweet_mode'=>'extended',
            'since_id'=> $last_post_id
        );
        $result = $connection->get('statuses/user_timeline', $data);
        
        return $this->formattweets->formatPosts($result);
    }
    
}

