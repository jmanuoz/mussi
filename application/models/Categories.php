<?php

Class Categories extends CI_Model {
    public function get_categories() {
          $this->db->from('categories');
        
        $this->db->select('*');
      
       
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}