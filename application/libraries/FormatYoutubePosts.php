<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once APPPATH.'interfaces/FormatPosts.php';
class FormatYoutubePosts extends FormatPosts{
    public function formatPosts($posts){
        $formattedPosts = array();
        foreach($posts as $post){
            if($post->id->kind == 'youtube#video'){
            $formattedPost = new stdClass();
            $datetime = new DateTime($post->snippet->publishedAt);
            $datetime->setTimezone(new DateTimeZone('America/Argentina/Buenos_Aires'));
            $formattedPost->date = $datetime->format('Y-m-d H:i:s');
           
            $formattedPost->post_id = $post->id->videoId;
            $formattedPost->saved = $this->check_saved($formattedPost->post_id,POSTS::YOUTUBE_ID); 
            $formattedPost->link = 'https://www.youtube.com/watch?v='.$post->id->videoId;
            if($formattedPost->saved){
               $formattedPost->categories = $this->_post->categories;
            }else{
              $formattedPost->categories =  array(); 
            }
            $formattedPost->text = $post->snippet->title;
            $formattedPost->type = 'video';
            $formattedPost->posted_by = '';
            $formattedPost->src = '';
            $formattedPost->media = '';
            $formattedPosts[] = $formattedPost;
            }
        }
        return $formattedPosts;
    }
}