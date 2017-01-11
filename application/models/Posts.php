<?php

Class Posts extends CI_Model {

    const TWITTER_ID = 1;
    
    public function create($social_net,$social_post_id,$date,$text,$media){
         $sql = "INSERT INTO posts (social_net,social_post_id,date,text,media) 
        VALUES ($social_net,$social_post_id,'$date','$text','$media')";

        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->affected_rows();
        }
   }
}