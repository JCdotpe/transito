<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Local_model extends CI_Model {

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

    public function seleccionar_local($id_sede, $id_local) {
        $query = $this->db->query("EXEC PA_LOCAL_DATOS '" . $id_sede . "','" . $id_local . "'");
        return $this->convert_utf8->convert_row($query);
    }

    public function insertar_local($params) {
        return $local_insert = $this->db->query("EXEC PA_LOCAL_REGISTRO '" . $params['sede_local'] . "','" . $params['nombre_local'] . "','" . $params['direccion_local'] . "','" . $params['referencia_local'] . "','" . $params['aulas_local'] . "','" . $params['id_usu_sesion'] . "'");

    }

    public function editar_local($params) {
        return  $this->db->query("EXEC PA_LOCAL_MODIFICA '" . $params['sede_local_editar'] . "','" . $params['cod_local_editar'] . "','" . $params['nombre_local_editar'] . "','" . $params['direccion_local_editar'] . "','" . $params['referencia_local_editar'] . "','" . $params['aulas_local_editar'] . "','" . $params['estado_editar'] . "','" . $params['id_usu_sesion'] . "'");
    }
}
