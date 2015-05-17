<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Postulante_controlador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('postulante/postulante_model', 'modeloPostulante');
        $this->id_user = $this->session->userdata('idUserLogin');
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
        $datos['totalSedes'] = $this->modeloPostulante->todas_las_sedes();
        $datos['titulo'] = "Listado de Postulantes";
        $datos['contenido'] = 'postulante/listado_postulante_vista';
        $this->load->view('plantilla', $datos);
    }

    public function buscar_local() {
        $sede = $this->input->post('sede');
        $datos = $this->modeloPostulante->obtener_local_sede($sede);
        echo json_encode($datos);
    }

    public function crear() {
        if (isset($_REQUEST['crearPostulante']) and $_REQUEST['valorPostulante'] == 'valorCrearPostulante') {
//            echo "<pre>";
//            print_r($_REQUEST);
//            echo "</pre>";
//            exit;
            $_REQUEST['ape_nom_postulante'] = $this->security->xss_clean(strip_tags(utf8_decode(strtoupper(tildesMayuscula(trim($this->input->post('ape_nom_postulante')))))));
            $_REQUEST['id_usu_sesion'] = $this->id_user;
            $postulante_listo = $this->modeloPostulante->insertar_postulante($_REQUEST);
            if ($postulante_listo) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            if ($this->input->is_ajax_request()) {
                $datos['totalSedes'] = $this->modeloPostulante->todas_las_sedes();
                $datos['totalCargos'] = $this->modeloPostulante->todos_los_cargos();
                $this->load->view('postulante/crear_postulante_vista', $datos);
            }
        }
    }

    public function listado_ajax() {
        $idSede = $this->input->get('idSede');
        $idLocal = $this->input->get('idLocal');
        $datos['personaLocal'] = $this->modeloPostulante->obtener_sede_local_postulante($idSede, $idLocal);
        $this->load->view('postulante/listado_postulante_ajax_vista', $datos);
    }

//
    public function editar() {
        if (isset($_REQUEST['editarPostulante']) and $_REQUEST['valorPostulante'] == 'valorEditarPostulante') {
//            echo "<pre>";
//            print_r($_REQUEST);
//            echo "</pre>";
//            exit;
            $_REQUEST['ape_nom_postulante_editar'] = $this->security->xss_clean(strip_tags(utf8_decode(strtoupper(tildesMayuscula(trim($this->input->post('ape_nom_postulante_editar')))))));
            $_REQUEST['id_usu_sesion'] = $this->id_user;
            $postulante_editar = $this->modeloPostulante->editar_postulante($_REQUEST);
            if ($postulante_editar) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            if ($this->input->is_ajax_request()) {
                $dni_postulante = $this->input->get('dniPostulante');
                $datos['totalSedes'] = $this->modeloPostulante->todas_las_sedes();
                $datos['totalCargos'] = $this->modeloPostulante->todos_los_cargos();
                $datos['postulante'] = $this->modeloPostulante->seleccionar_postulante($dni_postulante);
                $datos['totalLocal'] = $this->modeloPostulante->obtener_local_sede($datos['postulante']['cod_sede_operativa']);
                $this->load->view('postulante/editar_postulante_vista', $datos);
            }
        }
    }

}

/* End of file Postulante_controlador.php */
/* Location: ./application/controllers/Postulante_controlador.php */    