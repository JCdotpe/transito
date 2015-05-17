<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Archivo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function todas_las_sedes() {
        $query = $this->db->query("EXEC PA_SEDE_LISTA ");
        return $this->convert_utf8->convert_result($query);
    }

    public function obtener_sede_local($id_sede) {
        $query = $this->db->query("EXEC PA_LOCAL_LISTA '" . $id_sede . "' ");
        return $this->convert_utf8->convert_result($query);
    }

    public function insertar_archivo_csv($data) {
        return $this->db->insert('recarga_postulante', $data);
    }

    public function eliminar_carga_masiva($cod_sede, $cod_local) {
//        $eliminar_error = $this->db->query("EXEC PA_PADRON_ELIMINA '" . $cod_sede . "','" . $cod_local . "'");
        $this->db->query("EXEC PA_PADRON_ELIMINA '" . $cod_sede . "','" . $cod_local . "'");
//        if ($eliminar_error == '0') {
//            return 0;
//        } else {
//            return 1;
//        }
    }

}
