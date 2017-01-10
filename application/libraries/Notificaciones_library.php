<?php

class Notificaciones_library{
    public function __construct() {
        $this->CI =& get_instance();
        
        
    }
    
    public function notificar_encuesta($id_encuesta,$id_servicio){
        $this->CI->load->model('servicio','',TRUE);
        $this->CI->load->model('notificacion','',TRUE);
        $usuarios = $this->CI->servicio->obtener_usuarios_por_servicio($id_servicio);
        foreach($usuarios as $usuario){
            $this->CI->notificacion->crear(ENCUESTA_NOTIFICACION,date('Y-m-d H:i'), $id_encuesta,'Hay disponible una nueva encuesta!',$usuario->id_usuario,ADMIN_ID);
             $this->mandar_mail_encuesta($usuario->mail,$id_encuesta);
        }
    }
    
    public function notificar_informe_medio($id_informe,$id_servicio,$edicion,$informe){
        $this->CI->load->model('servicio','',TRUE);
        $this->CI->load->model('notificacion','',TRUE);
        $this->CI->load->model('informe_medios','',TRUE);
        $usuarios = $this->CI->servicio->obtener_usuarios_por_servicio($id_servicio);
        foreach($usuarios as $usuario){
            $this->CI->notificacion->crear(INFORME_NOTIFICACION,date('Y-m-d H:i'), $id_informe,'Hay disponible un nuevo informe de Medios!',$usuario->id_usuario,ADMIN_ID);
            $this->mandar_mail_notificacion_informe($usuario->mail,$id_informe);
            $envios = $this->CI->informe_medios->obtener_envios($usuario->id_usuario);
            foreach($envios as $envio){
                $this->mandar_mail_informe($envio->mail,$id_informe,$edicion,$informe);
            }
        }
    }
    
    
    public function mandar_mail_encuesta($mail,$id_encuesta){      
        $this->CI->load->library('email');
        $this->CI->email->from('info@monteagudo.com.ar', 'Agora');
        $this->CI->email->to($mail);                 

        $this->CI->email->subject('Nueva Encuesta disponible' );

        $this->CI->email->message('Podes consultarla en:'. site_url('Encuestas/ver').'/'.$id_encuesta);

        try {
            $result = $this->CI->email->send();
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function mandar_mail_notificacion_informe($mail,$id_informe){   
        $this->CI->load->library('email');
        $this->CI->email->from('info@monteagudo.com.ar', 'Agora');
        $this->CI->email->to($mail);                 

        $this->CI->email->subject('Nueva Informe disponible' );
       
        $this->CI->email->message('Podes consultarlo en:'. site_url('Informes_Medios/ver').'/'.$id_informe);

        try {
            $result = $this->CI->email->send();
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function mandar_mail_informe($mail,$id_informe,$edicion,$informe){   
        $this->CI->load->library('email');
        $this->CI->email->from('info@monteagudo.com.ar', 'Agora');
        $this->CI->email->to($mail);                 
        $this->CI->email->set_mailtype("html");
        $this->CI->email->subject('Nueva Informe de medios'.$edicion );

        $this->CI->email->message($informe);

        try {
            $result = $this->CI->email->send();
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}
