<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class FormatPosts{
    
    protected $_post_model;
    
    protected $_post;
    
    public function __construct($post_model) {
        $this->_post_model = $post_model[0];
    }
    
    public function formatPosts($posts){}
    
    public function formatMedia($media){}
    
    public function check_saved($social_post_id, $social_net){
        $post = $this->_post_model->get_by_social_post_id($social_post_id, $social_net);
        if(count($post) > 0){
            $this->_post = $post[0];
            $this->_post->categories = $this->_post_model->get_categories($this->_post->posts_id);
            return true;
        }else{
            return false;
        }
    }
}