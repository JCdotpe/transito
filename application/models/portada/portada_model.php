<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Portada_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getTotalRegistro() {
        $query = $this->db->query("EXEC PA_REPORTE_ASISTENCIA ");
        return $this->convert_utf8->convert_result($query);
    }

    public function getTotalRegistroSuma() {
        $query = $this->db->query("EXEC PA_REPORTE_ASISTENCIA_RESUMEN ");
        return $this->convert_utf8->convert_row($query);
    }

    public function getDetalleRegistro($local) {
        $query = $this->db->query("EXEC PA_REPORTE_ASISTENCIA_DETALLE '" . $local . "' ");
        return $this->convert_utf8->convert_result($query);
    }
}
