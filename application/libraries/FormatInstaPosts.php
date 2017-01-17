<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once APPPATH.'interfaces/FormatPosts.php';
class FormatInstaPosts extends FormatPosts{
    public function formatPosts($posts){
        $formattedPosts = array();
        foreach($posts as $post){
            $formattedPost = new stdClass();
            $formattedPost->date = date('Y-m-d H:i:s', $post->created_time);
            $formattedPost->post_id = $post->id;
            $formattedPost->saved = $this->check_saved($post->id); 
            if($formattedPost->saved){
               $formattedPost->category_id = $this->_post->category_id;
            }else{
              $formattedPost->category_id = -1;  
            }
            $formattedPost->type = $post->type;
            if(isset($post->caption->text)){
                 $formattedPost->text = $post->caption->text;
            }else{
                 $formattedPost->text = '';
            }
            $formattedPost->posted_by = '';
            $formattedMedia = new stdClass();     
            if($post->type == 'video'){     
                
                $formattedMedia->type = 'video';
                $formattedMedia->src = $post->videos->standard_resolution->url;
                $formattedPost->media = array(0=>$formattedMedia);
            }else{                
                $formattedMedia->type = 'photo';
                $formattedMedia->src = $post->images->standard_resolution->url;
                $formattedPost->media = array(0=>$formattedMedia);
            }
            $formattedPosts[] = $formattedPost;
        }
        return $formattedPosts;
    }
    
    public function formatMedia($media){
       
    }
}