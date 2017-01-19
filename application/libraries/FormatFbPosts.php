<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once APPPATH.'interfaces/FormatPosts.php';
class FormatFbPosts extends FormatPosts{
    public function formatPosts($posts){
        $formattedPosts = array();
        foreach($posts as $post){
            $formattedPost = new stdClass();
            $formattedPost->date = $post['created_time'];
            $formattedPost->post_id = $post['id'];
            $formattedPost->type = $post['type'];
            $formattedPost->saved = $this->check_saved($post['id'],POSTS::FACEBOOK_ID); 
            if($formattedPost->saved){
               $formattedPost->categories = $this->_post->categories;
            }else{
              $formattedPost->categories = array();
            }
            $formattedPost->posted_by = '';
            if(isset($post['message'])){
                $formattedPost->text = $post['message'];
            }else{
                if($post['status_type'] == 'shared_story'){
                    if(isset($post['attachments']['data'][0]['description'])){
                        $formattedPost->text = $post['attachments']['data'][0]['description'];
                    }elseif(isset($post['attachments']['data'][0]['title'])){
                        $formattedPost->text = $post['attachments']['data'][0]['title'];
                    }else{
                        $formattedPost->text = '';
                    }
                    $formattedPost->posted_by = $post['name'];
                }
            }
            
            if($post['type'] == 'video'){     
                $formattedMedia = new stdClass();
                $formattedMedia->type = 'video';
                $formattedMedia->src = $post['source'];
                $formattedPost->media = array(0=>$formattedMedia);
            }elseif($post['type'] == 'link'){                
                $formattedPost->type = 'link';
                $formattedPost->link = $post['link'];
                if(isset($post['attachments']['data'])){
                    $formattedPost->media = $this->formatMedia($post['attachments']['data']);
                }else{
                    $formattedPost->media = array();
                }
            }else{
                
                $formattedPost->media = $this->formatMedia($post['attachments']['data']);
            }
            $formattedPosts[] = $formattedPost;
        }
        return $formattedPosts;
    }
    
    public function formatMedia($media){
        
        $formattedMedias = array();
        $count = 0;
        foreach($media as $element){
            
            if(isset($element['subattachments'])){
                foreach($element['subattachments']['data'] as $subelement){
                    $formattedMedia = new stdClass();
                    $formattedMedia->type = $subelement['type'];
                    $formattedMedia->src = $subelement['media']['image']['src'];
                    $formattedMedias[] = $formattedMedia;
                    $count++;
                    if($count >= 5){
                        break;
                    }
                }
            }else{
                $count++;
                $formattedMedia = new stdClass();
                $formattedMedia->type = $element['type'];
                $formattedMedia->src = $element['media']['image']['src'];
                $formattedMedias[] = $formattedMedia;
            }
            if($count >= 5){
                break;
            }
        }
        
       
        return $formattedMedias;
    }
}