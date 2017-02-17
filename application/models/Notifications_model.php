<?php

Class Notifications_model extends CI_Model {
    
    const NEW_MESSAGE = 1;
    
    const NEW_TWITTER_POSTS = 2;
    
    const NEW_FB_POSTS = 3;
    
    const NEW_INSTA_POSTS = 4;
    
    const NEW_YOUTUBE_POSTS = 5;
    
    public function create($notifications_type_id,$date,$text){
         $sql = "INSERT INTO notifications (notifications_type_id,date,text) 
        VALUES ($notifications_type_id,'$date','$text')";

        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->affected_rows();
        }
    }
    
    public function get_not_read(){
        $sql = "SELECT noti.* FROM notifications noti "
                . "WHERE noti.nread = 0 "
                
                . " ORDER BY notifications_id DESC";
         
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function get_last_notification_by_type($notificationType){
        $sql = "SELECT noti.* FROM notifications noti "
                . "WHERE noti.notifications_type_id = $notificationType "
                
                . " ORDER BY notifications_id DESC"
                . " LIMIT 1";
         
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result()[0];
        } else {
            return array();
        }
    }
    
    
    public function get_not_read_by_type($type_id){
        $sql = "SELECT noti.* FROM notifications noti "
                . "WHERE noti.nread = 0 "
                
                . " AND noti.notifications_type_id = $type_id "
               
                . " ORDER BY notifications_id DESC";
         
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
     public function get_all(){
         $sql = "SELECT noti.* FROM notifications noti "
                . " ORDER BY notifications_id DESC";
         
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
        
    
    public function read(){
        
        $sql = "UPDATE notifications SET  nread=1";
        
        $this->db->query($sql);
        
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
}