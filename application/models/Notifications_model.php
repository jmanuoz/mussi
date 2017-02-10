<?php

Class Notifications_model extends CI_Model {
    
    const NEW_MESSAGE = 1;
    
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
    
     public function obtener_todas($user_id){
        $sql = "SELECT noti.*, u.nombre as notificante_nombre, u.apellido as notificante_apellido FROM notificaciones noti, users u "
                . "WHERE noti.id_usuario = $user_id "
                . " AND noti.id_usuario_notificante = u.id "
                . " ORDER BY id_notificacion DESC";
         
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