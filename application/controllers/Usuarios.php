<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user', '', TRUE);
    }

    public function index() {
        $data['usuarios'] = $this->user->get_users();
       
        $this->get_view(array('nav_backend_header','usuarios_list'),$data);
        
    }
    
     public function crear() {
         $views = array('backend/crear_usuario');
            
            
             $data = array('css'=>array(),'js'=>array());
            if(isset($_POST['nombre'])){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');   
                $this->form_validation->set_rules('username', 'Usuario', 'required'); 
                $this->form_validation->set_rules('pass', 'Contraseña', 'required'); 
                if ($this->form_validation->run() == true) {    
                    $result = $this->user->get_user_by_mail($this->input->post('mail'));
                    if(count($result)>0  ){
                        $data['msg'] = 'Ese mail no es válido';
                        $data['operation_result'] = 'danger';
                    }else{
                        $id_user = $this->user->create($this->input->post('username'),md5($this->input->post('pass')),$this->input->post('nombre'),$this->input->post('apellido')
                            ,$this->input->post('celular'),$this->input->post('cod_postal'),$this->input->post('mail') ,$this->input->post('url_sitio'));
                        
                        redirect('Usuarios/editar/'.$id_user);
                    }
                }else{
                    $data['msg'] = validation_errors();
                    $data['operation_result'] = 'danger';
                }
                
            }
            $this->get_view($views,$data);
    }
    
    public function editar($id) {

        $data = array('css'=>array(),'js'=>array('/js/usuario.js'));

        if (!empty($_POST)) {
            $this->user->update($id ,$this->input->post('nombre'),$this->input->post('apellido')
                            ,$this->input->post('celular'),$this->input->post('cod_postal'),$this->input->post('mail') ,$this->input->post('url_sitio'));
            
        }
        if(isset($_FILES['imagen'])){
                $this->load->helper('files');              
               
                $img_name=subirimagen($_FILES['imagen']['name'],$_FILES['imagen']['tmp_name'],"400","400", BASEPATH.'../assets/img_perfiles/',"perfil_".$id);
                $this->user->set_profile_img($id ,$img_name);
              
               
                //redirect('dashboard/view');
            }
        $data['usuario'] = $this->user->get($id);
       
         
         $this->get_view(array('backend/crear_usuario'),$data);
        
      }
      
      public function lista_usuarios(){
          $data = array('css'=>array(),'js'=>array());
          $data['usuarios'] = $this->user->get_users();
          $this->get_view(array('backend/lista_usuarios'),$data);
      }
      
      public function delete($id) {
        $data = array();
        $this->user->delete($id);
        $data['msg'] = 'El usuario fue eliminado';
        $data['errorCode'] = 0;
        echo json_encode($data);
    }
    
    public function setGraph($id){
        if (!empty($_POST)) {
            $graficos = array_intersect_key($_POST, array_flip(preg_grep('/^grafico_/', array_keys($_POST))));
            
            foreach($graficos as $key=>$link){
                $id_grafico = explode('_',$key);
                if($this->user->has_graph($id,$id_grafico[1])){
                    if($link == ''){
                        $created = $this->user->remove_graph($id,$id_grafico[1]);
                    }else{
                        $created = $this->user->update_graph($id,$id_grafico[1],$link,$this->input->post('orden_'.$id_grafico[1]));
                    }
                }else{
                    if($link != ''){
                        $created = $this->user->set_graph($id,$id_grafico[1],$link,$this->input->post('orden_'.$id_grafico[1]));
                    }
                }                
            }
            
            if($created > 0){
                  redirect('usuarios');
            }
        }
        $data['graficos'] = $this->user->obtener_graficos($id);
        $this->get_view(array('nav_backend_header','usuario_graficos'),$data);
        
    }

}
