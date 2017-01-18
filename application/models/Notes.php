<?php

Class Notes extends CI_Model {
    public function create($title,$description, $content){
        $sql = "INSERT INTO notes (title,description,content) 
        VALUES ('$title','$description','$content')";

        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->affected_rows();
        }
    }
    
    public function get($note_id = null){
        $this->db->from('notes');
        if($note_id != null){
            $this->db->where('notes_id', $note_id);
        }
        $this->db->select('*');
      
       
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    
    public function update($note_id,$title,$description, $content){
        $sql = "UPDATE notes SET  "
                . " title = '$title', description='$description', content = '$content'
        WHERE notes_id=$note_id";
         
        $this->db->query($sql);
        
        if($this->db->affected_rows() > 0){
            return 1;
        }else{
            
            return 0;
        }
    }
    
    public function set_category($note_id,$category_id){
        $sql = "INSERT INTO categories_notes (note_id,category_id) 
        VALUES ($note_id,$category_id)";

        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->affected_rows();
        }
    }
    
    public function get_categories($note_id){
        $this->db->from('categories_notes');
        
        $this->db->where('note_id', $note_id);
        
        $this->db->select('category_id');
      
       
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
}