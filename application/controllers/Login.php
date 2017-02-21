<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user', '', TRUE);
    }

    public function index() {
        // $this->load->library('facebook');
        $data = array();
        if ($this->input->post('mail') != '') {
            $result = $this->user->get_user_by_mail($this->input->post('mail'));
            if (count($result) > 0) {
                $new_pass = $this->generatePassword();

                if ($this->sendPass($this->input->post('mail'), $new_pass)) {
                    $this->user->change_pass($result->id, MD5($new_pass));
                    $data['msg'] = 'Enviamos su nueva contraseña a su casilla de correo!';
                    $data['operation_result'] = 'success';
                } else {
                    $data['msg'] = 'Su contraseña no pudo ser regenerada!';
                    $data['operation_result'] = 'danger';
                }
            } else {
                $data['msg'] = 'El mail no es válido';
                $data['operation_result'] = 'danger';
            }
        }


        $this->load->helper(array('form'));
        $this->load->view('header_login');
        $this->load->view('login_view', $data);
        $this->load->view('footer', array('js' => array()));
    }

    private function sendPass($mail, $new_pass) {
        $data = array();

        $userData = $this->session->userdata('logged_in');
        $this->load->library('email');
        $this->email->from('info@monteagudo.com.ar', 'Agora');
        $this->email->to($mail);
//                   $this->email->cc('sbn.cabrera@gmail.com, jmanuoz@gmail.com');
//                   $this->email->bcc('gimeleti@gmail.com, lucas.saposnik@gmail.com, hg.gagliardi@gmail.com');                   

        $this->email->subject('Nueva contraseña');

        $this->email->message('Su nueva contraseña es:' . $new_pass);

        try {
            $result = $this->email->send();
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    protected function generatePassword($length = 8) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }

    public function verify() {
        //This method will have the credentials validation
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('username', 'Usuario', 'trim|required');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $views = array('login_view');
            $this->load->view('header_login');
            $this->load->view('login_view');

            $this->load->view('footer');
        } else {
            $userData = $this->session->userdata('logged_in');
            $remember = $this->input->post('remember_me');
            if ($remember == '1') {
                $this->session->set_userdata('remember_me', true);
            }
            if ($userData['profile'] == USER_PROFILE) {
                redirect('Home/index');
            } else {
                //echo site_url('Backend/index'); exit;
                redirect(base_url('Backend/index'));
            }
        }
    }

    function check_database($password) {
        //Field validation succeeded.  Validate against database
        $username = $this->input->post('username');

        //query the database
        $result = $this->user->login($username, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'profile' => $row->profile,
                    'data' => $row
                );
                $this->auth->login($row->id, $this->input->post('remember_me'));
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Usuario o contraseña inválido');
            return false;
        }
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'index');
    }

}
