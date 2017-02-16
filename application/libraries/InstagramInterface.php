<?php
require_once('Instagram_api.php');
require_once('FormatInstaPosts.php');
class InstagramInterface{
    
    protected $instagram_api;
    
    protected $formatfbposts;
    
    public function __construct($post_model){
        $this->instagram_api = new Instagram_api();
        $this->formatinstaposts = new FormatInstaPosts($post_model);
    }
    
    public function get_new_posts($instagram_token,$last_post_id){       
        $this->instagram_api->access_token = $instagram_token;
        $insta_posts = $this->instagram_api->get_popular_media($last_post_id);
        $posts = $this->formatinstaposts->formatPosts($insta_posts->data);
        //COMO LA API NO ESTA FUNCIONANDO CON EL MIN_ID POR ERRO DE ELLSO LO HAGO A MANO
        $new_posts = array();
        foreach($posts as $new_post){
            if($new_post->post_id != $last_post_id){
                $new_posts[] = $new_post;
            }else{
                break;
            }
        }
        return $new_posts;
    }
    
    public function get_posts($instagram_token){       
        $this->instagram_api->access_token = $instagram_token;
        $insta_posts = $this->instagram_api->get_popular_media();
        return $this->formatinstaposts->formatPosts($insta_posts->data);
    }
    
    public function instagram_login(){
        return $this->instagram_api->instagram_login();
    }
    
    public function get_followers($instagram_token){
        
        $this->instagram_api->access_token = $instagram_token;
        $userInfo = $this->instagram_api->get_user(INSTAGRAM_ID);
        return $userInfo->data->counts->followed_by;
      }
}

