<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Postulante_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtener_sede_local_postulante($idSede, $idLocal) {
        $query = $this->db->query("EXEC PA_POSTULANTE_LOCAL_LISTA '" . $idSede . "','" . $idLocal . "'");
        return $this->convert_utf8->convert_result($query);
    }

    public function todas_las_sedes() {
        $query = $this->db->query("EXEC PA_SEDE_LISTA ");
        return $this->convert_utf8->convert_result($query);
    }

    public function obtener_local_sede($cod_sede) {
        $query = $this->db->query("EXEC PA_LOCAL_LISTA '" . $cod_sede . "' ");
        return $this->convert_utf8->convert_result($query);
    }

    public function seleccionar_postulante($dniPostulante) {
        $query = $this->db->query("EXEC PA_POSTULANTE_DATOS '1','" . $dniPostulante . "','A' ");
        return $this->convert_utf8->convert_row($query);
    }

    public function todos_los_cargos() {
        $query = $this->db->query("EXEC PA_CARGO_LISTA ");
        return $this->convert_utf8->convert_result($query);
    }

    public function insertar_postulante($params) {
        return $postulante_insert = $this->db->query("EXEC PA_POSTULANTE_REGISTRO '" . $params['sede_postulante'] . "','" . $params['local_postulante'] . "','" . $params['cargo_postulante'] . "','" . $params['dni_postulante'] . "','" . $params['ape_nom_postulante'] . "','" . $params['aula_postulante'] . "','" . $params['tipo_postulante'] . "','" . $params['id_usu_sesion'] . "'");
       
    }

    public function editar_postulante($params) {
        return $postulante_edit = $this->db->query("EXEC PA_POSTULANTE_MODIFICA '" . $params['dni_anterior_editar'] . "','" . $params['sede_postulante_editar'] . "','" . $params['local_postulante_editar'] . "','" . $params['cargo_postulante_editar'] . "','" . $params['dni_postulante_editar'] . "','" . $params['ape_nom_postulante_editar'] . "','" . $params['aula_postulante_editar'] . "','1','" . $params['tipo_postulante_editar'] . "','" . $params['id_usu_sesion'] . "'");
        
    }
}
