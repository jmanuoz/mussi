<?php

Class Socialnets extends CI_Model {
    public function update_followers($social_net,$followers){
         $sql = "UPDATE social_nets SET  "
                . "followers = $followers
        WHERE social_nets_id = $social_net";

        $this->db->query($sql);

        if($this->db->affected_rows() > 0){
            return 1;
        }else{

            return 0;
        }
    }
    
    public function get_followers(){
        $this->db->from('social_nets');
        
        $this->db->select('social_nets_id, name, followers');


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    public function get_last_post_id($socialNetId){
        $this->db->from('social_nets');
        $this->db->where('social_nets_id',$socialNetId);
        $this->db->select('social_nets_id, name, last_post_id');


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result()[0];
        } else {
            return array();
        }
    }
    
    public function update_last_post_id($socialNetId,$post_id){
         $sql = "UPDATE social_nets SET  "
                . "last_post_id = '$post_id'
        WHERE social_nets_id = $socialNetId";

        $this->db->query($sql);

        if($this->db->affected_rows() > 0){
            return 1;
        }else{

            return 0;
        }
    }
}