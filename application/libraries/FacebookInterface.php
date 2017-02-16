<?php

require_once('Facebook.php');
require_once('FormatFbPosts.php');
class FacebookInterface{
    
    protected $facebook;
    
    protected $formatfbposts;
    
    public function __construct($post_model){
        $this->facebook = new Facebook();
        $this->formatfbposts = new FormatFbPosts($post_model);
    }
    
    public function is_authenticated(){
        return $this->facebook->is_authenticated();
    }
    
    public function login_url(){
        return $this->facebook->login_url();
    }
    
    public function get_posts(){
        $posts = $this->facebook->request('get', '/'.FACEBOOK_PAGE_ID.'/posts?fields=id,created_time,type,source,shares,name,status_type,message,permalink_url,link,attachments&limit=15',array());
        //echo'<pre>';print_r($posts);echo'</pre>';exit;
        return $this->formatfbposts->formatPosts($posts['data']);
    }
    
    public function get_followers(){
      
        if (  $this->facebook->is_authenticated()){
            $result = $this->facebook->request('get', '/'.FACEBOOK_PAGE_ID.'?fields=fan_count',array());
            return $result['fan_count'];
        }

    } 
    
    public function get_new_posts($date){
        $posts = $this->facebook->request('get', '/'.FACEBOOK_PAGE_ID.'/posts?since='.$date.'&fields=id,created_time,type,source,shares,name,status_type,message,permalink_url,link,attachments&limit=15',array());
        
        //echo'<pre>';print_r($posts);echo'</pre>';exit;
        return $posts['data'];
    }
}

