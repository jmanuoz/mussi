<?php

Class Posts extends CI_Model {

    const TWITTER_ID = 1;
    
    const FACEBOOK_ID = 2;
    
    public function create($social_net,$social_post_id,$date,$text,$media,$posted_by){
         $sql = "INSERT INTO posts (social_net,social_post_id,date,text,media,posted_by) 
        VALUES ($social_net,'$social_post_id','$date','$text','$media','$posted_by')";

        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->affected_rows();
        }
   }
}