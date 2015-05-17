<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function todos_los_usuarios() {
        $query = $this->db->query("EXEC PA_USUARIO_LISTA ");
        return $this->convert_utf8->convert_result($query);
    }

    public function seleccionar_usuario($idUser) {
        $query = $this->db->query("EXEC PA_USUARIO_DATOS '" . $idUser . "' ");
        return $this->convert_utf8->convert_row($query);
    }

    public function seleccionar_usuario_sede($idUserSede) {
        $query = $this->db->query("EXEC PA_USUARIO_SEDE_LISTA '" . $idUserSede . "' ");
        return $this->convert_utf8->convert_result($query);
    }

    public function todos_los_roles() {
        $query = $this->db->query("EXEC PA_ROL_LISTA ");
        return $this->convert_utf8->convert_result($query);
    }

    public function todas_las_sedes() {
        $query = $this->db->query("EXEC PA_SEDE_LISTA ");
        return $this->convert_utf8->convert_result($query);
    }

    public function verificar_nombre_usuario($user) {
        $query = $this->db->query("EXEC PA_USUARIO_EXISTE '" . $user . "'");
        $existe = $this->convert_utf8->convert_row($query);
        if ($existe['respuesta'] == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function insertar_usuario($params) {
        $user_insert = $this->db->query("EXEC PA_USUARIO_REGISTRO '" . $params['user'] . "','" . $params['pass'] . "','" . $params['ape_nom'] . "','" . $params['rol'] . "','" . $params['id_usu_sesion'] . "'");
        $last_id = $this->db->query("SELECT @@IDENTITY AS last_id")->row_array();
        if ($user_insert) {
            foreach ($params['sedes'] as $value) {
                $this->db->query("EXEC PA_USUARIO_SEDE_REGISTRO '" . $last_id['last_id'] . "','" . $value . "','" . $params['id_usu_sesion'] . "'");
            }
        }
        return $user_insert;
    }

    public function editar_usuario($params) {
        ($params['passEdit'] == '') ? $modificar_clave = 0 : $modificar_clave = 1;
        $user_edit = $this->db->query("EXEC PA_USUARIO_MODIFICA '" . $params['id_user_edit'] . "','" . $modificar_clave . "','" . $params['passEdit'] . "','" . $params['ape_nomEdit'] . "','" . $params['estadoEdit'] . "','" . $params['rolEdit'] . "','" . $params['id_usu_sesion'] . "'");
        if (isset($params['sedesEdit'])) {
            if ($user_edit) {
//                $this->db->query("EXEC PA_USUARIO_SEDE_ELIMINA '" . $params['id_user_edit'] . "','" . $params['id_usu_sesion'] . "'");
                $this->db->query("EXEC PA_USUARIO_SEDE_ELIMINA '" . $params['id_user_edit'] . "'");
                foreach ($params['sedesEdit'] as $value) {
                    $this->db->query("EXEC PA_USUARIO_SEDE_REGISTRO '" . $params['id_user_edit'] . "','" . $value . "','" . $params['id_usu_sesion'] . "'");
                }
            }
        } else {
//            $this->db->query("EXEC PA_USUARIO_SEDE_ELIMINA '" . $params['id_user_edit'] . "','" . $params['id_usu_sesion'] . "'");
            $this->db->query("EXEC PA_USUARIO_SEDE_ELIMINA '" . $params['id_user_edit'] . "'");
        }
        return $user_edit;
    }

}
