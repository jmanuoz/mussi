<?php
require_once('FormatYoutubePosts.php');
require_once('Youtube.php');
class YoutubeInterface{
    
     protected $youtube;
    
    protected $formatyoutubeposts;
    
    public function __construct($post_model){
        $this->youtube = new Youtube(array('key' => YOUTUBE_API_KEY));
        $this->formatyoutubeposts = new FormatYoutubePosts($post_model);
    }
    
    public function get_posts(){
        $params = array(
                    'q' => '',                        
                    'channelId' => YOUTUBE_CHANNEL_ID,
                    'part' => ' snippet',      
                    'maxResults' => 8,
                    
                );
        $result = $this->youtube->searchAdvanced($params);
        return $this->formatyoutubeposts->formatPosts($result);
    }
    
    public function get_new_posts($date){
        
        $params = array(
                    'q' => '',                        
                    'channelId' => YOUTUBE_CHANNEL_ID,
                    'part' => ' snippet',      
                    'maxResults' => 8,
                    'publishedAfter'=>$date
                    
                );
        $result = $this->youtube->searchAdvanced($params);
        if($result != ''){
            return $this->formatyoutubeposts->formatPosts($result);
        }else{
            return array();
        }
    }
    
     public function get_followers(){
          $result = $this->youtube->getChannelById(YOUTUBE_CHANNEL_ID);
          return $result->statistics->subscriberCount;
      }
}

