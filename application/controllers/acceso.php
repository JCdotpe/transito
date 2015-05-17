<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acceso extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('acceso_model', 'modeloAcceso');
    }

    public function login() {
        if (!$this->session->userdata('idUserLogin')) {
            $user = $this->input->post('sendUser');
            $pass = $this->input->post('sendPass');
            if ($user and $pass) {
                $check = $this->modeloAcceso->logearme($_REQUEST);
                if ($check) {
                    $datoUser = array(
                        'idUserLogin' => $check['idUsuario'],
                        'userNameUsuario' => $check['usuario'],
                        'userNombreApellido' => $check['nombres_apellidos'],
                        'userIdRol' => $check['id_rol'],
                        'userNombreRol' => $check['nombre_rol']
                    );
                    $this->session->set_userdata($datoUser);
                    redirect('', 'refresh');
                } else {
                    $this->session->set_flashdata('usuario_incorrecto', 'Datos ingresados incorrectos...');
                    redirect('login', 'refresh');
                }
            } else {
                $data['titulo'] = "Acceso al sistema";
                $data['contenido'] = 'acceso/login_acceso';
                $data['sidebar'] = false;
                $this->load->view('plantilla', $data);
            }
        } else {
            redirect('', 'refresh');
        }
    }

    public function logout() {
        $this->session->unset_userdata('idUserLogin');
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

}

/* End of file Home.php */
    /* Location: ./application/controllers/Home.php */    