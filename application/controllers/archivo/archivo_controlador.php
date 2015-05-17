<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Archivo_controlador extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('archivo/archivo_model', 'modeloArchivo');
        $this->load->library('csvimport');
        $this->id_user = $this->session->userdata('idUserLogin');
    }

    public function index() {
        $this->output->enable_profiler(TRUE);
        add_css('datatables/dataTables.bootstrap');
        add_js(array(
            'plugins/filestyle/bootstrap-filestyle.min',
            'jqueryvalidation/dist/jquery.validate',
            'jqueryvalidation/dist/additional-methods.min',
            'plugins/jform/jquery.form'));
        $datos['totalSedes'] = $this->modeloArchivo->todas_las_sedes();
        $datos['titulo'] = "Carga de archivo en forma masiva";
        $datos['contenido'] = 'archivo/upload_archivo_vista';
        $this->load->view('plantilla', $datos);
    }

    public function upload_archivo() {
//        echo "<pre>";
//        print_r($_REQUEST);
//        echo "</pre>";
//        echo "<pre>";
//        print_r($_FILES);
//        echo "</pre>";
//        exit;
//        variables del formulario

        $this->output->enable_profiler(TRUE);
        $cod_sede = $this->input->post('archivo_sede');
        $cod_local = $this->input->post('archivo_local');

        $this->modeloArchivo->eliminar_carga_masiva($cod_sede, $cod_local);
//        $eliminar = $this->modeloArchivo->eliminar_carga_masiva($cod_sede, $cod_local);
//        if ($eliminar == '0') {
//            echo "<pre>";
//            print_r($eliminar);
//            echo "ja ja ja ";
//            echo "</pre>";
//            exit;
//        }
//        else {
        $data['error'] = '';
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '0';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();
        } else {
            $file_data = $this->upload->data();
            $file_path = './assets/uploads/' . $file_data['file_name'];
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'cod_sede_operativa' => $cod_sede,
                        'cod_local_sede' => $cod_local,
                        'dni' => str_pad($row['dni'], 8, "0", STR_PAD_LEFT),
                        'ape_nom' => strtoupper(utf8_decode($row['nombre_completo'])),
                        'cargo' => strtoupper(utf8_decode($row['cargo'])),
                        'nro_aula' => $row['nro_aula'],
                        'tipo' => strtoupper($row['tipo'])
                    );
                    $this->modeloArchivo->insertar_archivo_csv($insert_data);
//                    if ($exito) {
//                        redirect('cargar-archivo', 'refresh');
//                    }
                }
            } else {
                echo $data['error'] = "Ocurrio un Error";
            }
        }
//        }
    }

}

/* End of file Archivo_controlador.php */
/* Location: ./application/controllers/Archivo_controlador.php */    