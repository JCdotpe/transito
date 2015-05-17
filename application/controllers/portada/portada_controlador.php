<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Portada_controlador extends CI_Controller {

    public function __construct() {
        parent::__construct();
//        $this->load->model('portada/portada_model', 'modeloPortada');
        $this->isRol = $this->session->userdata('userIdRol');
    }

    //cobertura
    public function index() {
       
//        add_js('plugins/highcharts/highcharts');
//        add_js('plugins/highcharts/modules/exporting');
        //conociendo la sede
//        $datos['sede'] = $this->session->userdata('userCodSedeOpera');
//        $datos['totalRegistro'] = $this->modeloMonitor->getTotalRegistro();
//        $datos['totalSuma'] = $this->modeloMonitor->getTotalRegistroSuma();
        $datos['titulo'] = "Portada";
        $datos['contenido'] = 'portada/index_portada';
        $this->load->view('plantilla', $datos);
    }

//    public function coberturaTotalHeaderAjax() {
//        $tablaReporteHeader = $this->modeloMonitor->getTotalRegistroSuma();
//        echo json_encode($tablaReporteHeader);
//    }
//
//    public function coberturaTotalAjax() {
//        $tablaReporte = $this->modeloMonitor->getTotalRegistro();
//        echo json_encode($tablaReporte);
//    }
//
//    public function reporte_detallado() {
//        add_css('datatables/dataTables.bootstrap');
//        add_js('plugins/datatables/jquery.dataTables.min');
//        add_js('plugins/datatables/dataTables.bootstrap');
////        $datos['locales'] = $this->modelomonitor->getSedeLocal();
//        $datos['totalDetalle'] = $this->modeloMonitor->getDetalleRegistro();
//        $datos['titulo'] = "Reporte detallado de cobertura";
//        $datos['contenido'] = 'operadorinformatico/reporte_detallado';
//        $this->load->view('plantilla', $datos);
//    }
}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */    