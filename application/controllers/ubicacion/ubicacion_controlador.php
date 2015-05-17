<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ubicacion_controlador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ubicacion/ubicacion_model', 'modeloUbicacion');
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
        $datos['titulo'] = "Reporte por ubicación";
        $datos['contenido'] = 'ubicacion/listado_ubicacion_vista';
        $this->load->view('plantilla', $datos);
    }
    
    public function traer_ubicacion() {
        $locations = $this->modeloUbicacion->getUbicacion();
        header('Content-Type: application/json');
        echo json_encode($locations);
    }

//    public function crear() {
//        if (isset($_REQUEST['crearLocal']) and $_REQUEST['valorLocal'] == 'valorCrearLocal') {
//            $_REQUEST['nombre_local'] = $this->security->xss_clean(strip_tags(utf8_decode(strtoupper(tildesMayuscula(trim($this->input->post('nombre_local')))))));
//            $_REQUEST['direccion_local'] = $this->security->xss_clean(strip_tags(utf8_decode(strtoupper(tildesMayuscula(trim($this->input->post('direccion_local')))))));
//            $_REQUEST['referencia_local'] = $this->security->xss_clean(strip_tags(utf8_decode(strtoupper(tildesMayuscula(trim($this->input->post('referencia_local')))))));
//            $_REQUEST['id_usu_sesion'] = $this->id_user;
//            $local_listo = $this->modeloLocal->insertar_local($_REQUEST);
//            if ($local_listo) {
//                echo 1;
//            } else {
//                echo 0;
//            }
//        } else {
//            if ($this->input->is_ajax_request()) {
//                $datos['totalSedes'] = $this->modeloLocal->todas_las_sedes();
//                $this->load->view('local/crear_local_vista', $datos);
//            }
//        }
//    }
//
//    public function listado_ajax() {
//        $id_sede = $this->input->get('idSede');
//        $datos['sedeLocal'] = $this->modeloLocal->obtener_sede_local($id_sede);
//        $this->load->view('local/listado_local_vista_ajax', $datos);
//    }
//
//    public function editar() {
//        if (isset($_REQUEST['editarLocal']) and $_REQUEST['valorLocal'] == 'valorEditarLocal') {
////            echo "<pre>";
////            print_r($_REQUEST);
////            echo "</pre>";
////            exit;
//
//            $_REQUEST['nombre_local_editar'] = $this->security->xss_clean(strip_tags(utf8_decode(strtoupper(tildesMayuscula(trim($this->input->post('nombre_local_editar')))))));
//            $_REQUEST['direccion_local_editar'] = $this->security->xss_clean(strip_tags(utf8_decode(strtoupper(tildesMayuscula(trim($this->input->post('direccion_local_editar')))))));
//            $_REQUEST['referencia_local_editar'] = $this->security->xss_clean(strip_tags(utf8_decode(strtoupper(tildesMayuscula(trim($this->input->post('referencia_local_editar')))))));
//            $_REQUEST['id_usu_sesion'] = $this->id_user;
//            $localEditOk = $this->modeloLocal->editar_local($_REQUEST);
//            if ($localEditOk) {
//                echo 1;
//            } else {
//                echo 0;
//            }
//        } else {
//            if ($this->input->is_ajax_request()) {
//                $id_sede = $this->input->get('idsede');
//                $id_local = $this->input->get('idlocal');
//                $datos['totalSedes'] = $this->modeloLocal->todas_las_sedes();
//                $datos['local'] = $this->modeloLocal->seleccionar_local($id_sede, $id_local);
//                $this->load->view('local/editar_local_vista', $datos);
//            }
//        }
//    }

}

/* End of file Local_controlador.php */
/* Location: ./application/controllers/Local_controlador.php */    