<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');

                if(!$this->auth->loggedin() && get_class($this) != 'Login' && get_class($this) != 'Welcome' && get_class($this) != 'Frontend')
                {
                  redirect('login', 'index');
                }
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}


        public function get_view($views=array(), $data=array()){
            $userData = $this->session->userdata('logged_in');
            if ($userData['profile'] == ADMIN_PROFILE) {
                $nav_data = array('user'=>$userData['data'],'section'=>$this->router->fetch_method());
                 $this->load->model('notifications_model', '', TRUE);
                 $nav_data['notifications'] = $this->notifications_model->get_not_read();

                $nav_data['messages'] = $this->notifications_model->get_not_read_by_type(NOTIFICATIONS_MODEL::NEW_MESSAGE);


                if(!isset($data['css'])){
                    $data['css'] = array();
                }
                if(!isset($data['js'])){
                    $data['js'] = array();
                }
                $this->load->view('backend/header',array('css'=>$data['css']));
                $this->load->view('backend/nav_backend_header',$nav_data);
                foreach($views as $view){
                    $this->load->view($view,$data);
                }
                $this->load->view('backend/footer',array('js'=>$data['js']));
            }else{
                $this->acceso_restringido();
            }
        }

        public function acceso_restringido(){
            $this->load->view('errors/html/access_denied',array('heading'=>'Acceso Restringido', 'message'=>'No tiene permiso para navegar aquí'));
        }

        public function get_front_view($views=array(), $data=array()){
            $userData = $this->session->userdata('logged_in');
            $nav_data = array('user'=>$userData['data'],'section'=>$this->router->fetch_method());
            $this->load->model('servicio', '', TRUE);
            $this->load->model('encuesta', '', TRUE);
            $this->load->model('informe_medios', '', TRUE);
            $tipo_encuestas = $this->servicio->obtener_por_usuario($userData['data']->id,  Servicio::ENCUESTA);
            foreach( $tipo_encuestas as &$tipo_encuesta){
                $tipo_encuesta->encuestas = $this->encuesta->get_by_tipo_servicio($tipo_encuesta->id_tipo);
            }
            $informe = $this->servicio->tiene_informe($userData['data']->id);
            if(count($informe) > 0){
                $nav_data['informe'] = $informe;
            }
            $nav_data['tipo_encuestas'] = $tipo_encuestas;
            if(!isset($data['css'])){
                $data['css'] = array();
            }
            if(!isset($data['js'])){
                $data['js'] = array();
            }
            $this->load->model('notificacion', '', TRUE);
            $nav_data['notificaciones'] = $this->notificacion->obtener_no_vistas($userData['data']->id);
             $nav_data['notificaciones_encuestas'] = $this->notificacion->obtener_no_vistas_por_tipo($userData['data']->id,ENCUESTA_NOTIFICACION);
            $this->load->view('header',$data);
            $this->load->view('nav_header',$nav_data);
            foreach($views as $view){
                $this->load->view($view,$data);
            }
            $this->load->view('footer',$data);
        }

        public function get_user_id(){
            $userData = $this->session->userdata('logged_in');
            return $userData['data']->id;
        }

				public function get_posts($start=0, $limit=5){
			      $this->load->model('posts', '', TRUE);
			      $this->load->model('notes', '', TRUE);
			      $posts= $this->posts->get_posts($limit, $start);
			      foreach($posts as &$post){
			          $post->categories = $this->posts->get_categories($post->posts_id);
			      }

			      $notes = $this->notes->get_notes($limit, $start);
			      foreach($notes as &$note){
			          $note->categories = $this->notes->get_categories($post->notes_id);
			          $note->social_net = 6;
			      }
			      $resultado = array_merge($posts, $notes);

			      usort($resultado, array($this,"order_posts"));

			      echo json_encode($resultado);

			  }
			  function order_posts($a, $b)
			    {
			        return (strtotime($a->date) > strtotime($b->date)) ? -1 : 1;
			    }


			  public function get_followers(){
			      $this->load->model('socialnets', '', TRUE);
			      $result = $this->socialnets->get_followers();
			      echo json_encode($result);
			  }

			  public function get_calendar(){
			      $response = new stdClass();
			      try{
			        $this->load->library('google/calendar/google_calendar');
			        $fourDaysAgo = date("Y-m-d\TH:i:sP",strtotime('-4 day', strtotime('12:00:00')));
			        $today = date("Y-m-d\TH:i:sP",strtotime('12:00:00'));

			        $events_past = $this->google_calendar->get_events($fourDaysAgo,$today);
			        $events_future = $this->google_calendar->get_events($today);

			        $items = $events_past['modelData']['items'];
			        $lastEvent = array();
			        $lastEvent1 = array_pop($items);
			        if($lastEvent1 != null){
			            $lastEvent[] = $lastEvent1;
			            $lastEvent2 = array_pop($items);
			            if($lastEvent2 != null){
			                $lastEvent[] = $lastEvent2;
			            }
			        }

			        $events = array_merge($lastEvent,$events_future['modelData']['items']);
			        $response->status = true;
			        $jsonEvents = array();
			        foreach($events as $event){
			            $jsonEvent = new stdClass();
			            $jsonEvent->date = $event['start']['dateTime'];
			            $jsonEvent->description = $event['summary'];
			            $jsonEvent->location = isset($event['location'])?$event['location']:'';
			            $jsonEvents[] = $jsonEvent;
			        }
			        $response->events = $jsonEvents;
			      }catch (Exception $e){
			        $response->status = false;
			        $response->error = $e->getMessage();
			        log_message('error', '[Google Calendar]'.$e->getMessage());
			      }

			      echo json_encode($response);
			      //echo'<pre>';print_r($this->google_calendar->get_events());echo '</pre>';
			  }


			  public function get_categories(){
			      $this->load->model('posts', '', TRUE);
			      $result = $this->posts->get_categoriesAll();
			      echo json_encode($result);
			  }

			  public function get_categories_number($category){
			      $this->load->model('posts', '', TRUE);
			      $result = $this->posts->get_categoriesNumber($category);
			      echo json_encode($result);
			  }

			  public function message_to_user(){
			      $this->load->model('messages_model', '', TRUE);
			      $id = $this->messages_model->create($this->input->post('name'),$this->input->post('email'),$this->input->post('mensaje'),0);
			      $response = new stdClass();
			      if($id > 0){
			          $this->load->model('notifications_model', '', TRUE);
			          $this->notifications_model->create(Notifications_model::NEW_MESSAGE,date('Y-m-d H:i:s'),'Tenes un nuevo mensaje');
			          $response->status = 1;
			          $response->id = $id;
			          $response->message = 'Se envío exitosamente';
			      }else{
			          $response->status = 0;
			          $response->message = 'No se pudo crear el mensaje';
			      }
			      echo json_encode($response);
			  }

			  public function set_post_higlighted($postId){
			      $this->load->model('posts', '', TRUE);
			      $response = new stdClass();
			      $success = $this->posts->remove_highlighted();
			      $success = $this->posts->higlight_post($postId);
			      if($success){
			          $response->status = 1;
			          $response->message = 'Se destacó exitosamente';
			          echo json_encode($response);
			          return 0;
			      }
			      $response->status = 0;
			      $response->message = 'No se pudo destacar';
			      echo json_encode($response);
			      return 0;
			  }

}
