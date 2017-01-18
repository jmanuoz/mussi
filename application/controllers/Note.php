<?php

Class Note extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('notes', '', TRUE);
    }
    
    public function create(){
        $this->load->model('categories', '', TRUE);
        if(isset($_POST['guardar'])){
            $id_note = $this->notes->create($this->input->post('title'),$this->input->post('description'),$this->input->post('content'));
            foreach($this->input->post('categories') as $category){
                $this->notes->set_category($id_note,$category);
            }
            if($id_note != 0){
                redirect('Note/modify/'.$id_note);
            }
        }
        
        $data = array('css'=>array(),'js'=>array('/ckeditor/ckeditor.js','/js/note_form.js'));
        $data['categories'] = $categories = $this->categories->get_categories();
        $this->get_view(array('/backend/note_form'),$data);
    }
    
    public function modify($note_id){
        $this->load->model('categories', '', TRUE);
        if(isset($_POST['guardar'])){
            $this->notes->update($note_id,$this->input->post('title'),$this->input->post('description'),$this->input->post('content'));
            foreach($this->input->post('categories') as $category){
                $this->notes->set_category($note_id,$category);
            }
        }
        $note = $this->notes->get($note_id);
        
        $data = array('css'=>array(),'js'=>array('/ckeditor/ckeditor.js','/js/note_form.js'),'note'=>$note[0]);
        $data['categories'] = $categories = $this->categories->get_categories();
        $data['note_categories']= $this->notes->get_categories($note_id);
        
        $this->get_view(array('/backend/note_form'),$data);
    }
    
    public function list_notes(){
        $notes = $this->notes->get();
        $data = array('css'=>array('/js/select2/scss/select2.min.css'),'js'=>array('/js/select2/js/select2.min.js'),'notes'=>$notes);
        $this->get_view(array('/backend/list_notes'),$data);
    }
}