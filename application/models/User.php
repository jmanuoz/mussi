<?php

Class User extends CI_Model {

    const ADMIN_ID = 1;
    
    function login($username, $password) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    public function check_pass($username, $password){
        return $this->login($username, $password) == false;
    }

    public function change_pass($id_user,$new_pass){
        $sql = "UPDATE users SET  password='$new_pass'
        WHERE id = $id_user";
         
        $this->db->query($sql);
        
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
    
    public function get_users() {
          $this->db->from('users');
        $this->db->where('profile', USER_PROFILE);
        $this->db->select('*');
      
       
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    public function obtener_usuarios_con_servicio($id_servicio){
       $sql = "SELECT u.* FROM users u, usuarios_servicios us WHERE u.id = us.id_usuario AND us.id_tipo_servicio = $id_servicio";
         
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
   }
   
   public function obtener_usuarios_sin_servicio($id_servicio){
       $sql = "SELECT u.* FROM users u WHERE id NOT IN (SELECT id_usuario FROM usuarios_servicios WHERE id_tipo_servicio = $id_servicio)";
       $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
   }
    
    public function get_user_by_mail($mail) {
          $this->db->from('users');
        $this->db->where('mail', $mail);
        $this->db->select('*');
      
       
        $query = $this->db->get();
         if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result[0];
        } else {
            return array();
        }
    }
    
    
    public function delete($id_usuario){
        $this->db->where('id', $id_usuario);
        $q = $this->db->delete('users'); 
        return $q;
    }
    
    public function create($usuario,$pass,$nombre, $apellido, $celular, $cod_postal, $mail, $url_sitio){
         $sql = "INSERT INTO users (username,password,profile,nombre,apellido,celular,cod_postal,mail,url_sitio) 
        VALUES ('$usuario','$pass',2,'$nombre', '$apellido', '$celular', '$cod_postal', '$mail', '$url_sitio')";

        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->affected_rows();
        }
   }
   
   public function get($id){
        $this->db->where('id', $id);
         $query = $this->db->get('users');
        $result = $query->result();
        return $result[0];
    }
    
    public function update($id, $nombre, $apellido, $celular, $cod_postal, $mail, $url_sitio ){
         $sql = "UPDATE users SET  nombre='$nombre', apellido='$apellido', celular='$celular', cod_postal='$cod_postal', mail='$mail', url_sitio='$url_sitio'
        WHERE id = $id";
         
        $this->db->query($sql);
        
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
       
    }
    
    public function set_profile_img($id_user, $imgName){
        $sql = "UPDATE users SET  imagen='$imgName'
        WHERE id = $id_user";
         
        $this->db->query($sql);
        
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
    
    
    public function obtener_graficos($id_user){
         $sql = "SELECT graficos.id_grafico,grafico,link,orden FROM graficos LEFT JOIN graficos_usuarios gu ON graficos.`id_grafico`= gu.`id_grafico` AND id_usuario = $id_user";
         
        $query = $this->db->query($sql);
        
        return $query->result();
    }
    public function obtener_graficos_creados($id_user){
         $sql = "SELECT id_grafico_usuario,graficos.id_grafico,grafico,link FROM graficos Inner JOIN graficos_usuarios gu ON graficos.`id_grafico`= gu.`id_grafico` AND id_usuario = $id_user Order By orden";
         
        $query = $this->db->query($sql);
        
        return $query->result();
    }
    
    public function obtener_graficos_link($id_grafico_usuario){
        $sql = "SELECT link FROM graficos_usuarios where id_grafico_usuario = $id_grafico_usuario";
         
        $query = $this->db->query($sql);
        
        return $query->result();
    }
    public function remove_graph($id_usuario, $id_grafico){
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('id_grafico', $id_grafico);
        $q = $this->db->delete('graficos_usuarios'); 
        return $q;
    }
    
    public function update_graph($id_usuario,$id_grafico,$link,$orden){
        $sql = "UPDATE graficos_usuarios SET link = '$link', orden=$orden
        WHERE id_usuario = $id_usuario AND id_grafico = $id_grafico";
         
        $this->db->query($sql);
        
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
    
    public function set_graph($id_usuario,$id_grafico,$link,$orden){
         $sql = "INSERT INTO graficos_usuarios (id_usuario,id_grafico,link,orden) 
        VALUES ($id_usuario,$id_grafico,'$link',$orden)";

        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->affected_rows();
        }
   }
   
   public function has_graph($id_usuario,$id_grafico){
       $this->db->from('graficos_usuarios');
        $this->db->where('id_usuario', $id_usuario);
        $this->db->where('id_grafico', $id_grafico);
        $this->db->select('1');
      
       
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
   }
}
