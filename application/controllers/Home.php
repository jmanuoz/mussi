<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function ayuda()
	{
            $views = array('help');
            
		$this->get_front_view($views);
                
	}
        
        public function contacto()
	{
            $views = array('contacto');
            $data = array();
            if(isset($_POST['consulta'])){
                $data = $this->sendEmail();
            }
            
            $this->get_front_view($views,$data);
                
	}
        
        public function notificaciones()
	{
            $views = array('notificaciones');
            
            $this->get_front_view($views);
                
	}
        
        public function perfil(){
            $views = array('perfil');
            $this->load->model('user', '', TRUE);
            $userData = $this->session->userdata('logged_in');
            $data = array();
            if(isset($_POST['nombre'])){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');            
                if ($this->form_validation->run() == true) {    
                    $result = $this->user->get_user_by_mail($this->input->post('mail'));
                    if(count($result)>0 && $result->id != $userData['data']->id ){
                        $data['msg'] = 'Ese mail no es válido';
                        $data['operation_result'] = 'danger';
                    }else{
                        $this->user->update($userData['data']->id ,$this->input->post('nombre'),$this->input->post('apellido')
                            ,$this->input->post('celular'),$this->input->post('cod_postal'),$this->input->post('mail') ,$this->input->post('url_sitio'));
                        $userData['data']->nombre = $this->input->post('nombre');
                        $userData['data']->apellido = $this->input->post('apellido');
                        $this->session->set_userdata('logged_in', $userData);
                        $data['msg'] = 'Se cambio exitosamente su información!';
                        $data['operation_result'] = 'success';
                    }
                }else{
                    $data['msg'] = validation_errors();
                    $data['operation_result'] = 'danger';
                }
                
            }
           
            
            if(isset($_FILES['imagen'])){
                $this->load->helper('files');              
               
                $img_name=subirimagen($_FILES['imagen']['name'],$_FILES['imagen']['tmp_name'],"400","400", BASEPATH.'../assets/img_perfiles/',"perfil_".$userData['id']);
                $this->user->set_profile_img($userData['data']->id ,$img_name);
                $userData['data']->imagen = $img_name;
                $this->session->set_userdata('logged_in', $userData);
                //redirect('dashboard/view');
            }
            
            if(isset($_POST['old_pass'])){
                
                if( $this->user->check_pass($userData['data']->username ,$this->input->post('old_pass'))){
                    $data['error_pass']='La contraseña actual no coincide';
                }else{
                    $this->user->change_pass($userData['data']->id ,MD5($this->input->post('new_pass')));
                    $data['success']='Se cambió exitosamente';
                }
                
            }
            
            $user = $this->user->get($userData['id']);
            $data['user']=$user;
            $this->get_front_view($views,$data);
        }
        
        private function sendEmail(){
        $data = array();
        if($this->input->post('consulta') == '' ){
                    $data['msg'] = 'Por favor ingrese una consulta';
                    $data['operation_result'] = 'danger';
                }else{
                   $userData = $this->session->userdata('logged_in');
                   $this->load->library('email');
                   $this->email->from($userData['data']->mail, $userData['data']->nombre.' '.$userData['data']->apellido);
                   $this->email->to('info@monteagudo.com.ar');                    
//                   $this->email->cc('sbn.cabrera@gmail.com, jmanuoz@gmail.com');
//                   $this->email->bcc('gimeleti@gmail.com, lucas.saposnik@gmail.com, hg.gagliardi@gmail.com');                   
                   
                    $this->email->subject('[CONSULTA AGORA] ' . $this->input->post('tipo_consulta'));
                    
                    $this->email->message($this->input->post('consulta') );

                    try {
                        $result = $this->email->send();
                        if ($result) {
                            $data['msg'] = 'Tu consulta se envió corretamente!';
                            $data['operation_result'] = 'success';
                        } else {
                            $data['msg'] = 'La consulta no pudo ser enviada';                            
                            $data['operation_result'] = 'danger';
                        }
                    } catch (Exception $e) {
                        $data['msg'] = 'La consulta no pudo ser enviada';                        
                        $data['operation_result'] = 'danger';
                    }
                }
                return $data;
    }
    
    public function index(){
        $data = array('css'=>array(
            '/pages/css/about.min.css'
        ));
        $this->get_front_view(array('home'),$data);
    }
}