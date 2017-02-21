<?php

Class Note extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('notes', '', TRUE);
    }
    
    public function create(){
        $this->load->model('categories', '', TRUE);
        if(isset($_POST['guardar'])){
            
            $id_note = $this->notes->create($this->input->post('title'),$this->input->post('content'),date('Y-m-d H:i:s'));
            if($this->input->post('categories') != ''){
                foreach($this->input->post('categories') as $category){
                    $this->notes->set_category($id_note,$category);
                }
            }
            if($id_note != 0){
                
                if(isset($_FILES['imagen'])){
                    $this->load->helper('files');               
                    $img_name=subirimagen($_FILES['imagen']['name'],$_FILES['imagen']['tmp_name'], BASEPATH.'../assets/img_notes/',"note_".$id_note);
                    $this->notes->set_img($id_note,$img_name);
                }
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
            if($this->input->post('categories') != ''){
                foreach($this->input->post('categories') as $category){
                    $this->notes->set_category($note_id,$category);
                }
            }
            if(isset($_FILES['imagen']) && $_FILES['imagen']['name'] != ''){               
                $this->load->helper('files');               
                $img_name=subirimagen($_FILES['imagen']['name'],$_FILES['imagen']['tmp_name'], FOLDER_NOTE_IMAGES,"note_".$note_id);
                $this->notes->set_img($note_id,$img_name);
                
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