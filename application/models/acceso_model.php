<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acceso_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function logearme($params) {
        $query = $this->db->query("EXEC PA_USUARIO_ACCESO '" . $params['sendUser'] . "','" . $params['sendPass'] . "'");
        if ($query->num_rows() == 1) {
            return $this->convert_utf8->convert_row($query);
        } else {
            return false;
        }
//        $sql = "SELECT 
//                    usu.*,
//                    rol.nombre_rol
//                FROM 
//                    usuario AS usu 
//                    LEFT JOIN rol ON usu.id_rol=rol.id_rol
//                WHERE 
//                    usu.usuario='" . $params['sendUser'] . "'
//                    AND usu.clave='" . $params['sendPass'] . "'";
//        $query = $this->db->query($sql);
//        if ($query->num_rows() == 1) {
//            return $query->row_array();
//        } else {
//            return false;
//        }
    }

    public function logearUserSede($idUsuario) {
        $sql = "SELECT * FROM usuario_sede WHERE idUsuario='" . $idUsuario . "' ";
        return $this->db->query($sql)->row_array();
    }

}
