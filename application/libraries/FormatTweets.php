<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once APPPATH.'interfaces/FormatPosts.php';
class FormatTweets extends formatposts{
    
    public function formatMedia($media) {
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
    
    public function formatPosts($tweets) {
        $formattedTweets = array();
        foreach ($tweets as $tweet) {
            $formattedTweet = new stdClass();
            $formattedTweet->profile_image = $tweet->user->profile_image_url;
            $formattedTweet->date = $tweet->created_at;
            $formattedTweet->post_id = $tweet->id;
            $formattedTweet->saved = $this->check_saved($tweet->id);
            if (isset($tweet->retweeted_status->full_text)) {
                $formattedTweet->text = $tweet->retweeted_status->full_text;
                $formattedTweet->posted_by = $tweet->retweeted_status->user->name;
            }else{
                $formattedTweet->posted_by = '';
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
    
    
    
}