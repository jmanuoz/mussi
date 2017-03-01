<?php

Class Posts extends CI_Model {

    const TWITTER_ID = 1;

    const FACEBOOK_ID = 2;

    const INSTAGRAM_ID = 3;

    const YOUTUBE_ID = 4;
    
    const CONVERSATION_ID = 5;

    public function create($social_net,$social_post_id,$date,$text,$media,$posted_by, $link){
         $sql = "INSERT INTO posts (social_net,social_post_id,date,text,media,posted_by, link)
        VALUES ($social_net,'$social_post_id','$date','$text','$media','$posted_by', '$link')";

        $this->db->query($sql);
        if($this->db->affected_rows() > 0){
            return $this->db->insert_id();
        }else{
            return $this->db->affected_rows();
        }
   }

   public function update($social_net,$social_post_id,$date,$text,$media,$posted_by, $link){
        $sql = "UPDATE posts SET  "
                . "date = '$date',text = '$text',media = '$media',posted_by = '$posted_by', link = '$link'
        WHERE social_net=$social_net and social_post_id = '$social_post_id'";

        $this->db->query($sql);

        if($this->db->affected_rows() > 0){
            return 1;
        }else{

            return 0;
        }
    }
    
    public function remove_highlighted(){
        $sql = "UPDATE posts SET  "
                . "highlighted = 0";

        $this->db->query($sql);

        if($this->db->affected_rows() > 0){
            return 1;
        }else{

            return 0;
        }
    }
    
    public function higlight_post($postId){
       $sql = "UPDATE posts SET  "
                . "highlighted = 1 "
               . "WHERE posts_id=$postId ";

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
        $sql = "SELECT cp.category_id, c.name as category_name FROM categories c, categories_posts cp WHERE cp.category_id = c.categories_id AND cp.post_id = $post_id";

        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    
    public function get_categoriesAll(){
        $sql = "SELECT c.name as category_name, (SELECT count(categories_posts_id) as total
                FROM categories_posts as cp
                WHERE cp.category_id=c.categories_id) as t FROM categories c ";

        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function get_categoriesNumber($c){
        $sql = "SELECT count(categories_posts_id) as total
                FROM categories_posts
                WHERE category_id=$c";

        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function get_categoriesId_by_postId($post_id){
        $sql = "SELECT cp.category_id FROM categories c, categories_posts cp WHERE cp.category_id = c.categories_id AND cp.post_id = $post_id";

        $query = $this->db->query($sql);
        $result = $query->result_array();
        return $result;
    }

    public function delete_categories($post_id){

        $this->db->where('post_id', $post_id);
        $q = $this->db->delete('categories_posts');
        return $q;
    }


    public function get_posts($limit, $start){
        $this->db->from('posts');
        $this->db->select('*');
        $this->db->limit($limit, $start);

        $query = $this->db->get();

        if ($query->num_rows() > 0){
          return $query->result();
        } else {
          return array();
        }
    }
}
