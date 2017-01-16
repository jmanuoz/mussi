<?php

Class Notificacion extends CI_Model {
    
    const TIPO_MENSAJE = 1;
    
    public function crear($id_tipo_notificacion,$fecha, $id_modulo,$mensaje,$id_usuario,$id_usuario_notificante){
         $sql = "INSERT INTO notificaciones (id_tipo_notificacion,fecha,id_modulo,mensaje,id_usuario,id_usuario_notificante) 
        VALUES ($id_tipo_notificacion,'$fecha', $id_modulo,'$mensaje',$id_usuario,$id_usuario_notificante)";

        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->affected_rows();
        }
    }
    
    public function obtener_no_vistas($user_id){
        $sql = "SELECT noti.*, u.nombre as notificante_nombre, u.apellido as notificante_apellido FROM notificaciones noti, users u "
                . "WHERE noti.vista = 0 "
                . " AND noti.id_usuario = $user_id "
                . " AND noti.id_usuario_notificante = u.id "
                . " ORDER BY id_notificacion DESC";
         
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    public function obtener_no_vistas_por_tipo($user_id, $tipo_not){
        $sql = "SELECT noti.*, u.nombre as notificante_nombre, u.apellido as notificante_apellido FROM notificaciones noti, users u "
                . "WHERE noti.vista = 0 "
                . " AND noti.id_usuario = $user_id "
                . " AND noti.id_tipo_notificacion = $tipo_not "
                . " AND noti.id_usuario_notificante = u.id "
                . " ORDER BY id_notificacion DESC";
         
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
        
    
    public function vistas($id_usuario){
        return 0;
        $sql = "UPDATE notificaciones SET  vista=1
        WHERE id_usuario = $id_usuario";
         
        $this->db->query($sql);
        
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
}