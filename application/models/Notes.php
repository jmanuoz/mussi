<?php
error_reporting(0);

Class Notes extends CI_Model {
    public function create($title, $content,$date){
        $sql = "INSERT INTO notes (title,content,date)
        VALUES ('$title','$content','$date')";

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
        $this->db->select("notes_id,title,content as text,image");


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_notes($limit, $start, $note_id=null){
        $this->db->from('notes');
        if(isset($note_id)){
            $this->db->where('notes_id', $note_id);
        }
        $this->db->limit($limit, $start);
        $this->db->select("notes_id,title,SUBSTRING(content,1,30) as text,image,date");


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_note($idNote){
        $this->db->from('notes');
        $this->db->where('notes_id', $note_id);
        $this->db->limit(1);
        $this->db->select("notes_id,title,SUBSTRING(content,1,30) as text,image,date");

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_full_notes($limit, $start, $note_id=null){
        $this->db->from('notes');
        if(isset($note_id)){
            $this->db->where('notes_id', $note_id);
        }
        $this->db->limit($limit, $start);
        $this->db->select("notes_id,title,content as text,image,date");


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function update($note_id,$title, $content){
        $sql = "UPDATE notes SET  "
                . " title = '$title',  content = '$content'
        WHERE notes_id=$note_id";

        $this->db->query($sql);

        if($this->db->affected_rows() > 0){
            return 1;
        }else{

            return 0;
        }
    }

    public function set_img($note_id,$img_name){
         $sql = "UPDATE notes SET  "
                . " image = '$img_name'
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
