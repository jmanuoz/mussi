<?php
Class Messages_model extends CI_Model {   

    public function create($name,$email,$message, $reply_to){
         $sql = "INSERT INTO messages (name,email,message,reply_to)
        VALUES ('$name','$email','$message',$reply_to)";

        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->affected_rows();
        }
   }
   
   public function get_all(){
        $this->db->from('messages');
        $this->db->where('reply_to', 0);
        $this->db->select('*');
        $this->db->order_by('date','desc');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
   }
   
   public function get_conversation($messages_id){
        $this->db->from('messages');
        $this->db->where('messages_id', $messages_id);
        $this->db->or_where('reply_to',$messages_id); 
        $this->db->select('*');


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
   }
}
