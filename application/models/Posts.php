<?php

Class Posts extends CI_Model {

    const TWITTER_ID = 1;

    const FACEBOOK_ID = 2;

    const INSTAGRAM_ID = 3;

    public function create($social_net,$social_post_id,$date,$text,$media,$posted_by){
         $sql = "INSERT INTO posts (social_net,social_post_id,date,text,media,posted_by)
        VALUES ($social_net,'$social_post_id','$date','$text','$media','$posted_by')";

        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->affected_rows();
        }
   }

   public function update($social_net,$social_post_id,$date,$text,$media,$posted_by){
        $sql = "UPDATE posts SET  "
                . "date = '$date',text = '$text',media = '$media',posted_by = '$posted_by'
        WHERE social_net=$social_net and social_post_id = '$social_post_id'";

        $this->db->query($sql);

        if($this->db->affected_rows() > 0){
            return 1;
        }else{

            return 0;
        }
    }

   public function get_by_social_post_id($social_post_id, $social_net){
        $this->db->from('posts');
        $this->db->where('social_post_id', $social_post_id);
        $this->db->where('social_net', $social_net);
        $this->db->select('*');


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
   }

   public function check_saved($social_post_id, $social_net){
        $result = $this->get_by_social_post_id($social_post_id, $social_net);

        return count($result)>0;
    }

    public function remove_by_social_post_id($social_post_id,$social_net){
        $this->db->where('social_net', $social_net);
        $this->db->where('social_post_id', $social_post_id);
        $q = $this->db->delete('posts');
        return $q;
    }
    
    public function set_category($post_id,$category_id){
        $sql = "INSERT INTO categories_posts (post_id,category_id) 
        VALUES ($post_id,$category_id)";

        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->affected_rows();
        }
    }
    
    public function get_categories($post_id){
        $this->db->from('categories_posts');
        
        $this->db->where('post_id', $post_id);
        
        $this->db->select('category_id');
      
       
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
    
    public function delete_categories($post_id){
         
        $this->db->where('post_id', $post_id);
        $q = $this->db->delete('categories_posts');
        return $q;
    }
}
