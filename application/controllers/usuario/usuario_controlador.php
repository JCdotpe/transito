<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario_controlador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario/usuario_model', 'modeloUsuario');
        $this->id_user = $this->session->userdata('idUserLogin');
        $this->is_rol = $this->session->userdata('userIdRol');
//        if ($this->is_rol != 1) {
//            redirect("", "refresh");
//        }
    }

    public function index() {
        add_css(array('datatables/dataTables.bootstrap', 'iCheck/all'));
        add_js(array(
            'plugins/datatables/jquery.dataTables.min',
            'plugins/datatables/dataTables.bootstrap',
            'jqueryvalidation/dist/jquery.validate',
            'jqueryvalidation/dist/additional-methods.min',
            'facebox/src/facebox',
            'jquery-ui',
            'plugins/iCheck/icheck.min'));
        $datos['totalUsuarios'] = $this->modeloUsuario->todos_los_usuarios();
        $datos['titulo'] = "Listado de Usuarios";
        $datos['contenido'] = 'usuario/listado_usuario_vista';
        $this->load->view('plantilla', $datos);
    }

    public function crear() {
        if (isset($_REQUEST['crearUsuario']) and $_REQUEST['valorUsuario'] == 'valorCrearUsuario') {
//            echo "<pre>";
//            print_r($_REQUEST);
//            echo "</pre>";
//            exit;
            $_REQUEST['ape_nom'] = $this->security->xss_clean(strip_tags(utf8_decode(strtoupper(trim(notildes($this->input->post('ape_nom')))))));
            $_REQUEST['user'] = $this->security->xss_clean(strip_tags(utf8_decode(strtolower(trim($this->input->post('user'))))));
            $_REQUEST['id_usu_sesion'] = $this->id_user;
            $usuarioOk = $this->modeloUsuario->insertar_usuario($_REQUEST);
            if ($usuarioOk) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            if ($this->input->is_ajax_request()) {
                $datos['totalRol'] = $this->modeloUsuario->todos_los_roles();
                $datos['totalSedes'] = $this->modeloUsuario->todas_las_sedes();
                $this->load->view('usuario/crear_usuario_vista', $datos);
            }
        }
    }

    public function verificar_usuario() {
        $verificauser = $this->modeloUsuario->verificar_nombre_usuario($_REQUEST['user']);
        if ($verificauser == 1) {
            echo "1";
        } else {
            echo "0";
        }
    }

    public function editar() {
        if (isset($_REQUEST['editarUsuario']) and $_REQUEST['valorUsuario'] == 'valorEditarUsuario') {
//            echo "<pre>";
//            print_r($_REQUEST);
//            echo "</pre>";
//            exit;
            $_REQUEST['ape_nomEdit'] = $this->security->xss_clean(strip_tags(utf8_decode(strtoupper(trim(notildes($this->input->post('ape_nomEdit')))))));
            $_REQUEST['id_usu_sesion'] = $this->id_user;
            $usuarioEditOk = $this->modeloUsuario->editar_usuario($_REQUEST);
            if ($usuarioEditOk) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            if ($this->input->is_ajax_request()) {
                $id_usuario = $this->input->get('idUser');
                $datos['totalSedes'] = $this->modeloUsuario->todas_las_sedes();
                $datos['totalRol'] = $this->modeloUsuario->todos_los_roles();
                $datos['usuarios'] = $this->modeloUsuario->seleccionar_usuario($id_usuario);
                $datos['usuarios']['usuario_sede'] = $this->modeloUsuario->seleccionar_usuario_sede($id_usuario);
                $this->load->view('usuario/editar_usuario_vista', $datos);
            }
        }
    }

}

/* End of file Usuario_controlador.php */
/* Location: ./application/controllers/Usuario_controlador.php */    