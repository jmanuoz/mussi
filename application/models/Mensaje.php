<?php

Class Mensaje extends CI_Model {
    public function crear($fecha,$id_encuesta,$id_user_1,$id_user_2,$mensaje){
         $sql = "INSERT INTO mensajes (id_encuesta,id_usuario_sender,id_usuario_reciever,fecha,mensaje) 
        VALUES ($id_encuesta,$id_user_1, $id_user_2,  '$fecha', '$mensaje')";

        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->affected_rows();
        }
    }
    
    public function obtener_ultimos($id_encuesta,$id_user_1,$id_user_reciever){
         $sql = "SELECT * FROM (SELECT *, (SELECT nombre from users where id = id_usuario_sender) AS sender_name, (SELECT apellido from users where id = id_usuario_sender)  AS sender_lastname, "
                 . "(SELECT imagen FROM users WHERE id = id_usuario_sender) AS sender_image,
                    (SELECT nombre FROM users WHERE id = id_usuario_reciever) AS reciever_name, 
                    (SELECT apellido FROM users WHERE id = id_usuario_reciever) AS reciever_lastname,
                    (SELECT imagen FROM users WHERE id = id_usuario_reciever) AS reciever_imagen "
                 . "FROM mensajes m "
                 . "Where (m.id_usuario_sender = $id_user_1 OR m.id_usuario_reciever = $id_user_1) "
                 . "AND (m.id_usuario_sender = $id_user_reciever OR m.id_usuario_reciever = $id_user_reciever) "
                 . "AND m.id_encuesta = $id_encuesta "
                 . " Order by id_mensaje DESC "
                 . "LIMIT 20) msg "
                 . "ORDER BY id_mensaje";
         
        $query = $this->db->query($sql);
        
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    public function obtener_ultimos_recibidos($id_encuesta,$id_user_sender,$id_user_reciever, $last_message_id){
         $sql = "SELECT *, (SELECT nombre from users where id = id_usuario_sender) AS sender_name, (SELECT apellido from users where id = id_usuario_sender)  AS sender_lastname, "
                 . "(SELECT imagen FROM users WHERE id = id_usuario_sender) AS sender_image,
                    (SELECT nombre FROM users WHERE id = id_usuario_reciever) AS reciever_name, 
                    (SELECT apellido FROM users WHERE id = id_usuario_reciever) AS reciever_lastname,
                    (SELECT imagen FROM users WHERE id = id_usuario_reciever) AS reciever_imagen "
                 . "FROM mensajes m "
                 . "Where m.id_usuario_sender = $id_user_sender AND m.id_usuario_reciever = $id_user_reciever "
                 . "AND m.id_encuesta = $id_encuesta "
                 . "AND m.id_mensaje > $last_message_id"
                 . " Order by id_mensaje ";
         
        $query = $this->db->query($sql);
        
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}